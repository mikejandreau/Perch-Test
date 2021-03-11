// PROJECT VARIABLES
var projectURL          = 'dev6';          // project URL, can be "localhost:3000" or something else 
var styleSource         = './assets/sass/style.scss';  // path to main SCSS file
var styleDestination    = './';                 // location to save compiled CSS file
var scriptSource        = [ './assets/js/src/class-helpers.js', 
                            // './assets/js/src/baguettebox-init.js', 
                            // './assets/vendor/jquery-easing/jquery.easing.min.js', // jquery scrolling
                            // './assets/vendor/bootstrap/js/bootstrap.bundle.min.js', // bootstrap bundle w/jQuery
                            // './assets/vendor/metafizzy/flickity.pkgd.min.js', // flickity
                            // './assets/vendor/metafizzy/isotope.pkgd.min.js', // isotope
                            // './assets/vendor/metafizzy/imagesloaded.pkgd.js', // imagesloaded
                            './assets/js/src/isotope-init.js',  // initialize isotope
                            './assets/js/src/scrollup.js' ]; // Path to JS vendor and custom files in order
var scriptDestination   = './assets/js';           // location to save compiled/minified JS file
var scriptBabelPreset   = '@babel/env';         // ES6 preset
var scriptFilename      = 'scripts.min.js';       // filename for compiled/minified JS
var watchPathFiles      = './**/*.php';         // watch path for PHP template files
var watchPathStyles     = './assets/sass/**/*.scss';   // watch path for SCSS
var watchPathScripts    = './assets/js/src/*.js';          // watch path for JS

// GULP PLUGINS
const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass');
const minifyCSS = require('gulp-csso');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();

// STYLE TASK - Compile SCSS, minify, save to root directory
function css() {
    return src(styleSource, { sourcemaps: true })
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(dest(styleDestination), { sourcemaps: true })
        .pipe(browserSync.stream());
}

// SCRIPTS TASK - Get JS source files, compile, concat, rename, minify, save to JS folder
function js() {
    return src(scriptSource, { sourcemaps: true })
        .pipe(babel({
            presets: [scriptBabelPreset]
        }))
        .pipe(concat(scriptFilename))
        .pipe(dest(scriptDestination, { sourcemaps: true }));
}

// BROWSERSYNC - Live reload, CSS/JS injection, and localhost tunneling
function browser() {
    browserSync.init({
        proxy: projectURL,
        files: [ watchPathFiles ],
        port: 3010
    });

    watch(watchPathStyles, css);
    watch(watchPathScripts, js).on('change', browserSync.reload);
}

exports.css = css;
exports.js = js;
exports.default = browser;