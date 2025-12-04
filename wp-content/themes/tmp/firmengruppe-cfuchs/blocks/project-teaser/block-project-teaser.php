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
		$bst_var_blk_prjstr_title     = $bst_block_fields['bst_var_blk_prjstr_title'] ?? null;
		$bst_var_blk_prjstr_variation     = $bst_block_fields['bst_var_blk_prjstr_variation'] ?? null;
		$bst_var_blk_prjstr_projects	= $bst_block_fields['bst_var_blk_prjstr_projects'] ?? null;
		?>

		<section>
			<div class="wrapper">
				<div class="section-head">

					<?php if ( $bst_var_blk_prjstr_title ) {  ?>
						<h1 class="heading-2"><?php echo html_entity_decode( $bst_var_blk_prjstr_title ); ?></h1>
					<?php } ?>
				</div>

				<?php
				if($bst_var_blk_prjstr_variation === "manual"){
					$bst_var_post_count = is_array( $bst_var_blk_prjstr_projects ) ? count( $bst_var_blk_prjstr_projects ) : 0;
					if($bst_var_post_count === 2) {
						$bst_var_column_class = "have-two-columns";
					} elseif($bst_var_post_count === 3) {
						$bst_var_column_class = "four-columns";
					}

					?>

					<div class="post-archive three-columns <?php echo $bst_var_column_class; ?>">
						<?php
							if ( $bst_var_blk_prjstr_projects ) {
							?>
								<?php
									foreach( $bst_var_blk_prjstr_projects as $key =>  $project_id ){
										list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults($project_id);
										$terms = get_the_terms( $bst_var_post_id, 'category' );
										?>

										<article id="post-<?php the_ID($bst_var_post_id); ?>" <?php post_class( "post-archive-box column" ); ?>>
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
								'post_type'      => 'project',
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


		<?php
	}
);
