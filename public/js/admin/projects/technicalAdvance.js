$(document).ready(function() {
    $("#technicalAdvanceProject").on('hidden.bs.modal', function() {
        $("#formTechnicalAdvance")[0].reset();
    });
});

function technicalAdvance(project) {
    console.log("Project", project)
    $('#folio').html(project.folio);
    $('#idTechnicalAdvance').val(project.technical_advances.id);

    $('#idReceiveOrder').val(project.technical_advances.receive_order);
    $('#idEngineeringRelease').val(project.technical_advances.engineering_release);
    $('#idWorkProgress').val(project.technical_advances.work_progress);
    $('#idDeliveryCustomer').val(project.technical_advances.delivery_customer);

    $('#idReceiveOrder').attr({ "min": project.technical_advances.receive_order, "max": 100 });
    $('#idEngineeringRelease').attr({ "min": project.technical_advances.engineering_release, "max": 100 });
    $('#idWorkProgress').attr({ "min": project.technical_advances.work_progress, "max": 100 });
    $('#idDeliveryCustomer').attr({ "min": project.technical_advances.delivery_customer, "max": 100 });
}

function editTechnicalEconomic() {
    console.log("Vamos a guardar");
    $.ajax({
        type: 'put',
        url: 'projects/technicalAdvance/edit',
        /* headers: {'X-CSRF-TOKEN': $('#token').val()}, */
        data: $("#formTecnicalAdvance").serialize(),
        dataType: "JSON",
        success: function(data) {
            Swal.fire({
                type: 'success',
                title: 'En hora buena!!!',
                text: 'El avance se ha editado correctamente!!!',
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