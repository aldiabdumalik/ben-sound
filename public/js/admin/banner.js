import * as module from "./module.js";

$(document).ready(function () {
    const resetForm = () => {
        $("#form-banner-image").trigger("reset");
        $("#submit").text("Save");
        $("#id").val(0);
        $("#hero").val(null);
        $("#hero").attr("required");
        $("#hero-text").text("Choose file");
        module.isHidden("#delete", true);
        $(
            '#form-banner-image select, button[type="submit"], input[name=date]'
        ).prop("disabled", false);
        $("#form-banner-image input")
            .not("input[type=hidden]")
            .prop("readonly", false);
    };

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
                });
        });
    }

    init();

    const dt = $("#table-banner-image").DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        lengthChange: false,
        ajax: {
            method: "POST",
            url: module.base_url + "company/banner/dt",
            headers: { "X-CSRF-TOKEN": module.header_token },
        },
        columns: [
            { title: "No.", data: "DT_RowIndex", name: "DT_RowIndex" },
            { title: "Image", data: "image", name: "image" },
        ],
    });

    let touchtime = 0;
    $("#table-banner-image tbody").on("click", "tr", function () {
        if (touchtime == 0) {
            touchtime = new Date().getTime();
        } else {
            if (new Date().getTime() - touchtime < 800) {
                let data = dt.row(this).data();
                if (data != undefined) {
                    resetForm();
                    module.isHidden("#delete", false);

                    $("#id").val(data.id);
                    $("#hero-text").text(data.image);
                    $("#hero").removeAttr("required");

                    $("#submit").text("Update");
                }
                touchtime = 0;
            } else {
                touchtime = new Date().getTime();
            }
        }
    });

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

    $("#form-banner-image").submit(function (event) {
        event.preventDefault();
        module.loading_start();

        let url =
                module.base_url +
                "company/banner/" +
                $("#id").val() +
                "/detailimage",
            method = "GET",
            formData = new FormData();
        if ($("#hero")[0].files.length > 0) {
            formData.append("hero", $("#hero")[0].files[0]);
        }
        module.callAjax(url, method).then((response) => {
            if (parseInt(response.message) == 1) {
                method = "POST";
                url = module.base_url + `company/banner/updateimage`;
                formData.append("id", $("#id").val());
            } else {
                method = "POST";
                url = module.base_url + `company/banner/save`;
            }
            module.callAjaxFormData(url, method, formData).then((response) => {
                module.loading_stop();
                resetForm();
                dt.ajax.reload();
                module.send_notif({
                    icon: "success",
                    message: response.message,
                });
            });
        });
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

    $("#delete").click(function () {
        swal({
            title: "Are you sure?",
            text: "This client will be deleted permanently!",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: true,
                confirm: {
                    text: "Yes, delete it",
                    value: true,
                    visible: true,
                    className: "btn-danger",
                    closeModal: true,
                },
            },
        }).then((answers) => {
            if (answers == true) {
                module.loading_start();
                let url =
                        module.base_url +
                        "company/banner/" +
                        $("#id").val() +
                        "/delete",
                    method = "DELETE";
                module.callAjax(url, method).then((response) => {
                    module.loading_stop();
                    resetForm();
                    dt.ajax.reload();
                    module.send_notif({
                        icon: "success",
                        message: response.message,
                    });
                });
            }
            console.clear();
        });
    });
});
