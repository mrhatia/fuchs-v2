<?php
/**
 * Template Name: Toolkit
 * Template Post Type: page
 *
 * This template is for displaying toolkit page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */


// Include header.
get_header();

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();



?>
	<section id="page-section" class="page-section">
		<!-- Content Start -->
<?php
				get_template_part( 'partials/content', 'page' );

		?>
	</section>


<?php
get_footer();
