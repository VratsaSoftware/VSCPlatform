<link rel= "stylesheet" href= "{{ asset('css/flash-message.css') }}"/>

@if ($errors->any())
	<div class="alert alert-danger" role="alert">
		Проверете формата по-долу за грешки!
		<span class="alert-close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
	</div>
@endif

@if ($success = Session::get('success'))
	<div class="alert alert-success" role="alert">
		{{ $success }}
		<span class="alert-close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
	</div>
@endif

@if ($error = Session::get('error'))
	<div class="alert alert-danger" role="alert">
		{{ $error }}
		<span class="alert-close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
	</div>
@endif

@if ($warning = Session::get('warning'))
	<div class="alert alert-warning" role="alert">
		{{ $warning }}
		<span class="alert-close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
	</div>
@endif

@if ($info = Session::get('info'))
	<div class="alert alert-info" role="alert">
		{{ $info }}
		<span class="alert-close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
	</div>
@endif

<script>
	$(document).ready( function () {
        $('.alert').show().fadeOut(5000);
    });
</script>
