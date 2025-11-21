<?php
/**
 * Block Name: Media Alongside Text
 *
 * The template for displaying the custom gutenberg block named Media Alongside Text.
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
		$fh_var_blk_tbc_tabs        = $bst_block_fields['fh_var_blk_tbc_tabs'] ?? null;


		?>

		<style>
			#map {
			height: 400px;
			width: 100%;
			}
		</style>



			<?php if ( $fh_var_blk_tbc_tabs ) : ?>
				<section>
					<div class="wrapper">
						<div class="tabbed-content-main tabbed-map-items">

							<!-- Tab Navigation -->
							<div class="tabbed-map-nav">
								<ul role="list">
									<?php foreach ( $fh_var_blk_tbc_tabs as $index => $tab ) :
										$tab_label = $tab['tab_label'] ?? '';
										$tab_id = 'tab-' . str_pad( $index + 1, 2, '0', STR_PAD_LEFT );
									?>
										<li class="dropdown-list-title">
											<a href="#<?php echo esc_attr( $tab_id ); ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>">
												<?php echo esc_html( $tab_label ); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
					<div class="gl-s48"></div>

							<!-- Tab Content -->
							<div class="tabbed-map-content-inner">
								<?php foreach ( $fh_var_blk_tbc_tabs as $index => $tab ) :
									$tab_id              = 'tab-' . str_pad( $index + 1, 2, '0', STR_PAD_LEFT );
									$active_class        = $index === 0 ? 'active' : '';
									$content_type        = $tab['select_content_type'] ?? '';
									$tab_images          = $tab['add_images'] ?? [];
									$text_columns        = $tab['text_columns'] ?? [];
									$tab_heading         = $tab['heading'] ?? '';
									$tab_text            = $tab['text'] ?? '';
									$latitude          = $tab['latitude'] ?? '';
									$longitude          = $tab['longitude'] ?? '';
								?>
									<div id="<?php echo esc_attr( $tab_id ); ?>" class="tabbed-content-single tabbed-id-item <?php echo esc_attr( $active_class ); echo $content_type === "text-images" ? ' tabbed-text-columns ' : ''; ?>" style="<?php echo $index === 0 ? '' : 'display:none;'; ?>">

										<?php if ( $content_type === 'images' && $tab_images ) : ?>
											<div class="gl-s48"></div>
											<div class="two-columns">
												<?php foreach ( $tab_images as $img ) :
													$tab_image = $img['image'] ?? null;
													if ( $tab_image ) : ?>
														<div class="column">
															<?php BaseTheme::the_attachment_image( $tab_image, 1000 ); ?>
														</div>
													<?php endif; ?>
												<?php endforeach; ?>
											</div>

										<?php elseif ( $content_type === 'text-images' && $text_columns ) : ?>
											<div class="two-columns">
												<?php foreach ( $text_columns as $col ) :
													$col_text  = $col['text'] ?? '';
													$col_image = $col['image'] ?? null;
													$col_label = $col['image_caption'] ?? '';
												?>
													<div class="column">
														<?php if ( $col_text ) : ?>
															<?php echo html_entity_decode( $col_text ); ?>
															<div class="gl-s48"></div>
														<?php endif; ?>

														<?php if ( $col_image ) : ?>
															<div class="tabbed-image">
																<?php BaseTheme::the_attachment_image( $col_image, 1000 ); ?>
																<?php if ( $col_label ) : ?>
																	<div class="gl-s12"></div>
																	<div class="center-align"><strong><?php echo html_entity_decode( $col_label ); ?></strong></div>
																<?php endif; ?>
															</div>
														<?php endif; ?>
													</div>
												<?php endforeach; ?>
											</div>

										<?php elseif ( $content_type === 'text' ) : ?>
											<?php if ( $tab_heading ) : ?>
												<h3><?php echo esc_html( $tab_heading ); ?></h3>
											<?php endif; ?>

											<?php if ( $tab_text ) : ?>
												<div class="tab-text">
													<?php echo html_entity_decode( $tab_text ); ?>
												</div>
											<?php endif; ?>

											<?php if ( $latitude && $longitude ){ ?>
												<div class="gl-s36"></div>
												<div class="tab-iframe">
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

															const clientLocation = { lat: <?php echo ($latitude) ?? ""; ?>, lng: <?php echo ($longitude) ?? ""; ?> };

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

												</div>
											<?php } ?>
										<?php endif; ?>

									</div>
								<?php endforeach; ?>
							</div>

						</div>
					</div>
				</section>
				<?php endif; ?>

		<?php
	}
);

