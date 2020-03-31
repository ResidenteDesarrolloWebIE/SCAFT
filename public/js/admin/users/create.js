$(document).ready(function() {
    $("#createUser").on('hidden.bs.modal', function() {
        $("#formCreateUser")[0].reset();
    });
});

function saveUser(formCreateUser) {
    $.ajax({
        type: 'POST',
        url: 'projects/create',
        headers: {
            'X-CSRF-TOKEN': $('#token').val()
        },
        data: new FormData(formCreateProject),
        /* data: $("#formulario").serialize(),  */
        dataType: "JSON",
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            Swal.fire({
                type: 'success',
                title: 'En hora buena!!!',
                text: 'El usuario se ha creado correctamente!!!',
                preConfirm: () => {
                    location.reload();
                },
            })
        },
        error: function(data) {
            console.log(data.responseJSON.message);
            Swal.fire({
                type: 'error',
                title: 'Ops!!!',
                text: data.responseJSON.message,
                preConfirm: () => {},
            })
        }
    })
}