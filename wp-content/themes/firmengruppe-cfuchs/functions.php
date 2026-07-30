<?php

/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

if ( ! defined( 'BASETHEME_BLOCK_DIR' ) ) {
	define( 'BASETHEME_BLOCK_DIR', __DIR__ . '/blocks' );
}


if ( ! defined( 'BASETHEME_DEFAULT_IMAGE' ) ) {
	define( 'BASETHEME_DEFAULT_IMAGE', esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp' );
}


$bst_folder_includes = bst_includes( __DIR__ . '/includes/classes' );
/**
 * Checks if any file have error while including it.
 */
foreach ( $bst_folder_includes as $bst_folders ) {
	foreach ( $bst_folders as $bst_file ) {
		$bst_filepath = locate_template( str_replace( __DIR__ . '/', '', $bst_file ) );
		if ( file_exists( $bst_filepath ) ) {
			require_once $bst_filepath;
		} else {
			echo 'Unable to load configuration file ' . esc_html( basename( $bst_file ) ) . ' please check file name in functions.php in your current active theme.';
		}
	}
}
/**
 * Get folder Dir
 *
 * @param string $directory Folder dir path.
 */
function bst_includes( $directory ) {
	$folders = array();

	// Get all files and folders in the specified directory.
	$items = scandir( $directory );

	// Iterate through each item.
	foreach ( $items as $item ) {
		$full_path = $directory . '/' . $item;

		// Check if the item is a directory and not '.' or '..'.
		if ( is_dir( $full_path ) && '.' !== $item && '..' != $item ) {
			$folders[ $item ] = glob( __DIR__ . '/includes/classes/' . $item . '/*.php' );
		}
	}
	$folders['other'] = array(
		__DIR__ . '/includes/cpt.php',
		__DIR__ . '/includes/project.php',
	);

	return $folders;
}


function fuchs_load_more_projects() {
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$next_page = $page + 1;

	$args = array(
		'post_type'      => 'project',
		'posts_per_page' => 9,
		'paged'          => $next_page,
	);

	$query = new WP_Query($args);

	ob_start();

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('partials/content', 'archive-project');
		}
	}

	$html = ob_get_clean();

	wp_send_json_success(array(
		'html'     => $html,
		'paged'    => $next_page,
		'max_page' => $query->max_num_pages,
	));
	wp_die();
}
add_action('wp_ajax_fuchs_load_more_projects', 'fuchs_load_more_projects');
add_action('wp_ajax_nopriv_fuchs_load_more_projects', 'fuchs_load_more_projects');


function fuchs_load_more_reference() {
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$next_page = $page + 1;

	$args = array(
		'post_type'      => 'overview',
		'posts_per_page' => 9,
		'paged'          => $next_page,
	);

	$query = new WP_Query($args);

	ob_start();

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('partials/content', 'archive-overview');
		}
	}

	$html = ob_get_clean();

	wp_send_json_success(array(
		'html'     => $html,
		'paged'    => $next_page,
		'max_page' => $query->max_num_pages,
	));
	wp_die();
}
add_action('wp_ajax_fuchs_load_more_reference', 'fuchs_load_more_reference');
add_action('wp_ajax_nopriv_fuchs_load_more_reference', 'fuchs_load_more_reference');




function fuchs_enqueue_ajax_scripts() {
    wp_enqueue_script(
        'fuchs-load-more',
        get_template_directory_uri() . '/assets/src/js/partials/load-more-projects.js',
        array('jquery'),
        null,
        true
    );

   wp_localize_script('fuchs-load-more', 'fuchs_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        // 'nonce' => wp_create_nonce('fuchs_load_more_nonce'), // optional
    ));
}
add_action('wp_enqueue_scripts', 'fuchs_enqueue_ajax_scripts');



/**
 * Remove the title attribute from WordPress attachment images.
 */
function mytheme_remove_image_title_attribute( $attr ) {
	unset( $attr['title'] );

	return $attr;
}

add_filter(
	'wp_get_attachment_image_attributes',
	'mytheme_remove_image_title_attribute'
);



/**
 * Generate the PWA manifest dynamically using the WordPress Site Icon.
 */
function basetheme_output_pwa_manifest() {

	if ( ! isset( $_GET['theme-pwa-manifest'] ) ) {
		return;
	}

	$site_name   = get_bloginfo( 'name' );
	$theme_color = '#007857';
	$icons       = array();

	foreach ( array( 192, 512 ) as $size ) {
		$icon_url = get_site_icon_url( $size );

		if ( $icon_url ) {
			$icons[] = array(
				'src'     => esc_url_raw( $icon_url ),
				'sizes'   => $size . 'x' . $size,
				'purpose' => 'any',
			);
		}
	}

	$manifest = array(
		'id'               => home_url( '/' ),
		'name'             => $site_name,
		'short_name'       => wp_html_excerpt( $site_name, 20, '' ),
		'description'      => get_bloginfo( 'description' ),
		'start_url'        => home_url( '/' ),
		'scope'            => home_url( '/' ),
		'display'          => 'standalone',
		'background_color' => '#ffffff',
		'theme_color'      => $theme_color,
		'icons'            => $icons,
	);

	nocache_headers();

	header( 'Content-Type: application/manifest+json; charset=' . get_option( 'blog_charset' ) );
	header( 'X-Robots-Tag: noindex, nofollow', true );

	echo wp_json_encode(
		$manifest,
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
	);

	exit;
}
add_action( 'template_redirect', 'basetheme_output_pwa_manifest' );
