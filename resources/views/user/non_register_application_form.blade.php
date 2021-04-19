@extends('layouts.template')
@section('title', 'Форма за кандидатстване')
@section('content')
	<div class="content-wrap">
		<div class="section">
			<div class="col-md-12 d-flex flex-row flex-wrap">
				<div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
					<div class="col-md-12 text-center" style="margin-top:7vw;">
						<p>
						<p>
							<label for="">След формата, ще бъдете регистрирани в платформата, и от профила си ще може да следите прогреса на кандидатстване<br/>
								<i style="font-size:1vw;">на пощата ви ще получите писмо с линк към задаване на парола на акаунта си в платформата</i>
							</label>
						</p>
						<form action="{{route('application.store')}}" method="POST" class="col-md-12" id="application" name="application" enctype="multipart/form-data">
							{{ csrf_field() }}
							@if(collect(request()->segments())->last() !== 'create')
								<input type="hidden" name="source_url" value="{{collect(request()->segments())->last()}}">
							@endif
							<p>
								<label for="username">Име <span class="req-star-form">*</span></label>
								@if ($errors->has('username'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
								@endif
								<input type="text" name="username" value="{{old('username')}}" class="small-field-register"><br />
							</p>
							<p>
								<label for="userlastname">Фамилия <span class="req-star-form">*</span></label>
								@if ($errors->has('lastname'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
								@endif
								<input type="text" name="lastname" value="{{old('lastname')}}" class="small-field-register"><br />
							</p>
							<p>
								<label for="email">Е-Mail <span class="req-star-form">*</span></label>
								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
								<input type="text" name="email" value="{{old('email')}}" class="small-field-register">
							</p>
							<p>
								<label for="phone">Телефон <span class="req-star-form">*</span></label>
								@if ($errors->has('phone'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
								@endif
								<input type="number" name="phone" value="{{old('phone')}}" class="small-field-register phone-input">
							</p>
							<p>
								<label for="email">Възраст <span class="req-star-form">*</span></label>
								@if ($errors->has('userage'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('userage') }}</strong>
                                    </span>
								@endif
								<input type="text" name="userage" value="{{old('userage')}}" placeholder="въведете години..." class="small-field-register">
							</p>
							<p>
								<label for="occupation">Занимание <span class="req-star-form">*</span></label><br>
								@if ($errors->has('occupation'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
								@endif
								<select class="occupation section-el-bold" name="occupation" id="occupation">
									@foreach ($occupations as $occupation)
										<option value="{{$occupation->id}}" {{ (old("occupation") == $occupation->id ? "selected":"") }}>{{$occupation->occupation}}</option>
									@endforeach
								</select>
							</p>
							<p>
								<label for="course">Направление <span class="req-star-form">*</span></label><br/>
								@if(is_null($applicationFor) || empty($applicationFor) || count($applicationFor) < 1)
									@if ($errors->has('course'))
										<span class="invalid-feedback" role="alert" style="display: block !important;">
                                            <strong>{{ $errors->first('course') }}</strong>
                                        </span>
									@endif
									<select class="section-el-bold" name="course" id="course-select">
										<option value="0" disabled selected="selected">-----</option>
										@foreach(Config::get('applicationForm.courses') as $key => $modules)
											@if(is_array($modules))
												@foreach($modules as $sub)
													<option class="no-show course-{{str_replace(' ', '', $key)}}"
													        value="{{$sub}}">{{$sub}}</option>
												@endforeach
											@endif
											@if(isset($course) && $course == $key)
												<option value="{{$key}}"
												        {{ (old("course") == $key ? "selected":"") }} selected="selected"
												        data-count="{{count($modules)}}">{{ucfirst($key)}}</option>
											@else
												<option value="{{$key}}"
												        {{ (old("course") == $key ? "selected":"") }} data-count="{{count($modules)}}">{{ucfirst($key)}}</option>
											@endif
										@endforeach
									</select>
									<br>
									<br/>
									<span class="no-show">Модул <span class="req-star-form">*</span></span>
									<select class="section-el-bold no-show" name="module" id="module">
									
									</select>
									<script>
                                        $(function () {
                                            addSub();
                                        });
                                        $('#course-select').on('change', function () {
                                            addSub();
                                        });

                                        function addSub(){
                                            $('#module').html(' ');
                                            var selectedCourse = $('#course-select').find(':selected').text().replace(/ /g, '');

                                            if ($('#course-select').find(':selected').attr('data-count') > 0) {
                                                var clonedOptions = $('.course-' + selectedCourse).clone();
                                                $.each(clonedOptions, function (k, option) {
                                                    $('#module').append(option);
                                                    $('#module').find('option').removeClass('no-show');
                                                });
                                                $('#module').removeClass('no-show');
                                                $('#module').prev('span').removeClass('no-show');
                                            } else {
                                                $('#module').addClass('no-show');
                                                $('#module').prev('span').addClass('no-show');
                                            }
                                        }
									</script>
								@else
									<select class="section-el-bold" name="course" id="course-select">
										@if(!is_null($applicationFor))
											@foreach($applicationFor as $course)
												<option value="{{$course->id}}" selected>{{$course->name}}</option>
											@endforeach
										@endif
									</select>
								@endif
							</p>
							<p>
								<label for="suitable_candidate">Защо смятате, че тези обучения са подходящ за Вас?
									<br/>
									<small>(защо искате да учите
										@if(!is_null($applicationFor))
											@forelse($applicationFor as $course)
												{{$course->name}}
												@if(!$loop->last)
													,
												@endif
											@empty
											@endforelse
										@endif
											)</small>
									<span id="candidate-label"></span> <span class="req-star-form">*</span></label>
								@if ($errors->has('suitable_candidate'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('suitable_candidate') }}</strong>
                                    </span>
								@endif
								<textarea maxlength="500" name="suitable_candidate" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('suitable_candidate')}}</textarea>
							</p>
							<p>
								<label for="suitable_training">Защо смятате, че именно Вие сте подходящ за ИТ обучение?
									<br>
									<small>(кои ваши качества и интереси ви правят подходящ участник в курс по
										@if(!is_null($applicationFor))
											@forelse($applicationFor as $course)
												{{$course->name}}
												@if(!$loop->last)
													,
												@endif
											@empty
											@endforelse
										@endif
											)</small>
									<span id="training-label"></span><span class="req-star-form">*</span></label>
								@if ($errors->has('suitable_training'))
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('suitable_training') }}</strong>
                                    </span>
								@endif
								<textarea maxlength="500" name="suitable_training" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('suitable_training')}}</textarea>
							</p>
							<p>
								<label for="accompliments">Опишете 3 постижения, с които се гордеете (може да са в личен, професионален план или свързани с учене). <span id="accompliments-label"></span><span class="req-star-form">*</span></label>
								@if ($errors->has('accompliments'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('accompliments') }}</strong>
                                    </span>
								@endif
								<textarea maxlength="500" name="accompliments" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('accompliments')}}</textarea>
							</p>
							<p>
								<label for="expecatitions">Какви са очакванията Ви за това обучение? <span id="expecatitions-label"></span><span class="req-star-form">*</span></label>
								@if ($errors->has('expecatitions'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('expecatitions') }}</strong>
                                    </span>
								@endif
								<textarea maxlength="500" name="expecatitions" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('expecatitions')}}</textarea>
							</p>
							<p>
								<label for="use">Как смятате да използвате наученото от това обучение? <span class="req-star-form">*</span></label><br/>
								@if ($errors->has('use'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('use') }}</strong>
                                    </span>
								@endif
								<select class="section-el-bold" name="use">
									@foreach(Config::get('applicationForm.use') as $use)
										<option value="{{$use}}" {{ (old("use") == $use ? "selected":"") }}>{{ucfirst($use)}}</option>
									@endforeach
								</select>
							</p>
							
							<p>
								<label for="source">От къде научихте за това обучение? <span class="req-star-form">*</span></label><br/>
								@if ($errors->has('source'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('source') }}</strong>
                                    </span>
								@endif
								<select class="section-el-bold" name="source">
									@foreach(Config::get('applicationForm.source') as $source)
										<option value="{{$source}}" {{ (old("source") == $source ? "selected":"") }}>{{ucfirst($source)}}</option>
									@endforeach
								</select>
							</p>
							
							<p>
								<label for="cv">Автобиография <span class="req-star-form">*</span></label>
								@if ($errors->has('cv'))
									<span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('cv') }}</strong>
                                    </span>
								@endif
								<input type="file" name="cv" value="">
							</p>
							<br />
							<p>
							<div class="col-md-12 create-course-button text-center">
								<a href="#" id="submit_form" class="create-course-btn"><span class="create-course">Кандидаствай</span></a>
							</div>
							</p>
						</form>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('js/application-form-text-counter.js')}}" charset="utf-8"></script>
	<script>
        $('#submit_form').on('click', function(e){
            e.preventDefault();
            if($('#application').hasClass('submited')){
                $(this).fadeOut();
                $('.create-course-button').html('<p>Моля изчакайте, докато заявката се обработи...</p>');
            }else{
                $('#application').addClass('submited');
                $('#application').submit()
            }
        });
	</script>
@endsection