<?php
/**
 * Block Name: Icon Grid
 *
 * The template for displaying the custom gutenberg block named Icon Grid.
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
		$bst_var_blk_bltsr_variation     = $bst_block_fields['bst_var_blk_bltsr_variation'] ?? null;
		$bst_var_blk_bltsr_blog_posts	= $bst_block_fields['bst_var_blk_bltsr_blog_posts'] ?? null;
		?>

		<?php if($bst_var_blk_bltsr_variation === "manual" && $bst_var_blk_bltsr_blog_posts){ ?>
			<section class="ctn-green-inner">
				<div class="wrapper">
					<div class="blog-teaser-slider">

						<?php foreach( $bst_var_blk_bltsr_blog_posts as $key =>  $post_id ){
									list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults($post_id);
										$terms = get_the_terms( $bst_var_post_id, 'category' );
								?>

								<div class="blog-teaser-item">
									<div class="testimonial-image-item">
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
									</div>
									<div class="testimonial-content-item">
										<h2 class="heading-3"><a href="<?php the_permalink($bst_var_post_id); ?>"><?php echo get_the_title($bst_var_post_id); ?></a> </h2>
										<?php if(has_excerpt($bst_var_post_id)){ ?>
											<p><?php echo html_entity_decode(get_the_excerpt($bst_var_post_id)) ?></p>
										<?php } ?>
									</div>
								</div>

						<?php } ?>



					</div>
				</div>
			</section>
		<?php } else { ?>
				<section class="ctn-green">
				<div class="wrapper">
					<div class="blog-teaser-slider">

						<?php
							$args = array(
								'post_type'      => 'post',
								'posts_per_page' => -1,
								'orderby'        => 'date',
								'order'          => 'DESC',
							);

							$bst_query = new WP_Query( $args );

							if ( $bst_query->have_posts() ) :
								while ( $bst_query->have_posts() ) : $bst_query->the_post();
								list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();

								?>
									<div class="blog-teaser-item">
										<div class="testimonial-image-item">
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
										</div>
										<div class="testimonial-content-item">
											<h2 class="heading-3"><a href="<?php the_permalink($bst_var_post_id); ?>"><?php echo get_the_title($bst_var_post_id); ?></a> </h2>
											<?php if(has_excerpt($bst_var_post_id)){ ?>
												<p><?php echo html_entity_decode(get_the_excerpt($bst_var_post_id)) ?></p>
											<?php } ?>
										</div>
									</div>

								<?php endwhile;
								wp_reset_postdata();
							else :
								echo '<p>No projects found.</p>';
							endif;
							?>
					</div>
				</div>
			</section>
		<?php } ?>


		<?php
	}
);
