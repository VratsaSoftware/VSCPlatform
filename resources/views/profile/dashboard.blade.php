@extends('layouts.profile')
@section('title', 'Моят Профил')

@section('content')
<div id="right-side" class="col-lg pt-md-5 mt-md-4 tab-content edit-content">
                <div class="row g-0 m-0 p-0">
                    <div class="col-auto">
                        <p class="m-0 p-0 text-uppercase student-name">Калин илиев</p>
                        <p class="m-0 p-0 text-uppercase role-name">Студент</p>
                    </div>
                    <div class="col">
                        <div class="row g-0">
                            <div class="col d-flex flex-column">
                                <div class="row g-0">
                                    <div class="col">
                                        <ul class="list-inline text-end social-links">
                                            <li class="list-inline-item me-3">
                                                <img src="assets/imgs/facebook.png" alt="#">
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <img src="assets/imgs/insta.png" alt="#">
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <img src="assets/imgs/facebook.png" alt="#">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col d-flex justify-content-end">
                                        <button class="btn edit-profile-btn d-flex align-items-center py-0 px-3 me-4">
                                            <div class="row w-100 g-0">
                                                <div class="col text-start">
                                                    <span class="fw-bold">Редактирай</span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center">
                                                    <img src="assets/icons/edit.svg" width="20" alt="#">
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="assets/imgs/avatar_2.png" class="big-avatar" alt="Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col mt-5 pt-2 profile-details">
                        <div class="row g-0 d-flex align-items-center">
                            <div class="col">
                                <img src="assets/icons/location.svg" width="24" alt="#">
                                <span class="ps-3">Враца</span>
                            </div>
                            <div class="col">
                                <img src="assets/icons/birthday.svg" width="30" alt="#">
                                <span class="ps-3">01.11.1994</span>
                            </div>
                            <div class="w-100 separator mt-5 pt-2"></div>
                            <div class="col">
                                <img src="assets/icons/email.svg" width="30" alt="#">
                                <span class="ps-3">Kalin.a.iliev@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col mt-5 pt-4">
                        <div class="row g-0">
                            <div class="col">
                                <p class="fw-bold bio-title">За мен</p>
                                <p class="bio-description">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut
                                    wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                                    dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                                    dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio
                                    dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te
                                    feugait nulla facilisi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col mt-4 pt-3">
                        <div class="row g-0">
                            <div class="col pe-2 me-5">
                                <p class="fw-bold bio-title">Работен опит</p>
                                <div class="row g-0">
                                    <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-briefcase"></i></div>
                                    <div class="col mb-3 bio-description">5+ years as a PHP Developer</div>
                                    <div class="w-100"></div>
                                    <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-building"></i></div>
                                    <div class="col bio-description">VolaSoftware</div>
                                    <div class="w-100"></div>
                                    <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>
                                    <div class="col mb-3 bio-description">2015 - 2019</div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="fw-bold bio-title">Интереси</p>
                                <p class="bio-description">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut
                                    wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                                    dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                                    dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio
                                    dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te
                                    feugait nulla facilisi.
                                </p>
                            </div>
                            <div class="w-100"></div>
                            <div class="col pe-2 me-5 mt-4">
                                <p class="fw-bold bio-title">Образование</p>
                                <div class="row g-0 m-0 p-0">
                                    <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-school"></i></div>
                                    <div class="col mb-3 bio-description">Lorem ipsum dolor sit amet,
                                        consectetuer adipiscing elit,
                                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                        erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                        molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                        eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
                                        zzril delenit augue duis dolore te feugait nulla facilisi.
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>
                                    <div class="col mb-3 bio-description">2015 - 2019</div>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-auto notebook">
                        <div class="row g-0 d-flex align-items-center">
                            <div class="col">
                                Бележник
                            </div>
                            <div class="col-auto">
                                <img src="assets/icons/notebook.svg" width="48" alt="#">
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="row g-0">
                            <div class="col">
                                <p class="fw-bold bio-title">Предстоящо събитие</p>
                            </div>
                            <div class="w-100"></div>
                            <div class="col upcoming-event">
                                <div class="row g-0">
                                    <div class="col">
                                        <p class="text-uppercase event-title pb-4 mb-1">CODE WEEK VRATSA</p>
                                    </div>
                                    <div class="row g-0 d-flex align-items-center">
                                        <div class="col event-info">
                                            <span>10.09.2020</span>
                                            <span class="h-100 vertical-line"></span>
                                            <span>Зала “БОТЕВ”</span>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn view-event-btn d-flex py-0 px-3">
                                                <div class="row w-100 g-0 align-self-center">
                                                    <div class="col text-start fw-bold">
                                                        Виж повече
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <img src="assets/icons/action icon.svg" width="27" alt="#">
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
