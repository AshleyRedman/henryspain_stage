<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class Team extends Post
{
    public static function getPostType()
    {
        return 'team';
    }

    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Teams'),
                'singular_name' => __('Team'),
                'add_new' => __('Create Team Member'),
                'add_new_item' => __('Add New Team Member'),
                'edit_item' => __('Edit Team Member'),
                'new_item' => __('New Team Member'),
                'view_item' => __('View Team Member'),
                'view_items' => __('View Team Members'),
                'search_items' => __('Search all Team Members'),
                'not_found' => __('No Team Members Found'),
                'not_found_in_trash' => __('No Team Members in Trash'),
                'all_items' => __('All Team Members'),
                'archives' => __('Team Member Archives'),
                'insert_into_item' => __('Insert Team Member Content'),
                'uploaded_to_this_item' => __('Uploaded to this Team Members content'),
                'featured_image' => __('Profile Image'),
                'set_featured_image' => __('Upload Image'),
                'remove_featured_image' => __('Remove Image'),
                'use_featured_image' => __('Use Image'),
                'menu_name' => __('Team'),
                'filter_items_list' => __('Filter Team'),
                'items_list_navigation' => __('List More Team Members'),
                'items_list' => __('Team List'),
                'name_admin_bar' => __('Teams')
            ],
            'public' => true,
            'has_archive' => false,
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
            'menu_icon' => 'dashicons-groups',
            'exclude_from_search' => true,
            'slug' => __('team')
        ];
    }

    public static function getPublishedTeamMembers()
    {
        return $teams = collect(
            Team::builder()
                ->whereStatus('publish')
                ->orderBy('date', 'ASC')
                ->get()
        );
    }
}
