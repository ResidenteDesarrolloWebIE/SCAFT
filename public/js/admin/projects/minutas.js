$(document).ready(function(){
    $('#tableMinutes').DataTable({
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
    $.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
    $( ".date" ).datepicker();

    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var x = 2; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
       
            var fieldHTML = '<div class="form-group delete"><div class="form-group row"><div class="col-md-8"><label><b>Acuerdo</b></label> <button type="button" style="margin-left: 5px;" title="Eliminar acuerdo" class="btn btn-danger btn-sm remove_button"><i class="fas fa-trash"></i></button><textarea type="text" required class="form-control" name="acuerdos[]" style="resize: none;" rows="2"></textarea><br></div><div class="col-md-4"><label><b>Responsable</b></label><input type="text" class="form-control" name="responsables[]"><br></div><div class="form-group row" style="margin-left: 10px;"><label class="col-xs-2 col-form-label">Fecha Inicio</label><div class="col-sm-4"><input type="date" class="form-control" name="dateStart[]"></div><label class="col-xs-2 col-form-label">Fecha Final</label><div class="col-sm-4"><input type="date" class="form-control" name="dateEnd[]"></div></div></div>'; //New input field html 
            x++; //Increment field counter

            $(wrapper).append(fieldHTML); // Add field html
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parents(".delete").remove(); //Remove field html
        x--; //Decrement field counter
    });

    $("#createMinuta").on('hidden.bs.modal', function() {
        wrapper.html('');
        $("#frm_minute")[0].reset();
    });
});

function openModalAddMinute(project) {
    console.log(project);
    $('#project_id').val(project.id);
    var ruta = '/getFolioMinute';
    var token = $('#token').val();
    $.ajax({
        method:'POST',
        url:ruta,
        headers: {'X-CSRF-TOKEN': token},
        dataType: "JSON",
        data: {project},
        cache: false,
        success:function(data){
            console.log(data.folio);
            $('#folioText').text(data.folio)
            $('#folio').val(data.folio);
        },
        error:function(data){
            console.log(data);
        }
    });
    $("#createMinuta").modal('show');
}

function saveMinuta(form) {    
    swal.fire({
        title: '¿Está seguro de guardar esta Minuta?',
        text: "Esta acción no podrá deshacerse",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, guardar minuta',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            procesando();
            var values = new FormData(form);
            var ruta = '/saveMinuta';
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
                        title: '¡Guardado!',
                        text: 'La minuta se ha guardado correctamente.',
                        preConfirm: () => {
                            location.reload();
                        },
                    })
                }
            });        
        }
    });
}

function getAgreements(id) {
    procesando();
    var ruta = '/getAgreements/'+id;
    var token = $('#token').val();
    var tableAgreements = $("#tbl_agreements");
    tableAgreements.html("");
    $.ajax({
        method:'GET',
        url:ruta,
        headers: {'X-CSRF-TOKEN': token},
        data: {id},
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
            swal.close();
            console.log(data);
            for (var i = 0; i < data.agreements.length; i++) {
                var trtable = "<tr><td align='center'>"
                + (i+1) + "</td><td align='center'>"
                + data.agreements[i].agreement + "</td><td align='center'>"
                + data.agreements[i].responsable + "</td><td align='center'>"
                + data.agreements[i].status + "</td><td align='center'>"
                + data.agreements[i].start_date + "</td><td align='center'>"
                + data.agreements[i].end_date + "</td>";
                tableAgreements.append(trtable +"</tr>");
            }
        },
        error:function(data){
            console.log(data);
        }
    });
}

function exportAdvance(id){
    console.log(id);
    var ruta ="/exportMinute/"+id;
    var token = $('#token').val();
    $.ajax({
        url:ruta,
        headers: {'X-CSRF-TOKEN': token},
        dataType: 'JSON',
        method:'GET',
        data: id,
        cache: false
    });
}



