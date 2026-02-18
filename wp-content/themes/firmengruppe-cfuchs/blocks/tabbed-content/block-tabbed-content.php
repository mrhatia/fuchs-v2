<?php
/**
 * Block Name: Tabbed Content
 *
 * The template for displaying the custom gutenberg block named Tabbed Content.
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
		$fh_var_blk_tbc_tabs        = $bst_block_fields['fh_var_blk_tbc_tabs'] ?? null;


		?>

			<?php if ( $fh_var_blk_tbc_tabs ) : ?>
				<section>
					<div class="wrapper">
						<div class="tabbed-content-main image-tabs tabbed-map-items four-column-variation">
							<!-- Tab Content -->
							<div class="tabbed-map-content-inner">
								<?php foreach ( $fh_var_blk_tbc_tabs as $index => $tab ) :



									$tab_images          = $tab['add_images'] ?? [];
									$kicker         = $tab['kicker'] ?? '';
									$title         = $tab['title'] ?? '';
									$tab_text            = $tab['text'] ?? '';
									$button            = $tab['button'] ?? '';
								?>
									<div class="tabbed-content-single tabbed-id-item" style="<?php echo $index === 0 ? '' : 'display:none;'; ?>">
										<div class="image-alongside-text iat-two-image image-at-right d-flex justify-content-between flex-wrap align-items-center">
											<div class="iat-content column">
												<!-- dynamic content -->
												<?php if($kicker){ ?>
													<div class="kicker"><?php echo esc_html( $kicker ); ?></div>
												<?php } ?>
												<?php if($title){ ?>
													<h2 tabindex="0"><?php echo esc_html( $title ); ?></h2>
												<?php } ?>
												<?php if($tab_text){ ?>
													<?php echo html_entity_decode( $tab_text ); ?>
													<div class="gl-s36"></div>
												<?php } ?>

												<?php if ( $button ) { ?>
													<div class="iat-button">
														<?php echo BaseTheme::button( $button, 'button white-button' ); ?>
													</div>
												<?php } ?>
											</div>

											<?php if($tab_images){ ?>
											<?php
												$images_count = is_array( $tab_images ) ? count( array_filter( $tab_images ) ) : 0;
												?>

												<div class="iat-image column <?php echo ( $images_count === 1 ) ? 'single-image' : ''; ?>">

													<?php foreach ( $tab_images as $img ) :
														$tab_image = $img['image'] ?? null;
														if ( $tab_image ) : ?>

															<div class="iat-single-image image-cover">
																<?php BaseTheme::the_attachment_image( $tab_image, 1000 ); ?>
															</div>

														<?php endif; ?>
													<?php endforeach; ?>

												</div>

											<?php } ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>

						</div>
					</div>
				</section>
				<?php endif; ?>

		<?php
	}
);

