<?php
/**
 * Block Name: Image Gallery
 *
 * The template for displaying the custom gutenberg block named Image Gallery.
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
			$fh_var_blk_imggal_links     = $bst_block_fields['fh_var_blk_imggal_links'] ?? null;

			$fh_var_blk_imggal_kicker     = $bst_block_fields['fh_var_blk_imggal_kicker'] ?? null;
			$fh_var_blk_imggal_bgtext     = $bst_block_fields['fh_var_blk_imggal_bgtext'] ?? null;

			?>

			<section class="ctn-full-width image-gallery-section" id="image-gallery-section">
				<div class="wrapper">
					<div class="masonry-gallery-main">

						<?php if($fh_var_blk_imggal_kicker || $fh_var_blk_imggal_bgtext){ ?>
							<div class="section-head">
								<?php if ( $fh_var_blk_imggal_bgtext ) {  ?>
									<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_blk_imggal_bgtext ); ?></div>
								<?php } ?>
								<?php if ( $fh_var_blk_imggal_kicker ) {  ?>
									<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_imggal_kicker ); ?></h2>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<?php if($fh_var_blk_imggal_links){ ?>
						<div class="masonry-gallery">
							<?php
							foreach ( $fh_var_blk_imggal_links as $column ) {
								$column_kicker      = $column['kicker'] ?? null;
								$column_title   	= $column['title'] ?? null;
								$column_image   	= $column['image'] ?? null;
								?>

									<div class="masonry-single-item">
										<a
											href="<?php echo wp_get_attachment_image_url( $column_image, 'full' ); ?>"
											data-fancybox="reference-gallery"
											data-caption="<?php echo esc_attr( $column_title ); ?>"
										>
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
													<h3 class="heading-4"><?php echo html_entity_decode( $column_title ); ?></h3>
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

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.umd.js"></script>

<script>
	Fancybox.bind('[data-fancybox="reference-gallery"]', {
    Toolbar: {
        display: [
            "close"
        ]
    }
});
</script>
