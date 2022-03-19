import * as module from './module.js';

$(document).ready(function() {
    $("#desc").summernote({
        dialogsInBody: true,
        minHeight: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['para', ['paragraph']]
        ]
    });
    function init() {
        module.loading_start();
        return new Promise((resolve, reject) => {
            module.callAjax(module.base_url + 'company/about/detail', 'GET').then(res => {
                module.loading_stop();
                let data = res.content;
                $('#desc').summernote('code', data.about);
                $('#hero-text').text(data.image);
            });
        });
    }

    init();

    $('#hero').on('change', function(e){
        e.preventDefault();
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        var ext = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(ext, fileName.length).toLowerCase();
        if (!fileName) {
            fileName = 'Choose file';
        }
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            $(this).next('#hero-text').html(fileName);
        }else{
            $(this).next('#hero-text').html('Choose file');
            $(this).val(null);
        }
    });

    $('#form-banner').submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + 'company/about/update',
            method = "POST",
            formData = new FormData();
        if ($("#hero")[0].files.length > 0) {
            formData.append('image', $("#hero")[0].files[0])
        }
        formData.append('about', $("#desc").summernote('code'))
        module.callAjaxFormData(url, method, formData).then(response => {
            module.loading_stop();
            module.send_notif({
                icon: 'success',
                message: response.message
            });
            init();
        });
    });
});