import * as module from './module.js';

$(document).ready(function() {
    const resetForm = () => {
        $('#form-user').trigger('reset')
        $('#submit').text('Save')
        $('#id').val(0)
        module.isHidden('#delete', true)
        $('#form-user select, button[type="submit"], input[name=date]').prop('disabled', false);
        $('#form-user input').not('input[type=hidden]').prop('readonly', false);
    }

    const dt = $('#table-user').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        lengthChange: false,
        ajax: {
            method: "POST",
            url: module.base_url + 'user/dt',
            headers: {'X-CSRF-TOKEN': module.header_token},
        },
        columns: [
            { title: 'No.', data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { title: 'Name', data: 'name', name: 'name' },
            { title: 'Email', data: 'email', name: 'email' },
            { title: 'Level/Role', data: 'role', name: 'role' }
        ],
    });

    let touchtime = 0;
    $('#table-user tbody').on('click', 'tr', function () {
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
                    $('#email').val(data.email);
                    $('#role').val(data.role);

                    $('#submit').text('Update user');

                }
                touchtime = 0;
            } else {
                touchtime = new Date().getTime();
            }
        }
    });

    $('#form-user').submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + 'user/' + $('#id').val() + '/detail',
            method = "GET",
            data = {
                name: $('#name').val(),
                email: $('#email').val(),
                role: $('#role').val(),
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val()
            }
            console.log(data);
        module.callAjax(url, method).then(response => {
            if (parseInt(response.message) == 1) {
                method = "PUT"
                url = module.base_url + `user/${$('#id').val()}/update`
            }else{
                method = "POST"
                url = module.base_url + `user/save`
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
            text: "This user will be deleted permanently!",
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
                let url = module.base_url + 'user/' + $('#id').val() + '/delete',
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