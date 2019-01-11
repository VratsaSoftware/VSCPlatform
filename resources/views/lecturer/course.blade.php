@extends('layouts.template')
@section('title', $course->name)
@section('content')
    <div class="content-wrap">
          <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">

              <div class="col-md-6 text-center left-option">
                <div class="event-title col-md-12">Резултати</div>
                <div class="event-body col-md-12">
                  {{-- <a href="./lecturer_courses.html">
                    <div class="event-body-text">
                      Прегледай
                    </div>
                  </a> --}}
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
                      <div class="list-group">
                          @forelse ($modules as $module)
                              <a href="{{route('lecrurer.module.lections',['module' => $module->id])}}">
                                <li class="list-group-item list-group-item-action d-flex">
                                  <div class="col-md-9 text-center">{{$module->order}}:&nbsp;{{$module->name}}</div>
                                  <div class="col-md-3 text-right">
                                    <i class="far fa-list-alt"></i> {{count($module->Lections)}}&nbsp;
                                  </div>
                                </li>
                            </a>
                          @empty
                              <i class="fas fa-times"></i>
                          @endforelse

                         <a href="{{route('lecrurer.module.lections',['module' => 0])}}">
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

              $('.lecturer-btn-modal').on("click", function(){
                $('.copy > p').html($(this).find('.lecturers-holder').html());
                $('#modal').show();
              });
            </script>

@endsection
