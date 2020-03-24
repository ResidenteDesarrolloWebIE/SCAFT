$(document).ready(function () {
    $("#financiafinancialAdvance").on('hidden.bs.modal', function () {
        cleanModalFinancialAdvance();
    });
});

function cleanModalFinancialAdvance() {
    $('#idFolioEconomic').html("")
    $('#idEconomic').val("");
    $('#idTypeEconomic').html("");
    $('#idDescriptionEconomic').html("");
    $('#idTotalEconomic').html("");
    $('#idPayments').html("");

    $('#idPercentageEconomic').html('0.00 %');
    $('#idAdvanceEconomic').css("width", parseFloat(5).toFixed(2) + "%");
}
function financialAdvance(id, button) {
    if (button == "btnEconomicSupply") {
        var ruta = "/supplies/financialAdvance";
        var type = "Suministro";
    } else if (button == "btnEconomicService") {
        var ruta = "/services/financialAdvance";
        var type = "Servicio";
    }
    var token = $('#idTokenEconomic').val();

    $.ajax({
        url: ruta,
        headers: { 'X-CSRF-TOKEN': token },
        dataType: 'JSON',
        type: 'GET',
        data: { id: id },
        success: function (data) {
            $('#idEconomic').val(data[0].id);
            $('#idFolioEconomic').html(data[0].folio);
            $('#idTypeEconomic').html(type);
            $('#idDescriptionEconomic').html(data[0].description);
            console.log(data[0]);
            if (data[0].ordered_reviews[0].coin.code == "USD") {
                $('#idTotalEconomic').html('$ ' + parseFloat((data[0].ordered_reviews[0].final_amount / data[0].ordered_reviews[0].exchange_rate)).toFixed(2) + ' ' + data[0].ordered_reviews[0].coin.code);
            } else if (data[0].ordered_reviews[0].coin.code == "MXN") {
                $('#idTotalEconomic').html('$ ' + parseFloat(data[0].ordered_reviews[0].final_amount).toFixed(2) + ' ' + data[0].ordered_reviews[0].coin.code);
            }

            $('#idPayments').html("");
            var NumberOfPayments = 1;
            var i = 0;
            var totalPaid = 0;
            console.log(data[0].payments.length != 0);
            if (data[0].payments.length != 0) {
                $(data[0].payments).each(function () {
                    console.log("Evadims todo",data[0].payments);
                    if (data[0].payments[i].cat_coin_id == 1) { /* Peso mexicano   "MXN" */
                        console.log("Estamos en pesos mexicanos");
                        totalPaid += data[0].payments[i].amount * 1;
                        var amountPay = data[0].payments[i].amount;
                        var pay = "MXN";
                        if (data[0].payments[i].exchange == 1) {
                            var type = "N/A";
                        } else {
                            var type = data[0].payments[i].exchange;
                        }
                    } else if (data[0].payments[i].cat_coin_id == 2) { /* Dolar estaunidense "USD" */
                        console.log("Estamos en dolares");
                        totalPaid += data[0].payments[i].amount / data[0].payments[i].exchange;
                        var pay = "USD";
                        var amountPay = data[0].payments[i].amount / data[0].payments[i].exchange;
                        var type = data[0].payments[i].exchange;
                    }
                    $('#idPayments').append(
                        "<tr>" + "<td>" + NumberOfPayments++ + "</td>" +
                        "<td>" + "$" + parseFloat(amountPay).toFixed(2) + ' ' + pay + "</td>" +
                        "<td>" + type + "</td>" +
                        "<td>" + data[0].payments[i].date_amount + "</td>");
                    i++;
                });
            } else {
                console.log("No hay pagos");
                totalPaid = 0;
                Mensaje = 'No hay datos de pagos';
                $('#idPayments').append("<tr><td colspan='5' class='text-center'>" + Mensaje + "</td></tr>");
            }


            var liquidate = 0;
            if (data[0].ordered_reviews[0].coin.code == "MXN") {
                var totalToPay = data[0].ordered_reviews[0].final_amount;
            } else if (data[0].ordered_reviews[0].coin.code == "USD") {
                var totalToPay = (data[0].ordered_reviews[0].final_amount / data[0].ordered_reviews[0].exchange_rate);
            } else {
                alert("fff");
            }

            liquidate = totalToPay /* total a pagar */ - totalPaid /* total pagado */;

            var paymentPercentage = (totalPaid * 100) / totalToPay;
            console.log(paymentPercentage);
            if (paymentPercentage > 0) {

                $('#idPercentageEconomic').html(parseFloat(paymentPercentage).toFixed(2) + ' %');
                $('#idAdvanceEconomic').css("width", parseFloat(paymentPercentage).toFixed(2) + "%");
            }
        },
        error: function (data) {
            alert("No se encontro codigo d emoneda");
        }
    });
}