<?php
/**
 * Plugin Name: Henry Spain Admin
 * Plugin URI: https://ardev.co.uk
 * Description: Henry Spain Admin Config
 * Version: 1.0.0
 * Author: Ashley Redman
 * Author URI: https://ashedman.com
 * License: MIT License
 */

namespace App;

class HenrySpainAdmin
{
    protected $theme = "henryspain";
    protected $favicon_path = "/app/themes/lumberjack/assets/meta/favicon.ico";

    public function __construct()
    {
        //add_action('admin_init', array($this,'addTheme'));
        //add_action('user_register', array($this, 'setDefaultTheme'));
        add_action('admin_head', [$this, 'setAdminFavicon']);
    }

    public function setDefaultTheme($user_id)
    {
        $args = array(
            'ID' => $user_id,
            'admin_color' => $this->theme
        );
        wp_update_user($args);
    }

    public function addTheme()
    {
        $suffix = is_rtl() ? '-rtl' : '';

        wp_admin_css_color(
            $this->theme,
            __('L Jackson & Co', 'admin_schemes'),
            plugins_url('/admin-themes/themes/ljackson/colors.css', __FILE__),
            array(
                '#FFFFFF',
                '#000000',
                '#5B5E58',
                '#88A26F'
            ),
            array(
                'base' => '#000000',
                'focus' => '#5B5E58',
                'current' => '#88A26F'
            )
        );
    }

    public function setAdminFavicon()
    {
        echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.$this->favicon_path.'" />';
    }
}

new HenrySpainAdmin();
