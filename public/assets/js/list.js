
    $(document).on('click', '#addlike', function (e) {
    e.preventDefault();
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

    var formData = new FormData()
        var blog_id = $("#addlike").data('action');
    formData.append('blog_id', blog_id);
    $.ajax({
    url:'/user/addLike',
    cache: false,
    processData: false,
    contentType: false,
    type: 'POST',
    data: formData,
    success: function (data) {

    if (data.status == 200) {
        $('.changeColor').css('color', '#005DAA');
        $('.changeColorDisLike').css('color', '');
        $('#dislikes').empty().html(data.dislikes);
        $('#likes').empty().html(data.likes);

} else {
}
}, error: function (reject) {
}
});
});

    $(document).on('click', '#adddislike', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData()
        var blog_id = $("#adddislike").data('action');
        formData.append('blog_id', blog_id);
        $.ajax({
            url:'/user/addDislike',
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            data: formData,
            success: function (data) {

                if (data.status == 200) {
                    $('.changeColorDisLike').css('color', '#005DAA');
                    $('.changeColor').css('color', '');
                    $('#dislikes').empty().html(data.dislikes);
                    $('#likes').empty().html(data.likes);

                } else {
                }
            }, error: function (reject) {
            }
        });
    });



