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
			'singular_capital'   => 'Service',
			'plural_capital'     => 'Services',
			'singular_lowercase' => 'service',
			'plural_lowercase'   => 'services',
			// CPT Slug & Name.
			'register_key'       => 'service',
			'slug'               => 'service',
		),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon'    => 'dashicons-format-quote',
		'public'       => true,
		'show_in_menu' => true,
		'show_ui'      => true,
	)
);

new WP_Theme_CPT(
	array(
		'labels'       => array(
			'singular_capital'   => 'Team',
			'plural_capital'     => 'Teams',
			'singular_lowercase' => 'team',
			'plural_lowercase'   => 'teams',
			// CPT Slug & Name.
			'register_key'       => 'team',
			'slug'               => 'team',
		),
		'supports'     => array( 'title', 'thumbnail', 'author' ),
		'menu_icon'    => 'dashicons-format-quote',
		'public'       => true,
		'show_in_menu' => true,
		'show_ui'      => true,
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
			'register_key'       => 'reference',
			'slug'               => 'reference',
		),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon'    => 'dashicons-format-quote',
		'public'       => true,
		'show_in_menu' => true,
		'show_ui'      => true,
		'has_archive' => true,
		'rewrite' => [
			'slug' => 'reference',
		],
		'show_in_rest' => true,
		'taxonomies'   => array(
			array(
				'slug'          => 'reference-category',
				'register_key'  => 'reference-category', // if not given default is slug value.
				'name'          => 'reference-category',
				'singular_name' => 'category',
				'plural_name'   => 'Categories',
			),
			array(
				'slug'          => 'region',
				'register_key'  => 'region', // if not given default is slug value.
				'name'          => 'region',
				'singular_name' => 'region',
				'plural_name'   => 'Regions',
			),
			array(
				'slug'          => 'current-status',
				'register_key'  => 'current-status', // if not given default is slug value.
				'name'          => 'Current Status',
				'singular_name' => 'status',
				'plural_name'   => 'Status',
			),
		),
	)
);
new WP_Theme_CPT(
	array(
		'labels'       => array(
			'singular_capital'   => 'Einblicke',
			'plural_capital'     => 'Einblickes',
			'singular_lowercase' => 'einblicke',
			'plural_lowercase'   => 'einblickes',
			// CPT Slug & Name.
			'register_key'       => 'einblicke',
			'slug'               => 'einblicke',
		),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon'    => 'dashicons-format-quote',
		'public'       => true,
		'show_in_menu' => true,
		'show_ui'      => true,
		'has_archive' => true,
		'rewrite' => [
			'slug' => 'einblicke',
		],
		'show_in_rest' => true,
		'taxonomies'   => array(
			array(
				'slug'          => 'einblicke-category',
				'register_key'  => 'einblicke-category', // if not given default is slug value.
				'name'          => 'einblicke-category',
				'singular_name' => 'category',
				'plural_name'   => 'Categories',
			),
		),
	)
);
new WP_Theme_CPT(
	array(
		'labels' => array(
			'singular_capital'   => 'Job',
			'plural_capital'     => 'Jobs',
			'singular_lowercase' => 'job',
			'plural_lowercase'   => 'jobs',

			// CPT key MUST be lowercase
			'register_key' => 'job',
			'slug'         => 'job',
		),

		'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_icon'    => 'dashicons-id',
		'public'       => true,
		'show_ui'      => true,
		'show_in_menu' => true,

		'taxonomies' => array(

			array(
				'slug'              => 'job-category',
				'register_key'      => 'job-category',
				'name'              => 'Job Category',
				'singular_name'     => 'Job Category',
				'plural_name'       => 'Job Categories',
				'show_ui'           => true,
				'show_admin_column' => true,
				'hierarchical'      => true,
			),

			array(
				'slug'              => 'job-region',
				'register_key'      => 'job-region',
				'name'              => 'Job Region',
				'singular_name'     => 'Job Region',
				'plural_name'       => 'Job Regions',
				'show_ui'           => true,
				'show_admin_column' => true,
				'hierarchical'      => true,
			),

			array(
				'slug'              => 'job-status',
				'register_key'      => 'job-status',
				'name'              => 'Job Status',
				'singular_name'     => 'Job Status',
				'plural_name'       => 'Job Status',
				'show_ui'           => true,
				'show_admin_column' => true,
				'hierarchical'      => false,
			),
		),
	)
);

