@extends('layouts.template')
@section('title', 'Кандидастване')
@section('content')
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <div class="content-wrap">
        <div class="section">
            <div class="candidation-wrap col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 candidation text-center d-flex flex-row flex-wrap">
                    @if (!empty(Session::get('success')))
                        <p>
                            <div class="alert alert-success slide-on">
                        <p>{{ session('success') }}</p>
                </div>
                </p>
            @endif
            <!-- course candidation statistic -->
                <div class="col-md-12 candidation-title">Програмиране</div>
                <div class="col-md-12 candidation-text" style="margin-bottom:0">
                    @if(isset($entry->approved) && is_null($entry->approved))
                        все още нямате оценка
                    @else
                        @if(!env('IS_APPLICATION_OPEN', false))
                            <b>Регистрацията за записване на курсовете все още не е отворена!</b><br/>
                            <i>Записването ще стане след : {{env('APPLICATION_DATE', 'Септември')}}</i>
                        @else
                            обща информация
                        @endif
                    @endif
                </div>
                <div class="col-md-12 candidation-text">

                </div>
            @if(env('IS_APPLICATION_OPEN', false))
                <!-- circle steps icons -->
                    <ul class="steps col-md-12">
                        @if(is_null($entry) || is_null($entry->test_score))
                            <li class="active-step">1
                        @else
                            <li>1
                                @endif
                                <span>електронна форма</span>
                                <div class="personal-steps">
                                    @if(is_null($entry))
                                        <a href="{{route('application.create')}}"><button type="button" class="btn btn-success">Кандидаствай</button></a>
                                    @else
                                        вече сте изпратили своята форма
                                    @endif
                                </div>
                            </li>
                            @if(isset($entry->test_score) && is_null($entry->task))
                                <li class="active-step">2
                            @else
                                <li>2
                                    @endif
                                    <span>предварителен тест</span>
                                    <div class="personal-steps">
                                        @if(isset($entry))
                                            {{!is_null($entry->test_score)?$entry->test_score:'тази стъпка предстои'}}
                                        @endif
                                    </div>
                                </li>
                                @if(isset($entry->task) && is_null($entry->interview))
                                    <li class="active-step">3
                                @else
                                    <li>3
                                        @endif
                                        <span>самостоятелна задача</span>
                                        <div class="personal-steps">
                                            @if(isset($entry))
                                                {{!is_null($entry->task)?$entry->task:'тази стъпка предстои'}}
                                            @endif
                                        </div>
                                    </li>
                                    @if(isset($entry->interview) && is_null($entry->approved))
                                        <li class="active-step">4
                                    @else
                                        <li>4
                                            @endif
                                            <span>интервю</span>
                                            <div class="personal-steps">
                                                @if(isset($entry))
                                                    {{!is_null($entry->interview)?$entry->interview:'тази стъпка предстои'}}
                                                @endif
                                            </div>
                                        </li>
                                        @if(isset($entry->approved) && !is_null($entry->approved))
                                            <li class="active-step">5
                                        @else
                                            <li>5
                                                @endif
                                                <span>прием</span>
                                                <div class="personal-steps">
                                                    @if(isset($entry))
                                                        {{!is_null($entry->approved)?$entry->approved:'тази стъпка предстои'}}
                                                    @endif
                                                </div>
                                            </li>
                    </ul>

                    <!-- images -->

                    <div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
                        <div class="col-md-1"></div>
                        <div class="steps col-md-2 first-candidate-img">
                            <img src="{{asset('/images/candidate-img-step-1.png')}}" alt="step" class="img-fluid candidate-img">
                        </div>

                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-2.png')}}" alt="step" class="img-fluid candidate-img">
                        </div>
                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-3.png')}}" alt="step" class="img-fluid candidate-img">
                        </div>
                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-4.png')}}" alt="step" class="img-fluid candidate-img">
                        </div>
                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-5.png')}}" alt="step" class="img-fluid candidate-img">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
            </div>
        </div>
        <!-- end of course candidation statistic -->
    @endif

    <!-- opened courses -->
    {{-- <div class="col-md-12 events-now-text text-center">Отворени Курсове</div>
    <div class="available-events d-flex flex-row flex-wrap">
      <div class="col-md-6">
        <div class="event-title col-md-12">Програмиране с JAVA</div>
        <div class="event-body col-md-12 text-center">
          <a href="">
            <div class="event-body-text">
              Запиши се
            </div>
          </a>
          <img src="./images/code-logos/javalogo-big.png" alt="event-body">
        </div>
        <div class="event-footer col-md-12 d-flex flex-row flex-wrap">
          <div class="col-md-6">Лектор: Теодор Костадинов</div>
          <div class="col-md-6">Начало: 15 Септември</div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="event-title col-md-12">Angular JS</div>
        <div class="event-body col-md-12 text-center">
          <a href="">
            <div class="event-body-text">
              Кандидаствай
            </div>
          </a>
          <img src="./images/code-logos/angular-big.png" alt="event-body">
        </div>
        <div class="event-footer col-md-12 d-flex flex-row flex-wrap">
          <div class="col-md-6">Лектор:Лилия Михайлова</div>
          <div class="col-md-6">Начало: 1 Февруари</div>
        </div>
      </div> --}}
    <!-- end of opened courses -->
    </div>
    </div>
    </div>
    <script src="./js/fixed-left-top-menu.js"></script>
    <script>
        $(function(){
            // $('.candidation-text').text($('.active-step > div').text());

            $('li.active-step').prevAll().mouseenter(function(){
                $(this).parent().prev('.candidation-text').html($(this).find('.personal-steps').html());
            });

            $('li.active-step').prevAll().mouseleave(function(){
                // $('.candidation-text').text($('.active-step').find('.personal-steps').text());
            });

            $('.steps > li').mouseenter(function(){
                $(this).parent().prev('.candidation-text').html($(this).find('.personal-steps').html());
            });

            $('li.active-step').nextAll().mouseenter(function(){
                $(this).css('background','#ffcccc').attr('title','Този етап предстои!');
            });

            $('li.active-step').nextAll().mouseleave(function(){
                $(this).css('background','#D3D3D3').attr('title','');
            });

        });
    </script>
