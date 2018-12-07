$(function(){
        var edit = false;
        $('.edit-lecture > a').on('click', function(e){
          e.preventDefault();
          if(!edit){
            $(this).parent().parent().append('<div class="col-md-12 text-center"><button class="btn btn-success save-edit">запази</button></div>');
            $(this).parent().parent().parent().find('span:nth-child(1)').html('<input type="text" value="'+$(this).parent().parent().parent().find('span:nth-child(1)').html()+'">');
            $(this).parent().parent().parent().find('span:nth-child(2)').html('<label>'+$(this).parent().parent().parent().find('span:nth-child(2)').html()+'</label><br><input type="date" class="first-date-edit"> / <input type="date" class="second-date-edit">');
            $(this).parent().parent().parent().find('span:nth-child(4)').html('<textarea class="el-value">'+$(this).parent().parent().parent().find('span:nth-child(4)').html()+'</textarea>');
            edit = true;
          }
        });

        $('.presentation-lecture > a').on('click', function(){
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Презентация');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><input type="file">');
          $('.modal-content > .cf > div').html('<input type="submit" name="submit" value="Изпрати" class="btn close-modal"></form>');
        });

        $('.homework-lecture > a').on('click', function(){
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Критерии за домашно');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><input type="file">');
          $('.modal-content > .cf > div').html('<input type="submit" name="submit" value="Изпрати" class="btn close-modal"></form>');
        });

        $('.video-lecture > a').on('click', function(){
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Видео');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><label>Линк:</label><br><input type="text">');
          $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" value="Изпрати"></form>');
        });

        $('.add-lecture > div > a').on('click', function(){
          $('.modal-header > h2').text('');
          $('.modal-header > h2').text('Добави Лекция');
          $('.copy > p').html('');
          $('.copy > p').html('<form action=""><label>Заглавие:</label><br><input type="text"><br><label>дата 1:</label><br><input type="date" name="date1"><br><label>дата 2:</label><br><input type="date" name="date2"><br><br><label>Описание:</label><br><textarea></textarea><br><label>Презентация</label><br><input type="file"><br><br><label>Видео:</label><br><input type="text"><br><br><label>Критерии за домашно</label><br><input type="file">');
          $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" value="Добави"></form>');
        });

        $('.comments-view > a').on('click', function(){
          $('.copy > p').html($(this).next('.comments').html());
        });

      });