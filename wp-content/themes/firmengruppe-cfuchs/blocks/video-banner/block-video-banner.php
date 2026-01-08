<?php
/**
 * Block Name: Video Banner
 *
 * The template for displaying the custom gutenberg block named Video Banner.
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
		$bst_var_blk_vidban_background_text     = $bst_block_fields['bst_var_blk_vidban_background_text'] ?? null;
		$bst_var_blk_vidban_title     = $bst_block_fields['bst_var_blk_vidban_title'] ?? null;
		$bst_var_blk_vidban_button_one     = $bst_block_fields['bst_var_blk_vidban_button_one'] ?? null;
		$bst_var_blk_vidban_button_two     = $bst_block_fields['bst_var_blk_vidban_button_two'] ?? null;
		$bst_var_blk_vidban_video     = $bst_block_fields['bst_var_blk_vidban_video'] ?? null;

		?>

		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="video-hero">
					<div class="video-hero-background image-cover">
						<?php if ( $bst_var_blk_vidban_video ) { ?>
							<video autoplay muted loop playsinline>
								<source src="<?php echo esc_url( $bst_var_blk_vidban_video ); ?>" type="video/mp4">
							</video>

						<?php } ?>

					</div>
					<div class="banner-content">
						<div class="banner-content-inner">
							<?php if($bst_var_blk_vidban_background_text){ ?>
								<div class="hero-split-text"><?php echo html_entity_decode($bst_var_blk_vidban_background_text); ?></div>
							<?php } ?>
							<!-- wrap condition -->
							<?php if($bst_var_blk_vidban_title){ ?>
								<h1 class="heading-2"><?php echo html_entity_decode($bst_var_blk_vidban_title); ?></h1>
							<?php } ?>

							<div class="hero-buttons">
								<?php if ( $bst_var_blk_vidban_button_one ) { ?>
									<?php echo BaseTheme::button( $bst_var_blk_vidban_button_one, 'button white-button' ); ?>
								<?php } ?>
								<?php if ( $bst_var_blk_vidban_button_two ) { ?>
									<?php echo BaseTheme::button( $bst_var_blk_vidban_button_two, 'button blue-button' ); ?>
								<?php } ?>
							</div>
						</div>

					</div>
				</div>

			</div>
		</section>


		<?php
	}
);

