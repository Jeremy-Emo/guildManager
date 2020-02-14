require('../scss/guild.scss');
const $ = require('jquery');

let userId;

$(document).ready(function(){
    $('.roll-gvg').click(function(){
        userId = $(this).attr('data-id');
        roll(true);
    });
    $('.roll-gvo').click(function(){
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