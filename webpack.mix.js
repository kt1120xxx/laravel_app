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

/**どのファイルをどこにコンパイルするかを指定している */
mix.js('resources/js/app.js', 'public/js')
    .autoload({
        "jquery": ['$', 'window.jQuery'],
        "vue": ['Vue', 'window.Vue']
    });
    
mix.sass('resources/sass/style.scss', 'public/css/style.css');

mix.sass('resources/sass/common/header.scss', 'public/css/common/header.css');

mix.sass('resources/sass/common/task.scss', 'public/css/common/task.css');
mix.sass('resources/sass/english_practice.scss', 'public/css/english_practice.css');

mix.js('resources/js/topreserve.js', 'public/js/topreserve.js');

mix.js('resources/js/addtaskforms.js', 'public/js/addtaskforms.js');