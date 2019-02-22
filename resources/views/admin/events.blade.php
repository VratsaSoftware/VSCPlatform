@extends('layouts.template')
@section('title', 'Admin Събития')
@section('content')
<div class="content-wrap">
  <div class="section">
    <div class="col-md-12 events-now-text text-center">Актуални</div>
  </div>
  <div class="events col-md-12 d-flex flex-row flex-wrap">
        @forelse($events as $event)
                <div class="col-md-6">
                    <div class="event-title col-md-12">{{$event->name}}</div>
                    <div class="event-body col-md-12">
                      <a href="{{route('lecturer.show.event',['event' => $event->id])}}">
                        <div class="event-body-text">
                          виж
                        </div>
                      </a>
                      @if(!is_null($event->picture) || !empty($event->picture))
                          <img src="{{asset('/images/event-'.$event->id.'/'.$event->picture)}}" alt="">
                      @else
                          <img src="{{asset('/images/img-placeholder.jpg')}}" alt="no photo">
                      @endif
                    </div>
                    <div class="event-footer col-md-12 d-flex flex-row flex-wrap">
                      <div class="col-md-6">{{$event->visibility}}</div>
                      <div class="col-md-6">{{$event->starts->format('Y-m-d')}} / {{$event->ends->format('Y-m-d')}}</div>
                    </div>
                </div>
        @empty
          няма актуални събития
        @endforelse
        <div class="col-md-12 text-center past-text">
            Отминали
        </div>
        @forelse($pastEvents as $event)
            <div class="col-md-6">
                <div class="event-title col-md-12 title-signed">{{$event->name}}</div>
                <div class="event-body col-md-12">
                  <a href="{{route('lecturer.show.event',['event' => $event->id])}}">
                    <div class="event-body-text button-signed">
                      виж
                    </div>
                  </a>
                  @if(!is_null($event->picture) || !empty($event->picture))
                      <img src="{{asset('/images/event-'.$event->id.'/'.$event->picture)}}" alt="">
                  @else
                      <img src="{{asset('/images/img-placeholder.jpg')}}" alt="no photo">
                  @endif
                </div>
                <div class="event-footer col-md-12 d-flex flex-row flex-wrap footer-signed">
                  <div class="col-md-6">{{$event->visibility}}</div>
                  <div class="col-md-6">{{$event->starts->format('Y-m-d')}} / {{$event->ends->format('Y-m-d')}}</div>
                </div>
            </div>
        @empty
            няма отминали събития
        @endforelse
    </div>
</div>
@endsection
