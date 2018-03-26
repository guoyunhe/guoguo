<?php

/**
 * @package GuoGuo
 * @version 1.0
 */

/*
Plugin Name: GuoGuo
Plugin URI: https://github.com/guoyunhe/guoguo
Description: Support projects, goals, etc.
Version: 1.0
Author: Guo Yunhe
Author URI: https://guoyunhe.me/
License: GPLv3
Text Domain: guoguo
*/

/**
 * Load plugin textdomain.
 */
function guoguo_load_textdomain() {
    load_plugin_textdomain('guoguo', false, 'guoguo/languages');
}

add_action('plugins_loaded', 'guoguo_load_textdomain');

/**
 * Create project post type.
 */
function guoguo_create_project_post_type() {
    $args = [
        'labels' => [
            'name' => __('Projects', 'guoguo'),
            'singular_name' => __('Project', 'guoguo'),
            'all_items' => __('All Projects', 'guoguo'),
            'add_new' => __('Add New', 'guoguo'),
            'add_new_item' => __('Add New Project', 'guoguo'),
            'edit_item' => __('Edit Project', 'guoguo'),
            'new_item' => __('New Project', 'guoguo'),
            'view_item' => __('View Project', 'guoguo'),
            'search_items' => __('Search Projects', 'guoguo'),
            'not_found' => __('No projects found', 'guoguo'),
            'not_found_in_trash' => __('No projects found in trash', 'guoguo'),
        ],
        'description' => __('Design work, research project, invention...', 'guoguo'),
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'project'],
    ];
    register_post_type('project', $args);
}

add_action('init', 'guoguo_create_project_post_type');