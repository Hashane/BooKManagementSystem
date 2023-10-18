$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Function to handle checkbox changes
    function handleCheckboxChange(model, id, isChecked) {
        const value = isChecked ? 1 : 0;
        $.post("manage-users", {
            model: model,
            id: id,
            isChecked: value,
        })
            .done(function (data) {
                console.log(data.message);
                showMessage(data.message);
            })
            .fail(function (error) {
                console.error(error);
            });
    }

    function showMessage(message) {
        var alertElement = $("<div>")
            .addClass("alert alert-success")
            .html(message);
        $("#message-container").html(alertElement);
    }

    // Add event listeners for staff checkboxes
    $(".staff-checkbox").on("change", function () {
        const staffId = $(this).data("id");
        const isChecked = $(this).is(":checked");
        handleCheckboxChange("staff", staffId, isChecked);
    });

    // Add event listeners for reader checkboxes
    $(".reader-checkbox").on("change", function () {
        const readerId = $(this).data("id");
        const isChecked = $(this).is(":checked");
        handleCheckboxChange("reader", readerId, isChecked);
    });
});
