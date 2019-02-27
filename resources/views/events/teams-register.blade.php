@extends('layouts.template')
@section('title', 'Събития')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                @if ($errors->any())
                    <div class="alert alert-danger alert-on-course">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-12 text-center picture-title">
                    Лого на Екипа
                </div>
                <form action="{{route('course.store')}}" method="POST" class="col-md-12" id="create_course" name="create_course" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="col-md-12 picture-holder text-center">
                    <label for="picture">
                        <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                        <br>
                    </label>
                </div>

                <div class="col-md-12 picture-button text-center">
                    <label class="picture-label" for="picture-course-title"><span class="upload-pic">качи<input type="file" id="picture-course-title" name="picture" onChange="CourseimagePreview(this);"></span></label>
                </div>

                <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                    <div class="col-md-12 text-center">
                        <p>
                            <label for="name">Име на Екип</label><br>
                            <input type="text" id="name" name="name" placeholder="..." class="name-course" value="{{old('name')}}">
                        </p>
                        <p>
                            <label for="team_category">Категория</label><br>
                            <select class="team_category section-el-bold" name="team_category" id="team_category">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label for="technologyStack">Технологии</label><br>
                            <select class="technologyStack section-el-bold" name="technologyStack" id="technologyStack">
                                @foreach ($stacks as $stack)
                                    <option value="{{$stack}}">{{$stack}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label for="git">Github</label><br>
                            <input type="text" id="git" name="git" placeholder="на организация или член от отбора" class="name-course" value="{{old('git')}}">
                        </p>
                        <p>
                            <label for="slogan">Мото</label><br>
                            <input type="text" id="slogan" name="slogan" placeholder="мото на отбора" class="name-course" value="{{old('slogan')}}">
                        </p>
                        <p>
                            <label for="inspiration">Технология или изобретение от 21-ви век, която ви вдъхновява (по желание):</label><br>
                            <textarea id="inspiration" cols="30" rows="5" name="inspiration" placeholder="Facebook, StackOverflow, Wikipedia, Tesla..." style="resize: none;">{{old('inspiration')}}</textarea>
                        </p>
                        <p>
                            <label for="team-capacity">Участници остават {{$event->max_team - 1}}</label>
                        </p>
                        <p>
                            <label for="team-capacity">Капитан:</label><br/>
                            <label for="username">Име</label><input type="text" name="username" value="{{$user->name}}" disabled class="small-field-register"><br />
                            <label for="userlastname">Фамилия</label><input type="text" name="userlastname" value="{{$user->last_name}}" disabled class="small-field-register"><br/>
                            <label for="useremail">Е-Mail</label><input type="text" name="useremail" value="{{$user->email}}" disabled class="small-field-register">
                            @if(!is_null($user->dob))
                                <label for="useremail">Възраст</label><input type="text" name="userage" value="{{(\Carbon\Carbon::now()->format('Y') - $user->dob->format('Y'))}}" disabled class="small-field-register">
                            @else
                                <label for="userage">Възраст</label><input type="text" name="userage" value="" placeholder="въведете години..." class="small-field-register">
                            @endif
                            <label for="occupation">Занимание</label><br>
                            <select class="occupation section-el-bold" name="occupation" id="occupation">
                                @foreach ($occupations as $occupation)
                                    <option value="{{$occupation->id}}">{{$occupation->occupation}}</option>
                                @endforeach
                            </select><br>
                            <label for="shirt_size">Размер Тениска</label><br>
                            <select class="shirt_size section-el-bold" name="shirt_size" id="shirt_size">
                                @foreach ($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
