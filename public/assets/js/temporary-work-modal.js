$(document).ready(function () {
    var val, date, otherVal;
    $(".modalDiv input").on("click", function () {
        $(this).addClass("active");
        val = $(this);
        $(".submit-requirment button").attr("disabled", "disabled");
        $(".submit-requirment button").css("opacity", ".5");
        $("#attachment-of-design .submit-requirment button").removeAttr(
            "disabled"
        );
    });

    $("#design-requirement .requirment-first ul li").click(function () {
        $(".requirment-first ul li").removeClass("active");
        $(this).addClass("active");
        id = $(this).attr("data-id");
        $(".requirment-second").css("display", "block");
        $("ul.show").hide();
        $("ul." + id + "")
            .removeClass("d-none")
            .addClass("show")
            .css("display", "block");
        var val = $(this).text();
        $(".requirment-first-value").val(val);
    });
    $("#design-requirement .requirment-second ul li").click(function () {
        $(".requirment-second ul li").removeClass("active");
        $("#design-requirement .requirment-second ul li input").removeClass(
            "active"
        );
        $(this).addClass("active");
        var val = $(this).text();
        $(".requirment-second-value").val(val);
        $("#design-requirement .requirment-second ul li.active input").addClass(
            "active"
        );
        $(".submit-requirment button").removeAttr("disabled");
        $(".submit-requirment button").css("opacity", "1");
    });
    $(".otherInput").on("input", function (e) {
        otherVal = $(this).val();
        $(".requirment-second-value").val(otherVal);
    });
    $("#design-requirement .submit-requirment button").click(function () {
        var val_first = $(".requirment-first-value").val();
        var val_second = $(".requirment-second-value").val();
        var full_val = val_first + " - " + val_second;
        val.attr("value", full_val);
    });
    var show_val = "";
    $("#scope-of-design .requirment-first ul li").click(function () {
        $("#scope-of-design .requirment-first ul li").removeClass("active");
        $(this).addClass("active");
        id = $(this).attr("data-id");
        $("#scope-of-design .requirment-second").css("display", "block");
        $("li.invisible." + id + "")
            .removeClass("invisible")
            .css("display", "block");

        var val = $(this).text();
        $("#scope-of-design .requirment-first-value").val(val);
    });
    $("#scope-of-design .requirment-second ul li").click(function () {
        $("#scope-of-design .requirment-second ul li").removeClass("active");
        $("#scope-of-design .requirment-second ul li input").removeClass(
            "active"
        );
        $(this).addClass("active");
        $("#scope-of-design .requirment-second ul li.active input").addClass(
            "active"
        );
        $("#scope-of-design .requirment-second").css("display", "block");
        $("#scope-of-design .submit-requirment button").removeAttr("disabled");
        $("#scope-of-design .submit-requirment button").css("opacity", "1");
    });
    $("#scope-of-design .submit-requirment button").click(function () {
        var val_first = $("#scope-of-design .requirment-first-value").val();
        var val_second = $("#scope-of-design .requirment-second-value").val();
        var full_val = val_first + " - " + val_second;
        console.log($("#scope-of-design .requirment-first-value").val());
        //val.val(full_val);
        $(".requirment-first-value").val(null);
        $(".requirment-second-value").val(null);
    });
    $("#scope-of-design .requirment-second ul li input").change(function () {
        date = new Date($(this).val());
        date =
            date.getFullYear() +
            "/" +
            (date.getMonth() + 1) +
            "/" +
            date.getDate();
        $("#scope-of-design .requirment-second-value").val(date);
        show_val += $(this).attr("name") + " " + date + "\n";
        $("#scopofdesign").val(show_val);
    });

    $("#attachment-of-design .requirment-first ul li").click(function () {
        $("#attachment-of-design .submit-requirment button").removeAttr(
            "disabled"
        );
        $("#attachment-of-design .requirment-first ul li").removeClass(
            "active"
        );
        $(this).addClass("active");
        id = $(this).attr("data-id");
        $("#attachment-of-design .requirment-second").css("display", "block");
        $("li.invisible." + id + "")
            .removeClass("invisible")
            .css("display", "block");
        var val = $(this).text();
        $("#attachment-of-design .requirment-first-value").val(val);
    });
});

$("input[name='list_of_attachments_folder']").change(function () {
    if ($(this).val() == "yes") {
        $(".list_of_attach_comment").removeClass("d-none").show();
    } else {
        $(".list_of_attach_comment").addClass("d-none").hide();
    }
});

$("input[name='reports_including_site_investigations_folder']").change(
    function () {
        if ($(this).val() == "yes") {
            $(".reports_including_site_investigations_comment")
                .removeClass("d-none")
                .show();
        } else {
            $(".reports_including_site_investigations_comment")
                .removeClass("d-none")
                .hide();
        }
    }
);

$("input[name='existing_ground_conditions_folder']").change(function () {
    if ($(this).val() == "yes") {
        $(".existing_ground_conditions_comment").removeClass("d-none").show();
    } else {
        $(".existing_ground_conditions_comment").removeClass("d-none").hide();
    }
});

$("input[name='preferred_non_preferred_methods_folder']").change(function () {
    if ($(this).val() == "yes") {
        $(".preferred_non_preferred_methods_comment")
            .removeClass("d-none")
            .show();
    } else {
        $(".preferred_non_preferred_methods_comment")
            .removeClass("d-none")
            .hide();
    }
});

$("input[name='access_limitations_folder']").change(function () {
    if ($(this).val() == "yes") {
        $(".access_limitations_comment").removeClass("d-none").show();
    } else {
        $(".access_limitations_comment").removeClass("d-none").hide();
    }
});

$("input[name='back_propping_folder']").change(function () {
    if ($(this).val() == "yes") {
        $(".back_propping_comment").removeClass("d-none").show();
    } else {
        $(".back_propping_comment").removeClass("d-none").hide();
    }
});

$("input[name='limitations_on_temporary_works_design_folder']").change(
    function () {
        if ($(this).val() == "yes") {
            $(".limitations_on_temporary_works_design_comment")
                .removeClass("d-none")
                .show();
        } else {
            $(".limitations_on_temporary_works_design_comment")
                .removeClass("d-none")
                .hide();
        }
    }
);

$("input[name='details_of_any_hazards_folder']").change(function () {
    if ($(this).val() == "yes") {
        $(".details_of_any_hazards_comment").removeClass("d-none").show();
    } else {
        $(".details_of_any_hazards_comment").removeClass("d-none").hide();
    }
});

$("input[name='3rd_party_requirements_folder']").change(function () {
    if ($(this).val() == "yes") {
        $(".3rd_party_requirements_comment").removeClass("d-none").show();
    } else {
        $(".3rd_party_requirements_comment").removeClass("d-none").hide();
    }
});
