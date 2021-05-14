<div class="course">
    <div class="row g-0">
        <div class="col-auto">
            @include ('profile.course-icon', [
                'type' => $course->training_type
            ])
        </div>
        @if ($courseStatus == 'active')
            <div class="col text-end">
                <span class="fw-bold course-status-active">Активен</span>
            </div>
        @else
            <div class="col text-end">
                <span class="fw-bold course-status-past">Отминал</span>
            </div>
        @endif
    </div>
    <div class="row g-0 mt-4 d-flex align-items-center">
        <div class="col">
            <p class="m-0 p-0 pe-4 course-title fw-bold">{{ $course->name }}</p>
        </div>
        <div class="col-auto">
            <button onclick="window.location.href='{{ asset($course->Modules->Count() ? 'module/' . $course->Modules[0]->id . '/edit/' : '#') }}'" class="btn view-course-btn d-flex py-0 px-3">
                <div class="row w-100 g-0 align-self-center">
                    <div class="col text-start">
                        <span class="fw-bold">Виж</span>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <img src="{{ asset('assets/icons/action icon.svg') }}" width="27" alt="#">
                    </div>
                </div>
            </button>
        </div>
    </div>
</div>