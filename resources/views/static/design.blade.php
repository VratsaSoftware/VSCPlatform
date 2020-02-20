@extends('static.courses_template')
@section('title', 'Курс по Дизайн')
@section('content')
	<div class="section">
		<div id="header" style="background: url(./images/cover-img-smallest.png)">
			<!-- hamburger -->
		@include('static.includes.bg.hamburger_menu')
		<!-- end of hamburger -->
			<div class="overlay-marketing overlay-design">
				<div id="logo" class="col-md-12 text-center">
					<a href="{{route('home')}}"><img src="{{asset('/images/logoVStext.png')}}" alt="vso-logo" class="img-fluid" width="20%"></a>
				</div>
				
				<div class="header-title col-md-12 text-center">
					<span>Щриховай бъдещето си с ценни<br /> умения по дигитален дизайн</span>
				</div>
				<div class="header-button col-md-12 text-center mb-5" style="visibility:visible">
					<span id="prepare" class="end-candidate marketing-candidate-btn"><a href="{{route('application.create',['type' => $type])}}">Кандидаствай</a></span>
				</div>
{{--				<div class="header-sub-title col-md-12 text-center">--}}
{{--					<span class="timer-digital"><img src="{{asset('/images/loaders/load-32.gif')}}" alt="timer"/></span>--}}
{{--				</div>--}}
				
				<div class="header-menu col-md-12 header-marketing header-design" id="header-sticky">
					<nav class="text-center">
						<ul class="d-flex flex-wrap main-nav-list">
							<li class="p-3"><img src="{{asset('/images/logoVStext.png')}}" alt="vso-logo" class="img-fluid"></li>
							<li class="p-3"><a href="{{route('home')}}">Начало</a></li>
							<li class="p-3"><a href="#information-holder">Информация</a></li>
							<li class="p-3"><a href="#program-holder">Програма</a></li>
							<li class="p-3"><a href="#lecturers-holder">Лектори</a></li>
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
				<div class="col-md-12 text-center">
					<div class="info-title text-center">
						<span>Въведение в курса</span>
					</div>
					<div class="info-text text-center" style="margin-bottom:0!important">
						В съвремения свят всеки човек и индустрия гледат към технологиите и дигиталното развитие. Има нови и нови професии, които са все по-предпочитани, като това не е нещо ново за обществото. Всяка ера на човечеството е изисквала от хората да бъдат модерни, следващи тенденциите на своето време. Нуждата, да практикуват професии, които са печеливши, както финансово, така и спрямо социалния статус на всеки.
						<br/>Изкуството обаче остава онова нещо, което е преминало хилядолетия, развивайки се във времето по много и различни начини. То е от тези чудеса на човека, за които трудно има точно обяснение. Неговата практична и емоционална зависимост е от най-високо значение за едно разиващо се обещство. Дизайнът пък от своя страна е изключителна важна част от изкуството в модерния свят. А както е написано в Wikipedia, Дизайн се нарича естетическото и ергономично комплексно свойство на дадено изображение и/или изделие на приложното изкуство и/или промишлеността. Или в общи линии обхваща почти всички индустрии в познатия свят. Това дава възможност на хората посветени в този вид изкуство, да бъдат силно уважавани и високо оцененявани!
					</div>
				</div>
			</div>
			<div class="col-md-4 info-pic">
				<div class="info-img" style="padding-top:1vw;padding-bottom:0">
					<img src="{{asset('/images/design/desing_main.jpg')}}" alt="info-pic" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	
	<div id="program-holder">
	
	</div>
	<div id="program">
		<div class="program-title text-center">Програма</div>
	</div>
	<div class="section d-flex flex-row flex-wrap text-center">
		<div class="col-md-6 col-xs-12 text-center">
			<div class="snip1527" style="max-width:510px;">
				<div class="image"><img src="{{asset('images/design/level_1.jpg')}}" alt="pr-sample23" /></div>
				<figcaption id="design-text-holder">
					<div class="date" style="color:#B910ED"><span class="day">1</span><span class="month">ниво</span></div>
					<span class="levels-title">Графичен дизайн - Защо това да бъде моята професия?</span>
					<p>
						Този модул ще разгърне основите на дизайна, видовете дизайн и защо тази професия е изключително важна и ценена.
						Голяма част от курсовете на този модул, ще съчетават, както теоритична, така и практична работа.
						Целта е в кратък срок курсистите да придобият основни познания за индустрията и да придобият базисни умения с основен софтуер.
					</p>
				</figcaption>
			</div>
		</div>
		
		<div class="col-md-6 col-xs-12 text-center">
			<div class="snip1527" style="max-width:510px;">
				<div class="image"><img src="{{asset('images/design/level_2.jpg')}}" alt="pr-sample24" /></div>
				<figcaption id="design-text-holder">
					<div class="date" style="color:#B910ED"><span class="day">2</span><span class="month">ниво</span></div>
					<span class="levels-title">След основата са важни детаилите и конкретиката!</span>
					<p>
						Този модул ще задълбае в основните стъпки на графичния дизайн, нужни за всеки дизайнер, независимо от вида дизайн, с който иска да се развива.<br/>
						Ще бъде наситен от изключително много примери от бизнес средата на най-високо ниво, както и много практични курсове в работата и осъвършенстването на най-често използвания софтуер в дизайна.
					</p>
				</figcaption>
			</div>
		</div>
		<div class="col-md-12" style="visibility: hidden;">a</div>
		<div class="col-md-6 col-xs-12 text-center">
			<div class="snip1527" style="max-width:510px;">
				<div class="image"><img src="{{asset('images/design/level_3.jpg')}}" alt="pr-sample25" /></div>
				<figcaption id="design-text-holder">
					<div class="date" style="color:#B910ED"><span class="day">3</span><span class="month">ниво</span></div>
					<span class="levels-title">За да си много добър, трябва да спазваш определени стъпки!</span>
					<p>
						В рамките на този модул ще бъде насочено вниманието към изграждането на бранд, корпоративна идентичност, работа с клиент, корекции и др.Работа в РЕКЛАМНАТА ИНДУСТРИЯ - високо динамична среда, рекламни послания, типография, ключови визии, графичен дизайн към видео продукция и много други.
						Фокус към практичена работа със софтуер тип редактор на векторна графика, векторни изображения и др.
					</p>
				</figcaption>
			</div>
		</div>
		
		<div class="col-md-6 col-xs-12 text-center">
			<div class="snip1527" style="max-width:510px;">
				<div class="image"><img src="{{asset('images/design/level_4.jpg')}}" alt="pr-sample25" /></div>
				<figcaption id="design-text-holder">
					<div class="date" style="color:#B910ED"><span class="day">4</span><span class="month">ниво</span></div>
					<span class="levels-title">Когато знаем много, можем да<br/> избираме!</span>
					<p>
						За един добър дизайнер може да се каже, че може да работи по различен тип дизайн проекти. Ето защо този модул ще насочи практичната работа в развитието на дигиталните технологии, WEB design, дизайн на приложения и интерактивен дизайн.
						Tips and tricks или как да отидем в друго измерение на познанията си. Как всеки работодател или клиент да знае, че може да разчита на нас!
					</p>
				</figcaption>
			</div>
		</div>
	</div>
	
	<div id="lecturers-holder">
	
	</div>
	<div class="section">
		<div class="program-title text-center lecturers-title">Лектори</div>
		<!-- Team -->
		<section id="team" class="pb-5">
			<div class="d-flex flex-row flex-wrap text-center">
				<!-- Team member -->
				<div class="col-md-4">
					<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
						<div class="mainflip">
							<div class="frontside">
								<div class="card">
									<div class="card-body text-center">
										<p><img class=" img-fluid" src="{{asset('/images/design/Kalin_Iliev_Photo.JPG')}}" alt="card image"></p>
										<h4 class="card-title under-program"><span class="design-content">Калин Илиев</span></h4>
										<p class="card-text"></p>
									</div>
								</div>
							</div>
							<div class="backside">
								<div class="card" style="height:400px">
									<div class="card-body text-center mt-4">
										<h4 class="card-title under-program"><span class="design-content">Калин Илиев</span></h4>
										<p class="card-text">Той винаги е готов да прави това, което го кара да се чувства щастлив.
											Вече повече от 10 години развива различни проекти в областите на графичния и индустриалния дизайн, онлайн пазари, видео реклама и дигитален маркетинг. В доказателство на това, че успехът е възможен, той постига една след друга, всяка своя мечта.
											Посредством невероятните хора, с които работи, за последните 9 години той реализира няколко страхотни проекти, които с усмивка нарича свои деца, а не бизнес (<a
													href="http://wonderswamp.com/" target="_blank" class="design-content">WonderSwamp studio</a>,
											<a href="http://www.eyasdesign.com/" target="_blank" class="design-content">Eyas Design</a> и дигиталната агенция -
											<a href="http://branda.bg/" target="_blank" class="design-content">BrandЪ)</a>.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ./Team member -->
				
				<!-- Team member -->
				<div class="col-md-4">
					<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
						<div class="mainflip">
							<div class="frontside">
								<div class="card">
									<div class="card-body text-center">
										<p><img class=" img-fluid" src="{{asset('images/design/62013394_912084999144539_1416364256689766791_n.jpg')}}" alt="card image"></p>
										<h4 class="card-title under-program"><span class="design-content">Ставри Георгиев</span></h4>
										<p class="card-text"></p>
									</div>
								</div>
							</div>
							<div class="backside">
								<div class="card" style="height:400px">
									<div class="card-body text-center mt-4">
										<h4 class="card-title under-program"><span class="design-content">Ставри Георгиев</span></h4>
										<p class="card-text">Не случайно неговите умения и качества го класират едва на 22-ве годишна възраст в престижната класация на списание Forbes "30 под 30", която отличава водещите млади лидери в България.
											Той не само успешно ръководи екипи от дизайнери, но и е управляващ партньор в няколко компании като една от тях е <a href="http://www.eyasdesign.com/" target="_blank" class="design-content">Eyas Design</a> - част от дигиталната агенция <a href="http://branda.bg/" target="_blank" class="design-content">BrandЪ</a>. За последните 5 години работи със десетки български и международни брандове не само като дизайнер, но и като директна връзка с клиентите.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ./Team member -->
				
				<!-- Team member -->
				<div class="col-md-4">
					<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
						<div class="mainflip">
							<div class="frontside">
								<div class="card">
									<div class="card-body text-center">
										<p><img class=" img-fluid" src="{{asset('images/design/gars3.jpg')}}" alt="card image"></p>
										<h4 class="card-title under-program"><span class="design-content">Георги Лютибродски - Гарс</span></h4>
										<p class="card-text"></p>
									</div>
								</div>
							</div>
							<div class="backside">
								<div class="card" style="height:400px">
									<div class="card-body text-center mt-4">
										<h4 class="card-title under-program"><span class="design-content">Георги Лютибродски - Гарс</span></h4>
										<p class="card-text">
											Всичко стартира през далечната 1993-та, когато започва работа в рекламна къща БекАрт - Враца. От 1999-та се премества в София и от тогава работи в едни от най-големите рекламни агенции за най-известните български и международни брандове като Загорка, Ариана, Olympos, Astera, Smirnoff, Jameson, Kia и много много други.
											Има над 25 години опит в работата с различни софтуери като Illustrator, InDesign и Photoshop, както и отлични умения в типографията, предпечатните процеси и 3Д графиката.
											</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ./Team member -->
			</div>
		</section>
		<!-- Team -->
	</div>
	
	<div id="details-holder">
	
	</div>
	<div class="section">
		<div id="details" class="marketing-details">
			<div class="details-title text-center">Детайли</div>
			<div class="details-container d-flex flex-row flex-wrap text-center">
				<div class="col-md-4">
					<div class="card card-2 text-center design-boxes">
						<div class="details-info col-md-12 d-flex flex-row flex-wrap">
							<div class="col-md-12">
								<img src="{{asset('/images/design/calendar.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/calendar.png')}}">
							</div>
							<div class="col-md-12 title-details-digi">
								Продължителност
							</div>
							<div class="col-md-12">
								Занятията се провеждат веднъж или два пъти седмично в удобно време, съобразено с работещи и ученици.
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card card-2 text-center design-boxes">
						<div class="details-info col-md-12 d-flex flex-row flex-wrap">
							<div class="col-md-12">
								<img src="{{asset('/images/design/startup.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/startup.png')}}">
							</div>
							<div class="col-md-12 title-details-digi">
								Трудност
							</div>
							<div class="col-md-12">
								Курсът е предназначен за начинаещи, но въпреки това е интензивен и е нужно да се полагат много усилия.
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card card-2 text-center design-boxes">
						<div class="details-info col-md-12 d-flex flex-row flex-wrap">
							<div class="col-md-12">
								<img src="{{asset('/images/design/contract.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/contract.png')}}">
							</div>
							<div class="col-md-12 title-details-digi">
								Практически насочен
							</div>
							<div class="col-md-12">
								Курсът включва малко теория и много практика. Всяко ниво завършва с изпит и финален проект.
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 spacer-program"></div>
				
				<div class="col-md-4">
					<div class="card card-2 text-center design-boxes">
						<div class="details-info col-md-12 d-flex flex-row flex-wrap">
							<div class="col-md-12">
								<img src="{{asset('/images/design/medal.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/medal.png')}}">
							</div>
							<div class="col-md-12 title-details-digi">
								Сертификат
							</div>
							<div class="col-md-12">
								Успешно покрилите 50% от критериите получават сертификат за участие, а тези над 80% - професионален сертификат.
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card card-2 text-center design-boxes">
						<div class="details-info col-md-12 d-flex flex-row flex-wrap">
							<div class="col-md-12">
								<img src="{{asset('/images/design/payment.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/payment.png')}}">
							</div>
							<div class="col-md-12 title-details-digi">
								Цена
							</div>
							<div class="col-md-12">
								Курсът е безплатен
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card card-2 text-center design-boxes">
						<div class="details-info col-md-12 d-flex flex-row flex-wrap">
							<div class="col-md-12">
								<img src="{{asset('/images/design/goal.png')}}" alt="digi-icon" data-hover-img="{{asset('/images/digi_marketing/icons/goal.png')}}">
							</div>
							<div class="col-md-12 title-details-digi">
								Менторска програма
							</div>
							<div class="col-md-12">
								Успешните курсисти имат възможност да работят заедно с опитен ментор по реален проект за НПО.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="application-holder">
		
		</div>
		<!-- partners/sponsors section -->
		<div class="section" style="margin-top:10%">
			<div id="partners" class="col-md-12">
				<div class="partners-title col-md-12 text-center application-title" style="margin-bottom:5%">
					<span>Настоящият проект се осъществи благодарение на най-голямата социално отговорна
						инициатива на<br/> Лидл България „Ти и Lidl за по-добър живот“, в партньорство с Фондация
						„Работилница за граждански инициативи“ и <br/> Български дарителски форум.
					</span>
				</div>
				<!-- only 4 visible -->
				<div class="col-md-12 d-flex flex-row flex-wrap sponsors-logos b-description_readmore js-description_readmore text-center more-sponsors">
					<div class="p-3 col-md-4 sponsors-1"><a href="http://ti.lidl.bg/" target=" _blank"><img src="{{asset('/images/design/lidl.png')}}" alt="us4bg-logo" class="img-fluid" style="width:47%"></a></div>
					<div class="p-3 col-md-4 sponsors-3"><a href="https://frgi.bg/" target=" _blank"><img src="{{asset('/images/design/WCIF.png')}}" alt="vratsa-municipality-logo" class="img-fluid"></a></div>
					<div class="p-3 col-md-4 sponsors-2"><a href="https://www.dfbulgaria.org/" target=" _blank"><img src="{{asset('/images/design/BDF.png')}}" alt="promianata-logo" class="img-fluid" style="margin-top:9%"></a></div>
				</div>
				<div class="col-md-5">
				
				</div>
				<div class="col-md-5">
				
				</div>
				<!-- end of only 4 visible -->
			</div>
		</div>
		<!-- end of partners/sponsors section -->
		<div class="section">
			<div id="application" style="padding-top:5vw;">
				<div class="application-title text-center">Кандидатстване</div>
			</div>
			<div class="col-md-12 d-flex flex-row flex-wrap steps-wrapper text-center">
				<!-- circle steps icons -->
				<ul class="steps col-md-12">
					<li class="marketing-steps design-steps" style="background-color: #B910ED !important;color:#fff !important">1
						<span>електронна форма</span>
					</li>
					<li class="marketing-steps design-steps" style="background-color: #B910ED !important;color:#fff !important">2
						<span>самостоятелна задача</span>
					</li>
					<li class="marketing-steps design-steps" style="background-color: #B910ED !important;color:#fff !important">3
						<span style="margin-left:-4vw">интервю</span>
					</li>
					<li class="marketing-steps design-steps" style="background-color: #B910ED !important;color:#fff !important">4
						<span style="margin-left:-3vw">прием</span>
					</li>
				</ul>
				
				<!-- images -->
				
				<div class="candidate-imgs col-md-12 flex-row flex-wrap text-center">
					<div class="col-md-2"></div>
					<div class="steps col-md-2 first-candidate-img">
						<img src="{{asset('/images/digi-1.png')}}" alt="step" class="img-fluid candidate-img" style="margin-left:-30%">
					</div>
					<div class="steps col-md-2">
						<img src="{{asset('/images/digi-3.png')}}" alt="step" class="img-fluid candidate-img" style="margin-left:-12%">
					</div>
					<div class="steps col-md-2">
						<img src="{{asset('/images/digi-4.png')}}" alt="step" class="img-fluid candidate-img" style="margin-right:-17%">
					</div>
					<div class="steps col-md-2">
						<img src="{{asset('/images/digi-5.png')}}" alt="step" class="img-fluid candidate-img" style="margin-left:54%;">
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<span id="prepare-digi" class="end-candidate marketing-candidate-btn design-candidate-btn" style="background: #B910ED !important;border:1px solid #B910ED !important"><a href="{{route('application.create',['type' => $type])}}">КАНДИДАТСТВАЙ</a></span>
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
                if (window.pageYOffset >= sticky && !$("#header-sticky").hasClass('sticky-design')) {
                    $("#header-sticky").addClass('sticky-design');
                }
                if(window.pageYOffset < sticky && $("#header-sticky").hasClass('sticky-design')) {
                    $("#header-sticky").removeClass('sticky-design');
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
