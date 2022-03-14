import * as module from './module.js';

$(document).ready(function() {

    const schedule = (month=null) => {
        return new Promise((resolve, reject) => {
            let data = (month == null) ? null : {month: month};
            module.loading_start()
            module.callAjax(module.base_url + 'track/schedule/', 'GET', data).then(response => {
                module.loading_stop()
                let content = response.content;
                $('#list-schedule').empty();
                $('#wizard-status').empty();
                if (content.length > 0) {
                    console.log(content);
                    $.each(content, function (i, item) {
                        $('#list-schedule').append(rawElementSchedule(item.id, item.schedule_location, item.schedule_start, item.track_count))
                        // $('#accordion').append(rawElementSchedule(item.id, item.schedule_location, item.schedule_start, item.track));
                    });
                }
            })
        })
    }
    schedule();

    $(document).on('click', '.list-item-schedule', function(){
        resetForm()
        let id = $(this).data('schedule')
        let url = module.base_url + 'track/' + id + '/tracking';
        module.loading_start();
        module.isHidden('#div-form-track', false)
        module.callAjax(url, 'GET').then(response => {
            module.loading_stop();
            $('#id').val(id);
            $('#wizard-status').empty();
            let content = response.content;
            if (content.length > 0) {
                $.each(content, function (i, item) {
                    $('#wizard-status').append(`
                    <div class="wizard-step wizard-step-active">
                        <div class="wizard-step-icon">
                            <i class="fas ${item.icon}"></i>
                        </div>
                        <div class="wizard-step-label">
                            ${item.status}
                        </div>
                    </div>
                    `);
                });
            }
        })
    })


    $('#month').change(function() {
        let month = this.value
        schedule(month)
        resetForm()
    });

    function rawElementSchedule(id, location, date, track) {
        date = date.split('-')
        let badge = (track == 0) ? '' : `<span class="badge badge-primary badge-pill">${track}</span>`
        return `
        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center list-item-schedule" data-schedule="${id}">
            ${date[2]} - ${location}
            ${badge}
        </li>
        `
    }
    const resetForm = () => {
        module.isHidden('#div-form-track', true)
        $('#form-track').trigger('reset')
        $('#id').val(0)
        $('#form-track select, button[type="submit"], input[name=date]').prop('disabled', false);
        $('#form-track input').not('input[type=hidden]').prop('readonly', false);
    }

    $('#form-track').submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + 'track/save',
            method = "POST",
            data = {
                schedule: $('#id').val(),
                status: $('#status').val(),
                icon: $('#status').find('option:selected').data('icon')
            }
        module.callAjax(url, method, data).then(response => {
            module.loading_stop();
            resetForm();
            module.send_notif({
                icon: 'success',
                message: response.message
            });
            schedule($('#month').val())
        });
    });

    $('#cancel').click(function() {
        resetForm()
    });
});