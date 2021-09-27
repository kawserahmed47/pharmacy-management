function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$(document).on('change', '.input-image',function(){
    readURL(this);
});


function readCoverURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.preview-cover-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('change', '.input-cover-image',function(){
    readCoverURL(this);
});
