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
		$fh_var_blk_tst_slider_variation     = $bst_block_fields['fh_var_blk_tst_slider_variation'] ?? null;
		$fh_var_blk_tst_testimonials     = $bst_block_fields['fh_var_blk_tst_testimonials'] ?? null;
		$fh_var_blk_tst_heading     = $bst_block_fields['fh_var_blk_tst_heading'] ?? null;
		$fh_var_blk_tst_kicker     = $bst_block_fields['fh_var_blk_tst_kicker'] ?? null;
		?>

		<?php if($fh_var_blk_tst_testimonials && 'hslider' === $fh_var_blk_tst_slider_variation){ ?>
			<section>
				<div class="wrapper">
					<div class="testimonial-slider">
						<?php foreach ( $fh_var_blk_tst_testimonials as $column ) {
								$column_kicker      = $column['kicker'] ?? null;
								$column_title   	= $column['title'] ?? null;
								$column_text   = $column['text'] ?? null;
								$column_icon       = $column['image'] ?? null;
								?>

								<div class="testimonial-item">
									<?php if ( $column_icon ) { ?>
										<div class="testimonial-item-image image-cover">
											<?php BaseTheme::the_attachment_image( $column_icon, 500 ); ?>
										</div>
									<?php } ?>
									<div class="testimonial-item-content">
										<?php if ( $column_kicker ) {  ?>
											<div class="small-text"><?php echo html_entity_decode( $column_kicker ); ?></div>
										<?php } ?>

										<?php if ( $column_title ) {  ?>
											<h2 class="heading-3"><?php echo html_entity_decode( $column_title ); ?></h2>
										<?php } ?>

										<?php if ( $column_text ) {  ?>
											<?php echo html_entity_decode( $column_text ); ?>
										<?php } ?>
									</div>
								</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<section>
				<div class="wrapper">
				<div class="section-head testimonial-heading">
					<?php if ( $fh_var_blk_tst_kicker ) { ?>
						<div class="kicker">
							<?php echo $fh_var_blk_tst_kicker; ?>
						</div>
					<?php } ?>

					<?php if ( $fh_var_blk_tst_heading ) { ?>
						<h2 class="heading-2">
							<?php echo $fh_var_blk_tst_heading; ?>
						</h2>
					<?php } ?>
				</div>

					<div class="swiper testimonial-variation">
						<div class="swiper-wrapper">
							<?php foreach ( $fh_var_blk_tst_testimonials as $column ) {
								$column_kicker      = $column['kicker'] ?? null;
								$column_title   	= $column['title'] ?? null;
								$column_text   = $column['text'] ?? null;
								$column_icon       = $column['icon'] ?? null;
								$image       = $column['image'] ?? null;
								?>
									<div class="swiper-slide testimonial-single">
										<div class="testimonial-single-image image-cover  mobile-hide">
											<?php if ( $image ) { ?>
												<?php BaseTheme::the_attachment_image( $image, 500 ); ?>
											<?php } ?>

										</div>
										<div class="testimonial-single-content">
											<?php if ( $column_text ) {  ?>
												<div class="testimonial-text">
													<?php echo html_entity_decode( $column_text ); ?>
												</div>
											<?php } ?>
											<div class="testimonial-meta">
												<?php if ( $column_kicker ) {  ?>
													<span class="testimonial-role"><?php echo html_entity_decode( $column_kicker ); ?></span>
												<?php } ?>
												<?php if ( $column_title ) {  ?>
													<h4 class="testimonial-name"><?php echo html_entity_decode( $column_title ); ?></h4>
												<?php } ?>
											</div>
										</div>
									</div>
							<?php } ?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</section>
		<script>
document.addEventListener('DOMContentLoaded', function () {

    function updateHeight(swiper) {
        const active = swiper.slides[swiper.activeIndex];
        if (active) {
            swiper.el.style.height = active.offsetHeight + "px";
        }
    }

    function initSwiper() {
        if (window.testimonialSwiper) {
            window.testimonialSwiper.destroy(true, true);
        }

        window.testimonialSwiper = new Swiper(".testimonial-variation", {
            effect: "fade",
            fadeEffect: { crossFade: true },
            loop: true,
            slidesPerView: 1,
            speed: 1000,
            autoHeight: false,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            on: {
                init() {
                    updateHeight(this);
                },
                slideChangeTransitionEnd() {
                    updateHeight(this);
                }
            }
        });
    }

    initSwiper();
    window.addEventListener("resize", () => updateHeight(window.testimonialSwiper));
});
</script>


		<?php } ?>

		<?php
	}
);
