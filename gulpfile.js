const {src, dest, series} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const csso = require('gulp-csso');
const htmlmin = require('gulp-htmlmin');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const { watch, reload } = require('browser-sync').create();

function scss() {
    return src('gulp/source/scss/style.scss')
            .pipe(sass())
            .pipe(autoprefixer({
                cascade: false
            }))
            .pipe(dest('gulp/css'))
            .pipe(csso())
            .pipe(dest('source/static/css'))
}

function js() {
    return src('gulp/js/**.js')
            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe(uglify())
            .pipe(dest('source/static/js'))
}

// function jsLibs() {
//     return src('gulp/js/libs/**.js')
//             .pipe(dest('source/static/js/libs'))
// }

function img() {
    return src('gulp/img/**')
            .pipe(dest('source/static/img'))
}

function fonts() {
    return src('gulp/fonts/**')
            .pipe(dest('source/static/fonts'))
}

function serve() {
    // init({
    //     server: './source'
    // })

    watch('gulp/source/scss/**', series(scss)).on('change', reload);
    watch('gulp/js/**.js', series(js)).on('change', reload);
}

function building() {
    return src(['*/**',  '*', '.htaccess', '**/.htaccess', '!gulp', '!source/upload/*.*', '!*.sql', '!.gitignore', '!package.json', '!package-lock.json', '!dist/**', '!node_modules/**', '!gulp/**', '!gulpfile.js'])
            .pipe(dest('dist/'));
}

function php() {
    return src('dist/**/**.php')
            .pipe(htmlmin({
                collapseWhitespace: true,
                ignoreCustomFragments: [ /<%[\s\S]*?%>/, /<\?[=|php]?[\s\S]*?\?>/ ]
            }))
            .pipe(dest('dist/'))        
}

exports.build = series(scss, fonts, js, img, building, php);
exports.serve = series(scss, fonts, js, img, serve);