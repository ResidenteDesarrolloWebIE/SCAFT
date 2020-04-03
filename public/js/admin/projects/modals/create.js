$(document).ready(function() {
    $("#idOfferProject").fileinput({
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
        elErrorContainer: '#errorFileProject',
        browseClass: "btn btn-primary btn-sm btn-file-sm",
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
    $("#createProject").on('show.bs.modal', function() {
        $("#idFolioProjectCreate").prop("disabled", true);
        $('#idFolioProjectCreate').attr({ "placeholder": "Selecciona un tipo" });
    });
    $("#createProject").on('hidden.bs.modal', function() {
        $("#formCreateProject")[0].reset();
        $('#idAffiliationProject').multiselect('destroy');
    });
    $("#divExcangeRateProject").hide();
    $("#idTypeProject").change(function() {
        $("#idFolioProjectCreate").prop("disabled", false);
        $('#idFolioProjectCreate').attr({ "placeholder": "20001" });
        if ($(this).val() == 1) { /* Suministro */
            $("#idInitialsProject").val("TB");
        } else {
            $("#idInitialsProject").val("SR");
        }
    });

    $("#idClientProject").change(function() {
        $("#idAffiliationProject").html('');
        $('#idAffiliationProject').multiselect('destroy');
        $.get('projects/customer/show?idCustomer=' + $(this).val(), function(data) {
            console.log(data);
            if (data.projects.length <= 0) {
                $("#idAffiliationProject").append('<option value="" selected disabled>No hay proyectos para el cliente selecionado </option>');
                $('#idAffiliationProject').prop("multiple", false);
            } else {
                $('#idAffiliationProject').prop("multiple", true);
                for (let index = 0; index < data.projects.length; index++) {
                    $("#idAffiliationProject").append('<option value="' + data.projects[index].id + '">' + data.projects[index].folio + '</option>')
                }
                $('#idAffiliationProject').multiselect({
                    buttonContainer: '<div class="btn-group form-control" />',
                    nonSelectedText: 'Selecciona un proyecto',
                    nSelectedText: 'Seleccionado',
                    allSelectedText: 'Todos selecionados'
                });
            }
        });
    });

    $("#idCoinProject").change(function() {
        if ($(this).val() == 1) { /* Pesos */
            $("#divExcangeRateProject").hide();
            $("#idFolioProjectCreate").prop("required", false);
        } else { /* Dolares */
            $("#divExcangeRateProject").show();
            $("#idFolioProjectCreate").prop("required", true);
        }
    });
});

function saveProject(formCreateProject) {
    if ($("#idFolioProjectCreate").val().length < 5) {
        Swal.fire({
            type: 'error',
            title: 'Ops!!!',
            text: "El folio del proyecto es incorrecto",
            preConfirm: () => {},
        })
    } else {
        $.ajax({
            type: 'post',
            url: 'projects/create',
            headers: {
                'X-CSRF-TOKEN': $('#token').val()
            },
            data: new FormData(formCreateProject),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                Swal.fire({
                    type: 'success',
                    title: 'En hora buena!!!',
                    text: 'El proyecto se ha creado correctamente!!!',
                    preConfirm: () => {
                        location.reload();
                    },
                })
            },
            error: function(data) {
                console.log(data);
                if (data.responseJSON == undefined) {
                    var message = "El proyecto no pudo ser creado";
                } else {
                    var message = data.responseJSON.message;
                }
                Swal.fire({
                    type: 'error',
                    title: 'Ops!!!',
                    text: message,
                    preConfirm: () => {},
                })
            }
        })
    }
}