<?php
/**
 * Block Name: Theme Map
 *
 * The template for displaying the custom gutenberg block named Theme Map.
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

		$bst_var_blk_map_latitude = $bst_block_fields['bst_var_blk_map_latitude'] ?? null;
		$bst_var_blk_map_longitude = $bst_block_fields['bst_var_blk_map_longitude'] ?? null;
		?>

		<section class=" ctn-full-width ">
			<div class="wrapper">
				<div class="theme-map-section">

					<figure class="theme-map" tabindex="0">
								<?php if ( $bst_var_blk_map_latitude && $bst_var_blk_map_longitude ){ ?>
								<style>
									#map {
									height: 500px;
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
										zoom: 12,
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
