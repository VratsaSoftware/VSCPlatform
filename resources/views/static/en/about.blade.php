<!DOCTYPE html>
<html lang="en">

@include('static.includes.en.about_head')

<body>
    @include('static.includes.en.lang_btn')
    <!-- header section - nav - gallery -->
{{--    <div class="section" id="header-section">--}}
{{--        <div class="overlay-top-img">--}}
{{--            <img src="{{asset('/images/team.png')}}" alt="bg-img" class="img-fluid">--}}
{{--        </div>--}}
{{--    </div>--}}
    <div id="header" class="col-md-12 col-sm-12 d-flex flex-row flex-wrap header">
        <div id="logo" class="col-md-1 col-sm-1">
            <div class="mb-2"><a href="{{route('home')}}"><img src="{{asset('/images/logoVS_en.png')}}" alt="Vratsa Software" class="img-responsive main-logo"></a></div>
        </div>
        <div class="col-md-12 text-center d-flex flex-row flex-wrap top-text-wrap content-wrapper">
            <h1 class="col-md-12 header-about-text">
                Vratsa Software Team
            </h1>
        </div>

        @include('static.includes.en.menu')

        <div class="row buttons-right col-md-2">
            <div id="candidate-btn" class="col-md-2">
                <span id="candidate"><a href="{{route('login')}}">Login</a></span>
            </div>
        </div>
        <!-- hamburger -->
        @include('static.includes.en.hamburger_menu')
        <!-- end of hamburger -->
    </div>
    </div>
    <!-- end of header section -->
    <h2 class="col-md-12 founders-title text-center">
        Founders
    </h2>
    <!-- team section -->
    <div class="section">
        <div id="team" class="col-md-12 d-flex flex-row flex-wrap text-center">
            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/ek_pic.jpeg')}}" alt="Emiliyan Kadiyski" class="img-fluid team-pic">
                    <h3 class="team-title">
                        Emiliyan Kadiyski
                    </h3>
                    <div class="team-txt">
                        Born in Vratsa, Emo graduated the local Mathematical High School, after which he completed his masters in Informatics at Sofia University "St. Kliment Ohridski ". He works as a web developer and in 2011 is part of the first cohort of “Teach for Bulgaria”s teachers. In 2013, together with two friends, he started Vratsa Software Community. The organization is developing digital industry in their Vratsa, offering programming courses and interesting IT events. Currently, Emo works as a programmer and as a teacher at the technical high school "N. J. Vaptsarov "in Vratsa. From 2015 there is a specialty in programming. His hobbies are mainly sports: football, skiing, running, traveling and hiking
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/teo_pic5.jpg')}}" alt="Teodor Kostadinov" class="img-fluid team-pic">
                    <h3 class="team-title">
                        Teodor Kostadinov
                    </h3>
                    <div class="team-txt">
                        Theodore is one of the founders of Vratsa software and one of the first lecturers in the organisation. He is involved in both programming and teaching, as well as organizing events and competitions. His favorite game is the annual Treasure Hunt in Vratsa, for which he draws inspiration from the many escape rooms he walks on. Theodore is a senior programmer at a major American company, working mainly with Java and Android. He likes to experiment with different technologies and techniques, and often begin his own projects. The love for programming is what he wants to pass on to his students.
                    </div>
                    {{-- <div class="team-contact">
                        <img src="{{asset('/images/mail-icon.png')}}" alt="mail-icon" class="img-fluid">
                        <span> hristo.botev@mail.com</span>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-4 founders">
                <div class="team-holder">
                    <img src="{{asset('/team_pictures/Iliyan-Dimov-pic.jpg')}}" alt="Iliyan Dimov" class="img-fluid team-pic">
                    <h3 class="team-title">
                        Iliyan Dimov
                    </h3>
                    <div class="team-txt">
                        Ilian has a technical mind that makes him believe that innovative and modern jobs can be worked from everywhere. He loves his hometown of Vratsa and also likes to help people. He is motivated by the idea that Vratsa can become an IT hub in northwest Bulgaria.
                        Education: Technical University of Sofia<br/>
                        Master of Robotics<br/>
                        Profession: programmer and co - founder of Vratsa Software Society<br/>
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
            @include('static.includes.en.footer')
    </div>

    <script src="{{asset('/js/hamburger-menu.js')}}"></script>
</body>

</html>
