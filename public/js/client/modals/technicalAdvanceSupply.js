$(document).ready(function () {
    $("#technicalAdvanceSupply").on('hidden.bs.modal', function () {
        cleanModalTechnicalAdvanceSupply();
    });
});


function cleanModalTechnicalAdvanceSupply() {
    $('.progress-content .circle .active').removeClass().addClass('circle');
    $('.progress-content .circle .done').removeClass().addClass('circle');
    $('.progress-content .circle').removeClass().addClass('circle');
    $('.progress-content .bar .active').removeClass().addClass('bar');
    $('.progress-content .bar .done').removeClass().addClass('bar');
    $('.progress-content .bar').removeClass().addClass('bar');
    $('.progress-content .tooltip-stage-bottom').removeAttr('style');
    $('.progress-content .bar').removeAttr('style');

    $('#idTechnical').val("");
    $('#idFolioTechnical').html("");
    $('#idTotalTechnical').html("");
    $('#idTypeTechnical').html("");
    $('#idDescriptionTecnical').html("");

    $('#idStage0TechnicalSupply').html("");
    $('#idStage1TechnicalSupply').html("");
    $('#idStage2TechnicalSupply').html("");
    $('#idStage3TechnicalSupply').html();
    $('#idStage4TechnicalSupply').html("");
    $('#idStage5TechnicalSupply').html("");

    $('#idDateStage2TechnicalSupply').html("");
    $('#idDateStage3TechnicalSupply').html("");
    $('#idDateStage4TechnicalSupply').html("");
    $('#idDateStage5TechnicalSupply').html("");

    $('#idProgressTechnical').css("width", parseFloat(10).toFixed(2) + "%");
    $('#idProgressTechnical').removeClass().addClass('progress-bar');
    $('#idAdvanceTechnical').html('0.00 %');
}


