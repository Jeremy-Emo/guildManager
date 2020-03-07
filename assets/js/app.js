const $ = require('jquery');

require('bootstrap');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');
require('./stupidtable');

const imagesContext = require.context('../img', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);

// any CSS you require will output into a single css file (app.css in this case)
require('../scss/_variables.scss');
require('../scss/app.scss');
require('../scss/nav.scss');
require('../scss/my.scss');


$(document).ready(function() {

   $('body').on("click", "#burger", function(){
      $("#menuDisplayed").toggle();
   });

   $('[data-toggle="popover"]').popover();

   $('[data-toggle=popover]').on('click', function(e){
      $('[data-toggle=popover]').not(this).popover('hide');
   });

   $('body').on("click", ".popover", function(){
      $('[aria-describedby="'+$(this).attr('id')+'"]').popover('hide');
   });

   $('.table').stupidtable();

});