<?php
/**
 * Block Name: Cta Section
 *
 * The template for displaying the custom gutenberg block named Cta Section.
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

			$fh_var_blk_cta_background_text = $bst_block_fields['fh_var_blk_cta_background_text'] ?? null;
			$fh_var_blk_cta_slide_title   		= $bst_block_fields['fh_var_blk_cta_slide_title'] ?? null;
			$fh_var_blk_cta_slide_text   = $bst_block_fields['fh_var_blk_cta_text'] ?? null;
			$fh_var_blk_cta_slide_button_one = $bst_block_fields['fh_var_blk_cta_button_one'] ?? null;
			$fh_var_blk_cta_slide_button_two = $bst_block_fields['fh_var_blk_cta_button_two'] ?? null;
			$fh_var_blk_cta_slide_image       = $bst_block_fields['fh_var_blk_cta_image'] ?? null;

		?>
	<section class="ctn-full-width">
		<div class="wrapper">
			<div class="hero-inner-slider full-width-image">

				<div class="hero-slide-item">
					<?php if ( $fh_var_blk_cta_slide_image ) { ?>
						<div class="hero-slide-image" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
							<?php BaseTheme::the_attachment_image( $fh_var_blk_cta_slide_image, 2000 ); ?>
						</div>
					<?php } ?>

					<div class="banner-content">
						<div class="banner-content-inner">
						<?php if ( $fh_var_blk_cta_background_text ) {  ?>
							<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_blk_cta_background_text ); ?></div>
						<?php } ?>

						<?php if ( $fh_var_blk_cta_slide_title ) {  ?>
							<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_cta_slide_title ); ?></h2>
						<?php } ?>

						<?php if ( $fh_var_blk_cta_slide_text ) { ?>
							<?php echo html_entity_decode( $fh_var_blk_cta_slide_text ); ?>
						<?php } ?>

						<div class="hero-buttons">
							<?php if ( $fh_var_blk_cta_slide_button_one ) { ?>
								<?php echo BaseTheme::button( $fh_var_blk_cta_slide_button_one, 'button orange-button' ); ?>
							<?php } ?>
							<?php if ( $fh_var_blk_cta_slide_button_two ) { ?>
								<?php echo BaseTheme::button( $fh_var_blk_cta_slide_button_two, 'button green-button' ); ?>
							<?php } ?>
						</div>
					</div>
					</div>
				</div>

			</div>
		</div>
	</section>

		<?php
	}
);

?>


<style>
.hero-slide-image {
	position: relative;
	overflow: hidden;
}

.hero-slide-image img {
	position: absolute;
	top: -50px;
	left: 0;
	width: 100%;
	height: 120%;
	object-fit: cover;
	transform: translateY(0);
	will-change: transform;
	transition: transform 0.1s linear;
}
</style>

<script>
document.addEventListener("scroll", function() {
  const images = document.querySelectorAll(".hero-slide-image img");

  images.forEach(function(img) {
    const section = img.closest(".hero-slide-item");
    const rect = section.getBoundingClientRect();

    // Only animate if the section is visible
    if (rect.top < window.innerHeight) {
      const progress = rect.top / window.innerHeight;
      img.style.transform = "translateY(" + progress * 60 + "px)";
    }
  });
});
</script>
