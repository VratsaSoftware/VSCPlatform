<?php

namespace App\Http\Controllers\Users;

use App\Models\Tests\Test;
use App\Models\Tests\TestUserSubmited;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        $userTest = User::with('Test')->whereHas('Test',function($q){
            $q->where('expire_at','>',Carbon::now());
        })->find(Auth::user()->id);
        if($userTest) {
            $questions = $userTest->load('Test.bank', 'Test.bank.questions');
            $questionsCount = $questions->Test[0]->bank[0]->questions->count();
            if ($userTest->Test()->exists()) {
                return view('user.tests.prepare', ['test' => $userTest->Test[0], 'qCount' => $questionsCount]);
            }
        }
        $message = 'Няма тестове за този потребител';
        return redirect()->route('myProfile')->with('error', $message);
    }

    public function start()
    {
        $userTest = Auth::user()->load('Test');
        $isStarted = TestUserSubmited::where([
            ['user_id',Auth::user()->id],
            ['test_id',$userTest->Test[0]->id]
        ])->first();

//        if(!$isStarted && empty($isStarted)) {
            $startedTest = new TestUserSubmited;
            $startedTest->user_id = Auth::user()->id;
            $startedTest->test_id = $userTest->Test[0]->id;
            $startedTest->started_at = Carbon::now();
            $startedTest->save();

            $testBankQuestions = Test::with('bank','bank.Questions')->find($userTest->Test[0]->id);
            $questions = $testBankQuestions->bank[0]->Questions;
            $shuffleQuestions = $questions->shuffle();
            $finishTime = $startedTest->started_at->addHour($userTest->Test[0]->duration->format('H'));
            $finishTime = $finishTime->addMinutes($userTest->Test[0]->duration->format('i'));

            return view('user.tests.question',['questions' => $shuffleQuestions,'order' => 0,'current' => null,'finishTime' => $finishTime]);
//        }
        dd('started');
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
