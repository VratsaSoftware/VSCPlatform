@extends('layouts.template')
@section('title', 'Тестове')
@section('content')
    <link rel="stylesheet" href="./css/create_tests.css">
    @if (!empty(Session::get('success')))
        <p>
            <div class="alert alert-success slide-on" style="margin-top:-40px">
                <p>{{ session('success') }}</p>
            </div>
        </p>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger slide-on" style="margin-top:-40px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="section">
        <div class="col-md-12 d-flex flex-row flex-wrap test-statistic-wrapper">
            <div class="col-md-12 text-center">Количество</div>
            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Общо Въпроси</div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text">
                            {{count($questions)}}
                        </div>
                    </div>
                </div>
            </div>
            @foreach($banks as $bank)
                <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                    <div class="col-md-12">{{$bank->name}}</div>
                    <div class="col-md-12">
                        <div class="circles">
                            <div class="circle-with-text">
                                {{$bank->questions_count}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-12 dif-wrapper d-flex flex-row flex-wrap" id="dif-wrapper">
            <div class="col-md-12 text-center">Трудност</div>
            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Лесни</div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text easy">
                            {{$difficultyCount['easy']}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Нормални</div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text normal">
                            {{$difficultyCount['medium']}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-2 all-questions text-center d-flex flex-row flex-wrap">
                <div class="col-md-12">Трудни &nbsp;<i class="fas fa-medal"></i></div>
                <div class="col-md-12">
                    <div class="circles">
                        <div class="circle-with-text hard">
                            {{$difficultyCount['hard']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal for editing elements -->
        <div id="modal">
            <div class="modal-content print-body">
                <div class="modal-header">
                    <h2></h2>
                </div>
                <div class="copy text-center">

                    <p>

                    </p>

                    </form>
                </div>
                <div class="cf footer">
                    <div></div>
                    <a href="#" class="btn close-modal">Затвори</a>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <!-- end of modal -->
        <div id="banks" class="col-md-12 test-wrapper d-flex flex-row flex-wrap">
            <!-- test nav -->
            <div class="col-md-12 text-left" style="margin-top: -4%;">
                <a href="#modal" class="add-bank">
                    <img src="{{asset('/images/profile/add-icon.png')}}" alt="add">&nbsp;Добави Банка
                </a>
                <div class="col-md-12 create-bank">
                    <form action="{{route('create.bank')}}" id="create-bank-form" method="POST"
                          enctype='multipart/form-data'>
                        {{ csrf_field() }}

                        <p>
                            <label for="title">Заглавие/Име</label>
                        </p>
                        <p>
                            <input type="text" name="title" placeholder="въведи име на банката/теста" value="{{old('title')}}">
                        <hr>
                        </p>
                        <p>
                            Снимка/лого
                        </p>
                        <p>
                            <input type="file" name="bank_img">
                        </p>
                        <hr>
                        <div class="add-banks-template col-md-12">
                            <p>
                                Въпроси:<select name="from_bank[]">
                                    <option selected></option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <div class="d-flex flex-row flex-wrap col-md-12">
                                <div class="col-md-4">Лесни : <input name="from_bank_easy[]" type="number"></div>
                                <div class="col-md-4">Средни : <input name="from_bank_medium[]" type="number"></div>
                                <div class="col-md-4">Трудни : <input name="from_bank_hard[]" type="number"></div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-12 add-more-options">
                            <a href=""><img src="{{asset('/images/profile/add-icon.png')}}" alt="add"></a>
                        </div>
                        <script>
                            $('.add-more-options > a').on('click', function (e) {
                                e.preventDefault();
                                var addingQ = $('.add-banks-template').last().clone(true);
                                $(this).parent().prev('.add-banks-template').after(addingQ);
                            });
                        </script>

                    </form>
                </div>
            </div>
            <div class="col-md-4 test-nav d-flex flex-row flex-wrap">
                @foreach($banks as $bank)
                    <div class="col-md-12 d-flex flex-row flex-wrap bank-holder">
                        <span class="col-md-5 text-left">{{$bank->name}}</span>
                        <span class="col-md-2 text-center"></span>
                        <span class="col-md-5 text-center"><i class="fas fa-book"></i>&nbsp;{{$bank->questions_count}}&nbsp;<i
                                    class="fas fa-medal"></i>&nbsp;{{$bank->difficultyCount['hard']}}</span>
                    </div>

                    <div class="no-show data-container col-md-12">
                        <div class="col-md-12 bank-statistic-holder">
                            <li class="list-group-item list-group-item-light col-md-12 d-flex flex-row flex-wrap text-center bank-statistic">
                                <div class="col-md-3">Общо: <span>{{$bank->questions_count}}</span></div>
                                <div class="col-md-3">Лесни: <span>{{$bank->difficultyCount['easy']}}</span></div>
                                <div class="col-md-3">Средни: <span>{{$bank->difficultyCount['medium']}}</span></div>
                                <div class="col-md-3">Трудни: <span>{{$bank->difficultyCount['hard']}}</span></div>
                            </li>
                        </div>

                        <div class="col-md-12">
                            <ul class="list-group tests-list">
                                <li class="list-group-item list-group-item-success add-question">
                                    <a href="#modal"><img src="./images/profile/add-icon.png" alt="add">&nbsp;Добави</a>
                                </li>
                                <div class="create-question">
                                    <div class="col-md-12">
                                        Тип:&nbsp;<select name="types" class="q-types" id="q-types">
                                            <option disabled selected value>Избери Тип</option>
                                            <option value="0">Отворен</option>
                                            <option value="1">Един Верен</option>
                                            <option value="2">Много Верни</option>
                                        </select>
                                    </div>
                                    <!-- //adding question fields -->
                                    <script>
                                        $('#q-types').on('change', function () {
                                            var selected = $(this).val();
                                            // $('.modal-content > .cf > div').html('<input class="btn send-bank" type="submit" value="Добави">');
                                            switch (selected) {
                                                case '0':
                                                    $('.copy > p ').find('.q-one').remove();
                                                    $('.copy > p > div:nth-child(1)').find('i').remove()
                                                    $('.copy > p ').find('.q-many').remove();
                                                    $(this).parent().parent().append($('.q-open-wrap').html());
                                                    break;
                                                case '1':
                                                    $('.copy > p ').find('.q-open').remove();
                                                    $('.copy > p > div:nth-child(1)').find('i').remove()
                                                    $('.copy > p ').find('.q-many').remove();
                                                    $(this).parent().parent().append($('.q-one-wrap').html());
                                                    break;
                                                case '2':
                                                    $('.copy > p ').find('.q-open').remove();
                                                    $('.copy > p > div:nth-child(1)').find('i').remove()
                                                    $('.copy > p ').find('.q-one').remove();
                                                    $(this).parent().parent().append($('.q-many-wrap').html());
                                                    break;
                                                default:
                                            }
                                        });
                                    </script>
                                </div>
                                <!-- open question box holder -->
                                <div class="col-md-12 q-open-wrap">
                                    <div class="col-md-12 questions-box q-open">
                                        въпрос: <br>
                                        <textarea name="q-open" id="q-open" cols="30" rows="5"></textarea>
                                        <br>
                                        <select name="diff" id="diff">
                                            <option disabled selected value="0">Трудност</option>
                                            <option value="1">лесен</option>
                                            <option value="2">нормален</option>
                                            <option value="3">труден</option>
                                        </select>&nbsp;&nbsp;
                                        <input type="radio" name="bonus" value="0" id="no-bonus" checked> <label
                                                for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                                        <input type="radio" name="bonus" value="1" id="yess-bonus"> <label
                                                for="yess-bonus">Бонус</label>
                                        <script type="text/javascript">
                                            var addedThropyOpen = false;

                                            $('#yess-bonus').on('click', function () {
                                                if (!addedThropyOpen) {
                                                    $('.copy > p > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                                                    $(this).next('label').after('&nbsp;&nbsp;<input type="number" class="bonus-points">');
                                                    addedThropyOpen = true;
                                                }
                                            });

                                            $('#no-bonus').on('click', function () {
                                                if (addedThropyOpen) {
                                                    $('.copy > p > div:nth-child(1)').find('i').remove();
                                                    $('.bonus-points').remove();
                                                    addedThropyOpen = false;
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <!-- end of open qustion box holder -->

                                <!-- one question box holder -->
                                <div class="col-md-12 q-one-wrap">
                                    <div class="col-md-12 questions-box q-one">
                                        <p>въпрос: <br>
                                            <textarea name="q-one" id="q-one" cols="30" rows="5"></textarea>
                                            <br>
                                            <select name="diff">
                                                <option disabled selected value="0">Трудност</option>
                                                <option value="1">лесен</option>
                                                <option value="2">нормален</option>
                                                <option value="3">труден</option>
                                            </select>&nbsp;&nbsp;
                                            <input type="radio" name="bonus" value="0" id="no-bonus" checked> <label
                                                    for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                                            <input type="radio" name="bonus" value="1" id="yess-bonus"> <label
                                                    for="yess-bonus">Бонус</label>
                                        </p>
                                        <p>отговори:</p>
                                        <p class="input-answers">
                                            <a href="" class="icon-click"><i
                                                        class="fas fa-check-circle"></i></a>&nbsp;<input type="text"
                                                                                                         class="q-one-answer"><a
                                                    href="" class="remove-q modal-remove-q"><i class="fas fa-times"></i></a>
                                        </p>
                                        <div class="col-md-12 add-answers">
                                            <a href="">
                                                <img src="./images/profile/add-icon.png" alt="add">
                                            </a>
                                            <span></span>
                                        </div>
                                        <script>
                                            var addedThropy = false;

                                            $('#yess-bonus').on('click', function () {
                                                if (!addedThropy) {
                                                    $('.copy > p > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                                                    $(this).next('label').after('&nbsp;&nbsp;<input type="number" class="bonus-points">');
                                                    addedThropy = true;
                                                }
                                            });

                                            $('#no-bonus').on('click', function () {
                                                if (addedThropy) {
                                                    $('.copy > p > div:nth-child(1)').find('i').remove();
                                                    $('.bonus-points').remove();
                                                    addedThropy = false;
                                                }
                                            });

                                            $('.add-answers > a').on('click', function (e) {
                                                e.preventDefault();

                                                var addAnswer = $('.copy > p > .q-one >  .input-answers').last().clone(true);
                                                // if cloning correct answer box remove the class
                                                if (addAnswer.find('a').hasClass('corect-answer-one')) {
                                                    addAnswer.find('a').removeClass('corect-answer-one');
                                                    addAnswer.find('.q-one-answer').removeClass('corect-answer-one');
                                                    // addAnswer.find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                }

                                                $('.q-one > .add-answers').prev('.input-answers').after(addAnswer);
                                                var numAnswers = ($('.copy > p > .q-one').find('.input-answers').length);
                                                $('.q-one > .add-answers > span').html(numAnswers);
                                            });

                                            $('.icon-click').on('click', function (e) {
                                                e.preventDefault();
                                                if (!$(this).hasClass('corect-answer-one')) {
                                                    $(this).addClass('corect-answer-one');
                                                    // $(this).find('.fas').removeClass('fa-check-circle').addClass('fa-times');
                                                    $(this).next('.q-one-answer').addClass('corect-answer-one');
                                                    $(this).parent().prevAll().find('a').removeClass('corect-answer-one');
                                                    $(this).parent().prevAll().find('a').next('.q-one-answer').removeClass('corect-answer-one');
                                                    // $(this).parent().prevAll().find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                    $(this).parent().nextAll().find('a').removeClass('corect-answer-one');
                                                    $(this).parent().nextAll().find('a').next('.q-one-answer').removeClass('corect-answer-one');
                                                    // $(this).parent().nextAll().find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                } else {
                                                    $(this).removeClass('corect-answer-one');
                                                    $(this).next('.q-one-answer').removeClass('corect-answer-one');
                                                }
                                            });

                                            $('.remove-q').on('click', function (e) {
                                                e.preventDefault();
                                                if ($('.copy > p > .q-one').find('.input-answers').length > 1) {
                                                    $(this).parent().remove();
                                                    var numAnswers = ($('.copy > p > .q-one').find('.input-answers').length);
                                                    $('.q-one > .add-answers > span').html(numAnswers);
                                                }
                                            });
                                        </script>

                                    </div>
                                </div>
                                <!-- end of one qustion box holder -->

                                <!-- many question box holder -->
                                <div class="col-md-12 q-many-wrap">
                                    <div class="col-md-12 questions-box q-many">
                                        <p>въпрос: <br>
                                            <textarea name="q-many" id="" cols="30" rows="5"></textarea>
                                            <br>
                                            <select name="diff">
                                                <option disabled selected value="0">Трудност</option>
                                                <option value="1">лесен</option>
                                                <option value="2">нормален</option>
                                                <option value="3">труден</option>
                                            </select>&nbsp;&nbsp;
                                            <input type="radio" name="bonus" value="0" id="no-bonus" checked> <label
                                                    for="no-bonus">Без Бонус</label>&nbsp;&nbsp;
                                            <input type="radio" name="bonus" value="1" id="yess-bonus"> <label
                                                    for="yess-bonus">Бонус</label>
                                        </p>
                                        <p class="input-answers">
                                            <a href="" class="icon-click-many"><i class="fas fa-check-circle"></i></a>&nbsp;<textarea
                                                    class="q-many-answer" cols="30"></textarea><a href=""
                                                                                                  class="remove-q"><i
                                                        class="fas fa-times"></i></a>
                                        </p>
                                        <div class="col-md-12 add-answers-many">
                                            <a href="">
                                                <img src="./images/profile/add-icon.png" alt="add">
                                            </a>
                                            <span></span>
                                        </div>
                                        <script type="text/javascript">
                                            var addedThropyMany = false;

                                            $('#yess-bonus').on('click', function () {
                                                if (!addedThropyMany) {
                                                    $('.copy > p > div:nth-child(1)').append('<i class="fas fa-trophy"></i>');
                                                    $(this).next('label').after('&nbsp;&nbsp;<input type="number" class="bonus-points">');
                                                    addedThropyMany = true;
                                                }
                                            });

                                            $('#no-bonus').on('click', function () {
                                                if (addedThropyMany) {
                                                    $('.copy > p > div:nth-child(1)').find('i').remove();
                                                    $('.bonus-points').remove();
                                                    addedThropyMany = false;
                                                }
                                            });

                                            $('.add-answers-many > a').on('click', function (e) {
                                                e.preventDefault();

                                                var addAnswer = $('.copy > p > .q-many >  .input-answers').last().clone(true);
                                                // if cloning correct answer box remove the class
                                                if (addAnswer.find('a').hasClass('corect-answer-one')) {
                                                    addAnswer.find('a').removeClass('corect-answer-one');
                                                    addAnswer.find('.q-many-answer').removeClass('corect-answer-one');
                                                    // addAnswer.find('a').find('.fas').removeClass('fa-times').addClass('fa-check-circle');
                                                }

                                                $('.q-many > .add-answers-many').prev('.input-answers').after(addAnswer);
                                                var numAnswers = ($('.copy > p > .q-many > .input-answers').find('.corect-answer-one').length / 2);
                                                var maxAnswers = ($('.copy > p > .q-many > .input-answers').length);


                                                $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);

                                            });

                                            $('.remove-q').on('click', function (e) {
                                                e.preventDefault();
                                                if ($('.copy > p > .q-many').find('.input-answers').length > 1) {

                                                    var maxAnswers = ($('.copy > p > .q-many >.input-answers').length);
                                                    if (maxAnswers > 0) {
                                                        maxAnswers -= 1;
                                                    }

                                                    //if clicked to remove element have correct class remove answers count - 1
                                                    if ($(this).parent().find('.icon-click-many').hasClass('corect-answer-one')) {
                                                        numAnswers -= 1;
                                                    }

                                                    $(this).parent().remove();
                                                    var numAnswers = ($('.copy > p > .q-many > .input-answers').find('.corect-answer-one').length / 2);

                                                    $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                                                }
                                            });

                                            $('.icon-click-many').on('click', function (e) {
                                                e.preventDefault();
                                                if (!$(this).hasClass('corect-answer-one')) {
                                                    $(this).addClass('corect-answer-one');
                                                    $(this).next('.q-many-answer').addClass('corect-answer-one');

                                                    var numAnswers = (($('.copy > p > .q-many > .input-answers').find('.corect-answer-one').length / 2) - 1);
                                                    var maxAnswers = ($('.copy > p > .q-many > .input-answers').length);
                                                    numAnswers += 1;
                                                    $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                                                } else {
                                                    $(this).removeClass('corect-answer-one');
                                                    $(this).next('.q-many-answer').removeClass('corect-answer-one');
                                                    var numAnswers = (($('.copy > p > .q-many > .input-answers').find('.corect-answer-one').length / 2));
                                                    var maxAnswers = ($('.copy > p > .q-many > .input-answers').length);

                                                    $('.q-many > .add-answers-many > span').html(numAnswers + '/' + maxAnswers);
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <!-- end of many qustion box holder -->

                            @foreach($bank->Questions as $question)
                                @if($question->type == 'open')
                                    <!-- open question -->
                                        @switch($question->difficulty)
                                            @case(1)
                                            <li class="list-group-item list-group-item-dark col-md-12 d-flex flex-row flex-wrap">
                                            @break
                                            @case(2)
                                            <li class="list-group-item list-group-item-primary col-md-12 d-flex flex-row flex-wrap">
                                            @break
                                            @case(3)
                                            <li class="list-group-item list-group-item-danger col-md-12 d-flex flex-row flex-wrap">
                                                @break
                                                @endswitch
                                                <p>
                                                <div class="col-md-7 question">
                                                    {{$question->question}}
                                                </div>
                                                <div class="col-md-5 text-right">
                                                    <span class="col-md-4"><i class="fas fa-keyboard"></i></span>
                                                    <span class="col-md-4 num-correct">X</span>
                                                    <span class="col-md-2"><a href="" class="edit-question"><i
                                                                    class="fas fa-pencil-alt"></i></a></span>
                                                    <span class="col-md-2"><a href=""><i
                                                                    class="fas fa-times"></i></a></span>
                                                </div>
                                                </p>
                                                <p>
                                                <div class="col-md-12">
                                                    <span class="correct-open corect-answer">{{$question->Answers[0]->answer}}</span>
                                                    <ul class="answers-list">
                                                    </ul>
                                                    <div class="col-md-12 text-right trophy-bonus"></div>
                                                </div>
                                                </p>
                                            </li>
                                            <!-- end of open question -->
                                            @endif

                                            @if($question->type == 'many')
                                            <!-- /multiple -->
                                                @switch($question->difficulty)
                                                    @case(1)
                                                    <li class="list-group-item list-group-item-dark col-md-12 d-flex flex-row flex-wrap">
                                                    @break
                                                    @case(2)
                                                    <li class="list-group-item list-group-item-primary col-md-12 d-flex flex-row flex-wrap">
                                                    @break
                                                    @case(3)
                                                    <li class="list-group-item list-group-item-danger col-md-12 d-flex flex-row flex-wrap">
                                                        @break
                                                        @endswitch
                                                        <p>
                                                        <div class="col-md-7 question">
                                                            {{$question->question}}
                                                        </div>
                                                        <div class="col-md-5 text-right">
                                                            <span class="col-md-4"><i
                                                                        class="far fa-check-square"></i></span>
                                                            <span class="col-md-4 num-correct">{{$question->correctCount}}</span>
                                                            <span class="col-md-2"><a href="" class="edit-question"><i
                                                                            class="fas fa-pencil-alt"></i></a></span>
                                                            <span class="col-md-2"><a href=""><i
                                                                            class="fas fa-times"></i></a></span>
                                                        </div>
                                                        </p>
                                                        <p>
                                                        <div class="col-md-12">
                                  <span class="correct-multiple">
                                    <ul class="answers-list">
                                        @foreach($question->Answers as $answer)
                                            @if($answer->correct > 0)
                                                <li class="corect-answer">{{$answer->answer}}</li>
                                            @else
                                                <li>{{$answer->answer}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="col-md-12 text-right trophy-bonus"></div>
                                  </span>
                                                        </div>
                                                        </p>
                                                    </li>
                                                    <!-- /end of multiple -->
                                                    @endif

                                                <!-- /one correct -->
                                                    @if($question->type == 'one')
                                                        @switch($question->difficulty)
                                                            @case(1)
                                                            <li class="list-group-item list-group-item-dark col-md-12 d-flex flex-row flex-wrap">
                                                            @break
                                                            @case(2)
                                                            <li class="list-group-item list-group-item-primary col-md-12 d-flex flex-row flex-wrap">
                                                            @break
                                                            @case(3)
                                                            <li class="list-group-item list-group-item-danger col-md-12 d-flex flex-row flex-wrap">
                                                                @break
                                                                @endswitch
                                                                <p>
                                                                <div class="col-md-7 question">
                                                                    Коя функция може да се използва за извличане на
                                                                    масив от наличните опции в stream контекста?
                                                                </div>
                                                                <div class="col-md-5 text-right">
                                                                    <span class="col-md-4"><i
                                                                                class="far fa-dot-circle"></i></span>
                                                                    <span class="col-md-4 num-correct">1</span>
                                                                    <span class="col-md-2"><a href=""
                                                                                              class="edit-question"><i
                                                                                    class="fas fa-pencil-alt"></i></a></span>
                                                                    <span class="col-md-2"><a href=""><i
                                                                                    class="fas fa-times"></i></a></span>
                                                                </div>
                                                                </p>
                                                                <p>
                                                                <div class="col-md-12">
                                  <span class="correct-one">
                                    <ul class="answers-list">
                                      <li>stream_context_get_params</li>
                                      <li>stream_context_get_default</li>
                                      <li class="corect-answer">stream_context_get_options</li>
                                      <li>'options' елемента от stream_get_meta_data</li>
                                    </ul class="answers-list">
                                    <div class="col-md-12 text-right trophy-bonus">+1&nbsp;<i class="fas fa-trophy"></i></div>
                                  </span>
                                                                </div>
                                                                </p>
                                                            </li>
                                                            @endif
                                                        <!-- /end of one correct -->
                                                            @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12 text-center back-to-top">
                            <a href="#dif-wrapper">
                                <button class="btn btn-success top-btn">Начало <i class="fas fa-arrow-up"></i></button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end of test nav -->

            <!--  //test content holder -->
            <div class="col-md-8 tests-content d-flex flex-row flex-wrap text-center" id="tests-content">

            </div>
            <!--  end of test content holder -->
        </div>
    </div>
    <script src="{{asset('js/create_tests.js')}}"></script>
@endsection