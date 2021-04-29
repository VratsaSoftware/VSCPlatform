@extends('layouts.profile')
@section('title', 'Редактирай профил')

@section('content')
<script src="{{ asset('js/profile/edit.js') }}"></script>
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
                                    <img src="{{ asset('images/profile/facebook-icon.svg') }}" alt="#" style="width: 20px">
                                </li>
                                <li class="list-inline-item me-3">
                                    <img src="{{ asset('images/profile/linkdin-icon.svg') }}" style="width: 20px">
                                </li>
                                <li class="list-inline-item me-3">
                                    <img src="{{ asset('images/profile/github-icon.svg') }}" alt="#" style="width: 20px">
                                </li>
                            </ul>
                        </div>
                        <div class="w-100"></div>
                        <div class="col d-flex justify-content-end">
                            <button
                            class="btn edit-profile-btn-filled d-flex align-items-center py-0 px-3 me-4">
                            <div class="row w-100 g-0">
                                <div class="col text-center">
                                    <span class="fw-bold">Запази промени</span>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <img src="{{ asset('assets/img/avatar.png') }}" class="big-avatar" alt="Avatar" style="width: 70px">
            </div>
        </div>
    </div>
    <div class="w-100"></div>
    <div class="col mt-5 pt-2 profile-details">
        <div class="row g-0 d-flex align-items-center">
            <div class="col">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/facebook.png') }}" width="30" alt="#">
                    <input type="text" name="facebook" placeholder="Facebook" value="FB/Kalin_Iliev">
                </label>
            </div>
            <div class="col">
                <label class="d-flex align-items-center input mx-3">
                    <img src="{{ asset('images/profile/linkdin-icon.svg') }}" width="20" alt="#">
                    <input type="text" name="instagram" placeholder="Instagram"
                    value="Instagram/Kalin_Iliev">
                </label>
            </div>
            <div class="col">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('images/profile/github-icon.svg') }}" width="20" alt="#">
                    <input type="text" name="facebook" placeholder="Facebook" value="FB/Kalin_Iliev">
                </label>
            </div>
        </div>
        <div class="row g-0 mt-5 pt-4 d-flex justify-content-end">
            <div class="col">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/location.svg') }}" width="24" alt="#">
                    <input type="text" name="location" placeholder="Град" value="Враца">
                </label>
            </div>
            <div class="col">
                <label class="d-flex align-items-center input mx-3">
                    <img src="{{ asset('assets/icons/birthday.svg') }}" width="30" alt="#">
                    <input type="text" name="birthdate" placeholder="Дата на раждане"
                    value="01.11.1994">
                </label>
            </div>
            <div class="col">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/email.svg') }}" width="30" alt="#">
                    <input type="text" name="email" placeholder="Електронна поща"
                    value="Kalin.a.iliev@gmail.com">
                </label>
            </div>
        </div>
    </div>
    <div class="w-100"></div>
    <div class="col mt-5 pt-4">
        <div class="row g-0">
            <div class="col">
                <p class="fw-bold bio-title">За мен</p>
                <textarea class="bio-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut
                    wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                    dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio
                    dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te
                    feugait nulla facilisi.
                </textarea>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col mt-4 pt-3">
            <div class="row g-0">
                <div class="col pe-2 me-5">
                    <p class="fw-bold bio-title">Работен опит</p>
                    <div class="bio-description-large">
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">1.</div>
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
                            <butto data-bs-toggle="modal" data-bs-target="#workExperienceModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">2.</div>
                            <div class="col bio-description">Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
                                zzril delenit augue duis dolore te feugait nulla facilisi.
                            </div>
                            <butto data-bs-toggle="modal" data-bs-target="#workExperienceModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <button class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
                        data-bs-toggle="modal" data-bs-target="#workExperienceModal">+</button>
                    </div>
                </div>
                <div class="col">
                    <p class="fw-bold bio-title">Интереси</p>
                    <div class="bio-description-large">
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">1.</div>
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
                            <button data-bs-toggle="modal" data-bs-target="#interestsModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">2.</div>
                            <div class="col bio-description">Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
                                zzril delenit augue duis dolore te feugait nulla facilisi.
                            </div>
                            <button data-bs-toggle="modal" data-bs-target="#interestsModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <button class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
                        data-bs-toggle="modal" data-bs-target="#interestsModal">+</button>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col pe-2 me-5 mt-4">
                    <p class="fw-bold bio-title">Образование</p>
                    <div class="bio-description-large">
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">1.</div>
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
                            <button data-bs-toggle="modal" data-bs-target="#educationModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">2.</div>
                            <div class="col bio-description">Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
                                zzril delenit augue duis dolore te feugait nulla facilisi.
                            </div>
                            <button data-bs-toggle="modal" data-bs-target="#educationModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <button class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
                        data-bs-toggle="modal" data-bs-target="#educationModal">+</button>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Mobile Profile Edit Menu -->
