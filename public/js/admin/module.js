export const base_url = window.location.origin + '/';
export const header_token = $("meta[name='csrf-token']").attr("content");
export function send_notif(params) {
    return new Promise((resolve, reject) => {
        let loaderBg;
        if (params.icon == 'info') {
            loaderBg = '#3b98b5';
        } else if (params.icon == 'warning') {
            loaderBg = '#da8609';
        } else if (params.icon == 'success') {
            loaderBg = '#5ba035';
        } else {
            loaderBg = '#bf441d';
        }
        $.toast({
            heading: 'Notification',
            text: params.message,
            showHideTransition: 'plain',
            position: 'top-right',
            loaderBg: loaderBg,
            icon: params.icon,
            hideAfter: 3000,
            stack: 1,
            afterHidden: function () {
                resolve('after hidden');
            }
        });
    })
}
export function loading_start() {
    $('body').loading().css('z-index', 999);
}
export function loading_stop() {
    $('body').loading('stop');
}
export function isHidden(element, value=true) {
    return (value == true) ? $(element).addClass('d-none') : $(element).removeClass('d-none')
}
export function callAjax(url, method, data=null) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            method: method,
            dataType: "JSON",
            cache: false,
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            error: function (xhr, status, error) {
                loading_stop();
                send_notif({
                    icon: 'error',
                    message: xhr.responseJSON.message
                });
                console.clear();
                    reject(xhr);
            },
            complete: function (response){
                resolve(response);
            }
        });
    });
}
export function callAjaxFormData(url, method, formData) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            method: method,
            data: formData,
            dataType: false,
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            error: function(xhr, status, x){
                loading_stop();
                send_notif({
                    icon: 'error',
                    message: xhr.responseJSON.message
                });
                console.clear();
                    reject(xhr);
            },
            complete: function (response){
                resolve(response);
            }
        });
    });
}