//Command for production:   gulp build --env=production
//var imagemin = require('gulp-imagemin'); //niezainstalowane do obrazow

var gulp            = require("gulp");
var sass            = require("gulp-sass");
var cleanCSS        = require("gulp-clean-css");
var sourcemaps      = require("gulp-sourcemaps");
var uglify          = require("gulp-uglify");
var concat          = require("gulp-concat");
var gulpif          = require("gulp-if");
var browserSync     = require('browser-sync').create();
var del             = require("del");
var argv            = require("minimist")(process.argv);
var include         = require("gulp-include");
var _CONFIG         = {};
//var purifycss     = require('gulp-purifycss');
//var cssWrap       = require("gulp-css-wrap");
//var autoprefixer  = require('gulp-autoprefixer');  //dodać/ zainstalować

var jmq             = require('gulp-join-media-queries');
var shell           = require('gulp-shell');

if (argv.env && argv.env === "production") {
    _CONFIG = {
        sourcemaps: false,
        runCleanCss: true,
        runJmq: true,
        cleancss: {
            inline: ["local"],
            rebase: false,
            processImport: true,
            level: 2
        },
        uglify: true
    };
} else {
    _CONFIG = {
        sourcemaps: true,
        runCleanCss: false,
        runJmq: false,
        cleancss: {
            inline: ["local"],
            rebase: false,
            processImport: true,
            level: 2,
            format: "beautify"
        },
        uglify: false
    };
}

browserSync.init({
    proxy: "http://clean-wordpress.local",
    notify: false
});

var destinyPath = "./assets/"
    Sass_SourceFiles = ["./src/sass/main.scss", "./src/sass/fonts.scss"]
    Sass_watchFiles = ["./src/sass/**/*.scss"]

    JavaScript_SourceFiles = [
        "./src/js/main.js",
        "./node_modules/vanilla-lazyload/dist/lazyload.js",
        "./src/js/components/lazyloadinit.js"
    ],
    JavaScript_watchFiles = ["./src/js/**/*.js"],

    Php_watchFiles = [
        "./*.php",
        "./**/*.php",
        "./partials/**/*.php"
    ];

gulp.task("styles", function() {
    return gulp
        .src(Sass_SourceFiles)
        .pipe(gulpif(_CONFIG.sourcemaps, sourcemaps.init()))
        .pipe(sass().on("error", sass.logError))
        //.pipe(autoprefixer({ browsers: ['last 3 versions'] }))    //zainstalować i odkomentować
        //.pipe(gulpif( _CONFIG.runJmq, jmq() ))
        .pipe(gulpif( _CONFIG.runCleanCss, cleanCSS(_CONFIG.cleancss) ))
        .pipe(gulpif(_CONFIG.sourcemaps, sourcemaps.write(".")))
        //.pipe(purifycss(['./assets/main.css', './**/*.php']))
        .pipe(gulp.dest(destinyPath))
        .pipe(browserSync.stream());
});

gulp.task("scripts", function() {
    return gulp
        .src(JavaScript_SourceFiles)
        .pipe(include())
        .on('error', console.log)
        .pipe(gulpif(_CONFIG.sourcemaps, sourcemaps.init()))
        .pipe(concat("main.js"))
        .pipe(gulpif(_CONFIG.uglify, uglify()))
        .pipe(gulpif(_CONFIG.sourcemaps, sourcemaps.write(".")))
        .pipe(gulp.dest(destinyPath));
});

gulp.task("clean-assets", function() {
    return del([destinyPath + "*.map", destinyPath + "*.js", destinyPath + "*.css"]);
});

//-- Watch
gulp.task("watch", function() {
    // Watch .scss files
    var styleWatcher = gulp.watch(Sass_watchFiles, gulp.parallel("styles"/*, "admin_styles"*/));
    styleWatcher.on("change", function(path, stats) {
        console.log("[STYLE] File " + path + " was changed");
        browserSync.reload();
    });
    var scriptsWatcher = gulp.watch(JavaScript_watchFiles, gulp.parallel("scripts"));
    scriptsWatcher.on("change", function(path, stats) {
        console.log("[SCRIPTS] File " + path + " was changed");
        browserSync.reload();
    });
    var PhpWatcher = gulp.watch(Php_watchFiles);
    PhpWatcher.on("change", function (path, stats){
        console.log("[PHP] File " + path + " was changed");
        browserSync.reload();
    })
});
gulp.task("build", gulp.series("clean-assets", "styles", "scripts"));
//
gulp.task(
    "default",
    gulp.series("clean-assets", "styles"/*, "admin_styles"*/, "scripts", "watch", function(done) {
        // do more stuff
        done();
    })
);