<div class="col-12 mobile-profile-edit">
    <div class="row g-0 p-0 pb-5 m-0">
        <div class="col-auto">
            <div class="row g-0 p-0 m-0 d-flex align-items-center">
                <div class="col">
                    <img src="{{ asset('assets/img/avatar.png') }}" width="55" alt="Avatar">
                </div>
                <div class="col-auto ps-2 ms-1">
                    <div class="user_name fw-bold d-block">
                        Ставри
                    </div>
                    <div class="role text-xs text-warm-grey d-block">
                        Учител
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-flex align-items-center justify-content-end">
            <span class="d-inline-block" id="close-edit-menu">&#10006;</span>
        </div>
    </div>
    <div class="col profile-details">
        <div class="row g-0 d-flex align-items-center flex-column">
            <div class="col pb-2">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/facebook.png') }}" width="30" alt="#">
                    <input type="text" name="facebook" placeholder="Facebook" value="FB/Kalin_Iliev">
                </label>
            </div>
            <div class="col pb-2">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/insta.png') }}" width="30" alt="#">
                    <input type="text" name="instagram" placeholder="Instagram" value="Instagram/Kalin_Iliev">
                </label>
            </div>
            <div class="col pb-2">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/facebook.png') }}" width="30" alt="#">
                    <input type="text" name="facebook" placeholder="Facebook" value="FB/Kalin_Iliev">
                </label>
            </div>
        </div>
        <div class="row g-0 pt-4 d-flex justify-content-end flex-column">
            <div class="col pb-2">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/location.svg') }}" width="24" alt="#">
                    <input type="text" name="location" placeholder="Град" value="Враца">
                </label>
            </div>
            <div class="col pb-2">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/birthday.svg') }}" width="30" alt="#">
                    <input type="text" name="birthdate" placeholder="Дата на раждане" value="01.11.1994">
                </label>
            </div>
            <div class="col pb-2">
                <label class="d-flex align-items-center input">
                    <img src="{{ asset('assets/icons/email.svg') }}" width="30" alt="#">
                    <input type="text" name="email" placeholder="Електронна поща"
                    value="Kalin.a.iliev@gmail.com">
                </label>
            </div>
        </div>
        <div class="row g-0 pt-4 flex-column">
            <div class="col pb-2">
                <p class="fw-bold bio-title">За мен</p>
                <textarea class="bio-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut
                    wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                    dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio
                    dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te
                    feugait nulla facilisi.
                </textarea>
            </div>
            <div class="col pb-2">
                <p class="fw-bold bio-title">Образование</p>
                <div class="bio-description-large">
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">1.</div>
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
                        <button data-bs-toggle="modal" data-bs-target="#educationModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">2.</div>
                        <div class="col bio-description">Lorem ipsum dolor sit amet, consectetuer
                            adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                            erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                            molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                            eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
                            zzril delenit augue duis dolore te feugait nulla facilisi.
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#educationModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <button class="bio-pill position-absolute bottom-0 start-0 m-2 p-0" data-bs-toggle="modal"
                    data-bs-target="#educationModal">+</button>
                </div>
            </div>
            <div class="col pb-2">
                <p class="fw-bold bio-title">Работен опит</p>
                <div class="bio-description-large">
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">1.</div>
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
                        <button data-bs-toggle="modal" data-bs-target="#workExperienceModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">2.</div>
                        <div class="col bio-description">Lorem ipsum dolor sit amet, consectetuer
                            adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                            erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                            molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                            eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
                            zzril delenit augue duis dolore te feugait nulla facilisi.
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#workExperienceModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <!-- Modal Open Button -->
                    <button class="bio-pill position-absolute bottom-0 start-0 m-2 p-0" data-bs-toggle="modal"
                    data-bs-target="#workExperienceModal">+</button>
                </div>
            </div>
            <div class="col">
                <p class="fw-bold bio-title">Интереси</p>
                <div class="bio-description-large">
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">1.</div>
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
                        <button data-bs-toggle="modal" data-bs-target="#interestsModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">2.</div>
                        <div class="col bio-description">Lorem ipsum dolor sit amet, consectetuer
                            adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                            erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                            molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                            eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
                            zzril delenit augue duis dolore te feugait nulla facilisi.
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#interestsModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <button class="bio-pill position-absolute bottom-0 start-0 m-2 p-0" data-bs-toggle="modal"
                    data-bs-target="#interestsModal">+</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Save Button -->
    <div class="col mt-2">
        <button class="btn edit-profile-btn-filled d-flex align-items-center py-0 w-100">
            <div class="row w-100 g-0">
                <div class="col text-center">
                    <span class="fw-bold">Запази промени</span>
                </div>
            </div>
        </button>
    </div>
