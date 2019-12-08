const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

<<<<<<< HEAD
mix.js('resources/js/app.js', 'public/js')
=======
mix.react('resources/js/app.js', 'public/js')
>>>>>>> 8c3c0c98daefe2d2f28c07713a9a273cbcbad9cf
   .sass('resources/sass/app.scss', 'public/css');
