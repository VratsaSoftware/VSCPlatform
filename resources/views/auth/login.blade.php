<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login</title>
	<!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png.png')}}" />

	<!-- Fonts and Icons -->
	<link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row g-0">
        <div class="col-lg-5">
            <div class="login-inputs mx-auto">
                <div class="row g-0">
                    <div class="col-auto pe-3">
                    <img class="logo-black" src="{{ asset('assets/img/logo.png') }}">
                    </div>
                    <div class="create-account col-auto ps-5 pt-2 d-lg-none">
                        <a href="{{ route('user/register') }}"><b>Създай профил</b></a>
                    </div>
                </div>
				@if(!Auth::check())
				<form method="POST" action="{{ route('login') }}" id="login-form">
					@csrf

					@if (Request::has('previous'))
						<input type="hidden" name="previous" value="{{ Request::get('previous') }}">
					@else
						<input type="hidden" name="previous" value="{{ URL::previous() }}">
					@endif

	                <div class="login text-uppercase">
	                    login
	                </div>
	                <div class="create d-none d-lg-block">
	                    Need an account? <span class="text-color"><a href="{{ route('user/register') }}"><b>Create now</b></a></span>
	                </div>
	                <div class="mb-4 input-user">
	                    <input type="email" name="email" class="w-100 btn-edit" placeholder="E-mail" aria-label="Username" aria-describedby="addon-wrapping">
	                </div>
	                <div class="mb-3">
	                    <input type="password" name="password" class="w-100 btn-edit" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
	                </div>
	                <div class="text-password">
	                    <a href="{{ route('auth.password.reset') }}"><b>Забраена парола?</b></a>
	                </div>
	                <input type="submit" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin" value="Login">
	                <div class="d-flex justify-content-center d-lg-none">
	                    <button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
	                        <div class="col text-start text-5"><b>Влез</b></div>
	                        <div class="col-auto">
	                            <img src="{{ asset('assets/img/action_icon.svg') }}">
	                        </div>
	                    </button>
	                </div>
				</form>
                <div class="form-check mt-4 d-none d-lg-block">
					<div class="block mt-4">
		                <label for="remember_me" class="flex items-center">
							<input  name="remember_me" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
		                    <label class="form-check-label text-navy-blue" for="flexCheckDefault">
		                        <b>Keep me logged in</b>
		                    </label>
		                </label>
		            </div>
                </div>
				@else
					<a href="{{ asset('myProfile') }}"><button type="button" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin">Влез</button></a>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin">Изход</button></a>

					<div class="d-flex justify-content-center d-lg-none">
						<form action="{{ asset('myProfile') }}">
			                <button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
				                <div class="col text-start text-5"><b>Влез</b></div>
			                </button>
						</form>

						<a href="{{ route('logout') }}" class="d-flex fw-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span class="slide-item text-navy-blue">
								<button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
					                <div class="col text-start text-5"><b>
										Изход
									</b></div>
								</button>
							</span>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
	                </div>
				@endif
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div class="background-programming rounded-end border-end">
                <div class="d-flex justify-content-around figures-margin">
                    <img src="{{ asset('assets/img/coding-elements-2.svg') }}" class="figures-2">
                    <img src="{{ asset('assets/img/coding-elements-1.svg') }}">
                </div>
                <div class="d-flex justify-content-center pb-5 mb-2">
                    <img src="{{ asset('assets/img/Programirane.svg') }}" class="programirane">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="new d-flex justify-content-center">
                       <div class="d-inline text-normal text-white pt-3 align-self-center">
                           Ново
                       </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pb-5 mb-2 text-uppercase basics-programming pt-1">
                    Основи на
                    <br>
                    програмирането
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn-4 btn-program btn-navy-blue row g-0 align-items-center mt-1">
                        <div class="col text-start text-5"><b>Виж повече</b></div>
                        <div class="col-auto">
                            <img src="{{ asset('assets/img/action_icon.svg') }}">
                        </div>
                    </button>
                </div>
                <div class="d-flex justify-content-around ">
                    <img src="{{ asset('assets/img/coding-elements-3.svg') }}">
                    <img src="{{ asset('assets/img/coding-elements-4.svg') }}">
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-lg-none">
            <div class="background-programming-2 rounded-bottom border-end">
                <div class="d-flex justify-content-around figures-margin">
                    <img src="{{ asset('assets/img/coding-elements-2.svg') }}" class="figures-2">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/img/Programirane.svg') }}" class="programirane">
                    </div>
                    <img src="{{ asset('assets/img/coding-elements-1.svg') }}" class="figures-2">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="new d-flex justify-content-center">
                       <div class="d-inline text-normal text-white pt-3 align-self-center">
                           Ново
                       </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pb-4 text-uppercase basics-programming pt-1">
                    Основи на
                    <br>
                    програмирането
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button class="btn-4 btn-program btn-navy-blue row g-0 align-items-center mt-1">
                        <div class="col text-start text-5"><b>Виж повече</b></div>
                        <div class="col-auto">
                            <img src="{{ asset('assets/img/action_icon.svg') }}">
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
	<!-- Bootstrap core JS Files -->
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
	<script type= "text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
