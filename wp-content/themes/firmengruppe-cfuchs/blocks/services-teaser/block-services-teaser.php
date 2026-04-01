<?php
/**
 * Block Name: Icon Grid
 *
 * The template for displaying the custom gutenberg block named Icon Grid.
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
			$fh_var_blk_srvtile_links     = $bst_block_fields['fh_var_blk_srvtile_links'] ?? null;

			$fh_var_blk_srvtile_kicker     = $bst_block_fields['fh_var_blk_srvtile_kicker'] ?? null;
			$fh_var_blk_srvtile_bgtext     = $bst_block_fields['fh_var_blk_srvtile_bgtext'] ?? null;

			?>

			<section class="ctn-full-width" id="einblicke-section">
				<div class="wrapper">
					<div class="masonry-gallery-main">

						<?php if($fh_var_blk_srvtile_kicker || $fh_var_blk_srvtile_bgtext){ ?>
							<div class="section-head">
								<?php if ( $fh_var_blk_srvtile_bgtext ) {  ?>
									<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_blk_srvtile_bgtext ); ?></div>
								<?php } ?>
								<?php if ( $fh_var_blk_srvtile_kicker ) {  ?>
									<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_srvtile_kicker ); ?></h2>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<?php if($fh_var_blk_srvtile_links){ ?>
						<div class="masonry-gallery">
							<?php
							foreach ( $fh_var_blk_srvtile_links as $column ) {
								$column_kicker      = $column['kicker'] ?? null;
								$column_link   	= $column['link'] ?? null;
								$column_image   	= $column['image'] ?? null;
								?>

									<div class="masonry-single-item">
										<a href="<?php echo esc_url( $column_link['url'] ); ?>">
											<div class="masonry-image image-cover">
												<?php if ( $column_image ) { ?>
													<?php BaseTheme::the_attachment_image( $column_image, 500 ); ?>
												<?php } ?>
											</div>
											<div class="single-image-content">

												<?php if ( $column_kicker ) {  ?>
													<div class="small-text"><?php echo html_entity_decode( $column_kicker ); ?></div>
												<?php } ?>
												<div class="service-title">
													<h3 class="heading-4"><?php echo html_entity_decode( $column_link['title'] ); ?></h3>
												</div>
												<div class="plus-button">
													+
												</div>
											</div>
										</a>
									</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</section>
		<?php
	}
);

