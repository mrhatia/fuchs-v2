<?php
/**
 * Block Name: Job Offers
 *
 * The template for displaying the custom gutenberg block named Job Offers.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		// Block variables.

		$cat_column_one_option     = $bst_block_fields['fh_var_thr_column_one_option'] ?? null;
		$cat_column_two_option     = $bst_block_fields['fh_var_thr_column_two_option'] ?? null;
		$cat_column_three_option     = $bst_block_fields['fh_var_thr_column_three_option'] ?? null;
		?>

		<section class="ctn-full-width">
			<div class="wrapper">
				<form id="filter" class="filter__form listings__form" action="/projects">
					<div class="filter" data-count="3" data-taxonomies="market,region,project-status">
						<input type="hidden" name="paged" value="1">
						<div class="filter__inner filter__inner--tags">

							<div class="filter__col">


								<?php if($cat_column_one_option['title']){ ?>
									<div class="filter__header">
										<h3 class="filter__heading"><?php echo html_entity_decode($cat_column_one_option['title']); ?></h3>
									</div>
								<?php } ?>


								<div class="select-dropdown select-type" id="dropdown-categories-select" data-design="select"
										data-type="categories">

									<ul role="list" class="filter__pills select-dropdown-list select-list categories-select-dd-menus">

										<?php
										$terms = get_terms(
											array(
												'taxonomy'   => 'job-category',
												'hide_empty' => true, // Set to true to hide empty terms.
											)
										);
										if ( $terms ) {
											?>
											<?php if($cat_column_one_option['clear_button_label']){ ?>
												<li class="pill select-dropdown__checkbox select-sort-item categories-select-item active"
													data-value="">
													<div class="select-inner-title"><?php echo html_entity_decode($cat_column_one_option['clear_button_label']); ?></div>
												</li>
											<?php } ?>

												<?php
												foreach ( $terms as $key => $term ) {
													?>
														<li role="listitem" tabindex="0"
															class="pill select-dropdown__checkbox select-sort-item categories-select-item"
															data-label="Item one" data-value="<?php echo esc_html( $term->slug ); ?>" data-type="categories">
															<div class="select-inner-title"> <?php echo esc_html( $term->name ); ?></div>
														</li>
														<?php
												}
												?>
											<?php
										}
										?>
									</ul>
								</div>
							</div>
							<div class="filter__col">


								<?php if($cat_column_two_option['title']){ ?>
									<div class="filter__header">
										<h3 class="filter__heading"><?php echo html_entity_decode($cat_column_two_option['title']); ?></h3>
									</div>
								<?php } ?>


								<div class="select-dropdown select-type" id="dropdown-regions-select" data-design="select"
										data-type="regions">

									<ul role="list" class="filter__pills select-dropdown-list select-list regions-select-dd-menus">

										<?php
										$terms = get_terms(
											array(
												'taxonomy'   => 'job-region',
												'hide_empty' => true, // Set to true to hide empty terms.
											)
										);
										if ( $terms ) {
											?>
												<?php if($cat_column_two_option['clear_button_label']){ ?>
													<li class="pill select-dropdown__checkbox select-sort-item regions-select-item active"
														data-value="">
														<div class="select-inner-title"><?php echo html_entity_decode($cat_column_two_option['clear_button_label']); ?></div>
													</li>
												<?php } ?>

												<?php
												foreach ( $terms as $key => $term ) {
													?>
														<li role="listitem" tabindex="0"
															class="pill select-dropdown__checkbox select-sort-item regions-select-item"
															data-label="Item one" data-value="<?php echo esc_html( $term->slug ); ?>" data-type="regions">
															<div class="select-inner-title"> <?php echo esc_html( $term->name ); ?></div>
														</li>
														<?php
												}
												?>
											<?php
										}
										?>
									</ul>
								</div>
							</div>
							<div class="filter__col">
								<?php if($cat_column_three_option['title']){ ?>
									<div class="filter__header">
										<h3 class="filter__heading"><?php echo html_entity_decode($cat_column_three_option['title']); ?></h3>
									</div>
								<?php } ?>


								<div class="select-dropdown select-type" id="dropdown-status-select" data-design="select"
										data-type="status">

									<ul role="list" class="filter__pills select-dropdown-list select-list status-select-dd-menus">

										<?php
										$terms = get_terms(
											array(
												'taxonomy'   => 'job-status',
												'hide_empty' => true, // Set to true to hide empty terms.
											)
										);
										if ( $terms ) {
											?>
											<?php if($cat_column_three_option['clear_button_label']){ ?>
												<li class="pill select-dropdown__checkbox select-sort-item status-select-item active"
													data-value="">
													<div class="select-inner-title"><?php echo html_entity_decode($cat_column_three_option['clear_button_label']); ?></div>
												</li>
											<?php } ?>

												<?php
												foreach ( $terms as $key => $term ) {
													?>
														<li role="listitem" tabindex="0"
															class="pill select-dropdown__checkbox select-sort-item status-select-item"
															data-label="Item one" data-value="<?php echo esc_html( $term->slug ); ?>" data-type="status">
															<div class="select-inner-title"> <?php echo esc_html( $term->name ); ?></div>
														</li>
														<?php
												}
												?>
											<?php
										}
										?>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
		</section>

		<div class="gl-s72"></div>
		<section id="job-posts-container" class="page-section">
			<!-- Content Start -->
			<?php
			// WP_Query for initial load (12 posts)
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;

			$args = array(
				'post_type'      => 'job',
				'posts_per_page' => 8,
				'paged'          => $paged,
			);

			$bst_query = new WP_Query($args);
			?>

			<div class="wrapper">
				<div class="images-items four-columns" id="jobs-container">
					<?php
					if ($bst_query->have_posts()) :
						while ($bst_query->have_posts()) :
							$bst_query->the_post();
							get_template_part('partials/content', 'archive-jobs');
						endwhile;
					else :
						echo '<p>No jobs found.</p>';
					endif;
					?>
				</div>
			</div>

			<?php wp_reset_postdata(); ?>

			<?php if ($bst_query->found_posts > 9) : ?>
				<div class="load-more load-more-button d-flex justify-content-center">
					<a href="#" class="button white-button" id="load-more-jobs" data-page="1">Mehr</a>
				</div>
			<?php endif; ?>
		</section>


		<?php
	}
);

