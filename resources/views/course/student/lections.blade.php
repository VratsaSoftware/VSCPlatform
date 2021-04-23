<link href="{{ asset('css/lection/students.css') }}" rel="stylesheet" />

<div class="tab-pane fade show @if ($loop->iteration == 1) show active @endif mt-xl-2 pt-xl-1" id="lection-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lection-1-tab">
	<div class="tab-body position-relative">
		<span class="close d-lg-none position-absolute">&times;</span>
		<div class="row pt-lg-0 pt-4 g-0">
			<div class="col pe-4 d-none d-lg-block">
				<h2 class="text-l1">{{ $lection->title }}</h2>
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
	                Няма видео
	            </div>
	        @endif
	    </div>
		<div class="edit-decsription pt-3 pb-2">
			<div class="lorem">
				{{ $lection->description }}
			</div>
		</div>
		<div class="row g-0 align-items-lg-center lh-1 pb-5">
			<div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end d-block d-lg-none">
				<div class="row g-0 mt-2">
					<div class="col-auto">
						<img src="{{ asset('assets/img/download.svg') }}">
					</div>
					<div class="col-lg col-auto text-small align-self-end ps-3">Презентация</div> 
				</div>
			</div>
			<hr class="d-block d-lg-none mt-4">
			<div class="col-5 text-normal py-4 d-none d-lg-block">
				Презентация
			</div>
			<div class="col-7 text-normal py-4 d-none d-lg-block">
				Файлове
			</div>
			<div class="col-lg-4 col-auto order-lg-0 order-2 d-none d-lg-block">
				<div class="row g-0">
					<div class=" col-auto text-small align-self-end pe-3">Презентация</div> 
					<div class="col-auto">
						<a href="">
							<img src="{{ asset('assets/img/download.svg') }}">
						</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row g-0">
					<div class="col-lg col mb-lg-0 mb-3 text-lg-end">
						<div class="row g-0">
							<div class="col-lg col-auto text-small align-self-end pe-3">Демо</div> 
							<div class="col-auto">
								<a href="">
									<img src="{{ asset('assets/img/download.svg') }}">
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg col-auto mb-lg-0 mb-3 text-lg-end">
						<div class="row g-0">
							<div class="col-lg col-auto text-small align-self-end pe-3">Дома</div> 
							<div class="col-auto">
								<a href="">
									<img src="{{ asset('assets/img/download.svg') }}">
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end d-none d-lg-block">
					</div>
				</div>
			</div>
		</div>
		<!--Mobil btn-->
		@if ($lection->homework_criteria)
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
	</div>
</div>

@if(!is_null($lection->homework_end) && $lection->homework_end)
	<form id="upload-homework-{{ $loop->iteration }}" action="{{ route('user.upload.homework') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="lection" value="{{ $lection->id }}">
		<input type="file" id="homework-input-{{ $loop->iteration }}" name="homework" class="homework-input" style="display: none">
	</form>
@endif

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