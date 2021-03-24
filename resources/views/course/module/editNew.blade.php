@extends('layouts.template')
@section('title', 'Курс „' . $module->Course->name . '“ Лекции')
@section('content')
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
                    @foreach ($allModules as $moduleNav)
                        <a class="nav-link col-auto ps-0 @if ($module->id == $moduleNav->id) active @endif d-sm-block d-none" href="{{ asset('module/' . $moduleNav->id . '/edit') }}" aria-controls="module-1" aria-selected="true">{{ $moduleNav->name }}</a>
                    @endforeach

                    <div class="col d-sm-none">
                        <div class="position-relative d-inline-block">
                            <select class="border-0 form-control text-small text-green position-relative ps-0 py-0" id="tab_selector">
                                @foreach ($allModules as $moduleNav)
                                    <option value="{{ asset('module/' . $moduleNav->id . '/edit') }}" @if ($module->id == $moduleNav->id) selected @endif>{{ $moduleNav->name }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset('assets/img/arrow.svg') }}" alt="" class="position-absolute">
                        </div>
                    </div>

                    <div class="col add text-end align-self-end pb-lg-2 text-small">
                        <a href="{{ asset('module/create?course=' . $module->Course->id) }}">
                            <span class="me-2"><img src="{{ asset('assets/img/plus.svg') }}"></span>
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
                                                <div>
                                                    @if (is_null($lection->homework_end))
                                                        <img src="{{ asset('assets/img/Homework.svg') }}">
                                                    @endif
                                                    @if (!is_null($lection->homework_end))
                                                        <span class="">
                                                            Домашно до
                                                        </span>
                                                        <span class="text-orange fw-bold">
                                                            {{ $lection->homework_end->format('d.m.Y') }}
                                                        </span>
                                                    @endif
                                                    @if (!$lection->homework_criteria)
                                                        <div class="text-orange mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                                            <span class="orange-dot col-auto"></span>
                                                            <span class=col>Не е качено</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="d-lg-inline-block d-none">
                                                    @if ($lection->homework_criteria || $lection->demo || $lection->slides)
                                                        <img src="{{ asset('assets/img/download.svg') }}" alt="">
                                                        <span>Файлове</span>
                                                    @endif
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
                                        <!--  -->
                                        @if (!$lection->homework_criteria)
                                            <div class="col-auto file-notification d-xxl-flex d-sm-flex d-none align-items-center">
                                                <div class="big-orange-dot position-relative">
                                                    <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                                </div>
                                            </div>
                                        @endif
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
    <!-- Single lection content -->
    @foreach ($lections as $lection)
        <div class="tab-pane fade @if ($loop->iteration == 1) show active @endif mt-xl-2 pt-xl-1" id="lection-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lection-2-tab">
            <span class="show-lection">
                @include('course.module.lections.show')
            </span>
            <span class="edit-lection">
                @include('course.module.lections.edit')
            </span>
        </div>

        <form method="post" id="delete-lection-form-{{ $loop->iteration }}" action="{{ route('lection.destroy', $lection->id) }}">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
    <!-- Single lection content END-->
</div>
<!-- right side END -->
</div>

<script>
$(document).ready(function() {
    $('.show-lection').hide();

    $('#tab_selector').change(function() {
        window.location.href = $("#tab_selector").val();
    });

    /* count lections */
    $('#right-side').mouseup(function() {
        var count = $(this).attr('data-countLections');

        for (var i = 1; i <= count; i++) {
            countFiles(i);
        }
    });

    /* delete lection file */
    $('.btn-delete-file').click(function() {
        var lectionId = $(this).attr('data-lection-file-id');
        var lectionType = $(this).attr('data-lection-file-type');

        var conf = confirm("Найстина ли искате да изтриете този Файл-" + lectionType + "?");
        if (conf == true) {
            if (lectionType == 'Презентация') {
                var input = '<input type="hidden" name="slides_delete" value="delete" required>';
            } else if (lectionType == 'Демо') {
                var input = '<input type="hidden" name="demo_file_delete" value="delete" required>';
            } else if (lectionType == 'Домашно') {
                var input = '<input type="hidden" name="homework_delete" value="delete" required>';
            }

            $('.file-delete-input').after().html(input);
            var formId = '#lection-delete-file-form-' + lectionId;

            $(formId).submit();
        } else {
            return false;
        }
    });

    /* delete lection */
    $('.delete-lection').click(function() {
        var conf = confirm("Найстина ли искате да изтриете тази Лекция?");
        if (conf == true) {
            return true;
        } else {
            return false;
        }
    });

    /* lection add files */
    $('.lection-files-btn').click(function() {
        var lectionId = $(this).attr('data-lection-id');
        var lectionFiles = '#lection-files' + lectionId;
        var fileType = '#file-type-' + lectionId;

        $(lectionFiles).hide();
        $(fileType).show();

        $('.file-type').change(function() {
            var fileType = '#file-type-' + lectionId;
            var slides = '#slides-' + lectionId;
            var demo = '#demo-' + lectionId;
            var homework = '#homework-' + lectionId;

            if ($(fileType).val() == 'Презентация') {
                $(slides).trigger('click');
            } else if ($(fileType).val() == 'Демо') {
                $(demo).trigger('click');
            } else if ($(fileType).val() == 'Домашно') {
                $(homework).trigger('click');
            }
        });
    });

    /* Messages for what type of files are selected for upload */
    $('.lection-slides').change(function() {
        if ($(this).val() != null) {
            $('.lection-select-element').append(' Презентация');
        }
    });

    $('.lection-demo-file').change(function() {
        if ($(this).val() != null) {
            $('.lection-select-element').append(' Демо');
        }
    });

    $('.lection-homework').change(function() {
        if ($(this).val() != null) {
            $('.lection-select-element').append(' Домашно');
        }
    });

    /* lection files */
    function lectionFiles(i) {
        var fileType = '#file-type-' + i;
        var slides = '#slides-' + i;
        var demo = '#demo-' + i;
        var homework = '#homework-' + i;

        if ($(fileType).val() == 'Презентация') {
            $(slides).trigger('click');
        } else if ($(fileType).val() == 'Демо') {
            $(demo).trigger('click');
        } else if ($(fileType).val() == 'Домашно') {
            $(homework).trigger('click');
        }
    }

    /* count files */
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
