<link href="{{ asset('css/lection/students.css') }}" rel="stylesheet" />

@if (!Auth::user()->isLecturer() && !Auth::user()->isAdmin())
	@foreach ($homeworks as $homework)
		@if ($homework->lection_id == $lection->id)
			@php
				$validHomework = true;
				$homeworkFile = $homework->file;
			@endphp
			@break
		@else
			@php
				$validHomework = false;
			@endphp
		@endif
	@endforeach
@endif

<div class="tab-pane fade show @if ($loop->iteration == 1) show active @endif mt-xl-2 pt-xl-1" id="lection-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lection-1-tab">
	<div class="tab-body position-relative">
		<span class="close d-lg-none position-absolute">&times;</span>
		<div class="row pt-lg-0 pt-4 g-0">
			<div class="col pe-4 d-none d-lg-block">
				<h2 class="text-l1">{{ strlen($lection->title) > 25 ? mb_substr($lection->title, 0, 25) . "..." : $lection->title }}</h2>
			</div>
			<div class="col-auto pe-4 d-block d-lg-none">
				<h2 class="text-l1">{{ $lection->title }}</h2>
			</div>
			<div class="col-auto pe-4">
				<div class="data1">{{ $lection->first_date->format('d.m.Y') }}</div>
			</div>
			<div class="col-auto align-self-stretch border d-none d-lg-block"></div>
			<div class="col pe-4 ps-4 d-none d-lg-block">
				<div class="data1">{{ $lection->second_date->format('d.m.Y') }}</div>
			</div>
			<div class="col-auto pe-5 d-none d-lg-block">
            <div class="pill1 d-flex align-items-center float-right rounded-circle overflow-hidden">
                <button class="nav btn py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration - 1 }}" aria-controls="lection-1" aria-selected="true">
                    <a class="btn px-2 col p-0 text-center" id="toggleNav">
                        <img src="{{ asset('assets/img/arrow.svg') }}"class="arrow1">
                    </a>
                </button>
            </div>
        </div>
        <div class="col-auto pe-4 d-none d-lg-block">
            <div class="pill2 d-flex align-items-center float-right rounded-circle overflow-hidden">
                <button class="nav btn py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration + 1 }}" aria-controls="lection-1" aria-selected="true">
                    <a class="btn px-2 col p-0 text-center" id="toggleNav">
                        <img src="{{ asset('assets/img/arrow.svg') }}"class="arrow1">
                    </a>
                </button>
            </div>
        </div>
		</div>
		<div class="video-upload row g-0 my-4 position-relative" @if (isset($lection->Video->url))style="background-color: transparent;"@endif>
	        @if (isset($lection->Video->url))
	            <iframe width="762" height="375" src="{{ $lection->Video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 45px;"></iframe>
	        @else
	            <div class="edit-lection-btn video-upload-btn position-absolute text-center">
					<div class="text-center fw-bold pt-lg-4 pt-3">
	                    Няма
	                    <br class="d-lg-block d-none">
	                    видео
	                </div>
	            </div>
	        @endif
	    </div>
		<div class="edit-decsription pt-3 pb-2">
			<div class="lorem">
				{{ $lection->description }}
			</div>
		</div>
		@if ($lection->presentation)
		<div class="row g-0 d-lg-none mt-2">
			<div class="col-auto col-auto text-small align-self-end pe-3">Презентация</div>
			<div class="col-auto">
				<a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" download>
					<img src="{{ asset('assets/img/download.svg') }}" alt="">
				</a>
			</div>
		</div>
		@endif
		<hr class="mt-4 mb-4 d-lg-none">
		<div class="row g-0 align-items-lg-center lh-1 pb-5">
			@if ($lection->presentation)
				<div class="col-5 text-normal py-4 d-none d-lg-block">
					Презентация
				</div>
			@endif
			<div class="col-7 text-normal py-4 d-none d-lg-block">
				Файлове
			</div>
			@if ($lection->presentation)
				<div class="col-auto col-3 mb-lg-0 mb-3 me-lg-0 me-5 text-lg-end d-none d-lg-block">
					<div class="row g-0 ">
						<div class="col-auto col-auto text-small align-self-end pe-3">Презентация</div>
							<div class="col-auto">
							<a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" download>
								<img src="{{ asset('assets/img/download.svg') }}" alt="">
							</a>
						</div>
					</div>
				</div>
				<div class="col-auto align-self-stretch border b-size d-none d-lg-block ms-5"></div>
			@endif
			<div class="col">
				<div class="row g-0">
					@if ($lection->demo)
						<div class="col-auto col-5 mb-lg-0 mb-3 text-lg-end">
							<div class="row g-0">
								<div class="col-lg col-auto text-small align-self-end pe-3">Демо</div>
								<div class="col-auto">
									<a href="{{ $lection->demo }}">
										<img src="{{ asset('assets/img/download.svg') }}" alt="">
									</a>
								</div>
							</div>
						</div>
					@endif
		            @if ($lection->homework_criteria)
						<div class="col-lg col-5 mb-lg-0 mb-3 text-lg-end">
							<div class="row g-0">
								<div class="col-lg col-auto text-small align-self-end pe-3">Домашно</div>
								<div class="col-auto">
									<a href="{{ asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/homework-'.$lection->id.'/'.$lection->homework_criteria) }}" download>
										<img src="{{ asset('assets/img/download.svg') }}" alt="">
									</a>
								</div>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
		<!--Mobil btn-->
		@if ($lection->homework_criteria && !$validHomework)
			<button class="ms-xxl-2 mt-xxl-0 mt-4 btn-view-1 btn-green row g-0 align-items-center d-lg-none">
				<label for="homework-input-{{ $loop->iteration }}">
					<div class="col-auto mx-auto upload-btn" data-lection-id="{{ $loop->iteration }}">
						КАЧИ ДОМАШНО
						<br>
						<div class="deadline-student">
							Краен срок
							@if ($lection->homework_end)
		                        {{ ($lection->homework_end->format('Y') == date('Y')) ? $lection->homework_end->format('d.m') : $lection->homework_end->format('d.m.Y') }}
		                    @else
		                        Няма
		                    @endif
						</div>
					</div>
				</label>
			</button>
			<!--End mobil btn-->
			<div class="row g-0 uploaded-home-1 align-items-center p-3 mt-4">
				<div class="col ps-3 text-uploaded-home  text-uppercase text-white d-none d-lg-block">
					КАЧИ ДОМАШНО
				</div>
				<div class="col d-none d-lg-block">
					<div class="row">
						<div class="col-auto">
							<img src="{{ asset('assets/img/bell.svg') }}" alt="" class="bell-img">
						</div>
						<div class="col d-none d-lg-block">
							<div class="row g-0">
								<div class="col text-white deadline-2">
									Краен срок
									<br>
									<div class="date-pill d-flex align-items-center data-07">
										<div class="w-100 text-center fw-bold enddata1">
											@if ($lection->homework_end)
	                        					{{ ($lection->homework_end->format('Y') == date('Y')) ? $lection->homework_end->format('d.m') : $lection->homework_end->format('d.m.Y') }}
						                    @else
						                        Няма
						                    @endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-auto d-none d-lg-block">
					<div class="row g-0 ps-1">
						<div class="col">
							<label for="homework-input-{{ $loop->iteration }}">
								<div class="nav btn btn-green active py-0 pe-2 d-flex btn1-cs upload-btn" data-lection-id="{{ $loop->iteration }}" id="lection-1-tab">
									<div class="row g-0 align-self-center">
										<div class="col-auto text-start ms-3">
											Прикачи
										</div>
										<div class="col text-end align-items-center d-flex img-btn-ms">
											<img src="{{ asset('assets/img/action_icon.svg') }}">
										</div>
									</div>
								</div>
							</label>
						</div>
					</div>
				</div>
			</div>
		@endif
		@if ($validHomework)
			<div class="row g-0 ps-1">
				<div class="col d-lg-none">
					<button class="nav btn active py-0 pe-2 d-flex w-100 btn2-mobil d-flex justify-content-center" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
						<div class="row g-0 align-self-center">
							<div class="col-auto text-start text-evaluation"><b>Оцени домашни</b></div>
							<div class="col-auto text-start ms-1 text-evaluation-number"><b>(2)</b></div>
							<div class="col-auto  ms-3 text-data-yellow"><b>(до {{ $lection->homework_check_end->format('d.m') }})</b></div>
							<div class="col  align-items-center d-flex img-btn-ms">
								<img src="{{ asset('assets/img/action_icon _black.svg') }}">
							</div>
						</div>
					</button>
				</div>
			</div>
			<div class="row g-0 uploaded-home-2 align-items-center p-3 mt-4 mb-lg-5">
				<div class="col ps-3 text-uploaded-home text-uppercase text-navy-blue d-none d-lg-block">
					ОЦЕНИ ДОМАШНО <b class="text-orange ps-2">(2)</b>
				</div>
				<div class="col d-none d-lg-block">
					<div class="row">
						<div class="col-auto">
							<img src="{{ asset('assets/img/bell.svg') }}" class="bell-img">
						</div>
						<div class="col d-none d-lg-block">
							<div class="row g-0">
								<div class="col text-navy-blue deadline-2">
									Краен срок
									<br>
									<div class="date-pill d-flex align-items-center data-07">
										<div class="w-100 text-center fw-bold enddata1">{{ $lection->homework_check_end->format('d.m') }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-auto d-none d-lg-block">
					<div class="row g-0 ps-1">
						<div class="col">
							<button class="nav btn  btn-green active py-0 pe-2 d-flex btn1-cs" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
								<div class="row g-0 align-self-center">
									<div class="col-auto text-start ms-3 text-uploaded-home-sm">Виж всички</div>
									<div class="col-auto text-end align-items-center d-flex img-btn-ms">
										<img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
									</div>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
			<!--Mobil-->
			<div class="row g-0 home-work-1 align-items-center p-3 mt-3">
				<div class="d-flex justify-content-center text-grey-2 text-uppercase d-lg-none ps-3">
					<b>Качено домашно</b>
				</div>
				<div class="row ">
					<div class="text-white text-xs d-flex justify-content-center d-lg-none">
						<div class="mt-2 me-2">
							Домашно
						</div>
						<a href="{{ asset('/data/homeworks/' . $homeworkFile) }}" download>
							<img src="{{ asset('assets/img/download.svg') }}" alt="">
						</a>
					</div>
				</div>
				<div class="col-auto mx-lg-0 mx-auto d-lg-none">
					<button class="ms-xxl-2 mt-xxl-0 mt-4 btn-view-1 btn-green row g-0 align-items-center ">
						<div class="col-auto mx-auto fw-bold see-all">Виж всички <img src="{{ asset('assets/img/action_icon.svg') }}"></div>
					</button>
				</div>
				<!--END mobil-->
				<div class="col ps-3 text-normal text-uppercase text-white d-none d-lg-block">
					ДОМАШНО
				</div>
				<div class="col-auto text-small align-self-end pe-3 text-white mb-2 d-none d-lg-block">Домашно</div>
				<div class="col d-none d-lg-block">
					<a href="{{ asset('/data/homeworks/' . $homeworkFile) }}" download>
						<img src="{{ asset('assets/img/download.svg') }}" alt="">
					</a>
				</div>
				<div class="col-auto d-none d-lg-block">
					<div class="row g-0 ps-1">
						<div class="col">
							<button class="nav btn  btn-green active py-0 pe-2 d-flex btn2-d" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
								<div class="row g-0 align-self-center">
									<div class="col-auto ms-3 text-uploaded-home-sm">
										Коментари
									</div>
									<div class="col text-end align-items-center d-flex img-btn1-ms">
										<img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
									</div>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
</div>

@if(!is_null($lection->homework_end) && $lection->homework_end)
	<form id="upload-homework-{{ $loop->iteration }}" action="{{ route('user.upload.homework') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="lection" value="{{ $lection->id }}">
		<input type="file" id="homework-input-{{ $loop->iteration }}" name="homework" class="homework-input" style="display: none">
	</form>
@endif

@php
	$validHomework = false;
	$homeworkFile = null;
@endphp

<script type="text/javascript">
$(document).ready(function() {
	$('.upload-btn').click(function() {
		var id = $(this).attr('data-lection-id');

		$('.homework-input').change(function() {
			var uploadHomework = '#upload-homework-' + id;
			$(uploadHomework).submit();
		});
	});
});
</script>
