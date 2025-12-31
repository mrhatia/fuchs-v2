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

								<div class="filter__selects">
									<select class="filter__select" name="filter[market]">
										<option value="">Filter By Markets</option>
										<option value="19">
											Energy </option>
										<option value="16">
											Environmental Cleanup </option>
										<option value="31">
											Manufacturing &amp; Technology </option>
										<option value="32">
											Mining &amp; Critical Minerals </option>
										<option value="18">
											National Defense &amp; Security </option>
										<option value="30">
											Nuclear Power </option>
										<option value="15">
											Infrastructure </option>
										<option value="20">
											Renewables </option>
									</select>
								</div>

								<div class="filter__pills">
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="19">
										<svg class="svg-inline--fa fa-bolt pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="bolt" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288l111.5 0L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7l-111.5 0L349.4 44.6z">
											</path>
										</svg>
										<span class="pill__text">Energy</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="16">
										<svg class="svg-inline--fa fa-leaf pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="leaf" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M272 96c-78.6 0-145.1 51.5-167.7 122.5c33.6-17 71.5-26.5 111.7-26.5l88 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0-72 0s0 0 0 0c-16.6 0-32.7 1.9-48.3 5.4c-25.9 5.9-49.9 16.4-71.4 30.7c0 0 0 0 0 0C38.3 298.8 0 364.9 0 440l0 16c0 13.3 10.7 24 24 24s24-10.7 24-24l0-16c0-48.7 20.7-92.5 53.8-123.2C121.6 392.3 190.3 448 272 448l1 0c132.1-.7 239-130.9 239-291.4c0-42.6-7.5-83.1-21.1-119.6c-2.6-6.9-12.7-6.6-16.2-.1C455.9 72.1 418.7 96 376 96L272 96z">
											</path>
										</svg>
										<span class="pill__text">Environmental Cleanup</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="31">
										<svg class="svg-inline--fa fa-gear pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="gear" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z">
											</path>
										</svg>
										<span class="pill__text">Manufacturing &amp; Technology</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="32">
										<svg class="svg-inline--fa fa-pickaxe pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="pickaxe" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M462.4 373.5s0 0 0 0l-.1-.2-.3-.8c-.3-.7-.7-1.8-1.3-3.3c-1.2-2.9-3-7.2-5.5-12.7c-5-11-12.6-26.7-23.1-45.3c-21-37.3-53.6-86-99.5-132s-94.7-78.5-132-99.5c-18.6-10.5-34.3-18.1-45.3-23.1c-5.5-2.5-9.8-4.3-12.7-5.5c-1.4-.6-2.5-1-3.3-1.3l-.8-.3-.2-.1s0 0 0 0s0 0 0 0c-6.2-2.3-10.4-8.2-10.5-14.8s3.9-12.6 10-15.1C169.5 7 204 0 240 0c59.6 0 114.7 19.2 159.5 51.6l9.4-9.8c6-6.2 14.2-9.7 22.8-9.8s16.9 3.3 22.9 9.4l16 16c6.1 6.1 9.5 14.3 9.4 22.9s-3.6 16.8-9.8 22.8l-9.8 9.4C492.8 157.3 512 212.4 512 272c0 36-7 70.5-19.8 102c-2.5 6.1-8.5 10.1-15.1 10s-12.5-4.3-14.8-10.5c0 0 0 0 0 0zM9.4 502.6C-3 490.3-3.1 470.4 8.9 457.8l272-282.9c9.7 8.4 19.5 17.4 29.1 27s18.6 19.4 27 29.1L54.2 503.1c-12.6 12.1-32.5 11.9-44.8-.4z">
											</path>
										</svg>
										<span class="pill__text">Mining &amp; Critical Minerals</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="18">
										<svg class="svg-inline--fa fa-shield-halved pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="shield-halved" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z">
											</path>
										</svg>
										<span class="pill__text">National Defense &amp; Security</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="30">
										<svg class="svg-inline--fa fa-atom pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="atom" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M256 398.8c-11.8 5.1-23.4 9.7-34.9 13.5c16.7 33.8 31 35.7 34.9 35.7s18.1-1.9 34.9-35.7c-11.4-3.9-23.1-8.4-34.9-13.5zM446 256c33 45.2 44.3 90.9 23.6 128c-20.2 36.3-62.5 49.3-115.2 43.2c-22 52.1-55.6 84.8-98.4 84.8s-76.4-32.7-98.4-84.8c-52.7 6.1-95-6.8-115.2-43.2C21.7 346.9 33 301.2 66 256c-33-45.2-44.3-90.9-23.6-128c20.2-36.3 62.5-49.3 115.2-43.2C179.6 32.7 213.2 0 256 0s76.4 32.7 98.4 84.8c52.7-6.1 95 6.8 115.2 43.2c20.7 37.1 9.4 82.8-23.6 128zm-65.8 67.4c-1.7 14.2-3.9 28-6.7 41.2c31.8 1.4 38.6-8.7 40.2-11.7c2.3-4.2 7-17.9-11.9-48.1c-6.8 6.3-14 12.5-21.6 18.6zm-6.7-175.9c2.8 13.1 5 26.9 6.7 41.2c7.6 6.1 14.8 12.3 21.6 18.6c18.9-30.2 14.2-44 11.9-48.1c-1.6-2.9-8.4-13-40.2-11.7zM290.9 99.7C274.1 65.9 259.9 64 256 64s-18.1 1.9-34.9 35.7c11.4 3.9 23.1 8.4 34.9 13.5c11.8-5.1 23.4-9.7 34.9-13.5zm-159 88.9c1.7-14.3 3.9-28 6.7-41.2c-31.8-1.4-38.6 8.7-40.2 11.7c-2.3 4.2-7 17.9 11.9 48.1c6.8-6.3 14-12.5 21.6-18.6zM110.2 304.8C91.4 335 96 348.7 98.3 352.9c1.6 2.9 8.4 13 40.2 11.7c-2.8-13.1-5-26.9-6.7-41.2c-7.6-6.1-14.8-12.3-21.6-18.6zM336 256a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zm-80-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
											</path>
										</svg>
										<span class="pill__text">Nuclear Power</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="15">
										<svg class="svg-inline--fa fa-bridge pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="bridge" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l40 0 0 64L0 160 0 288c53 0 96 43 96 96l0 64c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-64c0-53 43-96 96-96s96 43 96 96l0 64c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-64c0-53 43-96 96-96l0-128-72 0 0-64 40 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 32zM456 96l0 64-80 0 0-64 80 0zM328 96l0 64-80 0 0-64 80 0zM200 96l0 64-80 0 0-64 80 0z">
											</path>
										</svg>
										<span class="pill__text">Infrastructure</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[market]" value="20">
										<svg class="svg-inline--fa fa-recycle pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="recycle" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M174.7 45.1C192.2 17 223 0 256 0s63.8 17 81.3 45.1l38.6 61.7 27-15.6c8.4-4.9 18.9-4.2 26.6 1.7s11.1 15.9 8.6 25.3l-23.4 87.4c-3.4 12.8-16.6 20.4-29.4 17l-87.4-23.4c-9.4-2.5-16.3-10.4-17.6-20s3.4-19.1 11.8-23.9l28.4-16.4L283 79c-5.8-9.3-16-15-27-15s-21.2 5.7-27 15l-17.5 28c-9.2 14.8-28.6 19.5-43.6 10.5c-15.3-9.2-20.2-29.2-10.7-44.4l17.5-28zM429.5 251.9c15-9 34.4-4.3 43.6 10.5l24.4 39.1c9.4 15.1 14.4 32.4 14.6 50.2c.3 53.1-42.7 96.4-95.8 96.4L320 448l0 32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 32 96.2 0c17.6 0 31.9-14.4 31.8-32c0-5.9-1.7-11.7-4.8-16.7l-24.4-39.1c-9.5-15.2-4.7-35.2 10.7-44.4zm-364.6-31L36 204.2c-8.4-4.9-13.1-14.3-11.8-23.9s8.2-17.5 17.6-20l87.4-23.4c12.8-3.4 26 4.2 29.4 17L182 241.2c2.5 9.4-.9 19.3-8.6 25.3s-18.2 6.6-26.6 1.7l-26.5-15.3L68.8 335.3c-3.1 5-4.8 10.8-4.8 16.7c-.1 17.6 14.2 32 31.8 32l32.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32.2 0C42.7 448-.3 404.8 0 351.6c.1-17.8 5.1-35.1 14.6-50.2l50.3-80.5z">
											</path>
										</svg>
										<span class="pill__text">Renewables</span>
									</label>
								</div>
							</div>

							<div class="filter__col">

								<div class="filter__header">
									<h3 class="filter__heading">Regions</h3>
								</div>

								<div class="filter__selects">
									<select class="filter__select" name="filter[region]">
										<option value="">Filter By Regions</option>
										<option value="22">
											United States </option>
										<option value="21">
											United Kingdom </option>
										<option value="26">
											Canada </option>
										<option value="24">
											Middle East </option>
										<option value="27">
											Australia </option>
										<option value="29">
											Asia </option>
										<option value="23">
											Latin America </option>
										<option value="25">
											Europe </option>
										<option value="28">
											Africa </option>
									</select>
								</div>

								<div class="filter__pills">
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="22">
										<svg class="svg-inline--fa fa-earth-americas pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-americas" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5l0 39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9l0 39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7l0-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1L257 256c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-americas"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">United States</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="21">
										<svg class="svg-inline--fa fa-earth-europe pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-europe" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M266.3 48.3L232.5 73.6c-5.4 4-8.5 10.4-8.5 17.1l0 9.1c0 6.8 5.5 12.3 12.3 12.3c2.4 0 4.8-.7 6.8-2.1l41.8-27.9c2-1.3 4.4-2.1 6.8-2.1l1 0c6.2 0 11.3 5.1 11.3 11.3c0 3-1.2 5.9-3.3 8l-19.9 19.9c-5.8 5.8-12.9 10.2-20.7 12.8l-26.5 8.8c-5.8 1.9-9.6 7.3-9.6 13.4c0 3.7-1.5 7.3-4.1 10l-17.9 17.9c-6.4 6.4-9.9 15-9.9 24l0 4.3c0 16.4 13.6 29.7 29.9 29.7c11 0 21.2-6.2 26.1-16l4-8.1c2.4-4.8 7.4-7.9 12.8-7.9c4.5 0 8.7 2.1 11.4 5.7l16.3 21.7c2.1 2.9 5.5 4.5 9.1 4.5c8.4 0 13.9-8.9 10.1-16.4l-1.1-2.3c-3.5-7 0-15.5 7.5-18l21.2-7.1c7.6-2.5 12.7-9.6 12.7-17.6c0-10.3 8.3-18.6 18.6-18.6l29.4 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-20.7 0c-7.2 0-14.2 2.9-19.3 8l-4.7 4.7c-2.1 2.1-3.3 5-3.3 8c0 6.2 5.1 11.3 11.3 11.3l11.3 0c6 0 11.8 2.4 16 6.6l6.5 6.5c1.8 1.8 2.8 4.3 2.8 6.8s-1 5-2.8 6.8l-7.5 7.5C386 262 384 266.9 384 272s2 10 5.7 13.7L408 304c10.2 10.2 24.1 16 38.6 16l7.3 0c6.5-20.2 10-41.7 10-64c0-111.4-87.6-202.4-197.7-207.7zm172 307.9c-3.7-2.6-8.2-4.1-13-4.1c-6 0-11.8-2.4-16-6.6L396 332c-7.7-7.7-18-12-28.9-12c-9.7 0-19.2-3.5-26.6-9.8L314 287.4c-11.6-9.9-26.4-15.4-41.7-15.4l-20.9 0c-12.6 0-25 3.7-35.5 10.7L188.5 301c-17.8 11.9-28.5 31.9-28.5 53.3l0 3.2c0 17 6.7 33.3 18.7 45.3l16 16c8.5 8.5 20 13.3 32 13.3l21.3 0c13.3 0 24 10.7 24 24c0 2.5 .4 5 1.1 7.3c71.3-5.8 132.5-47.6 165.2-107.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM187.3 100.7c-6.2-6.2-16.4-6.2-22.6 0l-32 32c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l32-32c6.2-6.2 6.2-16.4 0-22.6z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-europe"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">United Kingdom</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="26">
										<svg class="svg-inline--fa fa-earth-americas pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-americas" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5l0 39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9l0 39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7l0-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1L257 256c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-americas"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Canada</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="24">
										<svg class="svg-inline--fa fa-earth-africa pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-africa" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M177.8 63.2l10 17.4c2.8 4.8 4.2 10.3 4.2 15.9l0 41.4c0 3.9 1.6 7.7 4.3 10.4c6.2 6.2 16.5 5.7 22-1.2l13.6-17c4.7-5.9 12.9-7.7 19.6-4.3l15.2 7.6c3.4 1.7 7.2 2.6 11 2.6c6.5 0 12.8-2.6 17.4-7.2l3.9-3.9c2.9-2.9 7.3-3.6 11-1.8l29.2 14.6c7.8 3.9 12.6 11.8 12.6 20.5c0 10.5-7.1 19.6-17.3 22.2l-35.4 8.8c-7.4 1.8-15.1 1.5-22.4-.9l-32-10.7c-3.3-1.1-6.7-1.7-10.2-1.7c-7 0-13.8 2.3-19.4 6.5L176 212c-10.1 7.6-16 19.4-16 32l0 28c0 26.5 21.5 48 48 48l32 0c8.8 0 16 7.2 16 16l0 48c0 17.7 14.3 32 32 32c10.1 0 19.6-4.7 25.6-12.8l25.6-34.1c8.3-11.1 12.8-24.6 12.8-38.4l0-12.1c0-3.9 2.6-7.3 6.4-8.2l5.3-1.3c11.9-3 20.3-13.7 20.3-26c0-7.1-2.8-13.9-7.8-18.9l-33.5-33.5c-3.7-3.7-3.7-9.7 0-13.4c5.7-5.7 14.1-7.7 21.8-5.1l14.1 4.7c12.3 4.1 25.7-1.5 31.5-13c3.5-7 11.2-10.8 18.9-9.2l27.4 5.5C432 112.4 351.5 48 256 48c-27.7 0-54 5.4-78.2 15.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-africa"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Middle East</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="27">
										<svg class="svg-inline--fa fa-earth-oceania pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-oceania" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM208.6 357.3l-39-13.5c-6.5-2.2-13.6-2.3-20.1-.3l-15.3 4.9c-18.5 5.9-38.5-2.4-47.5-19.5l-3.3-6.2c-10.6-20.1-2.3-45 18.2-54.7l35.3-16.8c2.3-1.1 4.4-2.8 5.9-4.8l5.3-7c7.2-9.6 18.6-15.3 30.6-15.3s23.4 5.7 30.6 15.3l4.6 6.1c2 2.6 4.9 4.5 8.1 5.1c7.8 1.6 15.7-1.5 20.4-7.9l10.4-14.2c2-2.8 5.3-4.4 8.7-4.4c4.4 0 8.4 2.7 10 6.8l10.1 25.9c2.8 7.2 6.7 14 11.5 20.2L311 299.8c5.8 7.4 9 16.6 9 26s-3.2 18.6-9 26L299 367.2c-8.3 10.6-21 16.8-34.4 16.8c-8.4 0-16.6-2.4-23.7-7l-25.4-16.4c-2.2-1.4-4.5-2.5-6.9-3.4zm65.2-214.8L296 164.7c10.1 10.1 2.9 27.3-11.3 27.3l-29.9 0c-5.6 0-11.1-1.2-16.2-3.4l-42.8-19c-14.3-6.3-11.9-27.3 3.4-30.3l38.5-7.7c13.1-2.6 26.7 1.5 36.1 10.9zM248 432c0-8.8 7.2-16 16-16l16 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16zM431.2 298.9l8 24c2.8 8.4-1.7 17.4-10.1 20.2s-17.4-1.7-20.2-10.1l-8-24c-2.8-8.4 1.7-17.4 10.1-20.2s17.4 1.7 20.2 10.1zm-19.9 80.4l-32 32c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l32-32c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-oceania"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Australia</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="29">
										<svg class="svg-inline--fa fa-earth-asia pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-asia" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M51.7 295.1l31.7 6.3c7.9 1.6 16-.9 21.7-6.6l15.4-15.4c11.6-11.6 31.1-8.4 38.4 6.2l9.3 18.5c4.8 9.6 14.6 15.7 25.4 15.7c15.2 0 26.1-14.6 21.7-29.2l-6-19.9c-4.6-15.4 6.9-30.9 23-30.9l2.3 0c13.4 0 25.9-6.7 33.3-17.8l10.7-16.1c5.6-8.5 5.3-19.6-.8-27.7l-16.1-21.5c-10.3-13.7-3.3-33.5 13.4-37.7l17-4.3c7.5-1.9 13.6-7.2 16.5-14.4l16.4-40.9C303.4 52.1 280.2 48 256 48C141.1 48 48 141.1 48 256c0 13.4 1.3 26.5 3.7 39.1zm407.7 4.6c-3-.3-6-.1-9 .8l-15.8 4.4c-6.7 1.9-13.8-.9-17.5-6.7l-2-3.1c-6-9.4-16.4-15.1-27.6-15.1s-21.6 5.7-27.6 15.1l-6.1 9.5c-1.4 2.2-3.4 4.1-5.7 5.3L312 330.1c-18.1 10.1-25.5 32.4-17 51.3l5.5 12.4c8.6 19.2 30.7 28.5 50.5 21.1l2.6-1c10-3.7 21.3-2.2 29.9 4.1l1.5 1.1c37.2-29.5 64.1-71.4 74.4-119.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm144.5 92.1c-2.1 8.6 3.1 17.3 11.6 19.4l32 8c8.6 2.1 17.3-3.1 19.4-11.6s-3.1-17.3-11.6-19.4l-32-8c-8.6-2.1-17.3 3.1-19.4 11.6zm92-20c-2.1 8.6 3.1 17.3 11.6 19.4s17.3-3.1 19.4-11.6l8-32c2.1-8.6-3.1-17.3-11.6-19.4s-17.3 3.1-19.4 11.6l-8 32zM343.2 113.7c-7.9-4-17.5-.7-21.5 7.2l-16 32c-4 7.9-.7 17.5 7.2 21.5s17.5 .7 21.5-7.2l16-32c4-7.9 .7-17.5-7.2-21.5z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-asia"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Asia</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="23">
										<svg class="svg-inline--fa fa-earth-americas pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-americas" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5l0 39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9l0 39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7l0-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1L257 256c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-americas"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Latin America</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="25">
										<svg class="svg-inline--fa fa-earth-europe pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-europe" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M266.3 48.3L232.5 73.6c-5.4 4-8.5 10.4-8.5 17.1l0 9.1c0 6.8 5.5 12.3 12.3 12.3c2.4 0 4.8-.7 6.8-2.1l41.8-27.9c2-1.3 4.4-2.1 6.8-2.1l1 0c6.2 0 11.3 5.1 11.3 11.3c0 3-1.2 5.9-3.3 8l-19.9 19.9c-5.8 5.8-12.9 10.2-20.7 12.8l-26.5 8.8c-5.8 1.9-9.6 7.3-9.6 13.4c0 3.7-1.5 7.3-4.1 10l-17.9 17.9c-6.4 6.4-9.9 15-9.9 24l0 4.3c0 16.4 13.6 29.7 29.9 29.7c11 0 21.2-6.2 26.1-16l4-8.1c2.4-4.8 7.4-7.9 12.8-7.9c4.5 0 8.7 2.1 11.4 5.7l16.3 21.7c2.1 2.9 5.5 4.5 9.1 4.5c8.4 0 13.9-8.9 10.1-16.4l-1.1-2.3c-3.5-7 0-15.5 7.5-18l21.2-7.1c7.6-2.5 12.7-9.6 12.7-17.6c0-10.3 8.3-18.6 18.6-18.6l29.4 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-20.7 0c-7.2 0-14.2 2.9-19.3 8l-4.7 4.7c-2.1 2.1-3.3 5-3.3 8c0 6.2 5.1 11.3 11.3 11.3l11.3 0c6 0 11.8 2.4 16 6.6l6.5 6.5c1.8 1.8 2.8 4.3 2.8 6.8s-1 5-2.8 6.8l-7.5 7.5C386 262 384 266.9 384 272s2 10 5.7 13.7L408 304c10.2 10.2 24.1 16 38.6 16l7.3 0c6.5-20.2 10-41.7 10-64c0-111.4-87.6-202.4-197.7-207.7zm172 307.9c-3.7-2.6-8.2-4.1-13-4.1c-6 0-11.8-2.4-16-6.6L396 332c-7.7-7.7-18-12-28.9-12c-9.7 0-19.2-3.5-26.6-9.8L314 287.4c-11.6-9.9-26.4-15.4-41.7-15.4l-20.9 0c-12.6 0-25 3.7-35.5 10.7L188.5 301c-17.8 11.9-28.5 31.9-28.5 53.3l0 3.2c0 17 6.7 33.3 18.7 45.3l16 16c8.5 8.5 20 13.3 32 13.3l21.3 0c13.3 0 24 10.7 24 24c0 2.5 .4 5 1.1 7.3c71.3-5.8 132.5-47.6 165.2-107.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM187.3 100.7c-6.2-6.2-16.4-6.2-22.6 0l-32 32c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l32-32c6.2-6.2 6.2-16.4 0-22.6z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-europe"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Europe</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[region]" value="28">
										<svg class="svg-inline--fa fa-earth-africa pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="earth-africa" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M177.8 63.2l10 17.4c2.8 4.8 4.2 10.3 4.2 15.9l0 41.4c0 3.9 1.6 7.7 4.3 10.4c6.2 6.2 16.5 5.7 22-1.2l13.6-17c4.7-5.9 12.9-7.7 19.6-4.3l15.2 7.6c3.4 1.7 7.2 2.6 11 2.6c6.5 0 12.8-2.6 17.4-7.2l3.9-3.9c2.9-2.9 7.3-3.6 11-1.8l29.2 14.6c7.8 3.9 12.6 11.8 12.6 20.5c0 10.5-7.1 19.6-17.3 22.2l-35.4 8.8c-7.4 1.8-15.1 1.5-22.4-.9l-32-10.7c-3.3-1.1-6.7-1.7-10.2-1.7c-7 0-13.8 2.3-19.4 6.5L176 212c-10.1 7.6-16 19.4-16 32l0 28c0 26.5 21.5 48 48 48l32 0c8.8 0 16 7.2 16 16l0 48c0 17.7 14.3 32 32 32c10.1 0 19.6-4.7 25.6-12.8l25.6-34.1c8.3-11.1 12.8-24.6 12.8-38.4l0-12.1c0-3.9 2.6-7.3 6.4-8.2l5.3-1.3c11.9-3 20.3-13.7 20.3-26c0-7.1-2.8-13.9-7.8-18.9l-33.5-33.5c-3.7-3.7-3.7-9.7 0-13.4c5.7-5.7 14.1-7.7 21.8-5.1l14.1 4.7c12.3 4.1 25.7-1.5 31.5-13c3.5-7 11.2-10.8 18.9-9.2l27.4 5.5C432 112.4 351.5 48 256 48c-27.7 0-54 5.4-78.2 15.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-earth-africa"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Africa</span>
									</label>
								</div>
							</div>

							<div class="filter__col">

								<div class="filter__header">
									<h3 class="filter__heading">Status</h3>
								</div>

								<div class="filter__selects">
									<select class="filter__select" name="filter[project-status]">
										<option value="">Filter By Status</option>
										<option value="14">
											Active </option>
										<option value="13">
											Completed </option>
									</select>
								</div>

								<div class="filter__pills">
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[project-status]"
											value="14">
										<svg class="svg-inline--fa fa-helmet-safety pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="helmet-safety" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M256 32c-17.7 0-32 14.3-32 32l0 2.3 0 99.6c0 5.6-4.5 10.1-10.1 10.1c-3.6 0-7-1.9-8.8-5.1L157.1 87C83 123.5 32 199.8 32 288l0 64 512 0 0-66.4c-.9-87.2-51.7-162.4-125.1-198.6l-48 83.9c-1.8 3.2-5.2 5.1-8.8 5.1c-5.6 0-10.1-4.5-10.1-10.1l0-99.6 0-2.3c0-17.7-14.3-32-32-32l-64 0zM16.6 384C7.4 384 0 391.4 0 400.6c0 4.7 2 9.2 5.8 11.9C27.5 428.4 111.8 480 288 480s260.5-51.6 282.2-67.5c3.8-2.8 5.8-7.2 5.8-11.9c0-9.2-7.4-16.6-16.6-16.6L16.6 384z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-helmet-safety"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Active</span>
									</label>
									<label class="pill pill--radio">
										<input class="pill__radio" type="radio" name="filter[project-status]"
											value="13">
										<svg class="svg-inline--fa fa-check pill__icon" aria-hidden="true"
											focusable="false" data-prefix="fas" data-icon="check" role="img"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
											<path fill="currentColor"
												d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
											</path>
										</svg><!-- <i class="pill__icon fas fa-check"></i> Font Awesome fontawesome.com -->
										<span class="pill__text">Completed</span>
									</label>
								</div>
							</div>
						</div>
					</div>

				</form>

			</div>
		</section>

		<?php
				get_template_part( 'partials/content', 'page' );
		?>
	</section>



<?php
get_footer();
