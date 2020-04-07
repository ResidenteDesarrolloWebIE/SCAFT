$(document).ready(function () {
    $("#technicalAdvanceProject").on('hidden.bs.modal', function () {
        $("#formTecnicalAdvance")[0].reset();
        $("#idReceiveOrder").prop("disabled", false);
        $('#idEngineeringRelease').prop("readonly", false);
        $('#idWorkProgress').prop("readonly", false);
        $('#idDeliveryCustomer').prop("readonly", false);
        $("#divDowloadPurchaOrder").hide();
    });
    $("#technicalAdvanceProject").on('show.bs.modal', function () {
        $("#divFilePurchaseOrder").hide();
    });
    $("#idPurchaseOrder").fileinput({
        language: 'es',
        showRemove: true,
        dropZoneEnabled: false,
        maxFileCount: 10,
        mainClass: "input-group-lg",
        showZoom: true,
        showUpload: false,
        showCaption: true,
        showPreview: false,
        showCancel: false,
        initialPreviewShowDelete: false,
        allowedFileExtensions: ['pdf', 'PDF', 'CSV', 'csv', 'TXT', 'txt'],
        elErrorContainer: '#purchaseOrderError',
        browseClass: "btn btn-success btn-sm btn-file-sm",
        browseLabel: "Buscar",
        cancelLabel: "Cancelar",
        removeClass: "btn btn-danger btn-sm",
        removeLabel: "Eliminar",
        layoutTemplates: { progress: '' },
        showDownload: true,
        fileActionSettings: {
            showZoom: true,
        },
    });

    $("#idReceiveOrder").change(function () {
        if ($(this).val() == 100) {
            $("#divFilePurchaseOrder").show();
            $("#idPurchaseOrder").prop("required", true);
        } else {
            $("#divFilePurchaseOrder").hide();
            $("#idPurchaseOrder").prop("required", false);
        }
        /* if ($("#idReceiveOrder").is(":checked")){
            $("#divFilePurchaseOrder").show();
        } */
    });
});


function initializeTechnicalAdvance(project) {
    $("#divDowloadPurchaOrder").hide();
    /* if(project.type.id == 1){}elseif(project.type.id == 2){} */
    $('#idFolioProjectTechnicalAdvance').html(project.folio);
    $('#idTechnicalAdvance').val(project.technical_advances.id);
    $('#idReceiveOrder').val(project.technical_advances.receive_order);
    if (project.technical_advances.receive_order == 100) {
        $('#idReceiveOrder').prop("checked");
        $('#idReceiveOrder').prop("disabled", true);
        $("#idPurchaseOrder").prop("required", false);
        $("#divDowloadPurchaOrder").show();
    }

    $('#idEngineeringRelease').val(project.technical_advances.engineering_release);
    if (project.technical_advances.engineering_release == 100) {
        $('#idEngineeringRelease').prop("readonly", true);
    }
    $('#idWorkProgress').val(project.technical_advances.work_progress);
    if (project.technical_advances.work_progress == 100) {
        $('#idWorkProgress').prop("readonly", true);
    }
    $('#idDeliveryCustomer').val(project.technical_advances.delivery_customer);
    if (project.technical_advances.delivery_customer == 100) {
        $('#idDeliveryCustomer').prop("readonly", true);
    }
    $('#idEngineeringRelease').attr({ "min": project.technical_advances.engineering_release, "max": 100 });
    $('#idWorkProgress').attr({ "min": project.technical_advances.work_progress, "max": 100 });
    $('#idDeliveryCustomer').attr({ "min": project.technical_advances.delivery_customer, "max": 100 });
}

function editTechnicalAdvance(formTecnicalAdvance) {
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
            
            $.ajax({
                type: 'post',
                url: 'projects/technicalAdvance/edit',
                headers: { 'X-CSRF-TOKEN': $('#token').val() },
                data: new FormData(formTecnicalAdvance),
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    Swal.fire({
                        type: 'success',
                        title: '¡Editado!',
                        text: 'El avance se ha editado correctamente',
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
                        text: data.responseJSON.message,
                        preConfirm: () => { },
                    })
                }
            })
        }
    })
}