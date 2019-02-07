<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta name="description" content="Развиваме дигитална индустрия във Враца">
    <meta name="keywords" content="Враца Софтуер,Програмиране,Курсове,Програмисти,Обучения,Враца">
    <meta name="author" content="ВСО 2019">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png-white.png')}}" />

    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Безплатни курсове по програмиране" />
    <meta property="og:image" content="{{asset('//images/vso-logo-bg-original.png')}}" />
</head>

<body>
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <!-- JQuery UI-->
    <script type="text/javascript" src="{{asset('/js/jquery-ui.js')}}"></script>
    @yield('content')
<script>
    $(function() {
        $('.main-nav-list > li > a').on('click', function() {
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 500, 'linear');
        });

        $('#prepare > a').on('click', function() {
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 1000, 'linear');
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/static_courses.css')}}" as="style">');
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/personal_application_results.css')}}" as="style">');
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap.css')}}" as="style">');
        $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" as="style">');

        var sectionsnap = document.createElement("script");
        sectionsnap.src = "{{asset('/js/jquery-sectionsnap.js')}}";
        var hamburger = document.createElement("script");
        hamburger.src = "{{asset('/js/hamburger-menu.js')}}";
        var programTabs = document.createElement("script");
        programTabs.src = "{{asset('/js/program-tabs.js')}}";
        var countdownTimer = document.createElement("script");
        countdownTimer.src = "{{asset('/js/countdownTimer.js')}}";

        $('body').append(sectionsnap);
        $('body').append(hamburger);
        $('body').append(programTabs);
        $('body').append(countdownTimer);
    });
</script>
</body>

</html>
