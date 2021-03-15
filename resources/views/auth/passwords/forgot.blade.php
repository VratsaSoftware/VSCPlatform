<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
	@if ($errors->has('email'))
		<span class="invalid-feedback" role="alert" id="err2">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
	@endif
	@if ($errors->has('password'))
		<span class="invalid-feedback" role="alert" id="err3">
			<strong>{{ $errors->first('password') }}</strong>
		</span>
	@endif
	<div class="row g-0">
		<div class="col-lg-5">
			<div class="login-inputs mx-auto">
				<div class="row g-0">
					<div class="col-auto pe-3">
						<img class="logo-black" src="{{ asset('assets/img/logo.png') }}">
					</div>
				</div>

				<form method="POST" action="{{ route('password.email') }}" id="reset-password">
					@csrf

					<div class="login text-uppercase">
						Забравена парола
					</div>
					<div class="create d-none d-lg-block"></div>
					<div class="mb-4 input-user">
						<input id="email" type="email" class="w-100 btn-edit" placeholder="E-mail" aria-label="Username" aria-describedby="addon-wrapping" name="email" value="{{ old('email') }}" placeholder="e-mail" required>
					</div>

					<input type="submit" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin" value="Нова парола">
					<div class="d-flex justify-content-center d-lg-none">
						<button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
							<div class="col text-start text-5"><b>Нова парола</b></div>
							<div class="col-auto">
								<img src="{{ asset('assets/img/action_icon.svg') }}">
							</div>
						</button>
					</div>
				</form>
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

	<script>
	$(function(){
		var err = 0;
		setTimeout(function(){
			$('#err'+err).toggle("slide");
			err++;
		},4000);
		setTimeout(function(){
			$('#err'+err).toggle("slide");
			err++;
		},5000);
		setTimeout(function(){
			$('#err'+err).toggle("slide");
			err++;
		},6000);
		setTimeout(function(){
			$('#err'+err).toggle("slide");
			err++;
		},7000);
		setTimeout(function(){
			$('#err'+err).toggle("slide");
			err++;
		},8000);
	});
	</script>

	<!-- Bootstrap core JS Files -->
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
	<script type= "text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
