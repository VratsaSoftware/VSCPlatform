<?php

namespace App\Http\Controllers\Users;

use App\Models\Courses\Entry;
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
        } else {
            $submited = TestUserSubmited::where([
                ['user_id',Auth::user()->id],
                ['test_id', Auth::user()->load('Test')->Test[0]->id]
            ])->whereNotNull('submited_at')->first();
            if ($submited) {
                $submitVals = $this->prepareSubmitStats();
                $submitVals['score'] = $this->generateScore();
                return view('user.tests.ending', $submitVals);
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
        $submited = TestUserSubmited::where([
            ['user_id',Auth::user()->id],
            ['test_id', $userTest->Test[0]->id]
        ])->whereNotNull('submited_at')->first();

        if (empty($submited) && is_null($submited)) {
            if(!$isStarted && empty($isStarted)) {
                $startedTest = new TestUserSubmited;
                $startedTest->user_id = Auth::user()->id;
                $startedTest->test_id = $userTest->Test[0]->id;
                $startedTest->started_at = Carbon::now();
                $startedTest->save();
            }else{
                $startedTest = $isStarted;
            }

            $testBankQuestions = Test::with('bank', 'bank.Questions')->find($userTest->Test[0]->id);
            $questions = $testBankQuestions->bank[0]->Questions;
            $shuffleQuestions = $questions->shuffle();
            $finishTime = $startedTest->started_at->addHour($userTest->Test[0]->duration->format('H'));
            $finishTime = $finishTime->addMinutes($userTest->Test[0]->duration->format('i'));
            //setting questions, started test id to maintain when the test is started
            session()->put('questions', $shuffleQuestions);
            session()->put('submited_id', $startedTest->id);
            return view('user.tests.question', ['questions' => $shuffleQuestions, 'order' => null, 'current' => null, 'finishTime' => $finishTime]);
        }

        if ($submited || !is_null($submited)) {
            $message = 'Теста е направен!';
            return redirect()->route('myProfile')->with('error', $message);
        }
    }

    public function answer(Request $request)
    {
        if (session()->exists('questions')) {
            $shuffleQuestions = session()->get('questions');
            $isQuestionExisting = array_column($shuffleQuestions->toArray(), 'id');
            $isQuestionExisting = array_map(function ($value) {
                return (int)$value;
            }, $isQuestionExisting);
        }
        //if request question id its not in started test questions
        if (isset($isQuestionExisting) && !in_array($request->question, $isQuestionExisting)) {
            $message = 'Невалиден въпрос';
            return redirect()->route('myProfile')->with('error', $message);
        }
        $userTest = Auth::user()->load('Test');
        if ($request->open_answer) {
            $qAnswer = BankAnswer::where('tests_bank_question_id', $request->question)->first();
            $isValid = 0;
            if ($qAnswer && $request->open_answer == $qAnswer->answer) {
                $isValid = 1;
            }
            $storeUpdAnswer = TestUserAnswer::updateOrCreate(['user_id' => Auth::user()->id, 'tests_bank_question_id' => $request->question],
                ['answer' => $request->open_answer, 'test_id' => $userTest->Test[0]->id, 'is_answered' => 1, 'is_valid' => $isValid]);
        }
        if ($request->one_answer) {
            $qAnswer = BankAnswer::find($request->one_answer);
            $isValid = 0;
            if ($qAnswer->correct > 0 || $qAnswer->correct != 0) {
                $isValid = 1;
            }

            $storeUpdAnswer = TestUserAnswer::updateOrCreate(['user_id' => Auth::user()->id, 'tests_bank_question_id' => $request->question],
                ['answer' => $request->one_answer, 'test_id' => $userTest->Test[0]->id, 'is_answered' => 1, 'is_valid' => $isValid]);
        }
        if ($request->many_answers) {
            $deleteAnswers[] = TestUserAnswer::where([
                ['user_id', Auth::user()->id],
                ['tests_bank_question_id', $request->question]
            ])->delete();
            foreach ($request->many_answers as $answer) {
                $qAnswer = BankAnswer::find($answer);
                $isValid = 0;
                if ($qAnswer->correct > 0 || $qAnswer->correct != 0) {
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

        $max = count($shuffleQuestions);
        //if time its not passed for the duration of test based on the time started the test
        if ($finishTime > Carbon::now()) {
            //if test is started and questions are inside session
            if (session()->exists('questions')) {
                //if is clicked next or prev buttons and empty on right bar question click
                if (!$request->give_q) {
                    foreach($shuffleQuestions as $key => $question){
                        $isAnswered = TestUserAnswer::where([
                            ['tests_bank_question_id', $question->id],
                            ['user_id', Auth::user()->id],
                            ['test_id', $userTest->Test[0]->id]
                        ])->get();
                        if (!$isAnswered->isEmpty()) {
                            $shuffleQuestions[$key]['answered'] = true;
                            $shuffleQuestions[$key]['answers'] = $isAnswered->toArray();
                            if ($shuffleQuestions[$key]->type == 'many') {
                                //parse id's of the answers to integer for later comparison
                                $shuffleQuestions[$key]['answers_many'] = array_column($shuffleQuestions[$key]['answers'], 'answer');
                                $shuffleQuestions[$key]['answers_many'] = array_map(function ($value) {
                                    return (int)$value;
                                }, $shuffleQuestions[$key]['answers_many']);
                            }
                        }
                    }
                    foreach ($shuffleQuestions as $key => $question) {
                        if ($question->id == $request->question) {
                            //if is clicked next button
                            if (is_null($request->prev) || !$request->prev || $request->prev != 'true') {
                                if (($key + 1) != $max) {
                                    $current = $shuffleQuestions[$key + 1];
                                    $order = $key + 1;
                                } else {
                                    //if is reached last question on next click showing the first question
                                    $current = $shuffleQuestions[0];
                                    $order = null;
                                }
                            } else {
                                //is clicked prev button
                                if (($key - 1) >= 0) {
                                    $current = $shuffleQuestions[$key - 1];
                                    $order = $key - 1;
                                } else {
                                    //if is reached first question on prev click showing the last question
                                    $current = $shuffleQuestions[$max - 1];
                                    $order = null;
                                }
                            }
                        }
                    }
                } else {
                    //if rightbar is clicked on question
                    foreach ($shuffleQuestions as $key => $question) {
                        $isAnswered = TestUserAnswer::where([
                            ['tests_bank_question_id', $question->id],
                            ['user_id', Auth::user()->id],
                            ['test_id', $userTest->Test[0]->id]
                        ])->get();
                        if (!$isAnswered->isEmpty()) {
                            $shuffleQuestions[$key]['answered'] = true;
                            $shuffleQuestions[$key]['answers'] = $isAnswered->toArray();
                            if ($shuffleQuestions[$key]->type == 'many') {
                                //parse id's of the answers to integer for later comparison
                                $shuffleQuestions[$key]['answers_many'] = array_column($shuffleQuestions[$key]['answers'], 'answer');
                                $shuffleQuestions[$key]['answers_many'] = array_map(function ($value) {
                                    return (int)$value;
                                }, $shuffleQuestions[$key]['answers_many']);
                            }
                        }
                        if ($question->id == $request->give_q) {
                            $current = $shuffleQuestions[$key];
                            $order = $key;
                        }
                    }
                }
            }
            return view('user.tests.question', [
                'questions' => $shuffleQuestions,
                'order' => $order,
                'current' => $current,
                'finishTime' => $finishTime,
                'started' => true,
            ]);
        }
        $startedTest->submited_at = Carbon::now();
        $startedTest->save();
        $submitVals = $this->prepareSubmitStats();
        $submitVals['score'] = $this->generateScore();
        $startedTest->score = $submitVals['score']['percentage'];
        $startedTest->save();

        return view('user.tests.ending', $submitVals);
    }

    public function prepareSubmitStats()
    {
        if (session()->get('submited_id')) {
            $userTest = Auth::user()->load('Test');
            $test = $userTest->Test[0];
            $answered = TestUserAnswer::where([
                ['user_id', Auth::user()->id],
                ['test_id', $userTest->Test[0]->id],
                ['is_answered', 1]
            ])->select('tests_bank_question_id')->groupBy('tests_bank_question_id')->get();
            $answeredNum = count($answered);
            $startedTest = TestUserSubmited::find(session()->get('submited_id'));
            $started_at = $startedTest->started_at;
            if (!session()->exists('time')) {
                $time = $started_at->diff($startedTest->submited_at)->format('%H' . 'ч. ' . ':%I' . 'м. ' . ':%S' . 'с. ');
                session()->put('time', $time);
            }

            return ['test' => $test, 'answeredNum' => $answeredNum, 'started_at' => $started_at, 'time' => isset($time) ? $time : session()->get('time')];
        }
        $message = 'Теста е направен!';
        return redirect()->route('myProfile')->with('error', $message);
    }

    public function submitTest()
    {
        if (session()->get('submited_id')) {
            $startedTest = TestUserSubmited::find(session()->get('submited_id'));
            $startedTest->submited_at = Carbon::now();
            $startedTest->save();
            $submitVals = $this->prepareSubmitStats();
            $submitVals['score'] = $this->generateScore();
            $startedTest->score = $submitVals['score']['percentage'];
            $startedTest->save();
            $entry = Entry::with('User', 'Form')->where('user_id', Auth::user()->id)->first();
            if($entry) {
                $entry->test_score = $submitVals['score']['percentage'];
                $entry->save();
            }
//            session()->forget('submited_id');
//            session()->forget('questions');
//            session()->forget('time');
            return view('user.tests.ending', $submitVals);
        }
        $message = 'Теста е направен!';
        return redirect()->route('myProfile')->with('error', $message);
    }

    public function generateScore()
    {
        $userTest = Auth::user()->load('Test');
        $answered = TestUserAnswer::with('Question')->where([
            ['user_id', Auth::user()->id],
            ['test_id', $userTest->Test[0]->id],
            ['is_answered', 1]
        ])->get();
        $score = 0;
        foreach ($answered as $answer) {
            if ($answer->is_valid > 0 || $answer->is_valid != '0') {
                $points = (int)$answer->Question->difficulty;
                if (!is_null($answer->bonus)) {
                    $points += $answer->bonus;
                }
                $score += $points;
            }
        }
        $questions = $userTest->load('Test.bank', 'Test.bank.questions');
        $questionsCount = $questions->Test[0]->bank[0]->questions->count();
        $maxScore = 0;
        foreach ($questions->Test[0]->bank[0]->questions as $q) {
            $maxScore += (int)$q->difficulty;
            if (!is_null($q->bonus)) {
                $maxScore += $q->bonus;
            }
        }

        $answeredIds = TestUserAnswer::where([
            ['user_id', Auth::user()->id],
            ['test_id', $userTest->Test[0]->id],
            ['is_answered', 1]
        ])->select('tests_bank_question_id')->groupBy('tests_bank_question_id')->get();
        $answeredNum = count($answeredIds);
        $percent = $score / $maxScore;
        $data['questionsCount'] = $questionsCount;
        $data['answered'] = $answeredNum;
        $data['score'] = $score;
        $data['maxScore'] = $maxScore;
        $data['percentage'] = (float)number_format($percent * 100, 1);

        return $data;
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
