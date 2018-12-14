<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\SocialLink;
use App\Models\CourseModules\ModulesStudent;
use App\Models\Courses\Course;
use App\Models\Courses\CourseModule;
use App\Models\Courses\CourseLecturer;
use App\Models\Users\EducationType;
use App\Models\Users\Education;
use App\Models\Users\EducationInstitution;
use App\Models\Users\EducationSpeciality;
use App\Models\Users\VisibleInformation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
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
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'picture' => 'file|image|mimes:jpeg,png,gif,webp,ico|max:4000',
            'name' => 'sometimes',
            'location' => 'sometimes',
            'dob' => 'sometimes|date_format:Y-m-d|before:'.Carbon::now(),
            'email' => ['sometimes','unique:users']
        ]);
        if (Input::hasFile('picture')) {
            $userPic = Input::file('picture');
            $image = Image::make($userPic->getRealPath());
            $name = time()."_".$userPic->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $name = md5($name);
            $oldImage = public_path().'/images/user-pics/'.$user->picture;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            $user->picture = $name;
            if ($userPic->getClientOriginalExtension() == 'gif') {
                copy($userPic->getRealPath(), public_path().'/images/user-pics/'.$name);
            } else {
                $image->save(public_path().'/images/user-pics/'.$name, 50);
            }
        }
        if ($request->has('name')) {
            $name = explode(" ", $data['name']);
            $user->name = $name[0];
            $user->last_name = $name[1];
        }
        if ($request->has('location')) {
            $user->location = $data['location'];
        }
        if ($request->has('dob')) {
            $user->dob = $data['dob'];
        }
        if ($request->has('email')) {
            $user->email = $data['email'];
        }
        $updateLinks = SocialLink::updateLinks($user->id, $request);
        $user->save();
        $message = __('Успешно направени промени!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function createEducation(Request $request)
    {
        $request['valid_instTypes'] = \Config::get('institutionTypes');
        $data = $request->validate([
            'y_from' => 'required|date|date_format:Y-m-d',
            'y_to' => 'required|date|date_format:Y-m-d',
            'edu_type' => 'required|numeric',
            'edu_institution_type' => "required|in_array:valid_instTypes.*",
            'institution_name' => 'required|string',
            'specialty' => 'string',
        ]);

        $eduInstitution = EducationInstitution::firstOrCreate(
            ['type' => $request->edu_institution_type,'name' => $request->institution_name]
        );

        $eduSpeciality = EducationSpeciality::firstOrCreate(
            ['name' => $request->specialty]
        );
        $request['institution_id'] = $eduInstitution->id;
        $request['specialty_id'] = $eduSpeciality->id;
        $existing = Education::isExisting(Auth::user()->id, $request);
        if(!$existing){
            $insEdu = new Education;
            $insEdu->user_id = Auth::user()->id;
            $insEdu->y_from = $request->y_from;
            $insEdu->y_to = $request->y_to;
            $insEdu->cl_education_type_id = $request->edu_type;
            $insEdu->institution_id = $eduInstitution->id;
            $insEdu->specialty_id = $eduSpeciality->id;
            $insEdu->description = $request->edu_description;
            $insEdu->save();

            $message = __('Успешно добавено Образование!');
            return redirect()->route('myProfile')->with('success', $message);
        }
        $message = __('Вече съществува такова Образование за този Потребител!');
        return redirect()->route('myProfile')->with('error', $message);
    }

    public function updateEducation(Request $request)
    {
        $request['valid_instTypes'] = \Config::get('institutionTypes');
        $data = $request->validate([
            'y_from' => 'required|date|date_format:Y-m-d',
            'y_to' => 'required|date|date_format:Y-m-d',
            'edu_type' => 'required|numeric',
            'edu_institution_type' => "required|in_array:valid_instTypes.*",
            'institution_name' => 'required|string',
            'specialty' => 'string',
        ]);
        $updEdu = Education::find($request->edu_id);
        $updEdu->y_from = $request->y_from;
        $updEdu->y_to = $request->y_to;
        $updEdu->cl_education_type_id = $request->edu_type;
        $eduInstitution = EducationInstitution::firstOrCreate(
            ['type' => $request->edu_institution_type,'name' => $request->institution_name]
        );
        $updEdu->institution_id = $eduInstitution->id;
        $eduSpeciality = EducationSpeciality::firstOrCreate(
            ['name' => $request->specialty]
        );
        $updEdu->specialty_id = $eduSpeciality->id;
        $updEdu->description = $request->edu_description;
        $updEdu->save();

        $message = __('Успешно направени промени в секция Образование!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function deleteEducation(Education $education){
        $education->delete();
        $message = __('Успешно изтрито Образование!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function changeVisibility(Request $request)
    {   
        $type = json_decode(json_encode($request->type));
        $visibility = json_decode(json_encode($request->visibility));

        if(in_array($type, \Config::get('userInformationTypes'))){
            $changeVis = VisibleInformation::where([
                    ['user_id', Auth::user()->id],
                    ['information_type',$type]
            ])->first();
            if(!is_null($changeVis)){
                $changeVis->visible = $visibility;
                $changeVis->save();
                return;
            }
            $insVis = new VisibleInformation;
            $insVis->user_id = Auth::user()->id;
            $insVis->information_type = $type;
            $insVis->visible = $visibility;
            $insVis->save();
        }
    }

     public function eduAutocomplete(Request $request)
    {
        $term = $request->search;
        if('institution' == $request->type){
            $queries = EducationInstitution::where('name', 'like', $term.'%')
            ->orWhere('name', 'like', '%'.$term.'%')
            ->orWhere('name', 'like', '%'.$term)
            ->take(3)
            ->get();
        }else{
            $queries = EducationSpeciality::where('name', 'like', $term.'%')
            ->orWhere('name', 'like', '%'.$term.'%')
            ->orWhere('name', 'like', '%'.$term)
            ->take(3)
            ->get();
        }
        $results = [];
        if(!$queries->isEmpty()){
            foreach ($queries as $query){
                    $results[] = ['name' => $query->name];
            }
        }
        return $results;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
