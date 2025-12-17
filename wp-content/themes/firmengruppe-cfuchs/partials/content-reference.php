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
$bst_var_sngl_related_title = $bst_fields['bst_var_sngl_related_title'] ?? "WEITERE AKTUELLE PROJEKTE";
$bst_var_sngl_variation = $bst_fields['bst_var_sngl_variation'] ?? null;
$bst_var_sngl_related_projects = $bst_fields['bst_var_sngl_related_projects'] ?? null;

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
<!-- Metadata -->
<section>
	<aside class="project-meta">
		<ul class="project-meta__list alignwide">
			<li class="project-meta__item project-meta__item--markets">

				<a class="pill project-meta__pill project-meta__pill--market"
					href="https://www.bechtel.com/markets/energy/" data-dynamic-id="csp-023d52ddc3c5">
					<svg class="svg-inline--fa fa-bolt pill__icon" aria-hidden="true" focusable="false"
						data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 448 512" data-fa-i2svg="">
						<path fill="currentColor"
							d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288l111.5 0L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7l-111.5 0L349.4 44.6z">
						</path>
					</svg><!-- <i class="pill__icon fas fa-bolt "></i> Font Awesome fontawesome.com -->
					Energy</a>
			</li>
			<li class="project-meta__item project-meta__item--location">
				<span class="project-meta__icon project-meta__icon--location">
					<svg class="svg-inline--fa fa-location-dot" aria-hidden="true" focusable="false"
						data-prefix="fas" data-icon="location-dot" role="img" xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 384 512" data-fa-i2svg="">
						<path fill="currentColor"
							d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
						</path>
					</svg><!-- <i class="fas fa-location-dot"></i> Font Awesome fontawesome.com -->
				</span>
				<span class="project-meta__label project-meta__label--status">Louisiana, U.S.</span>
			</li>
			<li class="project-meta__item project-meta__item--status">
				<span class="project-meta__icon project-meta__icon--location">
					<svg class="svg-inline--fa fa-helmet-safety" aria-hidden="true" focusable="false"
						data-prefix="fas" data-icon="helmet-safety" role="img"
						xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
						<path fill="currentColor"
							d="M256 32c-17.7 0-32 14.3-32 32l0 2.3 0 99.6c0 5.6-4.5 10.1-10.1 10.1c-3.6 0-7-1.9-8.8-5.1L157.1 87C83 123.5 32 199.8 32 288l0 64 512 0 0-66.4c-.9-87.2-51.7-162.4-125.1-198.6l-48 83.9c-1.8 3.2-5.2 5.1-8.8 5.1c-5.6 0-10.1-4.5-10.1-10.1l0-99.6 0-2.3c0-17.7-14.3-32-32-32l-64 0zM16.6 384C7.4 384 0 391.4 0 400.6c0 4.7 2 9.2 5.8 11.9C27.5 428.4 111.8 480 288 480s260.5-51.6 282.2-67.5c3.8-2.8 5.8-7.2 5.8-11.9c0-9.2-7.4-16.6-16.6-16.6L16.6 384z">
						</path>
					</svg><!-- <i class="fas fa-helmet-safety"></i> Font Awesome fontawesome.com -->
				</span>
				<span class="project-meta__label project-meta__label--status">Active</span>
			</li>
		</ul>
	</aside>
</section>

<div class="page-section">
	<?php get_template_part( 'partials/content' ); ?>
	<div class="gl-s96"></div>
	<section>
		<div class="wrapper">
			<?php if ( $bst_var_sngl_related_title ) {  ?>
				<h3 class=""><?php echo html_entity_decode( $bst_var_sngl_related_title ); ?></h3>
			<?php } ?>
			<?php
			if($bst_var_sngl_variation === "manual"){
				?>

				<div class="post-archive three-columns">
					<?php
						if ( $bst_var_sngl_related_projects ) {
						?>
							<?php
								foreach( $bst_var_sngl_related_projects as $key =>  $project_id ){
									list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults($project_id);
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
							'post_type'      => 'overview',
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
</div>
