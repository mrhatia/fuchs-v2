<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

// Include header.
get_header();

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();

?>
<section id="hero-section" class="hero-section hero-section-default">
	<div class="ts-80"></div>
	<div class="ts-80"></div>

	<!-- Hero Start -->
	<div class="hero-single search-hero">
		<div class="wrapper">
			<h1 class="heading-3"><?php echo esc_html_e( 'Search Results', 'basetheme_td' ); ?></h1>
			<p>
			<?php
				printf(
					/* translators: %s: search term. */
					esc_html__( 'Results for "%s"', 'basetheme_td' ),
					'<span class="search-term">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</p>
		</div>
	</div>

	<!-- Hero End -->
</section>
<div class="ts-80"></div>

<section id="page-section" class="page-section">
	<div class="wrapper">
		<div class="blog-subposts">
			<!-- Content Start -->
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					// Include specific template for the content.
					get_template_part( 'partials/content-archive', 'post' );
				}
			} else {
				// If no content, include the "No posts found" template.
				get_template_part( 'partials/content', 'none' );
			}
			?>
		</div>

		<div class="ts-40"></div>
		<?php
		if ( have_posts() ) {
			if ( class_exists( 'BaseTheme' ) && $wp_query->max_num_pages > 1 ) {
				?>
					<div class="center-align">
						<?php BaseTheme::pagination( $wp_query->max_num_pages ); ?>
					</div>
				<?php
			}
		}
		?>
		<div class="ts-80"></div>
		<!-- Content End -->

	</div>
</section>
<?php get_footer(); ?>
