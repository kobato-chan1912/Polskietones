const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.styles([
    'public/webpage/css/nii3adk.css',
    'public/webpage/css/block-library-style.min.css',
    'public/webpage/css/wp-pagenavi-pagenavi-css.css',
    'public/webpage/css/main-style.css',
    'public/webpage/css/css-bootstrap.css',
    'public/webpage/css/css-font-awesome.min.css',
    'public/webpage/css/css-style.css',
    'public/webpage/css/circle.skin-circle.player.css',
    'public/webpage/css/css-jplayer.blue.monday.min.css',


], 'public/webpage/css/app.css');


