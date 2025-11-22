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
		$fh_var_blk_srvlnk_links     = $bst_block_fields['fh_var_blk_srvlnk_links'] ?? null;

			$fh_var_blk_srvlnk_kicker     = $bst_block_fields['fh_var_blk_srvlnk_kicker'] ?? null;
			$fh_var_blk_srvlnk_title     = $bst_block_fields['fh_var_blk_srvlnk_title'] ?? null;

			?>

		<section>
			<div class="wrapper">
				<div class="services-block">
					<?php if($fh_var_blk_srvlnk_kicker || $fh_var_blk_srvlnk_title){ ?>
						<div class="section-head">
							<?php if ( $fh_var_blk_srvlnk_kicker ) {  ?>
								<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_blk_srvlnk_kicker ); ?></div>
							<?php } ?>
							<?php if ( $fh_var_blk_srvlnk_title ) {  ?>
								<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_srvlnk_title ); ?></h2>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if($fh_var_blk_srvlnk_links){ ?>
						<div class="services-items three-columns">
							<?php
							foreach ( $fh_var_blk_srvlnk_links as $column ) {
								$column_kicker      = $column['kicker'] ?? null;
								$column_link   	= $column['link'] ?? null;
								?>

									<div class="service-single-item">
										<a href="<?php echo esc_url( $column_link['url'] ); ?>">
											<?php if ( $column_kicker ) {  ?>
												<div class="small-text"><?php echo html_entity_decode( $column_kicker ); ?></div>
											<?php } ?>
											<div class="service-title">
												<h3 class="heading-4"><?php echo html_entity_decode( $column_link['title'] ); ?></h3>
											</div>
											<div class="plus-button">
												+
											</div>
										</a>
									</div>
							<?php } ?>
						</div>
					<?php } ?>

				</div>
			</div>
		</section>

		<?php
	}
);

