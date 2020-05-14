$(function() {
    var table = $('#tableUsers').DataTable({
        "scrollX":true,
        columnDefs: [{ orderable: false, targets: 'not-sort' }],
        lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50, 100,"Todos"]],
        language: {
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ registros",
            "emptyTable": "Sin Registros",
            "info": "Mostrando _END_ de _TOTAL_ registros",
            "infoEmpty": "Sin resultados para mostrar",
            "search": "Palabra clave:"
        },
    });
    table.column('0:visible').order('asc').draw();

    $("#idProfilePicture").fileinput({
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
        allowedFileExtensions: ['png','PNG','jpg','JPG'],
        elErrorContainer: '#errorProfile',
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
});