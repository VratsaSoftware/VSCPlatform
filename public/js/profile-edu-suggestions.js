$('.institution_name').bind('input keypress mouseenter', function() {
    var inputval = $(this).val();
    var input = $(this);
    inputval = inputval.length;
    var type = 'institution';
    if (inputval > 3) {
        getSuggestions(input, inputval, type, $(this).val());
    }

    $('.auto-ins-name').on('click', function() {
        $(this).prev('.institution_name').val($(this).text());
    });

    $('.auto-ins-name').bind('mouseleave mouseout focusout', function() {
        $(this).parent().html('');
    });
});

$('.institution_name').keyup(function() {
    var inputval = $(this).val();
    inputval = inputval.length;
    var input = $(this);
    var type = 'institution';
    // getSuggestions(input, inputval, type, $(this).val());
    if (!$(this).val() && inputval < 1 && inputval == 0) {
        $(this).next('.suggestion-ins-name').html('');
    }
});

//specialties suggestions
$('.specialty').bind('input keypress mouseenter', function() {
    var inputval = $(this).val();
    var input = $(this);
    inputval = inputval.length;
    var type = 'specialty';
    // console.log(inputval);
    if (inputval > 3) {
        getSuggestions(input, inputval, type, $(this).val());
    }

    $('.auto-ins-name-specialty').on('click', function() {
        $(this).parent().prev('.specialty').val($(this).text());
    });

    $('.auto-ins-name-specialty').bind('mouseleave mouseout focusout', function() {
        $(this).parent().html('');
    });
});

$('.specialty').keyup(function() {
    var inputval = $(this).val();
    inputval = inputval.length;
    var input = $(this);
    var type = 'specialty';
    // getSuggestions(input, inputval, type, $(this).val());
    if (!$(this).val() && inputval < 1 && inputval == 0) {
        $(this).next('.suggestion-ins-name').html('');
    }
});

//ajax call for suggestions accepts the input who needs suggestion, length of the letters, type of information, and the string to search for
function getSuggestions(input, inputLength, type, search) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: '/user/education/autocomplete',
        data: {
            search: search,
            type: type
        },
        success: function(data, textStatus, xhr) {
            // console.log(data);

            if (data.length > 0 && inputLength > 0 && inputLength !== 0) {
                input.next('.suggestion-ins-name').html('');
                $.each(data, function() {
                    $.each(this, function(k, v) {
                        if (input.is(":focus")) {
                            if (input.hasClass('institution_name')) {
                                input.next('.suggestion-ins-name').append('<p class="auto-ins-name">' + v + '</p>');
                                $('.auto-ins-name').on('click', function() {
                                    input.val($(this).text());
                                    $(this).parent().html('');
                                });
                            } else {
                                input.next('.suggestion-ins-name').append('<p class="auto-ins-name-specialty">' + v + '</p>');
                                $('.auto-ins-name-specialty').on('click', function() {
                                    input.val($(this).text());
                                    $(this).parent().html('');
                                });
                            }
                        }
                    });
                });
            } else {
                input.next('.suggestion-ins-name').html('');
            }
        }
    });
}