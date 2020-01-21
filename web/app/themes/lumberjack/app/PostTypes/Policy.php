<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class Policy extends Post
{
    public static function getPostType()
    {
        return 'policy';
    }

    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Policies'),
                'singular_name' => __('Policy'),
                'add_new' => __('Create Policy'),
                'add_new_item' => __('Add New Policy'),
                'edit_item' => __('Edit Policy'),
                'new_item' => __('New Policy'),
                'view_item' => __('View Policy'),
                'view_items' => __('View Policy'),
                'search_items' => __('Search all Policy'),
                'not_found' => __('No Policy  Found'),
                'not_found_in_trash' => __('No Policy  in Trash'),
                'all_items' => __('All Policy'),
                'archives' => __('Policy  Archives'),
                'insert_into_item' => __('Insert Policy  Content'),
                'uploaded_to_this_item' => __('Uploaded to this Policy  content'),
                'featured_image' => __('Policy Image'),
                'set_featured_image' => __('Upload Image'),
                'remove_featured_image' => __('Remove Image'),
                'use_featured_image' => __('Use Image'),
                'menu_name' => __('Policy'),
                'filter_items_list' => __('Filter Policy'),
                'items_list_navigation' => __('List More Policy'),
                'items_list' => __('Policy List'),
                'name_admin_bar' => __('Policy')
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
                //'thumbnail',
                //'excerpt',
                //'trackbacks',
                //'custom-fields',
                //'comments',
                //'revisions',
                //'page-attributes',
                //'post-formats'
            ),
            'menu_position' => 25,
            'menu_icon' => 'dashicons-media-document',
            'exclude_from_search' => true,
            'slug' => __('policy')
        ];
    }

    public static function getPublishedPolicies()
    {
        return $policies = collect(
            Policy::builder()
            ->whereStatus('publish')
            ->get()
        );
    }
}
