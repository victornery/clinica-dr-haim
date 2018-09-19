"use strict";

/**
 *  Gulpfile.js made by Victor Nery
 *  Initially for projects with SASS
 *  ES6, Components to made a WP Theme.
 *
 *  @author victornery
 *  @class file
 *  @since 1.0.0
 */

const gulp = require("gulp");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const babel = require("gulp-babel");
const rename = require("gulp-rename");
const imagemin = require("gulp-imagemin");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const browserSync = require("browser-sync").create();
// const runSequence = require("run-sequence").use(gulp);
const reload = browserSync.reload;

const folders = {
  dev: "./src",
  prod: "./public/wp-content/themes/dr-haim",
  proxy: "localhost:8080"
};

// gulp.task("build", function () {
//   return runSequence("php", "scss", "js", "imgs");
// });

gulp.task("liveReload", function () {
  browserSync.init({
    proxy: folders.proxy,
    options: {
      reloadDelay: 250
    },
    notify: true
  });
});

gulp.task("scss", function () {
  let plugins;

  plugins = [autoprefixer({ browsers: ["last 1 version"] })];
  return gulp
    .src(folders.dev + "/scss/main.scss")
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(postcss(plugins))
    .pipe(rename("main.min.css"))
    .pipe(gulp.dest(folders.prod + "/dist/css/"))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task("js", function () {
  return gulp
    .src(folders.dev + "/js/main.js")
    .pipe(babel({ presets: ["es2015"] }))
    .pipe(concat("main.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(folders.prod + "/dist/js/"));
});

gulp.task("imgs", function () {
  return gulp
    .src(folders.dev + "/images/*.{png,gif,jpg}")
    .pipe(
      imagemin([
        imagemin.jpegtran({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
          plugins: [
            { removeViewBox: false },
            { removeMetadata: true },
            { minifyStyles: true },
            { convertColors: true }
          ]
        })
      ])
    )
    .pipe(gulp.dest(folders.prod + "/dist/images"))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task("php", function () {
  return gulp
    .src(folders.dev + "/php/**/*.php")
    .pipe(gulp.dest(folders.prod))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task("default", function () {
  gulp
    .watch(folders.dev + "/scss/**/*.scss", ["scss"])
    .on("change", browserSync.reload);
  gulp
    .watch(folders.dev + "/php/**/*.php", ["php"])
    .on("change", browserSync.reload);
  gulp.watch(folders.dev + "/js/**", ["js"]).on("change", browserSync.reload);
  gulp
    .watch(folders.dev + "/images/**", ["imgs"])
    .on("change", browserSync.reload);
});
