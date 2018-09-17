// webpack.config.js
var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath('public/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create public/build/app.js and public/build/app.css
    .addEntry('jquery', './assets/js/jquery-1.7.1.min.js')
    .addEntry('cufon-replace', './assets/js/cufon-replace.js')
    .addEntry('contact', './assets/js/contact.js')
    .addEntry('rating', './assets/js/rating.js')
    .addEntry('cufon-yui', './assets/js/cufon-yui.js')
    .addEntry('grid', './assets/css/grid.css')
    .addEntry('style', './assets/css/style.css')
    .addEntry('reset', './assets/css/reset.css')
    .addEntry('tms', './assets/js/tms-0.3.js')
    .addEntry('presets', './assets/js/tms_presets.js')
    .addEntry('jquery_easing', './assets/js/jquery.easing.1.3.js')
    .addEntry('fancybox/js/fancybox', './assets/fancybox/dist/jquery.fancybox.js')
    .addEntry('fancybox/css/fancybox', './assets/fancybox/dist/jquery.fancybox.css')

    // allow sass/scss files to be processed
    .enableSassLoader()

    // allow legacy applications to use $/jQuery as a global variable

    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

    // create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();
