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
    let pvLevels = [
        0,2,4,6,8,10,12,14,16,18,20
    ];
    let defLevels = [
        0,2,4,6,8,10,12,14,16,18,20
    ];

    $("#calc").click(function(){
        let dcc = parseInt($('#dcc').val());
        let atk = parseInt($('#atk').val());
        let skillup = parseInt($('#skillups').find(':selected').val());
        let setsFight = parseInt($('#fightSets').val());
        let atkLead = parseInt($('#atkLead').val());
        let bonusBatFire = fireLevels[$('#bat_fire').val()];
        let bonusBatDcc = dccLevels[$('#bat_dcc').val()];
        let bonusBatAtk = atkLevels[$('#bat_atk').val()];
        let bonusBatPv = pvLevels[$('#bat_pv').val()];
        let bonusBatDef = defLevels[$('#bat_def').val()];
        let fl = parseInt($('#fl').val());
        let pv = parseInt($('#pv').val());
        let def = parseInt($('#def').val());
        let guildLevel = parseInt($('#guild_level').val());

        let EHPNeeded;
        if(fl === 2){
            EHPNeeded = 93000;
        } else if(fl === 3){
            EHPNeeded = 85000;
        } else if(fl === 4){
            EHPNeeded = 78000;
        }

        let bonusAtkGuild = 5;
        let bonusDefGuild = 5;
        let bonusHPGuild = 5;
        if(guildLevel < 27) {
            bonusAtkGuild -= 3;
        }
        if(guildLevel < 22) {
            bonusDefGuild -= 3;
        }
        if(guildLevel < 17) {
            bonusHPGuild -= 3;
        }
        if(guildLevel < 12) {
            bonusAtkGuild -= 2;
        }
        if(guildLevel < 7) {
            bonusDefGuild -= 2;
        }
        if(guildLevel < 2) {
            bonusHPGuild -= 2;
        }

        let baseAtk = 790 * ((100 + (setsFight * 8) + atkLead + bonusBatAtk + bonusBatFire + bonusAtkGuild) / 100);

        let trueDamages = ((baseAtk + atk) * 1.5) * 4 * ((100 + skillup + dcc + bonusBatDcc) / 100);
        let bossDefenses = 1000 / (1140 + 3.5 * 801) * 1.4;
        let result = Math.floor(trueDamages * bossDefenses);

        $("#resultDamages").text(result);

        let baseEHP = ((670 + def)*3.5+1140)*(10215 + pv)/1000;
        let C84 = ((670*(((100+20+bonusDefGuild)/100)) + def)*3.5+1140)*(10215*((100+20+bonusHPGuild)/100) + pv)/1000;
        let C82 = ((670*(((100 + bonusBatDef + bonusDefGuild)/100)) + def)*3.5+1140)*(10215*((100 + bonusBatPv + bonusHPGuild)/100) + pv)/1000;
        let varTank = C84 - C82;
        if(varTank < 0) {
            varTank = 0;
        }

        EHPNeeded += parseInt(varTank);

        $("#resultTank").text(Math.floor(EHPNeeded - baseEHP));
    });
});