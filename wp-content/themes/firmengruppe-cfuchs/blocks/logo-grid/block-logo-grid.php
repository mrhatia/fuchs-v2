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
		$fh_var_blk_logos     = $bst_block_fields['fh_var_blk_icon_columns'] ?? null;
		?>

		<?php if($fh_var_blk_logos){ ?>
			<section>
				<div class="wrapper">
					<div class="logo-grid align-items-center justify-content-around">
						<?php foreach ( $fh_var_blk_logos as $logo ) {
							$column_logo       = $logo['logo'] ?? null;
							?>
							<?php if ( $column_logo ) { ?>
								<div class="single-logo">
									<?php BaseTheme::the_attachment_image( $column_logo, 500 ); ?>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
);
