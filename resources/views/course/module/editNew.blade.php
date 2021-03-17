@extends('layouts.template')
@section('title', 'Редактирай Модул/Ниво')
@section('content')
<!-- Fonts and Icons -->
<link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<!-- Bootstrap core CSS -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
<!-- CSS Files -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- left side -->
<div class="col-xl-auto col ps-xxl-0 ps-lg-4">
    <div class="card">
        <div class="card-body">
            <div class="row g-0 pb-lg-4 mb-lg-3">
                <div class="col pt-lg-0 pt-2 mt-lg-0 mt-1">
                    <h2 class="card-title m-0">
                        Курс {{ $module->Course->name }}
                    </h2>
                </div>
                <div class="col-auto">
                    <a href="" class="settings">
                        <span class="d-block"></span>
                        <span class="d-block"></span>
                        <span class="d-block"></span>
                    </a>
                </div>
            </div>
            <!-- Nav tabs -->
            <nav>
                <div class="nav nav-tabs row align-items-center g-0 mb-4 p-sm-0 pt-3 pb-4">
                    <a class="nav-link col-auto ps-0 active d-sm-block d-none" id="module-1-tab" data-bs-toggle="tab" href="#module-1" role="tab" aria-controls="module-1" aria-selected="true">Mодул 1</a>
                    <a class="nav-link col-auto ps-xxl-3 ps-lg-2 ps-3 d-sm-block d-none" id="module-2-tab" data-bs-toggle="tab" href="#module-2" role="tab" aria-controls="module-1" aria-selected="false">Mодул 2</a>
                    <a class="nav-link col-auto ps-xxl-3 ps-lg-2 ps-3 d-sm-block d-none" id="module-3-tab" data-bs-toggle="tab" href="#module-3" role="tab" aria-controls="module-1" aria-selected="false">Mодул 3</a>
                    <div class="col d-sm-none">
                        <div class="position-relative d-inline-block">
                            <select class="border-0 form-control text-small text-green position-relative ps-0 py-0" id="tab_selector">
                                <option value="0">Mодул 1</option>
                                <option value="1">Mодул 2</option>
                                <option value="2">Mодул 3</option>
                            </select>
                            <img src="{{ asset('assets/img/arrow.svg') }}" alt="" class="position-absolute">
                        </div>
                    </div>
                    <div class="col add text-end align-self-end pb-lg-2 text-small">
                        <a href="">
                            <span class="me-2"><img src="{{ asset('assets/img/plus.svg') }}" alt=""></span>
                            Добави модул
                        </a>
                    </div>
                </div>
            </nav>
            <div class="tab-content pt-lg-2">
                <!--First tab-->
                <div class="tab-pane fade show active" id="module-1" role="tabpanel" aria-labelledby="module-1-tab">
                    <div class="row g-0 pb-4 mb-2">
                        <div class="col-xxl d-flex justify-content-start">
                            <button class="w-100 btn-edit row g-0 align-items-center add-c">
                                <div class="col text-start">Добави курсист</div>
                                <div class="col-auto">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                        <div class="col-xxl ms-xxl-3 d-flex justify-content-end">
                            <button class="ms-xxl-2 mt-xxl-0 w-100 btn-edit row g-0 align-items-center add-m">
                                <div class="col text-start">Редактирай модул</div>
                                <div class="col-auto">
                                    <img src="{{ asset('assets/img/edit.svg') }}" alt="">
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="row g-0 pb-4 mb-lg-0 mb-1 pt-lg-0 pt-1">
                        <div class="col pe-lg-0 pe-4 me-xxl-3">
                            <span class="text-normal">
                                Начало:
                            </span>
                            <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">{{ $module->starts->format('d.m.Y') }}</span>
                        </div>
                        <div class="col-xxl-auto col">
                            <span class="text-normal">
                                Продължителност до:
                            </span>
                            <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">{{ $module->ends->format('d.m.Y') }}</span>
                        </div>
                    </div>
                    <div class="row g-0 pb-3">
                        <div class="col pb-lg-0 pb-2">
                            <span class="text-normal">
                                Оценка:
                            </span>
                        </div>
                    </div>
                    <!-- Scroll section-->
                    <div class="lectures">
                        <div class="fw-bold text-warm-grey text-small text-uppercase py-lg-4 pb-3 pt-4 my-lg-0 my-1">
                            Учебна програма
                        </div>
                        <!-- Accordion sections  -->
                        <div class="accordion accordion-flush position-relative" id="accordionExample">
                            @foreach ($lections as $lection)
                            <!-- Accordion item  -->
                            <!-- <div class="accordion-item">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}">
                                    <div class="row d-flex w-100 align-items-center g-0 text-start text-uppercase">
                                        <div class="col lection-title text-large">
                                            {{ $loop->iteration }}. {{ $lection->title }}
                                        </div>
                                        <div class="col-auto time">
                                            {{ $lection->first_date->format('H:i') }}
                                        </div>
                                    </div>
                                </button>
                                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse @if ($loop->iteration == 1) show @endif" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-lg-3 py-1">
                                        <div class="d-flex justify-content-between pb-4 text-small">
                                            <div>
                                                <img src="{{ asset('assets/img/Homework.svg') }}" alt="">
                                                <span class="">
                                                    Домашно до
                                                </span>
                                                <span class="text-orange fw-bold">
                                                    07.05
                                                </span>
                                                <div class="text-orange mt-lg-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-lg-1 fw-bold row g-0 align-items-center">
                                                    <span class="orange-dot col-auto"></span>
                                                    <span class=col>Не е качено</span>
                                                </div>
                                            </div>
                                            <div class="d-xxl-inline-block d-none">
                                                <img src="{{ asset('assets/img/download.svg') }}" alt="">
                                                <span class="">Файлове</span>
                                            </div>
                                            <div class="d-xxl-inline-block d-none">
                                                <i class="fas fa-play text-green me-2"></i>
                                                <span class="">Видео</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-see row g-0">
                                    <div class="col eval text-normal">ОЦЕНКA:</div>
                                    <div class="col-auto file-notification d-xxl-flex d-xl-none d-sm-flex d-none align-items-center">
                                        <div class="big-orange-dot position-relative">
                                            <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                                            <div class="row g-0 align-self-center">
                                                <div class="col-auto text-start text-small">Виж</div>
                                                <div class="col text-end align-items-center d-flex">
                                                    <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Accordion item -->
                            <div class="accordion-item">
                                <button class="accordion-button @if ($loop->iteration !== 1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                    <div class="row d-flex w-100 align-items-end g-0 text-start text-uppercase">
                                        <div class="col lection-title text-large">
                                            {{ $loop->iteration }}. {{ $lection->title }}
                                        </div>
                                        <div class="col-auto time">
                                            {{ $lection->first_date->format('H:i') }}
                                        </div>
                                    </div>
                                </button>
                                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse @if ($loop->iteration == 1) show @endif" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-lg-3 py-1">
                                        <div class="d-flex justify-content-between pb-4 text-small">
                                            <div class="">
                                                @if (!is_null($lection->homework_end))
                                                <img src="{{ asset('assets/img/Homework.svg') }}" alt="">
                                                <span class="">
                                                    Домашно до
                                                </span>
                                                <span class="text-orange fw-bold">
                                                    {{ $lection->homework_end->format('d.m.Y') }}
                                                </span>
                                                @endif
                                                @if (!is_null($lection->homework_criteria))
                                                    <div class="text-orange mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                                        <span class="orange-dot col-auto"></span>
                                                        <span class=col>Не е качено</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="d-lg-inline-block d-none">
                                                <img src="{{ asset('assets/img/download.svg') }}" alt="">
                                                <span class="">Файлове</span>
                                            </div>
                                            <div class="d-lg-inline-block d-none">
                                                @if (isset($lection->Video->url))
                                                    <i class="fas fa-play text-green me-2"></i>
                                                    <span class="">Видео</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-see row g-0">
                                    <div class="col eval text-normal">ОЦЕНКA:</div>
                                    <div class="col-auto file-notification d-xxl-flex d-xl-none d-sm-flex d-none align-items-center">
                                        <div class="big-orange-dot position-relative">
                                            <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button data-lections="{{ $lection }}" class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration }}" role="tab" aria-controls="lection-1" aria-selected="true">
                                            <div class="row g-0 align-self-center">
                                                <div class="col-auto text-start text-small">Виж</div>
                                                <div class="col text-end align-items-center d-flex">
                                                    <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion item END-->
                            @endforeach
                        </div>
                    </div>
                    <!-- Scroll section END-->
                </div>
                <!--First tab END-->
                <!--Second tab -->
                <div class="tab-pane fade" id="module-2" role="tabpanel" aria-labelledby="module-2-tab">
                    SECOND TAB CONTENT
                </div>
                <!--Second tab END-->
                <div class="tab-pane fade" id="module-3" role="tabpanel" aria-labelledby="module-3-tab">

                </div>
            </div>
            <!-- Nav tabs END-->
        </div>
    </div>
