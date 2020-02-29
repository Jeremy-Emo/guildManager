require('../scss/defense.scss');

require('select2/dist/css/select2.min.css');
require('select2/dist/js/select2.full.min');

const $ = require('jquery');


$(document).ready(function(){

    if(document.getElementById('defense_mobLeader')){
        $('#defense_mobLeader').select2();
        $('#defense_mobOne').select2();
        $('#defense_mobTwo').select2();
    }

    if(document.getElementById('offense_mobLeader')){
        $('#offense_mobLeader').select2();
        $('#offense_mobOne').select2();
        $('#offense_mobTwo').select2();
    }

    if(document.getElementById('defense_enemy_mobLeader')){
        $('#defense_enemy_mobLeader').select2();
        $('#defense_enemy_mobOne').select2();
        $('#defense_enemy_mobTwo').select2();
    }

    $('body').on("change input", '.victory', function(){
        updateScores(true, $(this).attr('data-id'), $(this).val());
    });

    $('body').on("change input", '.loses', function(){
        updateScores(false, $(this).attr('data-id'), $(this).val());
    });
});

function updateScores(isVictories, id, score)
{
    $.post('/modifier-score-gvo', {
        isVictories: isVictories ? 'true' : 'false',
        id: id,
        score: score,
    });
}