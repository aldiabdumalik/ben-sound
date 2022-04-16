import * as module from './module.js';

$(document).ready(function() {
    const resetForm = () => {
        $('#form-schedule').trigger('reset')
        $('#submit').text('Save')
        $('#id').val(0)
        module.isHidden('#delete', true)
        $('#form-schedule select, button[type="submit"], input[name=date]').prop('disabled', false);
        $('#form-schedule input').not('input[type=hidden]').prop('readonly', false);
    }

    const dt = $('#table-schedule').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        lengthChange: false,
        ajax: {
            method: "POST",
            url: module.base_url + 'schedule/dt',
            headers: {'X-CSRF-TOKEN': module.header_token},
        },
        columns: [
            { title: 'No.', data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { title: 'Email', data: 'email', name: 'email' },
            { title: 'Lokasi', data: 'schedule_location', name: 'schedule_location' },
            { title: 'Dari tanggal', data: 'schedule_start', name: 'schedule_start' },
            { title: 'Sampai', data: 'schedule_end', name: 'schedule_end' }
        ],
    });

    $('#date').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-success',
        cancelClass: 'btn-light',
        autoApply: true,
        opens: 'center',
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoUpdateInput: false
    }).on("apply.daterangepicker", function (e, picker) {
        let value = `${picker.startDate.format(picker.locale.format)} - ${picker.endDate.format(picker.locale.format)}`
        picker.element.val(value);
    });

    let touchtime = 0;
    $('#table-schedule tbody').on('click', 'tr', function () {
        if (touchtime == 0) {
            touchtime = new Date().getTime();
        } else {
            if (((new Date().getTime()) - touchtime) < 800) {
                let data = dt.row( this ).data();
                if (data != undefined) {
                    resetForm();
                    module.isHidden('#delete', false)
                    let start = data.schedule_start.split('/').reverse().join('-'),
                        end = (data.schedule_end == null) ? '' : ' - ' + data.schedule_end.split('/').reverse().join('-'),
                        date = `${start}${end}`;

                    $('#id').val(data.id);
                    $('#email').val(data.email);
                    $('#location').val(data.schedule_location);
                    $('#date').val(date);

                    $('#submit').text('Update Schedule');

                }
                touchtime = 0;
            } else {
                touchtime = new Date().getTime();
            }
        }
    });

    $('#form-schedule').submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + 'schedule/' + $('#id').val() + '/detail',
            method = "GET",
            date = $('#date').val().split(' '),
            data = {
                email: $('#email').val(),
                password: $('#password').val(),
                location: $('#location').val(),
                start: date[0].split('/').reverse().join('-'),
                end: date[2].split('/').reverse().join('-')
            }
        module.callAjax(url, method).then(response => {
            if (parseInt(response.message) == 1) {
                method = "PUT"
                url = module.base_url + `schedule/${$('#id').val()}/update`
            }else{
                method = "POST"
                url = module.base_url + `schedule/save`
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
            text: "This schedule will be deleted permanently!",
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
                let url = module.base_url + 'schedule/' + $('#id').val() + '/delete',
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