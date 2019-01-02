<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.min.css') }}">

        <link rel="stylesheet" href="" id="public_profile_css">

        <link rel="stylesheet" href="{{ asset('/css/personal_profile.css') }}">

        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>

        <!-- scroll -->
        <script type="text/javascript" src="{{ asset('/js/jquery-sectionsnap.js') }}" async></script>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('/images/vso-png-white.png') }}" />

        <!-- font-aweseome -->


        <!-- facebook -->
        <meta property="og:url" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Враца Софтуер Общество" />
        <meta property="og:description" content="Развиваме дигитална индустрия във Враца" />
        <meta property="og:image" content="./images/vso-logo-bg-original.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        @include('layouts.top-bar')

        @if(Auth::user()->isAdmin())
            @include('admin.left-bar')
            @elseif(Auth::user()->isLecturer())
                @include('lecturer.left-bar')
                @else
                @include('user.left-bar')
                @endif

                @yield('content')
                <script src="{{ asset('/js/fixed-left-top-menu.js') }}"></script>
                <script src="{{ asset('/js/edit-showing-pencil.js') }}"></script>
    </body>
    <script type="text/javascript">
        $(function() {
            $('#public_profile_css').attr('href', './css/public_profile.css');
        });
    </script>

</html>