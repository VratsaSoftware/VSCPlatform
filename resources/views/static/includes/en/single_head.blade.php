<head>
    <meta charset="UTF-8">
    <meta name="description" content="@yield('description', 'Free 9 months programming courses in Vratsa')">
    <meta name="keywords" content="Vraca Software,Programming,Courses,Programmers,Education,Vratsa,Vraca">
    <meta name="author" content="Vratsa Software">
    <title>{{ View::hasSection('title') ? View::yieldContent('title') . ' | Vratsa Software' : 'Vratsa Software' }}</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="stylesheet" href="{{asset('/css/landing.css')}}">
    <link rel="stylesheet" href="{{asset('/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('/css/single-page.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.js')}}"></script>
    <!-- scroll -->
    <script type="text/javascript" src="{{asset('/js/jquery-sectionsnap.js')}}"></script>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png.png')}}" />
    <!-- facebook -->
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ View::hasSection('title') ? View::yieldContent('title') . ' | Vratsa Software' : 'Vratsa Software' }}" />
    <meta property="og:description" content="@yield('description', 'Free 9 months programming courses in Vratsa')" />
    <meta property="og:image" content="{{asset('/images/vso-logo-bg-original.png')}}" />
</head>