<?php
/**
 * Block Name: Blog Video Teaser
 *
 * The template for displaying the custom gutenberg block named Blog Video Teaser.
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

		?>



			<section>
				<div class="wrapper">
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
								$bst_var_osngl_video = $bst_fields['bst_var_osngl_video'] ?? null;
								// ✅ Skip posts without video
								if ( empty( $bst_var_osngl_video ) ) {
									continue;
								}
							?>
							<div class="blog-subpost">
								<div class="blog-slider-image-slider">
									<div class="item image-cover">
										<video src="<?php echo esc_url($bst_var_osngl_video); ?>" controls autoplay muted loop playsinline>
										</video>
									</div>
								</div>
								<div class="blog-subpost-content">

									<div class="blog-content-title">
										<h2 id="post-<?php the_ID($bst_var_post_id); ?>" class="heading-3">
											<a href="<?php echo esc_url( get_the_permalink($bst_var_post_id) ); ?>"> <?php echo esc_html( get_the_title($bst_var_post_id) ); ?></a>
										</h2>
									</div>
									<?php if(has_excerpt($bst_var_post_id)) { ?>
										<div class="blog-content-text">
											<p><?php echo get_the_excerpt($bst_var_post_id); ?> </p>
										</div>
									<?php } ?>
									<div class="blog-subpost-bottom">
										<div class="bottom-section-button">
											<a href="<?php echo esc_url( get_the_permalink($bst_var_post_id) ); ?>"
												tabindex="0">
												<span>
													Read more
												</span>
												<div class="plus-button">
													+
												</div>
											</a>
										</div>
										<div class="bottom-right">
											<span>Share:</span>
											<div class="social-share">

												<?php
												$post_url   = urlencode( get_permalink( $bst_var_post_id ) );
												$post_title = urlencode( get_the_title( $bst_var_post_id ) );
												?>

												<!-- Facebook Share -->
												<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
												target="_blank" rel="noopener noreferrer" class="share-facebook" aria-label="Share on Facebook">

													<svg width="20" height="20" viewBox="0 0 24 24" fill="#ffffff">
														<path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07C2 17.09 5.66 21.23 10.44 22V14.97H7.9V12.07H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.44 6.15 16.44 6.15V8.62H15.19C13.96 8.62 13.56 9.39 13.56 10.17V12.07H16.32L15.88 14.97H13.56V22C18.34 21.23 22 17.09 22 12.07Z"/>
													</svg>

												</a>


												<!-- LinkedIn Share -->
												<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_url; ?>"
												target="_blank" rel="noopener noreferrer" class="share-linkedin" aria-label="Share on LinkedIn">

													<svg width="20" height="20" viewBox="0 0 24 24" fill="#ffffff">
														<path d="M20.45 20.45H16.9V14.9C16.9 13.57 16.87 11.87 15.05 11.87C13.2 11.87 12.91 13.31 12.91 14.8V20.45H9.36V9H12.77V10.57H12.82C13.3 9.67 14.45 8.73 16.2 8.73C19.83 8.73 20.5 11.09 20.5 14.14V20.45H20.45ZM5.34 7.43C4.2 7.43 3.27 6.5 3.27 5.36C3.27 4.22 4.2 3.29 5.34 3.29C6.48 3.29 7.41 4.22 7.41 5.36C7.41 6.5 6.48 7.43 5.34 7.43ZM7.12 20.45H3.56V9H7.12V20.45Z"/>
													</svg>

												</a>


												<!-- Instagram (profile link only) -->
												<a href="https://www.instagram.com/"
												target="_blank" rel="noopener noreferrer" class="share-instagram" aria-label="Instagram">

													<svg width="20" height="20" viewBox="0 0 24 24" fill="#ffffff">
														<path d="M7 2C4.24 2 2 4.24 2 7V17C2 19.76 4.24 22 7 22H17C19.76 22 22 19.76 22 17V7C22 4.24 19.76 2 17 2H7ZM12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7ZM18 6.5C17.17 6.5 16.5 5.83 16.5 5C16.5 4.17 17.17 3.5 18 3.5C18.83 3.5 19.5 4.17 19.5 5C19.5 5.83 18.83 6.5 18 6.5Z"/>
													</svg>

												</a>

											</div>
										</div>
									</div>
								</div>
							</div>




							<?php endwhile;
							wp_reset_postdata();
						else :
							echo '<p>No projects found.</p>';
						endif;
					?>

				</div>
			</section>


		<?php
	}
);
