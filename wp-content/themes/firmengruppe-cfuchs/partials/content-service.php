<?php
/**
 * Template part for displaying single Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();
// Post Tags & Categories.

// Hero Section Variables.

$fh_var_osngl_serv_background_text          = $bst_fields['fh_var_osngl_serv_background_text'] ?? null;
$fh_var_osngl_serv_kicker          = $bst_fields['fh_var_osngl_serv_kicker'] ?? null;
$fh_var_osngl_serv_text          = $bst_fields['fh_var_osngl_serv_text'] ?? null;
$fh_var_osngl_serv_button_one          = $bst_fields['fh_var_osngl_serv_button_one'] ?? null;
$fh_var_osngl_serv_button_two          = $bst_fields['fh_var_osngl_serv_button_two'] ?? null;
$fh_var_osngl_serv_logo          = $bst_fields['fh_var_osngl_serv_logo'] ?? null;
$bst_var_pagetitle          = $bst_fields['fh_var_osngl_serv_title'] ?? get_the_title();



?>

<section class="ctn-full-width single-service-hero-section">
	<div class="wrapper">
		<div class="hero-inner-slider slider-disable">

			<div class="hero-slide-item">
				<?php if ( $fh_var_osngl_serv_logo ) { ?>
					<div class="service-logo">
						<?php BaseTheme::the_attachment_image( $fh_var_osngl_serv_logo, 500 ); ?>
					</div>
				<?php } ?>
				<div class="hero-slide-image" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
					<?php
						if ( ! has_post_thumbnail( $bst_var_post_id ) ) {
							echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
						} else {
							echo get_the_post_thumbnail(
								$bst_var_post_id,
								'thumb_900',
							);
						}
					?>
				</div>

				<div class="banner-content">
					<div class="banner-content-inner">

					<?php if ( $fh_var_osngl_serv_background_text ) {  ?>
						<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_osngl_serv_background_text ); ?></div>
					<?php } ?>
					<?php if ( $fh_var_osngl_serv_kicker ) {  ?>
						<div class="kicker hero-reveal"><?php echo html_entity_decode( $fh_var_osngl_serv_kicker ); ?></div>
					<?php } ?>


					<h1 class="heading-2 hero-reveal"><?php echo esc_html( $bst_var_pagetitle ); ?></h1>

					<?php if ( $fh_var_osngl_serv_text ) { ?>
						<div class="hero-reveal">
							<?php echo html_entity_decode( $fh_var_osngl_serv_text ); ?>
						</div>
					<?php } ?>
					<?php if($fh_var_osngl_serv_button_one || $fh_var_osngl_serv_button_two){ ?>
						<div class="hero-buttons button-reveal">
							<?php if ( $fh_var_osngl_serv_button_one ) { ?>
								<?php echo BaseTheme::button( $fh_var_osngl_serv_button_one, 'button white-button' ); ?>
							<?php } ?>
							<?php if ( $fh_var_osngl_serv_button_two ) { ?>
								<?php echo BaseTheme::button( $fh_var_osngl_serv_button_two, 'button' ); ?>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-section">
	<div class="gl-s128"></div>
	<?php get_template_part( 'partials/content' ); ?>
</div>
