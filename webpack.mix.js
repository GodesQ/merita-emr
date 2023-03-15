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
mix.styles([
    'public/app-assets/css/bootstrap.css',
    'public/app-assets/css/bootstrap-extended.css',
    'public/app-assets/css/colors.css',
    'public/app-assets/css/components.css',
    'public/app-assets/css/core/menu/menu-types/vertical-menu.css',
    'public/app-assets/css/core/colors/palette-gradient.css',
    'public/app-assets/fonts/simple-line-icons/style.min.css',
    'public/app-assets/css/pages/card-statistics.css',
    'public/app-assets/css/pages/vertical-timeline.css',
    'public/app-assets/css/plugins/extensions/toastr.css',
    'public/app-assets/vendors/css/forms/selects/select2.min.css',
    'public/assets/css/style.css',
    'public/app-assets/css/pages/app-invoice.css',
    'public/app-assets/css/plugins/forms/checkboxes-radios.css',
    'public/app-assets/vendors/css/forms/icheck/icheck.css',
    'public/app-assets/vendors/css/forms/icheck/custom.css'
], 'public/app-assets/css/all.css');

mix.styles(['public/app-assets/vendors/css/vendors.min.css'], 'public/app-assets/vendors/css/vendors.css');

// mix.js('public/app-assets/vendors/js/vendors.min.js', 'public/js/vendor');
// mix.js('public/app-assets/vendors/js/extensions/toastr.min.js', 'public/js/toastr');
// mix.js('public/app-assets/js/core/app-menu.js', 'public/js/app-menu');