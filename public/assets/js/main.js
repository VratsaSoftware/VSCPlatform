$(document).ready(function() {
    $("#toggleNav").click(function() {
        $("#mySidenav").toggleClass("toggled");
    });

    $('.btn-green').on('click', function () {
        $('.btn-green.active').toggleClass("active");
    });

    $('#tab_selector').on('change', function () {
        $('.nav-tabs a').eq($(this).val()).tab('show');
    });

    /* datepicker */
    $(".date-input").datepicker("dd-mm-yy");

    /* datetimepicker */
    // $(".datetimepicker-input").datetimepicker({
    //     format: 'MM/DD/YYYY HH:mm'
    // });

    $('#right-side .tab-pane .close').on('click', function () {
        $("#right-side .tab-pane.active").removeClass("active");
    });

    if ($(window).width() < 992) {
        $("#right-side .tab-pane.active").removeClass("active");
        $('.btn-green.active').removeClass("active");
    }
});
