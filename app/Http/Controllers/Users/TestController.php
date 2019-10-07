<?php

namespace App\Http\Controllers\Users;

use App\Models\Tests\TestUserSubmited;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
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

    public function prepareUserTest()
    {
        $userTest = Auth::user()->load('Test');
        $questions = $userTest->load('Test.bank','Test.bank.questions');
        $questionsCount = $questions->Test[0]->bank[0]->questions->count();
        if($userTest->Test()->exists()){
            return view('user.tests.prepare',['test' => $userTest->Test[0],'qCount' => $questionsCount]);
        }

        $message = 'Няма тестове за този потребител';
        return redirect()->back()->with('error', $message);
    }

    public function start()
    {
        $userTest = Auth::user()->load('Test');
        $startedTest = new TestUserSubmited;
        $startedTest->user_id = Auth::user()->id;
        $startedTest->test_id = $userTest->Test[0]->id;
        $startedTest->started_at = Carbon::now();
        $startedTest->save();

        dd($startedTest);
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
