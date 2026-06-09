<?php
/**
 * Block Name: Image Collage
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		$bst_var_blk_about_box = $bst_block_fields['bst_var_blk_about_box'] ?? null;
		?>

		<?php if($bst_var_blk_about_box){ ?>

			<section class="ctn-full-width">
				<div class="wrapper">

					<?php
					// ✅ SECTION CLASSES
					$section_classes = [
						'company-value-chart',
						'project-management-block',
						'map-block-main',
						'project-design'
					];

					// ✅ ITEMS PER GROUP
					$group_sizes = [4, 4, 3, 4];

					$current_group = 0;
					$items_in_group = 0;
					$section_open = false;

					foreach( $bst_var_blk_about_box as $box ){

						$design    = $box['bst_var_blk_about_box_design'] ?? null;
						$image     = $box['image'] ?? null;
						$kicker    = $box['kicker'] ?? null;
						$title     = $box['title'] ?? null;
						$text      = $box['text'] ?? null;
						$icon    = $box['icon'] ?? null;
						$button    = $box['button'] ?? null;
						$shortcode = $box['shortcode'] ?? null;
						$map       = $box['map'] ?? null;

						// 🔴 SHORTCODE BREAK
						if($design === 'shortcode' && $shortcode){

							if($section_open){
								echo '</div>';
								$section_open = false;
							}

							echo do_shortcode($shortcode);
							continue;
						}

						// 🟢 OPEN SECTION
						if(!$section_open){

							$current_class = $section_classes[$current_group] ?? end($section_classes);

							echo '<div class="'.$current_class.'">';
							$section_open = true;
						}
						?>

						<!-- ================= ITEMS ================= -->

						<?php if($design === 'image' && $image){ ?>
							<div class="item opacity-item">
								<div class="image-cover">
									<?php BaseTheme::the_attachment_image($image, 1000); ?>
								</div>
							</div>
						<?php } ?>

						<?php if($design === 'title' && $title){ ?>
							<div class="item simple-text animation-item" style="background-color: #ff5f14;">
								<h2 class="heading-2">
									<?php echo html_entity_decode($title); ?>
								</h2>
							</div>
						<?php } ?>

						<?php if($design === 'content'){
							$box_color = $box['bst_var_blk_about_box_color'] ?? 'green';
							$color_class = '';
							$button_color = 'button dark-orange-button';
							if($box_color === 'orange'){
								$color_class = 'dark-orange-bg';
								$button_color = 'button white-button';
							} elseif($box_color === 'white'){
								$color_class = 'white-bg';
								$button_color = 'button dark-orange-button';

							}
							?>
							<div class="item content-main animation-item <?php echo $color_class; ?>">
								<div class="content">
									<?php if($title){ ?>
										<h2 class="heading-4"><?php echo html_entity_decode($title); ?></h2>
									<?php } ?>
									<?php if($text){ echo html_entity_decode($text); } ?>
									<?php if($button){
										echo BaseTheme::button($button, $button_color);
									} ?>
								</div>
							</div>
						<?php } ?>

						<?php if($design === 'link-box'){ ?>
							<div class="item animation-item active">
								<div class="content">
									<?php if($kicker){ ?>
										<div class="kicker-text">
											<?php echo html_entity_decode($kicker); ?>
										</div>
									<?php } ?>
									<?php if($title){ ?>
										<h2 class="heading-4"><?php echo html_entity_decode($title); ?></h2>
									<?php } ?>
									<?php if($button){ ?>
										<div class="bottom-section-button">
											<a href="<?php echo esc_url($button['url']); ?>">
												<span><?php echo html_entity_decode($button['title']); ?></span>
												<div class="plus-button">+</div>
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
						<?php if($design === 'icon-text'){
							$box_color = $box['bst_var_blk_about_box_color'] ?? 'green';
							$color_class = '';
							$button_color = 'button dark-orange-button';
							if($box_color === 'orange'){
								$color_class = 'dark-orange-bg';
								$button_color = 'button white-button';
							} elseif($box_color === 'white'){
								$color_class = 'white-bg';
								$button_color = 'button dark-orange-button';

							}
							?>
							<div class="item content-main animation-item active d-flex flex-column align-items-center justify-content-center <?php echo $color_class; ?>">
								<div class="content center-align">
									<?php if($icon){ ?>
										<div class="icon">
											<?php BaseTheme::the_attachment_image($icon, 100); ?>
										</div>
									<?php } ?>
									<?php if($kicker){ ?>
										<div class="kicker-text">
											<?php echo html_entity_decode($kicker); ?>
										</div>
									<?php } ?>
									<?php if($title){ ?>
										<h2 class="heading-4"><?php echo html_entity_decode($title); ?></h2>
									<?php } ?>

									<?php if($text){ echo html_entity_decode($text); } ?>


								</div>
							</div>
						<?php } ?>

						<?php if($design === 'about'){
							$box_color = $box['bst_var_blk_about_box_color'] ?? 'green';
							$color_class = '';
							$button_color = 'button dark-orange-button';
							if($box_color === 'orange'){
								$color_class = 'dark-orange-bg';
								$button_color = 'button white-button';
							} elseif($box_color === 'white'){
								$color_class = 'white-bg';
								$button_color = 'button dark-orange-button';

							}
							?>
							<div class="item about-us-box <?php echo $color_class; ?>">
								<div class="content">
									<?php if($title){ ?>
										<h2 class="heading-3"><?php echo html_entity_decode($title); ?></h2>
									<?php } ?>
									<?php if($text){ echo html_entity_decode($text); } ?>
								</div>
							</div>
						<?php } ?>

						<?php if($design === 'empty-box'){ ?>
							<div class="item animation-item active" style="background:white;"></div>
						<?php } ?>

						<?php if($design === 'map' && $map){ ?>
							<div class="item">
								<iframe
									src="<?php echo esc_url($map); ?>"
									width="100%"
									height="200"
									style="border:0;"
									loading="lazy">
								</iframe>
							</div>
						<?php } ?>

						<?php
						// ================= LOGIC =================

						$items_in_group++;

						// ✅ CLOSE GROUP WHEN COMPLETE
						if($items_in_group == ($group_sizes[$current_group] ?? 4)){

							echo '</div>';
							$section_open = false;

							$items_in_group = 0;
							$current_group++;
						}
					}

					// close last open section
					if($section_open){
						echo '</div>';
					}
					?>

				</div>
			</section>

		<?php } ?>

		<?php
	}
);
