const $ = require('jquery');

$(document).ready(function(){
    let defPrices = [
        0,100,380,840,1480,2300,3300,4480,5840,7380,9100
    ];
    let atkPrices = [
        0,150,525,1125,1950,3000,4275,5775,7500,9450,11625
    ];
    let pvPrices = [
        0,200,600,1200,2000,3000,4200,5600,7200,9000,11000
    ];
    let spdPrices = [
        0,240,680,1320,2160,3200,4440,5880,7520,9360,11400
    ];
    let dccPrices = [
        0,120,360,720,1200,1800,2520,3360,4320,5400,6600
    ];
    let firePrices = [
        0,120,360,720,1200,1800,2520,3360,4320,5400,6600
    ];
    let windPrices = [
        0,120,360,720,1200,1800,2520,3360,4320,5400,6600
    ];
    let waterPrices = [
        0,120,360,720,1200,1800,2520,3360,4320,5400,6600
    ];
    let darkPrices = [
        0,120,360,720,1200,1800,2520,3360,4320,5400,6600
    ];
    let lightPrices = [
        0,120,360,720,1200,1800,2520,3360,4320,5400,6600
    ];

    $("#calc").click(function(){
        let gloryPointsAverage = parseFloat($('#glory').val());
        let leaguePoints = parseInt($('#ligue').val());
        let nbreAttacks = parseInt($('#nbre_atk').val());

        if ($('#pack').is(':checked')){
            gloryPointsAverage += 1;
        }

        let costs = 0;
        costs += (defPrices[10] - defPrices[parseInt($("#bat_def").val())]);
        costs += (atkPrices[10] - atkPrices[parseInt($("#bat_atk").val())]);
        costs += (pvPrices[10] - pvPrices[parseInt($("#bat_pv").val())]);
        costs += (spdPrices[10] - spdPrices[parseInt($("#bat_spd").val())]);
        costs += (dccPrices[10] - dccPrices[parseInt($("#bat_dcc").val())]);
        costs += (firePrices[10] - firePrices[parseInt($("#bat_fire").val())]);
        costs += (windPrices[10] - windPrices[parseInt($("#bat_wind").val())]);
        costs += (waterPrices[10] - waterPrices[parseInt($("#bat_water").val())]);
        costs += (darkPrices[10] - darkPrices[parseInt($("#bat_dark").val())]);
        costs += (lightPrices[10] - lightPrices[parseInt($("#bat_light").val())]);

        let result = Math.ceil(costs / ((nbreAttacks * gloryPointsAverage) + leaguePoints - 180));

        $("#result").text(result);
    });
});