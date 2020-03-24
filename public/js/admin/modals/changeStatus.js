function statusProject(project) {
    console.log(project);
    $('#folio').html(project.folio);
    $('#status').val(project.status);
    $('#project').val(project.id);
}

function changeStatus() {
    ruta = "project/changeStatus";
    token = $('#token').val();
    status = $('#status').val();
    project = $('#project').val();
    $.ajax({
        url: ruta,
        headers: { 'X-CSRF-TOKEN': token },
        dataType: 'JSON',
        type: 'POST',
        data: { id: project, status: status },
        success: function(data) {
            console.log(data)
            $('#changeStatus').hide();
            $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
            $('.modal-backdrop').remove();
            Swal.fire({
                type: 'success',
                title: 'Correcto!!!',
                text: 'El status se ha ha cambiado correctamente!!!',
                preConfirm: () => {
                    location.reload();
                },
            })
        },
        error: function(data) {
            Swal.fire({
                type: 'error',
                title: 'Ops..',
                text: 'El status no se ha cambiado!!!',
            })
        }
    });
}