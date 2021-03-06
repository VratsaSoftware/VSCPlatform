<?php

namespace App\Http\Controllers\Users;

use App\Models\Courses\PersonalCertificate;
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
use App\Models\Courses\CourseLecturer;
use App\Models\Users\EducationType;
use App\Models\Users\Education;
use App\Models\Users\EducationInstitution;
use App\Models\Users\EducationSpeciality;
use App\Models\Users\VisibleInformation;
use App\Models\Users\WorkCompany;
use App\Models\Users\WorkExperience;
use App\Models\Users\WorkPosition;
use App\Models\Users\Hobbie;
use App\Models\Users\Interest;

class UserController extends Controller
{
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
            'name' => 'sometimes|string|min:3|max:25|',
            'location' => 'sometimes|min:3|max:10|string|',
            'dob' => 'sometimes|date_format:Y-m-d|before:'.Carbon::now().'|after:1950-01-01',
            'email' => ['sometimes','unique:users','email'],
            'facebook' => 'nullable|url|min:5|max:250',
            'linkedin' => 'nullable|url|min:5|max:250',
            'github' => 'nullable|url|min:5|max:250',
            'skype' => 'nullable|url|min:5|max:250',
            'dribbble' => 'nullable|url|min:5|max:250',
            'behance' => 'nullable|url|min:5|max:250',
        ]);
        if (Input::hasFile('picture')) {
            $userPic = Input::file('picture');
            $image = Image::make($userPic->getRealPath());
            $image->fit(1280,1280, function ($constraint) {
                $constraint->upsize();
            });
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
                $image->save(public_path().'/images/user-pics/'.$name, 90);
            }
        }

        if (isset($data['name']) && !is_null($data['name'])) {
            $name = explode(" ", $data['name']);
            $user->name = $data['name'];
            $user->last_name = "";
            if (isset($name[0]) && isset($name[1])) {
                $user->name = $name[0];
                // array_shift($name);
                // $user->last_name = implode(" ", $name);
                $user->last_name = $name[1];
            }
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
        $request['valid_types'] = \Config::get('eduTypes');
        $data = $request->validate([
            'y_from' => 'required|numeric|min:1900|max:2099',
            'y_to' => 'sometimes|nullable|numeric|min:'.((int)$request->y_from-1).'|max:2099',
            'edu_type' => 'required|numeric',
            'edu_institution_type' => "required|in_array:valid_instTypes.*",
            'institution_name' => 'required|string',
            'specialty' => 'string',
            'edu_course' => 'sometimes',
            'edu_type_second' => 'sometimes|in_array:valid_types.*'
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
        if (!$existing) {
            $insEdu = new Education;
            $insEdu->user_id = Auth::user()->id;
            $insEdu->y_from = $request->y_from;
            $insEdu->y_to = $request->y_to;
            $insEdu->cl_education_type_id = $request->edu_type;
            $insEdu->institution_id = $eduInstitution->id;
            $insEdu->specialty_id = $eduSpeciality->id;
            $insEdu->description = $request->edu_description;
            if($request->edu_type_second !== 'null') {
                $insEdu->type = $request->edu_type_second;
            }
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
        $request['valid_types'] = \Config::get('eduTypes');
        $data = $request->validate([
            'y_from' => 'required|numeric|min:1900|max:2099',
            'y_to' => 'sometimes|nullable|numeric|min:'.((int)$request->y_from-1).'|max:2099',
            'edu_type' => 'required|numeric',
            'edu_institution_type' => "required|in_array:valid_instTypes.*",
            'institution_name' => 'required|string',
            'specialty' => 'string',
            'edu_type_second' => 'sometimes|in_array:valid_types.*'
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
        if($request->edu_type_second !== 'null') {
            $updEdu->type = $request->edu_type_second;
        }
        $updEdu->save();

        $message = __('Успешно направени промени в секция Образование!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function deleteEducation(Education $education)
    {
        $education->delete();
        $message = __('Успешно изтрито Образование!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function createWorkExperience(Request $request)
    {
        $data = $request->validate([
            'y_from' => 'required|date|date_format:Y-m-d',
            'y_to' => 'sometimes|nullable|date|date_format:Y-m-d',
            'work_company' => 'required|string',
            'work_position' => "required|string",
        ]);

        $createWorkExp = new WorkExperience;
        $createWorkExp->user_id = Auth::user()->id;
        $createWorkExp->y_from = $request->y_from;
        if(!is_null($request->y_to)) {
            $createWorkExp->y_to = $request->y_to;
        }
        $workCompany = WorkCompany::firstOrCreate(
            ['name' => $request->work_company]
        );
        $createWorkExp->company_id = $workCompany->id;
        $createWorkExp->description = $request->description;
        $workPosition = WorkPosition::firstOrCreate(
            ['position' => $request->work_position]
        );
        $createWorkExp->position_id = $workPosition->id;
        $createWorkExp->save();
        $message = __('Успешно добавен Работен Опит!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function updateWorkExperience(Request $request)
    {
        $data = $request->validate([
            'y_from' => 'required|date|date_format:Y-m-d',
            'y_to' => 'required|date|date_format:Y-m-d',
            'work_company' => 'required|string',
            'work_position' => "required|string",
        ]);

        $updWorkExp = WorkExperience::find($request->work_id);
        $updWorkExp->y_from = $request->y_from;
        $updWorkExp->y_to = $request->y_to;
        $workCompany = WorkCompany::firstOrCreate(
            ['name' => $request->work_company]
        );
        $updWorkExp->company_id = $workCompany->id;
        $updWorkExp->description = $request->work_description;
        $workPosition = WorkPosition::firstOrCreate(
            ['position' => $request->work_position]
        );
        $updWorkExp->position_id = $workPosition->id;
        $updWorkExp->save();
        $message = __('Успешно направени промени в секция Работен Опит!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function deleteWorkExperience(WorkExperience $experience)
    {
        $experience->delete();
        $message = __('Успешно изтрит Работен Опит!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function createHobbies(Request $request)
    {
        $data = $request->validate([
            'int_type' => 'required|numeric|min:1',
            'interests' => 'sometimes|numeric|min:1',
            'int_other' => 'sometimes|string|max:255',
        ]);

        if (!empty($request->interests)) {
            $interest = Interest::find($request->interests);
            $interestCheck = Interest::firstOrCreate(
                ['cl_users_interest_type_id' => $request->int_type,'name' => $interest->name]
            );
            $insertHobbie = Hobbie::firstOrCreate(
                ['cl_interest_id' => $interestCheck->id,'user_id' => Auth::user()->id]
            );
        }

        if (!empty($request->int_other)) {
            $interestCheck = Interest::firstOrCreate(
                ['cl_users_interest_type_id' => $request->int_type,'name' => $request->int_other]
            );

            $insertHobbie = Hobbie::firstOrCreate(
                ['cl_interest_id' => $interestCheck->id,'user_id' => Auth::user()->id]
            );
        }

        $message = __('Успешно добавени интереси/хобита!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function deleteHobbie(Hobbie $hobbie)
    {
        $hobbie->delete();
        $message = __('Успешно изтрит интерес/хоби!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function changeVisibility(Request $request)
    {
        $type = json_decode(json_encode($request->type));
        $visibility = json_decode(json_encode($request->visibility));

        if (in_array($type, \Config::get('userInformationTypes'))) {
            $changeVis = VisibleInformation::where([
                ['user_id', Auth::user()->id],
                ['information_type',$type]
            ])->first();
            if (!is_null($changeVis)) {
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
        if ('institution' == $request->type) {
            $queries = EducationInstitution::where('name', 'like', $term.'%')
                ->orWhere('name', 'like', '%'.$term.'%')
                ->orWhere('name', 'like', '%'.$term)
                ->take(3)
                ->get();
        } else {
            $queries = EducationSpeciality::where('name', 'like', $term.'%')
                ->orWhere('name', 'like', '%'.$term.'%')
                ->orWhere('name', 'like', '%'.$term)
                ->take(3)
                ->get();
        }
        $results = [];
        if (!$queries->isEmpty()) {
            foreach ($queries as $query) {
                $results[] = ['name' => $query->name];
            }
        }
        return $results;
    }

    public function getInterests($type)
    {
        return response()->json(Interest::where('cl_users_interest_type_id', $type)->get());
    }

    public function updateBio(Request $request)
    {
        $updateBio = User::find(Auth::user()->id);
        $updateBio->bio = $request->bio;
        $updateBio->save();

        $message = __('Успешно направени промени!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    public function showCertificate($user,$course)
    {
        $personalCertificate = PersonalCertificate::where([
            ['user_id',$user],
            ['course_id',$course]
        ])->first();

        if(isset($personalCertificate) && $personalCertificate){
            $personalCertificate->modules = explode(",", $personalCertificate->modules);

            $mainTemplate = View('certifications.templates.main', [
                'number' => $personalCertificate->number,
                'color' => $personalCertificate->color,
                'title' => $personalCertificate->title,
                'subTitle' => $personalCertificate->sub_title,
                'modules' => $personalCertificate->modules,
                'username' => $personalCertificate->username,
                'lecturer' => $personalCertificate->lecturer,
                'date' => $personalCertificate->date->format('d/m/Y'),
                'images' => 0,
                'imageLeft' => '',
                'imageRight' => '',
                'centerLogo' => $personalCertificate->center_logo,
            ]);
            return $mainTemplate;
        }
        return back()->with('error','Все още нямате сертификат!');
    }
}
