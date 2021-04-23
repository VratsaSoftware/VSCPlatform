$(document).ready(function() {
    /* disabled input - date */
    $('.homework-section').mouseenter(function() {
        var lectionId = $(this).attr('data-lection');
        var homeworkFile = '#create-homework-' + lectionId;
        var homeworkEndDate = '#homework-end-' + lectionId;
        var homeworkCheckEndDate = '#homework-check-end-' + lectionId;
        if (!$(homeworkFile).val()) {
            $(homeworkEndDate).attr("disabled", true);
            $(homeworkCheckEndDate).attr("disabled", true);
        } else {
            $(homeworkEndDate).attr("disabled", false);
            $(homeworkCheckEndDate).attr("disabled", false);
        }
    });

    /* count lections */
    $('#right-side').mouseup(function() {
        var count = $(this).attr('data-countLections');

        if (count != 0) {
            for (var i = 1; i <= count; i++) {
                createLectionCountFiles(i);
            }
        } else {
            createLectionCountFiles('');
        }
    });

    /* toggle video url input */
    $('.add-video-url').click(function() {
        $('.video-url').toggle().stop();
        $('.video-upload-message').toggle().stop();
    });

    $('.video-url-input').click(function() {
        $('.video-url').toggle();
        $('.video-upload-message').toggle();
    });

    /* lection add files */
    $('.create-lection-files-btn').click(function() {
        var lectionId = $(this).attr('data-lection-id');
        var lectionFiles = '#lection-files-' + lectionId;
        var fileType = '#file-select-type-' + lectionId;

        $(lectionFiles).hide();
        $(fileType).show();

        $('.create-lection-file-type').change(function() {
            var fileType = '#file-select-type-' + lectionId;
            var slides = '#create-slides-' + lectionId;
            var demo = '#create-demo-' + lectionId;
            var homework = '#create-homework-' + lectionId;

            if ($(fileType).val() == 'Презентация') {
                $(slides).trigger('click');
                $('.demo-create-url').hide();
            } else if ($(fileType).val() == 'Демо') {
                $('.demo-create-url').show();
            } else if ($(fileType).val() == 'Домашно') {
                $(homework).trigger('click');
                $('.demo-create-url').hide();
            }
        });
    });

    /* Messages for what type of files are selected for upload */
    $('.create-lection-slides').change(function() {
        if ($(this).val() != null) {
            $('.create-lection-select-element').append(' Презентация');
        }
    });

    $('.demo-create-url-input').change(function() {
        if ($(this).val() != '') {
            $('.create-lection-select-element').append(' Демо');
        }
    });

    $('.create-lection-homework').change(function() {
        if ($(this).val() != null) {
            $('.create-lection-select-element').append(' Домашно');
        }
    });

    /* count files */
    function createLectionCountFiles(i) {
        var videoFile = "#video-file-" + i;
        var videoCountFile = "#video-file-count-" + i;
        $(videoFile).change(function() {
            $(videoCountFile).after().html('<br>Файлове: 1');
        });
    }
});
