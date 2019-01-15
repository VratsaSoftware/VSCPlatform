$(function(){
        var edit = false;
        $('.edit-lecture > a').on('click', function(e){
          // e.preventDefault();
          var first_date = $(this).parent().parent().parent().parent().find('.first-date-no-show').html();
          var second_date = $(this).parent().parent().parent().parent().find('.second-date-no-show').html();

          if($(this).parent().parent().parent().find('.lection-description').find('.read-more').length != 0){
              var desc = $(this).parent().parent().parent().find('.lection-description').find('.read-more').attr('data');
          }else{
              var desc = $(this).parent().parent().parent().find('.lection-description').html();
          }
          var url = $(this).attr('data');
          var order = $(this).parent().parent().parent().parent().find('.lection-order').html();

          $('#modal').show();
          if(!edit){
            $('.modal-header > h2').text('');
            $('.modal-header > h2').text('Редактирай');
            $('.copy > p').html('');
            $('.copy > p').append($('#edit-lection').clone(true).prop('id','edit-lection-now').show());
            $('#edit-lection-now').attr('action',url);

            $('#edit-lection-now').find('#title').val($(this).parent().parent().parent().find('span:nth-child(1)').html());
            $('#edit-lection-now').find('#first_date').val(first_date);
            $('#edit-lection-now').find('#second_date').val(second_date);
            $('#edit-lection-now').find('#description').val(desc);
            $('#edit-lection-now').find('#order').val(order);

            $('.modal-content > .cf > div').html('<input type="submit" name="submit" value="Изпрати" class="btn close-modal" id="send-edit-lection">');
            $('#send-edit-lection').on('click', function(){
                $('#edit-lection-now').submit();
            });
            edit = true;
          }
        });

        $('.add-presentation').on('click', function(){
            $('#modal').show();
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Презентация');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><input type="file">');
          $('.modal-content > .cf > div').html('<input type="submit" name="submit" value="Изпрати" class="btn close-modal"></form>');
        });

        $('.add-homework').on('click', function(){
            $('#modal').show();
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Критерии за домашно');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><input type="file">');
          $('.modal-content > .cf > div').html('<input type="submit" name="submit" value="Изпрати" class="btn close-modal"></form>');
        });

        $('.add-video').on('click', function(){
            $('#modal').show();
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Видео');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><label>Линк:</label><br><input type="text">');
          $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" value="Изпрати"></form>');
        });

        $('.add-lecture > div > a').on('click', function(){
            $('#modal').show();
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Лекция');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><label>Заглавие:</label><br><input type="text"><br><label>дата 1:</label><br><input type="date" name="date1"><br><label>дата 2:</label><br><input type="date" name="date2"><br><br><label>Описание:</label><br><textarea></textarea><br><label>Презентация</label><br><input type="file"><br><br><label>Видео:</label><br><input type="text"><br><br><label>Критерии за домашно</label><br><input type="file">');
          $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" value="Добави"></form>');
        });

        $('.comments-view > a').on('click', function(){
            $('#modal').show();
          $('.copy > p').html($(this).next('.comments').html());
        });

        // EXISTING
        $('.video-exist').on('click', function() {
            var action = $(this).attr('data-url');
            $('.copy > p').html('<iframe width="auto" height="auto" src=""></iframe>');
            $('.copy > p').find('iframe').attr('src', $(this).attr('data')).after('<form action="'+action+'" id="change_video" method="POST"><input type="hidden" name="_token" value="'+$('meta[name="csrf-token"]').attr('content')+'"><input name="_method" type="hidden" value="PUT"><label>Линк:</label><br><input type="text" name="url" id="url" value="'+$(this).attr('data')+'">');
            $('.modal-header').find('h2').html($(this).next('.video-holder').find('.video-title').html());
            $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="change_video_btn" value="Изпрати"></form>');
            $('#modal').show();

            $('#change_video_btn').on('click', function(){
                $('#change_video').submit();
            });
        });

        $('.slides-exist').on('click', function() {
            var action = $(this).attr('data-url');
            $('.copy > p').html('<form action="'+action+'" id="change_slides" method="POST" enctype="multipart/form-data" files="true"><input type="hidden" name="_token" value="'+$('meta[name="csrf-token"]').attr('content')+'"><input name="_method" type="hidden" value="PUT"><label>Презентация: '+$(this).attr('data')+'</label><br><input type="file" name="slides" id="slides" value="'+$(this).attr('data')+'">');
            $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="change_slides_btn" value="Изпрати"></form>');
            $('#modal').show();

            $('#change_slides_btn').on('click', function(){
                $('#change_slides').submit();
            });
        });

        //empty modal on close button click
        $('.close-modal').on('click', function() {
            closeModal();
        });

        $(document).keyup(function(e) {
             if (e.key === "Escape" && $('#modal').is(':visible')) {
                 closeModal();
            }
        });

        function closeModal(){
            $('#modal').hide();
            $('.copy > p').html(' ');
            $('.modal-content > .cf > div').html(' ');
            edit = false;
            $('#edit-lection-now').remove();
        }

});
