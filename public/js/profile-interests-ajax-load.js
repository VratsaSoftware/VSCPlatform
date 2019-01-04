$('.int_type').on('change', function() {
    var type = this.value;
    var txt = this.options[this.selectedIndex].text.trim();
    getInterests($(this), type, txt);
});

function getInterests(input, type, txt) {
    if (txt != 'друго' && txt != 'Друго' && txt != 'Други' && txt != 'други') {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: '/interest/' + type,
            success: function(data, textStatus, xhr) {
                if (data) {
                    $.each(data, function(key, value) {
                        input.parent().parent().find('.interests').fadeIn();
                        input.parent().parent().find('.interests').find('.ajax-load-interests').remove();
                        input.parent().parent().find('.interests').append('<option class="ajax-load-interests" value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            }
        });
    } else {
        $('.interests').fadeOut();
        $('.interests:last').after('<textarea name="int_other" id="int_other" class="section-el-bold other-interests" placeholder="опишете..." style="overflow:auto;resize:none" rows="5" class="" form="' + $('.interests:last').parent().attr(
            'id') + '"></textarea>');
    }
}
