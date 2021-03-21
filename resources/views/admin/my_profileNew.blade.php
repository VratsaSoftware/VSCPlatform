@extends('layouts.template')
@section('title', 'Моят Профил')
@section('content')
<!-- content -->
<div class="col d-none d-lg-block" id="main">
    <div class="row g-0">
        <!-- left side -->
        <div class="col-xl-auto col ps-xxl-0 ps-lg-4">
            <div class="card-error">
                <div class="card-body-error">
                    <div class="row g-0 pb-lg-4 mb-lg-3">
                        <div class="col pt-lg-0 pt-2 mt-lg-0 mt-1">
                            <h2 class="card-title-error m-0 text-uppercase">
                                <b>Записани курсове</b>
                            </h2>
                        </div>
                        <div class="col-auto">
                            <a href="" class="settings">
                                <img src="{{ asset('assets/img/filter.svg') }}">
                            </a>
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <div class="tab-content pt-lg-2">
                        <!--First tab-->
                        <div class="tab-pane fade show active" id="module-1" role="tabpanel" aria-labelledby="module-1-tab">
                            <!-- Scroll section-->
                            <div class="lectures-error">
                                <!-- Accordion sections  -->
                                <div class="accordion accordion-flush position-relative" id="accordionExample">
                                    <!-- Accordion item -->
                                    <div class="accordion-item-1 programming-error">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error">
                                                <div class="col lection-title text-large">
                                                    <img src="{{ asset('assets/img/Programirane.svg') }}">
                                                </div>
                                                <div class="col-auto ms-auto pe-2">
                                                    <span class="green-dot col-auto"></span>
                                                    <span class=col>Активен</span>
                                                </div>
                                            </div>
                                        </button>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body pt-lg-1">
                                                <div class="d-flex justify-content-between pb-4 pt-3">
                                                    <div class="lection-programirane">
                                                        <span class="">
                                                            Програмиране
                                                        </span>
                                                    </div>
                                                    <div class="btn-see row g-0">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion item END-->
                                    <div class="col active-courses text-uppercase mb-5 mt-5 pb-3 pt-3">
                                        <b>Активни курсове</b>
                                    </div>
                                    <!-- Accordion item -->
                                    <div class="accordion-item-1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error">
                                                <div class="col lection-title text-large">
                                                    <img src="{{ asset('assets/img/Design.svg') }}" class="desing-img">
                                                </div>
                                                <div class="col-auto ms-auto pe-2">
                                                    <span class="green-dot col-auto"></span>
                                                    <span class=col>Активен</span>
                                                </div>
                                            </div>
                                        </button>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body py-lg-1">
                                                <div class="d-flex justify-content-between pb-4">
                                                    <div class="lection-programirane">
                                                        <span class="">
                                                            Дизайн
                                                        </span>
                                                    </div>
                                                    <div class="btn-see row g-0">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion item END-->
                                    <!-- Accordion item -->
                                    <div class="accordion-item-1 digital-marketing-error">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error">
                                                <div class="col lection-title text-large">
                                                    <img src="{{ asset('assets/img/Marketing.svg') }}">
                                                </div>
                                                <div class="col-auto ms-auto pe-2">
                                                    <span class="green-dot col-auto"></span>
                                                    <span class=col>Активен</span>
                                                </div>
                                            </div>
                                        </button>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body pt-lg-1">
                                                <div class="d-flex justify-content-between pb-4">
                                                    <div class="lection-programirane">
                                                        <span class="">
                                                            Дигитален маркетинг
                                                        </span>
                                                    </div>
                                                    <div class="btn-see row g-0">
                                                        <div class="col-auto">
                                                            <button class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                                                                <div class="row g-0 align-self-center">
                                                                    <div class="col-auto text-start text-small">Виж</div>
                                                                    <div class="col text-end align-items-center d-flex">
                                                                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion item END-->
                                    <!-- Accordion item -->
                                    <div class="accordion-item-1 software-testing-error">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error">
                                                <div class="col lection-title text-large">
                                                    <img src="{{ asset('assets/img/Software.svg') }}">
                                                </div>
                                                <div class="col-auto ms-auto pe-2">
                                                    <span class="green-dot col-auto"></span>
                                                    <span class=col>Активен</span>
                                                </div>
                                            </div>
                                        </button>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body pt-lg-0">
                                                <div class="d-flex justify-content-between pb-4">
                                                    <div class="lection-programirane">
                                                        <span class="">
                                                            Софтуерно тестване
                                                        </span>
                                                    </div>
                                                    <div class="btn-see row g-0">
                                                        <div class="col-auto">
                                                            <button class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                                                                <div class="row g-0 align-self-center">
                                                                    <div class="col-auto text-start text-small">Виж</div>
                                                                    <div class="col text-end align-items-center d-flex">
                                                                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion item END-->

                                </div>
                            </div>
                            <!-- Scroll section END-->
                        </div>
                        <!--First tab END-->
                        <!--Second tab -->
                    </div>
                    <!-- Nav tabs END-->
                </div>
            </div>
        </div>
        <!-- left side END -->
        <!-- right side -->
        <div class="col-xxl pt-5 mt-5 tab-content edit-content pe-5 d-lg-block d-none">
            <!-- Single lection content -->
            <div class="tab-pane fade show active" id="lection-1" role="tabpanel" aria-labelledby="lection-1-tab">
                <div class="row g-0" style="width: 762px;">
                    <div class="col pe-4">
                        <div class="text-name-error text-uppercase">
                            <b>Калин илиев</b>
                            <br>
                            <div class="text-student pt-2">
                                Студент
                            </div>
                        </div>
                    </div>
                    <div class="col-auto pe-3">
                        <div class="social ps-5">
                            <a href="#"><img src="{{ asset('assets/img/facebook1x.png') }}"></a>
                            <a href="#"><img src="{{ asset('assets/img/instagram1x.png') }}"></a>
                            <a href="#"><img src="{{ asset('assets/img/facebook1x.png') }}"></a>
                        </div>
                        <br>
                        <button class="btn-editing-error active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="#" aria-selected="true">
                            <div class="row g-0 align-self-center">
                                <div class="col-auto text-start text-small ps-3">Редактирай</div>
                                <div class="col text-end align-items-center d-flex ps-4">
                                    <img src="{{ asset('assets/img/edit.svg') }}">
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-auto pe-5">
                        <img src="{{ asset('assets/img/avatar2.png') }}" class="avatar-social">
                    </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-auto me-5 text-small-error">
                            <img src="{{ asset('assets/img/location.svg') }}" class="pe-2">
                            Враца
                        </div>
                        <div class="col-auto ms-4">
                            <img src="{{ asset('assets/img/birthday.svg') }}" class="pe-2 ps-2">
                            01.11.1994
                        </div>
                        <div class="col-auto ms-4">
                            <img src="{{ asset('assets/img/email.svg') }}" class="pe-2 pt-2">
                            Kalin.a.iliev@gmail.com
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="name-list-error">
                                <b>За мен</b>
                            </div>
                            <div class="text-xs">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="name-list-error">
                                <b>Образование</b>
                            </div>
                            <div class="text-xs">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-3">
                        <div class="col-6">
                            <div class="name-list-error">
                                <b>Работен опит</b>
                            </div>
                            <div class="text-xs">
                                <b class="one">1.</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            </div>
                            <div class="text-xs mt-4">
                                <b class="one">2.</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="name-list-error">
                                <b>Работен опит</b>
                            </div>
                            <div class="text-xs">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single lection content END-->
        </div>
        <!-- right side END -->
    </div>
