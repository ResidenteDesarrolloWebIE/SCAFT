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
});