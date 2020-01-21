@extends('static.courses_template')
@section('title', 'Курс по Дигитален Маркетинг')
@section('content')
    <div class="section">
        <div id="header" style="background: url(./images/cover-img-smallest.png)">
            <!-- hamburger -->
        @include('static.includes.bg.hamburger_menu')
        <!-- end of hamburger -->
            <div class="overlay-marketing">
                <div id="logo" class="col-md-12 text-center">
                    <a href="{{route('home')}}"><img src="{{asset('/images/logoVStext.png')}}" alt="vso-logo" class="img-fluid" width="20%"></a>
                </div>

                <div class="header-title col-md-12 text-center">
                    <span>Покори върховете на<br /> Дигиталния Маркетинг</span>
                </div>
                <div class="header-button col-md-12 text-center mb-5" style="visibility:visible">
                    <span id="prepare" class="end-candidate marketing-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">Кандидаствай</a></span>
                </div>
                <div class="header-sub-title col-md-12 text-center">
                    <span class="timer-digital"><img src="{{asset('/images/loaders/load-32.gif')}}" alt="timer"/></span>
                </div>

                <div class="header-menu col-md-12 header-marketing" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                            <li class="p-3"><img src="{{asset('/images/logoVStext.png')}}" alt="vso-logo" class="img-fluid"></li>
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
    <div id="program">
        <div class="program-title text-center">ПРОГРАМА</div>
    </div>
    <div class="section d-flex flex-row flex-wrap text-center">
        <div class="col-md-4 text-center">
        <div class="snip1527">
            <div class="image"><img src="{{asset('images/digi_marketing/software-development-4165307_1920.jpg')}}" alt="pr-sample23" /></div>
            <figcaption>
                <div class="date"><span class="day">1</span><span class="month">ниво</span></div>
                <h3>Основи на дигиталния маркетинг</h3>
                <p>
                
                    You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                </p>
            </figcaption>
            <a href="#"></a>
        </div>
        </div>
        
        <div class="col-md-4 text-center">
        <div class="snip1527">
            <div class="image"><img src="{{asset('images/digi_marketing/student-849822_1920.jpg')}}" alt="pr-sample24" /></div>
            <figcaption>
                <div class="date"><span class="day">2</span><span class="month">ниво</span></div>
                <h3>Бизнесът и социалните мрежи</h3>
                <p>
                
                    Sometimes the surest sign that intelligent life exists elsewhere in the universe is that none of it has tried to contact us.
                </p>
            </figcaption>
            <a href="#"></a>
        </div>
        </div>
        
        <div class="col-md-4 text-center">
        <div class="snip1527">
            <div class="image"><img src="{{asset('images/digi_marketing/success-4165306_1920.jpg')}}" alt="pr-sample25" /></div>
            <figcaption>
                <div class="date"><span class="day">3</span><span class="month">ниво</span></div>
                <h3>Анализ на потребителкси данни</h3>
                <p>
                
                    I don't need to compromise my principles, because they don't have the slightest bearing on what happens to me anyway.
                </p>
            </figcaption>
            <a href="#"></a>
        </div>
        </div>
    </div>

    <div id="details-holder">

    </div>
    <div class="section">
        <div id="details" class="marketing-details">
            <div class="details-title text-center">Детайли</div>
            <div class="details-container col-md-12 d-flex flex-wrap flex-row">
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/calendar_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/calendar.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/startup_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/startup.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/contract_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/contract.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 spacer-program"></div>
    
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/medal_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/medal.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/payment_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/payment.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card card-2 text-center">
                        <div class="details-info col-md-12 d-flex flex-row flex-wrap">
                            <div class="col-md-12">
                                <img src="{{asset('/images/digi_marketing/icons/goal_orange.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/goal.png')}}">
                            </div>
                            <div class="col-md-12 title-details-digi">
                                Speed Optimization
                            </div>
                            <div class="col-md-12">
                                Far far away, behind the word mountains, far from the countries Vokalia Separated...
                            </div>
                        </div>
                    </div>
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
                    <img src="{{asset('/images/digi-1.png')}}" alt="step" class="img-fluid candidate-img">
                </div>

                <div class="steps col-md-2">
                    <img src="{{asset('/images/digi-2.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/digi-3.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/digi-4.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="{{asset('/images/digi-5.png')}}" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <span id="prepare-digi" class="end-candidate marketing-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">КАНДИДАТСТВАЙ</a></span>
    </div>
    </div>
    <script>
        // Set the date we're counting down to
        var digitalDate = new Date("Feb 07, 2020 00:00:00").getTime();
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
            $(".hover").mouseleave(
                    function() {
                        $(this).removeClass("hover");
                    }
            );
        });
    </script>
@endsection
