<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png.png')}}" />

    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Развиваме дигитална индустрия във Враца" />
    <meta property="og:image" content="{{asset('/images/vso-logo-bg-original.png')}}" />
    <meta name="Description" content="Author: VSC 2018">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and Icons -->
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row g-0 p-lg-0 px-4 py-4 mt-lg-0 mt-2">
        <div class="col-xl-auto pe-xl-0 pe-lg-5">
            <div class="row g-0">
                <!-- nav menu -->
                <!-- JQuery -->
                <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>

                @include('layouts.top-bar')
                @if(Auth::user() && Auth::user()->isAdmin())
                @include('admin.left-bar')
                @endif
                @if(Auth::user() && Auth::user()->isLecturer() && !Auth::user()->isAdmin())
                @include('lecturer.left-bar')
                @endif
                @if(Auth::user() && !Auth::user()->isLecturer() && !Auth::user()->isAdmin())
                @include('user.left-bar')
                @endif
                <!-- left side -->
                <div class="col-xl-auto col ps-xxl-0 ps-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-0 pb-lg-4 mb-lg-3">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
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
                <!-- nav menu END -->  
                
            </div>
        </div>      
        
    </div>
    <!-- Bootstrap core JS Files -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
    <script type= "text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>

<script type="text/javascript">
    $(function() {
        $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/public_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_application_results.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/create_course.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/create_level.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_course_options.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_courses.css')}}" />');
    });
</script>
<script>
    $('.download-stats').on('click', function(){
        var table = 'forms';
        var uri = 'data:application/vnd.ms-excel;base64,'

        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'

        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }

        , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }



        var table = document.getElementById(table)
        var name = 'test';

        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

        window.location.href = uri + base64(format(template, ctx))

    });
</script>

</html>