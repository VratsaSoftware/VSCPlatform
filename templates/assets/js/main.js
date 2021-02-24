$(document).ready(function(){

    $("#toggleNav").click(function(){
        $("#mySidenav").toggleClass("toggled");
    });

    $('.btn-green').on('click', function () {
        $('.btn-green.active').toggleClass("active");
    });

    $('#tab_selector').on('change', function () {
        $('.nav-tabs a').eq($(this).val()).tab('show');
    });

    $(".date-input").datepicker("dd-mm-yy");

    $('#right-side .tab-pane .close').on('click', function () {
        $("#right-side .tab-pane.active").removeClass("active");
    });
        
    if ($(window).width() < 992) {
        $("#right-side .tab-pane.active").removeClass("active");
    }
});
