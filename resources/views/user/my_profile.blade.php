@extends('layouts.template')
@section('title', 'Моят Профил')
@section('content')
<div class="content-wrap">
<div class="section">
	<form action="{{ route('user.update',Auth::user()->id) }}" method="post" id="update_user" 
		enctype="multipart/form-data" files="true">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			 @if (!empty(Session::get('success')))
			  <p>
			    <div class="alert alert-success">
			      <p>{{ session('success') }}</p>
			    </div>
			  </p>

			  @endif
			@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ($message = Session::get('error'))
		     <p>
		        <div class="alert alert-danger">
		            <button type="button" class="close" data-dismiss="alert">
		                <i class="ace-icon fa fa-times"></i>
		            </button>
		            <p>{{ $message }}</p>
		        </div>
		    </p>
    	   @endif
		<div class="header d-flex flex-row flex-wrap col-md-12 text-center">
			<div class="col-md-12 text-center loader-wrapper">
				<img src="./images/loaders/load-16.gif" alt="loading" class="loading-edit">
			</div>
			<div class="col-md-12 header-name d-flex flex-row flex-wrap">
				<div class="col-md-3 name-wrap">
					<span class="name">{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->last_name)}}</span> 
					<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
							<i class="fas fa-pencil-alt"></i>
						</button></div>
				<div class="col-md-6 header-pic">
					<div class="col-md-12">
						<img src="{{asset('images/user-pics/'.Auth::user()->picture)}}" alt="profile-pic" class="profile-pic">
						<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
							<i class="fas fa-pencil-alt"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="information-wrap col-md-12 d-flex flex-row flex-wrap">
				<div class="col-md-2 location-wrap text-left">
					<img src="./images/profile/location-icon.png" alt="map-icon">
					<span class="location">{{ucfirst(Auth::user()->location)}}</span>
					<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
							<i class="fas fa-pencil-alt"></i>
						</button>
				</div>
				<div class="col-md-2 birthday-wrap text-left">
					<img src="./images/profile/birthday-cake-icon.png" alt="birthday-icon">
					<span class="birthday">{{ucfirst(Auth::user()->dob)}}</span>
					<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
							<i class="fas fa-pencil-alt"></i>
						</button>
				</div>

				<div class="col-md-4 mail">
					<img src="./images/mail-icon.png" alt="mail-icon" class="img-fluid">
					<span class="mail-txt">{{ucfirst(Auth::user()->email)}}</span>
					<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
							<i class="fas fa-pencil-alt"></i>
						</button>
				</div>

				<div class="col-md-4 header-contacts text-right">
					<div class="col-md-12">
						
						@foreach($social_links as $social)
							@if($social->SocialName->name == 'facebook')
								<a href="{{$social->link}}" class="facebook"><img src="./images/profile/facebook-icon.svg" alt="fb"></a>
								<p class="edit-social"><input type="text" id="facebook" name="facebook" value="{{$social->link}}"></p>
							@endif
							@if($social->SocialName->name == 'linkedin')
								<a href="{{$social->link}}" class="linkedin"><img src="./images/profile/linkdin-icon.svg" alt="li"></a>
							<p class="edit-social"><input type="text" id="linkedin" name="linkedin" value="{{$social->link}}"></p>
							@endif
							@if($social->SocialName->name == 'github')
								<a href="{{$social->link}}" class="github"><img src="./images/profile/github-icon.svg" alt="gh"></a>
								<p class="edit-social"><input type="text" id="github" name="github" value="{{$social->link}}"></p>
							@endif
							@if($social->SocialName->name == 'skype')
								<a href="{{$social->link}}" class="skype"><img src="./images/profile/skype-icon.svg" alt="sk"></a>
								<p class="edit-social"><input type="text" id="skype" name="skype" value="{{$social->link}}"></p>
							@endif
							@if($social->SocialName->name == 'dribbble')
								<a href="{{$social->link}}" class="dribbble"><img src="./images/profile/dribble-icon.svg" alt="dr"></a>
								<p class="edit-social"><input type="text" id="dribbble" name="dribbble" value="{{$social->link}}"></p>
							@endif
							@if($social->SocialName->name == 'behance')
								<a href="{{$social->link}}" class="behance"><img src="./images/profile/behance-icon.svg" alt="be"></a>
								<p class="edit-social"><input type="text" id="behance" name="behance" value="{{$social->link}}"></p>
							@endif
						@endforeach
					</div>
					<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success social-edit">
							<i class="fas fa-pencil-alt"></i>
						</button>
						<a href="#modal" class="btn btn-success add-social">
							<i class="fas fa-plus"></i>
						</a>
				</div>
			</div>
		</div>
	</div>

	<!-- modal for adding social -->
    <div id="modal">
                <div class="modal-content print-body">
                  <div class="modal-header">
                    <h2></h2>
                  </div>
                  <div class="copy text-center">
                    
                    <p>
                      <select name="add-social" id="add-social">
                      </select>
                    </p>

                    </form>
                  </div>
                  <div class="cf footer">
                    <div><i class="fas fa-print fa-2x"></i></div>
                    <a href="#" class="btn close-modal">Затвори</a>
                  </div>
            </div>
            <div class="overlay"></div>
          </div>
  <!-- end of modal -->

	<div class="section">
		<div class="courses col-md-12 d-flex flex-row flex-wrap justify-content-between">

			<div class="col-md-6 left-card d-flex flex-row flex-wrap text-center">
				<div class="col-md-12 left-card-wrap">
					<div class="col-md-12 left-title">
						<span>Програмиране</span>
						<span class="title-icons">
							<img src="./images/profile/tick-icon.png" alt="tick" class="img-fluid">
						</span>
						<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
						<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
					</div>

					<div class="col-md-12 left-subtitle">
						<span>Сертификат за успешно завършено обучение по</span>
					</div>

					<div class="col-md-12 left-bold">
						<span>ПРОГРАМИРАНЕ</span><br/>
						<span>Уеб Разработка с PHP</span>
					</div>

					<div class="col-md-12 left-stats">
						<span>Юни 2019</span>

						<span>Лектор: Емилиян Кадийски</span>
					</div>
				</div>
			</div>

			<div class="col-md-6 right-card d-flex flex-row flex-wrap text-center">
				<div class="col-md-12 right-card-wrap">
					<div class="col-md-12 right-title">
						<span>Програмиране</span>
						<span class="title-icons">
							<img src="./images/profile/tick-icon.png" alt="tick" class="img-fluid">
						</span>
						<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
						<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
					</div>

					<div class="col-md-12 right-subtitle">
						<span>Сертификат за успешно завършено обучение по</span>
					</div>

					<div class="col-md-12 right-bold">
						<span>ПРОГРАМИРАНЕ</span><br/>
						<span>Уеб Разработка с PHP</span>
					</div>

					<div class="col-md-12 right-stats">
						<span>Юни 2019</span>

						<span>Лектор: Емилиян Кадийски</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
	<div class="stats col-md-12 d-flex flex-row flex-wrap justify-content-between">
		<div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
			<div class="col-md-12 stats-box">
				<div class="col-md-12 stats-title">
					<span>Образование</span>
					<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
					<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href="" class="education-edit"><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 stats-img">
					<img src="./images/profile/education-icon.png" alt="education" class="img-fluid">
				</div>

				<div class="col-md-12 stats-text">
					<span class="edu">
						<span class="edu-from-old">2010/10/10</span> - <span class="edu-to">2010/11/11</span> <br>
						<span class="edu-type">Висше</span> <br> 
						<span class="edu-place">Философия СУ Климент Охридски</span>
					</span><br/>
					<span class="edu">
						<span class="edu-from-old">2010/10/10</span> - <span class="edu-to">2010/10/10</span> <br>
						<span class="edu-type">Основно</span> <br> 
						<span class="edu-place">Философия СУ Климент Охридски</span>
					</span><br/>
				</div>
			</div>
		</div>

		<div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
			<div class="col-md-12 stats-box">
				<div class="col-md-12 stats-title">
					<span>Работен Опит</span>
					<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
					<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 stats-img">
					<img src="./images/profile/exp-icon.png" alt="education" class="img-fluid">
				</div>

				<div class="col-md-12 stats-text">
					<span>2013-2016 <br>Косер Враца Студио за дизайн и предпечат</span><br/>
					<span>2016-днес <br>Програмиста Изработка на уеб сайтове</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
			<div class="col-md-12 stats-box">
				<div class="col-md-12 stats-title">
					<span>Интереси</span>
					<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
					<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 stats-img">
					<img src="./images/profile/interes-icon.png" alt="education" class="img-fluid">
				</div>

				<div class="col-md-12 stats-text">
					<span>JavaScript<br> CSS</span><br/>
					<span>Football <br> Плуване</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
			<div class="col-md-12 stats-box">
				<div class="col-md-12 stats-title">
					<span>Събития</span>
					<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
					<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 stats-img">
					<img src="./images/profile/events-icon.png" alt="education" class="img-fluid">
				</div>

				<div class="col-md-12 stats-text">
					<span>2006-2010 <br> Философия СУ Климент Охридски</span><br/>
					<span>2010-2013 <br> Програмиране Различни онлайн курсове</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
			<div class="col-md-12 stats-box">
				<div class="col-md-12 stats-title">
					<span>Менторска Програма</span>
					<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
					<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 stats-img">
					<img src="./images/profile/mentor-program-icon.png" alt="education" class="img-fluid">
				</div>

				<div class="col-md-12 stats-text">
					<span>2006-2010 <br> Философия СУ Климент Охридски</span><br/>
					<span>2010-2013 <br> Програмиране Различни онлайн курсове</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
			<div class="col-md-12 stats-box">
				<div class="col-md-12 stats-title">
					<span>Бележник</span>
					<span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
					<div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
						<div class="col-md-5"></div>
						<div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
							<div class="col-md-8">
								<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
									<span class="public-switch">Публично видимо</span> 
							</div>
							<div class="col-md-4">
								<label class="switch">
								  <input type="checkbox">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-md-8">
								<span class="public-switch">Редакция</span> 
							</div>
							<div class="col-md-4 pencil">
								<a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 stats-img">
					<img src="./images/profile/grades-icon.png" alt="education" class="img-fluid">
				</div>

				<div class="col-md-12 stats-text">
					<span>Модул 1<br> Отличие: 100%</span><br/>
					<span>Модул 2 <br> Мн. Добър : 80%</span>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<script>
	$(function(){
		setTimeout(function(){
			$('.alert').toggle("slide");
		},4000);
	});
</script>
@endsection