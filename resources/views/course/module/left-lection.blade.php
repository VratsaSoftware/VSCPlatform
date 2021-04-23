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
                        @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                            <a class="tooltip-popup nav-link col-auto ps-0 @if ($module->id == $moduleNav->id) active @endif d-sm-block d-none" href="{{ asset('module/' . $moduleNav->id . '/edit') }}" aria-controls="module-1" aria-selected="true">
                                М{{ $loop->iteration }}
                                <span class="tooltiptext">
                                    {{ $moduleNav->name }}
                                </span>
                            </a>
                        @else
                            <a class="tooltip-popup nav-link col-auto ps-0 @if ($module->id == $moduleNav->id) active @endif d-sm-block d-none" href="{{ asset('user/' . Auth::user()->id . '/course/' . $module->Course->id . '/module/' . $moduleNav->id . '/lections') }}" aria-controls="module-1" aria-selected="true" style="padding: .2rem 1rem;">
                                М{{ $loop->iteration }}
                                <span class="tooltiptext">
                                    {{ $moduleNav->name }}
                                </span>
                            </a>
                        @endif
                    @endforeach

                    <div class="col d-sm-none">
                        <div class="position-relative d-inline-block">
                            <select class="border-0 w-25 form-control text-small text-green position-relative ps-0 py-0" id="tab_selector">
                                @foreach ($allModules as $moduleNav)
                                    @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                                        <option value="{{ asset('module/' . $moduleNav->id . '/edit') }}" @if ($module->id == $moduleNav->id) selected @endif>{{ $moduleNav->name }}</option>
                                    @else
                                        <option value="{{ asset('user/' . Auth::user()->id . '/course/' . $module->Course->id . '/module/' . $moduleNav->id . '/lections') }}" @if ($module->id == $moduleNav->id) selected @endif>{{ $moduleNav->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <img src="{{ asset('assets/img/arrow.svg') }}" class="position-absolute">
                        </div>
                    </div>
                    @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                        <div class="col add text-end align-self-end pb-lg-2 text-small">
                            <a href="{{ asset('module/create?course=' . $module->Course->id) }}">
                                <span class="me-2"><img src="{{ asset('assets/img/plus.svg') }}"></span>
                                Добави модул
                            </a>
                        </div>
                    @endif
                </div>
            </nav>
            <div class="tab-content pt-lg-2">
                <!--First tab-->
                <div class="tab-pane fade show active" id="module-1" role="tabpanel" aria-labelledby="module-1-tab">
                    @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                        <div class="row g-0 pb-4 mb-2">
                            <div class="col-xxl col-xl-12 col-sm d-flex justify-content-start">
                                <button class="btn-edit row g-0 align-items-center mb-0">
                                    <div class="col text-start">Добави курсист</div>
                                    <div class="col-auto">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                            <div class="col-xxl col-xl-12 col-sm ms-xxl-3 ms-xl-0 ms-sm-3 d-flex justify-content-end">
                                <button class="ms-xxl-2 mt-xxl-0 mt-xl-4 mt-sm-0 mt-4 mb-0 btn-edit row g-0 align-items-center">
                                    <div class="col text-start">Редактирай модул</div>
                                    <div class="col-auto">
                                        <img src="{{ asset('assets/img/edit.svg') }}">
                                    </div>
                                </button>
                            </div>
                        </div>
                    @endif
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
                            @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                                <button class="add-lection-button" style="float: right; color: #000; border: 0px">
                                    <span class="me-2"><img src="{{ asset('assets/img/plus.svg') }}"></span>
                                    Добави лекция
                                </button>
                            @endif
                        </div>
                        <!-- Accordion sections  -->
                        <div class="accordion accordion-flush position-relative" id="accordionExample">
                            @foreach ($lections as $lection)
                                @if (!Auth::user()->isLecturer() || !Auth::user()->isAdmin())
                                    @foreach ($homeworks as $homework)
                                        @if ($homework == $lection->id)
                                            @php
                                                $validHomework = true;
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                @endif
                                <!-- Accordion item -->
                                <div class="accordion-item">
                                    <button class="accordion-button @if ($loop->iteration !== 1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                        <div class="row d-flex w-100 align-items-end g-0 text-start text-uppercase">
                                            <div class="col lection-title text-large">
                                                {{ $loop->iteration }}. {{ $lection->title }}
                                            </div>
                                            <div class="col-auto ms-auto text-small time pe-2">
                                                {{-- $lection->first_date->format('H:i') --}}
                                            </div>
                                        </div>
                                    </button>
                                    <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse @if ($loop->iteration == 1) show @endif" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body py-lg-3 py-1">
                                            <div class="d-flex justify-content-between pb-4 text-small">
                                                <div>
                                                    <img src="{{ asset('assets/img/Homework.svg') }}">
                                                    @if (!is_null($lection->homework_end))
                                                        <span>
                                                            Домашно до
                                                        </span>
                                                        <span class="text-orange fw-bold">
                                                            {{ $lection->homework_end->format('d.m') }}
                                                        </span>
                                                    @endif
                                                    @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                                                        @if (!$lection->homework_criteria)
                                                            <div class="text-orange mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                                                <span class="orange-dot col-auto"></span>
                                                                <span class=col>Не е качено</span>
                                                            </div>
                                                        @else
                                                            <div class="text-green mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                                                <span class="green-dot-circle col-auto"></span>
                                                                <span class=col>Качено домашно</span>
                                                            </div>
                                                        @endif
                                                    @else
                                                    @if ($lection->homework_criteria)
                                                        @if ($validHomework)
                                                            <div class="text-green mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                                                <span class="green-dot-circle col-auto"></span>
                                                                <span class=col>Качено домашно</span>
                                                            </div>
                                                        @else
                                                            <div class="text-orange mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                                                <span class="orange-dot col-auto"></span>
                                                                <span class=col>Не е качено</span>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="text-gray mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                                            <span class="gray-dot col-auto"></span>
                                                            <span class=col>Няма домашно</span>
                                                        </div>
                                                    @endif
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

                                        <div class="col-auto file-notification d-xxl-flex d-sm-flex d-none align-items-center">
                                            @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                                                @if (!$lection->homework_criteria)
                                                    <div class="big-orange-dot position-relative">
                                                        <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                                    </div>
                                                @else
                                                    <div class="big-green-dot position-relative">
                                                        <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                                    </div>
                                                @endif
                                            @else
                                                @if ($lection->homework_criteria)
                                                    @if ($validHomework)
                                                        <div class="big-green-dot position-relative">
                                                            <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                                        </div>
                                                    @else
                                                        <div class="big-orange-dot position-relative">
                                                            <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="big-gray-dot position-relative">
                                                        <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                                    </div>
                                                @endif
                                            @endif
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
                                @if (!Auth::user()->isLecturer() || !Auth::user()->isAdmin())
                                    @php
                                        $validHomework = null;
                                    @endphp
                                @endif
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
    @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
        @if ($lections->count() == 0)
            @include('flash-message')
            @include('course.module.lections.create')
        @else
            @include('flash-message')
            @foreach ($lections as $lection)
                <div class="tab-pane fade @if ($loop->iteration == 1) show active @endif mt-xl-2 pt-xl-1" id="lection-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lection-2-tab">
                    <span class="show-lection" style="display: none">
                        @include('course.module.lections.show')
                    </span>
                    <span class="edit-lection" style="display: none">
                        @include('course.module.lections.edit')
                    </span>
                    <span class="add-lection" style="display: none">
                        @include('course.module.lections.create')
                    </span>
                </div>

                <form method="post" id="delete-lection-form-{{ $loop->iteration }}" action="{{ route('lection.destroy', $lection->id) }}">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        @endif
    @else
        @include('flash-message')
        @foreach ($lections as $lection)
            @include('course.student.lections')
        @endforeach
    @endif
</div>
<!-- right side END -->
</div>

<script src="{{ asset('js/lection/lection.js') }}"></script>
<script src="{{ asset('js/lection/create.js') }}"></script>
<script src="{{ asset('js/lection/validation.js') }}"></script>

@endsection
