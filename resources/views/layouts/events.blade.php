@extends('layouts.template')
@section('title', 'Събития')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

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
    <div class="col-md-12 events-now-text text-center">Актуални</div>
  </div>
  <div class="events col-md-12 d-flex flex-row flex-wrap">
        @forelse($events as $event)
                <div class="col-md-6">
                    <div class="event-title col-md-12">
                        {{$event->name}}
                        @if($event->is_team > 0)
                            <i class="fas fa-users"></i>
                        @else
                            <i class="fas fa-chart-pie"></i>
                        @endif
                    </div>
                    <div class="event-body col-md-12">
                        <a href="http://hack.vratsa.net/" target="_blank">
                            <div class="event-body-text show-more-event info-btn-in">
                              информация
                            </div>
                        </a>
                      <a href="#modal-view">
                        <span class="desc-no-show">
                            @if($event->is_team > 0)
                                <p>
                                    Отбори<br/>
                                    <table id="teams-table">
                                      <thead>
                                        <tr>
                                          <th>Лого</th>
                                          <th>Име на отбора</th>
                                          <th>Мото</th>
                                          <th>Категория</th>
                                          <th>Технология</th>
                                          <th>Вдъхновение</th>
                                          <th>Git Hub</th>
                                          <th>Участници</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                            @foreach($event->Teams as $team)
                                                @if($team->is_active > 0)
                                                    <tr>
                                                      <td>
                                                          <img src="{{asset('/images/events/teams/'.$team->picture)}}" alt="logo" class="team-table-pic">
                                                      </td>
                                                      <td>{{$team->title}}</td>
                                                      <td>{{$team->slogan}}</td>
                                                      <td>{{$team->Category->category}}</td>
                                                      <td>{{$team->technology_stack}}</td>
                                                      <td>{{$team->inspiration}}</td>
                                                      <td style="color:#1B8500"><a href="{{$team->github}}" target="_blank">{{$team->github}}</a></td>
                                                      <td>
                                                          @foreach($team->Members as $member)
                                                            <p>
                                                                <span>
                                                                    @if(!is_null($member->User))
                                                                      {{$member->User->name}} {{$member->User->last_name}}  <br/>
                                                                  @endif
                                                                </span>
                                                            </p>
                                                          @endforeach
                                                      </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                      </tbody>
                                    </table>
                                </p>
                            @else

                            @endif
                        </span>
                        <div class="event-body-text show-more-event">
                          отбори
                        </div>
                      </a>
                        @if(Auth::user()->isOnEvent($event->id) && Auth::user()->isConfirmedMember($event->id))
                                <div class="event-body-text show-more-event candidate-btn-in">
                                  <i class="fas fa-check-circle"></i> записан
                                </div>
    
                                @if(Auth::user()->isCapitan(Auth::user()->getTeam()->id))
                                    <div class="event-body-text show-more-event team-name">
                                      {{Auth::user()->getTeam()->title}}capitan
                                    </div>
                                @else
                                    <div class="event-body-text show-more-event team-name">
                                      {{Auth::user()->getTeam()->title}}
                                    </div>
                                @endif
                        @else
                            @if(!Auth::user()->isOnEvent($event->id))
                                <a href="{{route('events.register.team',['event' => $event->id])}}">
                                    <div class="event-body-text show-more-event candidate-btn-in">
                                      запиши се
                                    </div>
                                </a>
                            @else
                                <div class="event-body-text show-more-event candidate-btn-in">
                                  поканени сте
                                </div>
                            @endif
                            <a href="#invites-modal" class="invites-modal-btn">
                                <span class="invites-no-show">
                                    <table class="table table-striped">
                                      <thead>
                                          <tr>
                                            <th>Лого</th>
                                            <th>Име на отбора</th>
                                            <th>Мото</th>
                                            <th>Категория</th>
                                            <th>Технология</th>
                                            <th>Вдъхновение</th>
                                            <th>Git Hub</th>
                                            <th>Участници</th>
                                            <th>Операции</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                            <?php $memberTeams = Auth::user()->getMemberInvitedTeam($event->id) ?>
                            @foreach($memberTeams as $teams)
                                @foreach($teams->Teams as $team)
                                    <tr>
                                      <td>
                                          <img src="{{asset('/images/events/teams/'.$team->picture)}}" alt="logo" class="team-table-pic">
                                      </td>
                                      <td>{{$team->title}}</td>
                                      <td>{{$team->slogan}}</td>
                                      <td>{{$team->Category->category}}</td>
                                      <td>{{$team->technology_stack}}</td>
                                      <td>{{$team->inspiration}}</td>
                                      <td style="color:#1B8500"><a href="{{$team->github}}" target="_blank">{{$team->github}}</a></td>
                                      <td>
                                          @foreach($team->Members as $member)
                                            <p>
                                                <span>
                                                    @if(!is_null($member->User))
                                                      {{$member->User->name}} {{$member->User->last_name}}  <br/>
                                                  @endif
                                                </span>
                                            </p>
                                          @endforeach
                                      </td>
                                      <td>
                                          <a href="{{route('team.invite.accept',['event' => $event->id, 'team' => $team->id])}}">Потвърди</a>
                                          <a href="{{route('team.invite.deny',['team'=>$team->id])}}">Откажи</a>
                                      </td>
                                    </tr>

                                @endforeach
                            @endforeach
                                </tbody>
                            </table>
                        </span>
                            <div class="event-body-text show-more-event candidate-btn-pending">
                              имате {{count(Auth::user()->getMemberInvitedTeam($event->id))}} покани
                            </div>
                        </a>
                        @endif
                      @if(!is_null($event->picture) || !empty($event->picture))
                          <img src="{{asset('/images/events/'.$event->picture)}}" alt="">
                      @else
                          <img src="{{asset('/images/img-placeholder.jpg')}}" alt="no photo">
                      @endif
                    </div>
                    <div class="event-footer col-md-12 d-flex flex-row flex-wrap">
                        @if($event->is_team > 0)
                            <div class="col-md-6">от {{$event->min_team}} до {{$event->max_team}} участници в отбор</div>
                        @else
                            <div class="col-md-6">{{$event->visibility}}</div>
                        @endif
                      <div class="col-md-6">{{$event->from->format('Y-m-d')}} / {{$event->to->format('Y-m-d')}}</div>
                    </div>
                </div>
        @empty
          <p class="col-md-12 text-center no-events-title">
            няма актуални събития
          </p>
        @endforelse
        @if(count($pastEvents) > 0)
        <div class="col-md-12 text-center past-text">
            Отминали
        </div>
        @endif
        @forelse($pastEvents as $event)
            <div class="col-md-6">
                <div class="event-title col-md-12 title-signed">
                    {{$event->name}}
                    @if($event->is_team > 0)
                        <i class="fas fa-users"></i>
                    @else
                        <i class="fas fa-chart-pie"></i>
                    @endif
                </div>
                <div class="event-body col-md-12">
                    <a href="http://hack.vratsa.net/" target="_blank">
                        <div class="event-body-text show-more-event info-btn-in">
                          информация
                        </div>
                    </a>
                  <a href="#modal-view">
                    <span class="desc-no-show">
                        <p>
                        Локация:<br/>
                        {{$event->location}}<br/>
                        Описание:<br/>
                        {{$event->description}}<br/>
                        Започва:<br/>
                        {{$event->from}}<br/>
                        Свърва:<br/>
                        {{$event->to}}<br/>
                        </p>
                        @if($event->is_team > 0)
                            <p>
                                Отбори<br/>
                                <table id="teams-table">
                                  <thead>
                                    <tr>
                                      <th>Лого</th>
                                      <th>Име на отбора</th>
                                      <th>Мото</th>
                                      <th>Категория</th>
                                      <th>Технология</th>
                                      <th>Вдъхновение</th>
                                      <th>Git Hub</th>
                                      <th>Участници</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        @foreach($event->Teams as $team)
                                            <tr>
                                              <td>
                                                  <img src="{{asset('/images/events/teams/'.$team->picture)}}" alt="logo" class="team-table-pic">
                                              </td>
                                              <td>{{$team->title}}</td>
                                              <td>{{$team->slogan}}</td>
                                              <td>{{$team->Category->category}}</td>
                                              <td>{{$team->technology_stack}}</td>
                                              <td>{{$team->inspiration}}</td>
                                              <td>{{$team->github}}</td>
                                              <td>
                                                  @foreach($team->Members as $member)
                                                    <p>
                                                        <span>{{$member->Role->role}} - <br/>
                                                              {{$member->User->name}} {{$member->User->last_name}}  <br/>
                                                              {{$member->User->email}}<br />
                                                              @if(!is_null($member->User) && !is_null($member->User->Occupation))
                                                                  {{$member->User->Occupation->occupation}}
                                                              @endif
                                                        </span>
                                                    </p>
                                                  @endforeach
                                              </td>
                                            </tr>
                                        @endforeach
                                  </tbody>
                                </table>
                            </p>
                        @else

                        @endif
                    </span>
                    <div class="event-body-text show-more-event">
                      отбори
                    </div>
                </a>
                    @if(Auth::user()->isOnEvent($event->id))
                        @if(Auth::user()->isConfirmedMember($event->id))

                        @else

                        @endif
                          {{-- <a href="#">
                              <div class="event-body-text show-more-event candidate-btn-in">
                                виж отбора
                              </div>
                          </a> --}}
                    @else
                        <a href="{{route('events.register.team',['event' => $event->id])}}">
                            <div class="event-body-text show-more-event candidate-btn-in">
                              запиши се
                            </div>
                        </a>
                    @endif
                  @if(!is_null($event->picture) || !empty($event->picture))
                      <img src="{{asset('/images/events/'.$event->picture)}}" alt="">
                  @else
                      <img src="{{asset('/images/img-placeholder.jpg')}}" alt="no photo">
                  @endif
                </div>
                <div class="event-footer col-md-12 d-flex flex-row flex-wrap footer-signed">
                    @if($event->is_team > 0)
                        <div class="col-md-6">капацитет на отборите: {{$event->min_team}} - {{$event->max_team}}</div>
                    @else
                        <div class="col-md-6">{{$event->visibility}}</div>
                    @endif
                  <div class="col-md-6">{{$event->from->format('Y-m-d')}} / {{$event->to->format('Y-m-d')}}</div>
                </div>
            </div>
        @empty
            <p class="col-md-12 text-center no-events-title">
                {{-- няма отминали събития --}}
            </p>
        @endforelse
    </div>
