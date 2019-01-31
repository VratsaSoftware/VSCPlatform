@extends('layouts.template')
@section('title', $course->name)
@section('content')
    <div class="content-wrap">
          <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
                @if (!empty(Session::get('success')))
                <p>
                    <div class="alert alert-success" style="margin-top:-5vw;">
                        <p>{{ session('success') }}</p>
                    </div>
                </p>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger" style="margin-top:-5vw;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <p>
                    <div class="alert alert-danger" style="margin-top:-5vw;">
                        <button type="button" class="close" data-dismiss="alert">
                        </button>
                        <p>{{ $message }}</p>
                    </div>
                </p>
                @endif
              <div class="col-md-6 text-center left-option">
                <div class="event-title col-md-12">Курс {{$course->name}}
                    @if(strtolower($course->visibility) == 'public')
                        <i class="fas fa-eye"></i>
                    @endif
                    @if(strtolower($course->visibility) == 'private')
                        <i class="fas fa-eye-slash"></i>
                    @endif
                    @if(strtolower($course->visibility) == 'draft')
                        <i class="fas fa-file"></i>
                    @endif
                </div>
                <div class="event-body col-md-12">
                  <a href="#modal" class="change-vis">
                    <div class="event-body-text">
                      Прегледай
                    </div>
                  </a>
                    <div class="for-modal-course-visibility">
                        <div class="col-md-12 text-center">
                            <form action="{{route('course.update',['course' => $course->id])}}" method="POST" class="col-md-12" id="update-course-form" name="update-course-form" enctype="multipart/form-data" files="true">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="col-md-12 text-center picture-title">
                                    Заглавна Снимка
                                </div>

                                <div class="col-md-12 picture-holder text-center">
                                    <label for="picture">
                                        @if($course->picture)
                                            <img src="{{asset('/images/course-'.$course->id.'/'.$course->picture)}}" alt="course-pic" class="course-picture-edit">
                                        @else
                                            <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                                        @endif
                                        <br>
                                        (800x600px)
                                    </label>
                                </div>

                                <div class="col-md-12 picture-button text-center">
                                    <label class="picture-label" for="picture2"><span class="upload-pic">качи<input type="file" id="picture2" name="picture2" onChange="CourseimagePreview(this);" style="display:none"></span></label>
                                </div>
                                <br/>
                                <p>
                                    <label for="name">Име на курса</label><br>
                                    <input type="text" id="name" name="name" class="name-course" value="{{$course->name}}">
                                </p>
                                <p>
                                    <label for="description">Описание</label><br>
                                    <textarea id="description" cols="30" rows="5" name="description" placeholder="кратко описание" style="resize: none;">{{$course->description}}</textarea>
                                </p>
                                <p>
                                    <label for="starts">Започва</label>
                                    <input type="date" name="starts" id="starts" value="{{$course->starts->format('Y-m-d')}}">
                                </p>
                                <p>
                                    <label for="ends">Свършва</label>
                                    <input type="date" name="ends" id="ends" value="{{$course->ends->format('Y-m-d')}}">
                                </p>
                                <p>
                                    <label for="visibility">Видимост на курса</label>
                                    <select class="course-visibility" name="visibility">
                                        @foreach(Config::get('courseVisibility') as $visibility)
                                            @if(strtolower($visibility) == strtolower($course->visibility))
                                                </i><option value="{{strtolower($visibility)}}" selected>{{ucfirst($visibility)}}</option>
                                            @else
                                                <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>
                                <p class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-update-course" value="Промени">Промени</button>
                                    {{-- <form action="{{ route('course.destroy',$course->id) }}" method="POST" onsubmit="return ConfirmDelete()" id="delete-edu">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form> --}}
                                </p>
                            </form>
                        </div>
                    </div>
                  <img src="{{asset('/images/chart-bg.jpg')}}" alt="event-body">
                </div>
                <div class="event-footer col-md-12 d-flex flex-row flex-wrap">
                  <div class="col-md-6">Започнал - {{$course->starts->format('d-m-Y')}}</div>
                  <div class="col-md-6">Завършва - {{$course->ends->format('d-m-Y')}}</div>
                </div>
              </div>

              <div class="col-md-6 right-option">
                <div class="event-title col-md-12 levels-title">Нива/Модули</div>
                <div class="event-body col-md-12">
                  <a href="#modal" class="lvls-btn-modal">
                    <div class="event-body-text levels-btn">
                      Прегледай
                    </div>
                  </a>
                    <div class="levels-holder">
                      <div class="list-group d-flex flex-row flex-wrap">
                          @forelse ($modules as $module)
                              <a href="{{route('module.edit',['module' => $module->id])}}" class="col-md-11 modules-modal">
                                <li class="list-group-item list-group-item-action d-flex">
                                    <div class="col-md-9 text-center module-now">{{$module->order}}:&nbsp;{{$module->name}}</div>
                                  <div class="col-md-2 text-right">
                                    <i class="far fa-list-alt"></i> {{count($module->Lections)}}&nbsp;
                                  </div>
                                </li>
                            </a>
                            <div class="col-md-1 delete-module">
                                <form action="{{ route('module.destroy',$module->id) }}" method="POST" onsubmit="return ConfirmDelete()" id="delete-edu">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger delete-module-btn" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </div>
                          @empty
                              <div class="col-md-12 text-center"><i class="fas fa-times"></i></div>
                          @endforelse

                         <a href="{{route('module.create',['course'=> $course->id])}}" class="col-md-12">
                          <li class="list-group-item list-group-item-action">
                              <img src="{{asset('/images/profile/add-icon.png')}}" alt="add">
                              Добави
                          </li>
                         </a>
                        </div>
                    </div>

                  <img src="{{asset('/images/levels-bg.jpg')}}" alt="event-body">
                </div>
                <div class="event-footer col-md-12 d-flex flex-row flex-wrap levels-footer">
                @if(!$modules->isEmpty())
                    @foreach($modules as $module)
                        @if($module->starts->lt(\Carbon\Carbon::now()) && $module->ends->gt(\Carbon\Carbon::now()))
                            <div class="col-md-6">Текущо ниво {{$module->order}}<br> </div>
                        @endif
                    @endforeach
                     <div class="col-md-6">Общо Нива {{count($modules)}}<br> </div>
                @else
                  <div class="col-md-6"><i class="fas fa-times"></i><br> </div>
                  <div class="col-md-6"><i class="fas fa-times"></i><br> </div>
                @endif
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
                                    <div>
                                        <!--<script src="{{asset('js/profile-picture-preview.js')}}"></script>-->
                                    </div>
                                  <a href="#" class="btn close-modal">Затвори</a>
                                </div>
                          </div>
                          <div class="overlay"></div>
                        </div>
              <!-- end of modal -->
              <script>
              $('.lvls-btn-modal').on("click", function(){
                $('.copy > p').html($(this).next('.levels-holder').html());
                $('#modal').show();
              });

              $('.change-vis').on("click", function(){
                $('.copy > p').html($(this).next('.for-modal-course-visibility').html());
                $('#modal').show();
              });
            </script>
            <script>
                function ConfirmDelete() {
                    var x = confirm("Сигурни ли сте че искате да изтриете МОДУЛА с всичката му информация?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
@endsection
