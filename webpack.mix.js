const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/tabler.js', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/colors.css', 'public/css')
    .css('resources/css/color-adjustments.css', 'public/css')
    .css('resources/css/style.css', 'public/css')
   .sass('resources/sass/app.scss', 'public/css');