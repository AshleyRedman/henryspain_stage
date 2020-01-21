<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class Guide extends Post
{
    public static function getPostType()
    {
        return 'guide';
    }

    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Guides'),
                'singular_name' => __('Guide'),
                'add_new' => __('Create Guide'),
                'add_new_item' => __('Add New Guide'),
                'edit_item' => __('Edit Guide'),
                'new_item' => __('New Guide'),
                'view_item' => __('View Guide'),
                'view_items' => __('View Guides'),
                'search_items' => __('Search all Guides'),
                'not_found' => __('No Guides Found'),
                'not_found_in_trash' => __('No Guides in Trash'),
                'all_items' => __('All Guides'),
                'archives' => __('Guide Archives'),
                'insert_into_item' => __('Insert Guide Content'),
                'uploaded_to_this_item' => __('Uploaded to this Guides content'),
                'featured_image' => __('Guide Image'),
                'set_featured_image' => __('Upload Image'),
                'remove_featured_image' => __('Remove Image'),
                'use_featured_image' => __('Use Image'),
                'menu_name' => __('Guides'),
                'filter_items_list' => __('Filter Guides'),
                'items_list_navigation' => __('List More Guides'),
                'items_list' => __('Guide List'),
                'name_admin_bar' => __('Guides')
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
                //'editor',
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
            'menu_icon' => 'dashicons-text-page',
            'exclude_from_search' => true,
            'slug' => __('guides')
        ];
    }

    public static function getPublishedGuides()
    {
        return $guides = collect(
            Guide::builder()
                ->whereStatus('publish')
                ->orderBy('date', 'ASC')
                ->get()
        );
    }

    public static function getCurrentGuide($guide)
    {
        return $guide;
    }
}
