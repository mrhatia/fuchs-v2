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
							<svg width="64px" height="64px" viewBox="0 0 16 16" fill="none"
								xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
								</g>
								<g id="SVGRepo_iconCarrier">
									<path
										d="M1.24264 8.24264L8 15L14.7574 8.24264C15.553 7.44699 16 6.36786 16 5.24264V5.05234C16 2.8143 14.1857 1 11.9477 1C10.7166 1 9.55233 1.55959 8.78331 2.52086L8 3.5L7.21669 2.52086C6.44767 1.55959 5.28338 1 4.05234 1C1.8143 1 0 2.8143 0 5.05234V5.24264C0 6.36786 0.44699 7.44699 1.24264 8.24264Z"
										fill="#ffffff"></path>
								</g>
							</svg>
							<a href="#"><span>37</span>Likes</a>

						</div>
						<div class="comments-holder">
							<svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
								</g>
								<g id="SVGRepo_iconCarrier">
									<path
										d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z"
										stroke="#ffffff" stroke-width="1.5"></path>
								</g>
							</svg>
							<a href="#">
								Comments </a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<div class="gl-s128"></div>

