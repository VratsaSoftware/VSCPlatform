<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <title>Враца Софтуер Общество</title>
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
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png-white.png')}}" />
    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Развиваме дигитална индустрия във Враца" />
    <meta property="og:image" content="{{asset('/images/vso-logo-bg-original.png')}}" />
</head>

<body>
    <script src="./js/jquery.morelines.js"></script>
    <div id="content">
        <!-- header section - nav - gallery -->
			<div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
				<div id="logo" class="col-md-1 col-sm-1">
					<h1><a href="{{route('home')}}"><img src="./images/vso-logo-bg-original.png" alt="vso-logo" class="img-responsive main-logo"></a></h1>
				</div>
                @include('static.menu')

				<div class="row buttons-right col-md-2">
					<div id="candidate-btn" class="col-md-2">
						<span id="candidate"><a href="{{route('login')}}">ВХОД</a></span>
					</div>
				</div>
                <!-- hamburger -->
                @include('static.hamburger_menu')
                <!-- end of hamburger -->
			</div>

		<!-- end of header section -->
        @yield('content')
    </div>
        <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>
</html>
