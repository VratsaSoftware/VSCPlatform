<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Register</title>

	<link rel="stylesheet" href="{{ asset('/css/landing.css') }}">

<!-- 	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}"> -->

	<link rel="stylesheet" href="{{ asset('/css/login.css') }}">
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('/images/vso-png-white.png') }}" />
	<!-- JQuery -->
	<script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}">
	<script src="{{ asset('/js/login-zoom.js') }}"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	@if ($errors->has('name'))
	                <span class="invalid-feedback" role="alert" id="err0">
	                    <strong>{{ $errors->first('name') }}</strong>
	                </span>
	    @endif
	    @if ($errors->has('last_name'))
	                <span class="invalid-feedback" role="alert" id="err1">
	                    <strong>{{ $errors->first('last_name') }}</strong>
	                </span>
	    @endif
	    @if ($errors->has('email'))
	                <span class="invalid-feedback" role="alert" id="err2">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	    @endif
	    @if ($errors->has('password'))
	        <span class="invalid-feedback" role="alert" id="err3">
	            <strong>{{ $errors->first('password') }}</strong>
	        </span>
	    @endif
	    @if ($errors->has('sex'))
	                <span class="invalid-feedback" role="alert" id="err4">
	                    <strong>{{ $errors->first('sex') }}</strong>
	                </span>
	    @endif


	<div id="login-button">
		<img src="{{asset('/images/vso-png-big-2.png')}}" alt="" class="login-img-circle">
</div>
<div id="container">
	<h1><img src="{{asset('/images/vso-png-big-2.png')}}" alt="" class="login-form-img"></h1>
	@if(!Auth::check())
	<span class="close-btn">
		<i class="fas fa-times"></i>
	</span>

	<form method="POST" action="{{ route('login') }}" id="login-form">
		 @csrf
        <div>
    		<input type="email" name="email" placeholder="E-mail" class="email">
    		<input type="password" name="password" placeholder="Парола" autocomplete="password" class="password">
    		<a href="#" id="login-btn-send">Вход</a>
    		<div id="remember-container">
    			<div id="remember"><label for="checkbox-2-1">Запомни ме</label></div>
    			<input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
    			<div id="forgotten">Забравена парола</div>
    			<div id="register">Регистрация</div>
    		</div>
        </div>
	</form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
	<h1><img src="{{asset('/images/vso-png-big-2.png')}}" alt="" class="login-img"></h1>
	<span class="close-btn">
		<i class="fas fa-times"></i>
	</span>

	<form method="POST" action="{{ route('password.email') }}" id="reset-password">
                        @csrf
		<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="e-mail" required>
		<!-- <input type="text" name="secret" placeholder="Тайна"> -->
		<a href="#" class="orange-btn" id="reset-password-btn">Нова Парола</a>
	</form>
</div>

<!-- Register Container -->
<div id="register-container">
	<h1><img src="{{asset('/images/vso-png-big-2.png')}}" alt="" class="register-img"></h1>
	<span class="close-btn">
		<i class="fas fa-times"></i>
	</span>

	<form method="POST" action="{{ route('register') }}" id="register-form">
		 @csrf
		<p>
			<input type="text" name="name" placeholder="Име..." value="{{ old('name') }}" required autofocus>
		</p>
		<p>
			<input type="text" name="last_name" placeholder="Фамилия..." value="{{ old('last_name') }}" required autofocus>
		</p>
		<p>
			<input type="email" id="register_email" name="email" placeholder="Електронна поща..." value="{{ old('email') }}" required>
		</p>

		<p>
			<input type="password" id="register_password" name="password" placeholder="Парола..." autocomplete="password" required>
		</p>

		<p>
			<input id="register_password_confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Повтори парола..." autocomplete="password"  required>
		</p>

		<p>
			<label for="location">Населено място</label>
			<select id="location" name="location">

			</select>
		</p>

		<p class="sex-options">
            @if(!empty(old('sex')) && old('sex') != 'male')
                <label id="male-label" for="male">Мъж</label><input type="radio" name="sex" id="male" value="male">
                <label id="female-label" for="female">Жена</label><input type="radio" name="sex" id="female" value="female" checked="checked">
            @elseif(!empty(old('sex')) && old('sex') != 'female')
                <label id="male-label" for="male">Мъж</label><input type="radio" name="sex" id="male" value="male" checked="checked">
                <label id="female-label" for="female">Жена</label><input type="radio" name="sex" id="female" value="female">
            @endif

            @if(empty(old('sex')))
                <label id="male-label" for="male">Мъж</label><input type="radio" name="sex" id="male" value="male">
			    <label id="female-label" for="female">Жена</label><input type="radio" name="sex" id="female" value="female">
            @endif
        </p>

		<a href="#" class="orange-btn" id="register-btn-send">Регистрация</a>
	</form>
