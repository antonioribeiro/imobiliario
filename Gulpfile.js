var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefix = require('gulp-autoprefixer');

// Where do you store your Sass files?
var sassDir = 'app/assets/sass';

// Which directory should Sass compile to?
var targetCSSDir = 'public/assets/layouts/main/css/';

// Compile Sass, autoprefix CSS3,
// and save to target CSS directory
gulp.task('css', function () {
    return gulp.src(sassDir + '/main.scss')
        .pipe(sass({ style: 'compressed' }))
        .pipe(autoprefix('last 10 version'))
        .pipe(gulp.dest(targetCSSDir))
});

// Keep an eye on Sass, Coffee, and PHP files for changes...
gulp.task('watch', function () {
    gulp.watch(sassDir + '/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);
