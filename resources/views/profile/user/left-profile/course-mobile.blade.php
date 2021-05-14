<div class="col-12 mobile mobile-courses-edit-profile">
    <h2 class="text-uppercase"><span id="status">Записани курсове</span></h2>
    <div class="row g-0">
        <div id="active-courses" class="col section-my-courses d-flex flex-nowrap mobile-courses">
            @if ($courses->count())
                @foreach ($courses as $course)
                    @include('profile.course-mobile', [
                        'courseStatus' => 'active',
                        'course' => $course
                    ])
                @endforeach
            @endif
        </div>
        <div id="past-courses" class="col d-none section-past-courses d-flex flex-nowrap mobile-courses">
            @if ($pastCourses->count())
                @foreach ($pastCourses as $course)
                    @include('profile.course-mobile', [
                        'courseStatus' => 'past',
                        'course' => $course
                    ])
                @endforeach
            @endif
        </div>
        <div class="col section-active-courses d-none d-flex flex-nowrap mobile-courses">
            @if ($activCourses->count())
                @foreach ($activCourses as $course)
                    @include('profile.course-mobile', [
                        'courseStatus' => 'active',
                        'course' => $course,
                        'application' => true
                    ])
                @endforeach
            @endif
        </div>
    </div>
    <div class="col mb-5">
        <div class="position-relative d-inline-block">
            <select class="border-0 form-control position-relative  py-0 text-uppercase" id="tab_selector" style="text-shadow: 0px 0px 0px black;">
                <optgroup label="Мой курсове">
                    <option value="Записани">Записани курсове</option>
                    <option value="Отминали">Отминали курсове</option>
                </optgroup>
                <option value="Активни">Активни курсове</option>
            </select>
            <img src="{{ asset('assets/img/arrow.svg') }}" class="position-absolute">
        </div>
        <hr>
    </div>
        
    <!-- <div class="col upcoming-event">
        <h2 class="fw-bold">CODE WEEK VRATSA</h2>
        <div class="row g-0 d-flex align-items-center">
            <div class="col">
                <span>10.09.2020</span>
            </div>
            <div class="col-auto">
                <button class="btn view-event-btn d-flex py-0 px-3">
                    <div class="row w-100 g-0 align-self-center">
                        <div class="col text-start align-self-center">
                            <span class="fw-bold">Виж</span>
                        </div>
                        <div class="col-auto align-self-center">
                            <img src="assets/icons/action icon.svg" width="20" alt="#">
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div> -->
</div>
