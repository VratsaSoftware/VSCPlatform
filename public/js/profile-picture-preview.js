function imagePreview(input) {
    var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        alert('Файлът трябва да е картинка/снимка!');
    }
}

function CourseimagePreview(input) {
    var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        img = new Image();
        var imgwidth = 0;
        var imgheight = 0;
        var maxwidth = 800;
        var maxheight = 600;
        var _URL = window.URL || window.webkitURL;
        img.src = _URL.createObjectURL(input.files[0]);
        img.onload = function() {
            imgwidth = this.width;
            imgheight = this.height;
            if(imgwidth !== maxwidth && imgheight !== maxheight){
                alert('Файлът трябва да е с размери 800x600 пикесла!')
            }else{
                var reader = new FileReader();
                reader.onload = function(e) {
                    if($('.course-picture-edit').length > 0){
                        $('.course-picture-edit').each(function( index ) {
                            $( this ).attr('src', e.target.result);
                        });
                    }
                    $('#course-picture').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    } else {
        alert('Файлът трябва да е картинка/снимка!');
    }
}
