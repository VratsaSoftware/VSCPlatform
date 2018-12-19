@extends('layouts.template')
@section('title', 'Моят Профил')
@section('content')
<div class="content-wrap">
    <div class="section">
        <form action="{{ route('user.update',Auth::user()->id) }}" method="post" id="update_user" enctype="multipart/form-data" files="true">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            @if (!empty(Session::get('success')))
            <p>
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            </p>

            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <p>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <p>{{ $message }}</p>
                </div>
            </p>
            @endif
            <div class="header d-flex flex-row flex-wrap col-md-12 text-center">
                <div class="col-md-12 text-center loader-wrapper">
                    <img src="./images/loaders/load-16.gif" alt="loading" class="loading-edit">
                </div>
                <div class="col-md-12 header-name d-flex flex-row flex-wrap">
                    <div class="col-md-3 name-wrap">
                        <span class="name">{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->last_name)}}</span>
                        <button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </button></div>
                    <div class="col-md-6 header-pic">
                        <div class="col-md-12">
                            @if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
                            <img src="{{asset('images/women-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                            @elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
                            <img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
                            @else
                            <img src="{{asset('images/user-pics/'.Auth::user()->picture)}}" alt="profile-pic" class="profile-pic">
                            @endif
                            <button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="information-wrap col-md-12 d-flex flex-row flex-wrap">
                    <div class="col-md-2 location-wrap text-left">
                        <img src="./images/profile/location-icon.png" alt="map-icon">
                        <span class="location">{{ucfirst(Auth::user()->location)}}</span>
                        <button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    <div class="col-md-2 birthday-wrap text-left">
                        <img src="./images/profile/birthday-cake-icon.png" alt="birthday-icon">
                        <span class="birthday">{{ucfirst(Auth::user()->dob)}}</span>
                        <button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>

                    <div class="col-md-4 mail">
                        <img src="./images/mail-icon.png" alt="mail-icon" class="img-fluid">
                        <span class="mail-txt">{{Auth::user()->email}}</span>
                        <button type="submit" name="submit" value="submit" class="edit-btn btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    <script type="text/javascript">
                        function loadSocialSrc(name, link) {
                            $('.' + name).attr('href', link);
                            $('#' + name).val(link);
                        }
                    </script>
                    <div class="col-md-4 header-contacts text-right">
                        <div class="col-md-12">
                            <a href="#" class="facebook"><img src="./images/profile/facebook-icon.svg" alt="fb"></a>
                            <p class="edit-social"><input type="text" id="facebook" name="facebook" value=""></p>
                            <a href="#" class="linkedin"><img src="./images/profile/linkdin-icon.svg" alt="li"></a>
                            <p class="edit-social"><input type="text" id="linkedin" name="linkedin" value=""></p>
                            <a href="#" class="github"><img src="./images/profile/github-icon.svg" alt="gh"></a>
                            <p class="edit-social"><input type="text" id="github" name="github" value=""></p>
                            <a href="#" class="skype"><img src="./images/profile/skype-icon.svg" alt="sk"></a>
                            <p class="edit-social"><input type="text" id="skype" name="skype" value=""></p>
                            <a href="#" class="dribbble"><img src="./images/profile/dribble-icon.svg" alt="dr"></a>
                            <p class="edit-social"><input type="text" id="dribbble" name="dribbble" value=""></p>
                            <a href="#" class="behance"><img src="./images/profile/behance-icon.svg" alt="be"></a>
                            <p class="edit-social"><input type="text" id="behance" name="behance" value=""></p>
                            @foreach($social_links as $social)
                            @if($social->SocialName->name == 'facebook')
                            <script type="text/javascript">
                                loadSocialSrc('facebook', '{!! $social->link !!}');
                            </script>
                            @elseif($social->SocialName->name == 'linkedin')
                            <script type="text/javascript">
                                loadSocialSrc('linkedin', '{!! $social->link !!}');
                            </script>
                            @elseif($social->SocialName->name == 'github')
                            <script type="text/javascript">
                                loadSocialSrc('github', '{!! $social->link !!}');
                            </script>
                            @elseif($social->SocialName->name == 'skype')
                            <script type="text/javascript">
                                loadSocialSrc('skype', '{!! $social->link !!}');
                            </script>
                            @elseif($social->SocialName->name == 'dribbble')
                            <script type="text/javascript">
                                loadSocialSrc('dribbble', '{!! $social->link !!}');
                            </script>
                            @elseif($social->SocialName->name == 'behance')
                            <script type="text/javascript">
                                loadSocialSrc('behance', '{!! $social->link !!}');
                            </script>
                            @endif
                            @endforeach

                        </div>
                        <button type="submit" name="submit" value="submit" class="edit-btn btn btn-success social-edit">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- certifications boxes -->
    <div class="section">
        <div class="courses col-md-12 d-flex flex-row flex-wrap justify-content-between">
            @forelse($certificates as $certificate)
            <div class="col-md-6 left-card d-flex flex-row flex-wrap text-center">
                <div class="col-md-12 left-card-wrap">
                    <div class="col-md-12 left-title">
                        @if(!is_null($certificate['Courses']))
                        <span>{{ mb_strtoupper($certificate['Courses']->name) }}</span>
                        @else
                        <span>{{ mb_strtoupper($certificate->course_name) }}</span>
                        @endif
                        <span class="title-icons">
                            <img src="./images/profile/tick-icon.png" alt="tick" class="img-fluid">
                        </span>
                        <span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-subtitle">
                        <span>Сертификат за успешно завършено обучение по</span>
                    </div>

                    <div class="col-md-12 left-bold">
                        <br />
                        @if(!is_null($certificate['Courses']))
                        <span>{{ mb_strtoupper($certificate['Courses']->name) }}</span>
                        @else
                        <span>{{ mb_strtoupper($certificate->course_name) }}</span>
                        @endif
                    </div>

                    <div class="col-md-12 left-stats d-flex flex-row flex-wrap">
                        <div class="col-md-4 text-left">
                            @if(!is_null($certificate['Courses']))
                            <span>{{ mb_strtoupper($certificate['Courses']->starts->format('Y-m-d')) }}</span>
                            <br />
                            <span>{{ mb_strtoupper($certificate['Courses']->ends->format('Y-m-d')) }}</span>
                            @else
                            <span>{{ mb_strtoupper($certificate->started->format('Y-m-d')) }} - {{ mb_strtoupper($certificate->finished->format('Y-m-d')) }}</span>
                            @endif
                        </div>

                        <div class="col-md-8 text-center d-flex flex-row flex-wrap">
                            @forelse ($certificate['Courses']['Lecturers'] as $lecturer)
                            <span class="col-md-8 text-right">Лектор:</span>
                            <span class="col-md-4 text-right" style="padding:0"> {{$lecturer['User']->name}} {{$lecturer['User']->last_name}}</span>
                            <br />
                            @empty
                            <span></span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>


            @empty

            @endforelse
        </div>
    </div>

    <div class="section">
        <div class="stats col-md-12 d-flex flex-row flex-wrap justify-content-between">
            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box edu-wrapper">
                    <div class="col-md-12 stats-title">
                        <span>Образование &nbsp;</span>
                        <span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        @if(Auth::user()->isVisible('образование'))
                                        <input type="checkbox" class="edu-visibility" checked>
                                        @else
                                        <input type="checkbox" class="edu-visibility">
                                        @endif
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href="" class="education-edit"><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/edu-1.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        @forelse ($education as $edu)
                        <form action="{{route('update.education')}}" id="edu-form-{{$edu->id}}" name="edu-form" method="POST" class="update_form">
                            {{ csrf_field() }}
                            <input type="hidden" name="edu_id" value="{{$edu->id}}">
                            <i class="far fa-calendar-alt"></i><br />
                            <span class="section-el-bold live-edu edu-y-from">{{$edu->y_from->format('Y-m-d')}}&nbsp;/&nbsp;</span><span class="section-el-bold live-edu edu-y-to">{{$edu->y_to->format('Y-m-d')}}</span> <br>
                            <input type="date" id="y_from" name="y_from" class="section-el-bold edit-edu" value="{{$edu->y_from->format('Y-m-d') ?? null}}"><br />
                            <input type="date" id="y_to" name="y_to" class="section-el-bold edit-edu" value="{{$edu->y_to->format('Y-m-d') ?? null}}"><br />
                            <i class="fas fa-user-graduate"></i>
                            <span class="live-edu">{{$edu['EduType']->type}}</span> <br>
                            <select id="edu_type" name="edu_type" class="section-el-bold edit-edu">
                                @forelse ($eduTypes as $type)
                                @if($edu->cl_education_type_id === $type->id)
                                <option value="{{$type->id}}" selected>{{$type->type}}</option>
                                @else
                                <option value="{{$type->id}}">{{$type->type}}</option>
                                @endif
                                @empty
                                <option value="0" disabled selected>няма опции</option>
                                @endforelse
                            </select>

                            <i class="fas fa-school"></i>
                            <span class="section-el-bold live-edu">{{$edu['EduInstitution']->type}} <br /> {{ucwords($edu['EduInstitution']->name)}}</span><br>
                            <select name="edu_institution_type" id="edu_institution_type" class="section-el-bold edit-edu">
                                @foreach(Config::get('institutionTypes') as $type)
                                @if((string)$edu['EduInstitution']->type === (string)$type)
                                <option value="{{$type}}" selected>{{$type}}</option>
                                @else
                                <option value="{{$type}}">{{$type}}</option>
                                @endif
                                @endforeach
                            </select>
                            <input type="text" id="institution_name" name="institution_name" value="{{$edu['EduInstitution']->name}}" class="section-el-bold edit-edu institution_name">
                            <p class="suggestion-ins-name"></p>
                            <i class="fas fa-address-card"></i>
                            <span class="live-edu">Специалност :</span>
                            @if(isset($edu['EduSpeciality']->name))
                            <span class="section-el-bold live-edu">{{$edu['EduSpeciality']->name}}</span><br>
                            <input type="text" name="specialty" id="specialty" value="{{$edu['EduSpeciality']->name}}" class="section-el-bold edit-edu specialty">
                            <p class="suggestion-ins-name"></p>
                            @else
                            <span class="section-el-bold live-edu">няма</span><br />
                            <input type="text" name="specialty" id="specialty" value="няма" class="section-el-bold edit-edu">
                            @endif
                            <i class="fas fa-comment"></i>
                            <span class="live-edu">Коментар :</span>
                            <span class="section-el-bold live-edu edu-comment">{{$edu->description}}</span>
                            <textarea name="edu_description" id="edu_description" placeholder="{{$edu->description}}" style="overflow:auto;resize:none" rows="5" class="edit-edu" form="edu-form-{{$edu->id}}">{{$edu->description}}</textarea>
                            <p>
                                <button id="submit" name="submit" value="запази" class="btn btn-success edit-edu submit-edu"><i class="fas fa-save"></i></button>
                                <button class="btn btn-info edit-edu edu-add-new"><i class="fas fa-plus"></i></button>
                            </p>
                        </form>
                        <form action="{{ route('delete.education',$edu->id) }}" method="POST" onsubmit="return ConfirmDelete()" id="delete-edu">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger edit-edu" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <hr>
                        @empty
                        <span class="edu edu-no-info">Няма въведена информация</span><br>
                        <button class="btn btn-success create-btn"><i class="fas fa-plus"></i></button>
                        @endforelse
                        <span class="create-form">
                            <form action="{{route('create.education')}}" id="edu-form-create-{{$edu->id}}" name="edu-form" method="POST">
                                {{ csrf_field() }}
                                Година от:
                                <input type="date" id="y_from" name="y_from" class="section-el-bold" value="{{old('y_from')}}"><br />
                                Година до:
                                <input type="date" id="y_to" name="y_to" class="section-el-bold" value="{{old('y_to')}}"><br />

                                <select id="edu_type" name="edu_type" class="section-el-bold">
                                    @forelse ($eduTypes as $type)
                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                    @empty
                                    <option value="0" disabled selected>няма опции</option>
                                    @endforelse
                                </select>

                                <select name="edu_institution_type" id="edu_institution_type" class="section-el-bold">
                                    @foreach(Config::get('institutionTypes') as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                </select>

                                <input type="text" name="institution_name" id="institution_name" value="{{old('institution_name')}}" class="section-el-bold institution_name" placeholder="име на институцията...">
                                <p class="suggestion-ins-name"></p>

                                <input type="text" name="specialty" id="specialty" value="{{old('specialty')}}" class="section-el-bold specialty" placeholder="специалност...">
                                <p class="suggestion-ins-name"></p>

                                <textarea name="edu_description" id="edu_description" placeholder="коментар..." style="overflow:auto;resize:none" rows="5" class="section-el-bold" form="edu-form-create-{{$edu->id}}" value="{{old('edu_description')}}"></textarea>

                                <p><button id="submit" name="submit" value="запази" class="btn btn-success"><i class="fas fa-save"></i></button> <button class="btn btn-info edit-edu edu-add-new"><i class="fas fa-plus"></i></button></p>
                            </form>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box work-wrapper">
                    <div class="col-md-12 stats-title">
                        <span>Работен Опит &nbsp;</span>
                        <span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        @if(Auth::user()->isVisible('работен опит'))
                                        <input type="checkbox" class="work-visibility" checked>
                                        @else
                                        <input type="checkbox" class="work-visibility">
                                        @endif
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href="#" class="work-edit"><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/work-2.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        @forelse ($workExp as $exp)
                        <form action="{{route('update.work.experience')}}" id="work-form-update-{{$exp->id}}" name="work-form-update" method="POST" class="update_form_work">
                            {{ csrf_field() }}
                            <input type="hidden" name="work_id" value="{{$exp->id}}">
                            <i class="far fa-calendar-alt"></i><br />
                            <span class="section-el-bold work-years live-work">{{$exp->y_from->format('Y-m-d')}}&nbsp;/&nbsp;</span><span class="section-el-bold live-work">{{$exp->y_to->format('Y-m-d')}}</span><br />
                            <input type="date" id="y_from" name="y_from" class="section-el-bold edit-work" value="{{$exp->y_from->format('Y-m-d') ?? null}}"><br />
                            <input type="date" id="y_to" name="y_to" class="section-el-bold edit-work" value="{{$exp->y_to->format('Y-m-d') ?? null}}"><br />

                            <i class="fas fa-building"></i><br />
                            <span class="section-el-bold work-company live-work">{{ucfirst($exp['Company']->name)}}</span>
                            <input type="text" name="work_company" id="work_company" value="{{$exp['Company']->name}}" class="section-el-bold edit-work">

                            <i class="fas fa-id-card"></i>
                            <span class="live-work"><br />Позиция :</span><br />
                            <span class="section-el-bold work-position live-work">{{$exp['Position']->position}}</span>
                            <input type="text" name="work_position" id="work_position" value="{{$exp['Position']->position}}" class="section-el-bold edit-work"><br />

                            <i class="fas fa-align-left"></i>
                            <span class="live-work"><br />Описание :</span><br />
                            <span class="section-el-bold work-description live-work">{{$exp->description}}</span>
                            <textarea name="work_description" id="work_description" placeholder="{{$exp->description}}" style="overflow:auto;resize:none" rows="5" class="edit-work" form="work-form-update-{{$exp->id}}">{{$exp->description}}</textarea>
                            <p>
                                <button id="submit" name="submit" value="запази" class="btn btn-success edit-work"><i class="fas fa-save"></i></button>
                                <button class="btn btn-info edit-work work-add-new"><i class="fas fa-plus"></i></button>
                            </p>
                        </form>
                        <form action="{{ route('delete.work.experience',$exp->id) }}" method="POST" onsubmit="return ConfirmDelete()" id="delete-edu">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger edit-work" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <hr>
                        @empty
                        <span class="edu work-no-info">Няма въведена информация</span><br>
                        <button class="btn btn-success create-btn-work"><i class="fas fa-plus"></i></button>
                        @endforelse
                        <span class="create-form-work">
                            <form action="{{route('create.work.experience')}}" id="work-form-create-{{$exp->id}}" name="work-form-create" method="POST">
                                {{ csrf_field() }}
                                Година от:
                                <input type="date" id="y_from" name="y_from" class="section-el-bold" value="{{old('y_from')}}"><br />
                                Година до:
                                <input type="date" id="y_to" name="y_to" class="section-el-bold" value="{{old('y_to')}}"><br />

                                <input type="text" class="section-el-bold" name="work_company" value="{{old('work_company')}}" id="work_company" placeholder="Компания/Фирма...">

                                <input type="text" class="section-el-bold" name="work_position" value="{{old('work_position')}}" id="work_position" placeholder="Позиция...">

                                <textarea name="description" id="description" placeholder="описание..." style="overflow:auto;resize:none" rows="5" class="section-el-bold" form="work-form-create-{{$exp->id}}"></textarea><br />

                                <p>
                                    <button id="submit" name="submit" value="запази" class="btn btn-success"><i class="fas fa-save"></i></button>
                                    <button class="btn btn-info edit-work work-add-new"><i class="fas fa-plus"></i></button>
                                </p>
                            </form>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box">
                    <div class="col-md-12 stats-title">
                        <span>Интереси</span>
                        <span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href=""><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/interest-3.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        <span>JavaScript<br> CSS</span><br />
                        <span>Football <br> Плуване</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box">
                    <div class="col-md-12 stats-title">
                        <span>Събития</span>
                        <span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href="#"><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/events-icon.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        <img src="./images/soon.png" alt="coming-soon" class="img-fluid responsive soon-sections">
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box">
                    <div class="col-md-12 stats-title">
                        <span>Менторска Програма</span>
                        <span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href="#"><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/mentor-program-icon.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        <img src="./images/soon.png" alt="coming-soon" class="img-fluid responsive soon-sections">
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box">
                    <div class="col-md-12 stats-title">
                        <span>Бележник</span>
                        <span class="edit-right-menu"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href="#"><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/grades-icon.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        <img src="./images/soon.png" alt="coming-soon" class="img-fluid responsive soon-sections">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        setTimeout(function() {
            $('.alert').toggle("slide");
        }, 4000);
    });
