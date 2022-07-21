(function ($) {
    const get_form_data = () => {
        var Data = new FormData();
        var feilds = $('#gifte-form :input').serializeArray();
        $.each(feilds, function (index, value) {
            if (value.name == 'gifts') {
                var gifts = $('input[name="gifts"]:checked')
                var gifts_value = '';
                $.each(gifts, function (i, v) {
                    gifts_value += $(this).val() + ' / '
                });
                gifts_value = gifts_value.substring(0, gifts_value.length - 2)
                Data.append(value.name, gifts_value);
            } else {
                Data.append(value.name, value.value);
            }
        });
        return Data;
    }


    $("#gifte-form").validate({

        submitHandler: function (form) {
            $.ajax({
                type: "post",
                url: $('#gifte-form').data('action') + '?action=gifte_submit',
                data: get_form_data(),
                processData: false,
                contentType: false,
                dataType: 'json',
                async: false,
                success: function (response) {

                    if (response.status) {
                        window.location = response.msg;
                    } else {
                        console.log(response.msg)
                    }

                    /*  if (response.success) {
                         window.location = response.msg;
                     } else {
                         var n_msg = '<div class="alert alert-dark" role="alert">' + response.msg + '</div>'
                         $('.msg').html(n_msg).removeClass('d-none')
                     } */
                }
            });
        }
    });
})(jQuery)




