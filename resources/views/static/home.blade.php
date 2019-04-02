<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Враца Софтуер Общество</title>
    <meta name="description" content="Развиваме дигитална индустрия във Враца">
    <meta name="keywords" content="Враца Софтуер,Програмиране,Курсове,Програмисти,Обучения,Враца">
    <meta name="author" content="ВСО 2019">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png-white.png')}}" />
    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Развиваме дигитална индустрия във Враца" />
    <meta property="og:image" content="{{asset('/images/vso-logo-bg-original.png')}}" />
</head>

<body style="opacity:0">
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <!-- scroll -->
    <script type="text/javascript" src="{{asset('/js/jquery-sectionsnap.js')}}" async></script>
    <div id="content">
        <!-- header section - nav - gallery -->
        <div class="section">
            <div id="header" class="col-md-11 col-sm-12 row">
                <div id="logo" class="col-md-1 col-sm-1">
                    <h1><a href="{{route('home')}}"><img src="{{asset('/images/vso-png-big-2.png')}}" alt="vso-logo" class="img-responsive main-logo"></a></h1>
                </div>

                @include('static.menu')

                <ul id='right-menu'>
                    <li><a href="#header"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                    <li><a href="#numbers"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                    <li><a href="#events"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                    <li><a href="#partners"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                    <li><a href="#testimonials"><img src="{{asset('/images/oval.png')}}" alt="nav-img"></a>
                </ul>
                <div class="row buttons-right col-md-2">
                    <div id="login-btn" class="col-md-2">
                        <span id="log-in"><a href="{{route('login')}}">ВХОД</a></span>
                    </div>
                    <div id="candidate-btn" class="col-md-2">
                        <span id="candidate"><a href="{{route('application.create')}}">Кандидатствай</a></span>
                    </div>
                </div>
            </div>
            @include('static.hamburger_menu')
        </div>
        <!-- end of header section -->

        <!-- image gallery carousel  -->
        <div class="section">
            <div id="carousel">
                <div class="slideshow-container">
                    {{-- title = 33 characters, text min = 125 / max = 250 --}}
                    <div class="mySlides" data-src="{{asset('/images/home-top-slider/programming-pic.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                        <img src="" width="100%" alt="events">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">9-месечни курсове по програмиране</span>
                            <p />
                            <p>
                                <span class="slider-subtitle-content">
                                    Целта на обучението е да придобиете основни познания по програмиране и да имате възможност да започнете стаж в софтуерна компания във Враца! Към момента 20 човека завършили курсовете работят в ИТ сферата във
                                    Враца и 3 компании отвориха офиси в града.
                                </span>
                            </p>
                        </div>
                        <p class="btn-content-wrap">
                            <span class="title-btns-content"><a href="{{route('programmingCourses')}}">Кандидатствай</a></span>
                        </p>
                    </div>

                    <div class="mySlides" data-src="{{asset('/images/home-top-slider/gnezdoto.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                        <img src="" width="100%" alt="events">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">Гнездото</span>
                            <p />
                            <p>
                                <span class="slider-subtitle-content">
                                    Започваме курс по дигитален маркетинг - за първи път във Враца!
                                </span>
                            </p>
                        </div>
                        <p class="btn-content-wrap">
                            <span class="title-btns-content"><a href="http://gnezdoto.vratsasoftware.com/">Виж още</a></span>
                        </p>
                    </div>

                    <div class="mySlides" data-src="{{asset('/images/home-top-slider/arduino.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                        <img src="" width="100%" alt="events">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">Arduino</span>
                            <p />
                            <p>
                                <span class="slider-subtitle-content">
                                    CodeWeek Враца има една основна цел: да те запознае отблизо с най-популярните възможности за
                                    професионално развитие в 21 век.
                                </span>
                            </p>
                        </div>
                        <p class="btn-content-wrap">
                            <span class="title-btns-content"><a href="http://codeweek.vratsa.net" target=" _blank">Кандидатствай</a></span>
                        </p>
                    </div>

                    <div class="mySlides" data-src="{{asset('/images/home-top-slider/mindhub.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                        <img src="" width="100%" alt="events">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">Ново: ИТ курсове за деца 6-11год. във Враца </span>
                                <p />
                                <p>
                                    <span class="slider-subtitle-content">MindHub e първият иновативен клуб по програмиране за деца на възраст между 6 и 11 години. През учебната 2018/2019г за първи път и във Враца ще се провеждат курсове на Майнд
                                        хъб (mindhub).
                                    </span>
                                </p>
                        </div>
                        <p class="btn-content-wrap">
                            <span class="title-btns-content"><a href="https://mindhub.bg/" target="_blank">Кандидатствай</a></span>
                        </p>
                    </div>

                    <div class="mySlides" data-src="{{asset('/images/home-top-slider/telerik_academy_school.jpg')}}" data-loader="{{asset('/images/loaders/load-22.gif')}}">
                        <img src="" width="100%" alt="events">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">hack vratsa</span>
                                <p />
                                <p>
                                    <span class="slider-subtitle-content">През новата учебна година ще има 9 групи на Академия Телерик за ученици, които се интересуват от ИТ. Запиши се за Разработка на игри, Дигитални науки или Алгоритмично
                                        програмиране. За ученици 4-12 клас.
                                    </span>
                                </p>
                        </div>
                        <p class="btn-content-wrap">
                            <span class="title-btns-content"><a href="https://www.telerikacademy.com/school" target="_blank">Кандидатствай</a></span>
                        </p>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                </div>
                <br>

                <div id="thumbnails" class="col-md-12">
                    <span class="dot" onclick="currentSlide(1)"><img src="{{asset('/images/home-top-slider/vsc-thumb-big-2.png')}}" width="100%" alt="gallery-nav"></span>
                    <span class="dot" onclick="currentSlide(2)"><img src="{{asset('/images/home-top-slider/gnezdoto_logo.jpg')}}" width="100%" alt="gallery-nav"></span>
                    <span class="dot" onclick="currentSlide(3)"><img src="{{asset('/images/home-top-slider/arduino_logo.png')}}" width="100%" alt="gallery-nav"></span>
                    <span class="dot" onclick="currentSlide(4)"><img src="{{asset('/images/home-top-slider/mind-hub-crop.png')}}" width="100%" alt="gallery-nav"></span>
                    <span class="dot" onclick="currentSlide(5)"><img src="{{asset('/images/home-top-slider/hack_thumb.png')}}" width="100%" alt="gallery-nav"></span>
                </div>

            </div>
        </div>
        <!-- end of image gallery carousel  -->

        <!-- big numbers section -->
        <div class="section">
            <div id="numbers">
                <div class="numbers-section d-flex flex-row bd-highlight mb-12 justify-content-around flex-wrap">

                    <div class="num-num col-md-2 bd-highlight">
                        <div class="num-big-num count">3</div>
                        <div class="num-content">нови софтуерни компании с офис във Враца</div>
                    </div>
                    <div class="right-line col-md-1">
                        <img src="{{asset('/images/right-num-line.png')}}" alt="line-img">
                    </div>


                    <div class="num-num col-md-2 bd-highlight">
                        <div class="num-big-num count">1570</div>
                        <div class="num-content">души посетили наши събития</div>
                    </div>
                    <div class="right-line col-md-1">
                        <img src="{{asset('/images/right-num-line.png')}}" alt="line-img">
                    </div>


                    <div class="num-num col-md-2 bd-highlight">
                        <div class="num-big-num count">310</div>
                        <div class="num-content">души започнали курс</div>
                    </div>
                    <div class="right-line col-md-1">
                        <img src="{{asset('/images/right-num-line.png')}}" alt="line-img">
                    </div>


                    <div class="num-num col-md-2 bd-highlight">
                        <div class="num-big-num count">4</div>
                        <div class="num-content">години</div>
                    </div>

                </div>
            </div>
            <div class="why">
                <div class="why-title col-md-12 text-center">
                    <span>Защо ВСО?</span>
                </div>
                <div class="why-sections d-flex mb-12 flex-row flex-wrap">
                    <div class="why-first-section p-4 col-md-4 text-center">
                        <img src="{{asset('/images/why-first-icon.png')}}" class="img-fluid" alt="icon-img">
                        <span class="why-first-content">
                            Развиваме дигитална индустрия във Враца, като организираме интересни ИТ събития и курсове по програмиране, дигитален маркетинг и други.
                        </span>
                    </div>
                    <div class="why-second-section p-4 col-md-4 text-center">
                        <img src="{{asset('/images/why-second-icon.png')}}" class="img-fluid" alt="icon-img">
                        <span class="why-second-content">Преподавателите ни са професионалисти-практици с амбиция да предадат своите знания и опит. </span>
                    </div>
                    <div class="why-third-section p-4 col-md-4 text-center">
                        <img src="{{asset('/images/why-third-icon.png')}}" class="img-fluid" alt="icon-img">
                        <span class="why-third-content">Получили сме редица национални и международни признания сред, които: Достойни българи 2017г, включване в списъкът на Форбс Европа 30 под 30, Google RISE Awards.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of big numbers section -->

        <!-- events section -->
        <div class="section">
            <div id="events">
                <div class="events-title col-md-12 text-center">
                    <span>Събития</span>
                </div>
                <div class="main-events d-flex mb-12 flex-row col-md-12 flex-wrap">
                    <div class="p-6 col-md-6 text-center main-event-first">
                        <img src="{{asset('/images/loaders/load-22.gif')}}" data-img="{{asset('/images/home-events/HackVratsa.jpg')}}" alt="events">
                        <div class="event-title-top">
                            <a href="http://hack.vratsa.net/" target=" _blank" class="event-top-link">HackVratsa</a>
                        </div>
                    </div>
                    <div class="p-6 col-md-6 text-center main-event-second">
                        <img src="{{asset('/images/loaders/load-22.gif')}}" data-img="{{asset('/images/home-events/th.jpg')}}" alt="events">
                        <div class="event-title-top">
                            <a href="https://learndigital.withgoogle.com/digitalengarazh" target=" _blank" class="event-top-link">TreasureHunt</a>
                        </div>
                    </div>
                    <div class="p-6 col-md-6 text-center main-event-first">
                        <img src="{{asset('/images/loaders/load-22.gif')}}" data-img="{{asset('/images/home-events/railsgirls.png')}}" alt="events">
                        <div class="event-title-top">
                            <a href="{{route('digitalMarketing')}}" target=" _blank" class="event-top-link">RailsGirls</a>
                        </div>
                    </div>
                    <div class="p-6 col-md-6 text-center main-event-second">
                        <img src="{{asset('/images/loaders/load-22.gif')}}" data-img="{{asset('/images/home-events/cw18.png')}}" alt="events">
                        <div class="event-title-top">
                            <a href="http://codeweek.vratsa.net/" target=" _blank" class="event-top-link">CodeWeek</a>
                        </div>
                    </div>
                </div>

                <div class="secondary-events">
                    <section class="center slider col-md-11 filmstrip-events">
                        <div>
                            <img src="{{asset('/images/home-events/cw18.png')}}" alt="events">
                            <div class="event-title-top-small">
                                <a href="http://hack.vratsa.net/" target=" _blank" class="event-top-link">CodeWeek</a>
                            </div>
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/google-garage.jpg')}}" alt="events">
                            <div class="event-title-top-small">
                                <a href="https://learndigital.withgoogle.com/digitalengarazh" target=" _blank" class="event-top-link">Google Digital Garage</a>
                            </div>
                        </div>

                        <div>
                            <img src="{{asset('/images/home-events/HackVratsa.jpg')}}" alt="events">
                            <div class="event-title-top-small">
                                <a href="http://hack.vratsa.net/" target=" _blank" class="event-top-link">HackVratsa</a>
                            </div>
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/railsgirls.png')}}" alt="events">
                            <div class="event-title-top-small">
                                <a href="http://railsgirls.com/" target=" _blank" class="event-top-link">RailsGirls</a>
                            </div>
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/th.jpg')}}" alt="events">
                            <div class="event-title-top-small">
                                <a href="http://hunt.vratsa.net/" target=" _blank" class="event-top-link">TreasureHunt</a>
                            </div>
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/edit-vr.jpg')}}" alt="events">
                            <div class="event-title-top-small">
                                <a href="http://eotr.edit.bg/" target=" _blank" class="event-top-link">EditOnTheRoad</a>
                            </div>
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/digital-event.jpg')}}" alt="events">
                            <div class="event-title-top-small">
                                <a href="{{route('digitalMarketing')}}" target=" _blank" class="event-top-link">DigitalMarketing</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- end of events section -->

        <!-- partners/sponsors section -->
        <div class="section">
            <div id="partners" class="col-md-12">
                <div class="partners-title col-md-12 text-center">
                    <span>Партньори</span>
                </div>
                <!-- only 4 visible -->
                <div class="col-md-12 flex-wrap sponsors-logos b-description_readmore js-description_readmore text-center more-sponsors">
                    <div class="p-3 col-md-3 sponsors-1"><a href="https://www.us4bg.org/" target=" _blank"><img src="{{asset('/images/partners/us4bg-logo.png')}}" alt="us4bg-logo" class="img-fluid"></a></div>
                    <div class="p-3 col-md-3 sponsors-2"><a href="https://nova.bg/promyanata" target=" _blank"><img src="{{asset('/images/partners/promianata-logo.png')}}" alt="promianata-logo" class="img-fluid"></a></div>
                    <div class="p-3 col-md-3 sponsors-3"><a href="http://www.vratza.bg/" target=" _blank"><img src="{{asset('/images/partners/vratsa-municipality-logo.jpg')}}" alt="vratsa-municipality-logo" class="img-fluid"></a></div>
                    <div class="p-3 col-md-3 sponsors-4"><a href="https://www.telerikacademy.com/" target=" _blank"><img src="{{asset('/images/partners/Telerik_Academy_Logo.png')}}" alt="Telerik_Academy_Logo" class="img-fluid"></a></div>

                    <div class="p-3 col-md-3 sponsors-5" data-img="{{asset('/images/partners/mindhub-logo.png')}}"><a href="https://mindhub.bg/" target=" _blank"><img src=" " alt="mindhub-logo" class="img-fluid"></a></div>
                    <div class="p-3 col-md-3 sponsors-6" data-img="{{asset('/images/partners/CDB-logo.png')}}"><a href="https://www.coderdojo.bg/" target=" _blank"><img src=" " alt="Coder Dojo Bulgaria" class="img-fluid"></a></div>
                    <div class="p-3 col-md-3 sponsors-7" data-img="{{asset('/images/partners/movebg-logo2.png')}}"><a href="https://move.bg/" target=" _blank"><img src=" " alt="movebg-logo" class="img-fluid"></a></div>
                    <div class="p-3 col-md-3 sponsors-8" data-img="{{asset('/images/partners/NMD-Logo.gif')}}"><a href="http://nmd.bg/" target=" _blank"><img src=" " alt="NMD-Logo" class="img-fluid"></a></div>

                    <div class="col-md-3"></div>

                    <div class="p-3 col-md-3 sponsors-9" data-img="{{asset('/images/partners/eSkills-For-Future-logo.png')}}"><a href="http://eskills.tto-bait.bg/" target=" _blank"><img src=" " alt="eSkills-For-Future-logo" class="img-fluid"></a></div>

                    <div class="p-3 col-md-3 sponsors-10" data-img="{{asset('/images/partners/Startup-logo-main.png')}}"><a href="http://startup.bg/" target=" _blank"><img src=" " alt="Startup-logo-main" class="img-fluid"></a></div>
                    <div class="col-md-3"></div>
                </div>
                <div class="col-md-5">

                </div>
                <div class="col-md-2 b-description_readmore_button">
                    Покажи още
                </div>
                <div class="col-md-5">

                </div>
                <!-- end of only 4 visible -->

                <!-- mobile sponsors logo's -->
                <div class="col-md-12 col-xs-12 col-sm-12 flex-wrap text-center mobile-sponsors">
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-1"><a href="https://www.us4bg.org/" target=" _blank"><img src="{{asset('/images/partners/us4bg-logo.png')}}" alt="us4bg-logo" class="img-fluid"></a></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-2"><a href="https://nova.bg/promyanata" target=" _blank"><img src="{{asset('/images/partners/promianata-logo.png')}}" alt="promianata-logo" class="img-fluid"></a></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-3"><a href="http://www.vratza.bg/" target=" _blank"><img src="{{asset('/images/partners/vratsa-municipality-logo.jpg')}}" alt="vratsa-municipality-logo" class="img-fluid"></a></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-4"><a href="https://www.telerikacademy.com/" target=" _blank"><img src="{{asset('/images/partners/Telerik_Academy_Logo.png')}}" alt="Telerik_Academy_Logo" class="img-fluid"></a></div>

                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-5"><a href="https://mindhub.bg/" target=" _blank"><img src="{{asset('/images/partners/mindhub-logo.png')}}" alt="mindhub-logo" class="img-fluid"></a></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-6"><a href="https://www.coderdojo.bg/" target=" _blank"><img src="{{asset('/images/partners/CDB-logo.png')}}" alt="Coder Dojo Bulgaria" class="img-fluid"></a></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-7"><a href="https://move.bg/" target=" _blank"><img src="{{asset('/images/partners/movebg-logo2.png')}}" alt="movebg-logo" class="img-fluid"></a></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-8"><a href="http://nmd.bg/" target=" _blank"><img src="{{asset('/images/partners/NMD-Logo.gif')}}" alt="NMD-Logo" class="img-fluid"></a></div>

                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-5"><a href="http://eskills.tto-bait.bg/" target=" _blank"><img src="{{asset('/images/partners/eSkills-For-Future-logo.png')}}" alt="eSkills-For-Future-logo" class="img-fluid"></a></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-6"><a href="http://startup.bg/" target=" _blank"><img src="{{asset('/images/partners/Startup-logo-main.png')}}" alt="Startup-logo-main" class="img-fluid"></a></div>
                </div>
                <!-- end of mobile sponsors logo's -->
            </div>
        </div>
        <!-- end of partners/sponsors section -->

        <!-- testimonials section -->
        <div class="section">
            <div id="testimonials">
                <div class="testimonials-title col-md-12 text-center">
                    <span>Какво казват за нас нашите курсисти?</span>
                </div>
                <div class="col-md-12 flex-row justify-content-between d-flex flex-wrap testimonials-students text-center">
                    <div class="p-2 col-md-3 first-student student-1">
                        <img src="{{asset('/images/home-testimonials/adi-todorova.jpg')}}" alt="Adi Todorova" class="student-img img-fluid">
                        <div class="student-comment">Супер готина организация, която помага на всеки който желае да се развие в ИТ сферата. Курсовете им дават добри основи в програмирането, а най-яката част е запознанството нови хора.</div>
                        <div class="student-name">Аделина Тодорова, студент</div>
                    </div>

                    <div class="p-2 col-md-3 second-student student-2">
                        <img src="{{asset('/images/home-testimonials/svetli_170x170.png')}}" alt="Svetoslav Vasilev" class="student-img img-fluid">
                        <div class="student-comment">Невероятен тръмплин, с който можеш да
                            започнеш работа в ИТ Сферата. Лично преминах 9 - месечния PHP курс, след което започнах работа веднага.</div>
                        <div class="student-name">Светослав Василев, програмист</div>
                    </div>

                    <div class="p-2 col-md-3 third-student student-3">
                        <img src="{{asset('/images/home-testimonials/ivan-spasov.png')}}" alt="Ivan Spasov" class="student-img img-fluid">
                        <div class="student-comment">Враца Софтуер не е просто общност те са едно вдъхновяващо семейство което те кара да се чувстваш като незаменима и важна част от нещо специално.</div>
                        <div class="student-name">Иван Спасов, студент</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of testimonials section -->

        <!-- cookies section -->
        <div class="section">
            <div id="cookies" class="col-md-12 d-flex flex-wrap">
                <div class="cookie-text col-md-8">
                    <span class="p-6 col-md-3 col-xs-3 col-sm-3"><img src="{{asset('/images/partners/us4bg-logo-small.png')}}" alt="sponsor" class="img-fluid cookie-sponsor-img"></span>
                    <span class="cookie-sponsor-text">
                        Генерален партньор за периода 2017-2019г е Фондация Америка за България.<br />
                    </span>
                </div>
                <div class="col-md-12 text-right">Враца Софтуер Общество &copy; {{\Carbon\Carbon::now()->format('Y')}}</div>
                <div class="col-md-12 text-right"><img src="{{asset('images/location-front.png')}}" alt="location" width="20px">град Враца, ул. Кокиче 14</div>
            </div>
        </div>
        <!-- end of cookies section -->
        <script src="{{asset('/js/slick.js')}}"></script>
        <script src="{{asset('/js/hamburger-menu.js')}}" async></script>
        <script>
            $(function() {
                $('.main-nav-list > li > a').on('click', function() {
                    $('html, body').animate({
                        scrollTop: $($(this).attr('href')).offset().top
                    }, 500, 'linear');
                });
            })
        </script>
        <script type="text/javascript">
            $(function() {
                $('head').append('<link rel="preload stylesheet" href="{{asset('/css/landing.css')}}" as="style">');
                $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap.min.css')}}" as="style">');
                $('head').append('<link rel="preload stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" as="style">');
                $('head').append('<link rel="preload stylesheet" href="{{asset('/css/slick.css')}}" as="style">');
                $('head').append('<link rel="preload stylesheet" href="{{asset('/css/slick-theme.css')}}" as="style">');

                var frontGallery = document.createElement("script");
                frontGallery.src = "{{asset('/js/front-gallery.js')}}";
                var customGallery = document.createElement("script");
                customGallery.src = "{{asset('/js/custom-gallery.js')}}";
                var scroll = document.createElement("script");
                scroll.src = "{{asset('/js/scroll.js')}}";
                var numbers = document.createElement("script");
                numbers.src = "{{asset('/js/numbers-section-trigger.js')}}";
                var filmstrip = document.createElement("script");
                filmstrip.src = "{{asset('/js/filmstrip.js')}}";
                var sponsors = document.createElement("script");
                sponsors.src = "{{asset('/js/sponsors.js')}}";
                var students = document.createElement("script");
                students.src = "{{asset('/js/students.js')}}";
                var rightDot = document.createElement("script");
                rightDot.src = "{{asset('/js/right-dot-menu.js')}}";
                $('body').append(frontGallery);
                $('body').append(customGallery);
                $('body').append(scroll);
                $('body').append(numbers);
                $('body').append(filmstrip);
                $('body').append(sponsors);
                $('body').append(students);
                $('body').append(rightDot);
            });
        </script>
</body>

</html>
