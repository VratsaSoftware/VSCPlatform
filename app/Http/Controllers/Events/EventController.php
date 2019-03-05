<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events\Event;
use App\Models\Events\Team;
use App\Models\Events\TeamMember;
use App\Models\Events\TeamCategory;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\Occupation;
use App\Models\Users\ShirtSize;
use App\Models\Users\UsersTeamRole;
use App\Mail\InviteMember;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('Teams', 'Teams.Members', 'Teams.Members.User', 'Teams.Members.User.Occupation', 'Teams.Members.Role', 'Teams.Category')->where([
            ['to', '>', Carbon::now()->format('Y-m-d H:m:s')],
            ['visibility','!=','draft'],
            ])->get();
        $pastEvents = Event::with('Teams', 'Teams.Members', 'Teams.Category')->where([
            ['to', '<', Carbon::now()->format('Y-m-d H:m:s')],
            ['visibility','!=','draft'],
        ])->get();

        return view('layouts.events', ['events' => $events,'pastEvents' => $pastEvents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->min_team = (int)$request->min_team;
        $request->max_team = (int)$request->max_team;
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $request['valid_type'] = ['is_team','is_module'];
        $data = $request->validate([
            'picture' => 'required|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'description' => 'required|max:200',
            'starts' => 'required|date_format:Y-m-d',
            'ends' => 'required|date_format:Y-m-d|after:starts',
            'type' => 'required|in_array:valid_type.*',
            'visibility' => 'required|in_array:valid_visibility.*',
            'min_team' => 'numeric|min:1|max:99',
            'max_team' => 'numeric|min:'.$request->min_team.'|max:99',
        ]);

        $eventPic = Input::file('picture');
        $image = Image::make($eventPic->getRealPath());
        $image->fit(800, 600, function ($constraint) {
            $constraint->upsize();
        });
        $name = time()."_".$eventPic->getClientOriginalName();
        $name = str_replace(' ', '', strtolower($name));
        $name = md5($name);
        $path = public_path().'/images/events';

        if ($eventPic->getClientOriginalExtension() == 'gif') {
            copy($eventPic->getRealPath(), public_path().'/images/events');
        } else {
            $image->save(public_path().'/images/events/'.$name, 90);
        }

        $newEvent = new Event;
        $newEvent->name = $request->name;
        $newEvent->picture = $name;
        $newEvent->description = $request->description;
        $newEvent->from = $request->starts;
        $newEvent->to = $request->ends;
        $newEvent->min_team = $request->min_team;
        $newEvent->max_team = $request->max_team;
        $newEvent->location = $request->location;
        if ($request->type == 'is_team') {
            $newEvent->is_team = '1';
            $newEvent->is_module = '0';
        } else {
            $newEvent->is_team = '0';
            $newEvent->is_module = '1';
        }
        $newEvent->visibility = $request->visibility;
        $newEvent->save();

        $message = __('Успешно създадено събитие '.ucfirst($data['name']).'!');
        return redirect()->route('admin.events')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->min_team = (int)$request->min_team;
        $request->max_team = (int)$request->max_team;
        $event = Event::find($id);
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $request['valid_type'] = ['is_team','is_module'];
        $data = $request->validate([
            'picture' => 'file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'description' => 'required|max:200',
            'starts' => 'required|date_format:Y-m-d',
            'ends' => 'required|date_format:Y-m-d|after:starts',
            'type' => 'required|in_array:valid_type.*',
            'visibility' => 'required|in_array:valid_visibility.*',
            'min_team' => 'numeric|min:1|max:99',
            'max_team' => 'numeric|min:'.$request->min_team.'|max:99',
        ]);
        if (Input::file('picture')) {
            $eventPicRemove = public_path().'/images/events/'.$event->picture;
            File::delete($eventPicRemove);
            $eventPic = Input::file('picture');
            $image = Image::make($eventPic->getRealPath());
            $image->fit(800, 600, function ($constraint) {
                $constraint->upsize();
            });
            $name = time()."_".$eventPic->getClientOriginalName();
            $name = str_replace(' ', '', strtolower($name));
            $name = md5($name);
            $path = public_path().'/images/events';

            if ($eventPic->getClientOriginalExtension() == 'gif') {
                copy($eventPic->getRealPath(), public_path().'/images/events');
            } else {
                $image->save(public_path().'/images/events/'.$name, 90);
            }
            $event->picture = $name;
        }

        $event->name = $request->name;
        $event->description = $request->description;
        $event->from = $request->starts;
        $event->to = $request->ends;
        $event->location = $request->location;
        $event->min_team = $request->min_team;
        $event->max_team = $request->max_team;
        if ($request->type == 'is_team') {
            $event->is_team = '1';
            $event->is_module = '0';
        } else {
            $event->is_team = '0';
            $event->is_module = '1';
        }
        $event->visibility = $request->visibility;
        $event->save();

        $message = __('Успешно направени промени по събитие '.ucfirst($data['name']).'!');
        return redirect()->route('admin.events')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteEvent = Event::find($id);
        if (!is_null($deleteEvent->picture)) {
            $eventPic = public_path().'/images/events/'.$deleteEvent->picture;
            File::delete($eventPic);
        }
        $deleteEvent->delete();

        $message = __('Успешно изтрито Събитие!');
        return redirect()->route('admin.events')->with('success', $message);
    }

    public function registerTeam(Event $event)
    {
        if (!Auth::user()->isConfirmedMember($event->id)) {
            $teamCategories = TeamCategory::all();
            $stacks = \Config::get('tehnologyStack');
            $user = User::find(Auth::user()->id);
            $occupations = Occupation::all();
            $sizes = ShirtSize::all();
            return view('events.teams-register', ['event' => $event,'categories' => $teamCategories,'stacks' => $stacks, 'user' => $user,'occupations' => $occupations,'sizes' => $sizes]);
        }
        $message = __('Вече сте записан за това събитие!');
        return redirect()->back()->with('error', $message);
    }

    public function storeTeam(Event $event, Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->validate([
            'team_picture' => 'required|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required|max:20',
            'team_category' => 'required|numeric',
            'technologyStack' => 'required',
            'git' => 'required',
            'slogan' => 'required',
            'inspiration' => 'sometimes|max:200',
            'occupation' => 'required|numeric',
            'shirt_size' => 'required|numeric|',
            'invite_member_email.*' => 'sometimes|email',
        ]);
        $user->cl_occupation_id = $request->occupation;
        $user->save();

        $teamPic = Input::file('team_picture');
        $image = Image::make($teamPic->getRealPath());
        $image->fit(800, 600, function ($constraint) {
            $constraint->upsize();
        });
        $picName = time()."_".$teamPic->getClientOriginalName();
        $picName = str_replace(' ', '', strtolower($picName));
        $picName = md5($picName);

        if ($teamPic->getClientOriginalExtension() == 'gif') {
            copy($coursePic->getRealPath(), public_path().'/images/events/teams/'.$picName);
        } else {
            $image->save(public_path().'/images/events/teams/'.$picName, 90);
        }

        $denyInvites = TeamMember::where('user_id',Auth::user()->id)->orWhere('email',Auth::user()->email)->first();
        $denyInvites->confirmed = -1;
        $denyInvites->save();

        $newTeam = new Team;
        $newTeam->events_id = $event->id;
        $newTeam->title = $request->name;
        $newTeam->picture = $picName;
        $newTeam->slogan = $request->slogan;
        $newTeam->event_team_category_id = $request->team_category;
        $newTeam->technology_stack = $request->technologyStack;
        $newTeam->inspiration = $request->inspiration;
        $newTeam->github = $request->git;
        $newTeam->is_active = 0;
        $newTeam->members_count = 1;
        $newTeam->save();

        $role = UsersTeamRole::where('role', 'капитан')->select('id')->first();
        $newMemberCapitan = new TeamMember;
        $newMemberCapitan->user_id = $user->id;
        $newMemberCapitan->cl_users_team_role_id = $role->id;
        $newMemberCapitan->cl_users_shirts_size_id = $request->shirt_size;
        $newMemberCapitan->event_team_id = $newTeam->id;
        $newMemberCapitan->confirmed = 1;
        $newMemberCapitan->save();

        if (!is_null($request->invite_member_email) && isset($request->invite_member_email)) {
            $isMemberExisting = User::whereIn('email', $request->invite_member_email)->get();
            $role = UsersTeamRole::where('role', 'участник')->select('id')->first();
            if (count($isMemberExisting) > 0) {
                foreach ($isMemberExisting as $key => $userExist) {
                    $newMember = new TeamMember;
                    $newMember->user_id = $userExist->id;
                    $newMember->cl_users_team_role_id = $role->id;
                    $newMember->event_team_id = $newTeam->id;
                    $newMember->confirmed = 0;
                    $newMember->save();
                }
            } else {
                $members = TeamMember::where('event_team_id', $newTeam->id)->get();
                $allTeamMembers = [];
                if (count($members) > 0) {
                    $allTeamMembers = $members;
                }
                foreach ($request->invite_member_email as $email) {
                    $newMember = new TeamMember;
                    $newMember->email = $email;
                    $newMember->cl_users_team_role_id = $role->id;
                    $newMember->event_team_id = $newTeam->id;
                    $newMember->confirmed = 0;
                    $newMember->save();
                    Mail::to($email)->send(new InviteMember($user, $newTeam, $event));
                }
            }
        }

        $message = __('Успешно създаден Отбор - '.$request->name.'!');
        return redirect()->route('users.events')->with('success', $message);
    }

    public function inviteDeny($team)
    {
        $teamMember = TeamMember::where([
            ['event_team_id',$team],
            ['user_id', Auth::user()->id],
        ])
        ->orWhere([
            ['event_team_id',$team],
            ['email', Auth::user()->email],
        ])
        ->first();
        $teamMember->user_id = Auth::user()->id;
        $teamMember->email = Auth::user()->email;
        $teamMember->confirmed = -1;
        $teamMember->save();

        // $team = Team::find($team);
        // $team->members_count = ($team->members_count - 1);
        // $team->save();

        $message = __('Успешно отхвърлихте поканата за влизане в отбор!');
        return redirect()->route('users.events')->with('success', $message);
    }

    public function inviteAccept(Event $event, $team)
    {
        $team = Team::with('Members')->find($team);
        $teamMember = TeamMember::where([
            ['event_team_id',$team->id],
            ['user_id', Auth::user()->id],
        ])
        ->orWhere([
            ['event_team_id',$team->id],
            ['email', Auth::user()->email],
        ])
        ->first();
        $teamMember->user_id = Auth::user()->id;
        $teamMember->save();
        $user = User::find(Auth::user()->id);
        $occupations = Occupation::all();
        $sizes = ShirtSize::all();

        return view('events.team_join', ['teamMember'=>$teamMember->id,'event' => $event, 'team' => $team,'user' => $user,'sizes' => $sizes,'occupations' => $occupations]);
    }

    public function confirmInvite(Request $request, Event $event, Team $team, TeamMember $teamMember)
    {
        $data = $request->validate([
            'occupation' => 'required|numeric',
            'shirt_size' => 'required|numeric',
        ]);
        $user = User::find(Auth::user()->id);
        $user->cl_occupation_id = $request->occupation;
        $user->save();

        if ($team->members_count <= $event->max_team) {
            $teamMember->confirmed = 1;
            $teamMember->cl_users_shirts_size_id = $request->shirt_size;
            $teamMember->save();

            $newMemberCount = ($team->members_count+1);
            $team->members_count = $newMemberCount;


            if ($newMemberCount >= $event->min_team) {
                $team->is_active = 1;
            }
            $team->save();

            $message = __('Успешно потвърдихте поканата за влизане в отбор!');
            return redirect()->route('users.events')->with('success', $message);
        } else {
            $message = __('Отбора вече е пълен');
            return redirect()->route('users.events')->with('error', $message);
        }
    }

    public function inviteToTeam(Request $request, Team $team,Event $event)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        $memberPlus = ($team->members_count + 1);

        if($memberPlus <= $event->max_team){
            $capitan = User::find(Auth::user()->id);

            $role = UsersTeamRole::where('role', 'участник')->select('id')->first();

            $isExisting = TeamMember::where('email', $request->email)->first();
            if(is_null($isExisting)){
                $newMember = new TeamMember;
                $newMember->email = $request->email;
                $newMember->cl_users_team_role_id = $role->id;
                $newMember->event_team_id = $team->id;
                $newMember->confirmed = 0;
                $newMember->save();

                // $team->members_count = $memberPlus;
                // $team->save();
                Mail::to($request->email)->send(new InviteMember($capitan, $team, $event));

                $message = __('Успешно изпратихте покана за влизане в отбор!');
                return redirect()->route('users.events')->with('success', $message);
            }
            $message = __('Вече сте изпратили покана на този Е-mail!');
            return redirect()->route('users.events')->with('error', $message);
        }
        $message = __('Капацитета на отбора ви е пълен!');
        return redirect()->route('users.events')->with('error', $message);
    }
}
