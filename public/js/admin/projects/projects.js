
$(function() {
    var table = $('#tableProjects').DataTable({
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
        initComplete: function() {
            this.api().columns([1,2]).every(function() {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        var string="";
                        val.split(" ").forEach(element => {
                            if(element!=""){string += element.trim() +" ";}
                        });
                        string = string.trim();
                        column.search(string ? '^' + string + '$' : '', true, false).draw();}); /* val ? '^' + val + '$' : '' */
                $(select).click(function(e) {//Este codigo sirve para que no se active el ordenamiento junto con el filtro
                    e.stopPropagation();
                });
                column.data().unique().sort().each(function(d, j) {
                    if(d!=""){
                        select.append('<option value="' + d + '">' + d + '</option>')
                    }
                });
            });
        }
    });
    table.column('0:visible').order('asc').draw();
});