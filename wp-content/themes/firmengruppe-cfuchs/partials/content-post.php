<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields, $bst_queried_object ) = BaseTheme::defaults();

// Post Tags & Categories.
$bst_var_post_categories = get_categories( $bst_var_post_id );


$bst_var_posttitle 		= $bst_fields['bst_var_posttitle'] ?? get_the_title();
$bst_var_osngl_kicker 	= $bst_fields['bst_var_osngl_kicker'] ?? null;
$bst_var_post_text 		= $bst_fields['bst_var_post_text'] ?? null;


$bst_var_post_single_date_visibility = $bst_fields['bst_var_post_single_date_visibility'] ?? null;

$is_date_disabled = ! empty( $bst_var_post_single_date_visibility[0] ) && 'disable' === $bst_var_post_single_date_visibility[0];

?>

<section class="ctn-full-width">
	<div class="wrapper">
		<div class="hero-inner-slider blog-sub-page">
			<div class="hero-slide-item">

				<div class="banner-content">
					<div class="banner-content-inner">
						<?php if($bst_var_osngl_kicker){ ?>
							<div class="kicker"><?php echo esc_html( $bst_var_osngl_kicker ); ?></div>
						<?php } ?>

						<h1 class="heading-2"><?php echo html_entity_decode( $bst_var_posttitle ); ?></h1>

						<?php if($bst_var_post_text){ ?>
							<p><?php echo html_entity_decode( $bst_var_post_text ); ?></p>
						<?php } ?>

					</div>

				</div>
			</div>

		</div>
	</div>
</section>

<section class="ctn-full-width">
	<div class="wrapper">
		<nav id="breadcrumbs" class="breadcrumbs">
			<div class="breadcrumbs__inner">

				<!-- Home -->
				<span class="breadcrumbs__item">
					<a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
				</span>

				<div class="breadcrumbs__separator">
					<svg xmlns="http://www.w3.org/2000/svg" width="7" height="13" viewBox="0 0 7 13" fill="none">
						<path d="M0.75 0.75L6.25 6.25L0.75 11.75" stroke="black" stroke-width="1.5"
							stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</div>

				<!-- Reference (static path) -->
				<span class="breadcrumbs__item">
					<a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a>
				</span>

				<div class="breadcrumbs__separator">
					<svg xmlns="http://www.w3.org/2000/svg" width="7" height="13" viewBox="0 0 7 13" fill="none">
						<path d="M0.75 0.75L6.25 6.25L0.75 11.75" stroke="black" stroke-width="1.5"
							stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</div>

				<!-- Current page / post -->
				<span class="breadcrumbs__item breadcrumbs__item--current" aria-current="page">
					<?php echo esc_html( get_the_title() ); ?>
				</span>

			</div>
		</nav>
	</div>
</section>


<div class="gl-s128"></div>

<section id="page-section" class="page-section">
	<div class="wrapper">
		<div class="blog-single-post">
			<div class="blog-single-image image-cover">
				<?php
					if ( ! has_post_thumbnail( $bst_var_post_id ) ) {
						echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
					} else {
						echo get_the_post_thumbnail(
							$bst_var_post_id,
							'thumb_900',
						);
					}
				?>
			</div>
			<div class="blog-single-post-content">
				<?php if ( ! $is_date_disabled ){ ?>
					<div class="blog-publish-date">
						<?php the_date('j. F. Y'); ?>
					</div>
				<?php } ?>

				<div class="blog-content-title">
					<h2 class="heading-3"><?php echo html_entity_decode( $bst_var_posttitle ); ?></h2>
				</div>

				<div class="blog-content-text">
					<?php get_template_part( 'partials/content' ); ?>
				</div>

				<div class="blog-subpost-bottom">
					<div class="bottom-section-button">
						<div class="tag">

						</div>
					</div>
					<div class="bottom-right">
						<div class="blog-like">
							<svg
								fill="#ffffff"
								viewBox="0 0 200 200"
								xmlns="http://www.w3.org/2000/svg"
								stroke="#ffffff"
								aria-hidden="true"
							>
								<path d="M170,104.75a10,10,0,0,0-10,10v22.5a20.06,20.06,0,0,1-20,20H60a20.06,20.06,0,0,1-20-20v-70a10,10,0,0,1,10-10H74.5a10,10,0,0,0,0-20H50a30.09,30.09,0,0,0-30,30v70a40.12,40.12,0,0,0,40,40h80a40.12,40.12,0,0,0,40-40v-22.5A10,10,0,0,0,170,104.75Z"></path>
								<path d="M97.5,137.25a10,10,0,0,0,10-10V89.75a20.06,20.06,0,0,1,20-20H148l-12,12a9.9,9.9,0,0,0,14,14l21-21a19.74,19.74,0,0,0,6-14v-1a3.75,3.75,0,0,0-.5-2.5,18,18,0,0,0-5.5-10.5l-21-21a9.67,9.67,0,0,0-14,0,9.67,9.67,0,0,0,0,14l10.5,10.5h-19a40.12,40.12,0,0,0-40,40v37A10,10,0,0,0,97.5,137.25Z"></path>
							</svg>

							<button type="button" class="js-share-post">
								Udostępnij post
							</button>
						</div>

						<script>
							document.addEventListener('DOMContentLoaded', function () {
							const shareButtons = document.querySelectorAll('.js-share-post');

								shareButtons.forEach(function (button) {
									button.addEventListener('click', async function () {
										const shareData = {
											title: document.title,
											text: 'Check out this post:',
											url: window.location.href,
										};

										if (navigator.share) {
											try {
												await navigator.share(shareData);
											} catch (error) {
												// Do nothing when the user closes the share menu.
												if (error.name !== 'AbortError') {
													console.error('Sharing failed:', error);
												}
											}

											return;
										}

										// Fallback for browsers that do not support native sharing.
										const emailSubject = encodeURIComponent(document.title);
										const emailBody = encodeURIComponent(
											'Check out this post:\n' + window.location.href
										);

										window.location.href =
											'mailto:?subject=' + emailSubject + '&body=' + emailBody;
									});
								});
							});
						</script>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<div class="gl-s128"></div>

