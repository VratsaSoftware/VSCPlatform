@extends('layouts.template')
@section('title', 'Редактирай Модул/Ниво')
@section('content')
<div class="content-wrap">
    <div class="section">
        <div class="col-md-12 d-flex flex-row flex-wrap">
            @if (!empty(session('success')))
            <p>
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            </p>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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

            <div class="col-md-12 text-center picture-title">
                Заглавна Снимка
            </div>
            <form action="{{route('module.store')}}" method="POST" class="col-md-12" id="create_module" name="create_module" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-12 picture-holder text-center">
                    <label for="picture">
                        @if(!is_null($module->picture))
                            <img src="{{asset('/images/course-'.str_replace(' ', '', strtolower($module->Course->name)).'-'.$module->Course->id.'/module-'.str_replace(' ', '', strtolower($module->name)).'/'.$module->picture)}}" alt="course-pic" id="course-picture">
                        @else
                            <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                        @endif
                        <br>
                        (800x600px)
                    </label>
                </div>

                <div class="col-md-12 picture-button text-center">
                    <label class="picture-label" for="picture"><span class="upload-pic">качи<input type="file" id="picture" name="picture" onChange="CourseimagePreview(this);"></span></label>
                </div>
        </div>

        <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
            <div class="col-md-12 text-center">
                <p>
                    <label for="name">Име на модула/нивото</label><br>
                    <input type="text" id="name" name="name" placeholder="" class="name-course" value="{{$module->name}}">
                </p>
                <p>
                    <label for="description">Описание</label><br>
                    <textarea id="description" cols="30" rows="5" name="description" placeholder="" style="resize: none;">{{$module->description}}</textarea>
                </p>
                <p>
                    <label for="starts">Започва</label>
                    <input type="date" name="starts" id="starts" value="{{$module->starts->format('Y-m-d')}}">
                </p>
                <p>
                    <label for="ends">Свършва</label>
                    <input type="date" name="ends" id="ends" value="{{$module->ends->format('Y-m-d')}}">
                </p>
                <p>
                    <label for="order">Поредност на модула</label>

                    <input type="number" name="order" id="order" value="{{$module->order}}" class="section-el-bold" min="1">
                </p>
                <p>
                    <label for="visibility">Видимост на модула/нивото</label>
                    <select class="course-visibility section-el-bold" name="visibility" id="visibility">
                        @foreach(Config::get('courseVisibility') as $visibility)
                            @if($module->visibility == $visibility)
                                <option value="{{strtolower($visibility)}}" selected>{{ucfirst($visibility)}}</option>
                            @else
                                <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>
    </div>

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

    {{-- form editing lecture --}}
        <form class="edit-lection" id="edit-lection" action="" method="post" style="display:none">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <p>
                <label for="title">Заглавие</label>
                <input type="text" name="title" id="title" value="">
            </p>
            <p>
                <label for="first_date">Първа дата / Втора дата</label>
            <br/>
                <input type="datetime-local" id="first_date" value="" name="first_date"> / <input type="datetime-local" id="second_date" value="" name="second_date">
            </p>
            <p>
                <label for="description">Описание</label>
                <textarea class="el-value" id="description" name="description"></textarea>
            </p>
            <p>
                <label for="order">Поредност</label>
                <input type="number" name="order" id="order" value="">
            </p>
        </form>
    {{-- end editing form lecture --}}
    <div class="col-md-12 lvl-program-holder d-flex flex-row flex-wrap">
        <div class="col-md-12 lvl-title text-center">Учебна Програма <i class="fas fa-book-open"></i>&nbsp;{{count($lections)}}</div>
    @foreach ($lections as $key => $lection)
        @if(empty($lection->type))
            <!-- one lecture -->
            @if($lection->first_date->isToday() || $lection->second_date->isToday())
                <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap lection-today">
            @else
                <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap">
            @endif
                <div class="col-md-1 lecture-img text-center">
                    <img src="{{asset('/images/student-hat.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                        <span class="lection-order">{{$lection->order}}</span>
                </div>
                <span class="first-date-no-show" style="display:none">{{$lection->first_date->format('Y-m-d\TH:i:s')}}</span>
                <span class="second-date-no-show" style="display:none">{{$lection->second_date->format('Y-m-d\TH:i:s')}}</span>
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

                    @if(strlen($lection->description) > 250)
                        <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                    @else
                        <span class="lection-description">{{$lection->description}}</span>
                    @endif
                    <br>
                    <div class="col-md-12 lecture-options text-center d-flex flex-row flex-wrap">
                        <div class="col-md-2 video-lecture">
                                 @if($lection->Video()->exists())
                                     <a data-toggle="modal" data-target="#modal" href="#modal" class="video-exist" data="{{$lection->Video->url}}" data-url="{{route('lection.update',['lection' => $lection->id])}}">видео</a>
                                 @else
                                     <a href="#modal" class="add-video" data="{{route('module.update',$lection->id)}}">добави видео </a>
                                 @endif
                            <div class="col-md-12 video-holder">
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-12 video-title">{{$lection->title}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 presentation-lecture">
                            @if($lection->presentation)
                                <a href="#modal" data-url="{{route('lection.update',['lection' => $lection->id])}}" data="{{$lection->presentation}}" class="slides-exist">слайдове </a>
                            @else
                                <a href="#modal" class="add-presentation">добави слайдове </a>
                            @endif
                        </div>
                        <div class="col-md-2 homework-lecture">
                            @if($lection->homework_criteria)
                                <a href="{{asset('/data/course-'.str_replace(' ', '', strtolower($module->Course->name)).'/modules/'.str_replace(' ', '', strtolower($module->name)).'/homework-'.$lection->id.'/'.$lection->homework_criteria)}}" target="__blank">за домашно </a>
                            @else
                                <a href="#modal" class="add-homework">добави домашно </a>
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if($lection->demo)
                                <a href="{{$lection->demo}}" target="__blank">демо </a>
                            @else
                                <a href="#modal" class="add-homework">добави демо </a>
                            @endif
                        </div>
                        <div class="col-md-1 comments-view">
                            @if(!is_null($lection->Comments))
                                <a href="#modal">{{count($lection->Comments)}}<i class="fas fa-comment-dots"></i></a>
                                <div class="comments">
                                    <div class="col-md-12 d-flex flex-row flex-wrap comment-modal-holder" style="align-content: flex-start">
                                        <div class="comments-title col-md-12">Обратна Връзка</div>
                                        @foreach ($lection->Comments as $comment)
                                            <!-- one comment -->
                                            <div class="comment-pic-inside-modal col-md-12 d-flex flex-row flex-wrap">
                                                <div class="col-md-4">
                                                    <img src="{{asset('images/user-pics/'.$comment->Author->picture)}}" alt="botev" class="img-fluid modal-comment-pic">
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <span class="">{{$comment->Author->name}} {{$comment->Author->last_name}}</span>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <span class="">{{$comment->created_at->diffForHumans()}}</span>
                                                </div>

                                                <div class="col-md-12">

                                                </div>
                                                <div class="col-md-12 comment-text">
                                                    {{$comment->comment}}
                                                </div>
                                                <div class="col-md-12 text-right">
                                                     {{$comment->created_at->format('H:i')}}
                                                </div>
                                            </div>
                                            <!-- end of one comment -->
                                        @endforeach
                                    </div>
                                </div>
                            @else

                            @endif
                        </div>
                            <div class="col-md-2 edit-lecture">
                                    <a href="#modal" data="{{route('lection.update',$lection->id)}}">Редактирай </a>
                            </div>
                            <div class="col-md-1 edit-lecture">
                                    <select class="section-el-bold visibility" name="visibility">
                                        @foreach(Config::get('courseVisibility') as $visibility)
                                            @if(strtolower($visibility) == strtolower($lection->visibility))
                                                <option value="{{strtolower($visibility)}}" selected data-url="{{route('lection.visibility',['lection' => $lection->id])}}">{{ucfirst($visibility)}}</option>
                                            @else
                                                <option value="{{strtolower($visibility)}}" data-url="{{route('lection.visibility',['lection' => $lection->id])}}">{{ucfirst($visibility)}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                            </div>
                            <div class="col-md-1">
                                <form action="{{ route('lection.destroy',$lection->id) }}" method="POST"  id="delete-lection">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                                <button type="submit" class="btn btn-danger delete-lection-btn" value="DELETE" data="{{$lection->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            <!-- end of one lecture -->
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

                    @if(strlen($lection->description) > 250)
                        <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                    @else
                        <span class="lection-description">{{$lection->description}}</span>
                    @endif
                    <br>
                </div>
            </div>
            <!-- end of test -->
        @endif
    @endforeach
</div>

</div>
</div>
<div class="col-md-12 d-flex flex-row flex-wrap add-lecture text-center">
                    <div class="col-md-12">
                        <a href="#modal">
                            <img src="{{asset('/images/profile/add-icon.png')}}" alt="add-icon" class="img-fluid">Добави Лекция
                        </a>
                    </div>
                </div>

    <script src="{{asset('/js/create-level-sliders.js')}}"></script>
    <script src="{{asset('/js/level-add-students.js')}}"></script>
    <script src="{{asset('/js/level-options.js')}}"></script>
    <script src="{{asset('/js/delete-lection.js')}}"></script>
    <script src="{{asset('/js/lection-visibility-ajax.js')}}"></script>

    <script type="text/javascript">
        $(function(){
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/student_lectures.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_course_options.css')}}" />');
        });
    </script>


@endsection
