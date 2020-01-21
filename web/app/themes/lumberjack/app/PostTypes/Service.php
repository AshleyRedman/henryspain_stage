<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class Service extends Post
{
    public static function getPostType()
    {
        return 'service';
    }

    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new' => __('Create Service'),
                'add_new_item' => __('Add New Service'),
                'edit_item' => __('Edit Service'),
                'new_item' => __('New Service'),
                'view_item' => __('View Service'),
                'view_items' => __('View Services'),
                'search_items' => __('Search all Services'),
                'not_found' => __('No Services Found'),
                'not_found_in_trash' => __('No Services in Trash'),
                'all_items' => __('All Services'),
                'archives' => __('Service Archives'),
                'insert_into_item' => __('Insert Service Content'),
                'uploaded_to_this_item' => __('Uploaded to this Services content'),
                'featured_image' => __('Service Image'),
                'set_featured_image' => __('Upload Image'),
                'remove_featured_image' => __('Remove Image'),
                'use_featured_image' => __('Use Image'),
                'menu_name' => __('Services'),
                'filter_items_list' => __('Filter Services'),
                'items_list_navigation' => __('List More Services'),
                'items_list' => __('Service List'),
                'name_admin_bar' => __('Services')
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
                'editor',
                //'author',
                'thumbnail',
                //'excerpt',
                //'trackbacks',
                //'custom-fields',
                //'comments',
                //'revisions',
                //'page-attributes',
                //'post-formats'
            ),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-multisite',
            'exclude_from_search' => true,
            'slug' => __('services')
        ];
    }

    public static function getPublishedServices()
    {
        return $services = collect(
            Service::builder()
            ->whereStatus('publish')
            ->orderBy('date', 'ASC')
            ->get()
        );
    }

    public static function getCurrentService($service)
    {
        return $service;
    }
}
