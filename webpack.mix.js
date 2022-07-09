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

mix.webpackConfig({
    stats: {
        children: true,
},});

mix.sass('resources/css/styles/style.scss', 'public/css/styles.css')
    .css('resources/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
    .css('resources/css/font-awesome.min.css', 'public/css/font-awesome.min.css')
    .css('resources/css/Pe-icon-7-stroke.css', 'public/css/Pe-icon-7-stroke.css')
    .css('resources/css/animate.min.css', 'public/css/animate.min.css')
    .css('resources/css/swiper-bundle.min.css', 'public/css/swiper-bundle.min.css')
    .css('resources/css/nice-select.css', 'public/css/nice-select.css')
    .css('resources/css/magnific-popup.min.css', 'public/css/magnific-popup.min.css')
    .css('resources/css/ion.rangeSlider.min.css', 'public/css/ion.rangeSlider.min.css')

    .minify('resources/js/vendor/bootstrap.bundle.min.js', 'public/js/vendor/bootstrap.bundle.min.js')
    .minify('resources/js/vendor/jquery-3.6.0.min.js', 'public/js/vendor/jquery-3.6.0.min.js')
    .minify('resources/js/vendor/jquery-migrate-3.3.2.min.js', 'public/js/vendor/jquery-migrate-3.3.2.min.js')
    .minify('resources/js/vendor/jquery.waypoints.js', 'public/js/vendor/jquery.waypoints.js')
    .minify('resources/js/vendor/modernizr-3.11.2.min.js', 'public/js/vendor/modernizr-3.11.2.min.js')
    .minify('resources/js/plugins/wow.min.js', 'public/js/plugins/wow.min.js')
    .minify('resources/js/plugins/swiper-bundle.min.js', 'public/js/plugins/swiper-bundle.min.js')
    .minify('resources/js/plugins/jquery.nice-select.js', 'public/js/plugins/jquery.nice-select.js')
    .minify('resources/js/plugins/parallax.min.js', 'public/js/plugins/parallax.min.js')
    .minify('resources/js/plugins/jquery.magnific-popup.min.js', 'public/js/plugins/jquery.magnific-popup.min.js')
    .minify('resources/js/plugins/tippy.min.js', 'public/js/plugins/tippy.min.js')
    .minify('resources/js/plugins/ion.rangeSlider.min.js', 'public/js/plugins/ion.rangeSlider.min.js')
    .minify('resources/js/plugins/mailchimp-ajax.js', 'public/js/plugins/mailchimp-ajax.js')
    .minify('resources/js/plugins/jquery.counterup.js', 'public/js/plugins/jquery.counterup.js')

    .minify('resources/js/main.js', 'public/js/main.js')

    .version();

mix.copy('resources/img', 'public/img');


// Admin template
mix.copy('resources/assets', 'public/assets');
