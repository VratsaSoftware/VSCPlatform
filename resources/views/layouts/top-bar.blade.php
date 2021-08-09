<div class="navbar col-md-12 d-flex flex-row flex-wrap text-right">
         @if(!Auth::user())
    		<div class="col-md-3 text-left">
    		    <a href="{{route('home')}}" style="position:relative;"><img src="{{asset('/images/logoVS_bg.png')}}" alt="" class="img-fluid" width='35%'></a>
    		</div>
    	  @else
    	    <div class="col-md-3">
    		</div>
    	  @endif
  		<div class="col-md-3 text-left menu-title">@yield('title')</div>
  		<div class="col-md-6 text-right top-icons">
            @if(Auth::user())
            <img src="{{asset('/images/beta.png')}}" alt="" class="img-fluid beta-img">
  			{{-- <img src="{{asset('/images/profile/nav/search-icon.png')}}" alt="" class="img-fluid">
  			<img src="{{asset('/images/profile/nav/notifications-icon.png')}}" alt="" class="img-fluid"> --}}
  			<!-- <span class="badge-notify">3</span> -->
            @else
                <div class="cf footer">
                <a href="{{route('login')}}" class="btn close-modal">ВХОД</a>
                </div>
            @endif
        </div>
	</div>
