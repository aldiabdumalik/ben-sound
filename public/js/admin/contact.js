import * as module from './module.js';

$(document).ready(function() {

    const dt = $('#table-contact').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        lengthChange: false,
        ajax: {
            method: "POST",
            url: module.base_url + 'contact/dt',
            headers: {'X-CSRF-TOKEN': module.header_token},
        },
        columns: [
            { title: 'No.', data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { title: 'Pengirim', data: 'name', name: 'name' },
            { title: 'Email', data: 'email', name: 'email' },
            { title: 'Subject', data: 'subject', name: 'subject' },
            { title: 'Tanggal Kirim', data: 'date', name: 'date' },
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

                    $('#message').append(data.message);

                }
                touchtime = 0;
            } else {
                touchtime = new Date().getTime();
            }
        }
    });
});