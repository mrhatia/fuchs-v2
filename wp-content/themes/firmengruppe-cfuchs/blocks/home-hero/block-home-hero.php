<?php
/**
 * Block Name: Collage Images
 *
 * The template for displaying the custom gutenberg block named Collage Images.
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
		$fh_var_hero_slides     = $bst_block_fields['fh_var_hero_slides'] ?? null;


		?>
		<?php if($fh_var_hero_slides){ ?>
			<section class="ctn-full-width">
				<div class="wrapper">
					<div class="hero-home slides">
						<?php
							foreach ( $fh_var_hero_slides as $slide ) {
								$slide_image       = $slide['image'] ?? null;
								$slide_image_mobile       = $slide['image_mobile'] ?? null;
								$slide_kicker      = $slide['kicker'] ?? null;
								$slide_sub_headline = $slide['sub_headline'] ?? null;
								$slide_title_left   		= $slide['slide_title_left'] ?? null;
								$slide_title_right   		= $slide['slide_title_right'] ?? null;
								$slide_text   = $slide['text'] ?? null;
								$slide_button = $slide['button'] ?? null;
								?>
								<div class="slide <?php if($slide_image){ echo " has-image "; } ?> ">
									<div class="home-hero-slide">
										<?php if ( $slide_image ) { ?>
											<div class="home-hero-image <?php if($slide_image_mobile){ echo " mobile-hide ";  } ?> " tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $slide_image, 1000 ); ?>
											</div>
										<?php } ?>
										<?php if ( $slide_image_mobile ) { ?>
											<div class="home-hero-image desktop-hide" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $slide_image_mobile, 1000 ); ?>
											</div>
										<?php } ?>
										<div class="home-hero-content">
											<div class="top-section">
												<?php if ( $slide_kicker ) {  ?>
													<div class="kicker"><?php echo html_entity_decode( $slide_kicker ); ?></div>
												<?php } ?>
												<?php if ( $slide_sub_headline ) {  ?>
													<h1 class="heading-2"><?php echo html_entity_decode( $slide_sub_headline ); ?></h1>
												<?php } ?>
											</div>
											<div class="hero-split-text">
												<div class="split-text-left">
													<?php if ( $slide_title_left ) {  ?>
														<h2 class="heading-1"><?php echo html_entity_decode( $slide_title_left ); ?></h2>
													<?php } ?>
												</div>
												<div class="split-text-right">
													<?php if ( $slide_title_left ) {  ?>
														<h2 class="heading-1"><?php echo html_entity_decode( $slide_title_left ); ?></h2>
													<?php } ?>
												</div>
											</div>
											<div class="bottom-section">
												<?php if ( $slide_text ) {  ?>
													<?php echo html_entity_decode( $slide_text ); ?>
												<?php } ?>


												<?php if ( $slide_button ) { ?>
													<div class="bottom-section-button">
														<a href="<?php echo esc_url($slide_button['url']); ?>" tabindex="0">
															<span>
																<?php echo esc_html( $slide_button['title'] ); ?>
															</span>
															<div class="plus-button">
																+
															</div>
														</a>
													</div>
												<?php } ?>
											</div>
										</div>
										<div class="home-hero-slide-overlay"></div>
									</div>
								</div>

							<?php } ?>

						<div class="dots">
							<?php foreach ( $fh_var_hero_slides as $key => $slide ) { ?>
								<!-- add class active to first dot -->
								<?php if($key === 0){ ?>
									<div class="dot active" data-slide="<?php echo esc_attr( $key ); ?>"></div>
								<?php } else { ?>
									<div class="dot" data-slide="<?php echo esc_attr( $key ); ?>"></div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>

				</div>
			</section>
		<?php } ?>

		<?php
	}
);