</div>
<!-- content END -->
<!-- mobil-->
<div class="col d-lg-none">
    <div class="text-title-md text-uppercase mt-2 mb-2 ms-3">
        <b>Записани курсове</b>
    </div>
    <div class="wrapper d-flex">
        <!-- Accordion item -->
        <div class="accordion-item-mobile programming-error ms-3 me-4">
            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error pt-3">
                <div class="col lection-title text-large">
                    <img src="{{ asset('assets/img/Programirane.svg') }}" class="img-program">
                </div>
                <div class="col-auto ms-auto pe-2 active-lection">
                    <span class="green-dot col-auto"></span>
                    <span class="col">Активен</span>
                </div>
            </div>
            <div class="accordion-body pt-lg-1">
                <div class="d-flex justify-content-between pt-2">
                    <div class="lection-programirane">
                        <span class="">
                            <b>Програмиране</b>
                        </span>
                    </div>
                    <div class="btn-see row g-0">
                        <div class="col-auto">
                            <button class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                                <div class="row g-0 align-self-center">
                                    <div class="col-auto text-start text-small">Виж</div>
                                    <div class="col text-end align-items-center d-flex">
                                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Accordion item END-->
        <!-- Accordion item -->
        <div class="accordion-item-mobile programming-error me-4">
            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error pt-3">
                <div class="col lection-title text-large">
                    <img src="{{ asset('assets/img/Programirane.svg') }}" class="img-program">
                </div>
                <div class="col-auto ms-auto pe-2 active-lection">
                    <span class="green-dot col-auto"></span>
                    <span class="col">Активен</span>
                </div>
            </div>
            <div class="accordion-body pt-lg-1">
                <div class="d-flex justify-content-between pt-2">
                    <div class="lection-programirane">
                        <span class="">
                            <b>Програмиране</b>
                        </span>
                    </div>
                    <div class="btn-see row g-0">
                        <div class="col-auto">
                            <button class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                                <div class="row g-0 align-self-center">
                                    <div class="col-auto text-start text-small">Виж</div>
                                    <div class="col text-end align-items-center d-flex">
                                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Accordion item END-->
        <!-- Accordion item -->
        <div class="accordion-item-mobile programming-error me-4">
            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error pt-3">
                <div class="col lection-title text-large">
                    <img src="{{ asset('assets/img/Programirane.svg') }}" class="img-program">
                </div>
                <div class="col-auto ms-auto pe-2 active-lection">
                    <span class="green-dot col-auto"></span>
                    <span class="col">Активен</span>
                </div>
            </div>
            <div class="accordion-body pt-lg-1">
                <div class="d-flex justify-content-between pt-2">
                    <div class="lection-programirane">
                        <span class="">
                            <b>Програмиране</b>
                        </span>
                    </div>
                    <div class="btn-see row g-0">
                        <div class="col-auto">
                            <button class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                                <div class="row g-0 align-self-center">
                                    <div class="col-auto text-start text-small">Виж</div>
                                    <div class="col text-end align-items-center d-flex">
                                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Accordion item END-->

        <!-- Accordion item -->
        <div class="accordion-item-mobile programming-error me-4">
            <div class="row d-flex w-100 align-items-center g-0 text-start text-active-error pt-3">
                <div class="col lection-title text-large">
                    <img src="{{ asset('assets/img/Programirane.svg') }}" class="img-program">
                </div>
                <div class="col-auto ms-auto pe-2 active-lection">
                    <span class="green-dot col-auto"></span>
                    <span class="col">Активен</span>
                </div>
            </div>
            <div class="accordion-body pt-lg-1">
                <div class="d-flex justify-content-between pt-2">
                    <div class="lection-programirane">
                        <span>
                            <b>Програмиране</b>
                        </span>
                    </div>
                    <div class="btn-see row g-0">
                        <div class="col-auto">
                            <button class="nav btn btn-green active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                                <div class="row g-0 align-self-center">
                                    <div class="col-auto text-start text-small">Виж</div>
                                    <div class="col text-end align-items-center d-flex">
                                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Accordion item END-->
    <div class="input-group mb-3"></div>
    <select class="activ-input text-uppercase text-title-md mb-3 mt-5 ps-3 pe-3" id="inputGroupSelect01">
        <option selected class="active-courses">Активни курсове</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>
<hr class="text-secondary me-3 d-lg-none">
<div class="card-notebook-2 ms-3 mb-5 d-lg-none">
    <div class="row">
        <div class="col-auto notebook-2 d-flex justify-content-between d-flex align-items-center pt-2 mt-1 ps-5">
            <b class="titel-code">CODE WEEK VRATSA</b>
        </div>
        <div class="row pt-4 ps-5 text-large">
            <div class="col-auto pe-5 ">
                <div class="data1 pt-2">10.09.2020</div>
            </div>
            <div class="col-auto">
                <button class="nav btn active py-0 pe-2 ps-2 d-flex btn-code-card" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                    <div class="row g-0 align-self-center">
                        <div class="col-auto text-start text-small ps-2">Виж</div>
                        <div class="col-auto text-end align-items-center d-flex ps-4">
                            <img src="{{ asset('assets/img/action_icon.svg') }}">
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- mobil END-->

@endsection
