<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class Campaign extends Post
{
    public static function getPostType()
    {
        return 'Campaign';
    }

    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Campaigns'),
                'singular_name' => __('Campaign'),
                'add_new' => __('Create Campaign Landing Page'),
                'add_new_item' => __('Add New Campaign Page'),
                'edit_item' => __('Edit Campaign Page'),
                'new_item' => __('New Campaign Page'),
                'view_item' => __('View Campaign'),
                'view_items' => __('View Campaigns'),
                'search_items' => __('Search all Campaigns'),
                'not_found' => __('No Campaigns Found'),
                'not_found_in_trash' => __('No Campaigns in Trash'),
                'all_items' => __('All Campaigns'),
                'archives' => __('Campaign Archives'),
                'insert_into_item' => __('Insert Campaign Content'),
                'uploaded_to_this_item' => __('Uploaded to this Campaigns content'),
                'featured_image' => __('Campaign Image'),
                'set_featured_image' => __('Upload Image'),
                'remove_featured_image' => __('Remove Image'),
                'use_featured_image' => __('Use Image'),
                'menu_name' => __('Campaigns'),
                'filter_items_list' => __('Filter Campaigns'),
                'items_list_navigation' => __('List More Campaigns'),
                'items_list' => __('Campaign List'),
                'name_admin_bar' => __('Campaigns')
            ],
            'public' => true,
            'has_archive' => true,
            'publicaly_queryable' => true,
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
            'menu_icon' => 'dashicons-visibility',
            'exclude_from_search' => true,
            'slug' => __('Campaigns')
        ];
    }

    public static function getAllPublished()
    {
        return Campaign::builder()
            ->whereStatus('publish')
            ->orderBy('ASC', 'date')
            ->limit(15)
            ->get();
    }
}
