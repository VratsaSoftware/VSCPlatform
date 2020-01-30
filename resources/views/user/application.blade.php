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
                <div class="col-md-12 candidation-title">
                        <div class="form-group">
                            <label for="sel1">Процес на кандидстване</label>
                        </div>
                </div>
                <div class="col-md-12 candidation-text" style="margin-bottom:0">
                    @if(isset($entry->approved) && is_null($entry->approved))
                        все още нямате оценка
                    @else
                        @if(!env('IS_APPLICATION_OPEN', false))
                            <b>Регистрацията за записване на курсовете все още не е отворена!</b><br/>
                            <i>Записването ще стане след : {{env('APPLICATION_DATE', 'Септември')}}</i>
                        @endif
                    @endif
                </div>
                <div class="col-md-12 candidation-text">
                    @if(is_null($entry) || !is_null($entry) && is_null($entry->entry_form_id))
                        <a href="{{route('application.create')}}" id="candidate"
                           data-url="{{route('application.create')}}">
                            <button type="button" class="btn btn-success">Кандидаствай</button>
                        </a>
                    @endif

                    @if(isset($entry) && !is_null($entry->entry_form_id))
                            @if(is_null($entry->test_score))
                                трябва да се държи тест
                            @endif
                            
                            @if(!is_null($entry->test_score) && is_null($entry->task))
                                    самостоятелна задача
                            @endif
                        
                            @if(!is_null($entry->task) && is_null($entry->interview))
                                    трябва да се ходи на интервю
                            @endif
                            
                            @if(!is_null($entry->approved))
                                прием (честито)
                            @endif
                    @endif
                </div>
                <div class="col-md-1"></div>
                @if(is_null($entry) || !is_null($entry) && is_null($entry->entry_form_id))
                    <div class="col-md-10">
                        <div class="progress" style="margin-bottom:0;">
                            <div class="progress-bar progress-bar-striped bg-gradient" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                електронна форма
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($entry) && !is_null($entry->entry_form_id))
                    @if(is_null($entry->test_score))
                        <div class="col-md-10">
                            <div class="progress" style="margin-bottom:0;">
                                <div class="progress-bar progress-bar-striped bg-gradient" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    предварителен тест
                                </div>
                            </div>
                        </div>
                    @endif
        
                    @if(!is_null($entry->test_score) && is_null($entry->task))
                            <div class="col-md-10">
                                <div class="progress" style="margin-bottom:0;">
                                    <div class="progress-bar progress-bar-striped bg-gradient" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        самостоятелна задача
                                    </div>
                                </div>
                            </div>
                    @endif
        
                    @if(!is_null($entry->task) && is_null($entry->interview))
                            <div class="col-md-10">
                                <div class="progress" style="margin-bottom:0;">
                                    <div class="progress-bar progress-bar-striped bg-gradient" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        интервю
                                    </div>
                                </div>
                            </div>
                    @endif
        
                    @if(!is_null($entry->approved))
                            <div class="col-md-10">
                                <div class="progress" style="margin-bottom:0;">
                                    <div class="progress-bar progress-bar-striped bg-gradient" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        прием
                                    </div>
                                </div>
                            </div>
                    @endif
                @endif
                <div class="col-md-1"></div>
                    <!-- images -->
                    
                    <div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
                        <div class="col-md-1"></div>
                        <div class="steps col-md-2 first-candidate-img">
                            <img src="{{asset('/images/candidate-img-step-1.png')}}" alt="step"
                                 class="img-fluid candidate-img">
                        </div>
                        
                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-2.png')}}" alt="step"
                                 class="img-fluid candidate-img">
                        </div>
                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-3.png')}}" alt="step"
                                 class="img-fluid candidate-img">
                        </div>
                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-4.png')}}" alt="step"
                                 class="img-fluid candidate-img">
                        </div>
                        <div class="steps col-md-2">
                            <img src="{{asset('/images/candidate-img-step-5.png')}}" alt="step"
                                 class="img-fluid candidate-img">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
            </div>
        </div>
        <!-- end of course candidation statistic -->
    </div>
    <!-- opened courses -->
    <div class="col-md-12 events-now-text text-center" style="border-top:1px solid #d3d3d3;padding-top: 1%;">Отворени Курсове</div>
    <div class="col-md-12 available-events d-flex flex-row flex-wrap">
        @foreach($courses as $course)
            <div class="col-md-6">
                <div class="event-title col-md-12" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">{{$course->name}}</div>
                <div class="event-body col-md-12 text-center">
                    <a href="{{route('application.create',[$course->training_type,$course->id])}}">
                        <div class="event-body-text levels-btn" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                            Запиши се
                        </div>
                    </a>
                    <img src="{{asset('images/course-'.$course->id.'/'.$course->picture)}}" style="height:auto" alt="event-body">
                </div>
                <div class="event-footer col-md-12 d-flex flex-row flex-wrap" style="border:1px solid {{is_null($course->color)?'':$course->color}};background: {{is_null($course->color)?'':$course->color}}">
                    <div class="col-md-6">Лектор(и):<br/>
                        @foreach($course->Lecturers as $lecturer)
                            {{$lecturer->User->name}} {{$lecturer->User->last_name}} <br/>
                        @endforeach
                    </div>
                    <div class="col-md-6">Начало: <br/>
                        {{$course->starts->format('d-m-Y')}}
                    </div>
                </div>
            </div>
    @endforeach
    <!-- end of opened courses -->
    </div>
    </div>
    </div>
    
    <script src="./js/fixed-left-top-menu.js"></script>
    <script>
        // $(function () {
        //     // $('.candidation-text').text($('.active-step > div').text());
        //
        //     $('li.active-step').prevAll().mouseenter(function () {
        //         $(this).parent().prev('.candidation-text').html($(this).find('.personal-steps').html());
        //     });
        //
        //     $('li.active-step').prevAll().mouseleave(function () {
        //         // $('.candidation-text').text($('.active-step').find('.personal-steps').text());
        //     });
        //
        //     $('.steps > li').mouseenter(function () {
        //         $(this).parent().prev('.candidation-text').html($(this).find('.personal-steps').html());
        //     });
        //
        //     $('li.active-step').nextAll().mouseenter(function () {
        //         $(this).css('background', '#ffcccc').attr('title', 'Този етап предстои!');
        //     });
        //
        //     $('li.active-step').nextAll().mouseleave(function () {
        //         $(this).css('background', '#D3D3D3').attr('title', '');
        //     });
        //
        // });
    </script>
