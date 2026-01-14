<?php
/**
 * Block Name: Social Feeds
 *
 * The template for displaying the custom gutenberg block named Social Feeds.
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
			$fh_var_blk_social_feeds_shortcode     = $bst_block_fields['fh_var_blk_social_feeds_shortcode'] ?? null;
			$fh_var_blk_social_feeds_button     = $bst_block_fields['fh_var_blk_social_feeds_button'] ?? null;
			$fh_var_blk_social_feeds_title     = $bst_block_fields['fh_var_blk_social_feeds_title'] ?? null;


			?>

		<section class="bottom-white-overlap">
			<div class="wrapper">
				<div class="services-block">
					<?php if($fh_var_blk_social_feeds_title || $fh_var_blk_social_feeds_button){ ?>
						<div class="section-head d-flex align-items-center justify-content-between">
							<?php if ( $fh_var_blk_social_feeds_title ) {  ?>
								<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_social_feeds_title ); ?></h2>
							<?php } ?>
							<div class="bottom-section-button">
								<?php if ( $fh_var_blk_social_feeds_button ) { ?>
									<a href="<?php echo esc_url( $fh_var_blk_social_feeds_button['url'] ?? '' ); ?>">
										<span><?php echo html_entity_decode( $fh_var_blk_social_feeds_button['title'] ?? '' ); ?></span>
										<div class="plus-button">
											+
										</div>
									</a>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<?php if (!empty($fh_var_blk_social_feeds_shortcode)) : ?>


						<div class="fuc_social-feeds">
							<?php echo do_shortcode( html_entity_decode( $fh_var_blk_social_feeds_shortcode ) ); ?>
						</div>
					<?php endif; ?>


				</div>
			</div>
		</section>

		<?php
	}
);

