<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">

        <title>@yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- favicon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('/images/vso-png-white.png') }}" />

        <!-- facebook -->
        <meta property="og:url" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Враца Софтуер Общество" />
        <meta property="og:description" content="Развиваме дигитална индустрия във Враца" />
        <meta property="og:image" content="./images/vso-logo-bg-original.png" />
        <meta name="Description" content="Author: VSC 2018">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>

        @include('layouts.top-bar')
        @if(Auth::user() && Auth::user()->isAdmin())
            @include('admin.left-bar')
        @endif
        @if(Auth::user() && Auth::user()->isLecturer())
            @include('lecturer.left-bar')
        @endif
        @if(Auth::user() && !Auth::user()->isLecturer() && !Auth::user()->isAdmin())
            @include('user.left-bar')
        @endif
                @yield('content')
                <script>
                    $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
                        options.async = true;
                    });
                </script>
                <script src="{{asset('/js/fixed-left-top-menu.js')}}"></script>
                <script src="{{asset('/js/edit-showing-pencil.js')}}"></script>
                <script src="{{asset('/js/slide-alerts.js')}}"></script>
                <!-- //preview picture before saving -->
                <script src="{{asset('/js/profile-picture-preview.js')}}" charset="utf-8" async></script>
    </body>
    <script type="text/javascript">
        $(function() {
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/public_profile.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_profile.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_course_options.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_profile.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/create_course.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/create_level.css')}}" />');
                    $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_course_options.css')}}" />');
                    });
    </script>

</html>