</div>

<!-- Modals Start -->
<!-- Work Experience Modal -->
<div class="modal fade" id="workExperienceModal" tabindex="-1" aria-labelledby="workExperienceModal"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Работен опит
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column" action="#" method="POST" onsubmit="return false;">
                    <div class="mb-3">
                        <label for="workCompany" class="form-label">Работодател</label>
                        <input type="text" class="form-control" id="workCompany" placeholder="VolaSoftware">
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">От</span>
                        <input type="text" class="form-control" placeholder="2015">
                        <span class="input-group-text">До</span>
                        <input type="text" class="form-control" placeholder="2019">
                    </div>
                    <div class="mb-3">
                        <label for="workPosition" class="form-label">Длъжност</label>
                        <input type="text" class="form-control" id="workPosition" placeholder="Junior Developer">
                    </div>
                    <button class="btn align-self-end btn-navy-blue mt-2 col-4">Запази</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Work Experience Modal End -->
<!-- Education Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="educationModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Образование
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column" action="#" method="POST" onsubmit="return false;">
                    <div class="mb-3">
                        <label for="schoolInput" class="form-label">Учебно заведение</label>
                        <input type="text" class="form-control" id="schoolInput"
                        placeholder="ППМГ 'Акад. Иван Ценов'">
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">От</span>
                        <input type="text" class="form-control" placeholder="2015">
                        <span class="input-group-text">До</span>
                        <input type="text" class="form-control" placeholder="2019">
                    </div>
                    <div class="mb-3">
                        <label for="schoolSpecialty" class="form-label">Специалност</label>
                        <input type="text" class="form-control" id="schoolSpecialty" placeholder="Информатика">
                    </div>
                    <button class="btn align-self-end btn-navy-blue mt-2 col-4">Запази</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Education Modal End -->
<!-- Interests Modal -->
<div class="modal fade" id="interestsModal" tabindex="-1" aria-labelledby="interestsModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Интереси
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column" action="#" method="POST" onsubmit="return false;">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Интереси" id="interests"
                        style="height: 100px"></textarea>
                        <label for="interests">Интереси</label>
                    </div>
                    <button class="btn align-self-end btn-navy-blue mt-2 col-4">Запази</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Interests Modal End -->
<!-- Modals End -->
@endsection
