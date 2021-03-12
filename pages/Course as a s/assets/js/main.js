$(document).ready(function(){
    $("#toggleNav").click(function(){
        $("#mySidenav").toggleClass("toggled");
    });
    $('.btn-green').on('click', function () {
        $('.btn-green.active').toggleClass("active");;
    });
    $('#tab_selector').on('change', function () {
        $('.nav-tabs a').eq($(this).val()).tab('show');
    });
    $(document).ready(function () {
        $(".date-input").datepicker("dd-mm-yy");
    });
});