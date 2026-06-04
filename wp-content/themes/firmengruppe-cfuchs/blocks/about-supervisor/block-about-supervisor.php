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
		$bst_var_blk_asup_main_button        = $bst_block_fields['bst_var_blk_asup_main_button'] ?? null;
		$bst_var_blk_asup_phone        = $bst_block_fields['bst_var_blk_asup_phone'] ?? null;
		$bst_var_blk_asup_email        = $bst_block_fields['bst_var_blk_asup_email'] ?? null;
		$bst_var_blk_asup_button        = $bst_block_fields['bst_var_blk_asup_button'] ?? null;
		$bst_var_blk_asup_image        = $bst_block_fields['bst_var_blk_asup_image'] ?? null;
		$bst_var_blk_asup_img_location = $bst_block_fields['bst_var_blk_asup_img_position'] ?? null;
		$bst_var_blk_asup_img_location        = ("left" == $bst_var_blk_asup_img_location) ? " image-at-left " : " image-at-right ";

		$bst_var_blk_asup_name        = $bst_block_fields['bst_var_blk_asup_name'] ?? null;
		$bst_var_blk_asup_designation        = $bst_block_fields['bst_var_blk_asup_designation'] ?? null;
		$bst_var_blk_asup_bio        = $bst_block_fields['bst_var_blk_asup_bio'] ?? null;
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
							<?php if ( $bst_var_blk_asup_main_button ) { ?>
								<?php echo BaseTheme::button( $bst_var_blk_asup_main_button, 'button orange-button' ); ?>
							<?php } ?>
						</div>
						<div class="iat-image column">
							<?php if($bst_var_blk_asup_button){ ?>
								<?php if ( $bst_var_blk_asup_image ) { ?>
									<div class="iat-single-image image-cover">

										<a href="#member-about-supervisor" class="popup-link image-link" >
											<?php BaseTheme::the_attachment_image( $bst_var_blk_asup_image, 1000 ); ?>
											<div class="reveal-content">
												<span class="button white-button" tabindex="0"><?php echo html_entity_decode( $bst_var_blk_asup_button ); ?></span>
											</div>
										</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<?php if ( $bst_var_blk_asup_image ) { ?>
									<div class="iat-single-image image-cover">
										<?php BaseTheme::the_attachment_image( $bst_var_blk_asup_image, 1000 ); ?>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>

				<div class="member-popup mfp-hide" id="member-about-supervisor">
					<div class="member-popup-inner">
						<div class="member-popup-left">
							<div class="member-popup-image image-cover" tabindex="0">
								<?php if ( $bst_var_blk_asup_image ) {
									 BaseTheme::the_attachment_image( $bst_var_blk_asup_image, 1000 );
								} ?>
							</div>
						</div>
						<div class="member-popup-right">
							<div class="close-icon mfp-close" role="button" tabindex="0">
							</div>
							<div class="member-popup-right-inner">
								<h2 class="heading-2" tabindex="0"><?php echo $bst_var_blk_asup_name; ?> </h2>
								<?php if($bst_var_blk_asup_designation){ ?>
									<div class="team-member-designation" tabindex="0"><?php echo html_entity_decode($bst_var_blk_asup_designation); ?></div>
								<?php } ?>
								<?php if($bst_var_blk_asup_bio){ ?>
									<div class="team-member-text">
										<?php echo html_entity_decode($bst_var_blk_asup_bio); ?>
									</div>
								<?php } ?>
								<div class="member-contact-info d-flex align-content-center">
									<?php if($bst_var_blk_asup_email) { ?>
										<div class="email link-green">
											<a href="mailto:<?php echo $bst_var_blk_asup_email; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/email-icon-green.svg" alt=""> <?php echo $bst_var_blk_asup_email; ?></a>
										</div>
									<?php } ?>
									<?php if($bst_var_blk_asup_phone) { ?>
										<div class="phone link-green">
											<a href="tel:<?php echo $bst_var_blk_asup_phone; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/phone-icon-green.png" alt=""> <?php echo $bst_var_blk_asup_phone; ?></a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>

					</div>
				</div>


		<?php
	}
);
