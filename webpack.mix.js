let mix = require('laravel-mix');

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
var resourceDir = 'resources/assets/';
mix.react(resourceDir + 'js/app.js', 'public/js')
	.scripts([
		resourceDir + 'js/scripts/scripts.js'
	], 'public/js/script.js')
	.scripts([
		resourceDir + 'js/scripts/bootstrap4.min.js'
	], 'public/js/bootstrap4.min.js')
	.scripts([
		resourceDir + 'js/scripts/formValidation.min.js'
	], 'public/js/formValidation.min.js')
   .sass(resourceDir + 'sass/app.scss', 'public/css')
   .sass(resourceDir + 'sass/react-tabs-custom.scss', 'public/css')
   .sass(resourceDir + 'sass/react-popup.scss', 'public/css')
   .sass(resourceDir + 'sass/react-zilla-style.scss', 'public/css');
