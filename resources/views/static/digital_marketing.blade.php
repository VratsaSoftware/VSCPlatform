@extends('static.courses_template')
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
                    <span>Покори върховете на<br /> Дигиталния Маркетинг</span>
                </div>
                {{-- <div class="header-sub-title col-md-12 text-center">
                    <span>Курса започва след</span><br/>
                </br/>
                    <span class="timer-digital"><img src="{{asset('/images/loaders/load-32.gif')}}" alt="timer"/></span>
                </div> --}}
                <div class="header-button col-md-12 text-center mb-5" style="visibility:hidden">
                    <span id="prepare"><a href="#application">Запиши се</a></span>
                </div>

                <div class="header-menu col-md-12 header-marketing" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                           <li class="p-3"><img src="{{asset('/images/vso-png-white-bigger.png')}}" alt="vso-logo" class="img-fluid"></li>
                            <li class="p-3"><a href="{{route('home')}}">Начало</a></li>
                            <li class="p-3"><a href="#information-holder">Информация</a></li>
                            <li class="p-3"><a href="#program-holder">Програма</a></li>
                            <li class="p-3"><a href="#details-holder">Детайли</a></li>
                            <li class="p-3"><a href="#application-holder">Кандидастване</a></li>
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
                        <span>Гимназисти</span>
                    </div>
                    <div class="info-text">
                        Мислиш, че училището не ти дава всичко, от което имаш нужда. Искаш още от сега да започнеш да градиш своето бъдеще в сфера с големи възможности за развитие. Започни да учиш нещо, което може да използваш веднага.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Фрийлансъри</span>
                    </div>
                    <div class="info-text">
                        Работи за себе си и променяй света. Имаш възможност да създадеш свой собствен стил и имидж, които да те направят търсен. Може да избираш проектите, с които да се захванеш и да ги изпълняваш от всяко място, на което ти харесва да бъдеш.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Преквалификация</span>
                    </div>
                    <div class="info-text">
                        Ако имаш творческо мислене, което сегашната ти работа не позволява да използваш и развиваш. Ако искаш да правиш нещо, с което да се чувстваш щастлив и полезен. Инвестирай време в себе си и започни нещо смислено.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Професионално развитие</span>
                    </div>
                    <div class="info-text">
                        Избери път, който ти дава възможност да растеш и да ставаш по-добър. Бъди в крак с новите технологии и тенденции. Започни своето пътуване воден от опитни лектори и направи така, че ти самият да създадеш свои последователи.
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
            <div class="program-title text-center">ПРОГРАМА</div>
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
                                            Основи на маркетинга
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick tick-marketing"><img src="{{asset('/images/tick-y-big-orange.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img info-marketing">
                                        <p class="program-mentors">
                                            <a href="https://www.linkedin.com/in/aleksey-potebnya-7523b152/" target=" _blank">лектор Алексей Потебня</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of first-lvl -->

                                <!-- second lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info lvl-marketing">
                                        <p class="program-info">
                                            Създаване на съдържание онлайн
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick tick-marketing"><img src="{{asset('/images/tick-y-big-orange.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img info-marketing">
                                        <p class="program-mentors">
                                            <a href="https://www.linkedin.com/in/ivaylo-yordanov/" target=" _blank">лектор Ивайло Йорданов</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- end of second lvl -->

                                <!-- third lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info lvl-marketing">
                                        <p class="program-info">
                                            Рекламиране в социални мрежи
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick tick-marketing"><img src="{{asset('/images/tick-y-big-orange.png')}}" alt="tick"></div>
                                    <div class="col-md-4 program-info-img info-marketing">
                                        <p class="program-mentors">
                                            <a href="https://www.linkedin.com/in/ivaylo-yordanov/" target=" _blank">лектор Ивайло Йорданов</a>
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
            <div class="details-title text-center">Детайли</div>
            <div class="details-container col-md-12 d-flex flex-wrap flex-row">
                <div class="col-md-4 first-detail text-center">
                    <img src="{{asset('/images/detail-1-marketing.png')}}" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Продължителност: 4 месеца
                    </span>
                </div>
                <div class="col-md-4 second-detail text-center">
                    <img src="{{asset('/images/detail-2-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Два пъти седмично
                    </span>
                </div>
                <div class="col-md-4 third-detail text-center">
                    <img src="{{asset('/images/rocket-extra-small-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Предназначен за начинаещи
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 fourth-detail text-center">
                    <img src="{{asset('/images/detail-4-marketing.png')}}" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        ~ 10ч. седмично за подготовка вкъщи
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 fifth-detail text-center">
                    <img src="{{asset('/images/detail-5-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        всяко ниво завършва с<br/>
                        изпит и проект
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-2"></div>

                <div class="col-md-3 sixth-detail text-center">
                    <img src="{{asset('/images/detail-6-marketing.png')}}" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Сертификати:<br />
                        Професионален<br /> (над 80%)<br />
                        Обикновен<br /> (над 50%)<br />
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 seventh-detail text-center">
                    <img src="{{asset('/images/detail-7-marketing.png')}}" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Менторска програма
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
            <div class="application-title text-center">Кандидатстване</div>
        </div>
        <div class="col-md-12 d-flex flex-row flex-wrap steps-wrapper text-center">
            <!-- circle steps icons -->
            <ul class="steps col-md-12">
                <li class="marketing-steps">1
                    <span>електронна форма</span>
                </li>
                <li class="marketing-steps">2
                    <span>предварителен тест</span>
                </li>
                <li class="marketing-steps">3
                    <span>самостоятелна задача</span>
                </li>
                <li class="marketing-steps">4
                    <span>интервю</span>
                </li>
                <li class="marketing-steps">5
                    <span>прием</span>
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
        <span id="prepare" class="end-candidate marketing-candidate-btn"><a href="#">КАНДИДАТСТВАЙ</a></span>
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
