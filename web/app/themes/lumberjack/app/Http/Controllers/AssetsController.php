<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Http\Controller as BaseController;

class AssetsController extends BaseController
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'jquery']);
        add_action('wp_enqueue_scripts', [$this, 'jqueryForm']);
        add_action('wp_enqueue_scripts', [$this, 'css']);
        add_action('wp_footer', [$this, 'js']);
        add_action('wp_enqueue_scripts', [$this, 'slick']);
    }

    public function jquery()
    {
        wp_enqueue_script('jquery');
    }

    public function jqueryForm()
    {
        wp_enqueue_script('jquery-form');
    }

    public function css()
    {
        wp_enqueue_style('css', get_stylesheet_directory_uri() . '/assets/css/app.css');
    }

    public function js()
    {
        wp_register_script('js', get_stylesheet_directory_uri() . '/assets/js/app.js');
        wp_enqueue_script('js');
    }
    public function slick()
    {
        wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/node_modules/slick-carousel/slick/slick.css');
        wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css');
    }
}
