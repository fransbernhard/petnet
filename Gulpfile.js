/**
 * REQUIREMENTS
 */
// Requiring Gulp
var gulp = require('gulp');
// Requires the gulp-sass plugin
var sass = require('gulp-sass');
// Prevent gulp from exiting on error
var plumber = require('gulp-plumber');
// Requiring autoprefixer
var autoprefixer = require('gulp-autoprefixer');
// Requiring Sourcemaps
var sourcemaps = require('gulp-sourcemaps');
//Auto refresh browser on file save
var browserSync = require('browser-sync');
// Require merge-stream to output multilple tasks to multiple destinations
var merge = require('merge-stream');

var cssmin = require('gulp-cssmin');
var uglify = require('gulp-uglifyjs');

// Internal config, folder structure
var paths = {
    style: {
        source: 'app/sass/',
        destination: 'dist/css/',
    },
    script: {
        source: 'app/js/**/*.js',
        //source: ['app/js/classes/*.js', 'app/js/*.js'],
        destination: 'dist/js/',
    }
};

gulp.task('js', function() {
    gulp.src(paths.script.source)
        .pipe(uglify('petnet.min.js'))
        .pipe(gulp.dest(paths.script.destination))
        .pipe(browserSync.reload({
            stream: true
        }));
});

try {
gulp.task('sass', function() {
    return gulp.src(paths.style.source + 'style.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError)) // Initialize sass
        .pipe(autoprefixer()) // Passes it through gulp-autoprefixer
        .pipe(sourcemaps.write()) // Writing sourcemaps
        .pipe(gulp.dest(paths.style.destination))
        .pipe(browserSync.reload({
            stream: true
        }));
});
} catch(e){console.log("HEJ JAG ÄR ETT FEL",e.stack);}

gulp.task('watch', ['sass', 'js'], function() {

    browserSync({
        proxy: 'http://animals.dev/',
        notify: false
    });

    gulp.watch(paths.style.source + '**/*.scss', ['sass']);
    gulp.watch(paths.script.source, ['js']);
    gulp.watch('**/*.php', browserSync.reload);
});

gulp.task('default', ['style', 'watch', 'prod']);
