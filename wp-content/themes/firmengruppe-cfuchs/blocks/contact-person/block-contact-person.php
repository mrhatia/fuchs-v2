<?php
/**
 * Block Name: Contact Person
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
		$bst_var_blk_ctp_kicker        = $bst_block_fields['bst_var_blk_ctp_kicker'] ?? null;
		$bst_var_blk_ctp_title        = $bst_block_fields['bst_var_blk_ctp_title'] ?? null;
		$bst_var_blk_ctp_text        = $bst_block_fields['bst_var_blk_ctp_text'] ?? null;
		$bst_var_blk_ctp_email        = $bst_block_fields['bst_var_blk_ctp_email'] ?? null;
		$bst_var_blk_ctp_phone        = $bst_block_fields['bst_var_blk_ctp_phone'] ?? null;
		$bst_var_blk_ctp_button_one        = $bst_block_fields['bst_var_blk_ctp_button_one'] ?? null;
		$bst_var_blk_ctp_button_two        = $bst_block_fields['bst_var_blk_ctp_button_two'] ?? null;
		$bst_var_blk_ctp_image = $bst_block_fields['bst_var_blk_ctp_image'] ?? null;
		$bst_var_blk_ctp_designation = $bst_block_fields['bst_var_blk_ctp_designation'] ?? null;
		$bst_var_blk_ctp_name = $bst_block_fields['bst_var_blk_ctp_name'] ?? null;
		?>

		<div id="contact-person"></div>
		<section>
			<div class="wrapper">
				<div class="offering-block">
					<div class="offering-block-left">
						<?php if ( $bst_var_blk_ctp_image ) { ?>
							<div class="offering-block-image image-cover">
								<?php BaseTheme::the_attachment_image( $bst_var_blk_ctp_image, 1000 ); ?>
							</div>
						<?php } ?>
						<?php if($bst_var_blk_ctp_designation){ ?>
							<div class="author-tag kicker">
								<?php echo html_entity_decode($bst_var_blk_ctp_designation); ?>
							</div>
						<?php } ?>
						<?php if($bst_var_blk_ctp_name){ ?>
							<h2 class="heading-3 author-name">
								<?php echo html_entity_decode($bst_var_blk_ctp_name); ?>
							</h2>
						<?php } ?>
					</div>
					<div class="offering-block-content">

						<?php if ( $bst_var_blk_ctp_kicker ) {  ?>
							<div class="kicker"><?php echo html_entity_decode( $bst_var_blk_ctp_kicker ); ?></div>
						<?php } ?>

						<?php if ( $bst_var_blk_ctp_title ) {  ?>
							<h2 class="heading-2"><?php echo html_entity_decode( $bst_var_blk_ctp_title ); ?></h2>
						<?php } ?>

						<?php if ( $bst_var_blk_ctp_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_ctp_text ); ?>
						<?php } ?>


						<?php if ( $bst_var_blk_ctp_email ) {  ?>
							<a href="mailto:<?php echo esc_url($bst_var_blk_ctp_email); ?>" class="link email">
								<?php echo html_entity_decode( $bst_var_blk_ctp_email ); ?>
							</a>
						<?php } ?>

						<?php if ( $bst_var_blk_ctp_phone ) {  ?>
							<a href="tel:<?php echo esc_url($bst_var_blk_ctp_phone); ?>" class="link phone">
								<?php echo html_entity_decode( $bst_var_blk_ctp_phone ); ?>
							</a>
						<?php } ?>

						<?php if ( $bst_var_blk_ctp_button_one || $bst_var_blk_ctp_button_two ) { ?>
							<div class="offering-button">
								<?php if($bst_var_blk_ctp_button_one){ ?>
									<?php echo BaseTheme::button( $bst_var_blk_ctp_button_one, 'button orange-button' ); ?>
								<?php } ?>

								<?php if($bst_var_blk_ctp_button_two){ ?>
									<?php echo BaseTheme::button( $bst_var_blk_ctp_button_two, 'button' ); ?>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

