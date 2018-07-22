'use strict';

/**
 *  Gulpfile.js made by Victor Nery
 *  Initially for projects with SASS
 *  ES6, Components to made a WP Theme
 * 
 *  Free License.
 */

const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const pump = require('pump');
const babel = require('gulp-babel');
const autoprefix = require('gulp-autoprefixer');
const rename = require('gulp-rename');
const imagein = require('gulp-imagein');

const path = {
    dev: './src',
    prod: './public/wp-content/themes/drhaim'
}