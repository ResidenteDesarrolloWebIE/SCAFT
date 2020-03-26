$(document).ready(function(){
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

    $("#internalMinutaProject").on('hidden.bs.modal', function() {
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
    $("#internalMinutaProject").modal('show');
}

function saveMinuta(form) {
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
                text: 'La minuta se ha guardad correctamente.',
                preConfirm: () => {
                    location.reload();
                },
            })
        },
        error:function(data){
            console.log(data);
        }
    });
}


