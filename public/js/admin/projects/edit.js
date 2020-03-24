$(document).ready(function() {
    $("#createProject").on('hidden.bs.modal', function() {
        $("#formEditProject")[0].reset();
    });
});

function inicializeEditProject(project) {
    console.log("Project", project)
    $('#folio').html(project.folio);
    $('#idProject').val(project.id);
    $('#idFolioProject').val(project.folio);
    $('#idCustomerProject').val(project.customer_id);
    $('#idSubstationProject').val(project.substation);
    $('#idNameProject').val(project.name);
    $('#idTypeProject').val(project.type);
    $('#idDescription').html(project.description);
    $('#idStatusProject').val(project.status);
    console.log("GGGGgggggggg");
}

function editProject(formulario) {
    console.log("Vamos a editar",$("#formEditProject").serialize());
    $.ajax({
        type: 'put',
        url: 'projects/edit',
        /* headers: {
            'X-CSRF-TOKEN': $('#token').val()
        }, */
        data: $("#formEditProject").serialize(),
        /* data: new FormData(formulario), */
        dataType: "JSON",
/*         cache: false,
        contentType: false,
        processData: false, */
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