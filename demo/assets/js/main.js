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

    $('#right-side .tab-pane .close').on('click', function () {
        $("#right-side .tab-pane.active").removeClass("active");
    });
        
    if ($(window).width() < 992) {
        $("#right-side .tab-pane.active").removeClass("active");
        
        $('#avatar-menu').on('click', function(){
            $('.mobile-profile').css('left', '0');
        });

        $('#close-mobile-profile').on('click', function(){
            $('.mobile-profile').css('left', '-100%');
        });
    }
});
