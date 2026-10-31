<!DOCTYPE html>
<html lang="bg">

@include('static.includes.en.single_head')

<body>
    <script src="{{asset('/js/jquery.morelines.js')}}"></script>
    <div id="content">
        <!-- header section - nav - gallery -->
			<div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
				<div id="logo" class="col-md-1 col-sm-1">
					<div class="mb-2"><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_en.png')}}" alt="Vratsa Software" class="img-responsive main-logo"></a></div>
				</div>
                @include('static.includes.en.menu')

				<div class="row buttons-right col-md-2">
					<div id="candidate-btn" class="col-md-2">
						<span id="candidate"><a href="{{route('login')}}">Login</a></span>
					</div>
				</div>
                <!-- hamburger -->
                @include('static.includes.en.hamburger_menu')
                <!-- end of hamburger -->
			</div>
            @include('static.includes.en.lang_btn')
		<!-- end of header section -->
        @yield('content')
    </div>
        <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>
</html>
