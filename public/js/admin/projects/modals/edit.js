$(document).ready(function () {
    $("#editProject").on('hidden.bs.modal', function () {
        $("#formEditProject")[0].reset();
        $('#idAffiliationProjectEdit').multiselect('destroy');
        $('.divAditionals').html("");
    });
    var addButton = $('.btnAddAditionals');
    var wrapper = $('.divAditionals');
    $(addButton).click(function () {
        var coin = $('#idCoinProjectEdit').val()
        if($('#idCoinProjectEdit').val()==1){
            var codeCoin = "MXN";
        }else{
            var codeCoin = "USD";
        }
        var fieldHTML =
            '<div class="form-group delete border border-dark" style="background-color: #DCDCDC">' +
                /* '<div class="row float-right" >' +
                    '<button type="button" style="margin-right: 3px;" title="" class="btn btn-dark btn-sm" data-toggle="collapse" data-target="#newAditionals'+numAditionals+'" ><i class="fas fa-eye"></i></button>' +
                    '<button type="button" style="margin-right: 12px;" title="Eliminar adicional" class="btn btn-danger btn-sm remove_button"><i class="fas fa-trash"></i></button>' +
                '</div> <br>' + */
                '<div class="form-group container">' +
                    '<div class="row float-right">' +
                        '<button type="button" style="margin-left: 5px;" title="Eliminar adicional" class="btn btn-danger btn-sm remove_button"><i class="fas fa-trash"></i></button>' +
                    '</div> <br>'  +
                    '<div class="row">' +
                        '<div class="col-md-5">' +
                            '<div class="form-group text-center">' +
                                '<label for="totalAmountEdit"><strong style="color:red">*</strong><strong>Monto total</strong></label>' +
                                '<div class="input-group">' +
                                    '<div class="input-group-append">'+
                                        '<select class="custom-select" name="btnSigno[]" id="idSignoAmout">'+
                                            '<option id="optionPesosEdit" value="+" selected>+</option>'+
                                            '<option id="optionDolaresEdit" value="-">-</option>'+
                                        '</select>'+ 
                                        /* '<input type="button" name="btnSigno[]" id="btnSignoAmount" value="+" style="width:25px"></input>'+  */
                                    '</div>'+
                                    '<input type="number" class="form-control" name="totalAmountsProjectsEdit[]" id="idTotalAmountsProjects" value="" min="1" pattern="^[0-9]+" step="any" required placeholder="Monto total">' +
                                    '<div class="input-group-append">' +
                                        '<select class="custom-select" name="coinsProjectsEdit[]" id="idCoinsProjects" required disabled>' +
                                            '<option id="optionPesosEdit" value="'+coin+'" selected>'+codeCoin+'</option>' +
                                            /* '<option id="optionDolaresEdit" value="coin">USD</option>' + */
                                        '</select>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md-7">' +
                            '<div class="form-group text-center">'+
                                '<label for="note"><strong style="color:red">*</strong><strong>Notas</strong></label>'+
                                '<textarea class="form-control" rows="2" id="idNotes" name="notesProjectsEdit[]" required placeholder="Notas"></textarea>'+
                            '</div>'+
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-md-6">' +
                            '<div class="form-group text-center">' +
                                '<label for="offerProject"><strong style="color:red">*</strong><strong>Oferta</strong></label>' +
                                '<input type="file" name="offersProjectsEdit[]" class="classFile" accept="document/*" required>' +
                                '<div id="errorFileProject" style="color:red"></div>' +
                            '</div>'+
                        '</div>' +
                        '<div class="col-md-6">' +
                            '<div class="form-group text-center">' +
                                '<label for="offerProject"><strong style="color:red">*</strong><strong>Orden de compra</strong></label>' +
                                '<input type="file" name="purchaseOrderProjectEdit[]" class="classFile" accept="document/*" required>' +
                                '<div id="errorFileProject" style="color:red"></div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';
        $(wrapper).append(fieldHTML);
        $(".classFile").fileinput({
            language: 'es',
            showRemove: true,
            dropZoneEnabled: false,
            maxFileCount: 10,
            mainClass: "input-group-lg",
            showZoom: true,
            showUpload: false,
            showCaption: true,
            showPreview: false,
            showCancel: false,
            initialPreviewShowDelete: false,
            allowedFileExtensions: ['pdf', 'PDF'],
            elErrorContainer: '#errorFileProject',
            browseClass: "btn btn-primary btn-sm btn-file-sm",
            browseLabel: "Buscar",
            cancelLabel: "Cancelar",
            removeClass: "btn btn-danger btn-sm",
            removeLabel: "Eliminar",
            layoutTemplates: { progress: '' },
            showDownload: true,
            /* fileActionSettings: {
                showZoom: true,
            }, */
        });
    });
    $(wrapper).on('click', '.remove_button', function (e) {
        e.preventDefault();
        $(this).parents(".delete").remove();
    });
});

