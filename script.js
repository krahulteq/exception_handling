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
                    $('.invalid').html('');
                    $('.valid').hide();
                    $('.invalid').append(response);
                } else {
                    $('.valid').show();
                    $('.valid').html('');
                    $('.invalid').hide();
                    $('.valid').append(response);
                }
            }
        });

    });
});