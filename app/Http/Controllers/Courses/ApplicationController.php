<?php

namespace App\Http\Controllers\Courses;

use App\Models\Courses\TrainingType;
use App\Models\Tests\Test;
use App\Models\Tests\TestUserAssign;
use App\Models\Tests\TestUserSubmited;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Entry;
use App\Models\Courses\EntryForm;
use App\Models\Courses\EntryTask;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Users\Occupation;
use Carbon\Carbon;
use App\Models\Users\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseApplicationCreated;
use App\Models\Courses\Course;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entry = Entry::with('User', 'Form')->where('user_id', Auth::user()->id)->first();
        $submited = TestUserSubmited::where([
            ['user_id', Auth::user()->id],
        ])->whereNotNull('submited_at')->select('test_id')->get()->toArray();
//        if ($entry) {
//            $entry->test_score = NULL;
//            $entry->save();
//        }
        if ($submited) {
            $addMe = 0;
            foreach ($submited as $skey => $submitedTest) {
                $score = app('App\Http\Controllers\Users\TestController')->generateScore(Auth::user()->id, $submitedTest['test_id']);
                if ($entry && isset($score[4]['percentage'])) {
                    $addMe += $score[4]['percentage'];
                    $allScore[] = $score;
                }
            }
            $entry->test_score = $addMe;
            $entry->save();
            $entry['test_stats'] = $allScore;
        }
        $notSubmited = TestUserAssign::where([
            ['user_id', Auth::user()->id],
        ])->whereNotIn('test_id', $submited)->get();
        if (count($notSubmited) > 0 || !$notSubmited->isEmpty()) {
            $entry['test_count'] = count($notSubmited);
            $entry['more_test'] = true;
        }
        //open courses for applications
        $courses = Course::where('visibility','public')->whereNotNull('form_active')->where('applications_to','>=',Carbon::now())->orderBy('id','DESC')->get();
        $courses->load('Lecturers');
        $courses->load('Lecturers.User');

        return view('user.application', ['entry' => $entry,'courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $type = null)
    {
        $course = null;
        $module = null;
        $courses = \Config::get('applicationForm.courses');
        $applicationFor = null;

        foreach ($courses as $course => $module) {
            $coursesOnly[] = $course;
            $modulesOnly[] = $module;
        }
        if (!is_null($type)) {
            //getting current active courses of this type, who expiration date for applications is not past
            $applicationFor = Course::where([
                ['training_type', $type]
            ])->whereNotNull('form_active')->where('applications_to','>=',Carbon::now())->orderBy('id','DESC')->get();
            //deactivating past date courses
            $switchActiveStatus = Course::where([
                ['training_type',$type ],
                ['applications_to', '<' , Carbon::now()->subDays(1)]
            ])->whereNotNull('form_active')->update(['form_active' => NULL]);
        }

        if ($request->course && $request->module) {
            $request['valid_course'] = $coursesOnly;
            $request['valid_modules'] = $modulesOnly;
            $data = $request->validate([
                "course" => 'in_array:valid_course.*',
                "module" => 'in_array:valid_modules.*',
            ]);
            $course = $request->course;
            $module = $request->module;
        }
        $occupations = Occupation::all();

        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            return view('user.application_form', ['user' => $user, 'occupations' => $occupations, 'course' => $course, 'module' => $module, 'applicationFor' => $applicationFor]);
        }

        return view('user.non_register_application_form', ['occupations' => $occupations, 'applicationFor' => $applicationFor]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $courses = \Config::get('applicationForm.courses');
//        foreach ($courses as $course => $module) {
//            $coursesOnly[] = $course;
//            $modulesOnly[] = $module;
//        }
//        $request['valid_course'] = $coursesOnly;
//        $request['valid_modules'] = $modulesOnly;
        $request['valid_use'] = \Config::get('applicationForm.use');
        $request['valid_source'] = \Config::get('applicationForm.source');

        if (Auth::user()) {
            $data = $request->validate([
                "username" => 'sometimes|string|max:255',
                "lastname" => 'sometimes|string|max:255',
                "email" => 'sometimes|string|email|max:255|unique:users',
                "phone" => 'required|digits:10',
                "occupation" => 'required',
                'course' => 'required',
//                "course" => 'required|in_array:valid_course.*',
                "suitable_candidate" => 'required|min:100|max:500',
                "suitable_training" => 'required|min:100|max:500',
                "accompliments" => 'required|min:100|max:500',
                "expecatitions" => 'required|min:100|max:500',
                "use" => 'required|in_array:valid_use.*',
                "source" => 'required|in_array:valid_source.*',
                "cv" => 'required|file',
                "module" => 'sometimes|string|in_array:valid_modules.*',
                "source_url" => 'sometimes'
            ]);
            $data['course_id'] = $data['course'];
            $course = Course::where('id', $data['course_id'])->select('name')->first();
            $data['course'] = $course->name;

            $user = User::find(Auth::user()->id);
            $user->cl_occupation_id = $data['occupation'];
            if (isset($request->userage)) {
                $year = Carbon::now()->subYears($request->userage)->format('Y');
                $year .= '-01-01';
                $dob = Carbon::parse($year)->format('Y-m-d');
                $user->dob = $dob;
            }
            $user->save();
            $cv = $user->name . time() . '.' . $request->cv->getClientOriginalExtension();
            $cvName = str_replace(' ', '', strtolower($cv));
            // $cvName = md5($cvName);

            $data['cv'] = $cvName;
            $request->cv->move(public_path() . '/entry/cv/', $cvName);
            unset($data['occupation']);
            if (isset($request->source_url)) {
                $data['source_url'] = $request->source_url;
            }
            $newForm = EntryForm::create($data);
            $newEntry = new Entry;
            $newEntry->user_id = $user->id;
            $newEntry->entry_form_id = $newForm->id;
            $newEntry->save();
            Mail::to($user->email)->send(new CourseApplicationCreated($data['course']));
            $message = __('Успешно изпратихте форма за кандидатстване!');
            return redirect()->route('application.index')->with('success', $message);
        }
        // not registered
        $data = $request->validate([
            "username" => 'required|string|max:255',
            "lastname" => 'required|string|max:255',
            "email" => 'required|string|email|max:255|unique:users',
            "userage" => 'required|numeric|max:120',
            "phone" => 'required|digits:10',
            "occupation" => 'required',
            'course' => 'required',
//            "course" => 'required|in_array:valid_course.*',
            "suitable_candidate" => 'required|min:100|max:500',
            "suitable_training" => 'required|min:100|max:500',
            "accompliments" => 'required|min:100|max:500',
            "expecatitions" => 'required|min:100|max:500',
            "use" => 'required|in_array:valid_use.*',
            "source" => 'required|in_array:valid_source.*',
            "cv" => 'required|file',
            "module" => 'sometimes|string|in_array:valid_modules.*',
        ]);
        $data['course_id'] = $data['course'];
        $course = Course::where('id', $data['course_id'])->select('name')->first();
        $data['course'] = $course->name;

        $role = Role::where('role', 'user')->select('id')->first();
        $dob = null;
        $year = Carbon::now()->subYears($request->userage)->format('Y');
        $year .= '-01-01';
        $dob = Carbon::parse($year)->format('Y-m-d');
        unset($data['userage']);
        $newUser = User::create([
            'name' => $data['username'],
            'last_name' => $data['lastname'],
            'email' => $data['email'],
            'cl_role_id' => $role->id,
            'dob' => $dob,
            'cl_occupation_id' => $data['occupation'],
            'password' => Hash::make(str_random(12)),
        ]);


        $cv = $newUser->name . time() . '.' . $request->cv->getClientOriginalExtension();
        $cvName = str_replace(' ', '', strtolower($cv));
        // $cvName = md5($cvName);

        $data['cv'] = $cvName;
        $request->cv->move(public_path() . '/entry/cv/', $cvName);
        unset($data['occupation']);
        unset($data['username']);
        unset($data['lastname']);
        unset($data['email']);
        if (isset($request->source_url)) {
            $data['source_url'] = $request->source_url;
        }
        $newForm = EntryForm::create($data);
        $newEntry = new Entry;
        $newEntry->user_id = $newUser->id;
        $newEntry->entry_form_id = $newForm->id;
        $newEntry->save();
        Mail::to($newUser->email)->send(new CourseApplicationCreated($request->course));
        $token = Password::getRepository()->create($newUser);
        $newUser->sendPasswordResetNotification($token);

        return redirect('password/reset/' . $token);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function applicationsAll($type = null)
    {
        $types = TrainingType::all();

        return view('admin.applications', ['types' => $types,'type' => $type]);
    }

    public function loadApplications(Request $request)
    {
        $allCourses = Course::where('visibility','!=','draft')->get();
        $entries = Entry::with('User.Occupation', 'Form')->get();
        if($request->type) {
            $courses = Course::where('training_type', $request->type)->select('id')->get()->toArray();
            $entries = Entry::with('User.Occupation', 'Form')->get();
            if($request->type > 0) {
                $entries = Entry::with('User.Occupation', 'Form')->whereHas('Form', function ($q) use ($courses) {
                    $q->whereIn('course_id', $courses);
                })->get();
            }
        }
        if($request->course){
            $theCourse = $request->course;
            $entries = Entry::with('User.Occupation', 'Form')->whereHas('Form', function ($q) use ($theCourse) {
                $q->where('course_id', $theCourse);
            })->get();
        }
        foreach ($entries as $entry) {
            $tests = [];
            $scores = [];
            $submitedTests = TestUserSubmited::where([
                ['user_id', $entry->user_id]
            ])->get();
            foreach ($submitedTests as $tkey => $test) {
                $tests[] = Test::find($test->test_id);
                $scores[] = app('App\Http\Controllers\Users\TestController')->generateScore($entry->user_id, $test->test_id);
            }
            $entry['testScoreTest'] = $tests;
            $entry['testScore'] = $scores;
            $calculate = 0;
            foreach ($entry['testScoreTest'] as $tkey => $test) {
                $calculate += $entry['testScore'][$tkey][4]['percentage'];
            }
            if ($calculate > 0) {
                $entry['hidden'] = $calculate / count($entry['testScore']);
            }
        }

        $courses = Course::where('training_type',$request->type)->get();
        if(isset($request->final) || $request->final || $request->type < 1){
            return view('admin.ajax_applications_data',['entries' => $entries,'courses' => isset($courses)?$courses:null,'allCourses' => $allCourses]);
        }
        return view('admin.ajax_applications', ['entries' => $entries,'courses' => isset($courses)?$courses:null]);
    }
}
