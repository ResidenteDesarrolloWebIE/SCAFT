$(document).ready(function() {
    $("#createProject").on('hidden.bs.modal', function() {
        $("#formCreateProject")[0].reset();
    });
});

function saveProject(formCreateProject) {
    $.ajax({
        type: 'post',
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
                text: 'La cotizacion se ha creado correctamente!!!',
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