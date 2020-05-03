const $ = require('jquery');

$(document).ready(function(){
    $('body').on('click', '.hf_box', function(){
        let $this = $(this)
        let hfId = $this.attr("data-id");
        $.post('/demander-defi', {
            hf: hfId,
        }).done(function(){
            if($this.toggleClass('inactive'));
        });
    });
});