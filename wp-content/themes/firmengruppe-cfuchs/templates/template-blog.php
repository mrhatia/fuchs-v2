<?php
/**
 * Template Name: Blog
 * Template Post Type: page
 *
 * This template is for displaying blog page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

// Include header.
get_header();

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();

$bst_var_tblgho_kicker = $bst_fields['bst_var_tblgho_kicker'] ?? null;
$bst_var_pagetitle           = $bst_fields['bst_var_tblgho_title'] ?? get_the_title( $bst_var_post_id );
$bst_var_tblgho_text = $bst_fields['bst_var_tblgho_text'] ?? null;



$bst_var_author_avatar       = $bst_fields['bst_var_author_avatar'] ?? null;
$blog_posts_preference       = $bst_fields['bst_var_tblgho_posts_preference'] ?? null;
$bst_var_tblgho_posts       = $bst_fields['bst_var_tblgho_posts'] ?? null;
$bst_var_post_catagories = get_categories( $bst_var_post_id );

?>

<section class="ctn-full-width">
	<div class="wrapper">
		<div class="hero-inner-slider blog-sub-page">
			<div class="hero-slide-item">

				<div class="banner-content">
					<div class="banner-content-inner">
						<?php if($bst_var_tblgho_kicker){ ?>
							<div class="kicker"><?php echo html_entity_decode($bst_var_tblgho_kicker); ?></div>
						<?php } ?>
						<h1 class="heading-2"><?php echo esc_html( $bst_var_pagetitle ); ?></h1>
						<?php if($bst_var_tblgho_text){ ?>
							<p><?php echo html_entity_decode($bst_var_tblgho_text); ?></p>
						<?php } ?>

					</div>

				</div>
			</div>

		</div>
	</div>
</section>
<div class="gl-s128"></div>


<?php if ( $blog_posts_preference === 'manual' ) { ?>
	<section>
		<div class="wrapper">
			<div class="blog-subposts">

				<?php
				if ( ! empty( $bst_var_tblgho_posts ) ) {

					foreach ( $bst_var_tblgho_posts as $post ) {

						setup_postdata( $post );

						get_template_part( 'partials/content', 'archive-post' );
					}

					wp_reset_postdata();

				} else {

					get_template_part( 'partials/content', 'none' );
				}
				?>

			</div>
		</div>
	</section>

<?php } else { ?>
	<section>
		<div class="wrapper">
			<div class="blog-subposts">
			<?php
				// WP_Query .
				$bst_args = array(
				'post_type'      => 'post',
				'posts_per_page' => -1,
				'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
				'orderby'        => array(
					'menu_order' => 'ASC',
					'date'       => 'DESC',
				),
			);
				// The Query.
				$bst_query = new WP_Query( $bst_args );
				// The Loop.
				if ( $bst_query->have_posts() ) {
					while ( $bst_query->have_posts() ) {
						$bst_query->the_post();
						// Include specific template for the content.
						get_template_part( 'partials/content', 'archive-post' );
					}
					?>
					<?php
				} else {
					// If no content, include the "No posts found" template.
					get_template_part( 'partials/content', 'none' );
				}
				?>
				</div>
				<div class="gl-s-58"></div>

				<?php
				if ( have_posts() ) {
					if ( class_exists( 'BaseTheme' ) && $bst_query->max_num_pages > 1 ) {
						?>
						<div class="center-align">
							<?php echo BaseTheme::pagination( $bst_query->max_num_pages, array( 'first_last' => false, 'prev_next' => false, 'show_range'=> false, 'has_dotted'=> false ) ); ?>
						</div>
						<?php
					}
				}
				?>
			<!-- Content End -->
		</div>
	</section>
<?php } ?>
<div class="gl-s-58"></div>

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
