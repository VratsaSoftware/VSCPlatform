<!DOCTYPE html>
<html lang="bg" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Покана за влизане в Отбор</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Asap+Condensed:600i,700');

    body {
        background: #fafafa;
        display: flex;
        text-transform: uppercase;
        font-family: 'Asap Condensed', sans-serif;
    }

    h1 {
        font-size: 5vw;
    }

    h3 {
        font-size: 26px;
    }

    .italic {
        font-style: italic;
    }

    .card {
        position: relative;
        margin: auto;
        height: 350px;
        width: 600px;
        text-align: center;
        background: linear-gradient(#E96874, #6E3663, #2B0830);
        border-radius: 2px;
        box-shadow: 0 6px 12px -3px rgba(0, 0, 0, .3);
        color: #fff;
        padding: 30px;
    }

    .card header {
        position: absolute;
        top: 31px;
        left: 0;
        width: 100%;
        padding: 0 10%;
        transform: translateY(-50%);
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        align-items: center;
    }

    .card header>*:first-child {
        text-align: left;
    }

    .card header>*:last-child {
        text-align: right;
    }

    .logo {
        font-size: 1.5vw;
        position: relative;
    }

    .logo:before,
    .logo:after {
        content: '';
        position: absolute;
        top: 50%;
        border-top: 3px solid currentColor;
        transform: translateY(-50%);
    }

    .logo:before {
        right: 158px;
        width: 40%;
    }

    .logo:after {
        left: 158px;
        width: 55%;
    }

    .logo span {
        /*border: solid currentColor;
      border-width: 0 3px 3px 0;
      position: absolute;
      top: -22px;
      width: 69px;
      height: 70px;
      left: 50%;
      transform: translateX(-58%) rotate(58deg) skew(0deg, -30deg);*/
        display: block;
        position: absolute;
        width: 100%;
        top: calc(50% - 1px);
    }

    .announcement {
        position: relative;
        border: 3px solid currentColor;
        border-top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .announcement:before,
    .announcement:after {
        content: '';
        position: absolute;
        top: 0px;
        border-top: 3px solid currentColor;
        height: 0;
        width: 15px;
    }

    .announcement:before {
        left: -3px;
    }

    .announcement:after {
        right: -3px;
    }

    .inspiration {
        position: absolute;
        bottom: 20px;
        left: 20px;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html, body {
        height: 100%;
    }

    a,
    a:visited,
    a:focus,
    a:active,
    a:link {
        text-decoration: none;
        outline: 0;
    }

    a {
        color: currentColor;
        transition: .2s ease-in-out;
    }

    h1, h2, h3, h4 {
        margin: .15em 0;
    }

    ul {
        padding: 0;
        list-style: none;
    }

    img {
        vertical-align: middle;
        height: auto;
        width: 100%;
    }

    .team-picture{
        width:20vw;
        margin-top: -5%;
    }

    .time-ranks{
        font-size:1.3vw;
        margin-left: -4%;
    }

    .greeting{
        margin-top: 10vw;
        font-size: 2vw;
    }

    .sended_by, .copy{
        font-size:1vw;
    }
    .vso-logo{
        width: 10vw;
        margin-right: -8%;
    }

    .view_more{
        text-align: center;
        font-size: 1.5vw;
    }

    .accept{
        left: 0;
        /* display: block; */
        position: absolute;
        top: 20vw;
        color:#1B8500;
    }

    .deny{
        position: absolute;
        right: 0;
        margin-top: 3vw;
        color:#f00;
    }

    .sended_by_wrapper{
        text-align: center;
        /* right: 0; */
        left: 0;
        display: block;
        position: absolute;
        top: 36vw;
    }

    .copy{
        text-align: center;
        /* right: 0; */
        right: 0;
        display: block;
        position: absolute;
        top: 37vw;
    }

    </style>
</head>
<body>
    <link rel="stylesheet" href="{{asset('/css/invite_member_email.css')}}">
    <div class="card">
        <header>
            <time datetime="{{$event->from->format('d-m-Y')}}" class="time-ranks">{{$event->from->format('d-m-Y')}} - {{$event->to->format('d-m-Y')}}</time>
            <div class="logo">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="0 0 234.5 53.7"><style>.st0{fill:none;stroke:#FFFFFF;stroke-width:5;stroke-miterlimit:10;}</style><path d="M.6 1.4L116.9 52l117-50.6" class="st0"/></svg>
                </span>
                {{$event->name}}
            </div>
            <div class="sponsor">
                <img src="{{asset('/images/vso-png-big-2.png')}}" class="vso-logo" alt="logo"/>
            </div>
        </header>
            <div class="announcement">
                <h3 class="greeting">Здравейте, имате покана за влизане в отбор</h3>
                <h1>{{$team->title}}</h1>
                <p class="accept"><a href="{{route('users.events')}}">Потвърди</a></p>
                <h2><img src="{{asset('/images/events/'.$team->picture)}}" alt="team-logo" class="team-picture"/></h2>
                <p class="deny"><a href="{{route('users.events')}}">Откажи</a></p>
                <p class="sended_by_wrapper">
                    <span class="italic sended_by">Поканата е изпратена от капитана - {{$capitan->name}} {{$capitan->last_name}}</span>
                </p>
                <p class="copy">
                    &copy; Враца Софтуер Общество {{\Carbon\Carbon::now()->format('Y')}}
                </p>
            </div>
            <p class="view_more"><a href="{{route('users.events')}}">виж повече за събитието</a></p>
        </div>
    </body>
    </html>
