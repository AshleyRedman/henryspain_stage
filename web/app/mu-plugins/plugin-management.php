<?php
/*
Plugin Name:  Plugin Management
Plugin URI:   https://ardev.co.uk
Description:  Disallow UI Plugin Management
Version:      1.0.0
Author:       Ashley Redman
Author URI:   https://ashredman.com
License:      MIT License
*/

namespace App;

class PluginManagement
{
    public function __construct()
    {
        add_filter('plugin_action_links', [$this, 'removePluginControls'], 10, 4);
        add_filter('bulk_actions-plugins', [$this, 'disableBulkActions']);
    }

    public function removePluginControls($actions, $plugin_file, $plugin_date, $context)
    {
        if (array_key_exists('edit', $actions)) {
            unset($actions['edit']);
        }

        if (array_key_exists('deactivate', $actions)) {
            unset($actions['deactivate']);
        }

        if (array_key_exists('activate', $actions)) {
            //unset($actions['activate']);
        }

        if (array_key_exists('delete', $actions)) {
            unset($actions['delete']);
        }

        return $actions;
    }

    public function disableBulkActions($actions)
    {
        if (array_key_exists('deactivate-selected', $actions)) {
            unset($actions['deactivate-selected']);
        }

        if (array_key_exists('activate-selected', $actions)) {
            unset($actions['activate-selected']);
        }

        if (array_key_exists('delete-selected', $actions)) {
            unset($actions['delete-selected']);
        }

        if (array_key_exists('update-selected', $actions)) {
            unset($actions['update-selected']);
        }
    }
}

new PluginManagement();
