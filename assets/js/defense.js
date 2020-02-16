require('../css/vanillaSelectBox.css');
require('../scss/defense.scss');
const $ = require('jquery');

import { vanillaSelectBox } from './vanillaSelectBox';

$(document).ready(function(){

    if(document.getElementById('defense_mobLeader')){
        let monsterSelect1 = new vanillaSelectBox("#defense_mobLeader", {
            search: true,
        });

        let monsterSelect2 = new vanillaSelectBox("#defense_mobOne", {
            search: true,
        });

        let monsterSelect3 = new vanillaSelectBox("#defense_mobTwo", {
            search: true,
        });
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