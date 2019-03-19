@extends('layouts.template')
@section('title', 'Форма за кандидатстване')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-on-course slide-on" style="margin-top:-5vw;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-12 text-center" style="margin-top:7vw;">
                        <p>
                            <p>
                                <label for="">След формата, ще бъдете регистрирани в платформата, и от профила си ще може да следите прогреса на кандидатстване<br/>
                                <i style="font-size:1vw;">на пощата ви ще получите писмо с линк към задаване на парола на акаунта си в платформата</i>
                                </label>
                            </p>
                            <form action="{{route('application.store')}}" method="POST" class="col-md-12" id="application" name="application" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <p>
                                <label for="username">Име</label>

                                <input type="text" name="username" value="{{old('username')}}" class="small-field-register"><br />
                            </p>
                            <p>
                                <label for="userlastname">Фамилия</label>
                                <input type="text" name="lastname" value="{{old('lastname')}}" class="small-field-register"><br />
                            </p>
                            <p>
                                <label for="useremail">Е-Mail</label>
                                <input type="text" name="useremail" value="{{old('useremail')}}" class="small-field-register">
                            </p>
                            <p>
                                <label for="phone">Телефон</label>
                                    <input type="number" name="phone" value="{{old('phone')}}" class="small-field-register phone-input">
                            </p>
                            <p>
                                <label for="useremail">Възраст</label>
                                    <input type="text" name="userage" value="{{old('userage')}}" placeholder="въведете години..." class="small-field-register">
                            </p>
                            <p>
                                <label for="occupation">Занимание</label><br>
                                <select class="occupation section-el-bold" name="occupation" id="occupation">
                                    @foreach ($occupations as $occupation)
                                            <option value="{{$occupation->id}}" {{ (old("occupation") == $occupation->id ? "selected":"") }}>{{$occupation->occupation}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="course">Направление</label><br/>
                                <select class="section-el-bold" name="course">
                                    @foreach(Config::get('applicationForm.courses') as $course)
                                            <option value="{{$course}}" {{ (old("course") == $course ? "selected":"") }}>{{ucfirst($course)}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="suitable_candidate">Защо смятате, че тези обучения са подходящ за Вас?</label>
                                <textarea name="suitable_candidate" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('suitable_candidate')}}</textarea>
                            </p>
                            <p>
                                <label for="suitable_training">Защо смятате, че именно Вие сте подходящ за ИТ обучение?</label>
                                <textarea name="suitable_training" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('suitable_training')}}</textarea>
                            </p>
                            <p>
                                <label for="accompliments">Опишете 3 постижения, с които се гордеете (може да са в личен, професионален план или свързани с учене).</label>
                                <textarea name="accompliments" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('accompliments')}}</textarea>
                            </p>
                            <p>
                                <label for="expecatitions">Какви са очакванията Ви за това обучение? </label>
                                <textarea name="expecatitions" rows="8" cols="80" placeholder="между 100 и 500 символа" class="section-el-bold">{{old('expecatitions')}}</textarea>
                            </p>
                            <p>
                                <label for="use">Как смятате да използвате наученото от това обучение?</label><br/>
                                <select class="section-el-bold" name="use">
                                    @foreach(Config::get('applicationForm.use') as $use)
                                            <option value="{{$use}}" {{ (old("use") == $use ? "selected":"") }}>{{ucfirst($use)}}</option>
                                    @endforeach
                                </select>
                            </p>

                            <p>
                                <label for="source">От къде научихте за това обучение?</label><br/>
                                <select class="section-el-bold" name="source">
                                    @foreach(Config::get('applicationForm.source') as $source)
                                            <option value="{{$source}}" {{ (old("source") == $source ? "selected":"") }}>{{ucfirst($source)}}</option>
                                    @endforeach
                                </select>
                            </p>

                            <p>
                                <label for="cv">Автобиография</label>
                                <input type="file" name="cv" value="">
                            </p>
                            <br />
                            <p>
                                <div class="col-md-12 create-course-button text-center">
                                        <a href="#" onclick="javascript:$('#application').submit()" class="create-course-btn"><span class="create-course">Кандидаствай</span></a>
                                </div>
                            </p>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
