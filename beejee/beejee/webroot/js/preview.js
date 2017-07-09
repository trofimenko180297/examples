function valid()
{
    var name = $('#name').val();
    var email = $('#email').val();
    var title = $('#title').val();
    var task = $('#task').val();
    var img = $('#img').val();
    var fail = true;
    if(name == "" || email == "" || title == "" || task == "") {
        fail = false;
    }
    return fail;
}
$(document).ready(function(){
        $('#preview').click(function () {
            if (valid()) {
                var name = $('#name').val();
                var email = $('#email').val();
                var title = $('#title').val();
                var task = $('#task').val();
                var img = $('#img').val();
                var $input = $("#img");
                var fd = new FormData;
                fd.append('img', $input.prop('files')[0]);
                $.ajax({
                    url: '/tasks/preview',
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (img) {
                        $('img').attr('src', '../../webroot/img/tmp/' + img);
                    }
                });
                $('#form').css('display', 'none');
                $('#wrapper').css('display', 'block');
                $('#wrapper h2').html(title);
                $('#user').html(name + '(' + email + ')');
                $('.task_text').html(task);
            }else{
                alert('Empty fields!');
            }
        });
        $('#preview_back').click(function () {
            $('#wrapper').css('display', 'none');
            $('#form').css('display', 'block');
        });

});
