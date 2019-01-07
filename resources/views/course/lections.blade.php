@extends('layouts.template')
@section('title', 'Лекции')
@section('content')
<div class="content-wrap">
    <div class="section">
        <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
            <div class="col-md-12 text-center">
                {{$module->name}}
            </div>
        <div class="col-md-12 lvl-program-holder d-flex flex-row flex-wrap">
            <div class="col-md-12 lvl-title text-center">Учебна Програма <i class="fas fa-book-open"></i>&nbsp;{{count($lections)}}</div>
            <!-- modal for editing elements -->
            <div id="modal" style="position:fixed">
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
                        <a href="#" class="btn close-modal">Затвори</a>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <!-- end of modal -->
            @foreach ($lections as $key => $lection)
            <!-- one lecture -->
            <div class="col-md-12 lectures-wrapper d-flex flex-row flex-wrap">
                <div class="col-md-1 lecture-img text-center">
                    <img src="{{asset('/images/student-hat.png')}}" alt="lecturer-icon" class="img-fluid"><br>
                    <span>{{$key + 1}}</span>
                </div>
                <div class="col-md-11 lecture-txt">
                    <span class="lection-title">{{$lection->title}}</span>
                    <span>{{$lection->first_date->format('d-m-Y')}} / {{$lection->second_date->format('d-m-Y')}}</span><br>
                    @if(strlen($lection->description) > 250)
                    <span class="lection-description">{{mb_substr($lection->description,0,250)}}...<a href="#modal" data="{{$lection->description}}" class="read-more">още</a></span>
                @else
                    <span class="lection-description">{{$lection->description}}</span>
                @endif
                    <br>
                    <div class="col-md-12 lecture-options text-center d-flex flex-row flex-wrap">
                        <div class="col-md-3 video-lecture">
                             @if($lection->Video()->exists())
                                 <a href="#modal">видео</a>
                             @else
                                <a href="#" style="cursor:not-allowed">видео</a>
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
                        <div class="col-md-3 presentation-lecture">
                            <a href="{{asset('/slides-'.$lection->id.'/'.$lection->presentation)}}" target="__blank">слайдове </a>
                        </div>
                        <div class="col-md-3 homework-lecture">
                            <a href="{{asset('/homework-'.$lection->id.'/'.$lection->homework_criteria)}}" target="__blank">за домашно </a>
                        </div>
                        <div class="col-md-3 edit-lecture comment">
                            <a href="#modal">коментар</a>
                            <div class="col-md-12 comment-holder">
                                <div class="col-md-12 d-flex flex-row flex-wrap text-center">
                                    <div class="col-md-12 video-title">{{$lection->title}}</div>
                                    <div class="col-md-12 text-center">
                                        <form action="">
                                            <textarea name="comment" id="comment" cols="30" rows="10" placeholder="остави коментар"></textarea><br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of one lecture -->
            @endforeach
        </div>

    </div>
</div>
<script>
        $(function(){
            $('#modal').css('display','none');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/create_level.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/student_lectures.css')}}" />');
            $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_course_options.css')}}" />');

            $('.video-lecture > a').on('click', function() {
                $('.copy > p').html('<iframe width="auto" height="auto" src=""></iframe>');
                $('.copy > p').find('iframe').attr('src', $(this).next('.video-holder').find('.video-url').html());
                $('.modal-header').find('h2').html($(this).next('.video-holder').find('.video-title').html());
                $('#modal').show();
            });

            $('.comment > a').on('click', function() {
                $('.copy > p').html($(this).next('.comment-holder').html());
                $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" value="Изпрати">');
                $('#modal').show();
            });

            $('.read-more').on('click',function(){
                $('.modal-header').find('h2').html($('.lection-title').html());
                $('.copy > p').html($(this).attr('data'));
                $('#modal').show();
            });

            //empty modal on close button click
            $('.close-modal').on('click', function() {
                $('#modal').hide();
                $('.copy > p').html(' ');
                $('.modal-content > .cf > div').html(' ');
            });
        });
    </script>
@endsection
