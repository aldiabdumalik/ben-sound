import * as module from './module.js';

$(document).ready(function() {
    function init() {
        module.loading_start();
        return new Promise((resolve, reject) => {
            module.callAjax(module.base_url + 'company/detail', 'GET').then(res => {
                module.loading_stop();
                let data = res.content;
                $('#name').val(data.name);
                $('#logo-text').text(data.logo);
                $('#icon-text').text(data.icon);
                $('#addr').val(data.address);
                $('#fb').val(data.facebook);
                $('#ig').val(data.instagram);
                $('#linkedin').val(data.linkedin);
                $('#yt').val(data.youtube);
                $('#whatsapp').val(data.whatsapp);
            });
        });
    }

    init();

    $('#whatsapp').on('change click keyup input paste', function(){
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "");
        });
    });

    $('#logo').on('change', function(e){
        e.preventDefault();
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        var ext = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(ext, fileName.length).toLowerCase();
        if (!fileName) {
            fileName = 'Choose file';
        }
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            $(this).next('#logo-text').html(fileName);
        }else{
            $(this).next('#logo-text').html('Choose file');
            $(this).val(null);
        }
    });
    $('#icon').on('change', function(e){
        e.preventDefault();
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        var ext = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(ext, fileName.length).toLowerCase();
        if (!fileName) {
            fileName = 'Choose file';
        }
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="ico"){
            $(this).next('#icon-text').html(fileName);
        }else{
            $(this).next('#icon-text').html('Choose file');
            $(this).val(null);
        }
    });

    $('#form-company').submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + 'company/update',
            method = "POST",
            formData = new FormData();
        if ($("#logo")[0].files.length > 0) {
            formData.append('logo', $("#logo")[0].files[0])
        }
        if ($("#icon")[0].files.length > 0) {
            formData.append('icon', $("#icon")[0].files[0])
        }
        console.log($("#name").val());
        formData.append('name', $("#name").val())
        formData.append('address', $("#addr").val())
        formData.append('fb', $("#fb").val())
        formData.append('ig', $("#ig").val())
        formData.append('linkedin', $("#linkedin").val())
        formData.append('yt', $("#yt").val())
        formData.append('whatsapp', $("#whatsapp").val())
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