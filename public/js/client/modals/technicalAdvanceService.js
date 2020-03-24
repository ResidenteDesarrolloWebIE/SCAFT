$(document).ready(function () {
    $("#technicalAdvanceService").on('hidden.bs.modal', function () {
        cleanModalTechnicalAdvanceService();
    });
});

function cleanModalTechnicalAdvanceService() {
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

    $('#idStage0TechnicalService').html("");
    $('#idStage1TechnicalService').html("");
    $('#idStage2TechnicalService').html("");
    $('#idStage3TechnicalService').html();
    $('#idStage4TechnicalService').html("");

    $('#idDateStage2TechnicalService').html("");
    $('#idDateStage3TechnicalService').html("");
    $('#idDateStage4TechnicalService').html("");

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

function technicalAdvanceService(id) {
    var ruta = "/services/technicalAdvance";
    var type = "Servicio";
    var token = $('#idTokenTechnical').val();
    $.ajax({
        url: ruta,
        headers: { 'X-CSRF-TOKEN': token },
        dataType: 'JSON',
        type: 'GET',
        data: { id: id },
        success: function (data) {
            console.log(data);
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
            $('#idStage0TechnicalService').html(data[0].progress.etapa1 + "%");
            $('#idStage1TechnicalService').html(data[0].progress.etapa2 + "%");
            $('#idStage2TechnicalService').html(data[0].progress.etapa3 + "%");
            $('#idStage3TechnicalService').html(data[0].progress.etapa4 + "%");
            $('#idStage4TechnicalService').html(data[0].progress.etapa5 + "%");

            //percentages dates
            $('#idDateStage2TechnicalService').html(data[0].progress.date_etapa3);
            $('#idDateStage3TechnicalService').html(data[0].date_etapa4);
            $('#idDateStage4TechnicalService').html(data[0].progress.date_etapa5);

            //graphic
            graphicSum(data[0].progress);

            var generalAdvance = 0;
            generalAdvance = (parseFloat(data[0].progress.etapa1) + parseFloat(data[0].progress.etapa2) + parseFloat(data[0].progress.etapa3) +
                parseFloat(data[0].progress.etapa4) + parseFloat(data[0].progress.etapa5)) / 5;

            $('#idAdvanceTechnical').html(parseFloat(generalAdvance).toFixed(2) + ' %');
            $('#idProgressTechnical').css("width", parseFloat(generalAdvance).toFixed(2) + "%");

            if (generalAdvance >= 0 && generalAdvance <= 49) {
                $('#idProgressTechnical').removeClass("progress-bar bg-success");
                $('#idProgressTechnical').removeClass("progress-bar bg-info");
                $('#idProgressTechnical').addClass("progress-bar bg-danger");
            } else if (generalAdvance >= 50 && generalAdvance < 95) {
                $('#idProgressTechnical').removeClass("progress-bar bg-danger");
                $('#idProgressTechnical').removeClass("progress-bar bg-success");
                $('#idProgressTechnical').addClass("progress-bar bg-info");
            } else if (generalAdvance >= 95 && generalAdvance <= 100) {
                $('#idProgressTechnical').removeClass("progress-bar bg-danger");
                $('#idProgressTechnical').removeClass("progress-bar bg-info");
                $('#idProgressTechnical').addClass("progress-bar bg-success");
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}