@extends('layouts.template')
@section('title', 'Завършване на Тест')
@section('content')
    <link rel="stylesheet" href="{{asset('css/test_prepare.css')}}">
    <div class="content-wrap" style="margin-top:13vw">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap stats-holder">
                <div class="col-md-4 text-center">
                    Заглавие :<br/>
                    <strong>{{$test->title}}</strong>
                </div>
                <div class="col-md-4 text-center">
                    Започнат:<br/>
                    <strong>{{$started_at->format('d-m-Y H:i')}}</strong>
                </div>
                <div class="col-md-4 text-center">
                    Време:<br/>
                    <strong>{{$time}}</strong>
                </div>
                <div class="col-md-3 text-center">Брой Въпроси:<br/><strong> {{$score['questionsCount']}}</strong></div>
                <div class="col-md-3 text-center">Брой Отговори:<br/><strong> {{$score['answered']}}</strong></div>
                <div class="col-md-3 text-center">Точки верни отговори:<br/><strong> {{$score['score']}}</strong></div>
                <div class="col-md-3 text-center">Максимален брой точки:<br/><strong> {{$score['maxScore']}}</strong>
                </div>
                <div class="col-md-12 text-center">
                    <strong>Резултат: {{$score['percentage']}}%</strong>
                    <!-- Progress bar 4 -->
                    <div class="progress mx-auto" data-value='{{$score['percentage']}}'>
                          <span class="progress-left">
                                        <span class="progress-bar border-warning"></span>
                          </span>
                        <span class="progress-right">
                        <span class="progress-bar border-warning"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">{{$score['percentage']}}<sup class="small">%</sup></div>
                        </div>
                    </div>
                    <!-- END -->
                </div>
            </div>
            <div class="col-md-12 text-center"><a href="{{route('application.index')}}">
                    <button class="btn btn-outline-success">прогрес</button>
                </a></div>
        </div>
    </div>
    <script>
        $(function() {

            $(".progress").each(function() {

                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }

            })

            function percentageToDegrees(percentage) {

                return percentage / 100 * 360

            }

        });
    </script>
@endsection