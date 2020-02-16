const $ = require('jquery');

$(document).ready(function(){
    let atkLevels = [
        0,2,4,6,8,10,12,14,16,18,20
    ];
    let fireLevels = [
        0,3,5,7,9,11,13,15,17,19,21
    ];
    let dccLevels = [
        0,2,5,7,10,12,15,17,20,22,25
    ];

    let bonusGuild = 5;

    $("#calc").click(function(){
        let dcc = parseInt($('#dcc').val());
        let atk = parseInt($('#atk').val());
        let skillup = parseInt($('#skillups').find(':selected').val());
        let setsFight = parseInt($('#fightSets').val());
        let atkLead = parseInt($('#atkLead').val());
        let bonusBatFire = fireLevels[$('#bat_fire').val()];
        let bonusBatDcc = dccLevels[$('#bat_dcc').val()];
        let bonusBatAtk = atkLevels[$('#bat_atk').val()];

        let baseAtk = 790 * ((100 + (setsFight * 8) + atkLead + bonusBatAtk + bonusBatFire + bonusGuild) / 100);

        let trueDamages = ((baseAtk + atk) * 1.5) * 4 * ((100 + skillup + dcc + bonusBatDcc) / 100);
        let bossDefenses = 1000 / (1140 + 3.5 * 801) * 1.4;
        let result = Math.floor(trueDamages * bossDefenses);

        $("#result").text(result);
    });
});