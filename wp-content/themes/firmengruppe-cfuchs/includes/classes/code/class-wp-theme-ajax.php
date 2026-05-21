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

		$page     = isset($_POST['page']) ? absint($_POST['page']) : 1;
		$search   = sanitize_text_field($_POST['search'] ?? '');
		$category = sanitize_text_field($_POST['category'] ?? '');
		$region   = sanitize_text_field($_POST['region'] ?? '');
		$status   = sanitize_text_field($_POST['status'] ?? '');

		$args = [
			'post_type'      => 'job',
			'posts_per_page' => 8,
			'paged'          => $page,
		];

		// 🔑 empty ?s= should show ALL jobs
		if ( $search !== '' ) {
			$args['s'] = $search;
		}

		$tax_query = [ 'relation' => 'AND' ];

		if ( $category ) {
			$tax_query[] = [
				'taxonomy' => 'job-category',
				'field'    => 'slug',
				'terms'    => $category,
			];
		}

		if ( $region ) {
			$tax_query[] = [
				'taxonomy' => 'job-region',
				'field'    => 'slug',
				'terms'    => $region,
			];
		}

		if ( $status ) {
			$tax_query[] = [
				'taxonomy' => 'job-status',
				'field'    => 'slug',
				'terms'    => $status,
			];
		}

		if ( count( $tax_query ) > 1 ) {
			$args['tax_query'] = $tax_query;
		}

		$query = new \WP_Query( $args );

		ob_start();

		$no_jobs_message = sanitize_text_field(
			$_POST['no_jobs_message'] ?? 'No Jobs Found.'
		);

		if ( $query->have_posts() ) {


			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'partials/content', 'archive-jobs' );
			}
			if($query->post_count == 1 ){
				echo '<div class="job-post"></div> <div class="job-post"></div>';
			} else if($query->post_count == 2 ){
				echo '<div class="job-post"></div>';
			}

		} else {

			echo '<div class="heading-4 center-align">' . html_entity_decode( $no_jobs_message ) . '</div>';
		}

		wp_reset_postdata();

		wp_send_json_success([
			'html'     => ob_get_clean(),
			'max_page' => $query->max_num_pages,
		]);

		wp_die();
	}
}

new WP_Theme_Ajax();








