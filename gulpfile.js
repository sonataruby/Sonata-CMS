var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
var csso = require('gulp-csso');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var del = require('del');
var less = require('gulp-less');
var cssmin = require('gulp-cssmin');
var concat = require('gulp-concat');


const AUTOPREFIXER_BROWSERS = [
  'ie >= 10',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4.4',
  'bb >= 10'
];

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src(['develop/*.scss'])
        .pipe(sass({
	      outputStyle: 'nested',
	      precision: 10,
	      includePaths: ['.'],
	      onError: console.error.bind(console, 'Sass error:')
	    }))
        //.pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        .pipe(csso())
        .pipe(gulp.dest("public/assent/css"))
        .pipe(browserSync.stream());
});


gulp.task('less', function() {
    return gulp.src(['develop/*.less'])
        .pipe(less())
        //.pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        //.pipe(concat('app.css'))
        .pipe(csso())
        .pipe(gulp.dest("public/assent/css"))
        .pipe(browserSync.stream());
});

gulp.task('cssmin', function() {
    gulp.src(['develop/*.scss'])
        .pipe(sass({
          outputStyle: 'nested',
          precision: 10,
          includePaths: ['.'],
          onError: console.error.bind(console, 'Sass error:')
        }))
        //.pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        .pipe(csso())
        .pipe(gulp.dest("public/assent/css"))
        .pipe(browserSync.stream());
    gulp.src(['develop/*.less'])
        .pipe(less())
        //.pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        //.pipe(concat('app.css'))
        .pipe(csso())
        .pipe(gulp.dest("public/assent/css"))
        .pipe(browserSync.stream());
        
    return gulp.src(['develop/*.css'])
        .pipe(cssmin())
        //.pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        .pipe(csso())
        .pipe(gulp.dest("public/assent/css"))
        .pipe(browserSync.stream());
});

// Move the javascript files into our /src/js folder
gulp.task('js', function() {

    gulp.src(['develop/*.js','node_modules/socket.io-client/dist/socket.io.js','node_modules/angular/angular.js','node_modules/tinymce/tinymce.js'])
        .pipe(uglify())
        .pipe(gulp.dest("public/assent/js"))
        .pipe(browserSync.stream());

    

   
    return gulp.src(['node_modules/jquery/dist/jquery.js', 'node_modules/popper.js/dist/umd/popper.js','node_modules/bootstrap/dist/js/bootstrap.js'])
    	.pipe(concat('apps.js'))
    	.pipe(uglify())
        .pipe(gulp.dest("public/assent/js"))
        .pipe(browserSync.stream());
});


gulp.task('icons', function() { 
    del(['public/assent/webfonts/*']);
    gulp.src(['node_modules/@fortawesome/fontawesome-free/webfonts/*'])
        .pipe(gulp.dest('public/assent/webfonts/'))

    return gulp.src(['node_modules/@fortawesome/fontawesome-free/css/all.css'])
        .pipe(concat('icon.css'))
        .pipe(csso())
        .pipe(gulp.dest('public/assent/css/'))
        .pipe(browserSync.stream());
});

gulp.task('animate', function() { 
    
  
    return gulp.src(['node_modules/animate.css/animate.css'])
        .pipe(cssmin())
        .pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        .pipe(csso())
        .pipe(gulp.dest('public/assent/css/'))
        .pipe(browserSync.stream());
});


gulp.task('clean', () => del(['public/assent/js/*.js', 'public/assent/css/*.css']));

gulp.task('default', gulp.series(['clean','js','less','sass','cssmin','icons'],function(done) { 
    // default task code here
    done();
}));