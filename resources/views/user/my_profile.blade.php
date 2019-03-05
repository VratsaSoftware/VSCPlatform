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
                <div class="alert alert-success slide-on">
                    <p>{{ session('success') }}</p>
                </div>
            </p>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger slide-on">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <p>
                <div class="alert alert-danger slide-on">
                    <button type="button" class="close" data-dismiss="alert">
                    </button>
                    <p>{{ $message }}</p>
                </div>
            </p>
            @endif
            @if($isInvited)
                <p>
                    <div class="alert alert-success stay">
                    @foreach(Auth::user()->getInvitedEvents() as $event)
                        <a href="{{route('users.events')}}" class="invite-alert">
                      <p>
                          <h4>Нова покана</h4>
                          За влизане в отбор!&nbsp;
                          <span class="event-alert">събитие:{{$event->name}}</span>
                      </p>
                        </a>
                    @endforeach
                    </div>
                </p>
            @endif
            <div class="header d-flex flex-row flex-wrap col-md-12 text-center">
                <div class="col-md-12 text-center loader-wrapper">
                    <img src="./images/loaders/load-16.gif" alt="loading" class="loading-edit">
                </div>
                <div class="col-md-12 header-name d-flex flex-row flex-wrap">
                    <div class="col-md-3 name-wrap">
                        <span class="name">{{Auth::user()->name}} {{Auth::user()->last_name}}</span>
                        <button type="submit" value="submit" class="edit-btn btn btn-success" id="submit-name">
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
                            <button type="submit" value="submit" class="edit-btn btn btn-success" id="submit-picture">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="information-wrap col-md-12 d-flex flex-row flex-wrap">
                    <div class="col-md-2 location-wrap text-left">
                        <img src="./images/profile/location-icon.png" alt="map-icon">
                        <span class="location">{{Auth::user()->location}}</span>
                        <button type="submit" value="submit" class="edit-btn btn btn-success" id="submit-location">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    <div class="col-md-2 birthday-wrap text-left">
                        <img src="./images/profile/birthday-cake-icon.png" alt="birthday-icon">
                        <span class="birthday">{{Auth::user()->dob? Auth::user()->dob->format('d-m-Y'):''}}</span>
                        <button type="submit" value="submit" class="edit-btn btn btn-success" id="submit-dob">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>

                    <div class="col-md-4 mail">
                        <img src="./images/mail-icon.png" alt="mail-icon" class="img-fluid">
                        <span class="mail-txt">{{Auth::user()->email}}</span>
                        <button type="submit" value="submit" class="edit-btn btn btn-success" id="submit-email">
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
                            <a href="#" class="facebook" target=" _blank"><img src="./images/profile/facebook-icon.svg" alt="fb"></a>
                            <p class="edit-social"><input type="text" id="facebook" name="facebook" value=""></p>
                            <a href="#" class="linkedin" target=" _blank"><img src="./images/profile/linkdin-icon.svg" alt="li"></a>
                            <p class="edit-social"><input type="text" id="linkedin" name="linkedin" value=""></p>
                            <a href="#" class="github" target=" _blank"><img src="./images/profile/github-icon.svg" alt="gh"></a>
                            <p class="edit-social"><input type="text" id="github" name="github" value=""></p>
                            <a href="#" class="skype" target=" _blank"><img src="./images/profile/skype-icon.svg" alt="sk"></a>
                            <p class="edit-social"><input type="text" id="skype" name="skype" value=""></p>
                            <a href="#" class="dribbble" target=" _blank"><img src="./images/profile/dribble-icon.svg" alt="dr"></a>
                            <p class="edit-social"><input type="text" id="dribbble" name="dribbble" value=""></p>
                            <a href="#" class="behance" target=" _blank"><img src="./images/profile/behance-icon.svg" alt="be"></a>
                            <p class="edit-social"><input type="text" id="behance" name="behance" value=""></p>
                            @foreach($social_links as $social)

                            <script type="text/javascript">
                                loadSocialSrc('{{$social->SocialName->name}}', '{!! $social->link !!}');
                            </script>

                            @endforeach
                            <button type="submit" value="submit" class="edit-btn btn btn-success social-edit" id="submit-social">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>

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
                        <div class="col-md-5 text-left">
                            @if(!is_null($certificate['Courses']))
                            <span>{{ mb_strtoupper($certificate['Courses']->starts->format('Y-m-d')) }}</span>
                            /
                            <span>{{ mb_strtoupper($certificate['Courses']->ends->format('Y-m-d')) }}</span>
                            @else
                            <span>{{ mb_strtoupper($certificate->started->format('Y-m-d')) }} - {{ mb_strtoupper($certificate->finished->format('Y-m-d')) }}</span>
                            @endif
                        </div>

                        <div class="col-md-7 text-center d-flex flex-row flex-wrap">
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
                        <span class="edit-right-menu edu-edit-options"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        @if(Auth::user()->isVisible('образование'))
                                            <input type="checkbox" class="edu-visibility" checked data-url="{{route('user.section.visibility')}}">
                                        @else
                                            <input type="checkbox" class="edu-visibility" data-url="{{route('user.section.visibility')}}">
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
                            <span class="section-el-bold live-edu edu-y-from">{{$edu->y_from}}&nbsp;/&nbsp;</span><span class="section-el-bold live-edu edu-y-to">{{$edu->y_to}}</span> <br>
                            <input type="number" id="edu_y_from-live" min="1900" max="2099" step="1" name="y_from" class="section-el-bold edit-edu" value="{{$edu->y_from ?? null}}" title="1900-2099"><br />
                            <input type="number" id="edu_y_to-live" min="1900" max="2099" step="1"  name="y_to" class="section-el-bold edit-edu" value="{{$edu->y_to ?? null}}" title="1900-2099"><br />
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
                            </select> <br />

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
                            <input type="text" id="institution_name_live" name="institution_name" value="{{$edu['EduInstitution']->name}}" class="section-el-bold edit-edu institution_name">
                            <p class="suggestion-ins-name"></p>
                            <i class="fas fa-address-card"></i>
                            <span class="live-edu">Специалност :</span>
                            @if(isset($edu['EduSpeciality']->name))
                            <span class="section-el-bold live-edu">{{$edu['EduSpeciality']->name}}</span><br>
                            <input type="text" name="specialty" id="specialty" value="{{$edu['EduSpeciality']->name}}" class="section-el-bold edit-edu specialty">
                            <p class="suggestion-ins-name"></p>
                            @else
                            <span class="section-el-bold live-edu">няма</span><br />
                            <input type="text" name="specialty" id="specialty_live" value="няма" class="section-el-bold edit-edu">
                            @endif
                            <i class="fas fa-comment"></i>
                            <span class="live-edu">Коментар :</span>
                            @if(!empty($edu->description))
                            <span class="section-el-bold live-edu edu-comment">{{$edu->description}}</span>
                            @endif
                            <textarea name="edu_description" id="edu_description" placeholder="{{$edu->description}}" style="overflow:auto;resize:none" rows="5" class="edit-edu" form="edu-form-{{$edu->id}}">{{$edu->description}}</textarea>
                            <p>
                                <button value="запази" class="btn btn-success edit-edu submit-edu"><i class="fas fa-save"></i></button>
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
                            <form action="{{route('create.education')}}" id="edu-form-create-1" name="edu-form" method="POST">
                                {{ csrf_field() }}
                                <i class="far fa-calendar-alt"></i><br />
                                Година от:
                                <input type="number" id="edu_y_from" name="y_from" min="1900" max="2099" class="section-el-bold" value="{{old('y_from')}}" title="1900-2099"><br />
                                Година до:
                                <input type="number" id="edu_y_to" name="y_to" min="1900" max="2099" class="section-el-bold" value="{{old('y_to')}}" title="1900-2099"><br />

                                <i class="fas fa-user-graduate"></i><br />
                                <select id="edu_type_live" name="edu_type" class="section-el-bold">
                                    @forelse ($eduTypes as $type)
                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                    @empty
                                    <option value="0" disabled selected>няма опции</option>
                                    @endforelse
                                </select><br />

                                <i class="fas fa-school"></i><br />
                                <select name="edu_institution_type" id="edu_institution_type_live" class="section-el-bold">
                                    @foreach(Config::get('institutionTypes') as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                </select>

                                <input type="text" name="institution_name" id="institution_name" value="{{old('institution_name')}}" class="section-el-bold institution_name" placeholder="име на институцията..." data-url="{{route('edu.institution')}}">
                                <p class="suggestion-ins-name"></p>

                                <i class="fas fa-address-card"></i><br>
                                <input type="text" name="specialty" id="specialty" value="{{old('specialty')}}" class="section-el-bold specialty" placeholder="специалност..." data-url="{{route('edu.institution')}}">
                                <p class="suggestion-ins-name"></p>

                                <i class="fas fa-comment"></i><br />
                                <textarea name="edu_description" id="edu_description" placeholder="коментар..." style="overflow:auto;resize:none" rows="5" class="section-el-bold" form="edu-form-create-1" value="{{old('edu_description')}}"></textarea>

                                <p><button value="запази" class="btn btn-success"><i class="fas fa-save"></i></button> <button class="btn btn-info edit-edu edu-add-new"><i class="fas fa-plus"></i></button></p>
                            </form>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box work-wrapper">
                    <div class="col-md-12 stats-title">
                        <span>Работен Опит &nbsp;</span>
                        <span class="edit-right-menu work-edit-options"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        @if(Auth::user()->isVisible('работен опит'))
                                            <input type="checkbox" class="work-visibility" checked data-url="{{route('user.section.visibility')}}">
                                        @else
                                            <input type="checkbox" class="work-visibility" data-url="{{route('user.section.visibility')}}">
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
                            <input type="date" id="y_from_work" name="y_from" class="section-el-bold edit-work" value="{{$exp->y_from->format('Y-m-d') ?? null}}"><br />
                            <input type="date" id="y_to_work" name="y_to" class="section-el-bold edit-work" value="{{$exp->y_to->format('Y-m-d') ?? null}}"><br />

                            <i class="fas fa-building"></i>
                            <span><br />Компания :</span><br />
                            <span class="section-el-bold work-company live-work">{{$exp['Company']->name}}</span>
                            <input type="text" name="work_company" id="work_company_live" value="{{$exp['Company']->name}}" class="section-el-bold edit-work"><br />

                            <i class="fas fa-id-card"></i>
                            <span><br />Позиция :</span><br />
                            <span class="section-el-bold work-position live-work">{{$exp['Position']->position}}</span>
                            <input type="text" name="work_position" id="work_position_live" value="{{$exp['Position']->position}}" class="section-el-bold edit-work"><br />

                            <i class="fas fa-align-left"></i>
                            <span><br />Описание :</span><br />
                            @if(!empty($exp->description))
                            <span class="section-el-bold work-description live-work">{{$exp->description}}</span>
                            @endif
                            <textarea name="work_description" id="work_description" placeholder="{{$exp->description}}" style="overflow:auto;resize:none" rows="5" class="edit-work" form="work-form-update-{{$exp->id}}">{{$exp->description}}</textarea>
                            <p>
                                <button value="запази" class="btn btn-success edit-work"><i class="fas fa-save"></i></button>
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
                            <form action="{{route('create.work.experience')}}" id="work-form-create-1" name="work-form-create" method="POST">
                                {{ csrf_field() }}
                                <i class="far fa-calendar-alt"></i><br />
                                Година от:
                                <input type="date" id="y_from" name="y_from" class="section-el-bold" value="{{old('y_from')}}"><br />
                                Година до:
                                <input type="date" id="y_to" name="y_to" class="section-el-bold" value="{{old('y_to')}}"><br />

                                <i class="fas fa-building"></i><br />
                                <input type="text" class="section-el-bold" name="work_company" value="{{old('work_company')}}" id="work_company" placeholder="Компания/Фирма..."><br />

                                <i class="fas fa-id-card"></i><br />
                                <input type="text" class="section-el-bold" name="work_position" value="{{old('work_position')}}" id="work_position" placeholder="Позиция..."><br />

                                <i class="fas fa-align-left"></i><br />
                                <textarea name="description" id="description" placeholder="описание..." style="overflow:auto;resize:none" rows="5" class="section-el-bold" form="work-form-create-1"></textarea><br />

                                <p>
                                    <button value="запази" class="btn btn-success"><i class="fas fa-save"></i></button>
                                    <button class="btn btn-info edit-work work-add-new"><i class="fas fa-plus"></i></button>
                                </p>
                            </form>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-row flex-wrap text-center stats-box-wrap">
                <div class="col-md-12 stats-box interest-wrapper">
                    <div class="col-md-12 stats-title">
                        <span>Интереси &nbsp;</span>
                        <span class="edit-right-menu interests-edit-options"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="col-md-12 flex-row flex-wrap text-right edit-items-wrap">
                            <div class="col-md-5"></div>
                            <div class="col-md-7 d-flex flex-row flex-wrap edit-items text-right">
                                <div class="col-md-8">
                                    <span class="public-switch">Публично видимо</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="switch">
                                        @if(Auth::user()->isVisible('интереси'))
                                        <input type="checkbox" class="interest-visibility" checked data-url="{{route('user.section.visibility')}}">
                                        @else
                                        <input type="checkbox" class="interest-visibility" data-url="{{route('user.section.visibility')}}">
                                        @endif
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <span class="public-switch">Редакция</span>
                                </div>
                                <div class="col-md-4 pencil">
                                    <a href="#" class="int-edit"><i class="fas fa-pencil-alt fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/interest-3.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        @forelse($hobbies as $hobbie)
                        <form action="{{ route('delete.hobbie',$hobbie->id) }}" method="POST" onsubmit="return ConfirmDelete()" id="delete-edu">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <i class="fas fa-bullseye"></i>
                            <br />
                            @if(is_null($hobbie['Interests']))
                            <span class="section-el-bold live-int_others">{{$hobbie->others}}</span>
                            <br />
                            <br />
                            <hr>
                            @else
                            <span class="section-el-bold live-int-type">{{$hobbie['Interests']['Type']->type}}</span>
                            <br />
                            <i class="fas fa-dot-circle"></i>
                            <br />
                            <span class="section-el-bold live-int-name">{{$hobbie['Interests']->name}}</span>
                            <button type="submit" class="btn btn-danger edit-hobbie" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <button class="btn btn-info edit-hobbie hobbie-add-new"><i class="fas fa-plus"></i></button>
                            <hr>
                        </form>
                        @endif

                        @empty
                        <span class="edu hobbies-no-info">Няма въведена информация</span><br>
                        <button class="btn btn-success create-btn-hobbie"><i class="fas fa-plus"></i></button>
                        @endforelse
                        <span class="create-form-hobbies">
                            <form action="{{route('create.hobbies')}}" id="hobbies-form-create" name="hobbies-form-create" method="POST">
                                {{ csrf_field() }}
                                <p>
                                    <i class="fas fa-bullseye"></i>
                                    <p />
                                    <select name="int_type" id="int_type" class="section-el-bold int_type" data-url="{{url('/interest')}}">
                                        <option value="0" disabled selected>Тип/Разновидност</option>
                                        @foreach($interestTypes as $type)
                                        <option value="{{$type->id}}" class="int-type-select">{{$type->type}}</option>
                                        @endforeach
                                    </select><br />

                                    <p>
                                        <i class="fas fa-dot-circle"></i>
                                    </p>
                                    <select name="interests" id="interests" class="interests section-el-bold">

                                    </select>
                                    <p>
                                        <button value="запази" class="btn btn-success"><i class="fas fa-save"></i></button>
                                        <button class="btn btn-info edit-hobbie hobbie-add-new"><i class="fas fa-plus"></i></button>
                                    </p>
                            </form>
                        </span>
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
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/events-2.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        <img src="./images/soon2.png" alt="coming-soon" class="img-fluid responsive soon-sections">
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
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/mentor-program-icon4.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        <img src="./images/soon2.png" alt="coming-soon" class="img-fluid responsive soon-sections">
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
                        </div>
                    </div>

                    <div class="col-md-12 stats-img">
                        <img src="./images/profile/grades-icon3.png" alt="education" class="img-fluid">
                    </div>

                    <div class="col-md-12 stats-text">
                        <img src="./images/soon2.png" alt="coming-soon" class="img-fluid responsive soon-sections">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sliding closing efect on alert messages -->
<script>
    function ConfirmDelete() {
        var x = confirm("Сигурни ли сте че искате да изтриете ?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<!-- //preview picture before saving for profile picture -->
<script src="{{asset('/js/profile-picture-preview.js')}}" charset="utf-8" async></script>

<!-- //visibility of sections check and change -->
<script src="{{asset('/js/profile-visibility-check.js')}}" charset="utf-8" async></script>

<!-- //ajax suggestions for edu section institution and specialty -->
<script src="{{asset('/js/profile-edu-suggestions.js')}}" charset="utf-8" async></script>

<!-- //function to set eye visibility icons on sections -->
<script src="{{asset('/js/profile-initial-visibility-sections.js')}}" charset="utf-8" async></script>

<!-- ajax load interest by type -->
<script src="{{asset('/js/profile-interests-ajax-load.js')}}" charset="utf-8" async></script>

@endsection
