$(document).ready(function(){
    $('#tableAgreements').DataTable({
        columnDefs: [{ orderable: false, targets: 'not-sort' }],
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
        language: {
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "emptyTable": "Sin Registros",
            "info": "Mostrando _END_ de _TOTAL_ registros",
            "infoEmpty": "Sin resultados para mostrar",
            "search": "Palabra clave:",
            "zeroRecords": "No hay coincidencias",
            "emptyTable": "Sin registros",
            "infoFiltered": "- Buscando en _MAX_ registros",
        },
    });

    $("#modalEditAgreement").on('hidden.bs.modal', function() {
        $("#frm_agreement")[0].reset();
    });
});


function openModalEditAgreement(agreement) {
    console.log(agreement);
    $('#idAgreement').val(agreement.id);
    $('#idMinuta').val(agreement.minuta_id);
    $('#agreement').val(agreement.agreement);
    $('#responsable').val(agreement.responsable);
    $('#dateStart').val(agreement.start_date);
    $('#dateEnd').val(agreement.end_date);
    $("#statusAgreement option:contains("+agreement.status+")").attr('selected', true);
    $('#statusAgreement').change();
}

function updateAgreement(form){
    swal.fire({
        title: '¿Está seguro de actualizar este Acuerdo?',
        text: "Esta acción no podrá deshacerse",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, actualizar acuerdo',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            procesando();
            var values = new FormData(form);
            var ruta = '/updateAgreement';
            var token = $('#token').val();
            $.ajax({
                method:'POST',
                url:ruta,
                headers: {'X-CSRF-TOKEN': token},
                data: values,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.Message == "Exito");
                    swal.fire({
                        type: 'success',
                        title: '¡Actualizado!',
                        text: 'El acuerdo se ha actualizado correctamente.',
                        preConfirm: () => {
                            location.reload();
                        },
                    })
                }
            });        
        }
    });
}

