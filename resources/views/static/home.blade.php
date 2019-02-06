<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Враца Софтуер Общество</title>

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

<body>
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <!-- scroll -->
    <script type="text/javascript" src="{{asset('/js/jquery-sectionsnap.js')}}" async></script>
    <div id="content">
        <!-- header section - nav - gallery -->
        <div class="section">
            <div id="header" class="col-md-12 col-sm-12 row">
                <div id="logo" class="col-md-1 col-sm-1">
                    <h1><a href="{{route('home')}}"><img src="./images/vso-logo-bg-original.png" alt="vso-logo" class="img-responsive main-logo"></a></h1>
                </div>

                <nav id="main-nav" class="col-md-8">
                    <ul class="list-inline main-nav-list">
                        <li class="nav-item dropdown-about">
                            <a href="#">За нас</a>
                            <div class="dropdown-content-about">
                                <a href="{{route('mission')}}">Мисия</a>
                                <a href="{{route('about')}}">Екип</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown-el">
                            <a href="#">Обучения</a>
                            <div class="dropdown-content">
                                <a href="{{route('programmingCourses')}}">Програмиране</a>
                                <a href="{{route('digitalMarketing')}}">Дигитален Маркетинг</a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <ul id='right-menu'>
                    <li><a href="#header"><img src="./images/oval.png"></a>
                    <li><a href="#numbers"><img src="./images/oval.png"></a>
                    <li><a href="#events"><img src="./images/oval.png"></a>
                    <li><a href="#partners"><img src="./images/oval.png"></a>
                    <li><a href="#testimonials"><img src="./images/oval.png"></a>
                </ul>

                <div class="row buttons-right col-md-2">
                    <div id="login-btn" class="col-md-2">
                        <span id="log-in"><a href="{{route('login')}}">ВХОД</a></span>
                    </div>
                    <div id="candidate-btn" class="col-md-2">
                        <span id="candidate"><a href="{{route('programmingCourses')}}">Кандидатствай</a></span>
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

                    <div class="mySlides">
                        <img src="{{asset('/images/home-top-slider/hack-vratsa16-smaller.jpg')}}" style="width:100%">
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
                                <p class="btn-content-wrap">
                                    <span class="title-btns-content"><a href="{{route('programmingCourses')}}">Кандидатствай</a></span>
                                </p>
                        </div>
                    </div>

                    <div class="mySlides">
                        <img src="{{asset('/images/home-top-slider/digital-2.png')}}" style="width:100%">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">Безплатен 4-месечен курс по дигитален маркетинг</span>
                                <p />
                                <p>
                                    <span class="slider-subtitle-content">
                                        Започваме курс по дигитален маркетинг - за първи път във Враца!
                                    </span>
                                </p>
                                <p class="btn-content-wrap">
                                    <span class="title-btns-content"><a href="{{route('digitalMarketing')}}">Кандидатствай</a></span>
                                </p>
                        </div>
                    </div>

                    <div class="mySlides">
                        <img src="{{asset('/images/home-top-slider/cw-1.jpg')}}" width="100%">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">Предстои CodeWeek Враца - най-голямото ИТ събитие на северозапада</span>
                                <p />
                                <p>
                                    <span class="slider-subtitle-content">На 6-7 октомври Враца ще бъде част от европейската седмица на програмирането. CodeWeek Враца има една основна цел: да те запознае отблизо с най-популярните възможности за
                                        професионално развитие в 21 век.
                                    </span>
                                </p>
                                <p class="btn-content-wrap">
                                    <span class="title-btns-content"><a href="http://codeweek.vratsa.net">Запиши се</a></span>
                                </p>
                        </div>
                    </div>

                    <div class="mySlides">
                        <img src="{{asset('/images/home-top-slider/kids-1.jpg')}}" width="100%">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">Ново: ИТ курсове за деца 6-11год. във Враца </span>
                                <p />
                                <p>
                                    <span class="slider-subtitle-content">MindHub e първият иновативен клуб по програмиране за деца на възраст между 6 и 11 години. През учебната 2018/2019г за първи път и във Враца ще се провеждат курсове на Майнд
                                        хъб (mindhub).
                                    </span>
                                </p>
                                <p class="btn-content-wrap">
                                    <span class="title-btns-content"><a href="https://mindhub.bg/" target="_blank">Запиши се</a></span>
                                </p>
                        </div>
                    </div>

                    <div class="mySlides">
                        <img src="./images/home-top-slider/telerik_academy_school.jpg" width="100%">
                        <div class="text text-wrap-gallery col-md-12 text-center">
                            <p>
                                <span class="slider-title">9 групи на Телерик академия във Враца</span>
                                <p />
                                <p>
                                    <span class="slider-subtitle-content">През новата учебна година ще има 9 групи на Академия Телерик за ученици, които се интересуват от ИТ. Запиши се за Разработка на игри, Дигитални науки или Алгоритмично
                                        програмиране. За ученици 4-12 клас.
                                    </span>
                                </p>
                                <p class="btn-content-wrap">
                                    <span class="title-btns-content"><a href="https://www.telerikacademy.com/school" target="_blank">Кандидатствай</a></span>
                                </p>
                        </div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                </div>
                <br>

                <div id="thumbnails" class="col-md-12">
                    <span class="dot" onclick="currentSlide(1)"><img src="{{asset('/images/home-top-slider/vsc-tumb.jpg')}}" width="100%"></span>
                    <span class="dot" onclick="currentSlide(2)"><img src="{{asset('/images/home-top-slider/digital-thumb.png')}}" width="100%"></span>
                    <span class="dot" onclick="currentSlide(3)"><img src="{{asset('/images/home-top-slider/cw-tumb.png')}}" width="100%"></span>
                    <span class="dot" onclick="currentSlide(4)"><img src="{{asset('/images/home-top-slider/mindhub-tumb.png')}}" width="100%"></span>
                    <span class="dot" onclick="currentSlide(5)"><img src="{{asset('/images/home-top-slider/telerik-tumb2.png')}}" width="100%"></span>
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
                        <img src="./images/right-num-line.png">
                    </div>


                    <div class="num-num col-md-2 bd-highlight">
                        <div class="num-big-num count">1570</div>
                        <div class="num-content">души посетили наши събития</div>
                    </div>
                    <div class="right-line col-md-1">
                        <img src="./images/right-num-line.png">
                    </div>


                    <div class="num-num col-md-2 bd-highlight">
                        <div class="num-big-num count">250</div>
                        <div class="num-content">души започнали курс</div>
                    </div>
                    <div class="right-line col-md-1">
                        <img src="./images/right-num-line.png">
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
                        <img src="{{asset('/images/why-first-icon.png')}}" class="img-fluid">
                        <span class="why-first-content">
                            Развиваме дигитална индустрия във Враца, като организираме интересни ИТ събития и курсове по програмиране, дигитален маркетинг и други.
                        </span>
                    </div>
                    <div class="why-second-section p-4 col-md-4 text-center">
                        <img src="{{asset('/images/why-second-icon.png')}}" class="img-fluid">
                        <span class="why-second-content">Преподавателите ни са професионалисти-практици с амбиция да предадат своите знания и опит. </span>
                    </div>
                    <div class="why-third-section p-4 col-md-4 text-center">
                        <img src="{{asset('/images/why-third-icon.png')}}" class="img-fluid">
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
                        <img src="{{asset('/images/home-events/cw18.png')}}" alt="events">
                    </div>
                    <div class="p-6 col-md-6 text-center main-event-second">
                        <img src="{{asset('/images/home-events/google-garage.jpg')}}" alt="events">
                    </div>
                    <div class="p-6 col-md-6 text-center main-event-first">
                        <img src="{{asset('/images/home-events/digital-event.jpg')}}" alt="events">
                    </div>
                    <div class="p-6 col-md-6 text-center main-event-second">
                        <img src="{{asset('/images/home-events/HackVratsa.jpg')}}" alt="events">
                    </div>
                </div>

                <div class="secondary-events">
                    <section class="center slider col-md-11">
                        <div>
                            <img src="{{asset('/images/home-events/cw18.png')}}" alt="events">
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/google-garage.jpg')}}" alt="events">
                        </div>

                        <div>
                            <img src="{{asset('/images/home-events/HackVratsa.jpg')}}" alt="events">
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/railsgirls.png')}}" alt="events">
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/th.jpg')}}" alt="events">
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/edit-vr.jpg')}}" alt="events">
                        </div>
                        <div>
                            <img src="{{asset('/images/home-events/digital-event.jpg')}}" alt="events">
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
                    <div class="p-3 col-md-3 sponsors-1"><img src="{{asset('/images/partners/us4bg-logo.png')}}" alt="us4bg-logo" class="img-fluid"></div>
                    <div class="p-3 col-md-3 sponsors-2"><img src="{{asset('/images/partners/promianata-logo.png')}}" alt="promianata-logo" class="img-fluid"></div>
                    <div class="p-3 col-md-3 sponsors-3"><img src="{{asset('/images/partners/vratsa-municipality-logo.jpg')}}" alt="vratsa-municipality-logo" class="img-fluid"></div>
                    <div class="p-3 col-md-3 sponsors-4"><img src="{{asset('/images/partners/Telerik_Academy_Logo.png')}}" alt="Telerik_Academy_Logo" class="img-fluid"></div>

                    <div class="p-3 col-md-3 sponsors-5"><img src="{{asset('/images/partners/mindhub-logo.png')}}" alt="mindhub-logo" class="img-fluid"></div>
                    <div class="p-3 col-md-3 sponsors-6"><img src="{{asset('/images/partners/CDB-logo.png')}}" alt="Coder Dojo Bulgaria" class="img-fluid"></div>
                    <div class="p-3 col-md-3 sponsors-7"><img src="{{asset('/images/partners/movebg-logo2.png')}}" alt="movebg-logo" class="img-fluid"></div>
                    <div class="p-3 col-md-3 sponsors-8"><img src="{{asset('/images/partners/NMD-Logo.gif')}}" alt="NMD-Logo" class="img-fluid"></div>

                    <div class="col-md-3"></div>

                    <div class="p-3 col-md-3 sponsors-9"><img src="{{asset('/images/partners/eSkills-For-Future-logo.png')}}" alt="eSkills-For-Future-logo" class="img-fluid"></div>

                    <div class="p-3 col-md-3 sponsors-10"><img src="{{asset('/images/partners/Startup-logo-main.png')}}" alt="Startup-logo-main" class="img-fluid"></div>
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
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-1"><img src="{{asset('/images/partners/us4bg-logo.png')}}" alt="us4bg-logo" class="img-fluid"></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-2"><img src="{{asset('/images/partners/promianata-logo.png')}}" alt="promianata-logo" class="img-fluid"></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-3"><img src="{{asset('/images/partners/vratsa-municipality-logo.jpg')}}" alt="vratsa-municipality-logo" class="img-fluid"></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-4"><img src="{{asset('/images/partners/Telerik_Academy_Logo.png')}}" alt="Telerik_Academy_Logo" class="img-fluid"></div>

                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-5"><img src="{{asset('/images/partners/mindhub-logo.png')}}" alt="mindhub-logo" class="img-fluid"></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-6"><img src="{{asset('/images/partners/CDB-logo.png')}}" alt="Coder Dojo Bulgaria" class="img-fluid"></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-7"><img src="{{asset('/images/partners/movebg-logo2.png')}}" alt="movebg-logo" class="img-fluid"></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-8"><img src="{{asset('/images/partners/NMD-Logo.gif')}}" alt="NMD-Logo" class="img-fluid"></div>

                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-5"><img src="{{asset('/images/partners/eSkills-For-Future-logo.png')}}" alt="eSkills-For-Future-logo" class="img-fluid"></div>
                    <div class="p-6 col-md-6 col-xs-6 col-sm-6 sponsors-6"><img src="{{asset('/images/partners/Startup-logo-main.png')}}" alt="Startup-logo-main" class="img-fluid"></div>
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
                    <div class="p-3 col-md-3 first-student student-1">
                        <img src="{{asset('/images/home-testimonials/adi-todorova.jpg')}}" alt="student" class="student-img img-fluid">
                        <div class="student-comment">Супер готина организация, която помага на всеки който желае да се развие в ИТ сферата. Курсовете им дават добри основи в програмирането, а най-яката част е запознанството нови хора.</div>
                        <div class="student-name">Аделина Тодорова, студент</div>
                    </div>

                    <div class="p-3 col-md-3 second-student student-2">
                        <img src="{{asset('/images/home-testimonials/svetli.jpg')}}" alt="Svetoslav Vasilev" class="student-img img-fluid">
                        <div class="student-comment">Невероятен тръмплин, с който можеш да
                            започнеш работа в ИТ Сферата. Лично преминах 9 - месечния PHP курс, след което започнах работа веднага.</div>
                        <div class="student-name">Светослав Василев, програмист</div>
                    </div>

                    <div class="p-3 col-md-3 third-student student-3">
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
                        Генерален партньор за периода 2017-2019г е Фондация Америка за България.
                    </span>
                </div>
            </div>
        </div>
        <!-- end of cookies section -->

        <script src="{{asset('/js/front-gallery.js')}}" async></script>
        <script src="{{asset('/js/custom-gallery.js')}}" async></script>
        <script src="{{asset('/js/scroll.js')}}" async></script>
        <script src="{{asset('/js/numbers-section-trigger.js')}}" async></script>
        <script src="{{asset('/js/filmstrip.js')}}" async></script>
        <script src="{{asset('/js/sponsors.js')}}" async></script>
        <script src="{{asset('/js/students.js')}}" async></script>
        <script src="{{asset('/js/slick.js')}}"></script>
        <script src="{{asset('/js/right-dot-menu.js')}}" async></script>
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
                $('head').append('<link rel="stylesheet" href="{{asset('/css/landing.css')}}">');
                $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">');
                $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}">');
                $('head').append('<link rel="stylesheet" href="{{asset('/css/slick.css')}}">');
                $('head').append('<link rel="stylesheet" href="{{asset('/css/slick-theme.css')}}">');
                });
        </script>
</body>

</html>