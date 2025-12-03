<?php
/**
 * Template Name: Services
 * Template Post Type: page
 *
 * This template is for displaying services page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();
// Default Footer Options.
$bst_var_footer_scripts = $bst_option_fields['footer_scripts'] ?? '';



// Schema Markup - ACF variables.
$bst_var_schema_check = $bst_option_fields['bst_var_schema_check'] ?? null;
if ( $bst_var_schema_check ) {
	$bst_var_schema_business_name       = $bst_option_fields['bst_var_schema_business_name'] ?? null;
	$bst_var_schema_business_legal_name = $bst_option_fields['bst_var_schema_business_legal_name'] ?? null;
	$bst_var_schema_street_address      = $bst_option_fields['bst_var_schema_street_address'] ?? null;
	$bst_var_schema_locality            = $bst_option_fields['bst_var_schema_locality'] ?? null;
	$bst_var_schema_region              = $bst_option_fields['bst_var_schema_region'] ?? null;
	$bst_var_schema_postal_code         = $bst_option_fields['bst_var_schema_postal_code'] ?? null;
	$bst_var_schema_map_short_link      = $bst_option_fields['bst_var_schema_map_short_link'] ?? null;
	$bst_var_schema_latitude            = $bst_option_fields['bst_var_schema_latitude'] ?? null;
	$bst_var_schema_longitude           = $bst_option_fields['bst_var_schema_longitude'] ?? null;
	$bst_var_schema_opening_hours       = $bst_option_fields['bst_var_schema_opening_hours'] ?? null;
	$bst_var_schema_telephone           = $bst_option_fields['bst_var_schema_telephone'] ?? null;
	$bst_var_schema_business_email      = $bst_option_fields['bst_var_schema_business_email'] ?? null;
	$bst_var_schema_business_logo       = $bst_option_fields['bst_var_schema_business_logo'] ?? null;
	$bst_var_schema_price_range         = $bst_option_fields['bst_var_schema_price_range'] ?? null;
	$bst_var_schema_type                = $bst_option_fields['bst_var_schema_type'] ?? null;
}
// Custom - ACF variables.


// Include header.
get_header();



?>
	<section id="page-section" class="page-section">


		<!-- Content Start -->
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				// Include specific template for the content.
				get_template_part( 'partials/content', 'page' );

			}
		}
		?>
	</section>

<?php
get_footer();
