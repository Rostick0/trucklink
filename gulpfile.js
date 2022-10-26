const { src, dest, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const csso = require('gulp-csso');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const { init, watch, reload } = require('browser-sync').create();

function scss() {
    return src('app/source/scss/style.scss')
        .pipe(sass())
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(csso())
        .pipe(dest('backend/view/static/css'))
}

function js() {
    return src('app/js/**.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(dest('backend/view/static/js'))
}

function serve() {
    init({
        server: './dist'
    })

    watch('app/source/scss/**', series(scss)).on('change', reload);
    watch('app/js/**.js', series(js)).on('change', reload);
}

exports.serve = series(scss, js, serve);