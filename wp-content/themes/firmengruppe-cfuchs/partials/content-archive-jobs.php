<?php
/**
 * Template part for displaying jobs in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();
$terms_region = get_the_terms( $bst_var_post_id, 'job-region' );


$terms_cat = get_the_terms( $bst_var_post_id, 'job-category' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-image-card' ); ?>>
	<a href="<?php the_permalink(); ?>">
	<div class="single-image">
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
	<div class="single-image-content">

		<div class="service-title white_text">
			<?php the_title(); ?>
		</div>
		<span class="plus-button">
			+
		</span>
	</div>
		</a>


</article>
