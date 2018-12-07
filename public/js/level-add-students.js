 $('.all-students-pool > div').mouseenter(function(){
                showOptions($(this));
            });

             $('.all-students-pool > div').mouseleave(function(){
               $(this).find('.student-options').hide();
            });

             var percentAdd = 0;
             var numStudents = $('.added-student').length
            $('.add-student > img').on('click', function(){
               $(this).parent().find('.add-student').css('visibility','hidden');
               $(this).parent().parent().parent().removeClass('removed-student').addClass('added-student');
               if(numStudents > -1){
                    numStudents = parseInt($('.added-student').length);
                    percentAdd = (percentAdd + 5);
                    $('.progress-bar').css('width',percentAdd+'%');
                    $('.num-students-now').html(numStudents);
               }
               showOptions($(this).parent().parent().parent());
            });

            $('.remove-student > img').on('click', function(){
               if(numStudents > -1 && numStudents !== 0){
                    if($(this).parent().parent().parent().hasClass('added-student')){
                        $(this).parent().parent().parent().removeClass('added-student').addClass('removed-student');
                        numStudents = parseInt($('.added-student').length);
                        percentAdd = (percentAdd - 5);
                        $('.progress-bar').css('width',percentAdd+'%');
                        $('.num-students-now').html(numStudents);
                    }
               }
               $(this).parent().parent().parent().removeClass('added-student').addClass('removed-student');
               showOptions($(this).parent().parent().parent());
            });

            function showOptions(element){
                $(element).children('img').css('box-shadow','0px 5px 20px rgba(7, 42, 68, 0.5)');

                if ($(element).hasClass('added-student')) {
                    $(element).find('.add-student').css('visibility','hidden');
                    $(element).find('.student-options').css('display', 'flex').show();
                    $(element).find('.student-options > .remove-student').css('visibility','visible').show();
                }else if($(element).hasClass('removed-student')){
                    $(element).find('.remove-student').css('visibility','hidden');
                    $(element).find('.student-options').css('display', 'flex').show();
                    $(element).find('.student-options > .add-student').css('visibility','visible').show();
                }else{
                    $(element).find('.student-options').css('display', 'flex').show();
                }
            }