@extends('layouts.template')
@section('title', 'Admin Кандидаствания')
@section('content')
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{{asset('css/applications.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	
	<div class="col-md-12 d-flex flex-row flex-wrap text-center justify-content-center lvl-title filter-apps">
		<div class="col-md-12 text-center">Филтър Кандидадставния</div>
		<div id="app-router" style="display: none;" data-url="{{route('admin.ajax.applications')}}"></div>
		@foreach($types as $type)
			<div class="col-md-3 text-center filter-holder">
				<a href="#" data-type="{{$type->id}}" class="filter-courses-link">
					@if(request()->type == $type->id)
						<div class="col-md-12 course-wrap-filter selected-filter">
							@else
								<div class="col-md-12 course-wrap-filter">
									@endif
									{{$type->type}}
								</div>
				</a>
			</div>
		@endforeach
		<div class="col-md-3 text-center filter-holder">
			<a href="#" data-type="0" class="filter-courses-link">
				<div class="col-md-12 course-wrap-filter">
					всички
				</div>
			</a>
		</div>
	</div>
	<div id="apps-content" class="col-md-12">
	
	</div>
	<script>
		$('.filter-holder > a').on('click', function(){
            $('.filter-holder > a').each(function( index, elval ) {
                $( this ).find('div').removeClass('selected-filter');
            });
		   if($(this).find('div').hasClass('selected-filter')){
		       $(this).find('div').removeClass('selected-filter');
		   }else{
		       $(this).find('div').addClass('selected-filter');
		   }
		   loadApplicaitons($(this).attr('data-type'));
		});
        function loadApplicaitons(type) {
			var url = $('#app-router').attr('data-url');
            $.ajax( {
                headers: {
                    'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                type: "POST",
                url: url,
                data: {
                    type: type,
                },
                success: function ( data, textStatus, xhr ) {
                    if ( xhr.status == 200 ) {
                        $('#apps-content').html('');
                        $('#apps-content').html(data);
                        $('#forms').DataTable().destroy();
                        $('#forms').DataTable({
                            responsive: true,
                            order: [[0, "desc"]],
                        });
                    }
                }
            } );
        }
	</script>
	<!-- jQuery 3 -->
	<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{asset('/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
	<!-- Slimscroll -->
	<script src="{{asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<!-- FastClick -->
	<script src="{{asset('/bower_components/fastclick/lib/fastclick.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('/dist/js/demo.js')}}"></script>
	<!-- fullCalendar -->
	<script src="{{asset('/bower_components/moment/moment.js')}}"></script>
	<script src="{{asset('/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
	<!-- Page specific script -->
@endsection
