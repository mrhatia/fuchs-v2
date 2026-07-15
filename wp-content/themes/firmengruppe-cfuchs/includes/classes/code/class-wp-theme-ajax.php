<?php
namespace BaseTheme\Ajax;

class WP_Theme_Ajax {

	public function __construct() {

		// Reference (already working)
		add_action( 'wp_ajax_nopriv_ajax_filter', [ $this, 'ajax_filter' ] );
		add_action( 'wp_ajax_ajax_filter', [ $this, 'ajax_filter' ] );

		// ✅ JOBS (NEW – CLONED)
		add_action( 'wp_ajax_nopriv_ajax_jobs_filter', [ $this, 'ajax_jobs_filter' ] );
		add_action( 'wp_ajax_ajax_jobs_filter', [ $this, 'ajax_jobs_filter' ] );
	}

	/* ===============================
	   REFERENCE FILTER (UNCHANGED)
	================================ */
		public function ajax_filter() {

		$page     = isset($_POST['page']) ? absint($_POST['page']) : 1;
		$search   = sanitize_text_field($_POST['search'] ?? '');
		$category = sanitize_text_field($_POST['category'] ?? '');
		$region   = sanitize_text_field($_POST['region'] ?? '');
		$status   = sanitize_text_field($_POST['status'] ?? '');

		$args = [
			'post_type'      => 'reference',
			'posts_per_page' => 9,
			'paged'          => $page,
		];

		if ( $search !== '' ) {
			$args['s'] = $search;
		}


		$tax_query = [ 'relation' => 'AND' ];

		if ( $category ) {
			$tax_query[] = [
				'taxonomy' => 'reference-category',
				'field'    => 'slug',
				'terms'    => $category,
			];
		}

		if ( $region ) {
			$tax_query[] = [
				'taxonomy' => 'region',
				'field'    => 'slug',
				'terms'    => $region,
			];
		}

		if ( $status ) {
			$tax_query[] = [
				'taxonomy' => 'current-status',
				'field'    => 'slug',
				'terms'    => $status,
			];
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
		} else {
			echo '<div class="heading-4 center-align">No projects found.</div>';
		}

		wp_reset_postdata();

		wp_send_json_success([
			'html'     => ob_get_clean(),
			'max_page' => $query->max_num_pages,
		]);

		wp_die();
	}

	/* ===============================
	   ✅ JOBS FILTER (NEW)
	================================ */
	public function ajax_jobs_filter() {

	$page = isset( $_POST['page'] )
		? max( 1, absint( $_POST['page'] ) )
		: 1;

	$search = isset( $_POST['search'] )
		? sanitize_text_field( wp_unslash( $_POST['search'] ) )
		: '';

	$category = isset( $_POST['category'] )
		? sanitize_text_field( wp_unslash( $_POST['category'] ) )
		: '';

	$region = isset( $_POST['region'] )
		? sanitize_text_field( wp_unslash( $_POST['region'] ) )
		: '';

	$status = isset( $_POST['status'] )
		? sanitize_text_field( wp_unslash( $_POST['status'] ) )
		: '';

	/*
	 * Treat "all" as an empty filter.
	 * This protects the PHP query even if JavaScript sends "all".
	 */
	$category = 'all' === $category ? '' : $category;
	$region   = 'all' === $region ? '' : $region;
	$status   = 'all' === $status ? '' : $status;

	$args = [
		'post_type'           => 'job',
		'post_status'         => 'publish',
		'posts_per_page'      => 8,
		'paged'               => $page,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'ignore_sticky_posts' => true,
	];

	/*
	 * Do not add an empty search parameter,
	 * because an empty search should display all jobs.
	 */
	if ( '' !== $search ) {
		$args['s'] = $search;
	}

	$tax_query = [];

	if ( '' !== $category ) {
		$tax_query[] = [
			'taxonomy' => 'job-category',
			'field'    => 'slug',
			'terms'    => $category,
		];
	}

	if ( '' !== $region ) {
		$tax_query[] = [
			'taxonomy' => 'job-region',
			'field'    => 'slug',
			'terms'    => $region,
		];
	}

	if ( '' !== $status ) {
		$tax_query[] = [
			'taxonomy' => 'job-status',
			'field'    => 'slug',
			'terms'    => $status,
		];
	}

	if ( ! empty( $tax_query ) ) {
		$args['tax_query'] = array_merge(
			[ 'relation' => 'AND' ],
			$tax_query
		);
	}

	$query = new \WP_Query( $args );

	$no_jobs_message = isset( $_POST['no_jobs_message'] )
		? sanitize_text_field( wp_unslash( $_POST['no_jobs_message'] ) )
		: 'No Jobs Found.';

	ob_start();

	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {
			$query->the_post();

			get_template_part( 'partials/content', 'archive-jobs' );
		}

		/*
		 * Empty cards used only to maintain the four-column layout.
		 */
		if ( 1 === $query->post_count ) {
			echo '<div class="job-post job-post--placeholder" aria-hidden="true"></div>';
			echo '<div class="job-post job-post--placeholder" aria-hidden="true"></div>';
		} elseif ( 2 === $query->post_count ) {
			echo '<div class="job-post job-post--placeholder" aria-hidden="true"></div>';
		}
	} else {
		printf(
			'<div class="heading-4 center-align">%s</div>',
			html_entity_decode( $no_jobs_message )
		);
	}

	wp_reset_postdata();

	wp_send_json_success(
		[
			'html'        => ob_get_clean(),
			'max_page'    => (int) $query->max_num_pages,
			'found_posts' => (int) $query->found_posts,
		]
	);
}
}

new WP_Theme_Ajax();








