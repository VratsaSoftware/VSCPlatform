@extends('layouts.template')
@section('title', 'Домашни')
@section('content')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	<div class="">
		<div class="section">
			<div class="col-md-12 d-flex flex-row flex-wrap">
				@if (!empty(Session::get('success')))
					<p>
						<div class="alert alert-success slide-on">
					<p>{{ session('success') }}</p>
			</div>
			</p>
			@endif
			@if ($errors->any())
				<div class="alert alert-danger slide-on">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if ($message = Session::get('error'))
				<div class="alert alert-danger slide-on">
					<button type="button" class="close" data-dismiss="alert">
					</button>
					<p>{{ $message }}</p>
				</div>
			@endif
		</div>
		<div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
			<div class="col-md-12" style="margin-bottom:2vw;">
				Лекция : {{$lection->title}}<br/>
				Краен срок : {{$lection->homework_end->subDays(1)}}
			</div>
			<table class="table" id="forms">
				<thead>
				<tr>
					<th scope="col">Изпратено</th>
					<th scope="col">Име</th>
					<th scope="col">Фамилия</th>
					<th scope="col">Е-Поща</th>
					<th scope="col">Файл/домашно</th>
					<th scope="col">оценено домашно</th>
					<th scope="col">оценени домашни (на други)</th>
					<th>коментари</th>
					<th style="text-align:center">добави коментар</th>
					<th>коментиран ли е от теб </th>
				</tr>
				</thead>
				<tbody>
				
				@foreach($homeworks as $num => $homework)
					<tr class="text-center">
						<th scope="row">{{$homework->created_at}}</th>
						<td>{{$homework->user->name}}</td>
						<td>{{$homework->user->last_name}}</td>
						<td>{{$homework->user->email}}</td>
						<td><a class="download-homeworks" data-name="{{$homework->user->name.'_'.$homework->user->last_name.'_['.$homework->created_at.']_'.$lection->title}}" href="{{asset('/data/homeworks/'.$homework->file)}}" download style="color:#00F">свали</a></td>
						<td>{{is_null($homework->evaluated_count)?'0':$homework->evaluated_count}} пъти</td>
						<td>
							{{$homework->evaluated}}
						</td>
						<td>
							<a class="show-comments" href="#modal" style="color:#00F">виж</a>
							<div class="comments-homework" style="display:none;">
								<div class="col-md-12 d-flex flex-row flex-wrap comment-modal-holder" style="align-content: flex-start">
									<div class="comments-title col-md-12">Коментари</div>
								@foreach ($homework->Comments as $comment)
									<!-- one comment -->
										@if(!is_null($comment->Author))
											@php
												$isCommented[] = $comment->Author->id === Auth::user()->id?1:0;
												if($comment->Author->id === Auth::user()->id){
													$validComment[$homework->id] = $comment->comment;
												}
											@endphp
											<div class="comment-pic-inside-modal col-md-12 d-flex flex-row flex-wrap">
												<div class="col-md-4">
													@if($comment->Author->picture)
														<img src="{{asset('images/user-pics/'.$comment->Author->picture)}}" alt="botev" class="img-fluid modal-comment-pic">
													@else
														<img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="img-fluid modal-comment-pic">
													@endif
												</div>
												<div class="col-md-4">
												
												</div>
												<div class="col-md-4">
												
												</div>
												<div class="col-md-4 text-center">
                                                                <span class="">
		                                                                {{$comment->Author->name}} {{$comment->Author->last_name}}
                                                                </span>
												</div>
												<div class="col-md-4">
												
												</div>
												<div class="col-md-4 text-right">
													<span class="">{{$comment->created_at->diffForHumans()}}</span>
												</div>
												
												<div class="col-md-12">
												
												</div>
												<div class="col-md-12 comment-text">
													{{$comment->comment}}
												</div>
												<div class="col-md-12 text-right">
													{{$comment->created_at->format('H:i A')}}
												</div>
											</div>
										@endif
									<!-- end of one comment -->
									@endforeach
								</div>
							</div>
						</td>
						<td>
							<a href="#modal" class="add-comment-homework">
								<button class="btn btn-success">коментирай</button>
							</a>
							<div class="col-md-12 text-center comment-form-wrapper" style="display:none;">
								<form action="{{route('lection.homework.lecturer.comment',['homework' => $homework->id])}}" id="comment_form-{{$homework->id}}" name="comment_form" method="POST">
									{{ csrf_field() }}
									<textarea name="comment" id="comment" cols="30" rows="10" placeholder="остави коментар">{{isset($validComment[$homework->id])?$validComment[$homework->id]:''}}</textarea><br>
								</form>
							</div>
						</td>
						<td style="width:12%">
							@if(isset($isCommented) && in_array(1,$isCommented))
								<img src="{{asset("/images/tick-y-big.png")}}" width="10%">
							@else
								<img src="{{asset("/images/profile/remove-icon.png")}}" width="13%">
							@endif
						</td>
					</tr>
					@php $isCommented = [];@endphp
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-12 download-stats" style="bottom:1%;font-size:200%;position:fixed;left:-1%"><i class="fas fa-download"></i></div>
	<button onclick="downloadAll()" class="btn btn-outline-success" style="bottom:1%;font-size:200%;position:fixed;right:1%">свали всички</button>
	<!-- modal for editing elements -->
	<div id="modal" style="top:-140px">
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
	<script>
        $('.show-comments').on('click', function(){
            $('#modal').show();
            $('.copy > p').html($(this).next('.comments-homework').html());
            $('.copy > p').find('.comments-homework').css('display','block');
        });

        $('.add-comment-homework').on('click', function(){
            $('#modal').show();
            $('.copy > p').html($(this).next('.comment-form-wrapper').html());
            $('.copy > p').find('.comment-form-wrapper').css('display','block');
            $( '.modal-content > .cf > div' ).html( '<input class="btn close-modal" type="submit" name="submit" id="send_comment" value="Изпрати">' );
            $( '#send_comment' ).on( 'click', function () {
                $( '.copy > p > form' ).submit();
            } );
        });
	</script>
	<script>
        $(document).ready(function() {
            $('#forms').DataTable({
                responsive: true,
                order: [[0, "desc"]],
            });
        } );
	</script>
	<script>
        function downloadAll() {
            var urls = [];
            var filenames = [];
            $('.download-homeworks').each(function(k,v){
                urls.push($(v).attr('href'));
                filenames.push($(v).attr('data-name'));
            });
            
            var link = document.createElement('a');

            link.setAttribute('download', null);
            link.style.display = 'none';

            document.body.appendChild(link);

            for (var i = 0; i < urls.length; i++) {
                link.setAttribute('href', urls[i]);
                link.setAttribute('download',filenames[i]);
                link.click();
            }
            document.body.removeChild(link);
        }
	</script>
@endsection