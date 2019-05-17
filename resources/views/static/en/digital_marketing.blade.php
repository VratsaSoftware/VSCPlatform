@extends('static.en.courses_template')
@section('title', 'Курс по Дигитален Маркетинг')
@section('content')
    <div class="section">
        <div id="header" style="background: url(./images/cover-img-smallest.png)">
            <!-- hamburger -->
            @include('static.hamburger_menu')
            <!-- end of hamburger -->
            <div class="overlay-marketing">
                <div id="logo" class="col-md-12 text-center">
                    <a href="{{route('home')}}"><img src="{{asset('/images/vso-png-white-bigger.png')}}" alt="vso-logo" class="img-fluid"></a>
                </div>

                <div class="header-title col-md-12 text-center">
                    <span>Conquer the tops of<br /> Digital Marketing</span>
                </div>
                {{-- <div class="header-sub-title col-md-12 text-center">
                    <span>Курса започва след</span><br/>
                </br/>
                    <span class="timer-digital"><img src="{{asset('/images/loaders/load-32.gif')}}" alt="timer"/></span>
                </div> --}}
                <div class="header-button col-md-12 text-center mb-5" style="visibility:hidden">
                    <span id="prepare"><a href="#application">Apply now</a></span>
                </div>

                <div class="header-menu col-md-12 header-marketing" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                           <li class="p-3"><img src="{{asset('/images/vso-png-white-bigger.png')}}" alt="vso-logo" class="img-fluid"></li>
                            <li class="p-3"><a href="{{route('home')}}">Home</a></li>
                            <li class="p-3"><a href="#information-holder">Information</a></li>
                            <li class="p-3"><a href="#program-holder">Program</a></li>
                            <li class="p-3"><a href="#details-holder">Details</a></li>
                            <li class="p-3"><a href="#application-holder">Application</a></li>
                            <!-- <li class=""><a href="">Такса</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div id="information-holder">

    </div>
    <div class="section">
        <div id="information" class="d-flex flex-wrap flex-row">
            <div class="col-md-8 d-flex flex-wrap text-center info-text-container">
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>High school students</span>
                    </div>
                    <div class="info-text">
                        You think school does not give you everything you need. You want to start building your future right now in a field that offers great development. Start learning something you can use right away.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Freelancers</span>
                    </div>
                    <div class="info-text">
                        Work for yourself and change the world. You have the opportunity to create your own style and image which will make you highly valuable. You can choose the projects that you work on and execute them from any place you like to be.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Retraining</span>
                    </div>
                    <div class="info-text">
                        You have creative thinking that your current job does not allow you to use and develop. You want to do something that makes you happy and helpful. Invest time in yourself and start something meaningful.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Professional Development</span>
                    </div>
                    <div class="info-text">
                        Choose a path that gives you the opportunity to grow and become better. Keep up to date with new technologies and trends. Start your journey led by experienced lecturers and make sure you create your own mark.
                    </div>
                </div>
            </div>
            <div class="col-md-4 info-pic">
                <div class="info-img">
                    <img src="{{asset('/images/digital-marketing-1.jpg')}}" alt="info-pic" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div id="program-holder">

    </div>
    <div class="section">
        <div id="program">
            <div class="program-title text-center">Program</div>
            <div class="program-scheme col-md-12 text-center program-no-tabs">
                <div id="tabs">
                    <div class="program-holder d-flex justify-content-center">
                        <!-- php tab -->
                        <div id="tabs-1" class="p-3 php">
                            <div class="col-md-12 d-flex flex-row flex-wrap php-program-holder">
                                <!-- first lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info lvl-marketing">
                                        <p class="program-info">
                                            Marketing basic
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick tick-marketing"><img src="{{asset('/images/tick-y-big-orange.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img info-marketing">
                                        <p class="program-mentors">
                                            <a href="https://www.linkedin.com/in/aleksey-potebnya-7523b152/" target=" _blank">lector Alexei Pottebnia</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of first-lvl -->

                                <!-- second lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info lvl-marketing">
                                        <p class="program-info">
                                            Creating online content
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick tick-marketing"><img src="{{asset('/images/tick-y-big-orange.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img info-marketing">
                                        <p class="program-mentors">
                                            <a href="https://www.linkedin.com/in/ivaylo-yordanov/" target=" _blank">lector Ivailo Yordanov</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of second lvl -->

                                <!-- third lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info lvl-marketing">
                                        <p class="program-info">
                                            Social Network advertising
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick tick-marketing"><img src="{{asset('/images/tick-y-big-orange.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img info-marketing">
                                        <p class="program-mentors">
                                            <a href="https://www.linkedin.com/in/ivaylo-yordanov/" target=" _blank">lector Ivailo Yordanov</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of third lvl -->
                            </div>
                        </div>
                        <!-- end of php tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="details-holder">

    </div>
    <div class="section">
        <div id="details" class="marketing-details">
            <div class="details-title text-center">Details</div>
            <div class="details-container col-md-12 d-flex flex-wrap flex-row">
                <div class="col-md-4 first-detail text-center">
                    <img src="{{asset('/images/detail-1-marketing.png')}}" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Duration: 4 months
                    </span>
                </div>
                <div class="col-md-4 second-detail text-center">
                    <img src="{{asset('/images/detail-2-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Twice a week
                    </span>
                </div>
                <div class="col-md-4 third-detail text-center">
                    <img src="{{asset('/images/rocket-extra-small-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Good for beginners
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 fourth-detail text-center">
                    <img src="{{asset('/images/detail-4-marketing.png')}}" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        ~ 10h. of a week work from home
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 fifth-detail text-center">
                    <img src="{{asset('/images/detail-5-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        every level ends with<br/>
                        test and project
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-2"></div>

                <div class="col-md-3 sixth-detail text-center">
                    <img src="{{asset('/images/detail-6-marketing.png')}}" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Certificates:<br />
                        Proffesional<br /> (above 80%)<br />
                        Basic<br /> (above 50%)<br />
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 seventh-detail text-center">
                    <img src="{{asset('/images/detail-7-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Mentorship program
                    </span>
                </div>

                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

    <div id="application-holder">

    </div>
    <div class="section">
        <div id="application">
            <div class="application-title text-center">Application</div>
        </div>
        <div class="col-md-12 d-flex flex-row flex-wrap steps-wrapper text-center">
            <!-- circle steps icons -->
            <ul class="steps col-md-12">
                <li>1
                    <span style="margin-left:-4vw;">electronic form</span>
                </li>
                <li>2
                    <span style="margin-left:-4vw;">individual test</span>
                </li>
                <li>3
                    <span style="margin-left:-3.5vw;">individual task</span>
                </li>
                <li>4
                    <span style="margin-left:-3.5vw;">interview</span>
                </li>
                <li class="active-step">5
                    <span style="margin-left:-3.5vw;">reception</span>
                </li>
            </ul>

            <!-- images -->

            <div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
                <div class="col-md-1"></div>
                <div class="steps col-md-2 first-candidate-img">
                    <img src="{{asset('/images/candidate-img-step-1.png')}}" alt="step" class="img-fluid candidate-img">
                </div>

                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-2.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-3.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-4.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/candidate-img-step-5.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    </div>
    {{-- <div class="col-md-12 text-center">
        <span id="prepare" class="end-candidate marketing-candidate-btn"><a href="#">APPLY NOW</a></span>
    </div> --}}
    </div>
    <script>
    // Set the date we're counting down to
    var digitalDate = new Date("Feb 15, 2019 00:00:00").getTime();
    var timerClass = '.timer-digital';

    // Update the count down every 1 second
    var start = setInterval(function() {
        timer(digitalDate,timerClass)
    }, 1000);
    </script>
    <script>
        var headeroffset = $("#header-sticky").offset();
        var sticky = (headeroffset.top - 100);
        $(window).scroll(function() {
            // if (window.pageYOffset > sticky) {
            //     $("#header-sticky").addClass('sticky-marketing');
            // } else {
            //     $("#header-sticky").removeClass('sticky-marketing');
            // }

            $(window).scroll(function() {
            if (window.pageYOffset >= sticky && !$("#header-sticky").hasClass('sticky-marketing')) {
                $("#header-sticky").addClass('sticky-marketing');
            }
            if(window.pageYOffset < sticky && $("#header-sticky").hasClass('sticky-marketing')) {
                $("#header-sticky").removeClass('sticky-marketing');
            }
        });
        });
    </script>
    <script type="text/javascript">
        $(function(){
            var programTabs = document.createElement("script");
            programTabs.src = "{{asset('/js/program-tabs.js')}}";

            $('body').append(programTabs);
            tickAnimation(2);
        });
    </script>
@endsection
