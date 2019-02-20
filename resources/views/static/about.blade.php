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
        @include('static.menu')

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
    <div class="col-md-12 founders-title text-center">
        Основатели
    </div>
    <!-- team section -->
    <div class="section">
        <div id="team" class="col-md-12 d-flex flex-row flex-wrap text-center">
            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team/ek_pic.jpeg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Емилиян Кадийски
                    </div>
                    <div class="team-txt">
                        Роден във Враца, Емо завършва математическата гимназия в града, след това магистратура по Информатика в СУ “Св. Климент Охридски”. Работи като уеб програмист и през 2011г е част от първата кохорта учители на Заедно в час. През 2013г заедно с двама приятели стартират Враца софтуер общество, организацията развива дигитална индустрия в родния им град, предлагайки курсове по програмиране и интересни ИТ събития.
                        В момента Емо работи като програмист и като учител в професионалната техническа гимназия “Н. Й. Вапцаров” във Враца, където от 2015г има специалност за програмиране.
                        Хобитата му са да спортува: футбол, ски, тичане, да пътува и да обикаля сред природата.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Теодор Костадинов
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Илиян Димов
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-12 founders-title">
                Управленски Екип
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-4 leaders">
                <div class="team-holder">
                    <img src="{{asset('/images/botev-img.png')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Тонко Влахов
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

            <div class="col-md-4 leaders">
                <div class="team-holder">
                    <img src="{{asset('/team/ivan_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Иван Стрижлев
                    </div>
                    <div class="team-txt">
                        Иван е роден и живее във Враца. Завършил е психология в ЮЗУ „Неофит Рилски“. Работил е по специалността си в системата на образованието. Повече от десет години се занимава със създаването и провеждането на тренинг обучения и тиймбилдинги. Хоби му е фотографията, планинарството и графичния дизайн.
                    </div>
                    <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div>
                </div>
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-12 founders-title">
                Преподаватели
            </div>

            <div class="col-md-4 teachers">
                <div class="team-holder">
                    <img src="{{asset('/team/lili_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Лилия Михайлова
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid team-pic">
                                <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 teachers">
                <div class="team-holder">
                    <img src="{{asset('/team/tito_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Тихомир Кръстев
                    </div>
                    <div class="team-txt">
                        Роден във Враца, Тито  завършва СОУ “Христо Ботев” с профил история, след това бакалавър по Публична администрация  в УНСС и магистратура по Мениджмънт в “Икономически университет - Варна”. През пролетта на 2015г е част от първия девет месечен курс на ВСО като курсист и през лятото започва работа като програмист в най-голямата софтуерна компания в града - Инвейтикс. В момента Тито е Senior Android Developer, както и тийм лидер на Java екипа в компанията. От края на 2015г отново е част от девет месечните курсове, но този път като преподавател.
                        Хобитата му са - футбол, да пътува и игрите.

                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid team-pic">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 teachers">
                <div class="team-holder">
                    <img src="{{asset('/team/milena_pic.jpg')}}" alt="team-photo" class="img-fluid team-pic">
                    <div class="team-title">
                        Милена Томова
                    </div>
                    <div class="team-txt">
                        За мен:
                        Христо Ботев е една от именитите фигури в българската революционна дейност, литература и публицистика. Поет и бунтовник, ревностен пазител на националните идеи, той оставя трайна следа в предосвобожденската история на
                        България. Роден е на 6 януари 1848 година в Калофер.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid team-pic">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end of team section -->

    <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>

</html>
