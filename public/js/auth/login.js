
$(document).ready(function(){
    if(history.forward(1)){
        location.replace( history.forward(1) );
    }
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button"
    window.onhashchange=function(){window.location.hash="no-back-button";}
});


function nobackbutton() {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function() {
        window.location.hash = "no-back-button";
    }
}
function showPassword(){
    var tipo = document.getElementById("password");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}