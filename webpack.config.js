var Encore = require('@symfony/webpack-encore');

const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const CompressionPlugin = require('compression-webpack-plugin');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')
    .addEntry('guild', './assets/js/guild.js')
    .addEntry('defense', './assets/js/defense.js')
    .addEntry('bj5', './assets/js/bj5.js')
    .addEntry('buildings', './assets/js/buildings.js')
    .addEntry('hfs', './assets/js/hfs.js')
    .addEntry('askHfs', './assets/js/askHfs.js')
    .addEntry('gvo', './assets/js/gvo.js')
    .addEntry('wishlist', './assets/js/wishlist.js')

    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    .enableSassLoader()
    .configureFilenames({
        images: '[path][name].[hash:8].[ext]',
    })

    .addPlugin(new UglifyJSPlugin())
    .addPlugin(new CompressionPlugin())
;

module.exports = Encore.getWebpackConfig();
