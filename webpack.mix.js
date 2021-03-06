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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin.scss', 'public/css')
   .sass('resources/sass/front.scss', 'public/css')
   .sass('resources/sass/auth.scss', 'public/css')
   .sass('resources/sass/contents/contact.scss', 'public/contents/css')
   .sass('resources/sass/contents/word.scss', 'public/contents/css')
   .js('resources/js/ex01.js', 'public/js')
   .js('resources/js/cropper.min.js', 'public/js')
   .js('resources/js/auth.js', 'public/js')
