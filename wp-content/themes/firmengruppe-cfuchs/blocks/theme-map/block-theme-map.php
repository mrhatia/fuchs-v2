<?php
/**
 * Block Name: Theme Map
 *
 * The template for displaying the custom Gutenberg block named Theme Map.
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
		$bst_var_blk_map_latitude =
			$bst_block_fields['bst_var_blk_map_latitude'] ?? null;

		$bst_var_blk_map_longitude =
			$bst_block_fields['bst_var_blk_map_longitude'] ?? null;

		/*
		 * Validate coordinates before passing them to JavaScript.
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
		 * Unique map ID allows both map block variations
		 * to work on the same page.
		 */
		$map_id = 'cfuchs-theme-map-' . sanitize_html_class(
			$bst_block_id ?: wp_unique_id()
		);

		$map_icon_url = get_template_directory_uri()
			. '/assets/src/images/map-c-icon.svg';

		$google_maps_api_key = defined(
			'CFUCHS_GOOGLE_MAPS_API_KEY'
		)
			? CFUCHS_GOOGLE_MAPS_API_KEY
			: '';

		/*
		 * Load the same consent-based Google Maps JavaScript
		 * used by the Media With Map block.
		 */
		if ( $has_map ) {
			$map_script_relative_path =
				'/assets/src/js/cfuchs-google-map-consent.js';

			$map_script_absolute_path =
				get_template_directory()
				. $map_script_relative_path;

			wp_enqueue_script(
				'cfuchs-google-map-consent',
				get_template_directory_uri()
					. $map_script_relative_path,
				[],
				file_exists( $map_script_absolute_path )
					? filemtime( $map_script_absolute_path )
					: '1.0.0',
				true
			);
		}

		?>

		<section class="ctn-full-width">
			<div class="wrapper">

				<div class="theme-map-section">

					<figure
						class="theme-map"
						tabindex="0"
					>

						<?php if ( $has_map ) { ?>

							<div
								class="
									gdpr-google-map
									gdpr-google-map--theme
								"
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
								data-zoom="12"
								style="--cfuchs-map-height: 500px;"
							>

								<div
									class="
										gdpr-google-map__placeholder
									"
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
									class="
										cfuchs-google-map__canvas
									"
									aria-label="<?php esc_attr_e(
										'Client location map',
										'basetheme'
									); ?>"
									aria-hidden="true"
								></div>

							</div>

						<?php } ?>

					</figure>

				</div>

			</div>
		</section>

		<?php
	}
);