</div>
<!-- left side END -->
</div>
</div>
<!-- right side -->
<div id="right-side" data-countLections="{{ count($lections) }}" class="col-xl pt-md-5 mt-md-4 tab-content edit-content">
    @foreach ($lections as $lection)
    <!-- Single lection content -->
    <div class="tab-pane fade @if ($loop->iteration == 1) show active @endif mt-xl-2 pt-xl-1" id="lection-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lection-2-tab">
        <form action="{{ url('lection/' . $lection->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="tab-body position-relative">
                <span class="close d-lg-none position-absolute">&times;</span>
                <div class="row pt-lg-0 pt-4 g-0">
                    <div class="col-md pe-md-3 me-xl-2">
                        <input class="w-100 lection-title-input text-navy-blue" type="text" name="title" value="@if (isset($lection->title)){{ $lection->title }}@endif">
                    </div>
                    <div class="col-md-auto pe-md-3 me-xl-1">
                        <div class="position-relative calendar">
                            <input type="text" name="first_date" value="@if (isset($lection->first_date)){{ $lection->first_date->format('Y-m-d') }}@endif" class="date-input ext-navy-blue">
                            <img src="{{ asset('assets/img/arrow.svg') }}">
                        </div>
                    </div>
                    <div class="col-md-auto pe-md-3 me-xl-1">
                        <div class="position-relative calendar">
                            <input type="text" name="second_date" value="@if (isset($lection->second_date)){{ $lection->second_date->format('Y-m-d') }}@endif" class="date-input ext-navy-blue">
                            <img src="{{ asset('assets/img/arrow.svg') }}">
                        </div>
                    </div>
                    <div class="col-auto mx-lg-0 mx-auto">
                        <button class="input-button">+</button>
                    </div>
                </div>

                <div class="video-upload row g-0 my-4 position-relative">
                    <div class="video-upload-btn position-absolute text-center">
                        <label for="video-file{{ $loop->iteration }}">
                            <img src="{{ asset('assets/img/upload_video.svg') }}" alt="">
                            <div class="text-center fw-bold pt-lg-4 pt-3">
                                Upload
                                <br class="d-lg-block d-none">
                                video
                            </div>
                            <span id="video-file-count{{ $loop->iteration }}">
                                @if (isset($lection->Video->url))
                                <br><a href="{{ asset('/') . 'data/course-' . $module->Course->id . '/modules-' . $module->id . '/video-' . $lection->id . '/' . $lection->Video->url }}">Виж</a>
                                @endif
                            </span>
                        </div>
                    </lable>
                </div>

                <input id="video-file{{ $loop->iteration }}" name="video_file" style="display: none;" type="file">

                <div class="edit-decsription pt-3">
                    <textarea name="description" class="p-2">{{ $lection->description }}</textarea>
                </div>

                <div class="row g-0 align-items-lg-center lh-1 pb-5">
                    <div class="col-12 text-normal py-4">
                        Файлове
                    </div>
                    <div class="col-lg-4 col-auto order-lg-0 order-2">
                        <label for="lection-files{{ $loop->iteration }}">
                            <span style="border-radius: 15px" class="btn-add row g-0 align-items-center">
                                <div class="col text-small text-start pe-3 d-lg-block d-none">Добави</div>
                                <div class="col-auto mx-lg-0 mx-auto">
                                    <div class="d-inline-block border d-lg-block d-none">
                                        <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                    </div>
                                    <div class="d-lg-none btn-plus">
                                        +
                                    </div>
                                </div>
                            </span>
                            <span id="lection-files-count{{ $loop->iteration }}"></span>
                        </label>

                        <input id="lection-files{{ $loop->iteration }}" name="slides[]" style="display: none;" type="file" multiple="multiple">
                    </div>
                    <div class="col">
                        <div class="row g-0">
                            <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                                <div class="row g-0">
                                    <div class="col-lg col-auto text-small align-self-end pe-3">Файл1</div>
                                    <div class="col-auto">
                                        <a href="">
                                            <img class="" src="{{ asset('assets/img/Delete.svg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                                <div class="row g-0">
                                    <div class="col-lg col-auto text-small align-self-end pe-3">Файл1</div>
                                    <div class="col-auto">
                                        <a href="">
                                            <img class="" src="{{ asset('assets/img/Delete.svg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                                <div class="row g-0">
                                    <div class="col-lg col-auto text-small align-self-end pe-3">Файл1</div>
                                    <div class="col-auto">
                                        <a href="">
                                            <img class=""src="{{ asset('assets/img/Delete.svg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-0 home-work align-items-center p-3 mt-1">
                    <div class="col-lg-3 ps-3 text-normal text-uppercase pe-4">
                        ДОМАШНО
                    </div>
                    <div class="col pr-3">
                        <div class="row g-0 ps-3">
                            <div class="col pe-3 pb-lg-0 pb-2">
                                Краен срок
                                за домашно:
                            </div>
                            <div class="col-auto">
                                <div class="date-pill d-flex align-items-center">
                                    <input class="text-center fw-bold" value="@if(isset($lection->homework_end)){{ $lection->homework_end->format('d.m') }}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col ps-3">
                        <div class="row g-0 ps-3">
                            <div class="col pe-3 pb-lg-0 pb-2">
                                Краен срок
                                за проверка:
                            </div>
                            <div class="col-auto">
                                <div class="date-pill d-flex align-items-center">
                                    <input class="text-center fw-bold" value="07.05">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <div class="row g-0">
                    <div class="col-lg col-auto mx-lg-0 mx-auto">
                        <button class="ms-xxl-2 mt-xxl-0 mt-3 btn-edit row g-0 align-items-center">
                            <div class="col text-start fw-bold">Изтрий лекция</div>
                            <div class="col-auto">
                                <img src="{{ asset('assets/img/Delete.svg') }}" alt="">
                            </div>
                        </button>
                    </div>
                    <div class="col-auto mx-lg-0 mx-auto">
                        <button class="ms-xxl-2 mt-xxl-0 mt-3 btn-edit btn-green row g-0 align-items-center">
                            <div class="col text-start fw-bold">Запази промените</div>
                            <div class="col-auto">
                                <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endforeach
    <!-- Single lection content END-->
</div>
<!-- right side END -->
</div>

<script>
$(document).ready(function(){
    $("#right-side").click(function() {
        var count = $(this).attr("data-countLections");

        for (var i = 1; i <= count; i++) {
            countFiles(i);
        }
    });

    function countFiles(i) {
        var lectionFilesParse = "#lection-files" + i;
        var lectionFilesCountParse = "#lection-files-count" + i;
        $(lectionFilesParse).change(function() {
            var count = $(lectionFilesParse).get(0).files.length;
            $(lectionFilesCountParse).after().html('Файлове:' + count);
        });

        var videoFile = "#video-file" + i;
        var videoCountFile = "#video-file-count" + i;
        $(videoFile).change(function() {
            $(videoCountFile).after().html('<br>Файлове: 1');
        });
    }
});
</script>

@endsection
