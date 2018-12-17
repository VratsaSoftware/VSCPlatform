<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModules\ModulesStudent;
use App\Models\Courses\Course;
use App\Models\Courses\CourseModule;
use App\Models\Courses\CourseLecturer;
use App\Models\Users\SocialLink;
use App\Models\Users\EducationType;

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


        $educationTypes = EducationType::all();
        $education = [];
        $certificates = [];
        $course = [];
        $workExp = [];
        if($hasEducation){
            $education = Auth::user()->getEducation();
        }
        if($hasCertification){
            $certificates = Auth::user()->getCertificates();
        }
        if($isOnCourse){
            $course = Auth::user()->getCourse();
        }
        if ($hasWorkExp) {
           $workExp = Auth::user()->getWorkExp();
        }

        if($isAdmin){
            $courses = Course::all();
            return view('user.my_profile',['courses' => $courses,'social_links' => $socialLinks,'certificates' => $certificates]);
        }
        if($isLecturer){
            $courses = Course::with('Lecturers')->whereHas('Lecturers',function($query) use ($userId){
                $query->where('user_id',$userId);
            })->get();
            return view('user.my_profile',['courses' => $courses,'social_links' => $socialLinks,'certificates' => $certificates]);
        }
        return view('user.my_profile',['courses' => $course,'social_links' => $socialLinks,'certificates' => $certificates,'education' => $education,'eduTypes' => $educationTypes,'workExp' => $workExp]);
    }
}
