$(document).ready(function() {
    $('.show-lection').show();

    /* toggle video url input */
    $('.edit-btn-video-url').click(function() {
        $('.video-url-edit').toggle().stop();
        $('.video-edit-upload-message').toggle().stop();
    });

    $('.video-edit-url-input').click(function() {
        $('.video-url-edit').toggle();
        $('.video-edit-upload-message').toggle();
    });

    /* open create lection section */
    $('.input-button').click(function() {
        $('.show-lection').hide();
        $('.edit-lection').toggle();
        $('.add-lection').toggle();
    });

    $('.add-lection-button').click(function() {
        $('.show-lection').toggle();
        $('.add-lection').toggle();
    });

    /* open edit lection section */
    $('.edit-lection-btn').click(function() {
        $('.show-lection').hide();
        $('.edit-lection').show();
        $('.add-lection').hide();
    });

    $('#tab_selector').change(function() {
        window.location.href = $("#tab_selector").val();
    });

    /* count lections */
    $('#right-side').mouseup(function() {
        var count = $(this).attr('data-countLections');

        for (var i = 1; i <= count; i++) {
            countFiles(i);
        }
    });

    /* delete lection file */
    $('.btn-delete-file').click(function() {
        var lectionId = $(this).attr('data-lection-file-id');
        var lectionType = $(this).attr('data-lection-file-type');

        var conf = confirm("Найстина ли искате да изтриете този Файл-" + lectionType + "?");
        if (conf == true) {
            if (lectionType == 'Презентация') {
                var input = '<input type="hidden" name="slides_delete" value="delete" required>';
            } else if (lectionType == 'Демо') {
                var input = '<input type="hidden" name="demo_file_delete" value="delete" required>';
            } else if (lectionType == 'Домашно') {
                var input = '<input type="hidden" name="homework_delete" value="delete" required>';
            }

            $('.file-delete-input').after().html(input);
            var formId = '#lection-delete-file-form-' + lectionId;

            $(formId).submit();
        } else {
            return false;
        }
    });

    /* delete lection */
    $('.delete-lection').click(function() {
        var lectionTitle = $(this).attr('data-lection-title');

        var conf = confirm("Найстина ли искате да изтриете тази Лекция - " + lectionTitle + '?');
        if (conf == true) {
            return true;
        } else {
            return false;
        }
    });

    /* lection add files */
    $('.lection-files-btn').click(function() {
        var lectionId = $(this).attr('data-lection-id');
        var lectionFiles = '#lection-files' + lectionId;
        var fileType = '#file-type-' + lectionId;

        $(lectionFiles).hide();
        $(fileType).show();

        $('.file-type').change(function() {
            var fileType = '#file-type-' + lectionId;
            var slides = '#slides-' + lectionId;
            var demo = '#demo-' + lectionId;
            var homework = '#homework-' + lectionId;

            if ($(fileType).val() == 'Презентация') {
                $('.demo-edit-url').hide();
                $('.available-files').show();
                $(slides).trigger('click');
            } else if ($(fileType).val() == 'Демо') {
                $('.demo-edit-url').show();
                $('.available-files').hide();
            } else if ($(fileType).val() == 'Домашно') {
                $('.demo-edit-url').hide();
                $('.available-files').show();
                $(homework).trigger('click');
            }
        });
    });

    /* Messages for what type of files are selected for upload */
    $('.lection-slides').change(function() {
        if ($(this).val() != null) {
            $('.lection-select-element').append(' Презентация');
        }
    });

    $('.demo-edit-url-input').change(function() {
        if ($(this).val() != null) {
            $('.lection-select-element').append(' Демо');
        }
    });

    $('.lection-homework').change(function() {
        if ($(this).val() != null) {
            $('.lection-select-element').append(' Домашно');
        }
    });

    /* lection files */
    function lectionFiles(i) {
        var fileType = '#file-type-' + i;
        var slides = '#slides-' + i;
        var demo = '#demo-' + i;
        var homework = '#homework-' + i;

        if ($(fileType).val() == 'Презентация') {
            $(slides).trigger('click');
        } else if ($(fileType).val() == 'Демо') {
            $(demo).trigger('click');
        } else if ($(fileType).val() == 'Домашно') {
            $(homework).trigger('click');
        }
    }

    /* count files */
    function countFiles(i) {
        var lectionFilesParse = "#lection-files" + i;
        var lectionFilesCountParse = "#lection-files-count" + i;
        $(lectionFilesParse).change(function() {
            var count = $(lectionFilesParse).get(0).files.length;
            $(lectionFilesCountParse).after().html('Файлове:' + count);
        });

        var videoFile = "#video-file" + i;
        var videoCountFile = "#video-file-count" + i;
        $(videoFile).change(function() {
            $(videoCountFile).after().html('<br>Файлове: 1');
        });
    }
});
