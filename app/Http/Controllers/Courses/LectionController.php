<?php

namespace App\Http\Controllers\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\Lection;
use App\Models\CourseModules\LectionComment;
use App\User;
use Illuminate\Support\Facades\Auth;

class LectionController extends Controller
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
    public function show($user = 0, Course $course, Module $module)
    {
        $lections = Module::getLections($module->id);
        if (!$lections->isEmpty()) {
            return view('course.lections', ['module' => $module->load('Course'),'lections' => $lections]);
        }

        $message = __('Няма добавени лекции за този модул!');
        return redirect()->route('user.course', ['user' => $user->id,'course' => $course->id])->with('error', $message);
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

    public function addComment(Request $request, User $user, Course $course, Module $module, Lection $lection)
    {
        $isAllowed = Auth::user()->isOnThisCourse($course->id);
        if ($isAllowed) {
            $insComment = LectionComment::firstOrCreate(
                ['course_lection_id' => $lection->id,'user_id' => $user->id],
                ['comment' => $request->comment]
            );
            $message = __('Успешно изпратен коментар за лекция '.$lection->title.' !');
            return redirect()->route('user.module.lections', ['user' => $user->id,'course' => $course->id,'module' => $module->id])->with('success', $message);
        }
        $message = __('Нямате право да достъпите този ресурс!');
        return redirect()->route('user.module.lections', ['user' => $user->id,'course' => $course->id,'module' => $module->id])->with('error', $message);
    }
}
