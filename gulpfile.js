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

let gulp;
let sass;
let concat;
let uglify;
let babel;
let rename;
let imagemin;
let postcss;
let autoprefixer;
let browserSync;
let reload;

let folders;

gulp = require("gulp");
sass = require("gulp-sass");
concat = require("gulp-concat");
uglify = require("gulp-uglify");
babel = require("gulp-babel");
rename = require("gulp-rename");
imagemin = require("gulp-imagemin");
postcss = require("gulp-postcss");
autoprefixer = require("autoprefixer");
browserSync = require("browser-sync").create();
reload = browserSync.reload;

folders = {
  dev: "./src",
  prod: "./public/wp-content/themes/dr-haim",
  proxy: "localhost:8080"
};

gulp.task("liveReload", function() {
  browserSync.init({
    proxy: folders.proxy,
    options: {
      reloadDelay: 250
    },
    notify: true
  });
});

gulp.task("scss", function() {
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

gulp.task("js", function() {
  return gulp
    .src(folders.dev + "/js/**/*.js")
    .pipe(babel({ presets: ["env"] }))
    .pipe(concat("main.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(folders.prod + "/dist/js/"))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task("imgs", function() {
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

gulp.task("php", function() {
  return gulp
    .src(folders.dev + "/php/**/*.php")
    .pipe(gulp.dest(folders.prod))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task("default", function() {
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
