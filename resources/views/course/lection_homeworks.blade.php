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
				Краен срок : {{$lection->homework_end}}
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
					<th>добави коментар</th>
				</tr>
				</thead>
				<tbody>
				
				@foreach($homeworks as $num => $homework)
					<tr class="text-center">
						<th scope="row">{{is_null($homework->updated_at) || !isset($homework->updated_at)?$homework->created_at:$homework->updated_at}}</th>
						<td>{{$homework->User->name}}</td>
						<td>{{$homework->User->last_name}}</td>
						<td>{{$homework->User->email}}</td>
						<td><a href="{{asset('/data/homeworks/'.$homework->file)}}" download style="color:#00F">свали</a></td>
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
												$validComment = $comment->Author->id === Auth::user()->id?$comment->comment:'';
											@endphp
											<div class="comment-pic-inside-modal col-md-12 d-flex flex-row flex-wrap">
												<div class="col-md-4">
													@if($comment->Author->picture && $comment->Author->cl_role_id !== 2)
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
                                                                    @if($comment->Author->cl_role_id !== 2)
		                                                                {{$comment->Author->name}} {{$comment->Author->last_name}}
	                                                                @else
		                                                                Курсист
	                                                                @endif
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
							<a href="#modal" class="add-comment-homework"><button class="btn btn-success">коментирай</button></a>
							<div class="col-md-12 text-center comment-form-wrapper" style="display:none;">
								<form action="{{route('lection.homework.lecturer.comment',['homework' => $homework->id])}}" id="comment_form-{{$homework->id}}" name="comment_form" method="POST">
									{{ csrf_field() }}
									<textarea name="comment" id="comment" cols="30" rows="10" placeholder="остави коментар">{{isset($validComment)?$validComment:''}}</textarea><br>
								</form>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-12 download-stats" style="bottom:1%;font-size:200%;position:fixed;left:-1%"><i class="fas fa-download"></i></div>
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
	@endsection