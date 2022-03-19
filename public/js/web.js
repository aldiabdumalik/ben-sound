import * as module from './admin/module.js';

$(document).ready(function() {
    $('#contact_form').submit(function (event) {
        event.preventDefault();
        let url = module.base_url + 'action/send-message',
            method = "POST",
            data = {
                'name' : $('#name').val(),
                'email' : $('#email').val(),
                'subject' : $('#subject').val(),
                'message' : $('#message').val(),
            }

        $.ajax({
            url: url,
            method: method,
            dataType: "JSON",
            cache: false,
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            error: function (xhr, status, error) {
                module.send_notif({
                    icon: 'error',
                    message: xhr.responseJSON.message
                });
                console.clear();
            },
            success: function (response){
                module.send_notif({
                    icon: 'success',
                    message: response.message
                });
            }
        });
    });
});