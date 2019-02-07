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
		<div class="section" id="header-section">
		</div>
			<div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
				<div id="logo" class="col-md-1 col-sm-1">
					<h1><a href="{{route('home')}}"><img src="./images/vso-logo-bg-original.png" alt="vso-logo" class="img-responsive main-logo"></a></h1>
				</div>
				<div class="col-md-12 text-center d-flex flex-row flex-wrap top-text-wrap content-wrapper">
					<div class="col-md-12 header-about-text">
						Мисията на Враца Софтуер Общество
					</div>
				</div>
                <nav id="main-nav" class="col-md-8">
                    <ul class="list-inline main-nav-list">
                        <li class="nav-item dropdown-about">
                            <a href="{{route('home')}}">Начало</a>
                        </li>
                        <li class="nav-item dropdown-el">
                            <a href="#">Обучения</a>
                            <div class="dropdown-content">
                                <a href="{{route('programmingCourses')}}">Програмиране</a>
                                <a href="{{route('digitalMarketing')}}">Дигитален Маркетинг</a>
                            </div>
                        </li>
                    </ul>
                </nav>


				<div class="row buttons-right col-md-2">
					<div id="candidate-btn" class="col-md-2">
						<span id="candidate"><a href="{{route('login')}}">ВХОД</a></span>
					</div>
				</div>
                <!-- hamburger -->
                @include('static.hamburger_menu')
                <!-- end of hamburger -->
			</div>
		</div>
		<!-- end of header section -->
        <!-- team section -->
		<div class="section">
			<div id="team" class="col-md-12 d-flex flex-row flex-wrap text-center">
				<div class="col-md-12">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vestibulum accumsan lectus tincidunt consequat. Cras scelerisque nisl et dui vehicula consectetur. Maecenas vitae enim metus. Nunc ultrices pretium urna et viverra. Cras quis bibendum quam. Integer eros dolor, eleifend sit amet placerat ut, condimentum volutpat nulla. Maecenas sollicitudin ipsum arcu, ut condimentum erat congue vitae. Curabitur sollicitudin et ipsum non mattis. Praesent et eleifend eros. Cras vestibulum arcu et orci feugiat pharetra. Donec consequat lacus non ipsum consectetur, in maximus ex laoreet. Vestibulum sodales, nibh et ultrices tempor, dui libero sodales metus, id euismod enim nisi in orci. Sed odio odio, pellentesque quis odio ut, interdum faucibus massa. In laoreet metus vitae massa consequat, et commodo dui mollis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin nec cursus sem.
				</div>
			</div>
		</div>
		<!-- end of team section -->

		<script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>
</html>
