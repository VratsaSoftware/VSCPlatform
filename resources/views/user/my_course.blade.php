@extends('layouts.template')
@section('title', 'Модули')
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
                        <a href="{{route('user.module.lections',['user' => Auth::user()->id,'course' => $course->id,'module' => $module->id])}}">
                            @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                                @if($module->Lections()->exists())
                                    <div class="event-body-text button-signed">
                                        @else
                                        <div class="event-body-text levels-btn">
                                            @endif
                                            Прегледай
                                        </div>
                                        @endif
                        </a>
                        <img src="{{asset('/images/course/'.$course->picture)}}" alt="">
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