function graphicSum(progress) {
    var i = 1;
    if (progress.etapa1 > 0 && progress.etapa1 < 100) {
        var j = 2;
        var p = progress.etapa1;
    } else if (progress.etapa1 == 100) {
        var j = 3;
        var p = 0;
        if (progress.etapa2 > 0 && progress.etapa2 < 100) {
            var j = 3;
            var p = progress.etapa2;
        } else if (progress.etapa2 == 100) {
            var j = 4;
            var p = 0;
            if (progress.etapa3 > 0 && progress.etapa3 < 100) {
                var j = 4;
                var p = progress.etapa3;
            } else if (progress.etapa3 == 100) {
                var j = 5;
                var p = 0;
                if (progress.etapa4 > 0 && progress.etapa4 < 100) {
                    var j = 5;
                    var p = progress.etapa4;
                } else if (progress.etapa4 == 100) {
                    var j = 6;
                    var p = 0;
                    if (progress.etapa5 > 0 && progress.etapa5 < 100) {
                        var j = 6;
                        var p = progress.etapa5;
                    } else if (progress.etapa5 == 100) {
                        var j = 7;
                        var p = 0;
                        if (progress.etapa6 > 0 && progress.etapa6 < 100) {
                            var j = 7;
                            var p = progress.etapa6;
                        } else if (progress.etapa6 == 100) {
                            var j = 8;
                            var p = 0;
                        }
                    }
                }
            }
        }

    } else {
        var j = 1;
    }
    setInterval(function () {
        if (i < j) {
            $('.progress-content .circle:nth-of-type(' + i + ')').addClass('active');
            $('.progress-content .circle:nth-of-type(' + (i - 1) + ')').removeClass('active').addClass('done');
            $('.progress-content .bar:nth-of-type(' + (i - 1) + ')').addClass('active');
            $('.progress-content .bar:nth-of-type(' + (i - 2) + ')').addClass('done').removeClass('active');
        }
        if (i == j - 1) {
            $('.progress-content .circle:nth-of-type(' + (i - 1) + ') .label-icon p').css('opacity', '1');
            $('.progress-content .circle:nth-of-type(' + (i - 1) + ') .label-icon p').css('visibility', 'visible');
            $('.progress-content .circle:nth-of-type(' + (i) + ') .label-icon p').css('opacity', '1');
            $('.progress-content .circle:nth-of-type(' + (i) + ') .label-icon p').css('visibility', 'visible');
            $('.progress-content .bar:nth-of-type(' + (i - 1) + ')').css('background', 'linear-gradient(to right, #81CE97 ' + p + '%, #FFF ' + (p + 20) + '%');
            if (progress.etapa6 < 100 || progress.etapa5 < 100 || progress.etapa4 < 100 || progress.etapa3 < 100) {
                $('.progress-content .circle:nth-of-type(' + (i) + ')').attr('data-toggle', 'modal');
                $('.progress-content .circle:nth-of-type(' + (i) + ')').attr('data-target', '#percentageModal');
                $('.progress-content .circle:nth-of-type(' + (i) + ')').attr('onclick', 'percentageSum(' + progress.idperc + ')');
            }
        }
        i++;
        if (i == 0) {
            $('.progress-content .bar').removeClass().addClass('bar');
            $('.progress-content div.circle').removeClass().addClass('circle');
            i = 1;
        }
    }, 0); /* 1000 */
    return;
}
function technicalAdvanceSupply(id) {
    var ruta = "/supplies/technicalAdvance";
    var type = "Suministro";
    var token = $('#idTokenTechnical').val();
    $.ajax({
        url: ruta,
        headers: { 'X-CSRF-TOKEN': token },
        dataType: 'JSON',
        type: 'GET',
        data: { id: id },
        success: function (data) {
            console.log(data[0]);
            $('#idTechnical').val(data[0].id);
            $('#idFolioTechnical').html(data[0].folio);
            $('#idTypeTechnical').html(type);
            $('#idDescriptionTechnical').html(data[0].description);

            if (data[0].code == "USD") {
                $('#idTotalTechnical').html('$ ' + parseFloat((data[0].ordered_reviews[0].final_amount / data[0].ordered_reviews[0].exchange_rate)).toFixed(2) + ' ' + data[0].ordered_reviews[0].coin.code);
            } else {
                $('#idTotalTechnical').html('$ ' + parseFloat(data[0].ordered_reviews[0].final_amount).toFixed(2) + ' ' + data[0].ordered_reviews[0].coin.code);
            }


            //percentages
            $('#idStage0TechnicalSupply').html(data[0].progress.etapa1 + "%");
            $('#idStage1TechnicalSupply').html(data[0].progress.etapa2 + "%");
            $('#idStage2TechnicalSupply').html(data[0].progress.etapa3 + "%");
            $('#idStage3TechnicalSupply').html(data[0].progress.etapa4 + "%");
            $('#idStage4TechnicalSupply').html(data[0].progress.etapa5 + "%");
            $('#idStage5TechnicalSupply').html(data[0].progress.etapa6 + "%");

            //percentages dates
            $('#idDateStage2TechnicalSupply').html(data[0].progress.date_etapa3);
            $('#idDateStage3TechnicalSupply').html(data[0].progress.date_etapa4);
            $('#idDateStage4TechnicalSupply').html(data[0].progress.date_etapa5);
            $('#idDateStage5TechnicalSupply').html(data[0].progress.date_etapa6);

            //graphic
            graphicSum(data[0].progress);

            var generalAdvance = 0;
            generalAdvance = (parseFloat(data[0].progress.etapa1) + parseFloat(data[0].progress.etapa2) + parseFloat(data[0].progress.etapa3) +
                parseFloat(data[0].progress.etapa4) + parseFloat(data[0].progress.etapa5) + parseFloat(data[0].progress.etapa6)) / 6;

            $('#idAdvanceTechnical').html(parseFloat(generalAdvance).toFixed(2) + ' %');
            $('#idProgressTechnical').css("width", parseFloat(generalAdvance).toFixed(2) + "%");

            if (generalAdvance >= 0 && generalAdvance <= 49) {
                $('#idProgressTechnical').removeClass("progress-bar bg-success");
                $('#idProgressTechnical').removeClass("progress-bar bg-warning");
                $('#idProgressTechnical').addClass("progress-bar bg-danger");
            } else if (generalAdvance >= 50 && generalAdvance < 95) {
                $('#idProgressTechnical').removeClass("progress-bar bg-danger");
                $('#idProgressTechnical').removeClass("progress-bar bg-success");
                $('#idProgressTechnical').addClass("progress-bar bg-warning");
            } else if (generalAdvance >= 95 && generalAdvance <= 100) {
                $('#idProgressTechnical').removeClass("progress-bar bg-danger");
                $('#idProgressTechnical').removeClass("progress-bar bg-warning");
                $('#idProgressTechnical').addClass("progress-bar bg-success");
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}