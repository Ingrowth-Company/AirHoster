"use strict";

var path = {
  dev: "./_src",
  prod: "./assets",
  url: "http://localhost:",
  port: "8475",
};

const gulp = require("gulp");
const browserSync = require("browser-sync").create();
const concat = require("gulp-concat");
const terser = require("gulp-terser");
const sass = require("gulp-sass")(require("sass"));
const imagemin = require("gulp-imagemin");

const postcss = require("gulp-postcss");
const tailwindcss = require("@tailwindcss/postcss");
const autoprefixer = require("autoprefixer");
const merge = require("merge-stream");
const cache = require("gulp-cache");
const csso = require("gulp-csso");

gulp.task("styles", function () {
  // Processa Tailwind separadamente
  const tailwindStream = gulp
    .src(path.dev + "/css/tailwind.css")
    .pipe(postcss([tailwindcss("./tailwind.config.js"), autoprefixer]));

  // Processa SCSS normalmente
  const sassStream = gulp
    .src(path.dev + "/scss/main.scss")
    .pipe(sass().on("error", sass.logError));

  // Junta os dois streams e concatena
  return merge(tailwindStream, sassStream)
    .pipe(concat("main.min.css"))
    .pipe(csso())
    .pipe(gulp.dest(path.prod + "/css/"))
    .pipe(browserSync.stream());
});

gulp.task(
  "scripts",
  gulp.series(function () {
    return gulp
      .src([path.dev + "/js/_includes/**/*.js", path.dev + "/js/*.js"])
      .pipe(concat("main.min.js"))
      .pipe(terser())
      .pipe(gulp.dest(path.prod + "/js/"))
      .pipe(browserSync.stream());
  })
);

gulp.task(
  "images",
  gulp.series(function () {
    return gulp
      .src(path.dev + "/images/**/*")
      .pipe(imagemin())
      .pipe(gulp.dest(path.prod + "/images/"));
  })
);

gulp.task("clear-cache", function (done) {
  return cache.clearAll(done);
});

gulp.task(
  "server",
  gulp.series("styles", "scripts", function () {
    browserSync.init({
      proxy: path.url + path.port,
      files: [path.prod + "/**/*.css", path.prod + "/**/*.js", "./**/*.php"],
    });

    gulp
      .watch([
        path.dev + "/js/*.js",
        path.dev + "/scss/**/*.scss",
        path.dev + "/images/**/*",
        path.dev + "./**/*.php",
      ])
      .on(
        "change",
        gulp.parallel(
          "styles",
          "scripts",
          "images",
          "clear-cache",
          browserSync.reload
        )
      );
  })
);

gulp.task("default", gulp.series("server"));
