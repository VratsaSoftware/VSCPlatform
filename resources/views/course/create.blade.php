@extends('layouts.template')
@section('title', 'Създай Курс')
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
                    Заглавна Снимка
                </div>
                <form action="{{route('course.store')}}" method="POST" class="col-md-12" id="create_course" name="create_course" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="col-md-12 picture-holder text-center">
                    <label for="picture">
                        <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                        <br>
                        (800x600px)
                    </label>
                </div>

                <div class="col-md-12 picture-button text-center">
                    <label class="picture-label" for="picture-course-title"><span class="upload-pic">качи<input type="file" id="picture-course-title" name="picture" onChange="CourseimagePreview(this);"></span></label>
                </div>
            </div>

            <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                <div class="col-md-12 text-center">
                    <p>
                        <label for="name">Име на курса</label><br>
                        <input type="text" id="name" name="name" placeholder="..." class="name-course" value="{{old('name')}}">
                    </p>
                    <p>
                        <label for="description">Описание</label><br>
                        <textarea id="description" cols="30" rows="5" name="description" placeholder="кратко описание" style="resize: none;">{{old('description')}}</textarea>
                    </p>
                    <p>
                        <label for="starts">Започва</label>
                        <input type="date" name="starts" id="starts" value="{{old('starts')}}">
                    </p>
                    <p>
                        <label for="ends">Свършва</label>
                        <input type="date" name="ends" id="ends" value="{{old('ends')}}">
                    </p>
                    <p>
                        <label for="visibility">Видимост на курса</label>
                        <select class="course-visibility section-el-bold" name="visibility" id="visibility">
                            @foreach(Config::get('courseVisibility') as $visibility)
                                <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        {{-- to do if admin load all lectors or users --}}
                        <label for="lecturer">Лектор: {{Auth::user()->name}} {{Auth::user()->last_name}}</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 create-course-button text-center">
                <a href="#" onclick="javascript:$('#create_course').submit()" class="create-course-btn"><span class="create-course">Създай</span></a>
        </div>
        </form>
    </div>
@endsection
