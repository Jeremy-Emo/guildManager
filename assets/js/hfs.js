const $ = require('jquery');

$(document).ready(function(){
    $('body').on('click', '.hf_box', function(){
        let $this = $(this)
        let id = $("#userId").val();
        let hfId = $this.attr("data-id");
        $.post('/toggle-defi', {
            id: id,
            hf: hfId,
        }).done(function(){
            if($this.toggleClass('inactive'));
        });
    });
});