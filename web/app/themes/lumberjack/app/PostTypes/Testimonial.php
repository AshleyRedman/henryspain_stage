<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class Testimonial extends Post
{
    public static function getPostType()
    {
        return 'testimonial';
    }

    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Testimonials'),
                'singular_name' => __('Testimonial'),
                'add_new' => __('Create Testimonial'),
                'add_new_item' => __('Add New Testimonial'),
                'edit_item' => __('Edit Testimonial'),
                'new_item' => __('New Testimonial'),
                'view_item' => __('View Testimonial'),
                'view_items' => __('View Testimonial'),
                'search_items' => __('Search all Testimonial'),
                'not_found' => __('No Testimonial  Found'),
                'not_found_in_trash' => __('No Testimonial  in Trash'),
                'all_items' => __('All Testimonial'),
                'archives' => __('Testimonial  Archives'),
                'insert_into_item' => __('Insert Testimonial  Content'),
                'uploaded_to_this_item' => __('Uploaded to this Testimonial  content'),
                'featured_image' => __('Testimonial Image'),
                'set_featured_image' => __('Upload Image'),
                'remove_featured_image' => __('Remove Image'),
                'use_featured_image' => __('Use Image'),
                'menu_name' => __('Testimonials'),
                'filter_items_list' => __('Filter Testimonial'),
                'items_list_navigation' => __('List More Testimonial'),
                'items_list' => __('Testimonial List'),
                'name_admin_bar' => __('Testimonials')
            ],
            'public' => true,
            'has_archive' => true,
            'publicaly_queryable' => false,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array(
                'title',
                //'editor',
                //'author',
                //'thumbnail',
                //'excerpt',
                //'trackbacks',
                //'custom-fields',
                //'comments',
                //'revisions',
                //'page-attributes',
                //'post-formats'
            ),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-format-quote',
            'exclude_from_search' => true,
            'slug' => __('testimonial')
        ];
    }

    public static function getPublishedTestimonials()
    {
        return $testimonials = collect(
            Testimonial::builder()
            ->whereStatus('publish')
            ->get()
        );
    }
}
