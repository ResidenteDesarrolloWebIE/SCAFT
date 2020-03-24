$(document).ready(function () {
    $("#imagesGallery").on('hidden.bs.modal', function () {
        cleanModalImagesGalery();
    });
});

function cleanModalImagesGalery() {
    $('#idFolioGallery').html("");
    $('#images').html("");
}
function imagesGallery(button, offers) {
    console.log(offers, offers.project.id);
    if (button == "btnGallerySupply") {
        var ruta = "/supplies/imagesGallery"
        var rutaImage = "storage/Galeria/" + offers.folio + "/" + offers.project.folio + "/Galeria/Suministro/";
    }
    else if (button == "btnGalleryService") {
        var ruta = "/services/imagesGallery";
        var rutaImage = "storage/Galeria/" + offers.folio + "/" + offers.project.folio + "/Galeria/Servicio/";
    }
    var token = $('#idTokenGallery').val();
    $.ajax({
        url: ruta,
        headers: { 'X-CSRF-TOKEN': token },
        dataType: 'JSON',
        type: 'GET',
        data: { id: offers.project.id },
        success: function (data) {
            console.log(data.images)
            $('#idFolioGallery').html(offers.folio);
            var i = 0;
            if (data.images.length > 0) {
                $(data.images).each(function () {
                    $('#images').append(
                        /* '<a href="storage/imagesProjects/' + data.images[i].name + '"><img  src="storage/imagesProjects/' + data.images[i].name + '" width="120" height="96"></a>' */
                        '<img class="col-md-4 col-sm-5" style="margin-bottom:30px" src="' + rutaImage + data.images[i].name + '" width="120" height="126">'
                    ); i++;
                });
            } else {
                $('#images').append(
                    '<div class="alert text-center col" style="margin:27px 39px;background-color:gray; color:black" role="alert">' +
                    '<strong>No existen imagenes disponibles</strong>' +
                    '</div>'
                );
            }
        },
        error: function (data) {/* Si falla la peticion Ajax */ }
    });
}