<?php
/**
 * Block Name: Featured Section
 *
 * The template for displaying the custom gutenberg block named Featured Section.
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

		$fh_var_blk_fts_kicker      = $bst_block_fields['fh_var_blk_fts_kicker'] ?? null;
		$fh_var_blk_fts_title   		= $bst_block_fields['fh_var_blk_fts_title'] ?? null;
		$fh_var_blk_fts_text   = $bst_block_fields['fh_var_blk_fts_text'] ?? null;
		$fh_var_blk_fts_button = $bst_block_fields['fh_var_blk_fts_button'] ?? null;
		$fh_var_blk_fts_image       = $bst_block_fields['fh_var_blk_fts_image'] ?? null;

		?>

		<section <?php if($fh_var_blk_fts_image){ echo 'style="background-image: url(' . esc_url($fh_var_blk_fts_image) . ');"';} ?>>
			<div class="wrapper">
				<div class="feature-block variation">
					<div class="section-head">
						<?php if ( $fh_var_blk_fts_kicker ) {  ?>
							<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_blk_fts_kicker ); ?></div>
						<?php } ?>
						<?php if ( $fh_var_blk_fts_title ) {  ?>
							<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_fts_title ); ?></h2>
						<?php } ?>
					</div>
					<?php if ( $fh_var_blk_fts_text ) { ?>
						<?php echo html_entity_decode( $fh_var_blk_fts_text ); ?>
					<?php } ?>

					<?php if ( $fh_var_blk_fts_button ) { ?>
						<div class="feature-buttons">
							<?php echo BaseTheme::button( $fh_var_blk_fts_button, 'button' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	}
);

