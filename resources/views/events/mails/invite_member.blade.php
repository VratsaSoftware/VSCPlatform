<!DOCTYPE html>
<html lang="bg" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Покана за влизане в Отбор</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Asap+Condensed:600i,700');

    body {
        background: #fafafa;
        /*display: flex;*/
        text-transform: uppercase;
        font-family: 'Asap Condensed', sans-serif;
        text-align: center;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    

    img {
        vertical-align: middle;
        height: auto;
        width: 100%;
    }

    .vso-logo{
        width:20%;
    }

    .team-picture{
        width: 40%;
    }

    .accept{
        float:left;
    }

    .deny{
        float:right;
    }

    .sponsor{
        text-align: center;
    }

    </style>
</head>
<body>
    <link rel="stylesheet" href="{{asset('/css/invite_member_email.css')}}">
    <div class="card">
        <header>
            <time datetime="{{$event->from->format('d-m-Y')}}" class="time-ranks">от: {{$event->from->format('d-m-Y')}} / до: {{$event->to->format('d-m-Y')}}</time>
            <br/>
            <div class="logo">
                ще се проведе - {{$event->name}}
            </div>
            <br/>
        </header>
            <div class="announcement">
                <h3 class="greeting">Здравейте, имате покана за влизане в отбор</h3>
                <h1>{{$team->title}}</h1>
                <p class="accept"><a href="{{route('users.events')}}">Потвърди</a></p><p class="deny"><a href="{{route('users.events')}}">Откажи</a></p>
                <h2><img src="{{asset('/images/events/teams/'.$team->picture)}}" alt="team-logo" class="team-picture"/></h2>
                
                <p class="sended_by_wrapper">
                    <span class="italic sended_by">Поканата е изпратена от капитана - {{$capitan->name}} {{$capitan->last_name}}</span>
                </p>
                <p class="view_more"><a href="{{route('users.events')}}">виж повече за събитието</a></p>
                <p class="copy">
                    <div class="sponsor">
                    <img src="{{asset('/images/vso-png-big-2.png')}}" class="vso-logo" alt="logo"/><br/>
                    &copy; Враца Софтуер Общество {{\Carbon\Carbon::now()->format('Y')}}
                    </div>
                </p>
            </div>
        </div>
    </body>
    </html>
