<?php
/**
 * Template part for displaying single overview
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();
// Post Tags & Categories.
$bst_var_post_tags       = get_the_tags( $bst_var_post_id );
$bst_var_post_categories = get_categories( $bst_var_post_id );


$bst_var_post_title = get_the_title();
$bst_var_sngl_related_ref_kicker = $bst_fields['bst_var_sngl_related_ref_kicker'] ?? "Latest";
$bst_var_sngl_related_ref_title = $bst_fields['bst_var_sngl_related_ref_title'] ?? "Referenzen";
$bst_var_sngl_related_ref_variation = $bst_fields['bst_var_sngl_related_ref_variation'] ?? null;
$bst_var_sngl_related_references = $bst_fields['bst_var_sngl_related_references'] ?? null;

// Hero Section Variables.

$bst_var_trcho_background_text          = $bst_fields['bst_var_trcho_background_text'] ?? null;
$bst_var_trcho_kicker          = $bst_fields['bst_var_trcho_kicker'] ?? null;
$bst_var_trcho_text          = $bst_fields['bst_var_trcho_text'] ?? null;
$bst_var_trcho_button_one          = $bst_fields['bst_var_trcho_button_one'] ?? null;
$bst_var_trcho_button_two          = $bst_fields['bst_var_trcho_button_two'] ?? null;
$bst_var_pagetitle          = $bst_fields['bst_var_trcho_title'] ?? get_the_title();



?>


<section class="ctn-full-width">
	<div class="wrapper">
		<div class="hero-project archive-hero hero-single-reference">
			<div class="hero-slide-item">
				<div class="hero-slide-image">
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
				<div class="banner-content">
					<div class="banner-content-inner">
						<?php if($bst_var_trcho_background_text){ ?>
							<div class="hero-split-text"><?php echo html_entity_decode($bst_var_trcho_background_text); ?></div>
						<?php } ?>
						<?php if($bst_var_trcho_kicker){ ?>
							<div class="kicker"><?php echo html_entity_decode($bst_var_trcho_kicker); ?></div>
						<?php } ?>
						<h1 class="heading-2 hero-reveal"><?php echo esc_html( $bst_var_pagetitle ); ?></h1>
						<div class="hero-reveal">
							<?php if($bst_var_trcho_text){ ?>
								<?php echo html_entity_decode($bst_var_trcho_text); ?>
							<?php } ?>
						</div>
						<div class="hero-buttons">
							<?php if ( $bst_var_trcho_button_one ) { ?>
								<?php echo BaseTheme::button( $bst_var_trcho_button_one, 'button' ); ?>
							<?php } ?>
							<?php if ( $bst_var_trcho_button_two ) { ?>
								<?php echo BaseTheme::button( $bst_var_trcho_button_two, 'button gray-button' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumbs -->
<!-- Breadcrumbs -->
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
					<a href="<?php echo esc_url( home_url('/referenzen/') ); ?>">REFERENZEN</a>
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


<div class="page-section">
	<?php get_template_part( 'partials/content' ); ?>
	<div class="gl-s128"></div>
	<section>
		<div class="wrapper">

			<div class="section-head d-flex justify-content-between align-items-start">
				<div class="head-left-section">

					<?php if($bst_var_sngl_related_ref_kicker){ ?>
						<div class="hero-split-text">
							<?php echo esc_html( $bst_var_sngl_related_ref_kicker ); ?>
						</div>
					<?php } ?>
					<?php if($bst_var_sngl_related_ref_title){ ?>
						<h2 class="heading-2">
							<?php echo esc_html( $bst_var_sngl_related_ref_title ); ?>
						</h2>
					<?php } ?>
				</div>
				<div class="head-right-section">
					<a href="<?php echo esc_url( home_url('/referenzen/') ); ?>" class="button white-button">
						Alle Referenzen
					</a>
				</div>
			</div>
			<?php
			if($bst_var_sngl_related_ref_variation === "manual"){
				?>

				<div class="post-archive three-columns">
					<?php
						if ( $bst_var_sngl_related_references ) {
						?>
							<?php
								foreach( $bst_var_sngl_related_references as $key =>  $reference_id ){
									list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults($reference_id);
									$terms = get_the_terms( $bst_var_post_id, 'category' );


									?>

									<article id="post-<?php the_ID($bst_var_post_id); ?>" <?php post_class( 'post-archive-box column' ); ?>>
										<div class="post-archive-box-img post-image">
											<a href="<?php the_permalink($bst_var_post_id); ?>">
												<?php
													if ( ! has_post_thumbnail( $bst_var_post_id ) ) {
														echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
													} else {
														echo get_the_post_thumbnail(
															$bst_var_post_id,
															'thumb_1000',
														);
													}
												?>
											</a>
										</div>
										<div class="post-content">
											<div class="post-box-meta d-flex justify-content-between">
												<div class="ac-post-cat">
													<?php
														if ( $terms && ! is_wp_error( $terms ) ) {
															foreach ( $terms as $term ) {
																echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a> ';
															}
														}
													?>
												</div>
											</div>
											<div class="post-archive-box-title post-title">
												<h4><a href="<?php the_permalink($bst_var_post_id); ?>"><?php echo get_the_title($bst_var_post_id); ?></a> </h4>
											</div>
											<div class="bottom-section-button">
												<a href="<?php the_permalink($bst_var_post_id); ?>">
													<span>
														Mehr Infos
													</span>
													<div class="plus-button">
														+
													</div>
												</a>
											</div>
										</div>
									</article>

									<?php
								}
							?>
						<?php
						} ?>



				</div>

			<?php } else { ?>
				<div class="post-archive three-columns">
					<?php
						$args = array(
							'post_type'      => 'reference',
							'posts_per_page' => 3,
							'orderby'        => 'date',
							'order'          => 'DESC',
						);

						$bst_query = new WP_Query( $args );

						if ( $bst_query->have_posts() ) :
							while ( $bst_query->have_posts() ) : $bst_query->the_post();
							list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();
							$terms = get_the_terms( $bst_var_post_id, 'category' );

							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-archive-box column' ); ?>>
									<div class="post-archive-box-img post-image">
										<a href="<?php the_permalink(); ?>">
											<?php
												if ( ! has_post_thumbnail( $bst_var_post_id ) ) {
													echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
												} else {
													echo get_the_post_thumbnail(
														$bst_var_post_id,
														'thumb_1000',
													);
												}
											?>
										</a>
									</div>
									<div class="post-content">
										<div class="post-box-meta d-flex justify-content-between">
											<div class="ac-post-cat">
												<?php
													if ( $terms && ! is_wp_error( $terms ) ) {
														foreach ( $terms as $term ) {
															echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a> ';
														}
													}
												?>
											</div>
										</div>
										<div class="post-archive-box-title post-title">
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4>
										</div>
										<div class="bottom-section-button">
											<a href="<?php the_permalink(); ?>">
												<span>
													Mehr Infos
												</span>
												<div class="plus-button">
													+
												</div>
											</a>
										</div>
									</div>
								</article>

							<?php endwhile;
							wp_reset_postdata();
						else :
							echo '<p>No projects found.</p>';
						endif;
						?>



				</div>
			<?php } ?>
		</div>
	</section>
	<div class="gl-s96"></div>

</div>
