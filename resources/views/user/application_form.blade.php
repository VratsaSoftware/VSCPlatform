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
                                <label for="">информацията е взета от профила ви</label>
                            </p>
                            <form action="{{route('application.store')}}" method="POST" class="col-md-12" id="application" name="application" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <p>
                                <label for="username">Име</label>
                                @if(!is_null($user->name) && !empty($user->name))
                                    <input type="text" name="username" value="{{$user->name}}" disabled class="small-field-register"><br />
                                @else
                                    <input type="text" name="username" value="" class="small-field-register"><br />
                                @endif
                            </p>
                            <p>
                                <label for="userlastname">Фамилия</label>
                                @if(!is_null($user->last_name) && !empty($user->last_name))
                                    <input type="text" name="userlastname" value="{{$user->last_name}}" disabled class="small-field-register"><br/>
                                @else
                                    <input type="text" name="username" value="" class="small-field-register"><br />
                                @endif
                            </p>
                            <p>
                                <label for="useremail">Е-Mail</label>
                                <input type="text" name="useremail" value="{{$user->email}}" disabled class="small-field-register">
                            </p>
                            <p>
                                <label for="phone">Телефон</label>
                                @if(!is_null($user->phone) && !empty($user->last_name))
                                    <input type="number" name="phone" value="{{$user->phone}}" disabled class="small-field-register">
                                @else
                                    <input type="number" name="phone" value="{{old('phone')}}" class="small-field-register phone-input">
                                @endif
                            </p>
                            <p>
                                <label for="useremail">Възраст</label>
                                @if(!is_null($user->dob))
                                    <input type="text" name="userage" value="{{(\Carbon\Carbon::now()->format('Y') - $user->dob->format('Y'))}}" disabled class="small-field-register">
                                @else
                                    <input type="text" name="userage" value="{{old('userage')}}" placeholder="въведете години..." class="small-field-register">
                                @endif
                            </p>
                            <p>
                                <label for="occupation">Занимание</label><br>
                                <select class="occupation section-el-bold" name="occupation" id="occupation">
                                    @foreach ($occupations as $occupation)
                                        @if(!is_null($user->cl_occupation_id) && $user->cl_occupation_id == $occupation->id)
                                            <option value="{{$occupation->id}}" selected>{{$occupation->occupation}}</option>
                                        @else
                                            <option value="{{$occupation->id}}">{{$occupation->occupation}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="course">Направление</label><br/>
                                <select class="section-el-bold" name="course">
                                    @foreach(Config::get('applicationForm.courses') as $course)
                                            <option value="{{$course}}">{{ucfirst($course)}}</option>
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
                                            <option value="{{$use}}">{{ucfirst($use)}}</option>
                                    @endforeach
                                </select>
                            </p>

                            <p>
                                <label for="source">От къде научихте за това обучение?</label><br/>
                                <select class="section-el-bold" name="source">
                                    @foreach(Config::get('applicationForm.source') as $source)
                                            <option value="{{$source}}">{{ucfirst($source)}}</option>
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