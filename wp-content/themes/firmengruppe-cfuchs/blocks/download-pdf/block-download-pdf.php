<?php
/**
 * Block Name: Download PDF
 *
 * The template for displaying the custom gutenberg block named Download PDF.
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
			$fh_var_blk_dpdf_links     = $bst_block_fields['fh_var_blk_dpdf_links'] ?? null;
			$fh_var_blk_dpdf_kicker     = $bst_block_fields['fh_var_blk_dpdf_kicker'] ?? null;
			$fh_var_blk_dpdf_title     = $bst_block_fields['fh_var_blk_dpdf_title'] ?? null;

			?>

		<section class="ctn-white">
			<div class="wrapper">
				<?php if($fh_var_blk_dpdf_kicker || $fh_var_blk_dpdf_title){ ?>
					<div class="section-head">
						<?php if ( $fh_var_blk_dpdf_kicker ) {  ?>
							<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_blk_dpdf_kicker ); ?></div>
						<?php } ?>
						<?php if ( $fh_var_blk_dpdf_title ) {  ?>
							<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_dpdf_title ); ?></h2>
						<?php } ?>
					</div>
				<?php } ?>

				<?php if($fh_var_blk_dpdf_links){ ?>
					<div class="two-columns-content-tiles two-columns">
						<?php
						foreach ( $fh_var_blk_dpdf_links as $column ) {
							$heading      = $column['heading'] ?? null;
							$text   	= $column['text'] ?? null;
							$file   	= $column['file'] ?? null;
							?>

								<div class="two-columns-content-tile">
									<?php if ( $heading ) {  ?>
										<h3 class="columns-content-tile-title heading-5"><?php echo html_entity_decode( $heading ); ?></h3>
									<?php } ?>
									<?php if($text){ ?>
										<div class="columns-content-tile-paragraph">
											<?php echo html_entity_decode($text); ?>
										</div>
									<?php } ?>
									<?php if ( $file ) { ?>
										<div class="s-44"></div>
										<div class="columns-content-tile-button">

											<?php
												$button = array(
													'url'    => esc_url( $file['url'] ),
													'title'  => esc_html( 'Download PDF' ),
													'target' => '_blank',
												);
											?>

											<a class="button orange-button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>">
												<?php echo $button['title']; ?>
											</a>
										</div>
									<?php } ?>
								</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>

		<?php
	}
);
