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

    const dt = $('#table-riview').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        lengthChange: false,
        ajax: {
            method: "POST",
            url: module.base_url + 'company/riview/dt',
            headers: {'X-CSRF-TOKEN': module.header_token},
        },
        columns: [
            { title: 'No.', data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { title: 'User', data: 'name', name: 'name' },
            { title: 'Bintang', data: 'nilai', name: 'nilai' },
            { title: 'Message', data: 'message', name: 'message' },
            { title: 'Status', data: 'is_show', name: 'is_show' },
            { title: 'Action', data: 'action', name: 'action' },
        ],
    });

    $(document).on('click', '.hidden-this', function () {
        let id = $(this).data('id'),
            url = module.base_url + 'company/riview/update/' + id,
            method = "PUT",
            data = {
                is_show: 0
            };
        module.callAjax(url, method, data).then(response => {
            module.loading_stop();
            dt.ajax.reload();
            module.send_notif({
                icon: 'success',
                message: response.message
            });
        });
    });

    $(document).on('click', '.show-this', function () {
        let id = $(this).data('id'),
            url = module.base_url + 'company/riview/update/' + id,
            method = "PUT",
            data = {
                is_show: 1
            };
        module.callAjax(url, method, data).then(response => {
            module.loading_stop();
            dt.ajax.reload();
            module.send_notif({
                icon: 'success',
                message: response.message
            });
        });
    });
    
});