</script>

<script type="text/javascript">
    function imagePreview(input) {
        var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            alert('Файлът трябва да е картинка/снимка!');
        }
    }
</script>
<script>
    function ConfirmDelete() {
        var x = confirm("Сигурни ли сте че искате да изтриете ?");
        if (x)
            return true;
        else
            return false;
    }
</script>
<script type="text/javascript">
    $('.edu-visibility').on('change', function() {
        var isChecked = $(this).is(":checked");
        visibilityIcons('образование', isChecked);
        ajaxVisibility('образование', isChecked);
    });

    $('.work-visibility').on('change', function() {
        var isChecked = $(this).is(":checked");
        visibilityIcons('работен опит', isChecked);
        ajaxVisibility('работен опит', isChecked);
    });
</script>
<script>
    function ajaxVisibility(type, visibility) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/user/change/section/visibility',
            data: {
                type: type,
                visibility: visibility
            },
            success: function(data, textStatus, xhr) {
                if (xhr.status == 200) {
                    //success
                }
            }
        });
    }
</script>

<script type="text/javascript">
    $('.institution_name').bind('input keypress mouseenter', function() {
        var inputval = $(this).val();
        var input = $(this);
        inputval = inputval.length;
        var type = 'institution';
        // console.log(inputval);
        if (inputval > 3) {
            getSuggestions(input, inputval, type, $(this).val());
        }

        $('.auto-ins-name').on('click', function() {
            $(this).prev('.institution_name').val($(this).text());
        });

        $('.auto-ins-name').bind('mouseleave mouseout focusout', function() {
            $(this).parent().html('');
        });
    });

    $('.institution_name').keyup(function() {
        var inputval = $(this).val();
        inputval = inputval.length;
        var input = $(this);
        var type = 'institution';
        // getSuggestions(input, inputval, type, $(this).val());
        if (!$(this).val() && inputval < 1 && inputval == 0) {
            $(this).next('.suggestion-ins-name').html('');
        }
    });

    //specialties suggestions
    $('.specialty').bind('input keypress mouseenter', function() {
        var inputval = $(this).val();
        var input = $(this);
        inputval = inputval.length;
        var type = 'specialty';
        // console.log(inputval);
        if (inputval > 3) {
            getSuggestions(input, inputval, type, $(this).val());
        }

        $('.auto-ins-name-specialty').on('click', function() {
            $(this).parent().prev('.specialty').val($(this).text());
        });

        $('.auto-ins-name-specialty').bind('mouseleave mouseout focusout', function() {
            $(this).parent().html('');
        });
    });

    $('.specialty').keyup(function() {
        var inputval = $(this).val();
        inputval = inputval.length;
        var input = $(this);
        var type = 'specialty';
        // getSuggestions(input, inputval, type, $(this).val());
        if (!$(this).val() && inputval < 1 && inputval == 0) {
            $(this).next('.suggestion-ins-name').html('');
        }
    });

    //ajax call for suggestions accepts the input who needs suggestion, length of the letters, type of information, and the string to search for
    function getSuggestions(input, inputLength, type, search) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: '/user/education/autocomplete',
            data: {
                search: search,
                type: type
            },
            success: function(data, textStatus, xhr) {
                // console.log(data);

                if (data.length > 0 && inputLength > 0 && inputLength !== 0) {
                    input.next('.suggestion-ins-name').html('');
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            if (input.is(":focus")) {
                                if (input.hasClass('institution_name')) {
                                    input.next('.suggestion-ins-name').append('<p class="auto-ins-name">' + v + '</p>');
                                    $('.auto-ins-name').on('click', function() {
                                        input.val($(this).text());
                                    });
                                } else {
                                    input.next('.suggestion-ins-name').append('<p class="auto-ins-name-specialty">' + v + '</p>');
                                    $('.auto-ins-name-specialty').on('click', function() {
                                        input.val($(this).text());
                                    });
                                }
                            }
                        });
                    });
                } else {
                    input.next('.suggestion-ins-name').html('');
                }
            }
        });
    }
