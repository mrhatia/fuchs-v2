<?php
/**
 * Block Name: About Supervisor
 *
 * The template for displaying the custom gutenberg block named About Supervisor.
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
		$bst_var_blk_asup_kicker        = $bst_block_fields['bst_var_blk_asup_kicker'] ?? null;
		$bst_var_blk_asup_title        = $bst_block_fields['bst_var_blk_asup_title'] ?? null;
		$bst_var_blk_asup_text        = $bst_block_fields['bst_var_blk_asup_text'] ?? null;
		$bst_var_blk_asup_phone        = $bst_block_fields['bst_var_blk_asup_phone'] ?? null;
		$bst_var_blk_asup_email        = $bst_block_fields['bst_var_blk_asup_email'] ?? null;
		$bst_var_blk_asup_button        = $bst_block_fields['bst_var_blk_asup_button'] ?? null;
		$bst_var_blk_asup_image        = $bst_block_fields['bst_var_blk_asup_image'] ?? null;
		$bst_var_blk_asup_img_location = $bst_block_fields['bst_var_blk_asup_img_position'] ?? null;
		$bst_var_blk_asup_img_location        = ("left" == $bst_var_blk_asup_img_location) ? " image-at-left " : " image-at-right ";

		?>

			<section>
				<div class="wrapper">
					<div
						class="image-alongside-text about-supervisor-section <?php echo $bst_var_blk_asup_img_location; ?> d-flex justify-content-between flex-wrap align-items-center">
						<div class="iat-content column">
							<?php if ( $bst_var_blk_asup_kicker ) {  ?>
								<div class="kicker"><?php echo html_entity_decode( $bst_var_blk_asup_kicker ); ?></div>
							<?php } ?>
							<?php if ( $bst_var_blk_asup_title ) {  ?>
								<h2><?php echo html_entity_decode( $bst_var_blk_asup_title ); ?></h2>
							<?php } ?>
							<?php if ( $bst_var_blk_asup_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_asup_text ); ?>
							<?php } ?>
							<!-- <div class="member-contact-info d-flex align-content-center">
								<?php if ( $bst_var_blk_asup_email ) {  ?>
									<div class="email white-icon link-green">
										<a href="mailto:<?php echo html_entity_decode( $bst_var_blk_asup_email ); ?>" class="gmail">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/email-icon-green.svg" alt="">
										</a>
									</div>
								<?php } ?>
								<?php if ( $bst_var_blk_asup_phone ) {  ?>
									<div class="phone white-icon link-green">
										<a href="tel:<?php echo html_entity_decode( $bst_var_blk_asup_phone ); ?>" class="phone">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/phone-icon-green.png" alt="">
										</a>
									</div>
								<?php } ?>

							</div> -->


						</div>
						<div class="iat-image column">
							<?php if ( $bst_var_blk_asup_image ) { ?>
							<div class="iat-single-image image-cover">
									<?php if ( $bst_var_blk_asup_button ) { ?>
										<a href="<?php echo esc_url( $bst_var_blk_asup_button['url'] ); ?>" title="<?php echo html_entity_decode( $bst_var_blk_asup_button['title'] ); ?>" aria-label="<?php echo html_entity_decode( $bst_var_blk_asup_button['title'] ); ?>" class="image-link">
											<?php BaseTheme::the_attachment_image( $bst_var_blk_asup_image, 1000 ); ?>
											<div class="reveal-content">
												<span class="button white-button" tabindex="0"><?php echo html_entity_decode( $bst_var_blk_asup_button['title'] ); ?></span>
											</div>
										</a>
									<?php } else { ?>
										<?php BaseTheme::the_attachment_image( $bst_var_blk_asup_image, 1000 ); ?>
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
