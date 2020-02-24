require('../scss/guild.scss');
const $ = require('jquery');

import Chart from 'chart.js';

let userId;

$(document).ready(function(){
    $('body').on("click", ".roll-gvg", function(){
        userId = $(this).attr('data-id');
        roll(true);
    });
    $('body').on("click", ".roll-gvo", function(){
        userId = $(this).attr('data-id');
        roll(false);
    });

});

function roll(isGvG){
    $.post('/guilde/contenu/changer_options', {
        type: isGvG ? 'gvg' : 'gvo',
        id: userId
    }).done(function(data){
        if(isGvG) {
            $('.roll-gvg-txt').text(data.txt);
        } else {
            $('.roll-gvo-txt').text(data.txt);
        }
    });
}