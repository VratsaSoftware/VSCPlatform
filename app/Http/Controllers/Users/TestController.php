<?php

namespace App\Http\Controllers\Users;

use App\Models\Tests\BankAnswer;
use App\Models\Tests\Test;
use App\Models\Tests\TestUserAnswer;
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
        $userTest = User::with('Test')->whereHas('Test', function ($q) {
            $q->where('expire_at', '>', Carbon::now());
        })->find(Auth::user()->id);
        if ($userTest) {
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
            ['user_id', Auth::user()->id],
            ['test_id', $userTest->Test[0]->id]
        ])->first();

//        if(!$isStarted && empty($isStarted)) {
        $startedTest = new TestUserSubmited;
        $startedTest->user_id = Auth::user()->id;
        $startedTest->test_id = $userTest->Test[0]->id;
        $startedTest->started_at = Carbon::now();
        $startedTest->save();

        $testBankQuestions = Test::with('bank', 'bank.Questions')->find($userTest->Test[0]->id);
        $questions = $testBankQuestions->bank[0]->Questions;
        $shuffleQuestions = $questions->shuffle();
        $finishTime = $startedTest->started_at->addHour($userTest->Test[0]->duration->format('H'));
        $finishTime = $finishTime->addMinutes($userTest->Test[0]->duration->format('i'));
        session()->put('questions',$shuffleQuestions);
        session()->put('submited_id',$startedTest->id);
        session()->put('answered',0);
        return view('user.tests.question', ['questions' => $shuffleQuestions, 'order' => null, 'current' => null, 'finishTime' => $finishTime]);
//        }
    }

    public function answer(Request $request)
    {
        $userTest = Auth::user()->load('Test');
        if($request->open_answer) {
            $qAnswer = BankAnswer::where('tests_bank_question_id',$request->question)->first();
            $isValid = 0;
            if($qAnswer && $request->open_answer == $qAnswer->answer){
                $isValid = 1;
            }
            $storeUpdAnswer = TestUserAnswer::updateOrCreate(
                ['user_id' => Auth::user()->id, 'tests_bank_question_id' => $request->question],
                ['answer' => $request->open_answer,'test_id' => $userTest->Test[0]->id,'is_answered' => 1,'is_valid' => $isValid]);
        }
        if($request->one_answer) {
                $qAnswer = BankAnswer::find($request->one_answer);
                $isValid = 0;
                if($qAnswer->correct > 0 || $qAnswer->correct != 0){
                    $isValid = 1;
                }

                $storeUpdAnswer = TestUserAnswer::updateOrCreate(
                    ['user_id' => Auth::user()->id, 'tests_bank_question_id' => $request->question],
                    ['answer' => $request->one_answer,'test_id' => $userTest->Test[0]->id,'is_answered' => 1,'is_valid' => $isValid]);
        }
        if($request->many_answers) {
            $deleteAnswers[] = TestUserAnswer::where(
                ['user_id' => Auth::user()->id, 'tests_bank_question_id' => $request->question])->delete();
            foreach($request->many_answers as $answer) {
                $qAnswer = BankAnswer::find($answer);
                $isValid = 0;
                if($qAnswer->correct > 0 || $qAnswer->correct != 0){
                    $isValid = 1;
                }
                $insertNewAnswers = new TestUserAnswer;
                $insertNewAnswers->user_id = Auth::user()->id;
                $insertNewAnswers->tests_bank_question_id = $request->question;
                $insertNewAnswers->test_id = $userTest->Test[0]->id;
                $insertNewAnswers->is_answered = 1;
                $insertNewAnswers->is_valid = $isValid;
                $insertNewAnswers->answer = $answer;
                $insertNewAnswers->save();
            }
        }
        $startedTest = TestUserSubmited::find(session()->get('submited_id'));
        $finishTime = $startedTest->started_at->addHour($userTest->Test[0]->duration->format('H'));
        $finishTime = $finishTime->addMinutes($userTest->Test[0]->duration->format('i'));
        if(session()->exists('questions')) {
            $shuffleQuestions = session()->get('questions');
                $max = count($shuffleQuestions);
                foreach ($shuffleQuestions as $key => $question) {
                    $isAnswered = TestUserAnswer::where([
                        ['tests_bank_question_id',$question->id],
                        ['user_id',Auth::user()->id],
                        ['test_id',$userTest->Test[0]->id]
                    ])->get();
                    if(!$isAnswered->isEmpty()){
                        $shuffleQuestions[$key]['answered'] = true;
                        $shuffleQuestions[$key]['answers'] = $isAnswered->toArray();
                    }
                    if ($question->id == $request->question) {
                        if(is_null($request->prev) || !$request->prev || $request->prev != 'true') {
                            if (($key + 1) != $max) {
                                $current = $shuffleQuestions[$key + 1];
                                $order = $key + 1;
                            } else {
                                $current = null;
                                $order = null;
                            }
                        }else{
                            if (($key - 1) >= 0) {
                                $current = $shuffleQuestions[$key - 1];
                                $order = $key - 1;
                            } else {
                                $current = null;
                                $order = null;
                            }
                        }
                    }
                }
//                if(is_null($current) || is_null($order)){
//                    dd('end');
//                }
            return view('user.tests.question', ['questions' => $shuffleQuestions, 'order' => $order, 'current' => $current, 'finishTime' => $finishTime]);
        }else{
            dd('no questions available');
        }
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
        //
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
}
