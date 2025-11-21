<?php
/**
 * Block Name: Image Collage
 *
 * The template for displaying the custom gutenberg block named Image Collage.
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

		$bst_var_blk_coll_title        = $bst_block_fields['bst_var_blk_coll_title'] ?? null;
		$bst_var_blk_coll_text        = $bst_block_fields['bst_var_blk_coll_text'] ?? null;
		$bst_var_blk_coll_sub_title        = $bst_block_fields['bst_var_blk_coll_sub_title'] ?? null;
		$bst_var_blk_coll_project_info        = $bst_block_fields['bst_var_blk_coll_project_info'] ?? null;
		$bst_var_blk_coll_collage_images        = $bst_block_fields['bst_var_blk_coll_collage_images'] ?? null;


		?>

		<section>
			<div class="wrapper">
				<div class="project-info">
					<?php if($bst_var_blk_coll_collage_images){ ?>
						<div class="project-info-images">
							<?php foreach( $bst_var_blk_coll_collage_images as $key =>  $image ){
									$image = (isset($image['image']) ) ? $image['image'] : null;
								?>

								<div class="project-info-single-image image-cover">
									<?php if ( $image ) { ?>
										<?php BaseTheme::the_attachment_image( $image, 1000 ); ?>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<div class="project-info-content">
						<div class="project-info-single">
							<?php if ( $bst_var_blk_coll_title ) {  ?>
								<h2 class="heading-2"><?php echo html_entity_decode( $bst_var_blk_coll_title ); ?></h2>
							<?php } ?>

							<?php if ( $bst_var_blk_coll_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_coll_text ); ?>
							<?php } ?>
						</div>

						<div class="project-info-single">
							<?php if ( $bst_var_blk_coll_sub_title ) {  ?>
								<h2 class="heading-3"><?php echo html_entity_decode( $bst_var_blk_coll_sub_title ); ?></h2>
							<?php } ?>

							<?php if ( $bst_var_blk_coll_project_info ) {  ?>
								<div class="info-single-detail">
									<?php echo html_entity_decode( $bst_var_blk_coll_project_info ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

