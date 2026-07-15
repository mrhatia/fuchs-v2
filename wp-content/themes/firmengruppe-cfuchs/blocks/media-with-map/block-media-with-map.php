<?php
/**
 * Block Name: Media With Map
 *
 * The template for displaying the custom Gutenberg block named Media With Map.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function (
		$bst_block_id,
		$bst_block_name,
		$bst_block_fields,
		$bst_option_fields
	) {

		// Block variables.
		$bst_var_blk_mat_design_variation =
			$bst_block_fields['bst_var_blk_mat_design_variation'] ?? null;

		$bst_var_blk_map_kicker =
			$bst_block_fields['bst_var_blk_map_kicker'] ?? null;

		$bst_var_blk_map_title =
			$bst_block_fields['bst_var_blk_map_title'] ?? null;

		$bst_var_blk_map_text =
			$bst_block_fields['bst_var_blk_map_text'] ?? null;

		$bst_var_blk_map_button =
			$bst_block_fields['bst_var_blk_map_button'] ?? null;

		$bst_var_blk_map_img_position =
			$bst_block_fields['bst_var_blk_mat_img_position'] ?? null;

		$bst_var_blk_map_latitude =
			$bst_block_fields['bst_var_blk_map_latitude'] ?? null;

		$bst_var_blk_map_longitude =
			$bst_block_fields['bst_var_blk_map_longitude'] ?? null;

		$bst_var_blk_map_img_position =
			'left' === $bst_var_blk_map_img_position
				? 'image-at-left'
				: 'image-at-right';

		/*
		 * Validate coordinates before outputting them into JavaScript.
		 */
		$map_latitude = is_numeric( $bst_var_blk_map_latitude )
			? (float) $bst_var_blk_map_latitude
			: null;

		$map_longitude = is_numeric( $bst_var_blk_map_longitude )
			? (float) $bst_var_blk_map_longitude
			: null;

		$has_map =
			null !== $map_latitude &&
			null !== $map_longitude;

		/*
		 * Use a unique ID so the block also works if more than one map
		 * is ever added to the same page.
		 */
		$map_id = 'cfuchs-map-' . sanitize_html_class(
			$bst_block_id ?: wp_unique_id()
		);

		$map_icon_url = get_template_directory_uri()
			. '/assets/src/images/map-c-icon.svg';

		$google_maps_api_key = defined(
			'CFUCHS_GOOGLE_MAPS_API_KEY'
		)
			? CFUCHS_GOOGLE_MAPS_API_KEY
			: '';

		?>

		<section class="ctn">
			<div class="wrapper">

				<div
					class="
						map-alongside-media
						wp-block-media-text
						has-media-on-the-right
						is-stacked-on-mobile
						<?php echo esc_attr(
							$bst_var_blk_map_img_position
						); ?>
					"
				>

					<div class="wp-block-media-text__content">

						<div class="section-head">

							<?php if ( $bst_var_blk_map_kicker ) { ?>
								<div class="hero-split-text">
									<?php
									echo html_entity_decode(
										$bst_var_blk_map_kicker
									);
									?>
								</div>
							<?php } ?>

							<?php if ( $bst_var_blk_map_title ) { ?>
								<h2 class="wp-block-heading">
									<?php
									echo html_entity_decode(
										$bst_var_blk_map_title
									);
									?>
								</h2>
							<?php } ?>

						</div>

						<?php if ( $bst_var_blk_map_text ) { ?>
							<?php
							echo html_entity_decode(
								$bst_var_blk_map_text
							);
							?>
						<?php } ?>

						<?php if ( $bst_var_blk_map_button ) { ?>
							<?php
							echo BaseTheme::button(
								$bst_var_blk_map_button,
								'button white-button'
							);
							?>
						<?php } ?>

					</div>

					<figure
						class="wp-block-media-text__media"
						tabindex="0"
					>

						<?php if ( $has_map ) { ?>

							<div
								class="gdpr-google-map"
								data-cfuchs-google-map
								data-map-id="<?php echo esc_attr(
									$map_id
								); ?>"
								data-latitude="<?php echo esc_attr(
									(string) $map_latitude
								); ?>"
								data-longitude="<?php echo esc_attr(
									(string) $map_longitude
								); ?>"
								data-marker-icon="<?php echo esc_url(
									$map_icon_url
								); ?>"
								data-api-key="<?php echo esc_attr(
									$google_maps_api_key
								); ?>"
							>

								<div
									class="gdpr-google-map__placeholder"
									aria-live="polite"
								>
									<div
										class="
											gdpr-google-map__placeholder-inner
										"
									>
										<p>
											<?php
											esc_html_e(
												'Google Maps ist aufgrund Ihrer Datenschutzeinstellungen blockiert.',
												'basetheme'
											);
											?>
										</p>

										<p>
											<?php
											esc_html_e(
												'Bitte lassen Sie Cookies von Drittanbietern zu, um die Karte anzuzeigen.',
												'basetheme'
											);
											?>
										</p>
									</div>
								</div>

								<div
									id="<?php echo esc_attr(
										$map_id
									); ?>"
									class="cfuchs-google-map__canvas"
									aria-label="<?php esc_attr_e(
										'Client location map',
										'basetheme'
									); ?>"
									aria-hidden="true"
								></div>

							</div>
							<?php

							if ( $has_map ) {
	$map_script_relative_path =
		'/assets/src/js/partials/cfuchs-google-map-consent.js';

	$map_script_absolute_path =
		get_template_directory() . $map_script_relative_path;

	wp_enqueue_script(
		'cfuchs-google-map-consent',
		get_template_directory_uri() . $map_script_relative_path,
		[],
		file_exists( $map_script_absolute_path )
			? filemtime( $map_script_absolute_path )
			: '1.0.0',
		true
	);
}
?>
						<?php } ?>

					</figure>

				</div>

			</div>
		</section>

		<?php
	}
);
