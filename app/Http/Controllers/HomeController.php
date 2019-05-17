<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModules\ModulesStudent;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;
use App\Models\Courses\CourseLecturer;
use App\Models\Users\SocialLink;
use App\Models\Users\EducationType;
use App\Models\Users\InterestsType;
use App\Models\Users\Interest;
use App\Models\Users\Hobbie;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Users\Subscribe;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $isAdmin = Auth::user()->isAdmin();
        $isLecturer = Auth::user()->isLecturer();
        $hasEducation = Auth::user()->hasEducation();
        $hasCertification = Auth::user()->hasCertification();
        $isOnCourse = Auth::user()->isOnCourse();
        $socialLinks = Auth::user()->getSocialLinks();
        $hasWorkExp = Auth::user()->hasWorkExp();
        $hasHobbies = Auth::user()->hasHobbies();
        $isInvited = Auth::user()->isEventInvited('not_confirmed');

        $educationTypes = EducationType::all();
        $education = [];
        $certificates = [];
        $course = [];
        $workExp = [];
        $interestTypes = InterestsType::all();
        $hobbies = [];
        $interests = [];
        if ($hasEducation) {
            $education = Auth::user()->getEducation();
        }
        if ($hasCertification) {
            $certificates = Auth::user()->getCertificates();
        }
        if ($isOnCourse) {
            $course = Auth::user()->studentGetCourse();
        }
        if ($hasWorkExp) {
            $workExp = Auth::user()->getWorkExp();
        }
        if ($hasHobbies) {
            $hobbies = Auth::user()->getHobbies();
        }

        if ($isAdmin) {
            $courses = Course::where('ends', '>', Carbon::now()->format('Y-m-d H:m:s'))->get();
            $lecturer = User::find(Auth::user()->id);
            return view('admin.my_profile', ['social_links' => $socialLinks,'certificates' => $certificates,'courses' => $courses,'lecturer' => $lecturer]);
        }
        if ($isLecturer) {
            $courses = Course::with('Lecturers')->whereHas('Lecturers', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->orderBy('created_at', 'desc')->get();
            $lecturer = User::find(Auth::user()->id);
            return view('lecturer.my_profile', ['social_links' => $socialLinks,'courses' => $courses, 'lecturer' => $lecturer]);
        }
        return view('user.my_profile', ['social_links' => $socialLinks,'certificates' => $certificates,'education' => $education,'eduTypes' => $educationTypes,'workExp' => $workExp,'hobbies' => $hobbies,'interestTypes' => $interestTypes,'isInvited' => $isInvited]);
    }

    public function subscribe($email)
    {
        $inputemail = ['email' => $email];
        $validatorEmail = Validator::make($inputemail, [
                'email' => 'email|unique:subscribers',
        ]);
        if(!$validatorEmail->fails()){
            $insertSubscribe = new Subscribe;
            $insertSubscribe->email = $email;
            $insertSubscribe->save();

            return response()->json('ok',200);
        }
        return response()->json('error',400);
    }
}
