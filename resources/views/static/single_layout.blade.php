<!DOCTYPE html>
<html lang="bg">

@include('static.includes.bg.single_head')

<body>
    <script src="{{asset('/js/jquery.morelines.js')}}"></script>
    <div id="content">
        <!-- header section - nav - gallery -->
			<div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
				<div id="logo" class="col-md-1 col-sm-1">
					<div class="mb-2"><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_bg.png')}}" alt="Враца Софтуер Общество" class="img-responsive main-logo"></a></div>
				</div>
                @include('static.includes.bg.menu')

				<div class="row buttons-right col-md-2">
					<div id="candidate-btn" class="col-md-2">
						<span id="candidate"><a href="{{route('login')}}">ВХОД</a></span>
					</div>
				</div>
                <!-- hamburger -->
                @include('static.includes.bg.hamburger_menu')
                <!-- end of hamburger -->
			</div>

		<!-- end of header section -->
        @include('static.includes.bg.lang_btn')
        @yield('content')
    </div>

        <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>
</html>
