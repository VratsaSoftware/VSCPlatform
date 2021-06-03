@extends('layouts.template')
@section('title', 'Форма за кандидатстване')

@section('head')
    <link href="{{ asset('css/applications.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- Mobil -->
            <div class="col-auto d-lg-none">
                <div class="row card-mobil g-0 fw-normal mb-3">
                    <div class="col-lg-auto col-12 comment-avatar">
                        <div class="row g-0 align-items-center">
                            <div class="col fw-bold card-title-application-mobil">
                                <b> Photoshop
                                    <br>
                                    & Illustrator
                                </b>
                            </div>
                            <div class="col-auto me-4">
                                <img src="{{ asset('assets/img/Design.svg') }}" alt="" class="img-design">
                            </div>
                        </div>
                        <div class="row g-0 mt-4">
                            <div class="col pe-lg-0 pe-4 me-xxl-3">
                                <span class="text-small">
                                    <b>Начало:</b>
                                </span>
                                <br>
                                <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">10.09.2020</span>
                            </div>
                            <div class="col-xxl-auto col">
                                <span class="text-small">
                                    <b>Продължителност:</b>
                                </span>
                                <br>
                                <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">10 седмици</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-12 d-flex overflow-hidden">
                        <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                            <div class="row g-0 mt-4">
                                <div class="col-auto pe-lg-0 pe-4 me-xxl-3">
                                    <span class="text-small d-inline-block">
                                        <b>За кого е?</b>
                                    </span>
                                    <br>
                                    <span class="text-small mt-4 d-inline-block">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                                </div>
                                <div class="col-xxl-auto col mt-5">
                                    <span class="text-small d-inline-block">
                                        <b>Условия</b>
                                    </span>
                                    <br>
                                    <span class="text-small mt-4 d-inline-block">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button class="btn-edit comment-toggler btn-white btn-top-mobil row g-0 ">
                            <div class="col text-btn-sm fw-bold">Виж повече</div>
                            <div class="col-auto ms-4">
                                <img src="{{ asset('assets/img/arrow-right-blue.svg') }}" alt="">
                            </div>
                        </button>
                    </div>
                </div>
                <div class="row g-0 mt-4 ms-3 d-flex justify-content-center">
                    <div class="col-auto mt-5 me-3">
                        <div class="card-small-mobil">
                            <img src="{{ asset('assets/img/priem-avatar.png" class="priem-mobil-img') }}">
                        </div>
                    </div>
                    <div class="col-auto ms-3 mt-5">
                        <button class="nav btn btn-green btn-mobile active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                            <div class="text-kermit-green text-priem-sm-mobil pb-2">
                                <b class="pe-3 text-priem-xl-mobil">1.</b>
                                <b class="text-navy-blue">Електронна
                                <br>
                                форма
                                </b>
                            </div>
                        </button>
                        <div class="text-kermit-green text-priem-sm-mobil pb-2">
                            <b class="pe-3 text-priem-xl-mobil">2.</b>
                            <b>Предварителен
                            <br>
                            тест</b>
                        </div>
                        <div class="text-kermit-green text-priem-sm-mobil pb-2">
                            <b class="pe-3 text-priem-xl-mobil">3.</b>
                            <b>Самостоятелна
                            <br>
                            задача</b>
                        </div>
                        <div class="text-kermit-green text-priem-sm-mobil pb-2">
                            <b class="pe-3 text-priem-xl-mobil">4.</b>
                            <b>Интервю</b>
                        </div>
                        <div class="text-navy-blue text-priem-sm-mobil">
                            <b class="pe-3 text-priem-xl-mobil">5.</b>
                            <a href="#" class="text-navy-blue text-priem-sm-mobil"><b>Прием</b></a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <div class="card-mini">
                            <img src="{{ asset('assets/img/Elektronna_forma.svg') }}" class="priem-img">
                        </div>
                    </div>
                    <div class="col-auto mt-5 ms-5">
                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                    </div>
                </div>
            </div>
            <!-- Mobil END-->
            <!-- left side -->
            <div class="col-xl-auto col ps-xxl-0 ps-lg-4 d-none d-lg-block">
                <div class="card">
                    <div class="card-body-application">
                        <div class="row g-0 pb-lg-4 mb-lg-3">
                            <div class="col pt-lg-0 pt-2 mt-lg-0 mt-1">
                                <h2 class="card-title-application text-uppercase m-0">
                                    Photoshop & Illustrator
                                </h2>
                            </div>
                            <div class="col-auto">
                                <img src="{{ asset('assets/img/Design.svg') }}" class="img-design">
                            </div>
                        </div>
                        <div class="tab-content pt-lg-2">
                            <!--First tab-->
                            <div class="tab-pane fade show active" id="module-1" role="tabpanel" aria-labelledby="module-1-tab">
                                <div class="row g-0 pb-4 mb-lg-0 mb-1 pt-lg-0 pt-1">
                                    <div class="col-auto pe-5 me-5">
                                        <div class="text-normal">
                                            Начало:
                                        </div>
                                        <br>
                                        <div class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">10.09.2020</div>
                                    </div>
                                    <div class="col">
                                        <div class="text-normal">
                                            Продължителност:
                                        </div>
                                        <br>
                                        <div class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">10 седмици</div>
                                    </div>
                                </div>
                                <div class="row g-0 mt-5">
                                    <div class="col-10">
                                        <div class="text-normal">
                                            За кого е?
                                        </div>
                                        <div class="mt-3 text-grey ">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</div>
                                    </div>
                                </div>
                                <div class="row g-0 mt-5">
                                    <div class="col-10">
                                        <div class="text-normal">
                                            Условия
                                        </div>
                                        <div class="mt-3 text-grey">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</div>
                                    </div>
                                </div>
                                <div class="row g-0 mt-4">
                                    <div class="col-auto mt-5 me-3">
                                        <div class="card-small-electro">
                                            <img src="{{ asset('assets/img/priem-avatar.png') }}" class="electro-avatar-img">
                                        </div>
                                    </div>
                                    <div class="col-auto ms-3 mt-5">
                                        <div class=" row g-0 text-kermit-green text-priem-sm pb-2">
                                            <div class="col-auto">
                                                <b class="pe-3 text-priem-xl">1.</b>
                                            </div>
                                            <div class="col">
                                                <b>Електронна
                                            форма
                                                    </b>
                                            </div>

                                        </div>
                                        <div class="text-kermit-green text-priem-sm pb-2">
                                            <b class="pe-3 text-priem-xl">2.</b>
                                            <b>Предварителен
                                            <br>
                                            тест</b>
                                        </div>
                                        <div class="text-kermit-green text-priem-sm pb-2">
                                            <b class="pe-3 text-priem-xl">3.</b>
                                            <b>Самостоятелна
                                            <br>
                                            задача</b>
                                        </div>
                                        <div class="text-kermit-green text-priem-sm pb-2">
                                            <b class="pe-3 text-priem-xl">4.</b>
                                            <b>Интервю</b>
                                        </div>
                                        <div class="text-grey text-priem-sm">
                                            <b class="pe-3 text-priem-xl">5.</b>
                                            <b>Прием</b>
                                        </div>
                                    </div>
                                    <div class="col-auto d-none d-lg-block">
                                        <div class="card-mini">
                                            <img src="{{ asset('assets/img/Elektronna_forma.svg') }}" class="priem-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--First tab END-->
                        </div>
                        <!-- Nav tabs END-->
                    </div>
                </div>
            </div>
            <!-- left side END -->
        </div>
    </div>
    <!-- right side -->
    <div id="right-side" class="col-xl pt-md-5 mt-md-4 tab-content edit-content">
        <!-- Single lection content -->
        <div class="tab-pane module-right fade show active mt-xl-2 pt-xl-1" id="lection-1" role="tabpanel" aria-labelledby="lection-1-tab">
            <div class="tab-body-electronic position-relative">
                <span class="close d-lg-none position-absolute">&times;</span>
                <div class="row g-0 d-lg-none">
                    <div class="col">
                        <div class="text-title-module">
                            <b>Електронна форма</b>
                            <br>
                            <p class="text-title-module-sm d-lg-none">Photoshop & illustrator</p>
                        </div>
                    </div>
                </div>
                <div class="row g-0 d-flex justify-content-center">
                    <div class="col-auto d-lg-none mt-5 mb-5">
                        <img src="{{ asset('assets/img/Elektronna_forma.svg') }}">
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-auto title-electonic mt-3 d-none d-lg-block">
                        1. ЕЛЕКТРОННА ФОРМА
                    </div>
                    <div class="row g-0">
                        <div class="col-auto star-elect mt-4 d-none d-lg-block">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="col-auto text-info-elect mt-4 ms-4 d-none d-lg-block">
                            Информация взета от профила
                        </div>
                    </div>
                    <div class="row g-0 module-top">
                        <div class="col form-app-position">
                                <input type="text" class="form-module form-elec-input me-lg-5 mb-4-input me-3-input" placeholder="Име и фамилия" aria-label="Име на модула" aria-describedby="addon-wrapping">
                                <input type="text" class="form-module form-elec-input mb-4-input mt-lg-0 mt-4" placeholder="Телефон" aria-label="Име на модула" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="row g-0 module-top">
                        <div class="col form-app-position">
                                <input type="text" class="form-module form-elec-input me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" placeholder="Имейл" aria-label="Име на модула" aria-describedby="addon-wrapping">
                                <input type="text" class="form-module form-elec-input mb-4-input mt-lg-0 mt-4" placeholder="Възраст" aria-label="Име на модула" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-auto star-elect mt-5 d-none d-lg-block">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="col-auto text-info-elect-blue mt-5 ms-4 d-none d-lg-block">
                            Информация взета от профила
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-4">
                        <div class="col form-app-position">
                            <select class="form-elec-input form-select-app me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" id="inputGroupSelect01">
                              <option selected>Направление</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                            <input type="text" class="form-module form-elec-input mb-4-input mt-lg-0 mt-4" placeholder="Занимание" aria-label="Име на модула" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-auto col me-lg-1 mt-4 me-3-input">
                            <div class="form-info-titel">
                                <b>Защо смятате, че тези обучения са подходящ за Вас?</b>
                            </div>
                            <div class="col-lg-auto col form-app-position">
                                <textarea class="form-textarel-elec mt-5 mb-4-input me-3-input" placeholder="100-500" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-auto col ms-elect mt-4">
                            <div class="form-info-titel">
                                <b>Защо смятате, че тези обучения са подходящ за Вас?</b>
                            </div>
                            <div class="col-lg-auto col form-app-position">
                                <textarea class="form-textarel-elec mb-4-input mt-5" placeholder="100-500" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-auto col mt-4 me-3-input">
                            <div class="form-info-titel">
                                <b>Защо смятате, че тези обучения са подходящ за Вас?</b>
                            </div>
                            <div class="col-lg-auto col form-app-position">
                                <textarea class="form-textarel-elec mt-5 me-lg-1 mb-4-input me-3-input" placeholder="100-500" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-auto col ms-elect mt-4">
                            <div class="form-info-titel ">
                                <b>Защо смятате, че тези обучения са подходящ за Вас?</b>
                            </div>
                            <div class="col-lg-auto col form-app-position">
                                <textarea class="form-textarel-elec mb-4-input mt-5" placeholder="100-500" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Single lection content END-->
    </div>
    <!-- right side END -->
@endsection
