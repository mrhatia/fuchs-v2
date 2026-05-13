<?php
/**
 * Block Name: Media With Map
 *
 * The template for displaying the custom gutenberg block named Media With Map.
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
		$bst_var_blk_mat_design_variation        = $bst_block_fields['bst_var_blk_mat_design_variation'] ?? null;
		$bst_var_blk_map_kicker        = $bst_block_fields['bst_var_blk_map_kicker'] ?? null;
		$bst_var_blk_map_title        = $bst_block_fields['bst_var_blk_map_title'] ?? null;
		$bst_var_blk_map_text        = $bst_block_fields['bst_var_blk_map_text'] ?? null;
		$bst_var_blk_map_button        = $bst_block_fields['bst_var_blk_map_button'] ?? null;
		$bst_var_blk_map_img_position = $bst_block_fields['bst_var_blk_mat_img_position'] ?? null;
		$bst_var_blk_map_latitude = $bst_block_fields['bst_var_blk_map_latitude'] ?? null;
		$bst_var_blk_map_longitude = $bst_block_fields['bst_var_blk_map_longitude'] ?? null;

		$bst_var_blk_map_img_position        = ("left" == $bst_var_blk_map_img_position) ? " image-at-left " : " image-at-right ";

		?>

		<section class=" ctn ">
			<div class="wrapper">
				<div class="map-alongside-media wp-block-media-text has-media-on-the-right is-stacked-on-mobile">
					<div class="wp-block-media-text__content">
						<div class="section-head">
							<?php if ( $bst_var_blk_map_kicker ) {  ?>
								<div class="hero-split-text"><?php echo html_entity_decode( $bst_var_blk_map_kicker ); ?></div>
							<?php } ?>
							<?php if ( $bst_var_blk_map_title ) {  ?>
								<h2 class="wp-block-heading"><?php echo html_entity_decode( $bst_var_blk_map_title ); ?></h2>
							<?php } ?>
						</div>

						<?php if ( $bst_var_blk_map_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_map_text ); ?>
						<?php } ?>
						<?php if ( $bst_var_blk_map_button ) { ?>
							<?php echo BaseTheme::button( $bst_var_blk_map_button, 'button white-button' ); ?>
						<?php } ?>

					</div>
					<figure class="wp-block-media-text__media" tabindex="0">
								<?php if ( $bst_var_blk_map_latitude && $bst_var_blk_map_longitude ){ ?>
								<style>
									#map {
									height: 400px;
									width: 100%;
									}
								</style>
								<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCSzbkGtpx5S-09kZIWth_6GLlrwllKXM"></script> -->
								<script>
									function initMap() {
										const styledMap = [
											{ elementType: "geometry", stylers: [{ color: "#f5f5f5" }] },
											{ elementType: "labels.icon", stylers: [{ visibility: "off" }] },
											{ elementType: "labels.text.fill", stylers: [{ color: "#616161" }] },
											{ elementType: "labels.text.stroke", stylers: [{ color: "#f5f5f5" }] },
											{ featureType: "administrative.land_parcel", elementType: "labels.text.fill", stylers: [{ color: "#bdbdbd" }] },
											{ featureType: "poi", elementType: "geometry", stylers: [{ color: "#eeeeee" }] },
											{ featureType: "poi", elementType: "labels.text.fill", stylers: [{ color: "#757575" }] },
											{ featureType: "poi.park", elementType: "geometry", stylers: [{ color: "#e5e5e5" }] },
											{ featureType: "poi.park", elementType: "labels.text.fill", stylers: [{ color: "#9e9e9e" }] },
											{ featureType: "road", elementType: "geometry", stylers: [{ color: "#ffffff" }] },
											{ featureType: "road.arterial", elementType: "labels.text.fill", stylers: [{ color: "#757575" }] },
											{ featureType: "road.highway", elementType: "geometry", stylers: [{ color: "#dadada" }] },
											{ featureType: "road.highway", elementType: "labels.text.fill", stylers: [{ color: "#616161" }] },
											{ featureType: "road.local", elementType: "labels.text.fill", stylers: [{ color: "#9e9e9e" }] },
											{ featureType: "transit.line", elementType: "geometry", stylers: [{ color: "#e5e5e5" }] },
											{ featureType: "transit.station", elementType: "geometry", stylers: [{ color: "#eeeeee" }] },
											{ featureType: "water", elementType: "geometry", stylers: [{ color: "#c9c9c9" }] },
											{ featureType: "water", elementType: "labels.text.fill", stylers: [{ color: "#9e9e9e" }] }
										];

										const clientLocation = { lat: <?php echo ($bst_var_blk_map_latitude) ?? ""; ?>, lng: <?php echo ($bst_var_blk_map_longitude) ?? ""; ?> };

										const map = new google.maps.Map(document.getElementById("map"), {
										center: clientLocation,
										zoom: 16,
										styles: styledMap
										});

										// 🔴 Red default marker
										new google.maps.Marker({
										position: clientLocation,
										map: map,
										title: "Client Location", // shows tooltip on hover
										icon: {
											url: "<?php echo get_template_directory_uri(); ?>/assets/src/images/map-c-icon.svg" // default red marker
										}
										});
									}
									window.initMap = initMap;
								</script>

								<!-- Load map and call initMap when ready -->
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFMhCgstBslEOAzj77X5dX5aKXkoRBue8&callback=initMap" async defer></script>
								<div id="map"></div>

							<?php } ?>
					</figure>
				</div>
			</div>
		</section>
<?php
					});
