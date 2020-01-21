const mix = require("laravel-mix");
require("laravel-mix-purgecss");
require("laravel-mix-polyfill");
require("laravel-mix-imagemin");

/*
 // Purge Config
.purgeCss({
        enabled: true,
        extensions: ["html", "php"],
        folders: ["resources"]
    });
 */

mix.sass("resources/sass/app.scss", "assets/css")
    .options({
        processCssUrls: true,
        postCss: [
            require("autoprefixer")({
                grid: true,
                cascade: false
            }),
            require("cssnano")
        ]
    });

mix.js("resources/js/app.js", "assets/js").polyfill({
    enabled: true,
    useBuiltIns: "usage",
    targets: {
        chrome: "58",
        firefox: "50",
        ie: "11"
    },
    corejs: 2,
    debug: false
});

mix.imagemin("assets/img/*");
