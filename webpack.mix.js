const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/bootstrap.js", "public/js")
    .js("resources/js/cConsent.js", "public/js")
    .js("resources/js/copyShortenedLink.js", "public/js")
    .js("resources/js/langDetection.js", "public/js")
    .js("resources/js/manageQRCodes.js", "public/js")
    .sass("resources/css/app.scss", "public/css")
    .version()
    .disableNotifications();
