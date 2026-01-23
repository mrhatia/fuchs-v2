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
		$bst_var_blk_mat_design_variation        = $bst_block_fields['bst_var_blk_mat_design_variation'] ?? null;
		$bst_var_blk_mat_kicker        = $bst_block_fields['bst_var_blk_mat_kicker'] ?? null;
		$bst_var_blk_mat_title        = $bst_block_fields['bst_var_blk_mat_title'] ?? null;
		$bst_var_blk_mat_text        = $bst_block_fields['bst_var_blk_mat_text'] ?? null;
		$bst_var_blk_mat_button        = $bst_block_fields['bst_var_blk_mat_button'] ?? null;
		$bst_var_blk_mat_image        = $bst_block_fields['bst_var_blk_mat_image'] ?? null;
		$bst_var_blk_mat_image_two        = $bst_block_fields['bst_var_blk_mat_image_two'] ?? null;
		$bst_var_blk_mat_img_location = $bst_block_fields['bst_var_blk_mat_img_position'] ?? null;

		?>

		<?php if($bst_var_blk_mat_design_variation === "regular"){
			$bst_var_blk_mat_img_location        = ("left" == $bst_var_blk_mat_img_location) ? " image-at-left " : " image-at-right ";
			$bst_var_blk_mat_has_two_images        = ($bst_var_blk_mat_image_two) ? " iat-two-image " : "";

			?>
			<section>
				<div class="wrapper">
					<div
						class="image-alongside-text <?php echo $bst_var_blk_mat_img_location.$bst_var_blk_mat_has_two_images; ?> d-flex justify-content-between flex-wrap align-items-center">
						<div class="iat-content column">
							<?php if ( $bst_var_blk_mat_kicker ) {  ?>
								<div class="kicker"><?php echo html_entity_decode( $bst_var_blk_mat_kicker ); ?></div>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_title ) {  ?>
								<h2><?php echo html_entity_decode( $bst_var_blk_mat_title ); ?></h2>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_mat_text ); ?>
							<?php } ?>

							<?php if ( $bst_var_blk_mat_button ) { ?>
								<?php echo BaseTheme::button( $bst_var_blk_mat_button, 'button orange-button' ); ?>
							<?php } ?>
						</div>
						<div class="iat-image column">
							<?php if ( $bst_var_blk_mat_image ) { ?>
								<div class="iat-single-image image-cover">
									<?php BaseTheme::the_attachment_image( $bst_var_blk_mat_image, 1000 ); ?>
								</div>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_image_two ) { ?>
								<div class="iat-single-image image-cover">
									<?php BaseTheme::the_attachment_image( $bst_var_blk_mat_image_two, 1000 ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		<?php } else if($bst_var_blk_mat_design_variation === "large-image"){
			$bst_var_blk_mat_img_location        = ("left" == $bst_var_blk_mat_img_location) ? "media-with-text-variation" : "variation";
			?>
			<section class="ctn-full-width">
				<div class="wrapper">
					<div class="media-with-text <?php echo $bst_var_blk_mat_img_location; ?>">

						<?php if ( $bst_var_blk_mat_image ) { ?>
							<div class="media-with-text-image image-cover">
								<?php BaseTheme::the_attachment_image( $bst_var_blk_mat_image, 1000 ); ?>
							</div>
						<?php } ?>
						<div class="media-with-text-content-box iat-image-appear">
							<?php if ( $bst_var_blk_mat_kicker ) {  ?>
								<div class="kicker"><?php echo html_entity_decode( $bst_var_blk_mat_kicker ); ?></div>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_title ) {  ?>
								<h2 class="heading-2"><?php echo html_entity_decode( $bst_var_blk_mat_title ); ?></h2>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_mat_text ); ?>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_button ) { ?>
								<div class="media-with-text-button">
									<?php echo BaseTheme::button( $bst_var_blk_mat_button, 'button' ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<!-- Big Iat block -->
			<section class="ctn-full-width">
				<div class="wrapper">
					<div class="applicants-questions">
						<?php if ( $bst_var_blk_mat_image ) { ?>
							<div class="applicants-image image-cover">
								<?php BaseTheme::the_attachment_image( $bst_var_blk_mat_image, 1000 ); ?>
							</div>
						<?php } ?>
						<div class="applicants-content">
							<?php if ( $bst_var_blk_mat_kicker ) {  ?>
								<div class="kicker-text"><?php echo html_entity_decode( $bst_var_blk_mat_kicker ); ?></div>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_title ) {  ?>
								<h2 class="heading-3"><?php echo html_entity_decode( $bst_var_blk_mat_title ); ?></h2>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_mat_text ); ?>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_button ) { ?>
								<?php echo BaseTheme::button( $bst_var_blk_mat_button, 'button white-button' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
);

