<?php

namespace App\Http\Controllers\Courses;

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
        return view('user.application', ['entry'=>$entry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $occupations = Occupation::all();
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            return view('user.application_form', ['user'=>$user,'occupations'=>$occupations]);
        }
        return view('user.non_register_application_form', ['occupations'=>$occupations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['valid_course'] = \Config::get('applicationForm.courses');
        $request['valid_use'] = \Config::get('applicationForm.use');
        $request['valid_source'] = \Config::get('applicationForm.source');

        if (Auth::user()) {
            $data = $request->validate([
                "username" => 'sometimes', 'string', 'max:255',
                "lastname" => 'sometimes', 'string', 'max:255',
                "useremail" => 'sometimes', 'string', 'email', 'max:255', 'unique:users',
                "phone" => 'required|numeric',
                "occupation" => 'required',
                "course" => 'required|in_array:valid_course.*',
                "suitable_candidate" => 'required|min:100|max:500',
                "suitable_training" => 'required|min:100|max:500',
                "accompliments" => 'required|min:100|max:500',
                "expecatitions" => 'required|min:100|max:500',
                "use" => 'required|in_array:valid_use.*',
                "source" => 'required|in_array:valid_source.*',
                "cv" => 'required|file'
            ]);
            $user = User::find(Auth::user()->id);
            $user->cl_occupation_id = $data['occupation'];
            if (isset($request->userage)) {
                $year = Carbon::now()->subYears($request->userage)->format('Y');
                $year .= '-01-01';
                $dob = Carbon::parse($year)->format('Y-m-d');
                $user->dob = $dob;
            }
            $user->save();
            $cv = time().'.'.$request->cv->getClientOriginalExtension();
            $cvName = str_replace(' ', '', strtolower($cv));
            // $cvName = md5($cvName);

            $data['cv'] = $cvName;
            $request->cv->move(public_path().'/entry/cv/', $cvName);
            unset($data['occupation']);
            $newForm = EntryForm::create($data);
            $newEntry = new Entry;
            $newEntry->user_id = $user->id;
            $newEntry->entry_form_id = $newForm->id;
            $newEntry->save();

            $message = __('Успешно изпратихте форма за кандидатстване!');
            return redirect()->route('application.index')->with('success', $message);
        }
        // not registered
        $data = $request->validate([
            "username" => 'required', 'string', 'max:255',
            "lastname" => 'required', 'string', 'max:255',
            "useremail" => 'required', 'string', 'email', 'max:255', 'unique:users',
            "phone" => 'required|numeric',
            "occupation" => 'required',
            "course" => 'required|in_array:valid_course.*',
            "suitable_candidate" => 'required|min:100|max:500',
            "suitable_training" => 'required|min:100|max:500',
            "accompliments" => 'required|min:100|max:500',
            "expecatitions" => 'required|min:100|max:500',
            "use" => 'required|in_array:valid_use.*',
            "source" => 'required|in_array:valid_source.*',
            "cv" => 'required|file'
        ]);
        $role = Role::where('role', 'user')->select('id')->first();
        $dob = null;
        if (isset($request->userage)) {
            $year = Carbon::now()->subYears($request->userage)->format('Y');
            $year .= '-01-01';
            $dob = Carbon::parse($year)->format('Y-m-d');
            unset($data['userage']);
        }
        $newUser = User::create([
            'name' => $data['username'],
            'last_name' => $data['lastname'],
            'email' => $data['useremail'],
            'cl_role_id' => $role->id,
            'dob' => $dob,
            'password' => Hash::make(str_random(12)),
        ]);


        $cv = time().'.'.$request->cv->getClientOriginalExtension();
        $cvName = str_replace(' ', '', strtolower($cv));
        // $cvName = md5($cvName);

        $data['cv'] = $cvName;
        $request->cv->move(public_path().'/entry/cv/', $cvName);
        unset($data['occupation']);
        unset($data['username']);
        unset($data['lastname']);
        unset($data['useremail']);

        $newForm = EntryForm::create($data);
        $newEntry = new Entry;
        $newEntry->user_id = $newUser->id;
        $newEntry->entry_form_id = $newForm->id;
        $newEntry->save();

        $token = Password::getRepository()->create($newUser);
        $newUser->sendPasswordResetNotification($token);
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
