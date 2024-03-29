const $ = require('jquery');

require('bootstrap');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');
require('./stupidtable');
require('dropify/dist/js/dropify.min');
require('dropify/dist/css/dropify.min.css');
require('dropify/dist/fonts/dropify.ttf');
require('bootstrap-select/dist/js/bootstrap-select.min');
require('bootstrap-select/dist/css/bootstrap-select.min.css');

const imagesContext = require.context('../img', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);

// any CSS you require will output into a single css file (app.css in this case)
require('../scss/_variables.scss');
require('../scss/app.scss');
require('../scss/nav.scss');
require('../scss/my.scss');


$(document).ready(function() {

   $('[data-toggle="popover"]').popover();

   $('[data-toggle=popover]').on('click', function(e){
      $('[data-toggle=popover]').not(this).popover('hide');
   });

   $('body').on("click", ".popover", function(){
      $('[aria-describedby="'+$(this).attr('id')+'"]').popover('hide');
   });

   $('.table').stupidtable();

   $('.dropify').dropify({
      messages : {
         'default': 'Déposez un fichier ici ou cliquez-moi !',
         'replace': 'Déposez un fichiez ou cliquez pour remplacer.',
         'remove':  'Supprimer',
         'error':   'Une erreur est survenue.'
      },
      error: {
         'fileSize': 'Le fichier est trop lourd : ({{ value }} max).',
         'imageFormat': 'Le format d\'image est incorrect : seuls sont autorisés ({{ value }}).'
      }
   });

});