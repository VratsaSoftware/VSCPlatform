@extends('layouts.auth')

@section('title', 'Нова парола')

@section('content')
	<div class="row g-0">
		<div class="col-auto pe-3">
			<img class="logo-black" src="{{ asset('assets/img/logo.png') }}">
		</div>
	</div>

	<div class="login text-uppercase">
		Регистрация
	</div>

	<form method="POST" action="{{ route('register') }}" id="register-form">
		@csrf

		@if (Request::has('previous'))
			<input type="hidden" name="previous" value="{{ Request::get('previous') }}">
		@else
			<input type="hidden" name="previous" value="{{ URL::previous() }}">
		@endif

		<div class="mb-3 mt-lg-5">
			<input type="text" class="w-100 btn-edit" name="name" placeholder="Име" value="{{ old('name') }}" required autofocus>
		</div>

		<div class="mb-3">
			<input type="text" class="w-100 btn-edit" name="last_name" placeholder="Фамилия" value="{{ old('last_name') }}" required autofocus>
		</div>

		<div class="mb-3">
			<input type="email" class="w-100 btn-edit" id="register_email" name="email" placeholder="Електронна поща" value="{{ old('email') }}" required>
		</div>

		<div class="mb-3">
			<input type="password" class="w-100 btn-edit" id="register_password" name="password" placeholder="Парола" autocomplete="password" required>
		</div>

		<div class="mb-3">
			<input id="register_password_confirm" class="w-100 btn-edit" type="password" class="form-control" name="password_confirmation"  placeholder="Повтори парола" autocomplete="password"  required>
		</div>

		<div class="mb-3">
			<label for="location">Населено място</label>
			<select style="border-radius: 15px; background-color: #f6f9ff" id="location" class="w-100 btn-edit" name="location"></select>
		</div>

		<p class="sex-options">
			@if(!empty(old('sex')) && old('sex') != 'male')
				<div class="form-check form-check-inline">
					<label id="male-label" for="male">Мъж</label>
					<input class="form-radio-inputs" type="radio" name="sex" id="male" value="male">
				</div>
				<div class="form-check form-check-inline">
					<label id="female-label" for="female">Жена</label>
					<input class="form-radio-inputs" type="radio" name="sex" id="female" value="female" checked="checked">
				</div>
			@elseif(!empty(old('sex')) && old('sex') != 'female')
				<div class="form-check form-check-inline">
					<label id="male-label" for="male">Мъж</label>
					<input class="form-radio-inputs" type="radio" name="sex" id="male" value="male" checked="checked">
				</div>
				<div class="form-check form-check-inline">
					<label id="female-label" for="female">Жена</label>
					<input class="form-radio-inputs" type="radio" name="sex" id="female" value="female">
				</div>
			@endif

			@if(empty(old('sex')))
				<div class="form-check form-check-inline">
					<label id="male-label" for="male"><b>Мъж</b></label>
					<input class="form-radio-inputs" type="radio" name="sex" id="male" value="male">
				</div>
				<div class="form-check form-check-inline">
					<label id="female-label" for="female"><b>Жена</b></label>
					<input class="form-radio-inputs" type="radio" name="sex" id="female" value="female">
				</div>
			@endif
		</p>

		<input type="submit" id="register-btn-send" class="w-100 btn-green btn-edit d-none d-lg-block btn-margin" value="Регистрация">
		<div class="d-flex justify-content-center d-lg-none">
			<button class="btn-4 btn-program btn-green row g-0 align-items-center w-100 btn-margin">
				<div class="col text-start text-5"><b>Регистрация</b></div>
				<div class="col-auto">
					<img src="{{ asset('assets/img/action_icon.svg') }}">
				</div>
			</button>
		</div>
	</form>
@endsection
