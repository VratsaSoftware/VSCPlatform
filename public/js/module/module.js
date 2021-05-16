$(document).ready(function() {
    $('.module-edit-btn').click(function() {
        $(".right-part").addClass("module-right");
        $('.add-lection').hide();
        $('.edit-lection').hide();
        $('.show-lection').hide();
        $('.module-edit').show();
    });

    $('.module-close-btn').click(function() {
        $(".right-part.module-right").removeClass("module-right");
        $('.add-lection').hide();
        $('.edit-lection').hide();
        $('.show-lection').show();
        $('.module-edit').hide();
    });
});
