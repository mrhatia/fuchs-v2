<?php
/**
 * Template Name: Services
 * Template Post Type: page
 *
 * This template is for displaying resource page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

// Include header.
get_header();

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();

$bst_var_trcho_background_text          = $bst_fields['bst_var_trcho_background_text'] ?? null;
$bst_var_trcho_kicker          = $bst_fields['bst_var_trcho_kicker'] ?? null;
$bst_var_trcho_text          = $bst_fields['bst_var_trcho_text'] ?? null;
$bst_var_pagetitle          = $bst_fields['bst_var_trcho_title'] ?? get_the_title();
$bst_var_trcho_feature_post = $bst_fields['bst_var_trcho_feature_post'] ?? null;

?>

		<section id="page-section" class="page-section">
			<!-- Content Start -->
			<?php
			// WP_Query for initial load (12 posts)
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;

			$args = array(
				'post_type'      => 'service',
				'posts_per_page' => 9,
				'paged'          => $paged,
			);

			$bst_query = new WP_Query($args);
			?>

			<div class="wrapper">
				<div class="post-archive three-columns" id="reference-container">
					<?php
					if ($bst_query->have_posts()) :
						while ($bst_query->have_posts()) :
							$bst_query->the_post();
							get_template_part('partials/content', 'archive-service');
						endwhile;
					else :
						echo '<p>No References found.</p>';
					endif;
					?>
				</div>
			</div>

			<?php wp_reset_postdata(); ?>

			<?php if ($bst_query->found_posts > 9) : ?>
				<div class="gl-s96"></div>
				<div class="load-more d-flex justify-content-center">
					<a href="#" class="button green-button" id="load-more-reference" data-page="1">Mehr</a>
				</div>
			<?php endif; ?>
		</section>

		<div class="gl-s96"></div>

			<section id="page-section" class="page-section">
			<!-- Content Start -->
				<?php
						get_template_part( 'partials/content', 'page' );
				?>
			</section>



<?php
get_footer();
