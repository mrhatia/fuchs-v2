<?php
/**
 * Block Name: Media Alongside Text
 *
 * The template for displaying the custom gutenberg block named Media Alongside Text.
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
		$bst_var_blk_quote_text        = $bst_block_fields['bst_var_blk_quote_text'] ?? null;
		$bst_var_blk_quote_name        = $bst_block_fields['bst_var_blk_quote_name'] ?? " ";
		$bst_var_blk_quote_designation        = $bst_block_fields['bst_var_blk_quote_designation'] ?? "";
		$bst_var_blk_quote_image        = $bst_block_fields['bst_var_blk_quote_image'] ?? null;
		$bst_var_blk_quote_img_position = $bst_block_fields['bst_var_blk_mat_img_position'] ?? null;

		$bst_var_blk_quote_img_position        = ("left" == $bst_var_blk_quote_img_position) ? "image-at-left" : "image-at-right";

		?>

		<section>
			<div class="wrapper">
				<div
					class="image-alongside-text image-alongside-text-variation <?php echo $bst_var_blk_quote_img_position; ?> d-flex justify-content-between flex-wrap align-items-center">
					<div class="iat-content column">
						<?php if ( $bst_var_blk_quote_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_quote_text ); ?>
						<?php } ?>
						<?php if ( $bst_var_blk_quote_name || $bst_var_blk_quote_designation ) {  ?>
							<div class="person-info"><?php echo html_entity_decode( $bst_var_blk_quote_name ); ?><br><?php echo html_entity_decode($bst_var_blk_quote_designation); ?></div>
						<?php } ?>
						<div class="double-comma xlarge-heading">❝</div>
					</div>
					<?php if ( $bst_var_blk_quote_image ) { ?>
						<div class="iat-image column iat-image-appear">
							<?php BaseTheme::the_attachment_image( $bst_var_blk_quote_image, 1000 ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>

		<?php
	}
);

