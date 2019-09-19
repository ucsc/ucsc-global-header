'use strict';

var gulp = require('gulp'),
    // Config
    paths = require('./package.json').paths,
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    cssMinify = require('gulp-clean-css'),
    sassLint = require('gulp-sass-lint'),

    // Utilities
    livereload = require('gulp-livereload'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber');


/*************
 * Utilities
 ************/

/**
 * Error handling
 *
 * @function
 */
function handleErrors() {
    var args = Array.prototype.slice.call(arguments);

    notify.onError({
        title: 'Task Failed [<%= error.message %>',
        message: 'See console.',
        sound: 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
    }).apply(this, args);

    gutil.beep(); // Beep 'sosumi' again

    // Prevent the 'watch' task from stopping
    this.emit('end');
}


/*************
 * CSS Tasks
 ************/

/**
 * PostCSS Task Handler
 */
gulp.task('postcss', function () {
    return gulp.src(paths.scss.src + 'plugin.scss')
        // Error handling
        .pipe(plumber({
            errorHandler: handleErrors
        }))
        // Wrap tasks in a sourcemap
        .pipe(sourcemaps.init())
        .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'expanded'
        }))
        // livereload
        .pipe(livereload())
        .pipe(postcss([
            autoprefixer()
        ]))
        // creates the sourcemap
        .pipe(sourcemaps.write())
        // rename
        .pipe(rename('plugin.css'))
        .pipe(gulp.dest(paths.css.dest));
});

gulp.task('css:minify', gulp.series('postcss'), function () {
    return gulp.src(paths.scss.src + 'plugin.scss')
        // Error handling
        .pipe(plumber({
            errorHandler: handleErrors
        }))

        .pipe(cssMinify({
            safe: true
        }))
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest(paths.css.dest))
        .pipe(notify({
            message: 'Styles are built.'
        }))

});

gulp.task('sass:lint', gulp.series('css:minify'), function () {
    gulp.src([
        paths.scss.src + 'plugin.scss'
    ])
        .pipe(sassLint())
        .pipe(sassLint.format())
        .pipe(sassLint.failOnError())
});


/********************
 * All Tasks Listeners
 *******************/

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(paths.scss.src + '**/*.scss', gulp.series('styles'));
});

/**
 * Individual tasks.
 */
// gulp.task('scripts', [''])
gulp.task('styles', gulp.series('sass:lint'));