function inicializeEditProject(project) {
    console.log("Project", project.aditionals_details.length)

    $('#idFolioProjectEditHeader').html(project.folio);
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

    if(project.aditionals_details.length != 0){
        $('#texMontoTotal').html("Monto inicial");
        
        var count=1;
        project.aditionals_details.forEach(aditional_detail => {
            console.log((aditional_detail.total_amount.toString()).substring(0, 1));
            $('.divAditionals').append(
                '<div class="form-group delete border border-dark" style="background-color: #DCDCDC">' +
                    '<div class="row float-right" >' +
                        '<button type="button" style="margin-right: 12px;" title="Ocultar" class="btn btn-dark btn-sm" data-toggle="collapse" data-target="#aditional'+count+'" ><i class="fas fa-eye"></i></button>' +
                    '</div> <br>'  +
                    '<div class="form-group container collapse" id="aditional'+count+'"> <br>' +
                        '<div class="row" >' +
                            '<div class="col-md-5">' +
                                '<div class="form-group text-center">' +
                                    '<label for="totalAmountEdit"><strong style="color:red">*</strong><strong>Monto total</strong></label>' +
                                    '<div class="input-group">' +
                                        '<div class="input-group-append">'+
                                            '<select class="custom-select" name="btnSigno[]" id="idSignoAmout"  disabled> '+
                                                '<option id="optionPesosEdit" value="'+getSign(aditional_detail.total_amount)+'" selected>'+getSign(aditional_detail.total_amount)+'</option>'+
                                                /* '<option id="optionDolaresEdit" value="-">-</option>'+ */
                                            '</select>'+ 
                                            /* '<input type="button" name="btnSigno[]" class="btnSignoAmount" value="+" style="width:25px"></input>'+  */
                                        '</div>'+
                                        '<input type="number" class="form-control" name="totalAmountsProjectsEdit[]" id="idTotalAmountsProjects" value="'+getTotalAmount(aditional_detail.total_amount)+'" disabled placeholder="Monto total">' +
                                        '<div class="input-group-append">' +
                                            '<select class="custom-select" name="coinsProjectsEdit[]" id="idCoinsProjects" disabled>' +
                                                '<option id="optionPesosEdit" value="'+project.coin.id+'" selected>'+project.coin.code+'</option>' +
                                                /* '<option id="optionDolaresEdit" value="2">USD</option>' + */
                                            '</select>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-7">' +
                                '<div class="form-group text-center">'+
                                    '<label for="note"><strong style="color:red">*</strong><strong>Notas</strong></label>'+
                                    '<textarea class="form-control" rows="2" id="idNotes" name="notesProjectsEdit[]" disabled placeholder="Notas">'+aditional_detail.note+'</textarea>'+
                                '</div>'+
                            '</div>' +
                        '</div>' +
                        '<div class="row">' +
                            '<div class="col-md-6 text-center">' +
                            '<label for="offerProject"><strong style="color:red">*</strong><strong>Oferta</strong></label>' +
                                '<div class="form-group text-center">' +

                                    '<a href="/projects/aditionalsDetails/download/'+aditional_detail.offer+'" style="margin-right:10px">'+
                                       ' <button type="button" class="btn btn-primary" title="Descargar oferta"><i class="fas fa-download"></i></button>'+
                                    '</a>'+
                                    '<a href="/projects/aditionalsDetails/showPdf/'+aditional_detail.offer+'" target="_blank">'+
                                        '<button type="button" class="btn btn-dark" title="Ver oferta"><i class="fas fa-eye"></i></button>'+
                                    '</a>'+
                                '</div>'+
                            '</div>' +
                            '<div class="col-md-6 text-center">' +
                                '<label for="offerProject"><strong style="color:red">*</strong><strong>Orden de compra</strong></label>' +
                                '<div class="form-group text-center">' +
                                    '<a href="/projects/aditionalsDetails/download/'+aditional_detail.purchase_order+'" style="margin-right:10px">'+
                                        '<button type="button" class="btn btn-primary" title="Descargar orden de compra"><i class="fas fa-download"></i></button>'+
                                    '</a>'+
                                    '<a href="/projects/aditionalsDetails/showPdf/'+aditional_detail.purchase_order+'"" target="_blank">'+
                                        '<button type="button" class="btn btn-dark" title="Ver orden de compra"><i class="fas fa-eye"></i></button>'+
                                    '</a>'+
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>'
            );
            count++;
        });
        $('.divAditionals').append(
            '<div class="form-group text-center" id="divSumaTotal">'+
                '<label for="sumaTotalAmountEdit"><strong style="color:red">*</strong><strong>Total sumado</strong></label>'+
                '<div class="input-group">'+
                    '<input type="number" class="form-control" name="sumaTotalAmountEdit" id="idSumaTotalAmountEdit" value="'+project.sum_total_amoun+'"  placeholder="Monto total" disabled>'+
                    '<div class="input-group-append">'+
                        '<select class="custom-select" name="coinProjectEditTotal" id="idCoinProjectEditTotal"  disabled>'+
                            '<option id="option" value="'+project.coin.id+'" selected>'+project.coin.code+'</option>' +
                        '</select>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );

    }else{
        $('#texMontoTotal').html("Monto total");
        /* $('#divSumaTotal').hide(); */
    }
}

function getSign(numero){
    if (Math.sign(numero)=='-1') {
        return '-';
    } else if(Math.sign(numero)=='+1'){
        return '+';
    }
}
function getTotalAmount(numero){
    if (Math.sign(numero)=='-1') {
        return (numero.toString()).substring(1);
    } else if(Math.sign(numero)=='+1'){
        return numero;
    }
}

function calculateTotal(event) {
    var totalAmount = $('#idSumaTotalAmountEdit').val();
    
    var percentage = $('#idInitialAdvancePercentage').val()
    var calculatedAmount = parseFloat(totalAmount) * parseFloat(percentage / 100);
    $('#idInitialAdvanceMount').val(calculatedAmount.toFixed(numberOfDecimals));
    changeTotalInDisplay();
    
}

function editProject(formEditProject) {
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
                type: 'post', /* put */
                url: 'projects/edit',
                data: new FormData(formEditProject),
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
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

