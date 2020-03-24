$(document).ready(function() {
    $("#economicAdvanceProject").on('hidden.bs.modal', function() {
        $("#formEconomicAdvance")[0].reset();
    });
});

function economicAdvance(project) {
    console.log("Project", project)
    $('#folio').html(project.folio);

    $('#idEconomicAdvance').val(project.economic_advances.id);

    $('#idAdvance').val(project.economic_advances.advance);
    $('#idAdvance').attr({ "min": project.economic_advances.advance, "max": 100 });
    $('#idEngineeringReleasePayment').val(project.economic_advances.engineering_release_payment);
    $('#idEngineeringReleasePayment').attr({ "min": project.economic_advances.engineering_release_payment, "max": 100 });
    $('#idFinalPayment').val(project.economic_advances.final_payment);
    $('#idFinalPayment').attr({ "min": project.economic_advances.final_payment, "max": 100 });
    $('#idTotal').val(project.economic_advances.total);
    $('#idTotal').attr({ "min": project.economic_advances.total, "max": 100 });
}

function editEconomicAdvance() {
    console.log("Vamos a edita", $("#formEconomicAdvance").serialize());
    $.ajax({
        type: 'put',
        url: 'projects/economicAdvance/edit',
        /* headers: {'X-CSRF-TOKEN': $('#token').val()}, */
        data: $("#formEconomicAdvance").serialize(),
        dataType: "JSON",
        success: function(data) {
            console.log("hola")
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