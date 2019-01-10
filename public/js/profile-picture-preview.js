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
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#course-picture').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        alert('Файлът трябва да е картинка/снимка!');
    }
}
