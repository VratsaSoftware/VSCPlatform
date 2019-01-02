$('.edu-visibility').on('change', function() {
    var isChecked = $(this).is(":checked");
    visibilityIcons('образование', isChecked);
    ajaxVisibility('образование', isChecked);
});

$('.work-visibility').on('change', function() {
    var isChecked = $(this).is(":checked");
    visibilityIcons('работен опит', isChecked);
    ajaxVisibility('работен опит', isChecked);
});

$('.interest-visibility').on('change', function() {
    var isChecked = $(this).is(":checked");
    visibilityIcons('интереси', isChecked);
    ajaxVisibility('интереси', isChecked);
});

function ajaxVisibility(type, visibility) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '/user/change/section/visibility',
        data: {
            type: type,
            visibility: visibility
        },
        success: function(data, textStatus, xhr) {
            if (xhr.status == 200) {
                //success
            }
        }
    });
}