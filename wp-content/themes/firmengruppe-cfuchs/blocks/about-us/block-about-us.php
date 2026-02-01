<?php
/**
 * Block Name: Image Collage
 *
 * The template for displaying the custom gutenberg block named Image Collage.
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

		$bst_var_blk_coll_title        = $bst_block_fields['bst_var_blk_coll_title'] ?? null;
		$bst_var_blk_coll_text        = $bst_block_fields['bst_var_blk_coll_text'] ?? null;
		$bst_var_blk_coll_sub_title        = $bst_block_fields['bst_var_blk_coll_sub_title'] ?? null;
		$bst_var_blk_coll_project_info        = $bst_block_fields['bst_var_blk_coll_project_info'] ?? null;
		$bst_var_blk_coll_collage_images        = $bst_block_fields['bst_var_blk_coll_collage_images'] ?? null;


		?>

		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="company-value-chart">
					<div class="item opacity-item company-value-chart">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/value-chart.png" alt="">
						</div>
					</div>
					<div class="item  simple-text  animation-item" style="background-color: #ff5f14;">
						<h2 class="heading-2">
							Unsere Werte
						</h2>
					</div>
					<div class="item opacity-item" style="background-color: #007857;">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h8-img-03.jpg" alt="">
						</div>
					</div>
					<div class="item content-main  animation-item" style="background-color: #007857;">
						<div class="content">
							<h2 class="heading-4">
								Was die Firmengruppe
								CFuchs auszeichnet
							</h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing elit Aenean commodo ligula eget
								dolor
								Aenean massa. Cum sociis
								Theme natoque penatibus et magnis dis parturient montes , nascetur .
							</p>
							<a href="#" class="button dark-orange-button">Mehr</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="project-management-block">
					<div class="item">
						<div class="content">
							<h2 class="heading-3">
								Über Uns
							</h2>
							<p>
								Mit über 120 Jahren Erfahrung am Immobilienmarkt in Nürnberg 17 und mehr als 1.200
								realisierten Wohnungen wissen wir:
								Auch in herausfordernden Zeiten behalten unsere Immobilien ihren Wert.

								Sie erfüllen sowohl die Renditeerwartungen unserer Investoren als auch die Ansprüche von
								Selbstnutzern – weil wir unsere
								Projekte klug planen und für die Anforderungen von morgen bauen.
							</p>
							<p>
								<b>
									Matthias Hämmer
								</b>
								Geschäftsführer
							</p>
						</div>
					</div>
					<div class="item opacity-item">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h8-img-04.jpg" alt="">
						</div>
					</div>
					<div class="item opacity-item">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h8-img-05.jpg" alt="">
						</div>
					</div>
					<div class="item animation-item" style="background: white;">

					</div>

				</div>
			</div>
		</section>
		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="map-block-main">
					<div class="item animation-item" style="background: white;">

					</div>
					<div class="item">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319"
							width="100%" height="200" frameborder="0" style="border:0"></iframe>
					</div>
					<div class="item animation-item">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h8-img-06.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="project-design">
					<div class="item opacity-item">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h8-img-07.jpg" alt="">
						</div>
					</div>
					<div class="item animation-item">
						<div class="content">
							<div class="kicker-text">
								Explore the Features
							</div>
							<h2 class="heading-4">
								Product design
							</h2>
							<div class="bottom-section-button">
								<a href="http://fuchs-2.local/project/1raum-glockenhof/" tabindex="0">
									<span>
										Find out more
									</span>
									<div class="plus-button">
										+
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="item opacity-item">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h8-img-08.jpg" alt="">
						</div>
					</div>
					<div class="item opacity-item">
						<div class="image-cover">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/Bildschirmfoto 2026-01-26 um 19.41.54.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

