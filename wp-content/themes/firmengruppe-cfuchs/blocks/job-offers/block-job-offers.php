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


		?>
<section class="ctn-full-width">
			<div class="wrapper">
				<form id="filter" class="filter__form listings__form" action="/projects">

					<div class="filter-search" action="/projects">
						<div class="filter-search__inner">
							<label class="filter-search__label" for="s">
								<svg class="svg-inline--fa fa-magnifying-glass filter-search__icon" aria-hidden="true"
									focusable="false" data-prefix="fal" data-icon="magnifying-glass" role="img"
									xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
									<path fill="currentColor"
										d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z">
									</path>
								</svg>
							</label>
							<input class="filter-search__input" type="search" id="s" name="s"
								placeholder="Search for jobs..." value="">
							<button
								class="filter-search__button filter-search__button--clear filter-search__button--hidden"
								type="button" aria-label="clear input"
								onclick="Array.from(document.querySelectorAll('input[name=s]')).forEach(function(input){input.value = '';});document.getElementById('filter')?.submit();">
								<svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false"
									data-prefix="fal" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg"
									viewBox="0 0 384 512" data-fa-i2svg="">
									<path fill="currentColor"
										d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.6 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z">
									</path>
								</svg>
							</button>
							<button class="filter-search__submit filter-search__button filter-search__button--submit"
								type="submit" aria-label="submit">
								<svg class="svg-inline--fa fa-arrow-right" aria-hidden="true" focusable="false"
									data-prefix="fal" data-icon="arrow-right" role="img"
									xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
									<path fill="currentColor"
										d="M443.3 267.3c6.2-6.2 6.2-16.4 0-22.6l-176-176c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L393.4 240 16 240c-8.8 0-16 7.2-16 16s7.2 16 16 16l377.4 0L244.7 420.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l176-176z">
									</path>
								</svg>
							</button>
						</div>
					</div>
					<div class="filter" data-count="3" data-taxonomies="market,region,project-status">
						<input type="hidden" name="paged" value="1">
						<div class="filter__inner filter__inner--tags">

							<div class="filter__col">

								<div class="filter__header">
									<h3 class="filter__heading">Markets</h3>
								</div>


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
											<li class="pill select-dropdown__checkbox select-sort-item categories-select-item active"
												data-value="">
												<div class="select-inner-title">Clear</div>
											</li>

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

								<div class="filter__header">
									<h3 class="filter__heading">Regions</h3>
								</div>


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
												<li class="pill select-dropdown__checkbox select-sort-item regions-select-item active"
													data-value="">
													<div class="select-inner-title">Clear Regions</div>
												</li>

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

								<div class="filter__header">
									<h3 class="filter__heading">Status</h3>
								</div>


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
											<li class="pill select-dropdown__checkbox select-sort-item status-select-item active"
												data-value="">
												<div class="select-inner-title">Clear Status</div>
											</li>

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

