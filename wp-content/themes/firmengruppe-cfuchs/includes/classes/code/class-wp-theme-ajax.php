<?php
/**
 * Ajax related functions
 *
 * @link https://codex.wordpress.org/AJAX#Ajax_in_WordPress
 *
 * @package FUCHS Package
 * @since 1.0.0
 */
namespace BaseTheme\Ajax;

class WP_Theme_Ajax {

	public function __construct() {
		add_action( 'wp_ajax_nopriv_ajax_filter', array( $this, 'ajax_filter' ) );
		add_action( 'wp_ajax_ajax_filter', array( $this, 'ajax_filter' ) );
	}

	public function ajax_filter() {

	$page     = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$search   = sanitize_text_field($_POST['search'] ?? '');
	$category = sanitize_text_field($_POST['category'] ?? '');
	$region   = sanitize_text_field($_POST['region'] ?? '');
	$status   = sanitize_text_field($_POST['status'] ?? '');

	$args = array(
		'post_type'      => 'reference',
		'posts_per_page' => 9,
		'paged'          => $page,
	);

	if ( $search ) {
		$args['s'] = $search;
	}

	$tax_query = array( 'relation' => 'AND' );

	if ( $category ) {
		$tax_query[] = array(
			'taxonomy' => 'reference-category',
			'field'    => 'slug',
			'terms'    => $category,
		);
	}

	if ( $region ) {
		$tax_query[] = array(
			'taxonomy' => 'region',
			'field'    => 'slug',
			'terms'    => $region,
		);
	}

	if ( $status ) {
		$tax_query[] = array(
			'taxonomy' => 'status',
			'field'    => 'slug',
			'terms'    => $status,
		);
	}

	if ( count( $tax_query ) > 1 ) {
		$args['tax_query'] = $tax_query;
	}

	$query = new \WP_Query( $args );

	ob_start();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'partials/content', 'archive-overview' );
		}
	}

	wp_reset_postdata();

	wp_send_json_success( array(
		'html'     => ob_get_clean(),
		'max_page' => $query->max_num_pages,
	) );

	wp_die();
}

}

new WP_Theme_Ajax();
