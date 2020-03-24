$(document).ready(function () {
    $("#moreInformation").on('hidden.bs.modal', function () {
        cleanModalMoreInformation();
    });
});
function cleanModalMoreInformation() {
    $('#idFolio').html("");
    $('#idFolioAux').html("");
    $('#idFolioProject').html("");
    $('#idDate').html("");
    $('#idTotal').html("")
    $('#idDescription').html("");
    $('#idNotes').html("");
}
function moreInformation(id, button) {
    if (button == "btnInfoSupply") {
        var ruta = "/supplies/moreInformation";
        var type = "Suministro";
    } else if (button == "btnInfoService") {
        var ruta = "/services/moreInformation";
        var type = "Servicio";
    }
    var token = $('#tokenMoreInformation').val();
    $.ajax({
        url: ruta,
        headers: { 'X-CSRF-TOKEN': token },
        dataType: 'JSON',
        type: 'GET',
        data: { id: id },
        success: function (data) {
            console.log(data[0])
            $('#idFolio').html(data[0].folio);
            $('#idLabelFolio').html("Folio del " + type + ":");
            $('#idFolioAux').html(data[0].folio);
            $('#idFolioProject').html(data[0].project.folio);
            $('#idDate').html(data[0].created_at);
            $('#idTotal').html(data[0].ordered_reviews[0].final_amount + " " + data[0].ordered_reviews[0].coin.code)
            $('#idDescription').html(data[0].description);
            $('#idNotes').html(data[0].notes);
        },
        error: function (data) {/* Si falla la peticion Ajax */ }
    });
}