</div>
<!-- modal for adding elements -->
<div id="modal" style="position:absolute">
    <div class="modal-content print-body">
        <div class="modal-header">
            <h2></h2>
        </div>
        <div class="copy text-center">
            <p>
                <form action="{{route('events.store')}}" method="POST" class="col-md-12" id="create_event" name="create_event" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="col-md-12 text-center picture-title">
                    Заглавна Снимка
                </div>
                    <div class="col-md-12 picture-holder text-center">
                        <label for="picture">
                            <img src="{{asset('/images/img-placeholder.jpg')}}" alt="course-pic" id="course-picture">
                        </label>
                    </div>

                    <div class="col-md-12 picture-button text-center">
                        <label class="picture-label" for="picture"><span class="upload-pic">качи<input type="file" id="picture" name="picture" onChange="CourseimagePreview(this);" style="display:none"></span></label>
                    </div>


            <div class="col-md-12 level-title-holder d-flex flex-row flex-wrap">
                <div class="col-md-12 text-center">
                    <p>
                        <label for="name">Име на събитието</label><br>
                        <input type="text" id="name" name="name" placeholder="" class="name-course" value="{{old('name')}}">
                    </p>
                    <p>
                        <label for="description">Описание</label><br>
                        <textarea id="description" cols="30" rows="5" name="description" placeholder="" style="resize: none;">{{old('description')}}</textarea>
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
                        <label for="location">Локация</label>

                        <input type="text" name="location" id="location" value="{{old('location')}}" class="section-el-bold">
                    </p>
                    <p>
                        <label>Тип</label><br />
                        @if(!is_null(old('type')))
                            @if(old('type') == 'is_team')
                                <input type="radio" id="team" name="type" value="is_team" checked="checked"><label for="team"> отборно</label><br>
                                <input type="radio" id="module" name="type" value="is_module"><label for="module"> модулно</label><br>

                                <p class="">
                                    Размер на отборите:<br />
                                    <label for="min_team">Минимум:</label><br />
                                    <input type="number" id="min_team" name="min_team" value="1" min="1" max="99"><br />
                                    <label for="min_team">Максимум:</label><br />
                                    <input type="number" id="max_team" name="max_team" value="0" min="0" max="99">
                                </p>
                            @else
                                <input type="radio" id="team" name="type" value="is_team"><label for="team"> отборно</label><br>
                                <input type="radio" id="module" name="type" value="is_module" checked="checked"><label for="module"> модулно</label><br>
                            @endif
                        @else
                            <input type="radio" id="team" name="type" value="is_team"><label for="team"> отборно</label><br>
                            <input type="radio" id="module" name="type" value="is_module"><label for="module"> модулно</label><br>
                            <p class="team-capacity">
                                Размер на отборите:<br />
                                <label for="min_team">Минимум:</label><br />
                                <input type="number" id="min_team" name="min_team" value="1" min="1" max="99"><br />
                                <label for="min_team">Максимум:</label><br />
                                <input type="number" id="max_team" name="max_team" value="0" min="0" max="99">
                            </p>
                        @endif
                    </p>
                    <p>
                        <label for="visibility">Видимост на събитието</label>
                        <select class="course-visibility section-el-bold" name="visibility" id="visibility" title="public - видимо от всички,private - трябва да си логнат за да видиш съдържанието, draft - само лекторите виждат съдържанието">
                            @foreach(Config::get('courseVisibility') as $visibility)
                                    <option value="{{strtolower($visibility)}}">{{ucfirst($visibility)}}</option>
                            @endforeach
                        </select>
                    </p>
                    <div class="col-md-12 create-course-button text-center create-module-btn">
                        <a href="#" class="create-course-btn"><span class="create-course">Създай</span></a>
                    </div>
                </div>
            </p>
        </div>
        </div>
        <div class="cf footer">
            <div></div>
            <a href="#close" class="btn close-modal">Затвори</a>
        </div>
    </div>
    <div class="overlay"></div>
