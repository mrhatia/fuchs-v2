<?php
/**
 * Template Name: References
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



$fh_var_tho_slides     = $bst_fields['fh_var_tho_slides'] ?? null;

	$slide_count = count( $fh_var_tho_slides );
$slider_class = ( $slide_count <= 1 ) ? 'slider-disable' : '';

?>

	<section id="page-section" class="page-section">
	<!-- Content Start -->
		<?php if($fh_var_tho_slides){ ?>
			<section class="ctn-full-width">
				<div class="wrapper">
					<div class="hero-inner-slider <?php echo $slider_class; ?>">
						<?php
							foreach ( $fh_var_tho_slides as $slide ) {
								$background_text = $slide['background_text'] ?? null;
								$slide_kicker      = $slide['kicker'] ?? null;
								$slide_title   		= $slide['slide_title'] ?? null;
								$slide_text   = $slide['text'] ?? null;
								$slide_button_one = $slide['button_one'] ?? null;
								$slide_button_two = $slide['button_two'] ?? null;
								$slide_image       = $slide['image'] ?? null;

								?>
									<div class="hero-slide-item">
										<?php if ( $slide_image ) { ?>
											<div class="hero-slide-image" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $slide_image, 2000 ); ?>
											</div>
										<?php } ?>

										<div class="banner-content">
											<div class="banner-content-inner">

											<?php if ( $background_text ) {  ?>
												<div class="hero-split-text"><?php echo html_entity_decode( $background_text ); ?></div>
											<?php } ?>
											<?php if ( $slide_kicker ) {  ?>
												<div class="kicker hero-reveal"><?php echo html_entity_decode( $slide_kicker ); ?></div>
											<?php } ?>

											<?php if ( $slide_title ) {  ?>
												<h1 class="heading-2 hero-reveal"><?php echo html_entity_decode( $slide_title ); ?></h1>
											<?php } ?>

											<?php if ( $slide_text ) { ?>
												<div class="hero-reveal">
													<?php echo html_entity_decode( $slide_text ); ?>
												</div>
											<?php } ?>
											<?php if($slide_button_one || $slide_button_two){ ?>
												<div class="hero-buttons button-reveal">
													<?php if ( $slide_button_one ) { ?>
														<?php echo BaseTheme::button( $slide_button_one, 'button' ); ?>
													<?php } ?>
													<?php if ( $slide_button_two ) { ?>
														<?php echo BaseTheme::button( $slide_button_two, 'button gray-button' ); ?>
													<?php } ?>
												</div>
											<?php } ?>
										</div>
										</div>
									</div>
							<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>
		<!-- Breadcrumbs -->
		<section class="ctn-full-width">
			<div class="wrapper">
				<nav id="breadcrumbs" class="breadcrumbs">
					<div class="breadcrumbs__inner">
						<span class="breadcrumbs__item"><a href="https://www.bechtel.com">Home</a></span>
						<div class="breadcrumbs__separator">
							<svg xmlns="http://www.w3.org/2000/svg" width="7" height="13" viewBox="0 0 7 13"
								fill="none">
								<path d="M0.75 0.75L6.25 6.25L0.75 11.75" stroke="black" stroke-width="1.5"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div><span class="breadcrumbs__item"><a
								href="https://www.bechtel.com/projects/">Projects</a></span>
						<div class="breadcrumbs__separator">
							<svg xmlns="http://www.w3.org/2000/svg" width="7" height="13" viewBox="0 0 7 13"
								fill="none">
								<path d="M0.75 0.75L6.25 6.25L0.75 11.75" stroke="black" stroke-width="1.5"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div><span class="breadcrumbs__item breadcrumbs__item--current" aria-current="page">Sabine Pass
							Liquefaction
							Project</span>
					</div>
				</nav>
			</div>
		</section>

		<!-- Menu Links -->
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
								placeholder="Search for Projects..." value="">
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
												'taxonomy'   => 'reference-category',
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
												'taxonomy'   => 'region',
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
												'taxonomy'   => 'current-status',
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
		<section id="reference-posts-container" class="page-section hide-section">
			<!-- Content Start -->
			<?php
			// WP_Query for initial load (12 posts)
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;

			$args = array(
				'post_type'      => 'reference',
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
							get_template_part('partials/content', 'archive-overview');
						endwhile;
					else :
						echo '<p>No projects found.</p>';
					endif;
					?>
				</div>
			</div>

			<?php wp_reset_postdata(); ?>

			<?php if ($bst_query->found_posts > 9) : ?>
				<div class="load-more load-more-button d-flex justify-content-center">
					<a href="#" class="button white-button" id="load-more-reference" data-page="1">Mehr</a>
				</div>
		<div class="gl-s72"></div>

			<?php endif; ?>
		</section>
		<div id="reference-content-section">


			<!-- Seection Bottom -->
			<div class="wp-block-group alignfull is-style-rivets-outside center-align is-layout-constrained wp-block-group-is-layout-constrained">

				<h2 class="wp-block-heading has-text-align-center">Explore Our Projects</h2>



					<div class="wp-block-group is-style-default is-layout-constrained wp-block-group-is-layout-constrained">
					<p>Since 1898, Bechtel has helped customers complete more than 25,000 projects in 160 countries on all seven continents. And today, global demand for engineering and construction is accelerating at an astonishing pace. It is estimated that three-quarters of the infrastructure needed for 2050 has yet to be built, paving the way for the largest construction wave in history.&nbsp;</p>



					<p>Bechtel teams are meeting this moment.&nbsp;&nbsp;</p>



					<p>We have worked across a diverse set of markets delivering pragmatic solutions to tackle some of the world’s most complex challenges. Whether revitalizing chipmaking with advanced semiconductor manufacturing facilities, expanding transit systems and connecting communities, advancing renewable and nuclear energy, or securing critical mineral supply chains, our teams draw on our generations of knowledge to design and build resilient, sustainable infrastructure.&nbsp;</p>




					<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex justify-content-center">
						<div class="wp-block-button  is-style-arrow-right">
							<a class="button white-button" href="<?php echo get_permalink(); ?>?s=">View More Projects</a>
						</div>
					</div>
				</div>
			</div>

			<?php
					get_template_part( 'partials/content', 'page' );
			?>
		</div>
	</section>



<?php
get_footer();
