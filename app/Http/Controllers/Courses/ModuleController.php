<?php

namespace App\Http\Controllers\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\ModulesStudent;
use App\Models\CourseModules\LectionComment;
use App\User;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Validator;

class ModuleController extends Controller
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
    public function create(Request $request)
    {
        $course = Course::find($request->course);
        $users = User::whereHas('Role', function ($q) {
            $q->where('role', 'user');
        })->get();
        $modules = Module::where('course_id', $course->id)->get();

        return view('course.module.create', ['users' => $users,'course' => $course,'modules' => $modules]);
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
            'description' => 'required',
            'starts' => 'required|date_format:Y-m-d',
            'ends' => 'required|date_format:Y-m-d|after:starts',
            'visibility' => 'required|in_array:valid_visibility.*',
            'course_id' => 'required|numeric|exists:courses,id',
            'order' => 'required|numeric',
            'students' => 'sometimes|array',
        ]);

        $modulePic = Input::file('picture');
        $image = Image::make($modulePic->getRealPath());
        $name = time()."_".$modulePic->getClientOriginalName();
        $name = str_replace(' ', '', strtolower($name));
        $name = md5($name);

        $createModule = new Module;
        $createModule->course_id = $request->course_id;
        $createModule->order = $request->order;
        $createModule->name = $request->name;
        $createModule->description = $request->description;
        $createModule->picture = $name;
        $createModule->starts = $request->starts;
        $createModule->ends = $request->ends;
        $createModule->visibility = $request->visibility;
        $createModule->save();

        $course = Course::find($request->course_id);
        if ($modulePic->getClientOriginalExtension() == 'gif') {
            copy($modulePic->getRealPath(), public_path().'/images/course-'.$course->id.'/module-'.$createModule->id.'/'.$name);
        } else {
            $folder = mkdir(public_path().'/images/course-'.$course->id.'/module-'.$createModule->id, 0777, true);
            $image->save(public_path().'/images/course-'.$course->id.'/module-'.$createModule->id.'/'.$name, 50);
        }

        if (isset($data['students'])) {
            foreach ($request->students as $student) {
                $addStudent = new ModulesStudent;
                $addStudent->course_modules_id = $createModule->id;
                $addStudent->user_id = $student;
                $addStudent->save();
            }
        }

        $message = __('Успешно създаден Модул '.ucfirst($data['name']).'!');
        return redirect()->route('lecturer.show.course', ['course' => $request->course_id])->with('success', $message);
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
    public function edit(Module $module)
    {
        $lections = Module::getLections($module->id, true);
        $students = ModulesStudent::where('course_modules_id', $module->id)->with('User')->get();
        $module = $module->load('Course');

        return view('course.module.edit', ['module' => $module,'lections' => $lections, 'students' => $students]);
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
            'picture' => 'sometimes|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'sometimes',
            'description' => 'sometimes',
            'starts' => 'sometimes|date_format:Y-m-d',
            'ends' => 'sometimes|date_format:Y-m-d|after:starts',
            'visibility' => 'sometimes|in_array:valid_visibility.*',
            'course_id' => 'sometimes|numeric|exists:courses,id',
            'order' => 'sometimes|numeric',
            'students' => 'sometimes|array',
        ]);
        $module = Module::find($id);
        if (Input::hasFile('picture')) {
            $modulePic = Input::file('picture');
            $image = Image::make($modulePic->getRealPath());
            $name = time()."_".$modulePic->getClientOriginalName();
            $name = str_replace(' ', '', strtolower($name));
            $name = md5($name);
            $course = Course::find($request->course_id);
            if (file_exists(public_path().'/images/course-'.$course->id.'/module-'.$module->id.'/'.$module->picture)) {
                File::delete(public_path().'/images/course-'.$course->id.'/module-'.$module->id.'/'.$module->picture);
            }
            if ($modulePic->getClientOriginalExtension() == 'gif') {
                copy($modulePic->getRealPath(), public_path().'/images/course-'.$course->id.'/module-'.$module->id.'/'.$name);
            } else {
                $image->save(public_path().'/images/course-'.$course->id.'/module-'.$module->id.'/'.$name, 50);
            }
            $module->picture = $name;
        }

        $module->course_id = $request->course_id;
        $module->order = $request->order;
        $module->name = $request->name;
        $module->description = $request->description;

        $module->starts = $request->starts;
        $module->ends = $request->ends;
        $module->visibility = $request->visibility;
        $module->save();

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
        $module = Module::find($id);
        $module->delete();

        $message = __('Успешно изтрит модул!');
        return redirect()->back()->with('success', $message);
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'mail' => 'required|email',
            'module_id' => 'required|numeric',
        ]);

        $user = User::where('email', $request->mail)->first();
        ModulesStudent::firstOrCreate(
            ['course_modules_id' => $request->module_id,'user_id' => $user->id]
        );

        $message = __('Успешно добавен курсист!');
        return redirect()->back()->with('success', $message);
    }

    public function removeUser(Request $request)
    {
        $student = ModulesStudent::where([
            ['course_modules_id',$request->module],
            ['user_id',$request->user],
        ])->delete();

        return response('success', 200);
    }
}
