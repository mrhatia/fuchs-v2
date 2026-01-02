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
		$fh_var_blk_lgd_kicker     = $bst_block_fields['fh_var_blk_lgd_kicker'] ?? null;
		$fh_var_blk_lgd_title     = $bst_block_fields['fh_var_blk_lgd_title'] ?? null;
		$fh_var_blk_lgd_design_variation     = $bst_block_fields['fh_var_blk_lgd_design_variation'] ?? null;
		$fh_var_blk_logos     = $bst_block_fields['fh_var_blk_icon_columns'] ?? null;
		?>
		<?php if($fh_var_blk_lgd_design_variation === 'full-width'){ ?>
			<section class="ctn-dots">
				<div class="wrapper">
					<div class="logos-section">

						<?php if($fh_var_blk_lgd_kicker || $fh_var_blk_lgd_title){ ?>
							<div class="section-head">
								<?php if ( $fh_var_blk_lgd_kicker ) {  ?>
									<div class="kicker-text"><?php echo html_entity_decode( $fh_var_blk_lgd_kicker ); ?></div>
								<?php } ?>
								<?php if ( $fh_var_blk_lgd_title ) {  ?>
									<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_lgd_title ); ?></h2>
								<?php } ?>
							</div>
						<?php } ?>

						<?php if($fh_var_blk_logos){ ?>

							<div class="logos-items four-columns">
								<?php foreach ( $fh_var_blk_logos as $logo ) {
									$column_logo       = $logo['logo'] ?? null;
									$link       = $logo['link'] ?? null;
									?>
									<?php if($link): ?>
									<a href="<?php echo esc_url($link); ?>">
									<?php endif; ?>
										<?php if ( $column_logo ) { ?>

											<div class="logo-item-single">
												<?php BaseTheme::the_attachment_image( $column_logo, 500 ); ?>
												<?php BaseTheme::the_attachment_image( $column_logo, 500 ); ?>
											</div>
										<?php } ?>
									<?php if($link): ?>
									</a>
									<?php endif; ?>

								<?php } ?>

							</div>

						<?php } ?>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<section class="ctn-1700 overflow-top-200">
				<div class="wrapper">
					<div class="logos-section variation">

						<?php if($fh_var_blk_lgd_kicker || $fh_var_blk_lgd_title){ ?>
							<div class="section-head">
								<?php if ( $fh_var_blk_lgd_kicker ) {  ?>
									<div class="kicker-text"><?php echo html_entity_decode( $fh_var_blk_lgd_kicker ); ?></div>
								<?php } ?>
								<?php if ( $fh_var_blk_lgd_title ) {  ?>
									<h2 class="heading-3"><?php echo html_entity_decode( $fh_var_blk_lgd_title ); ?></h2>
								<?php } ?>
							</div>
						<?php } ?>

						<?php if($fh_var_blk_logos){ ?>

							<div class="logos-items logos-four-columns">
								<?php foreach ( $fh_var_blk_logos as $logo ) {
									$column_logo       = $logo['logo'] ?? null;
									$link       = $logo['link'] ?? null;
									?>
									<?php if($link): ?>
									<a href="<?php echo esc_url($link); ?>">
									<?php endif; ?>
										<?php if ( $column_logo ) { ?>

											<div class="logo-item-single">
												<?php BaseTheme::the_attachment_image( $column_logo, 500 ); ?>
												<?php BaseTheme::the_attachment_image( $column_logo, 500 ); ?>
											</div>
										<?php } ?>
									<?php if($link): ?>
									</a>
									<?php endif; ?>

								<?php } ?>

							</div>

						<?php } ?>


					</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
);
