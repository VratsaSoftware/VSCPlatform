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
        $isOnCourse = Course::with('Modules','Modules.ModulesStudent','Modules.ModulesStudent.User')->whereHas('Modules.ModulesStudent',function ($query) use($userId) {
            $query->where('user_id',$userId);
        })->get();
        $socialLinks = SocialLink::with('SocialName')->where('user_id',$userId)->get();
        if(!$isOnCourse->isEmpty()){
            return view('user.my_profile',['courses' => $isOnCourse,'social_links' => $socialLinks]);
        }
        if($isAdmin){
            $courses = Course::all();
            return view('user.my_profile',['courses' => $courses,'social_links' => $socialLinks]);
        }
        if($isLecturer){
            $courses = Course::with('Lecturers')->whereHas('Lecturers',function($query) use ($userId){
                $query->where('user_id',$userId);
            })->get();
            return view('user.my_profile',['courses' => $courses,'social_links' => $socialLinks]);
        }
        return view('user.my_profile',['courses' => [],'social_links' => $socialLinks]);
    }
}
