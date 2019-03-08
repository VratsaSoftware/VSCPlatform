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
                            <span class="birthday">{{Auth::user()->dob->format('d-m-Y')}}</span>
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
        <!-- end of user top section -->

        <div class="col-md-12 d-flex flex-row flex-wrap about-me">
    <div class="col-md-7 text-justify about-bio">
        <form class="lecturer-bio" action="{{route('lecturer.update.bio')}}" method="POST" id="lecturer-bio">
            {{ csrf_field() }}

            <span class="bio-title">За мен: <a href="" class="edit-bio"><i class="fas fa-pencil-alt"></i></a></span><br>
            @if(!is_null($lecturer->bio))
                <span class="bio-text">{{$lecturer->bio}}</span>
            @else
                <span class="bio-text"></span>
            @endif
      </form>
    </div>

    <div class="col-md-5 d-flex flex-row flex-wrap text-center bio-courses">
        <div class="col-md-12 bio-courses-title">Преподавал <a href=""><i class="fas fa-pencil-alt"></i></a></div>
        @forelse($courses as $course)
        <!-- courses -->
            <div class="col-md-12 lecturer-course-name">
                <a href="{{route('lecturer.show.course',['course' => $course->id])}}" class="lecturer-past-courses">
                  <span>{{$course->name}} {{$lecturer->created_at->format('Y')}}</span>
                  <img src="./images/profile/tick-icon.png" alt="tick" class="img-fluid">
                </a>
            </div>
        @empty
            Няма курсове
        @endforelse
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

    <!-- //visibility of sections check and change -->
    <script src="{{asset('/js/profile-visibility-check.js')}}" charset="utf-8" async></script>

    <!-- //ajax suggestions for edu section institution and specialty -->
    <script src="{{asset('/js/profile-edu-suggestions.js')}}" charset="utf-8" async></script>

    <!-- //function to set eye visibility icons on sections -->
    <script src="{{asset('/js/profile-initial-visibility-sections.js')}}" charset="utf-8" async></script>

    <!-- ajax load interest by type -->
    <script src="{{asset('/js/profile-interests-ajax-load.js')}}" charset="utf-8" async></script>
@endsection
