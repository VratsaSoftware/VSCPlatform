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
use Illuminate\Support\Facades\Input;
use Image;
use File;

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


        foreach ($banks as $bank) {
            $bankDifficultyCount = ['easy' => 0, 'medium' => 0, 'hard' => 0];
            $correctAnswersCount = 0;
            foreach ($bank->Questions as $question) {
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
                if ($answer->correct > 0) {
                    $correctAnswersCount += 1;
                }
            }
            $question->correctCount = $correctAnswersCount;
        }

        return view('admin.tests.index',
            ['banks' => $banks, 'questions' => $questions, 'difficultyCount' => $difficultyCount]);
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
        dd($request);
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

    public function createBank(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|',
            'bank_img' => 'sometimes|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'from_bank' => 'nullable|array',
            'from_bank_easy' => 'nullable|array',
            'from_bank_medium' => 'nullable|array',
            'from_bank_hard' => 'nullable|array',
        ]);
        $newBank = new Bank;
        if (Input::hasFile('bank_img')) {
            $bankPic = Input::file('bank_img');
            $image = Image::make($bankPic->getRealPath());
            $image->fit(50, 50, function ($constraint) {
                $constraint->upsize();
            });
            $name = time() . "_" . $bankPic->getClientOriginalName();
            $name = str_replace(' ', '', strtolower($name));
            $name = md5($name);
            $path = public_path().'/images/questions';
            if (!File::exists($path)) {
                $folder = mkdir($path, 0777, true);
            }
            $image->save($path.'/'.$name, 90);
            $newBank->logo = $name;
        }

        $newBank->name = $data['title'];
        $newBank->save();

        if(!is_null($data['from_bank'])){
            foreach ($data['from_bank'] as $num => $bank){
                if(!is_null($data['from_bank_easy'][$num])){
                    $questions = BankQuestion::where([
                        ['difficulty','1'],
                        ['test_bank_id',$bank]
                    ])->get();

                    if (!$questions->isEmpty() && count($questions) > (int)$data['from_bank_easy'][$num])
                    {
                        $questions = $questions->random($data['from_bank_easy'][$num]);
                        foreach($questions as $question){
                            $newQ = $question->replicate();
                            $newQ->test_bank_id = $newBank->id;
                            $newQ->save();
                            $answers = BankAnswer::where('tests_bank_question_id',$question->id)->get();
                            foreach($answers as $answer){
                                $newAnswer = $answer->replicate();
                                $newAnswer->tests_bank_question_id = $newQ->id;
                                $newAnswer->save();
                            }
                        }
                    }
                }
            }
        }

        $message = __('Успешно добавена Банка '.$newBank->name.' !');
        return redirect()->back()->with('success', $message);
    }
}
