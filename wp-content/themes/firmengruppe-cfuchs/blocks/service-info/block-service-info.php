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
		$bst_var_blk_sinfo_kicker        = $bst_block_fields['bst_var_blk_sinfo_kicker'] ?? null;
		$bst_var_blk_sinfo_title        = $bst_block_fields['bst_var_blk_sinfo_title'] ?? null;
		$bst_var_blk_sinfo_text        = $bst_block_fields['bst_var_blk_sinfo_text'] ?? null;
		$bst_var_blk_sinfo_button        = $bst_block_fields['bst_var_blk_sinfo_button'] ?? null;
		$bst_var_blk_sinfo_image        = $bst_block_fields['bst_var_blk_sinfo_image'] ?? null;
		?>

	<!-- Service Info -->
	<section class="ctn-full-width">
		<div class="wrapper">
			<div class="introduction-team">
				<div class="introduction-team-left">

					<div class="section-head">
						<?php if ( $bst_var_blk_sinfo_kicker ) {  ?>
							<div class="hero-split-text"><?php echo html_entity_decode( $bst_var_blk_sinfo_kicker ); ?></div>
						<?php } ?>
						<?php if ( $bst_var_blk_sinfo_title ) {  ?>
							<h2 class="heading-2"><?php echo html_entity_decode( $bst_var_blk_sinfo_title ); ?></h2>
						<?php } ?>
						<?php if ( $bst_var_blk_sinfo_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_sinfo_text ); ?>
						<?php } ?>
						<?php if ( $bst_var_blk_sinfo_button ) {  ?>
							<?php echo BaseTheme::button( $bst_var_blk_sinfo_button, 'button white-button' ); ?>
						<?php } ?>
					</div>
				</div>
				<div class="introduction-team-image image-cover">
					<?php if ( $bst_var_blk_sinfo_image ) {  ?>
						<?php BaseTheme::the_attachment_image( $bst_var_blk_sinfo_image, 1000 ); ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>


<?php
	}
);

