<?php
/**
 * Block Name: Theme Video
 *
 * The template for displaying the custom gutenberg block named Theme Video.
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
		$bst_var_blk_tvideo_background_text     = $bst_block_fields['bst_var_blk_tvideo_background_text'] ?? null;
		$bst_var_blk_tvideo_title     = $bst_block_fields['bst_var_blk_tvideo_title'] ?? null;
		$bst_var_blk_tvideo_image     = $bst_block_fields['bst_var_blk_tvideo_image'] ?? null;

		$bst_var_blk_tvideo_link     = $bst_block_fields['bst_var_blk_tvideo_link'] ?? null;

		?>

		<section class="ctn-blue-shape" style="background-image: url(<?php echo esc_url($bst_var_blk_tvideo_image); ?>);">
			<div class="wrapper">
				<div class="feature-block apprentice-block">
					<div class="section-head">

						<?php if($bst_var_blk_tvideo_background_text){ ?>
							<div class="hero-split-text"><?php echo html_entity_decode($bst_var_blk_tvideo_background_text); ?></div>
						<?php } ?>
						<!-- wrap condition -->
						<?php if($bst_var_blk_tvideo_title){ ?>
							<h2 class="heading-2"><?php echo html_entity_decode($bst_var_blk_tvideo_title); ?></h2>
						<?php } ?>
						<?php if($bst_var_blk_tvideo_link) { ?>
							<div class="play-button">
								Watch the video
								<a href="<?php echo esc_url($bst_var_blk_tvideo_link); ?>" data-lity="true" class="mkdf-video-button-play"
									data-rel="prettyPhoto[video_button_pretty_photo_433]">
									<span class="play-icon">
										<svg x="0px" y="0px" width="15px" height="15px" viewBox="0 0 15 15"
											style="enable-background:new 0 0 15 15;" xml:space="preserve">
											<polygon points="0,15 0,0 15,7.5 "></polygon>
										</svg>
									</span>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

