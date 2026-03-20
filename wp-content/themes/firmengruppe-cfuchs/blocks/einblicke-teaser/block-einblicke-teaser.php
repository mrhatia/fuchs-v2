<?php
/**
 * Block Name: Einblicke Teaser
 *
 * The template for displaying the custom gutenberg block named Einblicke Teaser.
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
		$bst_var_blk_enbts_data_preference	= $bst_block_fields['bst_var_blk_enbts_data_preference'] ?? null;
		?>
		<?php if($bst_var_blk_enbts_data_preference === 'auto'){ ?>
			<section class="ctn-full-width">
				<div class="wrapper">
					<div class="category-main">

						<?php
						$terms = get_terms([
							'taxonomy'   => 'einblicke-category',
							'hide_empty' => true,
						]);

						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
						?>

						<div class="category-nav">
							<ul>
								<?php foreach ( $terms as $index => $term ) : ?>
									<li>
										<a href="#<?php echo esc_attr( $term->slug ); ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>">
											<?php echo esc_html( $term->name ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<div class="category-items">

							<?php foreach ( $terms as $term ){
								$term_image = get_field( 'bst_var_ctenb_image', $term );
								$bst_var_ctenb_kicker = get_field( 'bst_var_ctenb_kicker', $term );
								$bst_var_ctenb_block_label = get_field( 'bst_var_ctenb_block_label', $term );
								?>

								<div id="<?php echo esc_attr( $term->slug ); ?>" class="category-single-item">

									<div class="category-single-left">
										<div class="category-image-card">

											<?php if ( $term_image ) : ?>
												<div class="single-image">
													<?php if ( $term_image ) { ?>
														<?php BaseTheme::the_attachment_image( $term_image, 1000 ); ?>
													<?php } ?>
												</div>
											<?php endif; ?>

											<div class="single-image-content">
												<?php if($bst_var_ctenb_kicker){ ?>
													<div class="small-text">
														<?php echo esc_html( $bst_var_ctenb_kicker ); ?>
													</div>
												<?php } ?>

												<div class="service-title">
													<?php echo esc_html( $term->name ); ?>
												</div>

												<?php if ( $term->description ) : ?>
													<div class="service-text">
														<p><?php echo esc_html( $term->description ); ?></p>
													</div>
												<?php endif; ?>
											</div>

										</div>
									</div>

									<div class="category-single-right">
										<?php if($bst_var_ctenb_block_label){ ?>
											<div class="project-heading">
												<p><?php echo esc_html( $bst_var_ctenb_block_label ); ?></p>
											</div>
										<?php } else {?>
											<div class="project-heading">
												<p>
													<?php echo esc_html( $term->name ); ?> Referenzen
												</p>
											</div>
										<?php } ?>

										<div class="category-single-inne-items">

											<?php
											$posts_query = new WP_Query([
												'post_type'      => 'einblicke',
												'posts_per_page' => -1,
												'tax_query'      => [
													[
														'taxonomy' => 'einblicke-category',
														'field'    => 'term_id',
														'terms'    => $term->term_id,
													],
												],
											]);

											if ( $posts_query->have_posts() ) :
												while ( $posts_query->have_posts() ) : $posts_query->the_post();
													list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults( $posts_query->the_post() );
													$bst_var_trcho_kicker = $bst_fields['bst_var_trcho_kicker'] ?? null;

											?>
										<div class="category-image-card">
											<a href="<?php the_permalink(); ?>" class="category-image-card">
												<div class="single-image">
													<?php the_post_thumbnail( 'large' ); ?>
												</div>

												<div class="single-image-content">
													<?php if($bst_var_trcho_kicker){ ?>
														<div class="small-text">
															<?php echo esc_html( $bst_var_trcho_kicker ); ?>
														</div>
													<?php } ?>

													<div class="service-title">
														<?php the_title(); ?>
													</div>

													<div class="service-text">
														<p><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
													</div>
												</div>
											</a>
										</div>

											<?php
												endwhile;
												wp_reset_postdata();
											endif;
											?>

										</div>
									</div>

								</div>

							<?php } ?>

						</div>

						<?php endif; ?>

					</div>
				</div>
			</section>
		<?php } else {

			// ACF selected reference IDs (array of IDs)
			$selected_post_ids = $bst_block_fields['bst_var_blk_enbts_einblicke'] ?? [];

			// var_dump($selected_post_ids);

			if ( empty( $selected_post_ids ) || ! is_array( $selected_post_ids ) ) {
				return;
			}

			// Get only those terms which have selected posts
			$terms = get_terms([
				'taxonomy'   => 'einblicke-category',
				'hide_empty' => false,
			]);


			if ( empty( $terms ) || is_wp_error( $terms ) ) {
				return;
			}
			?>

			<section class="ctn-full-width">
				<div class="wrapper">
					<div class="category-main">

						<?php
						// Build valid terms list
						$valid_terms_enb = [];

						foreach ( $terms as $term ) {

						// var_dump($term);

							$check_query = new WP_Query([
								'post_type'      => 'einblicke',
								'post__in'       => $selected_post_ids,
								'posts_per_page' => 1,
								'tax_query'      => [
									[
										'taxonomy' => 'einblicke-category',
										'field'    => 'term_id',
										'terms'    => $term->term_id,
									],
								],
							]);

							// var_dump($check_query);


							if ( $check_query->have_posts() ) {
								$valid_terms_enb[] = $term;
							}

							wp_reset_postdata();
						}

						// var_dump($valid_terms_enb);


						if ( empty( $valid_terms_enb ) ) {
							return;
						}
						?>

						<!-- CATEGORY NAV -->
						<div class="category-nav">
							<ul>
								<?php foreach ( $valid_terms_enb as $index => $term ) : ?>
									<li>
										<a href="#<?php echo esc_attr( $term->slug ); ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>">
											<?php echo esc_html( $term->name ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<div class="category-items">

							<?php foreach ( $valid_terms_enb as $term ) :

								$term_image               = get_field( 'bst_var_ctenb_image', $term );
								$bst_var_ctenb_kicker     = get_field( 'bst_var_ctenb_kicker', $term );
								$bst_var_ctenb_block_label = get_field( 'bst_var_ctenb_block_label', $term );
							?>

								<div id="<?php echo esc_attr( $term->slug ); ?>" class="category-single-item">

									<!-- LEFT -->
									<div class="category-single-left">
										<div class="category-image-card">

											<?php if ( $term_image ) : ?>
												<div class="single-image">
													<?php BaseTheme::the_attachment_image( $term_image, 1000 ); ?>
												</div>
											<?php endif; ?>

											<div class="single-image-content">
												<?php if ( $bst_var_ctenb_kicker ) : ?>
													<div class="small-text"><?php echo esc_html( $bst_var_ctenb_kicker ); ?></div>
												<?php endif; ?>

												<div class="service-title"><?php echo esc_html( $term->name ); ?></div>

												<?php if ( $term->description ) : ?>
													<div class="service-text">
														<p><?php echo esc_html( $term->description ); ?></p>
													</div>
												<?php endif; ?>
											</div>

										</div>
									</div>

									<!-- RIGHT -->
									<div class="category-single-right">

										<div class="project-heading">
											<p>
												<?php
												echo esc_html(
													$bst_var_ctenb_block_label
														? $bst_var_ctenb_block_label
														: $term->name . ' Einblicke'
												);
												?>
											</p>
										</div>

										<div class="category-single-inne-items">

											<?php
											$posts_query = new WP_Query([
												'post_type'      => 'einblicke',
												'post__in'       => $selected_post_ids,
												'orderby'        => 'post__in',
												'posts_per_page' => -1,
												'tax_query'      => [
													[
														'taxonomy' => 'einblicke-category',
														'field'    => 'term_id',
														'terms'    => $term->term_id,
													],
												],
											]);

											if ( $posts_query->have_posts() ) :
												while ( $posts_query->have_posts() ) :
													$posts_query->the_post();

													list( $bst_var_post_id, $bst_fields ) = BaseTheme::defaults( get_the_ID() );
													$bst_var_trcho_kicker = $bst_fields['bst_var_trcho_kicker'] ?? null;
											?>

													<div class="category-image-card">
														<a href="<?php the_permalink(); ?>" class="category-image-card">

															<div class="single-image">
																<?php the_post_thumbnail( 'large' ); ?>
															</div>

															<div class="single-image-content">

																<?php if ( $bst_var_trcho_kicker ) : ?>
																	<div class="small-text"><?php echo esc_html( $bst_var_trcho_kicker ); ?></div>
																<?php endif; ?>

																<div class="service-title"><?php the_title(); ?></div>

																<div class="service-text">
																	<p><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
																</div>

															</div>

														</a>
													</div>

											<?php
												endwhile;
												wp_reset_postdata();
											endif;
											?>

										</div>
									</div>

								</div>

							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</section>

		<?php } ?>

		<?php
	}
);
