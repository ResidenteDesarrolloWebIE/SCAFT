/* var max_filas = 10;
var wrapper = $("#divAgreements");
var agrega_pago = $("#addAgreements");
var campoHTML = '<div><input type="text" name="pago_parcial[]"/><div class="remove_field">Remover</div></div>';
var x = 1;

$(agrega_pago).click(function (e) {
    e.preventDefault();
    if (x < max_filas) {
        $(wrapper).append(campoHTML);
        x++;
    }
});

$(wrapper).on("click", ".remove_field", function () {
    $(this).parent("div").remove(); x--;
}) */