require('../scss/wishlist.scss');

const $ = require('jquery');
const dragula = require('dragula/dist/dragula.min');
require('dragula/dist/dragula.min.css')

$(document).ready(function() {

    let drake = dragula({
        direction: 'horizontal'
    });

    let containers = document.querySelectorAll('.category');

    containers.forEach(function(item){
        drake.containers.push(item);
    });

    drake.on('drop', function(el, container){
        let catId = container.getAttribute("data-id");
        let monsterId = el.getAttribute("data-id");
        $.post('/change-wishlist', {
            catId: catId,
            mobId: monsterId,
        });
    });

});