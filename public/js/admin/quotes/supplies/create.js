$(document).ready(function() {
    $("#file").fileinput({
        language: 'es',
        showRemove: true,
        dropZoneEnabled: false,
        maxFileCount: 10,
        mainClass: "input-group-lg",
        showZoom: true,
        showUpload: false,
        showCaption: true,
        showPreview: true,
        showCancel: false,
        initialPreviewShowDelete: true,
        /* allowedFileExtensions: ['pdf', 'PDF', 'CSV', 'XLS', 'XLSX', 'XLSM', 'csv', 'xls', 'xlsx', 'xlsm', 'pps', 'ppsx', 'ppt', 'pptx', 'PPS', 'PPSX', 'PPT', 'PPTX', 'doc', 'docx', 'DOC', 'DOCX', 'xml', 'xmls', 'XML', 'XMLS', 'JPG', 'jpg', 'JPEG', 'jpeg', 'PNG', 'png', 'rar', 'RAR', 'zip', 'ZIP'], */
        allowedFileExtensions: ['pdf', 'PDF', 'CSV', 'csv', 'TXT', 'txt'],
        /* elErrorContainer: '#errorFileQuotesProduct', */
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

    /* $("#createQuoteProduct").on('hidden.bs.modal', function() {
        location.reload();
    }); */
    $("#clientQuoteProduct").change(function() {
        if ($(this).val() != "") {
            $("#contactQuoteProduct").prop("disabled", false);
            $("#optionContactQuoteProduct").html("Selecciona un contacto");
        } else {
            $("#contactQuoteProduct").val("");
            $("#contactQuoteProduct").prop("disabled", true);
        }
    });

});

function createSupply(button) {
    if (button == "btnSupply") {
        $("#typeQuotation").html("SUMINISTROS")
    } else if (button == "btnService") {
        $("#typeQuotation").html("SERVICIO")
    }

}

function validationExtension() {
    console.log("Debug");
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(.pdf|.txt)$/i;
    if (!allowedExtensions.exec(filePath)) {
        Swal.fire({
            type: 'error',
            title: 'Ops!!!',
            text: 'La extension del archivo no es permitidae!!!',
            preConfirm: () => {
                $('#errorFileQuotesProduct').html("Archivos no permitidos.");
            },
        })
        fileInput.value = '';
        return false;
    } else {
        $('#errorFileQuotesProduct').html("");
    }
}

function save(formulario) {
    console.log("VamosSSSSSSSSSSS");
    $.ajax({
        type: 'post',
        url: 'projects/create',
        headers: { 'X-CSRF-TOKEN': $('#token').val() },
        data: new FormData(formulario),
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
                text: /* 'La cotizacion no se ha podido crear correctamente!!!' + */ data.responseJSON.message,
                preConfirm: () => {
                    /* location.reload(); */
                    /* if (data.responseJSON) {
                        console.log(data.responseJSON.errors)
                        if (data.responseJSON.errors.fileQuotesProduct != 'undefined') {
                            $('#errorFileQuotesProduct').html(data.responseJSON.errors.fileQuotesProduct);
                        }
                    } */
                },
            })
        }
    })
}