</div>
<!-- end of modal -->
<script>
    function ConfirmDelete() {
        var x = confirm("Сигурни ли сте че искате да изтриете Събитието с всичката му информация?");
        if (x)
            return true;
        else
            return false;
    }
</script>
<script src="{{asset('js/admin-events-page.js')}}"></script>
<script>
$( '.edit-event' ).on( 'click', function () {
	$( '.close-modal' ).attr( 'data-scroll', ( $( this ).offset().top - 700 ) );
	$( '#modal' ).show();
	var eventId = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-event-id' );
	var picture = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-picture' );
	var name = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-name' );
	var description = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-description' );
	var from = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-from' );
	var to = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-to' );
	var location = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-location' );
	var isTeam = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-team' );
	var isModule = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-module' );
	var visibility = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-visibility' );
	var min_team = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-min-team' );
	var max_team = $( this ).parent().prev( '.hidden-event-data' ).attr( 'data-max-team' );

	var route = "{{url('/events/')}}";
	var editRoute = route + '/' + eventId;
	$( '.copy > #create_event' ).attr( 'id', 'edit_event' );
	$( '.copy > #edit_event' ).append( '{{ method_field("PUT") }}' );
	$( '.copy > #edit_event' ).attr( 'action', editRoute );
	$( '#course-picture' ).attr( 'src', '{{url("images/events")}}' + '/' + picture );
	$( '#name' ).val( name );
	$( '#description' ).val( description );
	$( '#starts' ).val( from );
	$( '#ends' ).val( to );
	$( '#location' ).val( location );

	$( '#min_team' ).val( parseInt( min_team ) );
	$( '#max_team' ).val( parseInt( max_team ) );
	if ( isTeam > 0 ) {
		$( '#team' ).prop( 'checked', true );
		$( '.team-capacity' ).fadeIn();
	} else {
		$( '#module' ).prop( 'checked', true );
	}
	$( "#visibility" ).val( visibility ).find( "option[value=" + visibility + "]" ).attr( 'selected', true );
	$( '.create-course' ).attr( 'class', 'edit-event-btn' ).text( 'Редактирай' )
	$( '.edit-event-btn' ).on( 'click', function () {
		$( '#edit_event' ).submit();
	} );
} );

$( '.close-modal' ).on( 'click', function () {
	var scrollTo = +$( this ).attr( 'data-scroll' );
	$( window ).scrollTop( scrollTo );
	$( '#modal' ).css( 'display', 'none' );
	var route = "{{url('/events/')}}";
	var picture = 'img-placeholder.jpg';
	$( '.copy > #edit_event' ).attr( 'id', 'create_event' );
	$( "input[name*='_method']" ).val( "POST" );
	$( '.copy > #create_event' ).attr( 'action', route );
	$( '#course-picture' ).attr( 'src', '{{url("images")}}' + '/' + picture );
	$( '#name' ).val( '' );
	$( '#description' ).val( '' );
	$( '#starts' ).val( '' );
	$( '#ends' ).val( '' );
	$( '#location' ).val( '' );
	$( '#team' ).prop( 'checked', false );
	$( '#module' ).prop( 'checked', false );
	$( '#visibility' ).each( function () {
		$( this ).attr( 'selected', false );
	} );
	$( '.edit-event-btn' ).attr( 'class', 'create-course' ).text( 'Създай' );
	$( '#modal-view' ).remove();
} );
</script>
@endsection
