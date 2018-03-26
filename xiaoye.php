<?php

/**
 * @package Xiaoye
 * @version 1.0
 */

/*
Plugin Name: Xiaoye
Plugin URI: https://github.com/guoyunhe/xiaoye
Description: Support projects, goals, etc.
Version: 1.0
Author: Guo Yunhe
Author URI: https://guoyunhe.me/
License: GPLv3
Text Domain: xiaoye
*/

/**
 * Load plugin textdomain.
 */
function xiaoye_load_textdomain() {
	load_plugin_textdomain('xiaoye', false, 'xiaoye/languages');
}

add_action('plugins_loaded', 'xiaoye_load_textdomain');

/**
 * Create project post type.
 */
function xiaoye_create_project_post_type() {
	$args = [
		'labels' => [
			'name' => __('Projects', 'xiaoye'),
			'singular_name' => __('Project', 'xiaoye'),
			'all_items' => __('All Projects', 'xiaoye'),
			'add_new' => __('Add New', 'xiaoye'),
			'add_new_item' => __('Add New Project', 'xiaoye'),
			'edit_item' => __('Edit Project', 'xiaoye'),
			'new_item' => __('New Project', 'xiaoye'),
			'view_item' => __('View Project', 'xiaoye'),
			'search_items' => __('Search Projects', 'xiaoye'),
			'not_found' => __('No projects found', 'xiaoye'),
			'not_found_in_trash' => __('No projects found in trash', 'xiaoye'),
		],
		'description' => __('Design work, research project, invention...', 'xiaoye'),
		'public' => true,
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
		'has_archive' => true,
		'rewrite' => ['slug' => 'project'],
	];
	register_post_type('project', $args);
}

add_action('init', 'xiaoye_create_project_post_type');
