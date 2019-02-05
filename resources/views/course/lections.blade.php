@extends('layouts.template')
@section('title', 'Лекции модул - '.$module->name)
@section('content')
<div class="content-wrap">
    <div class="section">
        @if (!empty(Session::get('success')))
        <p>
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        </p>
        @endif
        @if ($message = Session::get('error'))
        <p>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                <p>{{ $message }}</p>
            </div>
        </p>
        @endif
        <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
            <div class="col-md-12 text-center">
                <p>
                    {{$module->name}}
                </p>
                <p>
                    {{$module->Course->description}}
                </p>
            </div>
        <div class="col-md-12 lvl-program-holder d-flex flex-row flex-wrap">
            <div class="col-md-12 lvl-title text-center">Учебна Програма <i class="fas fa-book-open"></i>&nbsp;{{count($lections)}}</div>
            <!-- modal for editing elements -->
            <div id="modal">
                <div class="modal-content print-body">
                    <div class="modal-header">
                        <h2></h2>
                    </div>
                    <div class="copy text-center">

                        <p>

                        </p>

                        </form>
                    </div>
                    <div class="cf footer">
                        <div></div>
                        <a href="#close" class="btn close-modal">Затвори</a>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <!-- end of modal -->
            @foreach ($lections as $key => $lection)
            @if(is_null($lection->type))
                <!-- one lecture -->
                @if($lection->first_date->isToday() || !is_null($lection->second_date) && $lection->second_date->isToday())
                    <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-today">
                @else
                    <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap">
                @endif
                    <div class="col-md-1 lecture-img text-center">
                        <img src="{{asset('/images/student-hat.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                            <span>{{$lection->order}}</span>
                    </div>
                    <div class="col-md-11 lecture-txt">
                        <span class="lection-title">{{$lection->title}}</span>
                        <span>
                            @if($lection->first_date)
                                &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->first_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->first_date->format('H:i')}}</span>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                             /
                            @if($lection->second_date)
                                &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->second_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->second_date->format('H:i')}}</span>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                         </span><br>

                    @if(!Auth::user() && $lection->visibility != Config::get('courseVisibility.public'))
                        <span class="lection-description">Тази лекция не е публична!</span>
                        <div class="cf footer text-center">
                            <a href="{{route('home')}}" class="btn close-modal">ВХОД</a>
                        </div>
                    @else

                        @if(strlen($lection->description) > 250)
                            <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                        @else
                            <span class="lection-description">{{$lection->description}}</span>
                        @endif
                        <br>
                        <div class="col-md-12 lecture-options text-center d-flex flex-row flex-wrap">
                            <div class="col-md-3 video-lecture">
                                     @if($lection->Video()->exists())
                                         <a data-toggle="modal" data-target="#modal" href="#modal" data-user="{{isset(Auth::user()->id)?Auth::user()->id:0}}" data-video-id="{{$lection->Video->id}}" data-url="{{route('lection.video.show')}}">видео</a>
                                     @else
                                        <span class="empty-data">видео</span>
                                     @endif
                                <div class="col-md-12 video-holder">
                                    <div class="col-md-12 d-flex flex-row flex-wrap">
                                        <div class="col-md-12 video-title">{{$lection->title}}</div>
                                        @if($lection->Video()->exists())
                                        <span class="video-url">{{$lection->Video->url}}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 presentation-lecture">
                                @if($lection->presentation)
                                    <a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" target="__blank">слайдове </a>
                                @else
                                    <span class="empty-data">слайдове</span>
                                @endif
                            </div>
                            <div class="col-md-2 homework-lecture">
                                @if($lection->homework_criteria)
                                    <a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/homework-'.$lection->id.'/'.$lection->homework_criteria)}}" target="__blank">за домашно </a>
                                @else
                                    <span class="empty-data">за домашно</span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if($lection->demo)
                                    <a href="{{$lection->demo}}" target="__blank">демо </a>
                                @else
                                    <span class="empty-data">демо</span>
                                @endif
                            </div>
                            <div class="col-md-3 edit-lecture comment">
                                @if(Auth::user() && !Auth::user()->isCommented($lection->id))
                                <a href="#modal">коментар</a>
                                <div class="col-md-12 comment-holder">
                                    <div class="col-md-12 d-flex flex-row flex-wrap text-center">
                                        <div class="col-md-12 comment-title">{{$lection->title}}</div>
                                        <div class="col-md-12 text-center">
                                            <form action="{{route('user.module.lection.comment',['user' => Auth::user()->id,'course' => $module->Course->id,'module' => $module->id,'lection' => $lection->id])}}" id="comment_form" name="comment_form" method="POST">
                                                {{ csrf_field() }}
                                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="остави коментар"></textarea><br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @elseif(!Auth::user())
                                    <span class="empty-data">коментар</span>
                            @else
                                    <span class="empty-data">вече сте коментирали</span>
                            @endif
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
                <!-- end of one lecture -->
            @elseif($lection->type == Config::get('lectionTypes.vacantion'))
                <!-- start vacantion -->
                <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-vacantion">
                    <div class="col-md-1 lecture-img text-center">
                        <img src="{{asset('/images/vacantion.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                            <span>{{$lection->order}}</span>
                    </div>
                    <div class="col-md-11 lecture-txt">
                        <span class="lection-title">{{$lection->title}}</span>
                        <span>
                            @if($lection->first_date)
                                &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->first_date->format('d-m-Y')}}&nbsp;
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                             /
                            @if($lection->second_date)
                                &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->second_date->format('d-m-Y')}}&nbsp;
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                         </span><br>

                    @if(!Auth::user() && $lection->visibility != Config::get('courseVisibility.public'))
                        <span class="lection-description">Трябва да сте влезели в профила си !</span>
                        <div class="cf footer text-center">
                            <a href="{{route('home')}}" class="btn close-modal">ВХОД</a>
                        </div>
                    @else
                        @if(strlen($lection->description) > 250)
                            <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                        @else
                            <span class="lection-description">{{$lection->description}}</span>
                        @endif
                        <br>
                    @endif
                    </div>
                </div>
                <!-- end of vacantion -->
            @else
                <!-- start test -->
                <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-test">
                    <div class="col-md-1 lecture-img text-center">
                        <img src="{{asset('/images/test.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                            <span>{{$lection->order}}</span>
                    </div>
                    <div class="col-md-11 lecture-txt">
                        <span class="lection-title">{{$lection->title}}</span>
                        <span>
                            @if($lection->first_date)
                                &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->first_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->first_date->format('H:i')}}</span>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                             /
                            @if($lection->second_date)
                                &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;{{$lection->second_date->format('d-m-Y')}}&nbsp;<span class="lection-hour">&nbsp;<i class="far fa-clock"></i>&nbsp;{{$lection->second_date->format('H:i')}}</span>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                         </span><br>

                    @if(!Auth::user() && $lection->visibility != Config::get('courseVisibility.public'))
                        <span class="lection-description">Трябва да сте влезели в профила си !</span>
                        <div class="cf footer text-center">
                            <a href="{{route('home')}}" class="btn close-modal">ВХОД</a>
                        </div>
                    @else
                        @if(strlen($lection->description) > 250)
                            <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                        @else
                            <span class="lection-description">{{$lection->description}}</span>
                        @endif
                        <br>
                    @endif
                    </div>
                </div>
                <!-- end of test -->
            @endif

            @endforeach
        </div>

    </div>
</div>
<script src="{{asset('/js/lections.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/student_lectures.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_course_options.css')}}" />');
    });
</script>
@endsection
