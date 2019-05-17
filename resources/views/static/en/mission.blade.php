@extends('static.en.single_layout')
@section('title', 'Mission')
@section('content')
@include('static.en.lang_btn')
            <div class="col-md-12 header-about-text text-center">
                Vratsa Software Mission
            </div>

			<div id="single-text" class="col-md-12 d-flex flex-row flex-wrap text-center">
				<div class="col-md-12">
					<p>
                        Establishing an IT Society, which through quality education gives people in Vratsa an opportunity  to work a challenging and well-paid job in their hometown.
                    </p>
                    <p>
                        Information about what we have done so far can be found in our <a href="{{route('year_reports')}}" class="reports-links">annual reports.</a>
                    </p>
				</div>
			</div>
@endsection
