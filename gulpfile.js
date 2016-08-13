var gulp = require('gulp'); 

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('lint', function() {
    return gulp.src('assets/js/main.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass({
             includePaths: require('node-bourbon').includePaths,
             includePaths: require('node-neat').includePaths
        }))
        .pipe(gulp.dest('assets/css'));

});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('assets/js/main.js')
        .pipe(concat('main.js'))
        .pipe(gulp.dest('assets/js'))
        .pipe(rename('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/js/*.js', ['lint', 'scripts']);
    gulp.watch('assets/scss/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['lint', 'sass', 'scripts', 'watch']);

// var bourbon    = require("bourbon").includePaths,
//     autoprefix = require("gulp-autoprefixer"),
//     connect    = require("gulp-connect"),
//     gulp       = require("gulp"),
//     jshint     = require('gulp-jshint'),
//     concat     = require('gulp-concat'),
//     uglify     = require('gulp-uglify'),
//     rename     = require('gulp-rename'),
//     sass       = require("gulp-sass");

// var paths = {
//   scss: [
//     "./app/assets/stylesheets/**/*.scss",
//     "./contrib/styles.scss"]
// };

// gulp.task('lint', function() {
//     return gulp.src('assets/js/main.js')
//         .pipe(jshint())
//         .pipe(jshint.reporter('default'));
// });

// gulp.task("sass", function () {
//   return gulp.src(paths.scss)
//     .pipe(sass({
//       includePaths: ["styles"].concat(bourbon)
//     }))
//     .pipe(autoprefix("last 2 versions"))
//     .pipe(gulp.dest("./contrib"))
//     .pipe(connect.reload());
// });

// gulp.task("connect", function() {
//   connect.server({
//     root: "contrib",
//     port: 8000,
//     livereload: true
//   });
// });

// gulp.task('watch', function() {
//     gulp.watch('assets/js/*.js', ['lint', 'scripts']);
//     gulp.watch('assets/scss/*.scss', ['sass']);
// });

// gulp.task('scripts', function() {
//     return gulp.src('assets/js/main.js')
//         .pipe(concat('main.js'))
//         .pipe(gulp.dest('assets/js'))
//         .pipe(rename('main.min.js'))
//         .pipe(uglify())
//         .pipe(gulp.dest('assets/js'));
// });



// gulp.task("default", ["lint","scripts","sass", "connect","watch"], function() {
//   gulp.watch(paths.scss, ["sass"]);
// });

