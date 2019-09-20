@extends('layouts.template')
@section('title', 'Регистрация за CodeWeek')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 create-team-rules" style="margin-top:16vw">
                    <p>Описание: {!!$event->description!!} </p>
                    <p>Правила: {!!$event->rules!!} </p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-on-course slide-on">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('events.cw.form',['event' => $event->id])}}" method="POST" class="col-md-12"
                      id="cw-reg" name="cw-reg">
                    {{ csrf_field() }}

                    <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                        <div class="col-md-12 text-center">
                            <p>
                                <label for="">част от информацията е взета от профила ви</label>
                            </p>
                            <p>
                                <label for="username">Име <span class="req-star-form">*</span></label>
                                @if(!is_null($user->name) && !empty($user->name))
                                    <input type="text" name="username" value="{{$user->name}}" disabled
                                           class="small-field-register"><br/>
                                @else
                                    <input type="text" name="username" value="" class="small-field-register"><br/>
                                @endif

                                <label for="userlastname">Фамилия <span class="req-star-form">*</span></label>
                                @if(!is_null($user->last_name) && !empty($user->last_name))
                                    <input type="text" name="userlastname" value="{{$user->last_name}}" disabled
                                           class="small-field-register"><br/>
                                @else
                                    <input type="text" name="username" value="" class="small-field-register"><br/>
                                @endif
                                <label for="useremail">Е-Mail <span class="req-star-form">*</span></label>
                                <input type="text" name="useremail" value="{{$user->email}}" disabled
                                       class="small-field-register">
                                <label for="useremail">Възраст <span class="req-star-form">*</span></label>
                                @if(!is_null($user->dob))
                                    <input type="text" name="userage"
                                           value="{{(\Carbon\Carbon::now()->format('Y') - $user->dob->format('Y'))}}"
                                           disabled class="small-field-register">
                                @else
                                    <input type="text" name="userage" value="" placeholder="въведете години..."
                                           class="small-field-register">
                                @endif
                            </p>
                            <p>
                                <label for="occupation">Занимание <span class="req-star-form">*</span></label><br>
                                <select class="occupation section-el-bold" name="occupation" id="occupation">
                                    @foreach ($occupations as $occupation)
                                        @if(!is_null($user->cl_occupation_id) && $user->cl_occupation_id == $occupation->id)
                                            <option value="{{$occupation->id}}"
                                                    selected>{{$occupation->occupation}}</option>
                                        @else
                                            <option value="{{$occupation->id}}" {{ (old("occupation") == $occupation->id ? "selected":"") }}>{{$occupation->occupation}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="visited">Участвали ли сте преди на CodeWeek? <span class="req-star-form">*</span></label>
                                <select name="visited" id="visited">
                                    <option value="0" {{old('visited')?'':'selected'}} disabled>---</option>
                                    <option value="да" {{old('visited') == 'да'?'selected':''}}>да</option>
                                    <option value="не" {{old('visited') == 'не'?'selected':''}}>не</option>
                                </select>
                            </p>
                            <p>
                                <label for="days">Искате ли да участвате в съзтезанията <span class="req-star-form">*</span></label>
                                <br/>
                                <select name="days" class="section-el-bold {{old('days')?'show':''}}" id="days">
                                    <option value="null" {{old('days')?'':'selected'}} disabled>--</option>
                                    <option value="1" {{old('days') == '1'?'selected':''}}>да</option>
                                    <option value="0" {{old('days') == '0'?'selected':''}}>не</option>
                                </select>
                            </p>
                            <p id="cat-wrapp">
                                <label for="categories">Категории</label>
                                <br/>
                                <select class="section-el-bold js-example-basic-multiple" name="categories[]" id="categories" multiple="multiple" style="width:100%">
                                    @foreach(Config::get('cwCategories') as $category)
                                        @if (old('categories'))
                                            @if (in_array($category, old('categories')))
                                                <option value="{{ $category }}" selected>{{ $category }}</option>
                                            @else
                                                <option value="{{ $category }}">{{ $category }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 create-course-button text-center">
                        <a href="#" onclick="javascript:$('#cw-reg').submit()" class="create-course-btn"><span
                                    class="create-course">Регистрирай</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                closeOnSelect: false
            });
        });
    </script>
    <script>
        $(function(){
            if(!$('#days').hasClass('show')){
                $('#cat-wrapp').hide();
            }
        });

        $('#days').change(function () {
            var selected = this.value;
            if(this.value == 1 || this.value == '1'){
                $('#cat-wrapp').stop(true, true).fadeIn().show();
            }else{
                $('#cat-wrapp').stop(true, true).fadeOut().hide();
            }
        });
    </script>
@endsection
