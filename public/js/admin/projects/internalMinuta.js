$(document).ready(function(){
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var x = 2; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
       
            var fieldHTML = '<div class="form-group"><label><b>Acuerdo</b></label> <button type="button" style="margin-left: 5px;" title="Eliminar acuerdo" class="btn btn-danger btn-sm remove_button"><i class="fas fa-trash"></i></button><textarea type="text" class="form-control" name="acuerdo[]"></textarea><br><div class="form-group row" style="margin-left: 10px;"><label class="col-xs-2 col-form-label">Fecha Inicio</label><div class="col-sm-4"><input type="date" class="form-control" name="dateStart[]"></div><label for="dateEnd" class="col-xs-2 col-form-label">Fecha Final</label><div class="col-sm-4"><input type="date" class="form-control"></div></div></div>'; //New input field html 
            x++; //Increment field counter

            $(wrapper).append(fieldHTML); // Add field html
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    $("#internalMinutaProject").on('hidden.bs.modal', function() {
        wrapper.html('');
        $("#frm_minute")[0].reset();
    });
});

function saveMinuta(form) {
    var values = new FormData(form);
    var ruta ='saveMinuta';
    var token = $('#token').val();
    $.ajax({
        method:'GET',
        url:ruta,
        headers: {'X-CSRF-TOKEN': token},
        success:function(data){
            console.log(data.Message);
        },
        error:function(data){
            console.log(data);
        }
    });
}


