$(document).ready(function() {
    //3 dots showing options
    $('.edit-right-menu').on('click', function() {
        var oldText = $(this).parent().parent().find('.stats-text').html();
        if (!$(this).next('.edit-items-wrap').hasClass('box-opened')) {
            $(this).next('.edit-items-wrap').css('display', 'flex');
            $(this).next('.edit-items-wrap').addClass('box-opened')
            $(this).css('color', '#f00');
            $(this).find('i').removeClass('fas fa-ellipsis-v');
            $(this).find('i').addClass('fas fa-times');
            // $(this).parent().parent().css('box-shadow', '0px 10px 50px rgba(7, 42, 68, 0.25)');
        } else {
            $(this).find('i').removeClass('fas fa-times');
            $(this).find('i').addClass('fas fa-ellipsis-v');
            $('.create-form').fadeOut();
            $('.create-form-work').fadeOut();
            $('.edit-edu').fadeOut();
            $('.edit-work').fadeOut();
            $('.live-edu').fadeIn();
            $('.live-work').fadeIn();
            $('.suggestion-ins-name').html('');
            $('.auto-ins-name').html('');
            $(this).next('.edit-items-wrap').removeClass('box-opened');
            $(this).next('.edit-items-wrap').css('display', 'none');
            $(this).css('color', '#000');
            $(this).parent().parent().find('.edu-boxes').remove();
            $(this).parent().parent().find('.add-text').parent().remove();
            $(this).parent().parent().find('.save-edit-box').parent().remove();
            $(this).next('.edit-items-wrap').find('.edit-items').find('.pencil').find('a').removeClass('edit-opened');
            // $(this).parent().parent().css('box-shadow', '0px 10px 50px rgba(7, 42, 68, 0.12)');
        }
    });

    //adding inputs
    $('.edit-btn').on('click', function(e) {
        // $(this).addClass('save-edit');
        var oldText = $(this).prev('span').text();
        if ($(this).parent().find('img').hasClass('profile-pic') && !$(this).parent().find('img').hasClass('edit-img')) {
            $(this).parent().find('img').addClass('edit-img');
            $(this).parent().find('img').after('<p class="input-img"><input type="file" id="picture" name="picture" onChange="imagePreview(this);"></p>');
            $(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
            $(this).removeClass('edit-btn');
            e.preventDefault();
            // $(this).removeClass('save-edit');
        }
        $('.loader-wrapper').css('display', 'flex').fadeOut('slow');
        if ($(this).hasClass('edit-btn')) {
            e.preventDefault();
            $(this).removeClass('edit-btn');
            if ($(this).prev('span').hasClass('location')) {
                $(this).prev('span').html('<br><input type="text" class="edit-user-items" id="location" name="location" value="' + oldText + '"></br>');
            }
            if ($(this).prev('span').hasClass('birthday')) {
                $(this).prev('span').html('<br><input type="date" class="edit-user-items" id="dob" name="dob" value="' + oldText + '"></br>');
            }
            if ($(this).prev('span').hasClass('mail-txt')) {
                $(this).prev('span').html('<br><input type="text" class="edit-user-items" id="email" name="email" value="' + oldText + '"></br>');
            }
            if ($(this).prev('span').hasClass('name')) {
                $(this).prev('span').html('<br><input type="text" class="edit-user-items" id="name" name="name" value="' + oldText + '"></br>');
            }
            $(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
        }
    });

    //social networks adding fields
    $('.social-edit').on('click', function(e) {
        if (!$(this).hasClass('editing')) {
            e.preventDefault();
            $(this).addClass('editing');
            $('.edit-social').show();
            $(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
            $('.loader-wrapper').css('display', 'flex').fadeOut();
        }
    });

    //adding textareas to the boxes with options
    $('.edit-bio').on('click', function(e) {
        e.preventDefault();
        var oldText = $(this).parent().parent().find('.bio-text').text();
        if (!$(this).hasClass('editing')) {
            $(this).addClass('editing');
            $(this).parent().parent().find('.bio-text').html('<p class="edit-box"><textarea rows="20" cols="30">' + $(this).parent().parent().find('.bio-text').html() + '</textarea></p>');
            $(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
        } else {
            $(this).find('i').removeClass('fa-save').addClass('fa-pencil-alt');
            $(this).parent().parent().find('.bio-text').html(oldText);
            $('.loader-wrapper').css('display', 'flex').fadeOut();
        }
    });

    $('.education-edit').on('click', function(e) {
        e.preventDefault();
        $(this).parent().parent().parent().fadeOut().css('display', 'none');
        if (!$(this).hasClass('edit-opened')) {
            $(this).addClass('edit-opened');
            $('.live-edu').fadeOut();
            $('.edit-edu').fadeIn();
        } else {
            $(this).removeClass('edit-opened');
        }
    });

    $('.create-btn').on('click', function(e) {
        e.preventDefault();
        $('.edu-no-info').fadeOut();
        $(this).fadeOut();
        $('.create-form').fadeIn();
    });

    var eduFormscloned = 0;
    $('.edu-add-new').on('click', function(e) {
        e.preventDefault();
        $('.edu-no-info').fadeOut();
        if ($('.create-form').is(":visible")) {
            $('.create-form').last().after($('.create-form').last().clone(true));
            $('.create-form').last().find('.suggestion-ins-name').html('');
            $('.create-form').last().find('#institution_name').val('');
        }
        $('.create-form').fadeIn();
        eduFormscloned++;
        if (eduFormscloned > 5) {
            $('.edu-add-new').fadeOut();
        }
    });

    //work section
    $('.work-edit').on('click', function(e) {
        e.preventDefault();
        $('.live-work').fadeOut();
        $('.edit-work').fadeIn();
    });

    $('.create-btn-work').on('click', function(e) {
        e.preventDefault();
        $('.work-no-info').fadeOut();
        $(this).fadeOut();
        $('.create-form-work').fadeIn();
    });


    var workFormsCloned = 0;
    $('.work-add-new').on('click', function(e) {
        e.preventDefault();
        $('.work-no-info').fadeOut();
        if ($('.create-form-work').is(":visible")) {
            $('.create-form-work').last().after($('.create-form-work').last().clone(true));
            $('.create-form-work').last().find('.suggestion-ins-name').html('');
            $('.create-form-work').last().find('#institution_name').val('');
        }
        $('.create-form-work').fadeIn();
        workFormsCloned++;
        if (workFormsCloned > 5) {
            $('.work-add-new').fadeOut();
        }
    });

    //interests section
    $('.int-edit').on('click', function(e) {
        e.preventDefault();
        $('.live-int').fadeOut();
        $('.edit-int').fadeIn();
    });

    $('.create-btn-int').on('click', function(e) {
        e.preventDefault();
        $('.work-no-info').fadeOut();
        $(this).fadeOut();
        $('.create-form-work').fadeIn();
    });


    var workFormsCloned = 0;
    $('.int-add-new').on('click', function(e) {
        e.preventDefault();
        $('.int-no-info').fadeOut();
        if ($('.create-form-int').is(":visible")) {
            $('.create-form-int').last().after($('.create-form-int').last().clone(true));
            $('.create-form-int').last().find('.suggestion-ins-name').html('');
        }
        $('.create-form-int').fadeIn();
        workFormsCloned++;
        if (workFormsCloned > 5) {
            $('.work-add-new').fadeOut();
        }
    });

    //interests section
    // $('.int-edit').on('click', function(e) {
    //     e.preventDefault();
    //     $('.live-int').fadeOut();
    //     $('.edit-int').fadeIn();
    // });

    $('.create-btn-hobbie').on('click', function(e) {
        e.preventDefault();
        $('.hobbies-no-info').fadeOut();
        $(this).fadeOut();
        $('.create-form-hobbies').fadeIn();
    });


    var hobbieFormsCloned = 0;
    $('.hobbie-add-new').on('click', function(e) {
        e.preventDefault();
        $('.int-no-info').fadeOut();
        if ($('.create-form-hobbies').is(":visible")) {
            $('.create-form-hobbies').last().after($('.create-form-hobbies').last().clone(true));
            $('.create-form-hobbies').last().find('.other-interests').fadeOut();
            $('.create-form-hobbies').last().find('#hobbies-form-create').attr('id', 'hobbies-form-create-' + (hobbieFormsCloned + 10));
            $('.create-form-hobbies').last().find('#hobbies-form-create').attr('class', 'form-creation-cloning');
            $('.create-form-hobbies').last().find('.suggestion-ins-name').html('');
        }
        $('.create-form-hobbies').fadeIn();
        hobbieFormsCloned++;
        if (hobbieFormsCloned > 5) {
            $('.hobbie-add-new').fadeOut();
        }
    });
})