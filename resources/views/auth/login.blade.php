@extends('layouts.auth')

@section('title', 'Нова парола')

@section('content')
	<div class="row g-0">
			<div class="col-auto pe-3">
				<img class="logo-black" src="{{ asset('assets/img/logo.png') }}">
			</div>
			@if(!Auth::check())
				<div class="create-account col-auto ps-5 pt-2 d-lg-none">
					<a href="{{ route('user/register') }}"><b>Създай профил</b></a>
				</div>
			@endif
	</div>

	@if(Auth::check())
		<div class="login text-uppercase d-none d-lg-block"></div>
	@endif

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
					<input name="remember_me" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label text-navy-blue" for="flexCheckDefault">
						<b>Keep me logged in</b>
					</label>
				</label>
			</div>
		</div>
	@else
		<div class="mb-4 input-user">
			<a href="{{ asset('myProfile') }}"><button type="button" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin">Продължи към моя Профил</button></a>
			<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin">Изход</button></a>

			<div class="d-flex justify-content-center d-lg-none">
				<form action="{{ asset('myProfile') }}">
					<button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
						<div class="col text-start text-5"><b>Към моя Профил</b></div>
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
		</div>
	@endif
@endsection