</script>

//calling the function for eye visibility icons loading
<script type="text/javascript">
    $(function() {
        var eduVis = $('.edu-visibility').is(":checked");
        var workVis = $('.work-visibility').is(":checked");
        visibilityIcons('образование', eduVis);
        visibilityIcons('работен опит', workVis)
    });
</script>

//function to set eye visibility icons on sections
<script type="text/javascript">
    function visibilityIcons(tag, isChecked) {
        switch (tag) {
            case 'образование':
                $('.edu-wrapper').stop().fadeTo(100, 0.3, function() {
                    $(this).fadeTo(500, 1.0);
                });
                if (isChecked) {
                    $('.edu-wrapper > .stats-title > span:first-child').find('i').remove();
                    $('.edu-wrapper > .stats-title > span:first-child').append('<i class="fas fa-eye"></i>');
                } else {
                    $('.edu-wrapper > .stats-title > span:first-child').find('i').remove();
                    $('.edu-wrapper > .stats-title > span:first-child').append('<i class="fas fa-eye-slash"></i>');
                }
                break;
            case 'работен опит':
                $('.work-wrapper').stop().fadeTo(100, 0.3, function() {
                    $(this).fadeTo(500, 1.0);
                });
                if (isChecked) {
                    $('.work-wrapper > .stats-title > span:first-child').find('i').remove();
                    $('.work-wrapper > .stats-title > span:first-child').append('<i class="fas fa-eye"></i>');
                } else {
                    $('.work-wrapper > .stats-title > span:first-child').find('i').remove();
                    $('.work-wrapper > .stats-title > span:first-child').append('<i class="fas fa-eye-slash"></i>');
                }
                break;
            default:

        }
    }
</script>
@endsection