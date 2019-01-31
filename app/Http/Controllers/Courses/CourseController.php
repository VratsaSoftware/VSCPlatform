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
use Illuminate\Support\Facades\Storage;

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

        $folder = mkdir(public_path().'/images/course-'.$createCourse->id, 0777, true);
        if ($coursePic->getClientOriginalExtension() == 'gif') {
            copy($coursePic->getRealPath(), public_path().'/images/course-'.$createCourse->id);
        } else {
            $image->save(public_path().'/images/course-'.$createCourse->id.'/'.$name, 50);
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
        $modules = Course::getModules($course->id, $isLecturer = false);
        $courses = [];
        if (Auth::user()) {
            $courses = Auth::user()->studentGetCourse();
        }
        return view('user.course', ['courses' => $courses,'course' => $course,'modules' => $modules]);
    }

    public function showLecturerCourse(Course $course)
    {
        $modules = Course::getModules($course->id, $isLecturer = true);

        return view('lecturer.course', ['course' => $course,'modules' => $modules]);
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
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'picture2' => 'sometimes|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'description' => 'sometimes',
            'starts' => 'required|date_format:Y-m-d',
            'ends' => 'required|date_format:Y-m-d|after:starts',
            'visibility' => 'required|in_array:valid_visibility.*'
        ]);
        $course = Course::find($id);
        if (Input::file('picture2')) {
            $coursePic = Input::file('picture2');
            $image = Image::make($coursePic->getRealPath());
            $name = time()."_".$coursePic->getClientOriginalName();
            $name = str_replace(' ', '', strtolower($name));
            $name = md5($name);

            if (file_exists(public_path().'/images/course-'.$course->id.'/'.$course->picture)) {
                File::delete(public_path().'/images/course-'.$course->id.'/'.$course->picture);
            }

            if ($coursePic->getClientOriginalExtension() == 'gif') {
                copy($coursePic->getRealPath(), public_path().'/images/course-'.$course->id.'/'.$name);
            } else {
                $image->save(public_path().'/images/course-'.$course->id.'/'.$name, 50);
            }
            $course->picture = $name;
        }

        $course->name = $request->name;
        $course->description = $request->description;
        $course->starts = $request->starts;
        $course->ends = $request->ends;
        $course->visibility = $request->visibility;
        $course->save();

        $message = __('Успешно направени промени!');
        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCourse = Course::find($id);
        $deleteCourse->delete();

        $message = __('Успешно изтрит курс!');
        return redirect()->route('myProfile')->with('success', $message);
    }
}
