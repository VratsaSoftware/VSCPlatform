<?php

namespace App\Http\Controllers\Courses;

use App\Models\CourseModules\Homework;
use App\Models\CourseModules\HomeworkComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\Lection;
use App\Models\CourseModules\LectionComment;
use App\Models\CourseModules\LectionVideo;
use App\Models\CourseModules\LectionVideoView;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use File;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'lection' => 'sometimes|numeric',
            'title' => 'sometimes',
            'first_date' => 'sometimes|date_format:Y-m-d H:i',
            'second_date' => 'sometimes|date_format:Y-m-d H:i',
            'description' => 'sometimes',
            'order' => 'sometimes|numeric',
            'video' => 'sometimes',
            ['regex:/^(https|http):\/\/(?:www\.)?youtube.com\/embed\/[A-z0-9]+/'],
            'slides' => 'sometimes|',
            'homework' => 'sometimes|',
            'demo' => 'sometimes',
            ['regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            'homework_end' => 'required',
            'visibility' => 'sometimes|in_array:valid_visibility.*',
        ]);
        $store = false;

        if ($request->has('lection')) {
            $lection = Lection::with('Module', 'Module.Course')->findOrFail($request->lection);
            $store = true;
        } else {
            if (!is_null($request->title) && !empty($request->title) && !is_null($request->first_date_create) && !is_null($request->first_time_hours) && !is_null($request->first_time_minutes) && !is_null($request->description) && !empty($request->description)) {
                $lection = new Lection;
                $lection->course_modules_id = $request->module;
                $lection->title = $request->title;
                try {
                    $lection->first_date = $this->parseDateTime($request->first_date_create, $request->first_time_hours, $request->first_time_minutes);
                    if (!is_null($request->second_date_create)) {
                        $lection->second_date = $this->parseDateTime($request->second_date_create, $request->second_time_hours, $request->second_time_minutes);
                    }
                } catch (\Exception $err) {
                    $message = __('Невалидна заявка с полетата за дата и час!');
                    return redirect()->back()->with('error', $message)->withInput(Input::all());
                }

                $lection->description = $request->description;
                $lection->order = $request->order;
                $lection->visibility = $request->visibility;
                $lection->homework_end = $request->homework_end;
                $lection->save();

                $lection = Lection::with('Module', 'Module.Course')->findOrFail($lection->id);
                $store = true;
            } else {
                $message = __('Невалидна Заявка!');
                return redirect()->back()->with('error', $message)->withInput(Input::all());
            }
        }

        if ($request->has('video') && !is_null($request->video) && $store) {
            $video = new LectionVideo;
            $video->url = $request->video;
            $video->save();

            $lection->lections_video_id = $video->id;
        }

        if (Input::hasFile('slides')) {
            $slides = $request->file('slides');
            $name = time() . "_" . $slides->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            // $name = md5($name);
            $slidesUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/slides-' . $lection->id . '/';

            $request->file('slides')->move($slidesUrl, $name);
            $lection->presentation = $name;
        }

        if (Input::hasFile('homework')) {
            $homework = $request->file('homework');
            $name = time() . "_" . $homework->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            // $name = md5($name);
            $homeworkUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/homework-' . $lection->id . '/';

            $request->file('homework')->move($homeworkUrl, $name);
            $lection->homework_criteria = $name;
        }

        if ($request->has('demo') && !is_null($request->demo) && $store) {
            $lection->demo = $request->demo;
        }

        if (!is_null($request->type)) {
            $lection->type = $request->type;
        }

        if ($store) {
            $lection->save();
            $message = __('Успешно направени промени!');
            return redirect()->back()->with('success', $message);
        }

        $message = __('Невалидна Заявка!');
        return redirect()->back()->with('error', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user = 0, Course $course, Module $module)
    {
        $lections = Module::getLections($module->id, false);
        if (!$lections->isEmpty()) {
            return view('course.lections', ['module' => $module->load('Course'), 'lections' => $lections]);
        }

        $message = __('Няма добавени лекции за този модул!');
        return redirect()->route('user.course', ['user' => Auth::user()->id, 'course' => $course->id])->with('error', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'sometimes',
            'first_date' => 'sometimes',
            'second_date' => 'sometimes',
            'description' => 'sometimes',
            'order' => 'sometimes|numeric|',
            'video' => ['sometimes', 'regex:/^(https|http):\/\/(?:www\.)?youtube.com\/embed\/[A-z0-9]+/'],
            'slides' => 'sometimes|file',
            'homework' => 'sometimes|file',
            'homework_end' => 'sometimes',
            'demo' => ['sometimes', 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
        ]);
        $lection = Lection::with('Module', 'Module.Course')->findOrFail($id);

        if ($request->has('title') || $request->has('first_date') && $request->has('first_time_hours') && $request->has('first_time_minutes') || $request->has('second_date') && $request->has('second_time_hours') && $request->has('second_time_minutes') || $request->has('description') || $request->has('order')) {
            $lection->title = $request->title;
            try {
                $lection->first_date = $this->parseDateTime($request->first_date, $request->first_time_hours, $request->first_time_minutes);
                if (!is_null($request->second_date)) {
                    $lection->second_date = $this->parseDateTime($request->second_date, $request->second_time_hours, $request->second_time_minutes);
                }
            } catch (\Exception $err) {
                $message = __('Невалидна заявка с полетата за дата и час!');
                return redirect()->back()->with('error', $message)->withInput(Input::all());
            }

            $lection->homework_end = $request->homework_end;
            $lection->description = $request->description;
            $lection->order = $request->order;
        }

        if ($request->has('video')) {
            $video = LectionVideo::findOrFail($lection->lections_video_id);
            $video->url = $data['video'];
            $video->save();
        }

        if (Input::hasFile('slides')) {
            $slides = $request->file('slides');
            $name = time() . "_" . $slides->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            // $name = md5($name);
            $slidesUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/slides-' . $lection->id . '/';
            $oldSlides = $slidesUrl . $lection->presentation;
            if (File::exists($oldSlides)) {
                File::delete($oldSlides);
            }
            $request->file('slides')->move($slidesUrl, $name);
            $lection->presentation = $name;
        }

        if (Input::hasFile('homework')) {
            $homework = $request->file('homework');
            $name = time() . "_" . $homework->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            // $name = md5($name);
            $homeworkUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/homework-' . $lection->id . '/';
            $oldhomework = $homeworkUrl . $lection->homework_criteria;
            if (File::exists($oldhomework)) {
                File::delete($oldhomework);
            }
            $request->file('homework')->move($homeworkUrl, $name);
            $lection->homework_criteria = $name;
        }

        if ($request->has('demo')) {
            $lection->demo = $request->demo;
        }

        $lection->save();

        $message = __('Успешно направени промени!');
        return redirect()->back()->with('success', $message);
    }

    public function changeVisibility(Request $request, Lection $lection)
    {
        $valid = \Config::get('courseVisibility');
        if (in_array($request->visibility, $valid)) {
            $lection->visibility = $request->visibility;
            $lection->save();

            return response('success', 200);
        }
        return response('error', 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lection = Lection::with('Module', 'Module.Course')->findOrFail($id);

        $slidesUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/slides-' . $lection->id;
        File::deleteDirectory($slidesUrl);

        $homeworkUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/homework-' . $lection->id;
        File::deleteDirectory($homeworkUrl);

        if ($lection->lections_video_id) {
            $video = LectionVideo::find($lection->lections_video_id);
            $video->delete();
        }

        $lection->delete();

        return response('success', 200);
    }

    public function addComment(Request $request, User $user, Course $course, Module $module, Lection $lection)
    {
        $isAllowed = Auth::user()->isOnThisCourse($course->id);
        if ($isAllowed) {
            if ($request->comment && !is_null($request->comment)) {
                $insComment = LectionComment::firstOrCreate(['course_lection_id' => $lection->id, 'user_id' => $user->id], ['comment' => $request->comment]);
                $message = __('Успешно изпратен коментар за лекция ' . $lection->title . ' !');
                return redirect()->route('user.module.lections', ['user' => $user->id, 'course' => $course->id, 'module' => $module->id])->with('success', $message);
            }
            $message = __('Попълнете полето за коментар!');
            return redirect()->back()->with('error', $message);
        }
        $message = __('Нямате право да достъпите този ресурс!');
        return redirect()->route('user.module.lections', ['user' => $user->id, 'course' => $course->id, 'module' => $module->id])->with('error', $message);
    }

    public function videoShown(Request $request)
    {
        $isExisting = LectionVideoView::where([
            ['lection_video_id', $request->videoId],
            ['user_id', $request->user],
        ])->first();
        if ($isExisting) {
            $isExisting->views_count = $isExisting->views_count + 1;
            $isExisting->save();
            return response('success', 200);
        }
        $addView = new LectionVideoView;
        $addView->lection_video_id = isset($request->videoId) ? $request->videoId : null;
        $addView->user_id = $request->user;
        $addView->views_count = 1;
        $addView->save();
        return response('success', 200);
    }

    public function showHomeworks(Request $request, $lection)
    {
        $homeWorks = Homework::with('user', 'comments', 'comments.Author')->where('lection_id', $lection)->get();
        foreach ($homeWorks as $homework) {
            $evaluated = new User;
            $homework['evaluated'] = $evaluated->evalutedHomeWorksCount($homework->user_id, $lection);
        }
        $lection = Lection::find($lection);
        return view('course.lection_homeworks', ['homeworks' => $homeWorks, 'lection' => $lection]);
    }

    public function addHomeworkLecturerComment(Request $request, $homework)
    {
        $isExisting = HomeworkComment::where([
            ['user_id', Auth::user()->id],
            ['homework_id', $homework]
        ])->first();
        if ($isExisting) {
            $isExisting->comment = $request->comment;
            $isExisting->save();
        } else {
            $newLecturerComment = new HomeworkComment;
            $newLecturerComment->user_id = Auth::user()->id;
            $newLecturerComment->homework_id = $homework;
            $newLecturerComment->comment = $request->comment;
            $newLecturerComment->is_evaluated = 1;
            $newLecturerComment->is_lecturer_comment = 1;
            $newLecturerComment->save();
            // only if new comment added then evaluted count must increase +1
            $homeworkEval = Homework::find($homework);
            $homeworkEval->evaluated_count += 1;
            $homeworkEval->save();
        }

        $message = __('Успешно добавихте коментар');
        return back()->with('success', $message);
    }

    public function userUploadHomework(Request $request)
    {
        $data = $request->validate([
            'lection' => 'required|numeric',
            'homework' => 'file|mimes:rar,zip'
        ]);
        $lection = Lection::find($data['lection']);

        if (Carbon::now() < $lection->homework_end) {
            $homeworkExist = Homework::where([
                ['user_id', Auth::user()->id],
                ['lection_id', $data['lection']]
            ])->first();
            $homeworkFile = $request->file('homework');
            $name = time() . "_" . $homeworkFile->getClientOriginalName();
            $extension = $homeworkFile->getClientOriginalExtension();
            $name = str_replace(' ', '', $name);
            $name = md5($name) . '.' . $extension;
            $homeworkPath = public_path() . '/data/homeworks/';
            if ($homeworkExist) {
                $oldHomework = $homeworkPath . $homeworkExist->file;
                if (File::exists($oldHomework)) {
                    File::delete($oldHomework);
                }
                $request->file('homework')->move($homeworkPath, $name);
                $homeworkExist->file = $name;
                $homeworkExist->save();
            } else {
                $newHomework = new Homework;
                $newHomework->lection_id = $data['lection'];
                $newHomework->user_id = Auth::user()->id;
                $request->file('homework')->move($homeworkPath, $name);
                $newHomework->file = $name;
                $newHomework->save();
            }

            $message = __('Успешно изпратено домашно!');
            return back()->with('success', $message);
        }
        $message = __('Датата за изпращане на домашно е изтекла!');
        return back()->with('error', $message);
    }

    public function userEvalHomework(Request $request)
    {
        $isCompletedEval = Auth::user()->isCompletedEval(null,$request->lection);
        return response()->json($isCompletedEval);
    }

    public function parseDateTime($date, $hours, $minutes)
    {
        $outHours = $hours;
        $outMinutes = $minutes;
        if ($hours < 10 && $hours[0] > 0) {
            $outHours = 0;
            $outHours .= $hours;
        }
        if ($minutes < 10 && $minutes[0] > 0) {
            $outMinutes = 0;
            $outMinutes .= $minutes;
        }
        $time = $outHours . $outMinutes;
        return Carbon::parse($date . $time);
    }
}
