@extends('layouts.template')
@section('title', 'Admin Кандидаствания')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    {{-- @dd($entries) --}}
        <div class="section col-md-12">
            <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
            <table class="table" id="forms">
              <thead>
                <tr>
                  <th scope="col">#ID</th>
                  <th scope="col">Име</th>
                  <th scope="col">Фамилия</th>
                  <th scope="col">Е-Поща</th>
                  <th scope="col">Локация</th>
                  <th scope="col">Възраст</th>
                  <th scope="col">Пол</th>
                  <th scope="col">Занимание</th>
                  <th scope="col">Телефон</th>
                  <th scope="col">Форма</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($entries as $entry)
                    <tr>
                      <th scope="row">{{$entry->User->id}}</th>
                      <td>{{$entry->User->name}}</td>
                      <td>{{$entry->User->last_name}}</td>
                      <td>{{$entry->User->email}}</td>
                      <td>{{$entry->User->location}}</td>
                      <td>{{(Carbon\Carbon::now()->format('Y') - $entry->User->dob->format('Y'))}}</td>
                      <td>{{$entry->User->sex}}</td>
                      <td>{{$entry->User->Occupation->occupation}}</td>
                      <td>{{$entry->Form->phone}}</td>
                      <td data-course="{{$entry->Form->course}}" data-module="{{$entry->Form->module}}" data-suitable_candidate="{{$entry->Form->suitable_candidate}}" data-suitable_training="{{$entry->Form->suitable_training}}" data-accompliments="{{$entry->Form->accompliments}}" data-expecatitions="{{$entry->Form->expecatitions}}" data-use="{{$entry->Form->use}}" data-source="{{$entry->Form->source}}" data-cv="{{$entry->Form->cv}}" data-created_at="{{$entry->Form->created_at}}">
                          <a href="#modal" class="show-form"><button class="btn btn-success">Виж</button>
                          </a>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    <!-- modal for adding elements -->
    <div id="modal" style="position:absolute">
        <div class="modal-content print-body">
            <div class="modal-header">
                <h2></h2>
            </div>
            <div class="copy text-center">
                <p>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Направление</th>
                          <th>Модул</th>
                          <th scope="col">Подходящ кандидат</th>
                          <th scope="col">Подходящ обучение</th>
                          <th scope="col">Постижения</th>
                          <th scope="col">Очаквания</th>
                          <th scope="col">Изплозване след това </th>
                          <th scope="col">Източник</th>
                          <th scope="col">Автобиография</th>
                          <th scope="col">Изпратена</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td id="course">1</td>
                          <td id="module">1</td>
                          <td id="suitable_candidate">Mark</td>
                          <td id="suitable_training">Otto</td>
                          <td id="accompliments">Otto</td>
                          <td id="expecatitions">Otto</td>
                          <td id="use">Otto</td>
                          <td id="source">Otto</td>
                          <td id="cv-wrapper"><a id="cv" data-url="{{asset('/entry/cv/')}}" href="" download>свали</a></td>
                          <td id="created_at">Otto</td>
                        </tr>
                      </tbody>
                    </table>
                </p>
            </div>
            <div class="cf footer">
                <div></div>
                <a href="#close" class="btn close-modal">Затвори</a>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
    <!-- end of modal -->
        <script type="text/javascript">
        $('.show-form').on('click',function(){
            var course = $(this).parent().attr('data-course');
            var module = $(this).parent().attr('data-module');
            var suitable_candidate = $(this).parent().attr('data-suitable_candidate');
            var suitable_training = $(this).parent().attr('data-suitable_training');
            var accompliments = $(this).parent().attr('data-accompliments');
            var expecatitions = $(this).parent().attr('data-expecatitions');
            var use = $(this).parent().attr('data-use');
            var source = $(this).parent().attr('data-source');
            var cv = $(this).parent().attr('data-cv');
            var created_at = $(this).parent().attr('data-created_at');
            $('#course').html(course);
            $('#module').html(module);
            $('#suitable_candidate').html(suitable_candidate);
            $('#suitable_training').html(suitable_training);
            $('#accompliments').html(accompliments);
            $('#expecatitions').html(expecatitions);
            $('#use').html(use);
            $('#source').html(source);
            var downloadUrl = $('#cv').attr('data-url');
            $('#cv').attr('href','');
            $('#cv').attr('href',downloadUrl+'/'+cv);
            $('#created_at').html(created_at);

            $( '#modal' ).show();
        });
        $(document).ready(function() {
            $('#forms').DataTable({
                responsive: true,
                order: [[0, "desc"]],
            });
        } );
        </script>
@endsection
