<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <title>Програмиране</title>

    <link rel="stylesheet" href="./css/static_courses.css">

    <link rel="stylesheet" href="./css/bootstrap.css">

    <link rel="stylesheet" href="./css/bootstrap-grid.css">

    <link rel="stylesheet" href="./css/personal_application_results.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery -->
    <script type="text/javascript" src="./js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./js/jquery-ui.js"></script>
    <!-- scroll -->
    <script type="text/javascript" src="./js/jquery-sectionsnap.js"></script>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="./images/vso-png-white.png" />

    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Безплатни курсове по програмиране" />
    <meta property="og:image" content="./images/vso-logo-bg-original.png" />
</head>

<body>

    <div class="section">
        <div id="header" style="background: url(./images/cover-img.png)">
            <!-- hamburger -->
            <div class="hamburger-wrap col-sm-12 col-md-12 text-center">
                <button class="hamburger"><img src="./images/hamburger-menu.png" alt=""></button>
                <button class="cross">&#735;</button>
                <div class="menu col-md-12 col-sm-12 col-xs-12">
                    <ul class="hamburger-nav">
                        <li class="nav-item"><a href="{{route('home')}}">Начало</a></li>
                        <li class="nav-item"><a href="{{route('about')}}">За нас</a></li>
                        <li class="nav-item"><a href="./digital_marketing.html">Дигитален Маркетинг</a></li>
                        <li class="nav-item"><a href="{{route('login')}}" class="right-mobile">Вход</a></li>
                        <li class="nav-item"><a href="#" class="right-mobile">Кандидатствай</a></li>
                    </ul>
                </div>
            </div>
            <!-- end of hamburger -->
            <div class="overlay">
                <div id="logo" class="col-md-12 text-center">
                    <a href="./index.html"><img src="./images/vso-png-white-bigger.png" alt="vso-logo" class="img-fluid"></a>
                </div>

                <div class="header-title col-md-12 text-center">
                    <span>9-месечни курсове по програмиране за ученици и възрастни</span>
                </div>
                <div class="header-sub-title col-md-12 text-center">
                    <span>Кандидатствай от 26 октомври 2018г</span>
                </div>
                <div class="header-button col-md-12 text-center mb-5">
                    <span id="prepare"><a href="#application">Запиши се</a></span>
                </div>

                <div class="header-menu col-md-12" id="header-sticky">
                    <nav class="text-center">
                        <ul class="d-flex flex-wrap main-nav-list">
                            <li class="p-3"><img src="./images/vso-png-white-bigger.png" alt="" class="img-fluid"></li>
                            <li class="p-3"><a href="{{route('home')}}">Начало</a></li>
                            <li class="p-3"><a href="#information">Информация</a></li>
                            <li class="p-3"><a href="#program">Програма</a></li>
                            <li class="p-3"><a href="#details">Детайли</a></li>
                            <li class="p-3"><a href="#application">Кандидастване</a></li>
                            <!-- <li class=""><a href="">Такса</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
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
                        Ти си ученик в гимназия и състезателна натура. Амбициозен си, интересуваш се от технологии и програмиране, но наученото в часовете по информатика не ти е достатъчно. Учи наравно с големите и излез с едни гърди напред пред
                        връстниците си.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Преквалификация</span>
                    </div>
                    <div class="info-text">
                        Работиш рутинна работа без добри перспективи за кариерно развитие. Стани част от най-бързо растящият сектор в България, в който добрите условия на труд са задължителни, а допълнителните усилия които полагаш – възнаградени.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Професионално развитие</span>
                    </div>
                    <div class="info-text">
                        Светът около теб се променя с напредването на технологиите. Живеем в 21 век и не е нужно да прекараш 4 години в университет, за да имаш добра кариера. Нашата академия предлага практическо обучение, водено от опитни лектори.
                    </div>
                </div>
                <div class="col-md-1 space"></div>
                <div class="col-md-5">
                    <div class="info-title">
                        <span>Колко мотивация е нужна</span>
                    </div>
                    <div class="info-text">
                        Работиш рутинна работа без добри перспективи за кариерно развитие. Стани част от най-бързо растящият сектор в България, в който добрите условия на труд са задължителни, а допълнителните усилия които полагаш – възнаградени.
                    </div>
                </div>
            </div>
            <div class="col-md-4 info-pic">
                <div class="info-img">
                    <img src="./images/medal-programing-1.png" alt="info-pic" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div id="program">
            <div class="program-title text-center">ПРОГРАМА</div>
            <div class="program-scheme col-md-12 text-center">
                <div id="tabs">
                    <ul class="tabs-nav d-flex flex-wrap flex-row program-nav">
                        <li><a href="#tabs-1">Уеб разработка с PHP</a></li>
                        <li><a href="#tabs-2">Java технологии</a></li>
                    </ul>
                    <div class="program-holder d-flex justify-content-center">
                        <!-- php tab -->
                        <div id="tabs-1" class="p-3 php">
                            <div class="col-md-12 d-flex flex-row flex-wrap php-program-holder">
                                <!-- first lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 1: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/html-transperent.png" alt="html-logo" class="code-logos-program" title="HTML5">
                                        <img src="./images/code-logos/css-original.png" alt="html-logo" class="code-logos-program" title="CSS3">
                                        <img src="./images/code-logos/php-original.png" alt="html-logo" class="code-logos-program" title="PHP7">
                                    </div>
                                </div>
                                <!-- end of first-lvl -->

                                <!-- second lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 2: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/mysql-original.png" alt="html-logo" class="code-logos-program" title="MySQL">
                                        <img src="./images/code-logos/php-original.png" alt="html-logo" class="code-logos-program" title="PHP7">
                                    </div>
                                </div>
                                <!-- end of second lvl -->

                                <!-- third lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 3: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/js-original.png" alt="html-logo" class="code-logos-program" title="JavaScript">
                                        <img src="./images/code-logos/json-original.png" alt="html-logo" class="code-logos-program" title="JSON">
                                        <img src="./images/code-logos/ajax-original.png" alt="html-logo" class="code-logos-program" title="AJAX CALLs">
                                        <img src="./images/code-logos/jquery-original.png" alt="html-logo" class="code-logos-program" title="JQUERY">
                                    </div>
                                </div>
                                <!-- end of third lvl -->

                                <!-- fourth lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 4: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/laravel-original.png" alt="html-logo" class="code-logos-program" title="LARAVEL">
                                    </div>
                                </div>
                                <!-- end of fourth lvl -->
                            </div>
                        </div>
                        <!-- end of php tab -->

                        <!-- java tab -->
                        <div id="tabs-2" class="p-3 java">
                            <div class="col-md-12 d-flex flex-row flex-wrap php-program-holder">
                                <!-- first lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 1: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/java-original.png" alt="html-logo" class="code-logos-program" title="JAVA">
                                        <img src="./images/code-logos/git-original.png" alt="html-logo" class="code-logos-program" title="GIT">
                                        <img src="./images/code-logos/ij-original.png" alt="html-logo" class="code-logos-program" title="IntelliJ">
                                    </div>
                                </div>
                                <!-- end of first-lvl -->

                                <!-- second lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 2: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/java-original.png" alt="html-logo" class="code-logos-program" title="JAVA">
                                        <img src="./images/code-logos/oop-original.png" alt="html-logo" class="code-logos-program" title="JAVA OOP">
                                    </div>
                                </div>
                                <!-- end of second lvl -->

                                <!-- third lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 3: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/a-studio-original.png" alt="html-logo" class="code-logos-program" title="Android Studio">
                                        <img src="./images/code-logos/android-original.png" alt="html-logo" class="code-logos-program" title="Android">
                                    </div>
                                </div>
                                <!-- end of third lvl -->

                                <!-- fourth lvl -->
                                <div class="col-md-12 d-flex flex-row flex-wrap">
                                    <div class="col-md-7 lvl-info">
                                        <p class="program-info">
                                            Какво ще знам и мога след Ниво 4: Ще мога да създавам реални уеб сайтове с WordPress.Ще направя уеб сайт за реален клиент (фирма, организация или човек).
                                        </p>
                                    </div>
                                    <div class="col-md-1 clear-tick"><img src="./images/tick-y-big.png" alt="tick"></div>
                                    <div class="col-md-4 program-info-img">
                                        <img src="./images/code-logos/tom-cat-original.png" alt="html-logo" class="code-logos-program" title="TomCat">
                                        <img src="./images/code-logos/mysql-original.png" alt="html-logo" class="code-logos-program" title="MySQL">
                                        <img src="./images/code-logos/html-transperent.png" alt="html-logo" class="code-logos-program" title="HTML/XML">
                                    </div>
                                </div>
                                <!-- end of fourth lvl -->
                            </div>
                        </div>
                        <!-- end of java tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="section">
        <div id="details">
            <div class="details-title text-center">Детайли</div>
            <div class="details-container col-md-12 d-flex flex-wrap flex-row">
                <div class="col-md-4 first-detail text-center">
                    <img src="./images/detail-1.png" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Продължителност: 9 месеца
                    </span>
                </div>
                <div class="col-md-4 second-detail text-center">
                    <img src="./images/detail-2.png" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Време на провеждане (Интензивност): Два пъти седмично
                    </span>
                </div>
                <div class="col-md-4 third-detail text-center">
                    <img src="./images/rocket-extra-small.png" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Предварителни изисквания: Не е необходима. Курсът е предназначен за начинаещи.
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 fourth-detail text-center">
                    <img src="./images/detail-4.png" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Подготовка вкъщи: ~10 часа
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 fifth-detail text-center">
                    <img src="./images/detail-5.png" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Изпити и проекти: Всяко ниво завършва с изпит и проект.
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-2"></div>

                <div class="col-md-3 sixth-detail text-center">
                    <img src="./images/detail-6.png" alt="info-php-second" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Сертификати: Професионален (над 80%) , обикновен (над 50%)
                    </span>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-3 seventh-detail text-center">
                    <img src="./images/detail-7.png" alt="icon" class="img-fluid">
                    <br />
                    <span class="detail-text">
                        Менторска програма: Да
                    </span>
                </div>

                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

    <div class="section">
        <div id="application">
            <div class="application-title text-center">Кандидатстване</div>
        </div>
        <div class="col-md-12 d-flex flex-row flex-wrap steps-wrapper text-center">
            <!-- circle steps icons -->
            <ul class="steps col-md-12">
                <li>1
                    <span>електронна форма</span>
                </li>
                <li>2
                    <span>предварителен тест</span>
                </li>
                <li>3
                    <span>самостоятелна задача</span>
                </li>
                <li>4
                    <span>интервю</span>
                </li>
                <li class="active-step">5
                    <span>прием</span>
                </li>
            </ul>

            <!-- images -->

            <div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
                <div class="col-md-1"></div>
                <div class="steps col-md-2 first-candidate-img">
                    <img src="./images/candidate-img-step-1.png" alt="step" class="img-fluid candidate-img">
                </div>

                <div class="steps col-md-2">
                    <img src="./images/candidate-img-step-2.png" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="./images/candidate-img-step-3.png" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="./images/candidate-img-step-4.png" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="steps col-md-2">
                    <img src="./images/candidate-img-step-5.png" alt="step" class="img-fluid candidate-img">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12 text-center">
        <span id="prepare" class="end-candidate"><a href="#">КАНДИДАТСТВАЙ</a></span>
    </div>
    </div>
    <script src="./js/hamburger-menu.js"></script>
    <script src="./js/program-tabs.js"></script>
    <script>
        $(function() {
            $('.main-nav-list > li > a').on('click', function() {
                $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top
                }, 500, 'linear');
            });

            $('#prepare > a').on('click', function() {
                $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top
                }, 1000, 'linear');
            });
        });
    </script>

    <script>
        var headeroffset = $("#header-sticky").offset();
        var sticky = headeroffset.top;
        $(window).scroll(function() {
            if (window.pageYOffset > sticky) {
                $("#header-sticky").addClass('sticky');
            } else {
                $("#header-sticky").removeClass('sticky');
            }
        });
    </script>
</body>

</html>
