import * as module from './module.js';

$(document).ready(function() {
    const resetForm = () => {
        $('#form-client').trigger('reset')
        $('#submit').text('Save')
        $('#id').val(0)
        $('#image').val(null)
        $('#image').attr('required');
        $('#image-text').text('Choose file')
        module.isHidden('#delete', true)
        $('#form-client select, button[type="submit"], input[name=date]').prop('disabled', false);
        $('#form-client input').not('input[type=hidden]').prop('readonly', false);
    }

    const dt = $('#table-client').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        lengthChange: false,
        ajax: {
            method: "POST",
            url: module.base_url + 'company/client/dt',
            headers: {'X-CSRF-TOKEN': module.header_token},
        },
        columns: [
            { title: 'No.', data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { title: 'Client Name', data: 'client_name', name: 'client_name' },
            { title: 'Logo', data: 'image', name: 'image' }
        ],
    });

    let touchtime = 0;
    $('#table-client tbody').on('click', 'tr', function () {
        if (touchtime == 0) {
            touchtime = new Date().getTime();
        } else {
            if (((new Date().getTime()) - touchtime) < 800) {
                let data = dt.row( this ).data();
                if (data != undefined) {
                    resetForm();
                    module.isHidden('#delete', false)

                    $('#id').val(data.id);
                    $('#name').val(data.client_name);
                    $('#image-text').text(data.image);
                    $('#image').removeAttr('required');

                    $('#submit').text('Update');

                }
                touchtime = 0;
            } else {
                touchtime = new Date().getTime();
            }
        }
    });

    $('#image').on('change', function(e){
        e.preventDefault();
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        var ext = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(ext, fileName.length).toLowerCase();
        if (!fileName) {
            fileName = 'Choose file';
        }
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            $(this).next('#image-text').html(fileName);
        }else{
            $(this).next('#image-text').html('Choose file');
            $(this).val(null);
        }
    });

    $('#form-client').submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + 'company/client/' + $('#id').val() + '/detail',
            method = "GET",
            formData = new FormData();
        if ($("#image")[0].files.length > 0) {
            formData.append('image', $("#image")[0].files[0])
        }
        formData.append('client_name', $("#name").val())
        module.callAjax(url, method).then(response => {
            if (parseInt(response.message) == 1) {
                method = "POST"
                url = module.base_url + `company/client/update`
                formData.append('id', $("#id").val())
            }else{
                method = "POST"
                url = module.base_url + `company/client/save`
            }
            module.callAjaxFormData(url, method, formData).then(response => {
                module.loading_stop();
                resetForm();
                dt.ajax.reload();
                module.send_notif({
                    icon: 'success',
                    message: response.message
                });
            });
        });
    });

    $('#cancel').click(function() {
        resetForm()
    });

    $('#delete').click(function() {
        swal({
            title: 'Are you sure?',
            text: "This client will be deleted permanently!",
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: true,
                confirm: {
                    text: "Yes, delete it",
                    value: true,
                    visible: true,
                    className: "btn-danger",
                    closeModal: true
                }
            }
        }).then((answers) => {
            if (answers == true) {
                module.loading_start();
                let url = module.base_url + 'company/client/' + $('#id').val() + '/delete',
                    method = "DELETE"
                module.callAjax(url, method).then(response => {
                    module.loading_stop();
                    resetForm();
                    dt.ajax.reload();
                    module.send_notif({
                        icon: 'success',
                        message: response.message
                    });
                });
            }
            console.clear();
        })
    });
});