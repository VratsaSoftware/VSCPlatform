@extends('layouts.template')
@section('title', 'Завършване на Тест')
@section('content')
    <div class="content-wrap" style="margin-top:13vw">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                {{$test->title}} {{$answeredNum}} {{$started_at->format('d-m-Y H:i')}}
            </div>
            <div class="col-md-12">
                Score:
                    Брой Въпроси: {{$score['questionsCount']}}
                    Брой Отговори: {{$score['answered']}}
                    Точки верни отговори: {{$score['score']}}
                    Максимален брой точки: {{$score['maxScore']}}
                    Резултат: {{$score['percentage']}}%
            </div>
        </div>
    </div>

@endsection