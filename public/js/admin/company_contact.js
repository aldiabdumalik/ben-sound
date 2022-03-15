import * as module from './module.js';

$(document).ready(function() {
    const resetForm = () => {
        $('#form-contact').trigger('reset')
        $('#submit').text('Save')
        $('#id').val(0)
        module.isHidden('#delete', true)
        $('#form-contact select, button[type="submit"], input[name=date]').prop('disabled', false);
        $('#form-contact input').not('input[type=hidden]').prop('readonly', false);
    }

    const dt = $('#table-contact').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        lengthChange: false,
        ajax: {
            method: "POST",
            url: module.base_url + 'company_contact/dt',
            headers: {'X-CSRF-TOKEN': module.header_token},
        },
        columns: [
            { title: 'No.', data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { title: 'Type', data: 'name', name: 'name' },
            { title: 'Contact', data: 'value', name: 'value' }
        ],
    });

    let touchtime = 0;
    $('#table-contact tbody').on('click', 'tr', function () {
        if (touchtime == 0) {
            touchtime = new Date().getTime();
        } else {
            if (((new Date().getTime()) - touchtime) < 800) {
                let data = dt.row( this ).data();
                if (data != undefined) {
                    resetForm();
                    module.isHidden('#delete', false)

                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#value').val(value);

                    $('#submit').text('Update');

                }
                touchtime = 0;
            } else {
                touchtime = new Date().getTime();
            }
        }
    });

    $('#form-contact').submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + 'company_contact/' + $('#id').val() + '/detail',
            method = "GET",
            data = {
                name: $('#name').val(),
                value: $('#value').val()
            }
        module.callAjax(url, method).then(response => {
            if (parseInt(response.message) == 1) {
                method = "PUT"
                url = module.base_url + `company_contact/${$('#id').val()}/update`
            }else{
                method = "POST"
                url = module.base_url + `company_contact/save`
            }
            module.callAjax(url, method, data).then(response => {
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
            text: "This contact will be deleted permanently!",
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
                let url = module.base_url + 'company_contact/' + $('#id').val() + '/delete',
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