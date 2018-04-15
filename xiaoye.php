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
 * Create custom post types: project and skill
 */
function xiaoye_post_types() {
	register_post_type('project', [
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
	]);

	register_post_type('skill', [
		'labels' => [
			'name' => __('Skills', 'xiaoye'),
			'singular_name' => __('Skill', 'xiaoye'),
			'all_items' => __('All Skills', 'xiaoye'),
			'add_new' => __('Add New', 'xiaoye'),
			'add_new_item' => __('Add New Skill', 'xiaoye'),
			'edit_item' => __('Edit Skill', 'xiaoye'),
			'new_item' => __('New Skill', 'xiaoye'),
			'view_item' => __('View Skill', 'xiaoye'),
			'search_items' => __('Search Skills', 'xiaoye'),
			'not_found' => __('No skills found', 'xiaoye'),
			'not_found_in_trash' => __('No skills found in trash', 'xiaoye'),
		],
		'description' => __('Professional and life skills', 'xiaoye'),
		'public' => true,
		'exclude_from_search' => true,
		'supports' => ['title', 'editor', 'thumbnail'],
		'has_archive' => true,
		'rewrite' => ['slug' => 'skill'],
	]);
}

add_action('init', 'xiaoye_post_types');

/**
 * Show different number of posts for custom post types
 *
 * @param WP_Query $query
 */
function xiaoye_set_posts_per_page( $query ) {
	if ( !is_admin() && $query->is_main_query() ) {
		// Load all skills in one page
		if (is_post_type_archive( 'skill' )) {
			$query->set( 'posts_per_page', '999' );
			return;
		}

		// Load more projects in one page
		if (is_post_type_archive( 'project' )) {
			$query->set( 'posts_per_page', '24' );
			return;
		}
	}
}

add_action( 'pre_get_posts', 'xiaoye_set_posts_per_page', 1 );
