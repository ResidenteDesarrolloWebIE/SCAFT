$(document).ready(function () {
    $("#allroles").hide();
    $("#createUser").on('hidden.bs.modal', function () {
        $("#formCreateUser")[0].reset();
        $('#selectRolesUser').multiselect('destroy');
        $("#allroles").hide();
    });
    $("#createUser").on('show.bs.modal', function () {
        $('#selectRolesUser').multiselect({
            buttonContainer: '<div class="btn-group form-control" />',
            nonSelectedText: 'Selecciona un rol',
            nSelectedText: 'Seleccionado'
        });
    });
    /* $("#idTypeUser").change(function() {
        $('input[name=idRoles\\[\\]]').prop('checked', false);
        $("#codeUser").val("");
        $('#codeUser').attr({ "placeholder": "C0001" });
        if ($(this).val() == "CLIENTE") { 
            $("#codeUser").prop("disabled", false);
            $("#allroles").hide();
        } else {
            $("#codeUser").prop("disabled", true);
            $("#allroles").show();
            $('#allroles').multiselect({
                buttonContainer: '<div class="btn-group form-control" />',
                nonSelectedText: 'Selecciona un rol',
                nSelectedText: 'Seleccionado'
            });
        }
    }); */
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

function saveUser(formCreateUser) {
    Swal.fire({
        title: '¿Está seguro de guardar este Usuario?',
        text: "Esta acción no podrá deshacerse",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, guardar usuario',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            procesando();
            $.ajax({
                type: 'post',
                url: 'users/create',
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                },
                data: $("#formCreateUser").serialize(),
                dataType: "JSON",
                success: function (data) {
                    Swal.fire({
                        type: 'success',
                        title: '¡Guardado!',
                        text: 'El usuario se ha guardado correctamente!!!',
                        preConfirm: () => {
                            location.reload();
                        },
                    })
                },
                error: function (data) {
                    if (data.responseJSON == undefined) {var message = "El usuario no pudo ser guardado";} 
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
