const { series, parallel, watch, src, dest } = require("gulp"),
	autoprefixer = require("gulp-autoprefixer"),
	browserSync = require("browser-sync"),
	bytediff = require("gulp-bytediff"),
	cachebust = require("gulp-cache-bust"),
	cleancss = require("gulp-clean-css"),
	concat = require("gulp-concat"),
	connect = require("gulp-connect-php"),
	debug = require("gulp-debug"),
	del = require("del"),
	log = require("fancy-log"),
	merge = require("merge-stream"),
	newer = require("gulp-newer"),
	notify = require("gulp-notify"),
	order = require("gulp-order"),
	plumber = require("gulp-plumber"),
	rename = require("gulp-rename"),
	sass = require("gulp-sass")(require("sass")),
	sourcemaps = require("gulp-sourcemaps"),
	uglify = require("gulp-uglify"),
	webp = require("gulp-webp");

//SRCs
var _dist = "./www";
var _build = _dist + "/assets/";

// BUNDLERs
function javascript_bundler(bundleName, source, outputName, outputFolder, cb) {
	log.info(bundleName, outputFolder + outputName);
	var run = src(source)
		.pipe(
			debug({
				title: bundleName,
			})
		)
		.pipe(sourcemaps.init())
		.pipe(
			plumber({
				errorHandler: notify.onError("Error: <%= error.message %>"),
			})
		)
		.pipe(bytediff.start())
		.pipe(concat(outputName))
		.pipe(dest(outputFolder))
		.pipe(
			rename({
				suffix: ".min",
			})
		)
		.pipe(uglify())
		.pipe(bytediff.stop())
		.pipe(plumber.stop())
		.pipe(sourcemaps.write("./"))
		.pipe(dest(outputFolder));
	cb();
}
function style_bundler(
	bundleName,
	sourceSCSS,
	sourceSCSSPaths,
	sourceCSS,
	outputName,
	outputFolder,
	cb
) {
	log.info(bundleName, outputFolder + outputName);
	var cssStream = src(sourceCSS)
		.pipe(
			debug({
				title: bundleName + " CSS",
			})
		)
		.pipe(concat("tmp-css.css"));
	var scssStream = src(sourceSCSS)
		.pipe(
			sass({
				includePaths: sourceSCSSPaths,
			}).on("error", sass.logError)
		)
		.pipe(
			debug({
				title: bundleName + " SCSS/SASS",
			})
		)
		.pipe(
			autoprefixer({
				browsers: ["last 2 versions"],
			})
		)
		.pipe(concat("tmp-sass.css"));
	var styleStream = merge(scssStream, cssStream)
		.pipe(
			debug({
				title: bundleName,
			})
		)
		.pipe(order(["tmp-sass.css", "tmp-css.css"]))
		.pipe(concat(outputName))
		.pipe(sourcemaps.init())
		.pipe(
			plumber({
				errorHandler: notify.onError("Error: <%= error.message %>"),
			})
		)
		.pipe(bytediff.start())
		.pipe(dest(outputFolder))
		.pipe(cleancss())
		.pipe(
			rename({
				suffix: ".min",
			})
		)
		.pipe(dest(outputFolder))
		.pipe(bytediff.stop())
		.pipe(plumber.stop())
		.pipe(sourcemaps.write("./"))
		.pipe(dest(outputFolder))
		.pipe(browserSync.stream());
	cb();
}
/* TASKs */
// MAIN
function _main_js(cb) {
	var source = [
		// "./node_modules/jquery/dist/jquery.js",
		"./node_modules/bootstrap/dist/js/bootstrap.bundle.js",
		// "./node_modules/smooth-scroll/dist/smooth-scroll.js",
		"./source/js/main.js",
	];
	var outputName = "main.js";
	var outputFolder = _build + "js/";
	javascript_bundler("main js", source, outputName, outputFolder, cb);
	cb();
}
function _main_css(cb) {
	var sourceSCSS_ = "./source/scss/main.scss";
	var sourceSCSSPaths = [
		"./source/scss/",
		"./node_modules/bootstrap/scss/",
		"./node_modules/@fortawesome/fontawesome-free/scss",
		"./node_modules/aos/src/sass",
	];
	var sourceCSS = ["./node_modules/animate.css/animate.min.css"];
	var outputName = "main.css";
	var outputFolder = _build + "css/";
	style_bundler(
		"main css",
		sourceSCSS_,
		sourceSCSSPaths,
		sourceCSS,
		outputName,
		outputFolder,
		cb
	);
}
// Images
function images(cb) {
	var images_src = "./source/images/**/*.{png,jpg,svg}";
	var images_dest = _build + "images/";

	var images = src(images_src)
		.pipe(
			newer({
				dest: images_dest,
				map: function (rel) {
					var regex = /(\.(png|jpg))$/g;
					return rel.replace(regex, ".webp");
				},
			})
		)
		.pipe(debug({ title: "WEBP Images" }))
		.pipe(
			webp({
				quality: 50,
				method: 6,
			})
		)
		.pipe(dest(images_dest));
	browserSync.reload();
	cb();
}
// Webfonts
function webfonts(cb) {
	src("./node_modules/@fortawesome/fontawesome-free/webfonts/**.*").pipe(
		dest(_build + "/webfonts/")
	);
	cb();
}
// Clean
function clean(cb) {
	del.sync([_build + "css", _build + "js", _build + "webfonts"]);
	cb();
}
// Watch files
function observer() {
	watch("source/images/**/*.*", images);
	watch("./source/js/**/*.js", _main_js);
	watch("./source/scss/**/*.scss", _main_css);
}
// Server
function localServer(cb) {
	connect.server(
		{
			base: _dist + "/",
			port: 3081,
			debug: true,
		},
		function () {
			browserSync.init([_dist + "/**/**.*"], {
				// server: _dist
				proxy: "127.0.0.1:3081",
				port: 81,
				notify: false,
				ghostMode: true,
			});
		}
	);
	cb();
}
function proxyServer(cb) {
	browserSync.init([_dist + "/**/**.*"], {
		proxy: "localhost",
		port: 8100,
		notify: false,
	});
	cb();
}

function server(cb) {
	localServer(cb);
}

function clearcache(cb) {
	src([
		_dist + "/**/*.{html,php}",
		"!" + _dist + "/template/*.*",
		"!" + _dist + "/blog/**/*.*",
		"!" + _dist + "/admin/**/*.*",
	])
		.pipe(debug({ title: "Cache Bust" }))
		.pipe(
			cachebust({
				type: "timestamp",
			})
		)
		.pipe(dest(_dist));
	cb();
}

// Exports
const build = series(
	clean,
	images,
	webfonts,
	parallel(_main_js, _main_css),
	parallel(observer, server)
);
const host = series(clearcache, parallel(observer, server));
const pushversion = series(clearcache);
// Package Scripts
exports.build = build;
exports.pushversion = pushversion;
exports.default = function (cb) {
	host();
	cb();
};
