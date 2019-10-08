<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
<div class="header-sub-title col-md-12 text-center">
    <span>оставащо време</span><br/>
    </br/>
    <span class="timer-programming" data-time="{{$finishTime}}"><img src="{{asset('/images/loaders/load-31.gif')}}" alt="timer"/></span>
</div>
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- JQuery UI-->
<script type="text/javascript" src="{{asset('/js/jquery-ui.js')}}"></script>
<script src="{{asset('/js/countdownTest.js')}}"></script>
<script>
    // Set the date we're counting down to
    var finishTime = $('.timer-programming').attr('data-time');
    var programmingDate = new Date(finishTime).getTime();
    var timerClass = '.timer-programming';

    // Update the count down every 1 second
    var start = setInterval(function() {
        timer(programmingDate,timerClass)
    }, 1000);
</script>
</body>
</html>