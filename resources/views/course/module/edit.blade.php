@extends('layouts.template')
@section('title', 'Редактирай Модул/Ниво')
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
            <form action="{{route('module.store')}}" method="POST" class="col-md-12" id="create_module" name="create_module" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-12 picture-holder text-center">
                    <label for="picture">
                        @if(!is_null($module->picture))
                            <img src="{{asset('/images/course-'.str_replace(' ', '', strtolower($module->Course->name)).'-'.$module->Course->id.'/module-'.str_replace(' ', '', strtolower($module->name)).'/'.$module->picture)}}" alt="course-pic" id="course-picture">
                        @else
                            <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                        @endif
                        <br>
                        (800x600px)
                    </label>
                </div>

                <div class="col-md-12 picture-button text-center">
                    <label class="picture-label" for="picture"><span class="upload-pic">качи<input type="file" id="picture" name="picture" onChange="CourseimagePreview(this);"></span></label>
                </div>
        </div>

        <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
            <div class="col-md-12 text-center">
                <p>
                    <label for="name">Име на модула/нивото</label><br>
                    <input type="text" id="name" name="name" placeholder="" class="name-course" value="{{$module->name}}">
                </p>
                <p>
                    <label for="description">Описание</label><br>
                    <textarea id="description" cols="30" rows="5" name="description" placeholder="" style="resize: none;">{{$module->description}}</textarea>
                </p>
                <p>
                    <label for="starts">Започва</label>
                    <input type="date" name="starts" id="starts" value="{{$module->starts->format('Y-m-d')}}">
                </p>
                <p>
                    <label for="ends">Свършва</label>
                    <input type="date" name="ends" id="ends" value="{{$module->ends->format('Y-m-d')}}">
                </p>
                <p>
                    <label for="order">Поредност на модула</label>

                    <input type="number" name="order" id="order" value="{{$module->order}}" class="section-el-bold" min="1">
                </p>
                <p>
                    <label for="visibility">Видимост на модула/нивото</label>
                    <select class="course-visibility section-el-bold" name="visibility" id="visibility">
                        @foreach(Config::get('courseVisibility') as $visibility)
                            @if($module->visibility == $visibility)
                                <option value="{{strtolower($visibility)}}" selected>{{ucfirst($visibility)}}</option>
                            @else
                                <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>
    </div>

    <!-- modal for editing elements -->
    <div id="modal">
        <div class="modal-content print-body">
            <div class="modal-header">
                <h2></h2>
            </div>
            <div class="copy text-center">

                <p>

                </p>

                </form>
            </div>
            <div class="cf footer">
                <div></div>
                <a href="#close" class="btn close-modal">Затвори</a>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
    <!-- end of modal -->
    <script src="{{asset('/js/create-level-sliders.js')}}"></script>
    <script src="{{asset('/js/level-add-students.js')}}"></script>
    <script src="{{asset('/js/criteria-edit-lvl.js')}}"></script>
@endsection
