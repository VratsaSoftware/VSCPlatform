@extends('layouts.template')
@section('title', 'Стартиране на Тест')
@section('content')
    <link rel="stylesheet" href="{{asset('css/test_prepare.css')}}">
    <div class="content-wrap" style="margin-top:13vw">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-4 text-center">
                    <img src="{{asset('images/time.png')}}" width="256px" alt="time">
                    <br>
                    Продължителност: {{$test->duration->format('H'.'ч.'.'i'.'м.')}}
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset('images/title.png')}}" width="256px" alt="title">
                    <br>
                    Заглавие: {{$test->title}}
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset('images/questions.png')}}" width="256px" alt="title">
                    <br>
                    Брой въпроси: {{$qCount}}
                </div>
                <div class="col-md-12" style="margin-top:5vw">
                    Основни правила:
                    <ul>
                        <li>Може да се връщате на въпросите по всяко време преди предаването на теста</li>
                        <li>Въпросите са няколко вида:
                            <ol>
                                <li><i class="fas fa-keyboard"></i> отворен отговор (поле за въвеждане на текст)</li>
                                <li><i class="far fa-dot-circle"></i> един верен отговор</li>
                                <li><i class="far fa-check-square"></i> много верни отговори (повече от 1 верен отговор)</li>
                            </ol>
                        </li>
                        <li>Теста се предава преди да изтече времетраенето на самия тест, след което се изпраща автоматично</li>
                    </ul>
                </div>
                <div class="col-md-12 text-center" style="margin-top:5vw">
                    <a href="{{route('test.start')}}">
                        <button id="begin_test" class="btn-lg btn-outline-success">Започни Теста</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection