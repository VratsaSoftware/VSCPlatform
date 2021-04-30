@extends('layouts.profile')
@section('title', 'Редактирай профил')

@section('content')
<script src="{{ asset('js/profile/edit.js') }}"></script>
<div id="right-side" class="col-lg pt-md-5 mt-md-4 tab-content edit-content">
    <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data" files="true">
        @method('PUT')
        @csrf
        <div class="row g-0 m-0 p-0">
            @include('flash-message')
            <div class="col-auto">
                <p class="m-0 p-0 text-uppercase student-name">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
                <p class="m-0 p-0 text-uppercase role-name">
                    @if (Auth::user()->isAdmin())
                        Админ
                    @elseif (Auth::user()->isLecturer())
                        Лектор
                    @else
                        Ученик
                    @endif
                </p>
            </div>
            <div class="col">
                <div class="row g-0">
                    <div class="col d-flex flex-column">
                        <div class="row g-0">
                            <div class="col">
                                <ul class="list-inline text-end social-links">
                                    @if ($facebookLink)
                                        <li class="list-inline-item me-3">
                                            <a href="{{ $facebookLink }}">
                                                <img src="{{ asset('images/profile/facebook-icon.svg') }}" alt="#" style="width: 20px">
                                            </a>
                                        </li>
                                    @endif
                                    @if ($linkedinLink)
                                        <li class="list-inline-item me-3">
                                            <a href="{{ $linkedinLink }}">
                                                <img src="{{ asset('images/profile/linkdin-icon.svg') }}" style="width: 20px">
                                            </a>
                                        </li>
                                    @endif
                                    @if ($githubLink)
                                        <li class="list-inline-item me-3">
                                            <a href="{{ $githubLink }}">
                                                <img src="{{ asset('images/profile/github-icon.svg') }}" alt="#" style="width: 20px">
                                            </a>
                                        </li>
                                    @endif
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
                    @if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
                        <img src="{{ asset('images/women-no-avatar.png') }}" alt="profile-pic" style="border-radius: 5px; width: 70px" class="avatar">
                    @elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
                        <img src="{{ asset('images/men-no-avatar.png') }}" alt="profile-pic" style="border-radius: 5px; width: 70px" class="avatar">
                    @else
                        <img src="{{ asset('images/user-pics/'.Auth::user()->picture) }}" alt="profile-pic" style="border-radius: 5px; width: 70px" class="avatar">
                    @endif
                </div>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col mt-5 pt-2 profile-details">
            <div class="row g-0 d-flex align-items-center">
                <div class="col">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/facebook.png') }}" width="30" alt="#">
                        <input type="text" name="facebook" placeholder="Facebook" value="{{ $facebookLink }}">
                    </label>
                </div>
                <div class="col">
                    <label class="d-flex align-items-center input mx-3">
                        <img src="{{ asset('images/profile/linkdin-icon.svg') }}" width="20" alt="#" class="ms-2">
                        <input type="text" name="linkedin" placeholder="Linkedin"
                        value="{{ $linkedinLink }}">
                    </label>
                </div>
                <div class="col">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('images/profile/github-icon.svg') }}" width="20" alt="#" class="ms-2">
                        <input type="text" name="github" placeholder="Github" value="{{ $githubLink }}">
                    </label>
                </div>
            </div>
            <div class="row g-0 mt-5 pt-4 d-flex justify-content-end">
                <div class="col">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/location.svg') }}" width="24" alt="#">
                        <input type="text" name="location" placeholder="Град" value="{{ Auth::user()->location }}"@if(!Auth::user()->isAdmin()) required @endif>
                    </label>
                </div>
                <div class="col">
                    <label class="d-flex align-items-center input mx-3">
                        <img src="{{ asset('assets/icons/birthday.svg') }}" width="30" alt="#">
                        <input type="text" name="dob" class="date-input" placeholder="Дата на раждане"
                        value="{{ !is_null(Auth::user()->dob) ? Auth::user()->dob->format('d/m/Y') : '' }}">
                    </label>
                </div>
                <div class="col">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/email.svg') }}" width="30" alt="#">
                        <input type="email" name="email" placeholder="Електронна поща"
                        value="{{ Auth::user()->email }}">
                    </label>
                </div>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col mt-5 pt-4">
            <div class="row g-0">
                <div class="col">
                    <p class="fw-bold bio-title">За мен</p>
                    <textarea class="bio-description" name="bio" placeholder="За мен">{{ Auth::user()->bio }}</textarea>
                </div>
            </div>
        </form>
        <div class="w-100"></div>
        <div class="col mt-4 pt-3">
            <div class="row g-0">
                <div class="col pe-2 me-5">
                    <p class="fw-bold bio-title">Работен опит</p>
                    <div class="bio-description-large">
                        @foreach ($allWorkExperience as $workExperience)
                            <div class="row g-0">
                                <div class="col-auto pe-3 fw-bold item-number">{{ $loop->iteration }}.</div>
                                <div class="col mb-3 bio-description">
                                    <span style="font-size: 18px">
                                        <div class="col-auto pe-3 fw-bold item-number">{{ $workExperience->Company->name }}</div>
                                        {{ $workExperience->y_from->format('d.m.Y') }}/{{ $workExperience->y_to ? $workExperience->y_to->format('d.m.Y') : 'В ход' }}
                                    </span>
                                </div>
                                <span data-bs-toggle="modal" data-bs-target="#editWorkExperienceModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2 work-experience-btn" data-work-experience="{{ $workExperience }}" data-work-experience-company="{{ $workExperience->Company->name }}" data-work-position="{{ $workExperience->Position->position }}" data-work-y_from="{{ $workExperience->y_from->format('m/d/Y') }}" data-work-y_to="{{ $workExperience->y_to->format('m/d/Y') }}" data-work-id="{{ $workExperience->id }}">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <form method="post" action="{{ url('/user/delete/work/' . $workExperience->id) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn position-absolute bottom-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                </form>
                            </div>
                        @endforeach
                        <span class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
                        data-bs-toggle="modal" data-bs-target="#createWorkExperienceModal">+</span>
                    </div>
                </div>
                <div class="col">
                    <p class="fw-bold bio-title">Интереси</p>
                    <div class="bio-description-large">
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">1.</div>
                            <div class="col mb-3 bio-description">Lorem ipsum
                            </div>
                            <span data-bs-toggle="modal" data-bs-target="#interestsModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </span>
                        </div>
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">2.</div>
                            <div class="col bio-description">Lorem ipsum
                            </div>
                            <span data-bs-toggle="modal" data-bs-target="#interestsModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                <i class="fas fa-pen"></i>
                            </span>
                        </div>
                        <span class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
                        data-bs-toggle="modal" data-bs-target="#interestsModal">+</span>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col pe-2 me-5 mt-4">
                    <p class="fw-bold bio-title">Образование</p>
                    <div class="bio-description-large">
                        @foreach ($allEducation as $education)
                            <div class="row g-0">
                                <div class="col-auto pe-3 fw-bold item-number">{{ $loop->iteration }}.</div>
                                <div class="col mb-3 bio-description">
                                    <span style="font-size: 18px">
                                        <div class="col-auto pe-3 fw-bold item-number">
                                            {{ $education->EduInstitution->name }}
                                        </div>
                                        {{ $education->EduSpeciality->name }} - {{ $education->y_from }}/{{ $education->y_to ? $education->y_to : 'В ход' }}
                                    </span>
                                </div>
                                <span data-bs-toggle="modal" data-bs-target="#educationModal-edit" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <form method="post" action="{{ url('/user/delete/education/' . $education->id) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn position-absolute bottom-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                </form>
                            </div>
                        @endforeach
                        <span class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
                        data-bs-toggle="modal" data-bs-target="#educationModal-create">+</span>
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
    @include('flash-message')
    <form id="user-update-form" action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data" files="true">
        @method('PUT')
        @csrf
        <div class="row g-0 p-0 pb-5 m-0">
            <div class="col-auto">
                <div class="row g-0 p-0 m-0 d-flex align-items-center">
                    <div class="col">
                        @if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
                            <img src="{{ asset('images/women-no-avatar.png') }}" alt="profile-pic" style="border-radius: 5px; width: 70px" class="avatar">
                        @elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
                            <img src="{{ asset('images/men-no-avatar.png') }}" alt="profile-pic" style="border-radius: 5px; width: 70px" class="avatar">
                        @else
                            <img src="{{ asset('images/user-pics/'.Auth::user()->picture) }}" alt="profile-pic" style="border-radius: 5px; width: 70px" class="avatar">
                        @endif
                    </div>
                    <div class="col-auto ps-2 ms-1">
                        <div class="user_name fw-bold d-block">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="role text-xs text-warm-grey d-block">
                            @if (Auth::user()->isAdmin())
                                Админ
                            @elseif (Auth::user()->isLecturer())
                                Лектор
                            @else
                                Ученик
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-end">
                <a href="{{ asset('myProfile') }}">
                    <span class="d-inline-block" id="close-edit-menu">&#10006;</span>
                </a>
            </div>
        </div>
        <div class="col profile-details">
            <div class="row g-0 d-flex align-items-center flex-column">
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/facebook.png') }}" width="30" alt="#">
                        <input type="text" name="facebook" placeholder="Facebook" value="{{ $facebookLink }}">
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('images/profile/linkdin-icon.svg') }}" width="20" alt="#" class="ms-2">
                        <input type="text" name="linkedin" placeholder="Linkedin"
                        value="{{ $linkedinLink }}">
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('images/profile/github-icon.svg') }}" width="20" alt="#" class="ms-2">
                        <input type="text" name="github" placeholder="Github" value="{{ $githubLink }}">
                    </label>
                </div>
            </div>
            <div class="row g-0 pt-4 d-flex justify-content-end flex-column">
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/location.svg') }}" width="24" alt="#">
                        <input type="text" name="location" placeholder="Град" value="{{ Auth::user()->location }}" @if(!Auth::user()->isAdmin()) required @endif>
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/birthday.svg') }}" width="30" alt="#">
                        <input type="text" name="birthdate" class="date-input" placeholder="Дата на раждане" value="01.11.1994">
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
                    <textarea class="bio-description" name="bio">Lorem ipsum
                    </textarea>
                </div>
            </div>
        </form>
        <div class="row g-0 pt-4 flex-column">
            <div class="col pb-2">
                <p class="fw-bold bio-title">Образование</p>
                <div class="bio-description-large">
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">1.</div>
                        <div class="col mb-3 bio-description">Lorem ipsum
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#educationModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">2.</div>
                        <div class="col bio-description">Lorem ipsum
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
                    @foreach($allWorkExperience as $workExperience)
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number">{{ $loop->iteration }}.</div>
                            <div class="col mb-3 bio-description">
                                <span style="font-size: 18px">
                                    <div class="col-auto pe-3 fw-bold item-number">{{ $workExperience->Company->name }}</div>
                                    {{ $workExperience->y_from->format('d.m.Y') }}/{{ $workExperience->y_to ? $workExperience->y_to->format('d.m.Y') : 'В ход' }}
                                </span>
                            </div>
                            <span data-bs-toggle="modal" data-bs-target="#editWorkExperienceModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2 work-experience-btn" data-work-experience="{{ $workExperience }}" data-work-experience-company="{{ $workExperience->Company->name }}" data-work-position="{{ $workExperience->Position->position }}" data-work-y_from="{{ $workExperience->y_from->format('m/d/Y') }}" data-work-y_to="{{ $workExperience->y_to->format('m/d/Y') }}" data-work-id="{{ $workExperience->id }}">
                                <i class="fas fa-pen"></i>
                            </span>
                            <form method="post" action="{{ url('/user/delete/work/' . $workExperience->id) }}">
                                @csrf
                                @method('DELETE')
                                    <button class="btn position-absolute bottom-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                            </form>
                        </div>
                    @endforeach
                    <span class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
                    data-bs-toggle="modal" data-bs-target="#createWorkExperienceModal">+</span>
                </div>
            </div>
            <div class="col">
                <p class="fw-bold bio-title">Интереси</p>
                <div class="bio-description-large">
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">1.</div>
                        <div class="col mb-3 bio-description">Lorem
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#interestsModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                    <div class="row g-0">
                        <div class="col-auto pe-3 fw-bold item-number">2.</div>
                        <div class="col bio-description">Lorem ipsum
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
        <button form="user-update-form" class="btn edit-profile-btn-filled d-flex align-items-center py-0 w-100">
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
@include('profile.work-experience.create')
@include('profile.work-experience.edit')
<!-- Work Experience Modal End -->
<!-- Education Modal -->
@include('profile.education.create')
<!-- Education Modal End -->
<!-- Interests Modal -->
@include('profile.interests.create')
<!-- Interests Modal End -->
<!-- Modals End -->

@endsection