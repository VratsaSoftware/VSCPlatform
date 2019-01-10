@extends('layouts.template')
@section('title', 'Създай Курс')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 text-center picture-title">
                    Заглавна Снимка
                </div>
                <form action="{{route('course.store')}}" method="POST" class="col-md-12" id="create_course" name="create_course">
                    {{ csrf_field() }}
                <div class="col-md-12 picture-holder text-center">
                    <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                    <br>
                    (800x600)
                </div>

                <div class="col-md-12 picture-button text-center">
                    <a href=""><span class="upload-pic"><input type="file" id="picture" name="picture" onChange="CourseimagePreview(this);"></span></a>
                </div>
            </div>

            <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                <div class="col-md-12 text-center">
                    <p>
                        <label for="title">Име на курса</label><br>
                        <input type="text" name="title" placeholder="...">
                    </p>
                        <label for="description">Описание</label><br>
                            <textarea id="description" cols="30" rows="5" name="description" placeholder="кратко описание" style="resize: none;"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12 create-course-button text-center">
                <a href="#" onclick="javascript:$('#create_course').submit()"><span class="create-course">Създай</span></a>
        </div>
        </form>
    </div>
@endsection
