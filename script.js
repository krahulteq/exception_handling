$(document).ready(function () {
    $('form').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: 'process.php',
            type: 'post',
            data: $(this).serialize(),
            success: function (response) {
                var json = $.parseJSON(response);
                if (json.status == false) {
                    $('.invalid').show();
                    $('.valid').hide();
                    $('.invalid').html('');
                    $('.invalid').append(response);
                } else {
                    $('.valid').show();
                    $('.invalid').hide();
                    $('.valid').html('');
                    $('.valid').append(response);
                }
            }
        });

    });
});