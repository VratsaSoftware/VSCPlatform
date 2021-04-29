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
            'first_date' => 'sometimes|date_format:m/d/Y',
            'second_date' => 'sometimes|date_format:m/d/Y',
            'description' => 'sometimes',
            'order' => 'sometimes|numeric',
            'video' => 'sometimes',
            'video_file' => 'sometimes|file',
            'slides' => 'sometimes|',
            'homework' => 'sometimes|',
            'demo' => 'sometimes',
            'homework_end' => 'sometimes',
            'homework_check_end' => 'sometimes',
            'visibility' => 'sometimes|in_array:valid_visibility.*',
        ]);
        $store = false;

        if ($request->has('lection')) {
            $lection = Lection::with('Module', 'Module.Course')->findOrFail($request->lection);
            $store = true;
        } else {
            if ($request->title && $request->description && $request->first_date && $request->second_date) {
                $lection = new Lection;
                $lection->course_modules_id = $request->module;
                $lection->title = $request->title;

                $lection->first_date = $this->dateParse($request->first_date);
                $lection->second_date = $this->dateParse($request->second_date);

                // try {
                //     $lection->first_date = $this->parseDateTime($request->first_date_create, $request->first_time_hours, $request->first_time_minutes);
                //     if (!is_null($request->second_date_create)) {
                //         $lection->second_date = $this->parseDateTime($request->second_date_create, $request->second_time_hours, $request->second_time_minutes);
                //     }
                // } catch (\Exception $err) {
                //     $message = __('Невалидна заявка с полетата за дата и час!');
                //     return redirect()->back()->with('error', $message)->withInput(Input::all());
                // }

                $lection->description = $request->description;
                // $lection->order = $request->order;
                $lection->visibility = 'public';
                $lection->homework_end = is_null($request->homework_end) ? $request->homework_end:Carbon::parse($request->homework_end)->addDays(1);
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

            $request->file('homework')->move($homeworkUrl, $name);
            $lection->homework_criteria = $name;

            $lection->homework_end = !is_null($request->homework_end) ? $this->dateParse($request->homework_end) : null;
            $lection->homework_check_end = !is_null($request->homework_check_end) ? $this->dateParse($request->homework_check_end) : null;
        }

        if ($request->has('demo') && !is_null($request->demo) && $store) {
            $lection->demo = $request->demo;
        }

        if (!is_null($request->type)) {
            $lection->type = $request->type;
        }

        if ($store) {
            $lection->save();
            $message = __('Успешно създадена лекция!');
            return redirect()->back()->with('success', $message);
        }

        $message = __('Невалидна Заявка!');
        return redirect()->back()->with('error', $message);
    }

    /* date parse */
    private function dateParse($date)
    {
        $parseDete = date_parse($date);

        return $parseDete['year'] . '-' . $parseDete['month'] . '-' . $parseDete['day'];
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
        $allModule = Module::where('course_id', $module->Course->id)->get();
        $homeworks = Homework::where('user_id', Auth::user()->id)
            ->get();

        if (!$lections->isEmpty()) {
            return view('course.module.left-lection', [
                'homeworks' => $homeworks,
                'module' => $module->load('Course'),
                'lections' => $lections,
                'allModules' => $allModule,
            ]);
        }

        $message = __('Няма добавени лекции за този модул!');
        return redirect()->route('user.course', [
            'user' => Auth::user()->id,
            'course' => $course->id
        ])->with('error', $message);
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
            'video' => ['sometimes'],
            'slides' => 'sometimes|file',
            'homework' => 'sometimes|file',
            'video_file' => 'sometimes|file',
            'homework_end' => 'sometimes',
            'homework_check_end' => 'sometimes',
            'demo' => ['sometimes'],
        ]);
        $lection = Lection::with('Module', 'Module.Course')->findOrFail($id);

        // if ($request->has('title') || $request->has('first_date') && $request->has('first_time_hours') && $request->has('first_time_minutes') || $request->has('second_date') && $request->has('second_time_hours') && $request->has('second_time_minutes') || $request->has('description') || $request->has('order')) {
            $lection->title = $request->title;
            $lection->first_date = $this->dateParse($request->first_date);
            $lection->second_date = $this->dateParse($request->second_date);
            // try {
            //     $lection->first_date = $this->parseDateTime($request->first_date, $request->first_time_hours, $request->first_time_minutes);
            //     if (!is_null($request->second_date)) {
            //         $lection->second_date = $this->parseDateTime($request->second_date, $request->second_time_hours, $request->second_time_minutes);
            //     }
            // } catch (\Exception $err) {
            //     $message = __('Невалидна заявка с полетата за дата и час!');
            //     return redirect()->back()->with('error', $message)->withInput(Input::all());
            // }

            $lection->description = $request->description;
            // $lection->order = !is_null($request->order) ?: $request->order;
        // }

        if ($request->video && $request->has('video')) {
            $video = LectionVideo::find($lection->lections_video_id);
            if ($video) {
                $video->url = $data['video'];
                $video->save();
            } else {
                $video = new LectionVideo;

                $video->url = $data['video'];
                $video->save();
            }
        }

        $lection->lections_video_id = isset($video->id) ? $video->id : null;

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

        if (Input::hasFile('homework') || $lection->homework_end || $lection->homework_check_end) {
            $lection->homework_end = !is_null($request->homework_end) ? $this->dateParse($request->homework_end) : null;
            $lection->homework_check_end = !is_null($request->homework_check_end) ? $this->dateParse($request->homework_check_end) : null;
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

        $this->deleteFiles($request, $lection);

        $lection->save();

        $message = __('Успешно редактирана лекция!');
        return redirect()->back()->with('success', $message);
    }

    /* delete files */
    private function deleteFiles($request, $lection)
    {
        if ($request->slides_delete == 'delete') {
            $lection->presentation = null;

            $slidesUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/slides-' . $lection->id . '/';
            $oldSlides = $slidesUrl . $lection->presentation;
            if (File::exists($oldSlides)) {
                File::delete($oldSlides);
            }
        } else if ($request->demo_file_delete == 'delete') {
            $lection->demo = null;
        } else if ($request->homework_delete == 'delete') {
            $lection->homework_criteria = null;

            $homeworkUrl = public_path() . '/data/course-' . $lection->Module->Course->id . '/modules/' . $lection->Module->id . '/homework-' . $lection->id . '/';
            $oldhomework = $homeworkUrl . $lection->homework_criteria;
            if (File::exists($oldhomework)) {
                File::delete($oldhomework);
            }

            $lection->homework_end = null;
            $lection->homework_check_end = null;
        }
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

        return redirect()->back()->with('success', 'Успешно изтрита лекция!');
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
        $homeWorks = Homework::with('user', 'comments', 'comments.Author')
            ->where('lection_id', $lection)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($homeWorks->count() > 0) {
            foreach ($homeWorks as $homework) {
                $evaluated = new User;
                $homework['evaluated'] = $evaluated->evalutedHomeWorksCount($homework->user_id, $lection);
            }
            $lection = Lection::find($lection);

            $view = view('course.lection_homeworksNew', [
                'homeworks' => $homeWorks,
                'lection' => $lection
            ]);
        } else {
            $view = back()->with('info', 'Няма домашни за тази лекция!');
        }

        return $view;
    }

    public function homeworkComment($homework)
    {
        $comments = HomeworkComment::where('homework_id', $homework)
            ->orderBy('created_at', 'desc')
            ->get();

        $comments = $comments->load('Author');
        $comments = $comments->load('Homework');

        return view('course.lection_homework_comment', [
            'allComments' => $comments,
        ]);
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

            $message = __('Успешно редактиран коментар');
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

            $message = __('Успешно добавен коментар');
        }

        return back()->with('success', $message);
    }

    public function addHomeworkStudentComment(Request $request, $homework)
    {
        $data = $request->validate([
            'comment' => 'required|min:3|max:255'
        ]);

        $eval = HomeworkComment::where([
            ['user_id',Auth::user()->id],
            ['homework_id',$homework]
        ])->first();
        $eval->comment = $data['comment'];
        $eval->is_evaluated = 1;
        $eval->save();

        $homeworkEval = Homework::find($homework);
        $homeworkEval->evaluated_count += 1;
        $homeworkEval->save();

        $message = __('Успешно оценихте домашно, сега можете да изтеглите ново!');
        return back()->with('success', $message);
    }

    public function userUploadHomework(Request $request)
    {
        $data = $request->validate([
            'lection' => 'required|numeric',
            'homework' => 'file|max:50000'
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
        $isUploaded = Auth::user()->isHomeWorkUploadedByLection(null, $request->lection);
        if ($isUploaded) {
            $isCompletedEval = Auth::user()->isCompletedEval(null, $request->lection);
            if ($isCompletedEval) {
                //take new homework
                $homework_id = Auth::user()->getRandomHomework(null, $request->lection);
                $homework = Homework::findOrFail($homework_id);

                if($homework->count()) {
                    $newHomeWorkEval = new HomeworkComment;
                    $newHomeWorkEval->user_id = Auth::user()->id;
                    $newHomeWorkEval->homework_id = $homework_id;
                    $newHomeWorkEval->save();
                }
            }else {
                $homework = Auth::user()->getUnFinishedEval(null, $request->lection);
            }
            return view('course.lection_eval_homework', ['homework' => $homework]);
        }
        $notUploaded = __('Моля качете своето домашно, за да можете да оценявате домашно на други!');
        return $notUploaded;
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
