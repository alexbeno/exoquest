var gulp         = require( 'gulp' ),
    gulp_cssnano = require('gulp-cssnano'),
    gulp_rename  = require('gulp-rename'),
    gulp_uglify  = require('gulp-uglify'),
    gulp_concat = require('gulp-concat'),
    gulp_autoprefixer = require ( 'gulp-autoprefixer' ),
    gulp_sass = require('gulp-sass');


gulp.task( 'default', [ 'sass','css', 'js', 'watch' ], function() {} );

gulp.task('sass', function () {
  return gulp.src('./assets/sass/*.sass')
    .pipe(gulp_sass.sync().on('error', gulp_sass.logError))
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task( 'css', function()
{
    return gulp.src('./assets/css/style.css')
        .pipe(gulp_autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp_cssnano())
        .pipe(gulp_rename('style.min.css'))
        .pipe(gulp.dest('./assets/css/'))
} );

gulp.task( 'js', function()
{
    return gulp.src( [
            './assets/js/main.js'
        ] )
        .pipe( gulp_concat( 'main.min.js' ) )
        .pipe( gulp_uglify() )
        .pipe( gulp.dest( './assets/js/' ) );
} );

gulp.task( 'watch', function()
{
    gulp.watch( './assets/css/style.css', [ 'css' ] );
    gulp.watch('./assets/sass/*.sass', ['sass']);
    gulp.watch( [ './assets/js/**', '!./assets/js/main.min.js' ], [ 'js' ] );
} );
