$(document).ready(function() {
    $("#createUser").on('hidden.bs.modal', function() {
        $("#formCreateUser")[0].reset();
    });

    $("#idTypeUser").change(function() {
        $('input[name=idRoles\\[\\]]').prop('checked', false);
        $("#codeUser").val("");
        $('#codeUser').attr({ "placeholder": "C0001" });
        if ($(this).val() == "CLIENTE") { /* Suministro */
            $("#codeUser").prop("disabled", false);
            $("#allroles").hide();
        } else {
            $("#codeUser").prop("disabled", true);
            $("#allroles").show();
        }
    });

});

function saveUser(formCreateUser) {
    $.ajax({
        type: 'post',
        url: 'users/create',
        headers: {
            'X-CSRF-TOKEN': $('#token').val()
        },
        //data: new FormData(formCreateUser),
        data: $("#formCreateUser").serialize(), 
        dataType: "JSON",
        /*cache: false,
        contentType: false,
        processData: false,*/
        success: function(data) {
            Swal.fire({
                type: 'success',
                title: 'En hora buena!!!',
                text: 'El usuario se ha creado correctamente!!!',
                preConfirm: () => {
                    location.reload();
                },
            })
        },
        error: function(data) {
            console.log(data.responseJSON.message);
            Swal.fire({
                type: 'error',
                title: 'Ops!!!',
                text: data.responseJSON.message,
                preConfirm: () => {},
            })
        }
    })
}
