<!DOCTYPE html>
<html lang="bg">

@include('static.includes.bg.about_head')

<body>
    @include('static.includes.bg.lang_btn')
    <!-- header section - nav - gallery -->
{{--    <div class="section" id="header-section">--}}
    {{--        <div class="overlay-top-img">--}}
    {{--            <img src="{{asset('/images/team.png')}}" alt="bg-img" class="img-fluid">--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
        <div id="logo" class="col-md-1 col-sm-1">
            <div class="mb-2"><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_bg.png')}}" alt="Враца Софтуер Общество" class="img-responsive main-logo"></a></div>
        </div>
        <div class="col-md-12 text-center d-flex flex-row flex-wrap top-text-wrap content-wrapper">
            <h1 class="col-md-12 header-about-text">
                Екипът на Враца Софтуер Общество
            </h1>
        </div>
        @include('static.includes.bg.menu')

        <div class="row buttons-right col-md-2">
            <div id="candidate-btn" class="col-md-2">
                <span id="candidate"><a href="{{route('login')}}">ВХОД</a></span>
            </div>
        </div>
        <!-- hamburger -->
        @include('static.includes.bg.hamburger_menu')
        <!-- end of hamburger -->
    </div>
    <!-- end of header section -->
    <h2 class="col-md-12 founders-title text-center">
        Основатели
    </h2>
    <!-- team section -->
    <div class="section">
        <div id="team" class="col-md-12 d-flex flex-row flex-wrap text-center">
            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/ek_pic.jpeg')}}" alt="Емилиян Кадийски" class="img-fluid team-pic">
                    <h3 class="team-title">
                        Емилиян Кадийски
                    </h3>
                    <div class="team-txt">
                        Роден във Враца, Емо завършва математическата гимназия в града, след това магистратура по Информатика в СУ “Св. Климент Охридски”. Работи като уеб програмист и през 2011г е част от първата кохорта учители на Заедно в час.
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
                    <img src="{{asset('/team_pictures/teo_pic5.jpg')}}" alt="Теодор Костадинов" class="img-fluid team-pic">
                    <h3 class="team-title">
                        Теодор Костадинов
                    </h3>
                    <div class="team-txt">
                        Теодор е един от основателите на <b>Враца софтуер</b> и един от първите лектори в сдружението.  Занимава се както с програмиране и преподаване, така и с организиране на събития и състезания. Любима негова е игра е ежегодният Лов на съкровище във Враца, за която черпи вдъхновение от множеството ескейп стаи на които ходи.

                       Теодор е старши програмист в голяма американска компания, като се занимава соновно с Джава и Андроид. Обича да експериментира с различни технологии и похвати, и често подхваща собствени проекти. Любовта към програмирането е нещото, което иска да предаде на своите курсисти.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/Iliyan-Dimov-pic.jpg')}}" alt="Илиян Димов" class="img-fluid team-pic">
                    <h3 class="team-title">
                        Илиян Димов
                    </h3>
                    <div class="team-txt">
                        Илиян има технически ум, който го кара да вярва, че иновативните и модерни
                        професии могат да се работят отвсякъде. Той обича родния си град Враца и
                        също така обича да помага на хората. Мотивиран е от идеята, че Враца може
                        да се превърне в ИТ хъб в Северозападна България.<br/>
                        Образование: Технически университет София<br/>
                        Магистър по Роботика<br/>
                        Професия: Програмист и съосновател на <br /><b>Враца Софтуер Общество.</b>
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end of team section -->

    <div class="section">
        @include('static.includes.bg.footer')
    </div>

    <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>

</html>
