<?php
/**
 * Plugin Name: Dale Studios WordPress
 * Plugin URI: https://dalestudios.co.uk
 * Description: Dale Studios WordPress Starter Config
 * Version: 4.0.0
 * Author: Ashley Redman
 * Author URI: https://dalestudios.co.uk/team-member/ashley-redman
 * License: MIT License
 */

namespace App;

/**
 * Class DaleStudiosWordPress
 * @package App
 */
class DaleStudiosWordPress
{
    /**
     * DSNewSite constructor.
     */
    public function __construct()
    {
        add_filter('upload_mimes', array($this, 'mimeTypes'));
        add_filter('body_class', array($this, 'addSlugToBody'));
        add_filter('use_block_editor_for_post_type', '__return_false', 10);
        add_filter('acf/settings/remove_wp_meta_box', '__return_false');
        add_action('init', array($this, 'disableEmoji'));
        add_action('init', array($this, 'disableRSS'));
    }

    /**
     * @param $mimes
     *
     * @return mixed
     */
    public function mimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * @param $classes
     *
     * @return array
     */
    public function addSlugToBody($classes)
    {
        global $post;
        if (is_home()) {
            $key = array_search('blog', $classes);
            if ($key > -1) {
                unset($classes[$key]);
            }
        } elseif (is_page()) {
            $classes[] = sanitize_html_class($post->post_name);
        } elseif (is_singular()) {
            $classes[] = sanitize_html_class($post->post_name);
        }
        return $classes;
    }

    /**
     * Disable site emoji support
     */
    public function disableEmoji()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', array($this, 'disableEmojiTinyMCE'));
        add_filter('wp_resource_hints', array($this, 'disableEmojiDNSPrefetch'), 10, 2);
        add_action('admin_menu', array($this, 'removeAdminFooter'));
        add_filter('admin_footer_text', array($this, 'replaceAdminThankyou'));
    }

    /**
     * @param $plugins
     *
     * @return array
     */
    public function disableEmojiTinyMCE($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }

    /**
     * @param $urls
     * @param $relation_type
     *
     * @return array
     */
    public function disableEmojiDNSPrefetch($urls, $relation_type)
    {
        if ('dns-prefetch' == $relation_type) {
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
            $urls = array_diff($urls, array($emoji_svg_url));
        }
        return $urls;
    }

    /**
     * Register RSS hooks
     */
    public function disableRSS()
    {
        add_action('do_feed', array($this, 'killRSSProcess'), 1);
        add_action('do_feed_rdf', array($this, 'killRSSProcess'), 1);
        add_action('do_feed_rss', array($this, 'killRSSProcess'), 1);
        add_action('do_feed_rss2', array($this, 'killRSSProcess'), 1);
        add_action('do_feed_atom', array($this, 'killRSSProcess'), 1);
        add_action('do_feed_rss2_comments', array($this, 'killRSSProcess'), 1);
        add_action('do_feed_atom_comments', array($this, 'killRSSProcess'), 1);
    }

    /**
     * Kill WP Process
     */
    public function killRSSProcess()
    {
        wp_die(('RSS Feed Disabled, please visit ' . get_site_url() . ' for more.'));
    }

    public function removeAdminFooter()
    {
        remove_filter('update_footer', 'core_update_footer');
    }

    public function replaceAdminThankyou()
    {
        echo '<span id="footer-thankyou">Developed by <a href="https://ardev.co.uk" target="_blank">A.R Development</a></span>';
    }
}

new DaleStudiosWordPress();
