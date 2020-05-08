'use strict';

(function($) {
    $('[data-toggle="tooltip"]').tooltip();
    addActiveClass();
})(jQuery);

function addActiveClass() {
    var objs = document.getElementsByTagName('a');
    for (var i = 0; i < objs.length; i++) {
        if (objs[i].href == window.location.href) {
            objs[i].parentNode.className = objs[i].parentNode.className + " active";
        }
    }
}

function procesando() {
    var timerInterval
    swal.fire({
        title: 'PROCESANDO',
        html: 'AGUARDA UN MOMENTO POR FAVOR.',

        onBeforeOpen: () => {
            Swal.showLoading();
        }
    })
}

function initializeModalsCustomers(project) {
    $('#idFolioProjectGallery').html(project.folio);
    $('#idFolioProjectOffer').html(project.folio);
    $('#idFolioProjectPurchaseOrder').html(project.folio);
    $('#idFolioProjectMinuta').html(project.folio);
}