$(document).ready(function () {
    $("#allroles").hide();
    $("#editUser").on('hidden.bs.modal', function () {
        $("#formEditUser")[0].reset();
        $('#idSelectRolesUserEdit').multiselect('destroy');
        $("#allroles").hide();
    });
    $("#editUser").on('show.bs.modal', function () {
        $('#idSelectRolesUserEdit').multiselect({
            buttonContainer: '<div class="btn-group form-control" />',
            nonSelectedText: 'Selecciona un rol',
            nSelectedText: 'Seleccionado'
        });
    });
    $("#idTypeUser").change(function () {
        if ($(this).val() == "CLIENTE") { /* Suministro */
            $("#codeUser").prop("disabled", false);
            $('#codeUser').attr({ "placeholder": "C0001" });
            $("#allroles").hide();
        } else {
            $("#codeUser").val("");
            $('#codeUser').attr({ "placeholder": "" });
            $("#codeUser").prop("disabled", true);
            /* $("#selectRolesUser").prop("required", true); */
            $("#allroles").show();
        }
    });
});



function openModalEditUser(user) {
    console.log(user);
    
    $('#idUser').val(user.id);
    if(user.contacts[0] != undefined){
        $('#idContact').val(user.contacts[0].id);
    }
    
    if(user.code == null){var typeUser = "EMPLEADO";}
    else{var typeUser = "CLIENTE";}
    $('#idNameUsuario').html(user.name);
    $('#idTypeUserEdit').val(typeUser).prop("disabled",true);
    $('#idCodeUserEdit').val(user.code).prop("disabled",false);
    $('#idNameUserEdit').val(user.name).prop("disabled",false);
    $('#idEmailUserEdit').val(user.email).prop("disabled",false);
    $('#idPasswordUserEdit').val("").prop("disabled",false);/*  */
    $('#idPuestoUserEdit').prop("disabled",false);
    $('#idCellUserEdit').prop("disabled",false);
    $("#idSelectRolesUserEdit"+" option").each(function(){
        for (let index = 0; index < user.roles.length; index++) {
            $("#idSelectRolesUserEdit"+" option[value="+user.roles[index].id+"]").prop("selected",true);
        } 
    });
    $('#idSelectRolesUserEdit').multiselect({buttonContainer: '<div class="btn-group form-control" />',nonSelectedText: 'Selecciona un rol',nSelectedText: 'Seleccionado'});
    
    if(user.contacts[0] != undefined){
        $('#idPuestoUserEdit').val(user.contacts[0].job_position);
    }
    if(user.contacts[0] != undefined){
        $('#idCellUserEdit').val(user.contacts[0].cellphone);
    }
}


function editUser(formEditUser) {
    Swal.fire({
        title: '¿Está seguro de actualizar este Usuario?',
        text: "Esta acción no podrá deshacerse",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, actualizar usuario',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            procesando();
            $.ajax({
                type: 'post',
                url: 'users/edit',
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                },
                data: $("#formEditUser").serialize(),
                dataType: "JSON",
                success: function (data) {
                    Swal.fire({
                        type: 'success',
                        title: '¡Editado!',
                        text: 'El usuario se ha editado correctamente!!!',
                        preConfirm: () => {
                            location.reload();
                        },
                    })
                },
                error: function (data) {
                    if (data.responseJSON == undefined) {var message = "El usuario no pudo ser editado";} 
                    else {var message = data.responseJSON.message;}
                    Swal.fire({
                        type: 'error',
                        title: '¡Error!',
                        text: message,
                        preConfirm: () => { },
                    })
                }
            })
        }
    })
}
