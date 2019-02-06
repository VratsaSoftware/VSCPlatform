<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">

    <title>Програмиране</title>

    <link rel="stylesheet" href="{{asset('/css/landing.css')}}">

    <link rel="stylesheet" href="{{asset('/css/about.css')}}">

    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('/css/bootstrap-grid.css')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.js')}}"></script>

    <script type="text/javascript" src="{{asset('/js/jquery-ui.js')}}"></script>

    <!-- scroll -->
    <script type="text/javascript" src="{{asset('/js/jquery-sectionsnap.js')}}"></script>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png-white.png')}}" />

    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Безплатни курсове по програмиране" />
    <meta property="og:image" content="{{asset('/images/vso-png-big-2.png')}}" />

</head>

<body>
    <!-- header section - nav - gallery -->
    <div class="section" id="header-section">
        <div class="overlay-top-img">
            <img src="{{asset('/images/team.png')}}" alt="bg-img" class="img-fluid">
        </div>
    </div>
    <div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
        <div id="logo" class="col-md-1 col-sm-1">
            <h1><a href="{{route('home')}}"><img src="{{asset('/images/vso-png-white.png')}}" alt="vso-logo" class="img-responsive main-logo"></a></h1>
        </div>
        <div class="col-md-12 text-center d-flex flex-row flex-wrap top-text-wrap content-wrapper">
            <div class="col-md-12 header-about-text">
                Екипът на Враца Софтуер Общество
            </div>
        </div>
        <nav id="main-nav" class="col-md-8">
            <ul class="list-inline main-nav-list">
                <li class="nav-item"><a href="{{route('home')}}">Начало</a></li>
                <li class="nav-item dropdown-el">
                    <a href="#">Обучения</a>
                    <div class="dropdown-content">
                        <a href="{{route('programmingCourses')}}">Програмиране</a>
                        <a href="{{route('digitalMarketing')}}">Дигитален Маркетинг</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="row buttons-right col-md-2">
            <div id="candidate-btn" class="col-md-2">
                <span id="candidate"><a href="{{route('login')}}">ВХОД</a></span>
            </div>
        </div>
        <!-- hamburger -->
        @include('static.hamburger_menu')
        <!-- end of hamburger -->
    </div>
    </div>
    <!-- end of header section -->

    <!-- team section -->
    <div class="section">
        <div id="team" class="col-md-12 d-flex flex-row flex-wrap text-center">
            <div class="col-md-4">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo">
                    <div class="team-title">
                        Емилиян Кадийски
                    </div>
                    <div class="team-txt">
                        Образование: Магистър по Информатика, ФМИ към СУ; Zend PHP сертификат
                        Професия: Учител по Програмиране в ПТГ „Н. Й. Вапцаров“ град Враца
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo" class="img-fluid">
                    <div class="team-title">
                        Теодор Костадинов
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo" class="img-fluid">
                    <div class="team-title">
                        Илиян Димов
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo" class="img-fluid">
                    <div class="team-title">
                        Лилия Михайлова
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo" class="img-fluid">
                    <div class="team-title">
                        Тихомир Кръстев
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-holder">
                    <img src="{{asset('/images/1.jpg')}}" alt="team-photo" class="img-fluid">
                    <div class="team-title">
                        Милена Томова
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of team section -->

    <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>

</html>
