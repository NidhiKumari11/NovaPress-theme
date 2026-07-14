const gulp = require('gulp');
const less = require('gulp-less');
const cleanCSS = require('gulp-clean-css');
const terser = require('gulp-terser');
const rename = require('gulp-rename');

const paths = {
  styles: {
    frontend: {
      src: 'assets/less/main.less',
      dest: 'assets/dist/css/frontend/'
    },
    backend: {
      src: 'assets/less/backend/*.less',
      dest: 'assets/dist/css/backend/'
    }
  },
  scripts: {
    frontend: {
      src: 'assets/js/frontend/*.js',
      dest: 'assets/dist/js/frontend/'
    },
    backend: {
      src: 'assets/js/backend/*.js',
      dest: 'assets/dist/js/backend/'
    }
  }
};

function stylesFrontend() {
  return gulp.src(paths.styles.frontend.src)
    .pipe(less())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(paths.styles.frontend.dest));
}

function stylesBackend() {
  return gulp.src(paths.styles.backend.src)
    .pipe(less())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(paths.styles.backend.dest));
}

function scriptsFrontend() {
  return gulp.src(paths.scripts.frontend.src)
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(paths.scripts.frontend.dest));
}

function scriptsBackend() {
  return gulp.src(paths.scripts.backend.src)
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(paths.scripts.backend.dest));
}

function watch() {
  gulp.watch('assets/less/**/*.less', stylesFrontend);
  gulp.watch('assets/less/backend/**/*.less', stylesBackend);
  gulp.watch('assets/js/frontend/**/*.js', scriptsFrontend);
  gulp.watch('assets/js/backend/**/*.js', scriptsBackend);
}

const build = gulp.parallel(stylesFrontend, stylesBackend, scriptsFrontend, scriptsBackend);

exports.stylesFrontend = stylesFrontend;
exports.stylesBackend = stylesBackend;
exports.scriptsFrontend = scriptsFrontend;
exports.scriptsBackend = scriptsBackend;
exports.watch = watch;
exports.default = build;
