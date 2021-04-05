$(document).ready(function() {
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
            } else if ($(fileType).val() == 'Демо') {
                $(demo).trigger('click');
            } else if ($(fileType).val() == 'Домашно') {
                $(homework).trigger('click');
            }
        });
    });

    /* Messages for what type of files are selected for upload */
    $('.create-lection-slides').change(function() {
        if ($(this).val() != null) {
            $('.create-lection-select-element').append(' Презентация');
        }
    });

    $('.create-lection-demo-file').change(function() {
        if ($(this).val() != null) {
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
