'use strict';

(function($) {
    $('[data-toggle="tooltip"]').tooltip();
    if (history.forward(1)) {
        location.replace(history.forward(1));
    } 
    addActiveClass();
})(jQuery);

$(window).on('load', function() {
    $(".loader").fadeOut();
    $("#preloder").delay(.0).fadeOut("slow");
    /* window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button";//esta linea es necesaria para chrome
    window.onhashchange=function(){window.location.hash="no-back-button";} */
});

function addActiveClass() {
    var objs = document.getElementsByTagName('a');
    for (var i = 0; i < objs.length; i++) {
        if (objs[i].href == window.location.href) {
            objs[i].className = objs[i].className + " active";
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
//CONVERTIR A MAYUSCUALAS AL ESCRIBIR
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//OCULTAR
function ocultar(e){
    document.getElementById(e).style.display = 'none';
}

//MOSTRAR
function mostrar(e){
    
    document.getElementById(e).style.display = 'block';
}