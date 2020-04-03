$(document).ready(function () {
    $("#editProject").on('hidden.bs.modal', function () {
        $("#formEditProject")[0].reset();
        $('#idAffiliationProjectEdit').multiselect('destroy');
    });
});

function inicializeEditProject(project) {
    console.log("Project", project.folio)
    $('#idProjectEdit').val(project.id);
    $('#idTypeProjectEdit').val(project.project_type_id);
    $('#idNameProjectEdit').val(project.name);
    $('#idSubstationProjectEdit').val(project.substation);
    $.get('projects/customer/edit?idCustomer=' + project.customer_id + '&idProject=' + project.id, function (data) {
        $("#idAffiliationProjectEdit").html('');
        $('#idAffiliationProjectEdit').multiselect('destroy');
        if (data.projects.length <= 0) {
            $("#idAffiliationProjectEdit").append('<option value="" selected disabled>No hay proyectos para el cliente </option>');
        } else {
            $('#idAffiliationProjectEdit').prop("multiple", true);
            for (let index = 0; index < data.projects.length; index++) {
                var checked = false;
                for (let index1 = 0; index1 < project.affiliations.length; index1++) {
                    if (data.projects[index].id == project.affiliations[index1].id) {
                        $("#idAffiliationProjectEdit").append('<option value="' + data.projects[index].id + '" selected>' + data.projects[index].folio + '</option>')
                        checked = true;
                    }
                }
                if (checked == false) {
                    $("#idAffiliationProjectEdit").append('<option value="' + data.projects[index].id + '">' + data.projects[index].folio + '</option>')
                }
            }
            $('#idAffiliationProjectEdit').multiselect({
                buttonContainer: '<div class="btn-group form-control" />',
                nonSelectedText: 'Selecciona un proyecto',
                nSelectedText: 'Seleccionado',
                allSelectedText: 'Todos selecionados'
            });
        }
    });
    $('#idAffiliationProjectEdit').val(project.status);
    $('#idInitialsProjectEdit').val(project.folio.substring(0, 2));
    $('#idFolioProjectEdit').val(project.folio.substring(2));
    $('#idClientProjectEdit').val(project.customer_id);
    $('#idTotalAmountEdit').val(project.total_amount);
    $('#idCoinProjectEdit').val(project.coin_id);
    if (project.coin_id == 1) { /* Pesos */
        $('#divExchangeRate').hide();
    } else { /* Dolares */
        $('#divExchangeRate').show();
        $('#idExchangeRateEdit').val(project.exchange_rate);
    }
    $('#idStatusProjectEdit').val(project.status);
    $('#idDescriptionProjectEdit').html(project.description);
}

function editProject(formulario) {
    Swal.fire({
        title: '¿Está seguro de actualizar este Acuerdo?',
        text: "Esta acción no podrá deshacerse",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, actualizar proyecto',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            procesando();
            $.ajax({
                type: 'put',
                url: 'projects/edit',
                data: $("#formEditProject").serialize(),
                dataType: "JSON",
                success: function (data) {
                    Swal.fire({
                        type: 'success',
                        title: '¡Editado!',
                        text: 'El proyecto se ha editado correctamente',
                        preConfirm: () => {
                            location.reload();
                        },
                    })
                },
                error: function (data) {
                    console.log(data.responseJSON.message);
                    Swal.fire({
                        type: 'error',
                        title: '¡Error!',
                        text: "El Proyecto no se ha podido editar"
                    })
                }
            })
        }
    })
}