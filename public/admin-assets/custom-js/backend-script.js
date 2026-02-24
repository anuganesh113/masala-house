function showAlertMessage(msg) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "100",
        "timeOut": "5000",
        "extendedTimeOut": "100",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    msg.success ? toastr.success(msg.message) : toastr.error(msg.message);
}


$(document).ready(function () {
    $(`input, select, textarea`).focus(function (event) {
        let element = $(`span#${event.target.name}`)

        if (element) {
            element.hide();
        }
    });
});


function showPreview(event, id) {
    if (event?.target?.files?.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById(id);
        preview.src = src;
        preview.style.display = "block";
    }
}


$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $(`meta[name="csrf-token"]`).attr("content")
    },
    type: "POST",
    dataType: "json",
})


document.querySelector(`a#admin-logout`).addEventListener(`click`, function (event) {
    event.preventDefault();
    $(`form#admin-logout-form`).submit();
});