</div>
@else
<div class="continue-to-profile">
	<a href="{{route('myProfile')}}" id="login-btn-send">Продължи към моя Профил</a>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt fa-1x"></i>
        {{ __('Излизане') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
@endif

<script>
	$('#login-button').click(function(){
		$('#login-button').fadeOut("slow",function(){
			$("#container").fadeIn();
			TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
			TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
		});
	});

	$(".close-btn").click(function(){
		TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
		TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
		$("#container, #forgotten-container, #register-container").fadeOut(800, function(){
			$("#login-button").fadeIn(800);
			TweenMax.from("#container", 0, { scale: 0.4, ease:Sine.easeInOut});
			TweenMax.to("#container", 1, { scale: 0.4, ease:Sine.easeInOut});

			TweenMax.from("#forgotten-container", 0, { scale: 0.4, ease:Sine.easeInOut});
			TweenMax.to("#forgotten-container", 1, { scale: 0.4, ease:Sine.easeInOut});

			TweenMax.from("#register-container", 0, { scale: 0.4, ease:Sine.easeInOut});
			TweenMax.to("#register-container", 1, { scale: 0.4, ease:Sine.easeInOut});
		});
	});

	/* Forgotten Password */
	$('#forgotten').click(function(){
		$("#container").fadeOut(function(){
			$("#forgotten-container").fadeIn();
			TweenMax.from("#forgotten-container", .4, { scale: 0, ease:Sine.easeInOut});
			TweenMax.to("#forgotten-container", .4, { scale: 1, ease:Sine.easeInOut});
		});
	});

	// register
	$('#register').click(function(){
		$("#container").fadeOut(function(){
			$("#register-container").fadeIn();
			TweenMax.from("#register-container", .4, { scale: 0, ease:Sine.easeInOut});
			TweenMax.to("#register-container", .4, { scale: 1, ease:Sine.easeInOut});
		});
	});
</script>


<!-- //changing background -->
<script>
	$(function(){
        $('#login-button').click();
		changeBg();
		setTimeout(function(){
		    if ($(window).width() > 1000) {
               changeBg();
            }
		}, 10000);

		function changeBg(){
		    console.log($(window).width()+'/'+$(window).height());
  			// images for background
  			var items = ["1","2","3","4","5","6"];
  			var item = items[Math.floor(Math.random()*items.length)];
  			setTimeout(function(){
                $('<img/>').attr('src', './images/bg/login/'+item+'.jpg').on('load', function() {
                   $(this).remove();
                   $('html').css({
     					'background-image':'url(./images/bg/login/'+item+'.jpg)',
     					'background-size':'cover',
     				});
                    $('html').fadeIn();
                });

  			},500);
  			setTimeout(function(){
  				if ($(window).width() > 1000) {
                    changeBg();
                }
  			}, 10000);
  		};
  	});
  </script>

  <script>
  	$(function(){
  		var cities = {
        "0":"Враца",
        "1":"Борован",
        "2":"Бяла Слатина",
        "3":"Козлодуй",
        "4":"Криводол",
        "5":"Мездра",
        "6":"Мизия",
        "7":"Оряхово",
        "8":"Роман",
        "9":"Хайредин",
        "10": "Друго"
		};
  		 var options = [];
		  $.each( cities, function( key, val ) {
		    options.push( "<option value='"+val+"'>" + val + "</option>" );
		  });
		 $('#location').append(options);
  	})
  </script>
  <script>
    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            if($('#container').is(":visible")){
                $('#login-form').submit();
            }else if($('#forgotten-container').is(":visible")){
                $('#reset-password').submit();
            }else if($('#register-container').is(":visible")){
                $('#register-form').submit();
            }else{
                $('#login-button').fadeOut("slow",function(){
        			$("#container").fadeIn();
        			TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
        			TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
        		});
            }
        }
    });

  	$('#login-btn-send').on('click', function(){
  		$('#login-form').submit();
  	});

  	$('#reset-password-btn').on('click', function(){
  		$('#reset-password').submit();
  	});

  	$('#register-btn-send').on('click', function(){
  		$('#register-form').submit();
  	});
  </script>

  <script>
	$(function(){
		var err = 0;
		setTimeout(function(){
				$('#err'+err).toggle("slide");
				err++;
		},4000);
		setTimeout(function(){
				$('#err'+err).toggle("slide");
				err++;
		},5000);
		setTimeout(function(){
				$('#err'+err).toggle("slide");
				err++;
		},6000);
		setTimeout(function(){
				$('#err'+err).toggle("slide");
				err++;
		},7000);
		setTimeout(function(){
				$('#err'+err).toggle("slide");
				err++;
		},8000);
	});
	</script>
</body>
</html>
