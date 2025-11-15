<?php
/**
 * Functions for custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/post-types/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

use BaseTheme\CPT\WP_Theme_CPT;


new WP_Theme_CPT(
	array(
		'labels'       => array(
			'singular_capital'   => 'Project',
			'plural_capital'     => 'Projects',
			'singular_lowercase' => 'project',
			'plural_lowercase'   => 'projects',
			// CPT Slug & Name.
			'register_key'       => 'project',
			'slug'               => 'project',
		),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon'    => 'dashicons-format-quote',
		'public'       => true,
		'show_in_menu' => true,
		'show_ui'      => true,
		'taxonomies'   => array(
			array(
				'slug'          => 'category',
				'register_key'  => 'category', // if not given default is slug value.
				'name'          => 'Category',
				'singular_name' => 'Category',
				'plural_name'   => 'Categories',
			),
		),
	)
);

new WP_Theme_CPT(
	array(
		'labels'       => array(
			'singular_capital'   => 'Reference',
			'plural_capital'     => 'References',
			'singular_lowercase' => 'reference',
			'plural_lowercase'   => 'references',
			// CPT Slug & Name.
			'register_key'       => 'overview',
			'slug'               => 'reference',
		),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon'    => 'dashicons-format-quote',
		'public'       => true,
		'show_in_menu' => true,
		'show_ui'      => true,
		'taxonomies'   => array(
			array(
				'slug'          => 'reference-category',
				'register_key'  => 'reference-category', // if not given default is slug value.
				'name'          => 'reference-category',
				'singular_name' => 'category',
				'plural_name'   => 'Categories',
			),
		),
	)
);
