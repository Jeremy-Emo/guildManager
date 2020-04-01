const $ = require('jquery');

$(document).ready(function(){
    $('#calc').click(function(){
        let missingYellowPoints = 20000 - parseInt($('#yellowPoints').val());
        let missingBluePoints = 20000 - parseInt($('#bluePoints').val());
        let missingRedPoints = 20000 - parseInt($('#redPoints').val());

        let yellowTowers = parseInt($('#yellowTowers').val());
        let blueTowers = parseInt($('#blueTowers').val());
        let redTowers = parseInt($('#redTowers').val());

        if(yellowTowers === 0){
            yellowTowers = 1;
        }
        let yellowTimeForWin = parseInt(missingYellowPoints / (yellowTowers > 12 ? yellowTowers + 10 : yellowTowers));

        if(blueTowers === 0){
            blueTowers = 1;
        }
        let blueTimeForWin = parseInt(missingBluePoints / (blueTowers > 12 ? blueTowers + 10 : blueTowers));

        if(redTowers === 0){
            redTowers = 1;
        }
        let redTimeForWin = parseInt(missingRedPoints / (redTowers > 12 ? redTowers + 10 : redTowers));

        $('#result').text("Jaune");
        $('#time').text(yellowTimeForWin);

        if(blueTimeForWin < yellowTimeForWin){
            $('#result').text("Bleu");
            $('#time').text(blueTimeForWin);
        }

        if(redTimeForWin < blueTimeForWin && redTimeForWin < yellowTimeForWin){
            $('#result').text("Rouge");
            $('#time').text(redTimeForWin);
        }
    });
});