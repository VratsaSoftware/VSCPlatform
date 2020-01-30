@if(isset($notifications) && !is_null($notifications))
	@foreach($notifications as $notify)
		<div class="alert alert-{{$notify['level']}}">
			{{$notify['message']}}
		</div>
	@endforeach
@endif