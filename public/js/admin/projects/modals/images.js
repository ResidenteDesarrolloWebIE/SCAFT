$(document).ready(function () {
    $("#imagesProject").on('hidden.bs.modal', function () {
        /* $("#real-dropzone")[0].reset(); */
        $('#dropzonePreview').html("");
    });
});

function imagesProject(project) {

    $('#idFolioProjectImages').html(project.folio);
    $('#idPro').val(project.id);
    $('#idFolioPro').val(project.folio);
    console.log(project.folio);
    console.log($('#idFolioPro').val());
    $('#idTypePro').val(project.project_type_id);
    var objDZ = Dropzone.forElement("#real-dropzone");
    objDZ.emit("initFiles");
}
if (document.querySelector('#preview-template') != null) {
    var photo_counter = 0;
    Dropzone.options.realDropzone = {
        uploadMultiple: false,
        maxFilesize: 100,
        /* autoProcessQueue: false, */
        previewsContainer: '#dropzonePreview',
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        addRemoveLinks: true,
        dictRemoveFile: 'Eliminar',
        dictFileTooBig: 'La imagen es más grande que 100 MB',
        dictRemoveFileConfirmation: "¿Estas seguro de eliminar esta imagen?",
        init: function () {
            var myDropzone = this;
            this.on("initFiles", function (file) {
                $.get('/projects/images?id=' + $('#idPro').val(), function (data) {
                    console.log(data);
                    $.each(data.images, function (key, value) {
                        var file = { name: value.original, size: value.size };
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.createThumbnailFromUrl(file, value.server);
                        myDropzone.emit("complete", file);
                        $('.serverfilename', file.previewElement).val(value.name);
                        $("#photoCounter").text("(" + photo_counter + ")");
                    });
                });

            });

            this.on("removedfile", function (file) {
                if($('.serverfilename',file.previewElement).val() == ""){
                   var nameImage = file.name;
                }else{
                    var nameImage = $('.serverfilename',file.previewElement).val();
                }
                var folioProject = $('#idFolioPro').val()
                var typeProject = $('#idTypePro').val()
                $.ajax({
                    type: 'POST',
                    url: '/projects/images/delete',
                    data: { name:nameImage, folioProject: folioProject, typeProject: typeProject, _token: $('#csrf-token').val() },
                    dataType: 'JSON',
                    success: function (data) {
                        Swal.fire({
                            type: 'success',
                            title: '¡Eliminado!',
                            text: "La imagen fue eliminada correctamente",
                            preConfirm: () => { },
                        })
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
            this.on("resetFiles", function (file) {
                console.log(myDropzone.getAcceptedFiles());
                $.each(myDropzone.getAcceptedFiles(), function (key, value) {
                    $('.serverfilename', value.previewElement).val("");
                });
            });
        },
        error: function (file, response) {
            if ($.type(response) === "string")
                var message = response;
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        },
        success: function (file, response) {
            $('.serverfilename',file.previewElement).val(response.imageName);
            $('.dz-filename',file.previewElement).html(response.imageName)
        }
    }
}