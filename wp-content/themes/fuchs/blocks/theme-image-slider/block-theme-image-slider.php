<?php
/**
 * Block Name: Theme Image Slider
 *
 * The template for displaying the custom gutenberg block named Theme Image Slider.
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
		$fh_var_thimg_slides     = $bst_block_fields['fh_var_thimg_slides'] ?? null;
		?>
		<?php if($fh_var_thimg_slides){ ?>

			<section>
				<div class="wrapper">
					<div class="gallery-slider">
						<?php foreach ( $fh_var_thimg_slides as $slide ) {

							$slide_image       = $slide['image'] ?? null;
							?>

								<?php if ( $slide_image ) { ?>
									<div class="gallery-slide image-cover" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
										<?php BaseTheme::the_attachment_image( $slide_image, 2000 ); ?>
									</div>
								<?php } ?>
						<?php } ?>


						<button class="btn prev"></button>
						<button class="btn next"></button>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
);

