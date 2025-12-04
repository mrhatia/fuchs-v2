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
		$bst_var_blk_cnt_kicker        = $bst_block_fields['bst_var_blk_cnt_kicker'] ?? null;
		$bst_var_blk_cnt_title        = $bst_block_fields['bst_var_blk_cnt_title'] ?? null;
		$bst_var_blk_cnt_text = $bst_block_fields['bst_var_blk_cnt_text'] ?? null;
		$bst_var_blk_cnt_form_shortcode = $bst_block_fields['bst_var_blk_cnt_form_shortcode'] ?? null;

$bst_var_social_profiles = $bst_option_fields['bst_var_social_profiles'] ?? null;

		?>

		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="contact-block">
					<?php if($bst_var_blk_cnt_form_shortcode){ ?>
						<div class="contact-block-form">
							<div class="contact-inner">
								<?php echo html_entity_decode($bst_var_blk_cnt_form_shortcode); ?>
							</div>
						</div>
					<?php } ?>
					<div class="contact-block-content">
						<div class="contact-block-content-inner">
							<?php if ( $bst_var_blk_cnt_kicker ) {  ?>
								<div class="kicker-text"><?php echo html_entity_decode( $bst_var_blk_cnt_kicker ); ?></div>
							<?php } ?>

							<?php if ( $bst_var_blk_cnt_title ) {  ?>
								<h2 class="heading-2"><?php echo html_entity_decode( $bst_var_blk_cnt_title ); ?></h2>
							<?php } ?>
							<?php if ( $bst_var_blk_cnt_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_cnt_text ); ?>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

