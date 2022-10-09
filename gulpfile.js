const { src, dest, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const csso = require('gulp-csso');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const { init, watch, reload } = require('browser-sync').create();

function pages() {
    return src('app/pages/**')
        .pipe(dest('dist/pages'))
}

function scss() {
    return src('app/source/scss/style.scss')
        .pipe(sass())
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(dest('dist/css'))
        .pipe(csso())
        .pipe(dest('dist/css'))
}

function js() {
    return src('app/js/**.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(dest('dist/js'))
}

function img() {
    return src('app/img/**')
        .pipe(dest('dist/img'))
}

function fonts() {
    return src('app/font/**')
        .pipe(dest('dist/font'))
}

function serve() {
    init({
        server: './dist'
    })

    watch('app/pages/**', series(pages)).on('change', reload);
    watch('app/source/scss/**', series(scss)).on('change', reload);
    watch('app/js/**.js', series(js)).on('change', reload);
}

exports.serve = series(scss, fonts, js, img, pages, serve);