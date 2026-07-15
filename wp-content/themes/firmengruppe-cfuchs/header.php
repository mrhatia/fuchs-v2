<?php
/**
 * The template for displaying website header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();

// Page Tags - Advanced custom fields variables.
$bst_var_tracking = $bst_option_fields['custom_scripts'] ?? '';
$bst_var_ccss     = $bst_option_fields['custom_css'] ?? '';
$bst_var_hscripts = $bst_option_fields['head_scripts'] ?? '';
$bst_var_bscripts = $bst_option_fields['body_scripts'] ?? '';

$bst_var_tbar_vsblty     = $bst_option_fields['bst_var_tbar_vsblty'] ?? null;
$bst_var_tbar_btn     = $bst_option_fields['bst_var_tbar_btn'] ?? null;
$bst_var_tbar_text    = $bst_option_fields['bst_var_tbar_text'] ?? null;


$bst_var_header_btn     = $bst_option_fields['bst_var_header_btn'] ?? null;
$bst_var_tbar_vsblty   = $bst_option_fields['bst_var_tbar_vsblty'] ?? null;
$bst_var_tbar_text     = $bst_option_fields['bst_var_tbar_text'] ?? null;
$bst_var_tbar_btn      = $bst_option_fields['bst_var_tbar_btn'] ?? null;

$bst_var_social_profiles = $bst_option_fields['bst_var_social_profiles'] ?? null;

$header_drawer_options      = $bst_option_fields['bst_var_header_drawer_options'] ?? null;
$bst_var_hdrwo_title = $header_drawer_options['title'] ?? null;
$bst_var_hdrwo_text = $header_drawer_options['text'] ?? null;
$bst_var_hdrwo_timings = $header_drawer_options['timings'] ?? null;
$bst_var_hdrwo_address = $header_drawer_options['address'] ?? null;
$bst_var_hdrwo_contact_details = $header_drawer_options['contact_details'] ?? null;
$bst_var_hdrwo_email_address = $header_drawer_options['email_address'] ?? null;

// Page variables - Advanced custom fields variables.

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php
		// Add Head Scripts.
	if ( BaseTheme::if_live() ) {

		if ( '' !== $bst_var_hscripts ) {
			echo html_entity_decode( $bst_var_hscripts, ENT_QUOTES );
		}
	}
	?>
	<link rel="apple-touch-icon" sizes="180x180"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/favicon-16x16.png">
	<link rel="icon" sizes="any"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/favicon.ico">
	<link rel="icon" type="image/svg+xml"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/icon.svg">
	<link rel="manifest"
		href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/site.webmanifest">
	<meta name="theme-color" content="#007857">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="FUCHS Package">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton_color" content="#007857">
	<meta name="msapplication-TileColor" content="#007857">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="msapplication-TileImage"
		content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/pwa/pwa-icon-144.png">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#007857">
	<?php
		// Tracking Code.
	if ( '' !== $bst_var_tracking ) {
		echo html_entity_decode( $bst_var_tracking, ENT_QUOTES );
	}

		// Custom CSS.
	if ( '' !== $bst_var_ccss ) {
		echo '<style type="text/css">';
		echo html_entity_decode( $bst_var_ccss, ENT_QUOTES );
		echo '</style>';
	}
	?>
	<?php wp_head(); ?> <script>
	"serviceWorker" in navigator && window.addEventListener("load", function() {
		navigator.serviceWorker.register("/sw.js").then(function(e) {
			console.log("ServiceWorker registration successful with scope: ", e.scope)
		}, function(e) {
			console.log("ServiceWorker registration failed: ", e)
		})
	});
	jQuery(document).ready(function() {
		if (jQuery('#top-bar-ajax').length > 0) {
			jQuery('#top-bar-ajax').topBar();
		}
	});
	</script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/src/css/vendors/swiper-bundle.min.css" />

<script src="<?php echo get_template_directory_uri(); ?>/assets/src/js/vendors/swiper-bundle.min.js"></script>


</head>

<body <?php body_class( ( is_front_page() || is_home() ) ? 'is-loading' : '' ); ?>>
	<?php wp_body_open(); ?>
	<?php
	if ( BaseTheme::if_live() ) {
		if ( '' !== $bst_var_bscripts ) {
			?>
			<div style="display: none;">
				<?php echo html_entity_decode( $bst_var_bscripts, ENT_QUOTES ); ?>
			</div>
		<?php }
	}
	?>

	<a class="skip-link screen-reader-text"
		href="#page-section"><?php esc_html_e( 'Skip to content', 'basetheme_td' ); ?></a>

		<?php if ( is_front_page() || is_home() ) : ?>
		<div class="loader">
			<div class="loader-inner">
				<div class="spinner-text" data-title="CFuchs">CFuchs</div>
			</div>
			<div class="loader-wipe"></div>
		</div>
	<?php endif; ?>

	<header id="header-section" class="header-section">
		<!-- Header Start -->

		<div class="header-wrapper header-inner d-flex align-items-stretch justify-content-between">
			<div class="header-logo logo">
				<a class="fuchs-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img
						src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/site-logo.svg"
						alt="Site Logo" />

					</a>
			</div>
			<div class="right-header header-navigation">
				<div class="nav-overlay">
					<div class="nav-container">
						<div class="header-nav">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'header-nav',
										'fallback_cb'    => 'BaseTheme::nav_fallback',
										'walker'         => new BaseTheme\Walker\WP_Theme_Walker_Nav(),
										'container'      => 'nav',
									)
								);
							?>
							<div class="header-btns">
								<a href="javascript:void(0);" class="search-icon top-search"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/images/search-icon.svg" alt=""></a>
								<div class="menu-btn-desktop">
									<span class="top"></span>
									<span class="middle"></span>
									<span class="bottom"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="menu-btn">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>
			</div>


			<!-- header buttons -->
		</div>
		<div class="search-form-new">
			<div class="search-inner-content">
			<div class="search-inner-icon-main">
								<a href="#" class="search-icon top-search"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/images/search-icon.svg" alt=""></a>

			</div>
				<form role="search" method="get" id="searchform" action="#">
					<div id="search-top">
						<input type="text" name="s" class="keyword" onkeyup="fetch()" autocomplete="off"
							autofocus="autofocus" aria-label="Search" placeholder="Type your search">
						<div class="clear"></div>
					</div>
				</form>
				<div class="search-close">
					<svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
						<rect class="bg-path" x="0.922852" y="28.5" width="39" height="39" rx="19.5"
							transform="rotate(-45 0.922852 28.5)" fill="#F1EEE2"></rect>
						<g opacity="0.5">
							<rect class="bg-path-white" x="22.8432" y="23.5503" width="1" height="15"
								transform="rotate(-45 22.8432 23.5503)" fill="#141414"></rect>
							<rect class="bg-path-white" x="23.5503" y="34.1567" width="1" height="15"
								transform="rotate(-135 23.5503 34.1567)" fill="#141414"></rect>
						</g>
					</svg>
				</div>
			</div>
		</div>
		<!-- Header End -->
	</header>

	<section class="mkdf-side-menu ps ps--active-y">
		<a class="mkdf-close-side-menu mkdf-close-side-menu-predefined" href="javascript:void(0);">
			<svg class="mkdf-close-icon-svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
				xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 18 14"
				style="enable-background:new 0 0 18 14;" xml:space="preserve">
				<style type="text/css">
					.st0 {
						fill: #FFFFFF;
					}
				</style>
				<path class="st0" d="M15.5,2c0.4-0.4,0.4-1.1,0-1.5c-0.2-0.2-0.5-0.3-0.8-0.3c0,0,0,0,0,0c-0.3,0-0.6,0.1-0.8,0.3L2.5,12
							c-0.2,0.2-0.3,0.5-0.3,0.8c0,0.3,0.1,0.6,0.3,0.8C2.9,14,3.6,14,4,13.5L15.5,2z"></path>
				<path class="st0" d="M15.5,2c0.4-0.4,0.4-1.1,0-1.5c-0.2-0.2-0.5-0.3-0.8-0.3c0,0,0,0,0,0c-0.3,0-0.6,0.1-0.8,0.3L2.5,12
							c-0.2,0.2-0.3,0.5-0.3,0.8c0,0.3,0.1,0.6,0.3,0.8C2.9,14,3.6,14,4,13.5L15.5,2z"></path>
				<path class="st0" d="M2.5,2C2,1.6,2,0.9,2.5,0.5c0.2-0.2,0.5-0.3,0.8-0.3c0,0,0,0,0,0c0.3,0,0.6,0.1,0.8,0.3L15.5,12
							c0.2,0.2,0.3,0.5,0.3,0.8c0,0.3-0.1,0.6-0.3,0.8c-0.4,0.4-1.1,0.4-1.5,0L2.5,2z"></path>
				<path class="st0" d="M2.5,2C2,1.6,2,0.9,2.5,0.5c0.2-0.2,0.5-0.3,0.8-0.3c0,0,0,0,0,0c0.3,0,0.6,0.1,0.8,0.3L15.5,12
							c0.2,0.2,0.3,0.5,0.3,0.8c0,0.3-0.1,0.6-0.3,0.8c-0.4,0.4-1.1,0.4-1.5,0L2.5,2z"></path>
			</svg> </a>
		<div id="text-13" class="widget mkdf-sidearea widget_text">
			<?php if ( $bst_var_hdrwo_title ) {  ?>
				<div class="clamkdf-widget-title-holderss_name"><h4 class="mkdf-widget-title"><?php echo html_entity_decode( $bst_var_hdrwo_title ); ?></h4></div>
			<?php } ?>
			<?php if ( $bst_var_hdrwo_text ) {  ?>
				<div class="textwidget">
					<?php echo html_entity_decode( $bst_var_hdrwo_text ); ?>
				</div>
			<?php } ?>

		</div>
		<!-- Timings -->
		<?php if ( $bst_var_hdrwo_timings ) {  ?>

			<div class="mkdf-icon-widget-holder mkdf-icon-has-hover" style="color: rgb(156, 165, 175);">
				<span class="mkdf-icon-element mkdf-custom-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/footer-icon-img-04.png"
						alt="icon_widget_image">
				</span>
				<span class="mkdf-icon-text "><?php echo html_entity_decode( $bst_var_hdrwo_timings ); ?></span>
			</div>
		<?php } ?>

		<!-- Address -->
		<?php if ( $bst_var_hdrwo_address ) {  ?>
			<div class="mkdf-icon-widget-holder mkdf-icon-has-hover" style="color: rgb(156, 165, 175);">
				<span class="mkdf-icon-element mkdf-custom-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/footer-icon-img-01.png"
						alt="icon_widget_image">
				</span>
				<span class="mkdf-icon-text "><?php echo html_entity_decode( $bst_var_hdrwo_address ); ?></span>
			</div>
		<?php } ?>
		<!-- Phone -->
		<?php if ( $bst_var_hdrwo_contact_details ) {  ?>
			<div class="mkdf-icon-widget-holder mkdf-icon-has-hover" style="color: rgb(156, 165, 175);">
				<span class="mkdf-icon-element mkdf-custom-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/footer-icon-img-03.png"
						alt="icon_widget_image">
				</span>
				<span class="mkdf-icon-text "><?php echo html_entity_decode( $bst_var_hdrwo_contact_details ); ?></span>
			</div>
		<?php } ?>
		<!-- Email -->
		<?php if ( $bst_var_hdrwo_email_address ) {  ?>
			<div class="mkdf-icon-widget-holder mkdf-icon-has-hover" style="color: rgb(156, 165, 175);">
				<span class="mkdf-icon-element mkdf-custom-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/footer-icon-img-02.png"
						alt="icon_widget_image">
				</span>
				<span class="mkdf-icon-text "><?php echo html_entity_decode( $bst_var_hdrwo_email_address ); ?></span>
			</div>
		<?php } ?>

		<div class="widget mkdf-social-icons-group-widget mkdf-square-icons text-align-center">
			<div class="social-icons soial-icons-header d-flex">
				<?php BaseTheme::the_social_icons( $bst_var_social_profiles ); ?>
			</div>
		</div>
		<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
			<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
		</div>
		<div class="ps__rail-y" style="top: 0px; right: 0px; height: 736px;">
			<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 686px;"></div>
		</div>
	</section>
	<!-- Main Area Start -->
	<main id="main-section" class="main-section">
