@extends('layouts.template')
@section('title', 'Анкети')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <div class="section col-md-12">
        <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
            <table class="table" id="polls">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Въпрос</th>
                    <th scope="col">Опции</th>
                    <th scope="col">Започва</th>
                    <th scope="col">Свършва</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Видимост</th>
                    <th scope="col">Гласуване</th>
                </tr>
                </thead>
                <tbody>
                @foreach($polls as $poll)
                    <tr>
                        <th scope="row">{{$poll->id}}</th>
                        <td>{{$poll->question}}</td>
                        <td>
                            <ul>
                                @foreach($poll->Options as $option)
                                    <li>{{$option->option}} ({{count($option->Votes)}})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$poll->start->format('Y-m-d H:m:s')}}</td>
                        @if(is_null($poll->ends))
                            <td>-</td>
                        @else
                            <td>{{$poll->ends->format('Y-m-d H:m:s')}}</td>
                        @endif
                        <td>
                            @if(is_null($poll->type))
                                един избор
                            @else
                                много избори
                            @endif
                        </td>
                        <td>{{$poll->visibility}}</td>
                        <td>
                            <a href="#modal" class="show-votes" data-url="{{route('poll.votes',$poll->id)}}"
                               data-question="{{$poll->question}}" data-options="{{$poll->Options}}">
                                <button class="btn btn-success">Виж</button>
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
                    <h2 class="question-title"></h2>
                </div>
                <div class="copy text-center">
                    <p id="modal-content-holder">

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

        <script>
            $(document).ready(function () {
                $('#polls').DataTable({
                    responsive: true,
                    order: [[0, "desc"]],
                });
            });
        </script>

        <script>
            $('.show-votes').on('click', function () {
                $('#modal-content-holder').html(' ');
                $('.question-title').text(' ')
                var url = $(this).attr('data-url');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: url,
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == 200) {
                            $('.question-title').text($('.show-votes').attr('data-question'));
                            $('#modal-content-holder').html(data);
                            $('#modal').show();
                        } else {
                            alert('something wrong with the request...');
                        }
                    }
                });
            });
        </script>
@endsection