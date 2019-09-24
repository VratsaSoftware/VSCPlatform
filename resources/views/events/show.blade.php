@extends('layouts.template')
@section('title', 'Admin Кандидаствания')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <div class="section col-md-12">
        <div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
            <table class="table" id="forms">
                <thead>
                <tr>
                    <th scope="col">Потребител ID</th>
                    <th scope="col">Име</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Е-Поща</th>
                    <th scope="col">Локация</th>
                    <th scope="col">Възраст</th>
                    <th scope="col">Пол</th>
                    <th scope="col">Занимание</th>
                    <th scope="col">Форма</th>
                    <th scope="col">Създаден</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $entry)
                    <tr>
                        <th scope="row">{{$entry->User->id}}</th>
                        <td>{{$entry->User->name}}</td>
                        <td>{{$entry->User->last_name}}</td>
                        <td>{{$entry->User->email}}</td>
                        <td>{{$entry->User->location}}</td>
                        @if($entry->User->dob)
                            <td>{{(Carbon\Carbon::now()->format('Y') - $entry->User->dob->format('Y'))}}</td>
                        @else
                            <td>-</td>
                        @endif
                        <td>{{$entry->User->sex}}</td>
                        <td>{{$entry->User->Occupation->occupation}}</td>
                        <td class="text-center">
                            <button class="btn btn-success show-form">Виж</button>
                            <div class="no-show">
                               @foreach($entry->fields as $column => $data)
                                    @switch($column)
                                        @case('visited')
                                            <?php $column = 'Участвали ли сте преди на CodeWeek?' ?>
                                        @break

                                        @case('days')
                                            <?php $column = 'Дни' ?>
                                        @break

                                        @case('categories')
                                            <?php $column = 'Категории' ?>
                                        @break

                                        @case('link')
                                        <?php $column = 'Линк' ?>
                                        @break
                                    @endswitch
                                    @if(is_array($data))
                                       <p>
                                           {{$column}} =>
                                            @foreach($data as $v)
                                                <b>{{$v}} |</b>
                                            @endforeach
                                       </p>
                                    @else
                                        <p>
                                            @if($column == 'Дни')
                                                {{$column}} => <b>{{$data < 1?'първия':'двата'}}</b>
                                            @else
                                                {{$column}} => <b>{{$data}}</b>
                                            @endif
                                        </p>
                                    @endif
                               @endforeach
                            </div>
                        </td>
                        <td>
                            <p>
                               <b>{{$entry->created_at}}</b>
                            </p>
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
                    <h2>Форма на участника</h2>
                </div>
                <div class="copy text-center">
                    <p>

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
               $('.copy > p').html($(this).next('.no-show').html());
               $('.copy > p').find('.no-show').removeClass('no-show');

                $( '#modal' ).show();
                $( '#modal' ).css({opacity:100,visibility:'visible'});
            });

            $('.close-modal').on('click', function(){
                $( '#modal' ).hide();
                $( '#modal' ).css({opacity:0,visibility:'hidden'});
            });
            $(document).ready(function() {
                $('#forms').DataTable({
                    responsive: true,
                    order: [[0, "desc"]],
                });
            } );
        </script>
@endsection
