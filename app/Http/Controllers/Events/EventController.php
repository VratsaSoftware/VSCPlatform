<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events\Event;
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
        $teamCategories = TeamCategory::all();
        $stacks = \Config::get('tehnologyStack');
        $user = User::find(Auth::user()->id);
        $occupations = Occupation::all();
        $sizes = ShirtSize::all();
        return view('events.teams-register', ['event' => $event,'categories' => $teamCategories,'stacks' => $stacks, 'user' => $user,'occupations' => $occupations,'sizes' => $sizes]);
    }
}
