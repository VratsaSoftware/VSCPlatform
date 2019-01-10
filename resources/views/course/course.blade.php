@extends('layouts.template')
@section('title', $course->name.' - Модули')
@section('content')
<div class="content-wrap">
    <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
        @foreach ($modules as $module)
        <div class="col-md-6 right-option">
            @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                <div class="event-title col-md-12 title-signed">
                    @else
                    <div class="event-title col-md-12 levels-title">
                        @endif
                        {{$module->name}}
                    </div>
                    <div class="event-body col-md-12 text-center">
                        @if(!Auth::user() && $module->visibility !== Config::get('courseVisibility.public'))
                            <div class="event-body-text levels-btn">
                                <a href="{{route('home')}}">
                                    <div class="event-body-text levels-btn">
                                        Вход
                                    </div>
                                </a>
                            </div>
                        @else
                            @if($module->Lections()->exists())
                                @if(Auth::user())
                                    <a href="{{route('user.module.lections',['user' => Auth::user()->id,'course' => $course->id,'module' => $module->id])}}">
                                @else
                                    <a href="{{route('user.module.lections',['user' => 0,'course' => $course->id,'module' => $module->id])}}">
                                @endif
                                @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                                    <div class="event-body-text button-signed">
                                @else
                                    <div class="event-body-text levels-btn">
                                @endif
                                    Прегледай
                                    </div>
                                </a>
                            @endif
                        @endif
                        @if(!is_null($module->picture))
                            <img src="{{asset('/images/course-'.str_replace(' ', '', strtolower($course->name)).'/modules/'.str_replace(' ', '', strtolower($module->name)).'/'.$module->picture)}}" alt="">
                        @else
                            <img src="{{asset('/images/course-'.str_replace(' ', '', strtolower($course->name)).'/'.$course->picture)}}" alt="">
                        @endif
                    </div>
                    @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                        <div class="event-footer col-md-12 d-flex flex-row flex-wrap footer-signed">
                            @else
                            <div class="event-footer col-md-12 d-flex flex-row flex-wrap levels-footer">
                                @endif
                                <div class="col-md-6">Ниво:{{$module->order}}<br> </div>
                                <div class="col-md-6">{{$module->starts->format('d-m-Y')}} / {{$module->ends->format('d-m-Y')}}<br> </div>
                            </div>
                        </div>
                        @endforeach
                </div>
        </div>
        @endsection
