import * as module from "./module.js";

$(document).ready(function () {
    function init() {
        module.loading_start();
        return new Promise((resolve, reject) => {
            module
                .callAjax(module.base_url + "company/banner/detail", "GET")
                .then((res) => {
                    module.loading_stop();
                    let data = res.content;
                    console.log(data);
                    $("#title").val(data.title);
                    $("#desc").val(data.desc);
                    $("#yt").val(data.yt_link);
                    $("#hero-text").text(data.img);
                });
        });
    }

    init();

    $("#hero").on("change", function (e) {
        e.preventDefault();
        var fileName = $(this).val().replace("C:\\fakepath\\", " ");
        var ext = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(ext, fileName.length).toLowerCase();
        if (!fileName) {
            fileName = "Choose file";
        }
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
            $(this).next("#hero-text").html(fileName);
        } else {
            $(this).next("#hero-text").html("Choose file");
            $(this).val(null);
        }
    });

    $("#form-banner").submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url = module.base_url + "company/banner/update",
            method = "POST",
            formData = new FormData();
        if ($("#hero")[0].files.length > 0) {
            formData.append("hero", $("#hero")[0].files[0]);
        }
        formData.append("title", $("#title").val());
        formData.append("desc", $("#desc").val());
        formData.append("yt_link", $("#yt").val());
        module.callAjaxFormData(url, method, formData).then((response) => {
            module.loading_stop();
            module.send_notif({
                icon: "success",
                message: response.message,
            });
            init();
        });
    });
});
