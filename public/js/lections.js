$(function(){
    $('#modal').css('display','none');

    $('.video-lecture > a').on('click', function() {
        $('.copy > p').html('<iframe width="auto" height="auto" src=""></iframe>');
        $('.copy > p').find('iframe').attr('src', $(this).next('.video-holder').find('.video-url').html());
        $('.modal-header').find('h2').html($(this).next('.video-holder').find('.video-title').html());
        $('#modal').show();
    });

    $('.comment > a').on('click', function() {
        $('.copy > p').html($(this).next('.comment-holder').html());
        $('.modal-content > .cf > div').html('<input class="btn close-modal" type="submit" name="submit" id="send_comment" value="Изпрати">');
        $('#modal').show();
        $('#send_comment').on('click',function(){
            $('#comment_form').submit();
        });
    });

    $('.read-more').on('click',function(){
        $('.modal-header').find('h2').html($(this).parent().parent().find('.lection-title').html());
        $('.copy > p').html($(this).attr('data'));
        $('#modal').show();
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
