
$(document).ready(function () {
    $("#aditionalsDetails").on('hidden.bs.modal', function () {
        $("#bodyAditionalsDetails").html("");
    });
});

function inicializeAditionalsDetails(project) {
    $('#idFolioAditionalsDetailsProject').html(project.folio);
    if(project.aditionals_details.length != 0){
        var count=1;
        project.aditionals_details.forEach(aditional_detail => {
            $('#bodyAditionalsDetails').append(
                '<tr>'+
                    '<td>'+count+'</td>'+
                    '<td>'+aditional_detail.note+'</td>'+
                    '<td>'+aditional_detail.total_amount+'</td>'+
                    '<td>'+
                        '<a href="/projects/aditionalsDetails/download/'+aditional_detail.offer+'" style="margin-right:10px">'+
                            '<button type="button" class="btn btn-primary" title="Descargar"><i class="fas fa-download"></i></button>'+
                        '</a>'+
                        '<a href="/projects/aditionalsDetails/showPdf/'+aditional_detail.offer+'" target="_blank">'+
                            '<button type="button" class="btn btn-dark" title="Ver"><i class="fas fa-eye"></i></button>'+
                        '</a>'+
                    '</td>'+
                    '<td>'+
                        '<a href="/projects/aditionalsDetails/download/'+aditional_detail.purchase_order+'" style="margin-right:10px">'+
                            '<button type="button" class="btn btn-primary" title="Descargar"><i class="fas fa-download"></i></button>'+
                        '</a>'+
                        '<a href="/projects/aditionalsDetails/showPdf/'+aditional_detail.purchase_order+'" target="_blank">'+
                            '<button type="button" class="btn btn-dark" title="Ver "><i class="fas fa-eye"></i></button>'+
                        '</a>'+
                    '</td>'+
                '</tr>'
            );
            count++;
        });
    }else{
        $('#bodyAditionalsDetails').append('<tr><td colspan="5">No hay adicionales para este proyecto</td></tr>');
    }
}