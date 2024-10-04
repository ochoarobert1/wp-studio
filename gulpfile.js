import gulp from "gulp";
import zip from "gulp-zip";

gulp.task("zip-theme", function () {
  return gulp
    .src([
      "./source/themes/streann-studio-theme/*",
      "!./{node_modules,node_modules/**/*}",
      "!./{vendor/**/*}",
      "!./assets/{sass,sass/*}",
      "!./assets/{less,less/*}",
      "!./.minify.js",
      "!./package.json",
      "!./package-lock.json",
    ])
    .pipe(zip("streann-studio-theme.zip"))
    .pipe(gulp.dest("./"));
});
