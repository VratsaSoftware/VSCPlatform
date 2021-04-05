<form action="{{ url('lection') }}" method="post" id="lection-delete-file-form-{{ $loop->iteration }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="module" value="{{ $module->Course->id }}">

    <div class="tab-body position-relative">
        <span class="close d-lg-none position-absolute">&times;</span>
        <div class="row pt-lg-0 pt-4 g-0">
            <div class="col-md pe-md-3 me-xl-2">
                <input class="w-100 lection-title-input text-navy-blue" type="text" name="title" placeholder="Заглавие*">
            </div>
            <div class="col-md-auto pe-md-3 me-xl-1">
                <div class="position-relative calendar">
                    <input type="text" name="first_date" class="date-input ext-navy-blue" placeholder="Начало*">
                    <img src="{{ asset('assets/img/arrow.svg') }}">
                </div>
            </div>
            <div class="col-md-auto pe-md-3 me-xl-1">
                <div class="position-relative calendar">
                    <input type="text" name="second_date" class="date-input ext-navy-blue" placeholder="Край*">
                    <img src="{{ asset('assets/img/arrow.svg') }}">
                </div>
            </div>
            <div class="col-auto mx-lg-0 mx-auto">
                <button class="input-button" onclick="return false;">&times;</button>
            </div>
        </div>

        <div class="video-upload row g-0 my-4 position-relative">
            <div class="video-upload-btn position-absolute text-center">
                <label for="video-file-{{ $loop->iteration }}">
                    <img src="{{ asset('assets/img/upload_video.svg') }}" alt="">
                    <div class="text-center fw-bold pt-lg-4 pt-3">
                        Upload
                        <br class="d-lg-block d-none">
                        video
                    </div>
                    <span id="video-file-count-{{ $loop->iteration }}"></span>
                </lable>
            </div>
        </div>

        <input id="video-file-{{ $loop->iteration }}" name="video_file" style="display: none;" type="file">

        <div class="edit-decsription pt-3">
            <textarea name="description" class="p-2" placeholder="Описание на лекцията*"></textarea>
        </div>

        <div class="row g-0 align-items-lg-center lh-1 pb-5">
            <div class="col-12 text-normal py-4">
                Файлове
            </div>
            <div class="col-lg-4 col-auto order-lg-0 order-2">
                <div class="create-lection-files-btn" data-lection-id="{{ $loop->iteration }}">
                    <button id="lection-files-{{ $loop->iteration }}" onclick="return false;" style="padding: 15px 15px;" class="btn-add row g-0 align-items-center">
                        <div class="d-lg-none btn-plus">
                            +
                        </div>
                        <div class="col text-small text-start pe-3 d-lg-block d-none">Добави</div>
                        <div class="col-auto mx-lg-0 mx-auto d-none d-lg-block">
                            <div class="d-inline-block border d-lg-block d-none">
                                <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                            </div>
                        </div>
                    </button>
                </div>

                <select name="fileType" id="file-select-type-{{ $loop->iteration }}" class="create-lection-file-type" style="padding: 5px 15px; width: 180px; height: 45px; border-radius: 15px; display: none; background-color: #f6f9ff;">
                    <option value="">Тип Файл</option>
                    <option value="Презентация">Презентация</option>
                    <option value="Демо">Демо</option>
                    <option value="Домашно">Домашно</option>
                </select>
                <span class="create-lection-select-element"></span>

                <!-- files -->
                <input type="file" id="create-slides-{{ $loop->iteration }}" class="create-lection-slides" name="slides" style="display: none;">
                <input type="file" id="create-demo-{{ $loop->iteration }}" name="demo_file" class="create-lection-demo-file" style="display: none;">
                <input type="file" id="create-homework-{{ $loop->iteration }}" name="homework" class="create-lection-homework" style="display: none;">
            </div>
            <div class="col">
                <div class="row g-0">
                    {{-- @if ($lection->presentation)
                        <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                            <div class="row g-0">
                                <div class="col-lg col-auto text-small align-self-end pe-3">
                                    <a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" download>
                                        @if ($lection->homework_criteria && $lection->presentation && $lection->demo)
                                            Презент.
                                        @else
                                            Презентация
                                        @endif
                                    </a>
                                    <span id="btn-delete-file-slides-{{ $loop->iteration }}" class="btn-delete-file" data-lection-file-id="{{ $loop->iteration }}" data-lection-file-type="Презентация">
                                        <img src="{{ asset('assets/img/Delete.svg') }}">
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($lection->demo)
                        <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                            <div class="row g-0">
                                <div class="col-lg col-auto text-small align-self-end pe-3">
                                    <a href="{{ $lection->demo }}" download>
                                        Демо
                                    </a>
                                    <span id="btn-delete-file-demo-{{ $loop->iteration }}" class="btn-delete-file" data-lection-file-id="{{ $loop->iteration }}" data-lection-file-type="Демо">
                                        <img src="{{ asset('assets/img/Delete.svg') }}">
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($lection->homework_criteria)
                        <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                            <div class="row g-0">
                                <div class="col-lg col-auto text-small align-self-end pe-3">
                                    <a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/homework-'.$lection->id.'/'.$lection->homework_criteria)}}" download>Домашно</a>
                                    <span id="btn-delete-file-homework-{{ $loop->iteration }}" class="btn-delete-file" data-lection-file-id="{{ $loop->iteration }}" data-lection-file-type="Домашно">
                                        <img src="{{ asset('assets/img/Delete.svg') }}">
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif --}}

                    <span class="file-delete-input"></span>
                </div>
            </div>
        </div>

        <div class="row g-0 home-work align-items-center p-3 mt-1">
            <div class="col-lg-3 ps-3 text-normal text-uppercase pe-4">
                <a href="{{ route('homeworks.show',$lection->id) }}">ДОМАШНО</a>
            </div>
            <div class="col pr-3">
                <div class="row g-0 ps-3">
                    <div class="col pe-3 pb-lg-0 pb-2">
                        Краен срок
                        за домашно:
                    </div>
                    <div class="col-auto">
                        <div class="date-pill d-flex align-items-center">
                            <input name="homework_end" type="text" class="text-center fw-bold date-input ext-navy-blue" placeholder="Няма">
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
                            <input name="homework_check_end" class="text-center fw-bold date-input ext-navy-blue" placeholder="Няма">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <div class="row g-0">
            <div class="col-lg col-auto mx-lg-0 mx-auto">
                <div class="delete-lection" data-lection-title="{{ $lection->title }}">
                    <button form="delete-lection-form-{{ $loop->iteration }}" class="ms-xxl-2 mt-xxl-0 mt-3 btn-edit row g-0 align-items-center">
                        <div class="col text-start fw-bold">Изтрий лекция</div>
                        <div class="col-auto">
                            <img src="{{ asset('assets/img/Delete.svg') }}" alt="">
                        </div>
                    </button>
                </div>
            </div>
            <div class="col-auto mx-lg-0 mx-auto">
                <button class="ms-xxl-2 mt-xxl-0 mt-3 btn-edit btn-green row g-0 align-items-center">
                    <div class="col text-start fw-bold">Създай лекция</div>
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/action_icon.svg') }}">
                    </div>
                </button>
            </div>
        </div>
    </div>
</form>
