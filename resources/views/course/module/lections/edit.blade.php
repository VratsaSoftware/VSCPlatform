<form action="{{ url('lection/' . $lection->id) }}" method="post" id="lection-delete-file-form-{{ $loop->iteration }}" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <div class="tab-body position-relative">
        <span class="close d-lg-none position-absolute">&times;</span>
        <div class="row pt-lg-0 pt-4 g-0">
            <div class="col-md pe-md-3 me-xl-2">
                <input class="edit-lection-title w-100 lection-title-input text-navy-blue" type="text" name="title" value="@if (isset($lection->title)){{ $lection->title }}@endif" placeholder="Заглавие*" required>
            </div>
            <div class="col-md-auto pe-md-3 me-xl-1">
                <div class="position-relative calendar">
                    <input type="text" name="first_date" value="@if (isset($lection->first_date)){{ $lection->first_date->format('m/d/Y') }}@endif" class="edit-lection-first_date date-input ext-navy-blue" placeholder="Начало*" required>
                    <img src="{{ asset('assets/img/arrow.svg') }}">
                </div>
            </div>
            <div class="col-md-auto pe-md-3 me-xl-1">
                <div class="position-relative calendar">
                    <input type="text" name="second_date" value="@if (isset($lection->second_date)){{ $lection->second_date->format('m/d/Y') }}@endif" class="edit-lection-second_date date-input ext-navy-blue" placeholder="Край*" required>
                    <img src="{{ asset('assets/img/arrow.svg') }}">
                </div>
            </div>
            <div class="col-auto mx-lg-0 mx-auto">
                <button class="input-button" onclick="return false;">+</button>
            </div>
        </div>

        <div class="edit-btn-video-url video-upload row g-0 my-4 position-relative">
            <div class="video-upload-btn position-absolute text-center">
                <img src="{{ asset('assets/img/upload_video.svg') }}">
                <div class="text-center fw-bold pt-lg-4 pt-3">
                    <span class="video-edit-upload-message">
                        Upload
                        <br class="d-lg-block d-none">
                        video
                    </span>
                    <div class="video-url-edit col-md pe-md-3 me-xl-2" style="display: none">
                        <input class="video-edit-url-input w-60 text-navy-blue" type="url" style="background-color: #f6f9ff; height: 50px;" name="video" placeholder="Видео URL" value="{{ isset($lection->Video->url) ? $lection->Video->url : null }}">
                    </div>
                </div>
            </div>
        </div>
        {{-- @if (isset($lection->Video->url))
            <div class="video-upload row g-0 my-4 position-relative">
    			<iframe width="762" height="375" src="{{ asset('/') . 'data/course-' . $module->Course->id . '/modules-' . $module->id . '/video-' . $lection->id . '/' . $lection->Video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 45px;"></iframe>
    		</div>
        @endif --}}

        {{-- @if (isset($lection->Video->url))
         <video style="border-radius: 45px; max-height: auto; max-width: 100%" frameborder="0" scrolling="yes" controls>
            <source src="{{ asset('/') . 'data/course-' . $module->Course->id . '/modules-' . $module->id . '/video-' . $lection->id . '/' . $lection->Video->url }}" type="video/mp4">
        </video>
        @endif --}}

        <div class="edit-decsription pt-3">
            <textarea name="description" class="edit-lection-description p-2" placeholder="Описание на лекцията" required>{{ $lection->description }}</textarea>
        </div>

        <div class="row g-0 align-items-lg-center lh-1 pb-5">
            <div class="col-12 text-normal py-4">
                Файлове
            </div>
            <div class="col-lg-4 col-auto order-lg-0 order-2">
                <div class="lection-files-btn" data-lection-id="{{ $loop->iteration }}">
                    <button id="lection-files{{ $loop->iteration }}" onclick="return false;" style="padding: 15px 15px;" class="btn-add row g-0 align-items-center">
                        <div class="d-lg-none btn-plus">
                            +
                        </div>
                        <div class="col text-small text-start pe-3 d-lg-block d-none">Добави</div>
                        <div class="col-auto mx-lg-0 mx-auto d-none d-lg-block">
                            <div class="d-inline-block border d-lg-block d-none">
                                <img src="{{ asset('assets/img/plus.svg') }}">
                            </div>
                        </div>
                    </button>
                </div>

                <select name="fileType" id="file-type-{{ $loop->iteration }}" class="file-type" style="padding: 5px 15px; width: 180px; height: 45px; border-radius: 15px; display: none; background-color: #f6f9ff;">
                    <option value="">Тип Файл</option>
                    <option value="Презентация">Презентация</option>
                    <option value="Демо">Демо</option>
                    <option value="Домашно">Домашно</option>
                </select>
                <span class="lection-select-element"></span>

                <!-- files -->
                <input type="file" id="slides-{{ $loop->iteration }}" class="lection-slides" name="slides" style="display: none;">
                <input type="file" id="demo-{{ $loop->iteration }}" name="demo_file" class="lection-demo-file" style="display: none;">
                <input type="file" id="homework-{{ $loop->iteration }}" name="homework" class="lection-homework" style="display: none;">
            </div>
            <div class="col">
                <div class="row g-0">
                    @if ($lection->presentation)
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
                    @endif

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
                            <input name="homework_end" type="text" class="text-center fw-bold date-input ext-navy-blue" value="@if(isset($lection->homework_end)){{ $lection->homework_end->format('m/d/Y') }}@endif" placeholder="Няма">
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
                            <input name="homework_check_end" class="text-center fw-bold date-input ext-navy-blue" value="@if(isset($lection->homework_check_end)){{ $lection->homework_check_end->format('m/d/Y') }}@endif" placeholder="Няма">
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
                <button class="submit-form ms-xxl-2 mt-xxl-0 mt-3 btn-edit btn-green row g-0 align-items-center">
                    <div class="col text-start fw-bold">Запази промените</div>
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                    </div>
                </button>
            </div>
        </div>
    </div>
</form>
