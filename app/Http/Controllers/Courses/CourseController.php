<?php

namespace App\Http\Controllers\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\Courses\CourseLecturer;
use App\Models\CourseModules\Module;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'picture' => 'required|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'description' => 'sometimes',
            'starts' => 'required|date_format:Y-m-d',
            'ends' => 'required|date_format:Y-m-d|after:starts',
            'visibility' => 'required|in_array:valid_visibility.*'
        ]);
        $coursePic = Input::file('picture');
        $image = Image::make($coursePic->getRealPath());
        $name = time()."_".$coursePic->getClientOriginalName();
        $name = str_replace(' ', '', strtolower($name));
        $name = md5($name);

        $data['picture'] = $name;
        $createCourse = Course::create($data);
        $insLecturer = new CourseLecturer;
        $insLecturer->course_id = $createCourse->id;
        $insLecturer->user_id = Auth::user()->id;
        $insLecturer->save();

        if ($coursePic->getClientOriginalExtension() == 'gif') {
            copy($coursePic->getRealPath(), public_path().'/images/course-'.$data['name']);
        } else {
            $folder = mkdir(public_path().'/images/course-'.$data['name'].'-'.$createCourse->id, 666, true);
            $image->save(public_path().'/images/course-'.$data['name'].'-'.$createCourse->id.'/'.$name, 50);
        }

        $message = __('Успешно създаден курс '.ucfirst($data['name']).'!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUserCourse($user = 0, Course $course)
    {
        $modules = Course::getModules($course->id);
        $courses = [];
        if (Auth::user()) {
            $courses = Auth::user()->studentGetCourse();
        }
        return view('user.course', ['courses' => $courses,'course' => $course,'modules' => $modules]);
    }

    public function showLecturerCourse(Course $course)
    {
        $modules = Course::getModules($course->id);

        return view('lecturer.course', ['course' => $course,'modules' => $modules]);
    }

    public function showLecturerModule($module = null)
    {
        dd($module);
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
        //
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
