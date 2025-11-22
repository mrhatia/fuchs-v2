<?php
/**
 * Block Name: Faq
 *
 * The template for displaying the custom gutenberg block named Faq.
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
		$fh_var_heroimg_slides     = $bst_block_fields['fh_var_heroimg_slides'] ?? null;

		$slide_count = count( $fh_var_heroimg_slides );
	$slider_class = ( $slide_count <= 1 ) ? 'slider-disable' : '';


		?>
		<?php if($fh_var_heroimg_slides){ ?>

			<section class="ctn-full-width">
				<div class="wrapper">
					<div class="hero-inner-slider <?php echo $slider_class; ?>">
						<?php
							foreach ( $fh_var_heroimg_slides as $slide ) {
								$background_text = $slide['background_text'] ?? null;
								$slide_kicker      = $slide['kicker'] ?? null;
								$slide_title   		= $slide['slide_title'] ?? null;
								$slide_text   = $slide['text'] ?? null;
								$slide_button_one = $slide['button_one'] ?? null;
								$slide_button_two = $slide['button_two'] ?? null;
								$slide_image       = $slide['image'] ?? null;

								?>
									<div class="hero-slide-item">
										<?php if ( $slide_image ) { ?>
											<div class="hero-slide-image" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $slide_image, 2000 ); ?>
											</div>
										<?php } ?>

										<div class="banner-content">
											<div class="banner-content-inner">

											<?php if ( $background_text ) {  ?>
												<div class="hero-split-text"><?php echo html_entity_decode( $background_text ); ?></div>
											<?php } ?>
											<?php if ( $slide_kicker ) {  ?>
												<div class="kicker hero-reveal"><?php echo html_entity_decode( $slide_kicker ); ?></div>
											<?php } ?>

											<?php if ( $slide_title ) {  ?>
												<h1 class="heading-2 hero-reveal"><?php echo html_entity_decode( $slide_title ); ?></h1>
											<?php } ?>

											<?php if ( $slide_text ) { ?>
												<div class="hero-reveal">
													<?php echo html_entity_decode( $slide_text ); ?>
												</div>
											<?php } ?>
											<?php if($slide_button_one || $slide_button_two){ ?>
												<div class="hero-buttons button-reveal">
													<?php if ( $slide_button_one ) { ?>
														<?php echo BaseTheme::button( $slide_button_one, 'button' ); ?>
													<?php } ?>
													<?php if ( $slide_button_two ) { ?>
														<?php echo BaseTheme::button( $slide_button_two, 'button transparent-button' ); ?>
													<?php } ?>
												</div>
											<?php } ?>
										</div>
										</div>
									</div>
							<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
);

