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
						@if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
							<img src="{{asset('images/women-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
						@elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
							<img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
						@else
							<img src="{{asset('images/user-pics/'.Auth::user()->picture)}}" alt="profile-pic" class="profile-pic">
						@endif
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
					<span class="mail-txt">{{Auth::user()->email}}</span>
					<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
							<i class="fas fa-pencil-alt"></i>
						</button>
				</div>
				<script type="text/javascript">
					function loadSocialSrc(name,link){
						$('.'+name).attr('href',link);
						$('#'+name).val(link);
					}
				</script>
				<div class="col-md-4 header-contacts text-right">
					<div class="col-md-12">
						<a href="#" class="facebook"><img src="./images/profile/facebook-icon.svg" alt="fb"></a>
						<p class="edit-social"><input type="text" id="facebook" name="facebook" value=""></p>
						<a href="#" class="linkedin"><img src="./images/profile/linkdin-icon.svg" alt="li"></a>
						<p class="edit-social"><input type="text" id="linkedin" name="linkedin" value=""></p>
						<a href="#" class="github"><img src="./images/profile/github-icon.svg" alt="gh"></a>
						<p class="edit-social"><input type="text" id="github" name="github" value=""></p>
						<a href="#" class="skype"><img src="./images/profile/skype-icon.svg" alt="sk"></a>
						<p class="edit-social"><input type="text" id="skype" name="skype" value=""></p>
						<a href="#" class="dribbble"><img src="./images/profile/dribble-icon.svg" alt="dr"></a>
						<p class="edit-social"><input type="text" id="dribbble" name="dribbble" value=""></p>
						<a href="#" class="behance"><img src="./images/profile/behance-icon.svg" alt="be"></a>
						<p class="edit-social"><input type="text" id="behance" name="behance" value=""></p>
						@foreach($social_links as $social)
							@if($social->SocialName->name == 'facebook')
								<script type="text/javascript">
									loadSocialSrc('facebook','{!! $social->link !!}');
								</script>
							@elseif($social->SocialName->name == 'linkedin')
								<script type="text/javascript">
									loadSocialSrc('linkedin','{!! $social->link !!}');
								</script>
							@elseif($social->SocialName->name == 'github')
								<script type="text/javascript">
									loadSocialSrc('github','{!! $social->link !!}');
								</script>
							@elseif($social->SocialName->name == 'skype')
								<script type="text/javascript">
									loadSocialSrc('skype','{!! $social->link !!}');
								</script>
							@elseif($social->SocialName->name == 'dribbble')
								<script type="text/javascript">
									loadSocialSrc('dribbble','{!! $social->link !!}');
								</script>
							@elseif($social->SocialName->name == 'behance')
								<script type="text/javascript">
									loadSocialSrc('behance','{!! $social->link !!}');
								</script>
							@endif
						@endforeach

					</div>
					<button type="submit" name="submit" value="submit" class="edit-btn btn btn-success social-edit">
							<i class="fas fa-pencil-alt"></i>
						</button>
				</div>
			</div>
		</div>
		</form>
	</div>
		
		<!-- certifications boxes -->
     	<div class="section">
		<div class="courses col-md-12 d-flex flex-row flex-wrap justify-content-between">
			@forelse($certificates as $certificate)
			<div class="col-md-6 left-card d-flex flex-row flex-wrap text-center">
				<div class="col-md-12 left-card-wrap">
					<div class="col-md-12 left-title">
						@if(!is_null($certificate['Courses']))
							<span>{{ mb_strtoupper($certificate['Courses']->name) }}</span>
						@else
							<span>{{ mb_strtoupper($certificate->course_name) }}</span>
						@endif
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
						<br/>
						@if(!is_null($certificate['Courses']))
							<span>{{ mb_strtoupper($certificate['Courses']->name) }}</span>
						@else
							<span>{{ mb_strtoupper($certificate->course_name) }}</span>
						@endif
					</div>

					<div class="col-md-12 left-stats d-flex flex-row flex-wrap">
						<div class="col-md-4 text-left">
						@if(!is_null($certificate['Courses']))
							<span>{{ mb_strtoupper($certificate['Courses']->starts->format('Y-m-d')) }}</span>
							<br/>
							<span>{{ mb_strtoupper($certificate['Courses']->ends->format('Y-m-d')) }}</span>
						@else
							<span>{{ mb_strtoupper($certificate->started->format('Y-m-d')) }} - {{ mb_strtoupper($certificate->finished->format('Y-m-d')) }}</span>
						@endif
						</div>
						
						<div class="col-md-8 text-center d-flex flex-row flex-wrap">
						@forelse ($certificate['Courses']['Lecturers'] as $lecturer)
						    <span class="col-md-8 text-right">Лектор:</span>
						    <span class="col-md-4 text-right" style="padding:0"> {{$lecturer['User']->name}} {{$lecturer['User']->last_name}}</span>
						    <br/>
						@empty
						    <span></span>
						@endforelse
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="col-md-6 right-card d-flex flex-row flex-wrap text-center">
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
			</div> -->
			@empty
    
   			@endforelse
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
					<form action="{{route('update.education')}}" id="edu-form" name="edu-form" method="POST">
						
					{{ csrf_field() }}
					@forelse ($education as $edu)
					    <span class="edu">
							<span class="live-edu">{{$edu->y_from->format('Y-m-d')}}</span> - <span class="live-edu">{{$edu->y_to->format('Y-m-d')}}</span> <br>
								<input type="date" id="y_from" name="y_from" class="edu-type edit-edu" value="{{$edu->y_from->format('Y-m-d') ?? null}}"><br/>
								<input type="date" id="y_to" name="y_to" class="edu-type edit-edu" value="{{$edu->y_to->format('Y-m-d') ?? null}}"><br/>

							<span class="edu-type live-edu">{{$edu['EduType']->type}}</span> <br>
								<select id="edu-type" name="edu-type" class="edu-type edit-edu">
									@forelse ($eduTypes as $type)
										@if($edu->cl_education_type_id === $type->id)
											<option value="{{$type->id}}" selected>{{$type->type}}</option>
										@else
											<option value="{{$type->id}}">{{$type->type}}</option>
										@endif
									@empty
										<option value="0" disabled selected>няма опции</option>
									@endforelse
								</select>

							<span class="edu-type live-edu">{{$edu['EduInstitution']->type}} {{$edu['EduInstitution']->name}}</span><br>
								<select name="edu-institution-type" id="edu-institution-type" class="edu-type edit-edu">
									@foreach(Config::get('institutionTypes') as $type)
										<option value="{{$type}}">{{$type}}</option>
									@endforeach
								</select>
								<input type="text" id="institution_name" name="institution_name" value="{{$edu['EduInstitution']->name}}" class="edu-type edit-edu">

							<span class="live-edu">Специалност :<br/> {{$edu['EduSpeciality']->name}}</span><br>
								<input type="text" name="specialty" id="specialty" value="{{$edu['EduSpeciality']->name}}" class="edu-type edit-edu">
							<span class="live-edu">Коментар :<br/> {{$edu->description}}</span><br>
								<textarea name="edu-description" id="edu-description" placeholder="{{$edu->description}}" style="overflow:auto;resize:none" rows="5" class="edit-edu" form="edu-form"></textarea>
						</span><br/>
						<p><button id="submit" name="submit" value="запази" class="btn btn-success edit-edu submit-edu"><i class="fas fa-save"></i></button></p>
					@empty
					    <span class="edu">Няма въведена информация</span>
					@endforelse
					</form>
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

<script type="text/javascript">
 function imagePreview(input){
 var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
    var reader = new FileReader();
    reader.onload = function (e) {
        $('.profile-pic').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}else{
     alert('Файлът трябва да е картинка/снимка!');
}
}
</script>
@endsection