<?php

use Rareloop\Lumberjack\Facades\Router;

Router::get('/testimonials', function () {
    wp_safe_redirect('/testimonial', 300);
});

Router::get('/services', function () {
    wp_safe_redirect('/service', 300);
});
