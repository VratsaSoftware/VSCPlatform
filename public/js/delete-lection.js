$('.delete-lection-btn').on('click',function(){
    var element = $(this).parent().parent().parent().parent();
    var done = false;
    var x = confirm("Сигурни ли сте че искате да изтриете ?");
    if (x){
    var url = $('#delete-lection').attr('action');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data:{_method: 'delete'},
            success: function(data, textStatus, xhr) {
                if(xhr.status == 200){
                    deleted(true);
                }
            }
        });

    }else{
        return false;
    }

    function deleted(done){
        if(done){
            element.fadeOut().remove();
        }
    }
});
