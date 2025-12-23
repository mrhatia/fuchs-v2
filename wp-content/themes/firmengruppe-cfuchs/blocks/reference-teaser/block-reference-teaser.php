<?php
/**
 * Block Name: Reference Teaser
 *
 * The template for displaying the custom gutenberg block named Reference Teaser.
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
		$bst_var_blk_prjstr_title     = $bst_block_fields['bst_var_blk_prjstr_title'] ?? null;
		$bst_var_blk_prjstr_variation     = $bst_block_fields['bst_var_blk_prjstr_variation'] ?? null;
		$bst_var_blk_prjstr_projects	= $bst_block_fields['bst_var_blk_prjstr_projects'] ?? null;
		?>

		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="category-main">

					<?php
					$terms = get_terms([
						'taxonomy'   => 'reference-category',
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
							$term_image = get_field( 'bst_var_ctref_image', $term );
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
											<div class="small-text">
												EXPLORE THE FEATURES
											</div>

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
									<div class="project-heading">
										<p>
											Select <?php echo esc_html( $term->name ); ?> Projects
										</p>
									</div>

									<div class="category-single-inne-items">

										<?php
										$posts_query = new WP_Query([
											'post_type'      => 'reference',
											'posts_per_page' => -1,
											'tax_query'      => [
												[
													'taxonomy' => 'reference-category',
													'field'    => 'term_id',
													'terms'    => $term->term_id,
												],
											],
										]);

										if ( $posts_query->have_posts() ) :
											while ( $posts_query->have_posts() ) : $posts_query->the_post();
										?>

										<div class="category-image-card">
											<div class="single-image">
												<?php the_post_thumbnail( 'large' ); ?>
											</div>

											<div class="single-image-content">
												<div class="small-text">
													EXPLORE THE FEATURES
												</div>

												<div class="service-title">
													<?php the_title(); ?>
												</div>

												<div class="service-text">
													<p><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
												</div>
											</div>
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

		<?php
	}
);
