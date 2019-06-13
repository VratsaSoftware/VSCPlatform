<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tests\Test;
use App\Models\Tests\AssignedTest;
use App\Models\Tests\Bank;
use App\Models\Tests\BankQuestion;
use App\Models\Tests\BankAnswer;
use App\Models\Tests\BankType;
use App\Models\Tests\TestUserAnswer;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::withCount('Questions')->get();
        $banks->load('Questions.Answers');
        $questions = BankQuestion::with('Answers')->get();
        $difficultyCount = ['easy' => 0, 'medium' => 0, 'hard' => 0];

        foreach ($questions as $question) {
            switch (intval($question->difficulty)) {
                case 1:
                    $difficultyCount['easy'] += 1;
                    break;
                case 2:
                    $difficultyCount['medium'] += 1;
                    break;
                case 3:
                    $difficultyCount['hard'] += 1;
                    break;
            }
        }


        foreach ($banks as $bank){
            $bankDifficultyCount = ['easy' => 0, 'medium' => 0, 'hard' => 0];
            $correctAnswersCount = 0;
            foreach($bank->Questions as $question){
                switch (intval($question->difficulty)) {
                    case 1:
                        $bankDifficultyCount['easy'] += 1;
                        break;
                    case 2:
                        $bankDifficultyCount['medium'] += 1;
                        break;
                    case 3:
                        $bankDifficultyCount['hard'] += 1;
                        break;
                }
            }
            $bank->difficultyCount = $bankDifficultyCount;
            foreach ($question->Answers as $answer) {
                if($answer->correct > 0){
                    $correctAnswersCount += 1;
                }
            }
            $question->correctCount = $correctAnswersCount;
        }

        return view('admin.tests.index',['banks' => $banks,'questions' => $questions,'difficultyCount' => $difficultyCount]);
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
