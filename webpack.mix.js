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

mix.js('resources/js/app.js', 'public/js').version();
mix.js('resources/js/admin.js', 'public/js').version();
mix.sass('resources/sass/admin/admin.sass', 'public/css').version();
mix.sass('resources/sass/frontend/app.sass', 'public/css').version();

mix.browserSync('fire.local');

