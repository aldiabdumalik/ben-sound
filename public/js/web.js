import * as module from "./admin/module.js";

$(document).ready(function () {
    $("#contact_form").submit(function (event) {
        event.preventDefault();
        let url = module.base_url + "action/send-message",
            method = "POST",
            data = {
                name: $("#name").val(),
                email: $("#email").val(),
                subject: $("#subject").val(),
                message: $("#message").val(),
            };

        $.ajax({
            url: url,
            method: method,
            dataType: "JSON",
            cache: false,
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            error: function (xhr, status, error) {
                module.send_notif({
                    icon: "error",
                    message: xhr.responseJSON.message,
                });
                console.clear();
            },
            success: function (response) {
                module.send_notif({
                    icon: "success",
                    message: response.message,
                });
            },
        });
    });

    $("#filter_dropdown_menu li").click(function () {
        let month = $(this).data("month"),
            url = module.base_url + "action/" + month + "/schedule.json",
            method = "GET";

        $.ajax({
            url: url,
            method: method,
            dataType: "JSON",
            cache: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            error: function (xhr, status, error) {
                module.send_notif({
                    icon: "error",
                    message: xhr.responseJSON.message,
                });
                console.clear();
            },
            success: function (response) {
                if (response.content.data == 0) {
                    $("#filter_dropdown").text(response.content.bulan);
                    $("#count-result").text(0);
                    module.send_notif({
                        icon: "info",
                        message: response.message,
                    });
                    $("#table-schedule tbody").empty();
                } else {
                    $("#count-result").text(response.content.count);
                    $("#table-schedule tbody").empty();
                    $.each(response.content.data, function (i, data) {
                        $("#table-schedule tbody").append(`
                        <tr>
                            <td>
                                <span class="td_title">LOCATION</span>
                                <div class="product_item clearfix">
                                    <div class="item_content">
                                        <h4 class="item_title">${
                                            data.schedule_location
                                        }</h4>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="td_title">DATE</span>
                                <span class="item_price">${data.schedule_start
                                    .split("-")
                                    .reverse()
                                    .join("/")}</span>
                            </td>
                            <td>
                                <span class="td_title">DATE END</span>
                                <span class="item_availability">${data.schedule_start
                                    .split("-")
                                    .reverse()
                                    .join("/")}</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn_border btn-tracking" data-id="${
                                    data.id
                                }">TRACKING</a>
                            </td>
                        </tr>
                        `);
                    });
                }
            },
        });
    });

    $(document).on("click", ".btn-tracking", function (e) {
        let id = $(this).data("id"),
            url = module.base_url + "action/" + id + "/track.json",
            method = "GET";

        $("#modal-tracking").modal("show");
        $("#track-id").text("TRCK00" + id);
        $.ajax({
            url: url,
            method: method,
            dataType: "JSON",
            cache: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            error: function (xhr, status, error) {
                module.send_notif({
                    icon: "error",
                    message: xhr.responseJSON.message,
                });
                console.clear();
            },
            success: function (response) {
                $("#wizard-status").empty();
                let content = response.content;
                if (content.length > 0) {
                    $.each(content, function (i, item) {
                        $("#wizard-status").append(`
                        <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="fas ${item.icon}"></i>
                            </div>
                            <div class="wizard-step-label">
                                ${item.status}
                            </div>
                            <div class="wizard-step-label">
                                <a href="${module.base_url}files/tracks/${item.image}" target="_blank" class="text-white">Lihat Image</a>
                            </div>
                        </div>
                        `);
                    });
                }
            },
        });
    });

    // $('#add-review').click(function () {
    //     $('#modal-review').modal('show')
    // });

    $(document).on("click", "#review_user", function () {
        let schedule = $("#track-id").text().substring(6);
        $("#modal-riview").modal("show");
        $("#schedule_id").val(schedule);
        $(".rating").starRating({
            inputName: "rating",
            showInfo: false,
            starIconEmpty: "far fa-star",
            starIconFull: "fas fa-star",
            starColorEmpty: "lightgray",
            starColorFull: "#FFC107",
            starsSize: 5,
            stars: 5,
        });
    });

    $("#image").on("change", function (e) {
        e.preventDefault();
        var fileName = $(this).val().replace("C:\\fakepath\\", " ");
        var ext = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(ext, fileName.length).toLowerCase();
        if (!fileName) {
            fileName = "Choose file";
        }
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
            $(this).next("#image-text").html(fileName);
        } else {
            $(this).next("#image-text").html("Choose file");
            $(this).val(null);
        }
    });

    $(document).on("submit", "#form-riview", function (e) {
        e.preventDefault();
        let formData = new FormData(),
            url = module.base_url + "action/send-riview",
            method = "POST";
        if ($("#image")[0].files.length > 0) {
            formData.append("image", $("#image")[0].files[0]);
        }
        formData.append("name", $("#name").val());
        formData.append("nilai", $("#rating_counter").val());
        formData.append("message", $("#message").val());
        console.log(formData);
        $.ajax({
            url: url,
            method: method,
            cache: false,
            data: formData,
            dataType: false,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            error: function (xhr, status, error) {
                module.send_notif({
                    icon: "error",
                    message: xhr.responseJSON.message,
                });
                console.clear();
            },
            success: function (response) {
                module.send_notif({
                    icon: "success",
                    message: response.message,
                });
                setTimeout(() => {
                    window.location = "/";
                }, 2000);
            },
        });
    });
    $(document).on("change", ".rating", function (e, stars, index) {
        $("#rating_counter").val(stars);
    });
    $("#modal-riview").on("hidden.bs.modal", function () {
        $("#form-riview").trigger("reset");
        $("#rating_counter").val(0);
        $("#schedule_id").val(0);
    });

    /* 1. Visualizing things on Hover - See next part for action on click */
    $("#stars li")
        .on("mouseover", function () {
            var onStar = parseInt($(this).data("value"), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this)
                .parent()
                .children("li.star")
                .each(function (e) {
                    if (e < onStar) {
                        $(this).addClass("hover");
                    } else {
                        $(this).removeClass("hover");
                    }
                });
        })
        .on("mouseout", function () {
            $(this)
                .parent()
                .children("li.star")
                .each(function (e) {
                    $(this).removeClass("hover");
                });
        });

    /* 2. Action to perform on click */
    $("#stars li").on("click", function () {
        var onStar = parseInt($(this).data("value"), 10); // The star currently selected
        var stars = $(this).parent().children("li.star");

        for (var i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass("selected");
        }

        for (var i = 0; i < onStar; i++) {
            $(stars[i]).addClass("selected");
        }

        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt(
            $("#stars li.selected").last().data("value"),
            10
        );
        $("#rating_counter").val(ratingValue);
    });
});
