  var numberOfDecimals = 4;
$(document).ready(function () {
    $("#economicAdvanceProject").on('hidden.bs.modal', function () {
        $("#formEconomicAdvance")[0].reset();
    });
});

function initilizeEconomicAdvance(project) {
    console.log("Proyecto",project);
    $('#idFolioProjectEconomicAdvance').html(project.folio);
    $('#idEconomicAdvance').val(project.economic_advances.id);
    $('#idTotalAmount').val(project.sum_total_amoun);

    var save=true;
    var initial_advance_mount = project.sum_total_amoun * (project.economic_advances.initial_advance_percentage / 100);
    $('#idInitialAdvanceMount').val(initial_advance_mount.toFixed(numberOfDecimals));
    $('#idInitialAdvancePercentage').val(project.economic_advances.initial_advance_percentage);
    $('#idInitialAdvancePercentage').attr({ "min": 0, "max": 100 });
    $('#idInitialAdvanceCompleted').val(project.economic_advances.initial_advance_completed);
    if (project.economic_advances.initial_advance_completed == 1 || (project.selectStatus!="" && project.inputStatus!="") ) {
        $('#idInitialAdvancePercentage').prop("readonly", true);
        $("#idInitialAdvanceCompleted").prop("disabled", true);
        save==false;
    }
    else {
        $('#idInitialAdvancePercentage').prop("readonly", false);
        $("#idInitialAdvanceCompleted").prop("disabled", false);
        save==true;
    }

    var final_payment_mount = project.sum_total_amoun * (project.economic_advances.final_payment_percentage / 100);
    $('#idFinalPaymentMount').val(final_payment_mount.toFixed(numberOfDecimals));
    $('#idFinalPaymentPercentage').val(project.economic_advances.final_payment_percentage);
    $('#idFinalPaymentPercentage').attr({ "min": 0, "max": 100 });
    $('#idFinalPaymentCompleted').val(project.economic_advances.final_payment_completed);
    if (project.economic_advances.final_payment_completed == 1 || (project.selectStatus!="" && project.inputStatus!="")) {
        $('#idFinalPaymentPercentage').prop("readonly", true);
        $("#idFinalPaymentCompleted").prop("disabled", true);
        save==false;
    }  else {
        $('#idFinalPaymentPercentage').prop("readonly", false);
        $("#idFinalPaymentCompleted").prop("disabled", false);
        save==true;
    } 

    var engineering_release_payment_mount = project.sum_total_amoun * (project.economic_advances.engineering_release_payment_percentage / 100);
    $('#idEngineeringReleasePaymentMount').val(engineering_release_payment_mount.toFixed(numberOfDecimals));
    $('#idEngineeringReleasePaymentPercentage').val(project.economic_advances.engineering_release_payment_percentage);
    $('#idEngineeringReleasePaymentPercentage').attr({ "min": 0, "max": 100 });
    $('#idEngineeringReleasePaymentCompleted').val(project.economic_advances.engineering_release_payment_completed);
    if (project.economic_advances.engineering_release_payment_completed == 1  || (project.selectStatus!="" && project.inputStatus!="")) {
        $('#idEngineeringReleasePaymentPercentage').prop("readonly", true);
        $("#idEngineeringReleasePaymentCompleted").prop("disabled", true);
        save==false;
    }  else {
        $('#idEngineeringReleasePaymentPercentage').prop("readonly", false);
        $("#idEngineeringReleasePaymentCompleted").prop("disabled", false);
        save==true;
    } 

    if(save==true){
        $('#btnSaveEconomicAdvance').show();
    }else{
        $('#btnSaveEconomicAdvance').hide();
    }
    var totalMount = project.economic_advances.initial_advance_mount + project.economic_advances.final_payment_mount + project.economic_advances.engineering_release_payment_mount;
    var totalPercentage = project.economic_advances.initial_advance_percentage + project.economic_advances.final_payment_percentage + project.economic_advances.engineering_release_payment_percentage;
    $('#idPaymentTotalMount').val(totalMount.toFixed(numberOfDecimals));
    $('#idPaymentTotalPercentage').val(totalPercentage);
}

function editEconomicAdvance() {
    if ($("#idPaymentTotalPercentage").val() > 100) {
        Swal.fire({
            type: 'error',
            title: '¡Error!',
            text: "La suma del porcentaje de las 3 etapas no puede ser mas del 100%",
            preConfirm: () => { },
        })
    } else {
        Swal.fire({
            title: '¿Está seguro de actualizar este avance?',
            text: "Esta acción no podrá deshacerse",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, actualizar avance',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                procesando();
                $.ajax({
                    type: 'put',
                    url: 'projects/economicAdvance/edit',
                    data: $("#formEconomicAdvance").serialize(),
                    dataType: "JSON",
                    success: function (data) {
                        Swal.fire({
                            type: 'success',
                            title: '¡Editado!',
                            text: 'El Avance tecnico se ha editado correctamente',
                            preConfirm: () => {
                                location.reload();
                            },
                        })
                    },
                    error: function (data) {
                        console.log(data.responseJSON.message);
                        Swal.fire({
                            type: 'error',
                            title: '¡Error!',
                            text: "El avance no pudo ser editado",
                            preConfirm: () => { },
                        })
                    }
                })
            }
        })
    }
}

function calculateAmount(event, etapa) {
    var totalAmount = $('#idTotalAmount').val();
    if (etapa == 1) {
        var percentage = $('#idInitialAdvancePercentage').val()
        var calculatedAmount = parseFloat(totalAmount) * parseFloat(percentage / 100);
        $('#idInitialAdvanceMount').val(calculatedAmount.toFixed(numberOfDecimals));
        changeTotalInDisplay();
    }

    if (etapa == 2) {
        var percentage = $('#idEngineeringReleasePaymentPercentage').val()
        var calculatedAmount = parseFloat(totalAmount) * parseFloat(percentage / 100);
        $('#idEngineeringReleasePaymentMount').val(calculatedAmount.toFixed(numberOfDecimals));
        changeTotalInDisplay();
    }

    if (etapa == 3) {
        var percentage = $('#idFinalPaymentPercentage').val()
        var calculatedAmount = parseFloat(totalAmount) * parseFloat(percentage / 100);
        $('#idFinalPaymentMount').val(calculatedAmount.toFixed(numberOfDecimals));
        changeTotalInDisplay();
    }
}

function changeTotalInDisplay() {
    var totalAmountCalculated = parseFloat($('#idInitialAdvanceMount').val()) + parseFloat($('#idFinalPaymentMount').val())
        + parseFloat($('#idEngineeringReleasePaymentMount').val());
    var percentageCalculated = parseFloat($('#idInitialAdvancePercentage').val()) + parseFloat($('#idEngineeringReleasePaymentPercentage').val())
        + parseFloat($('#idFinalPaymentPercentage').val())
    $('#idPaymentTotalMount').val(totalAmountCalculated.toFixed(numberOfDecimals));
    $('#idPaymentTotalPercentage').val(percentageCalculated);
}