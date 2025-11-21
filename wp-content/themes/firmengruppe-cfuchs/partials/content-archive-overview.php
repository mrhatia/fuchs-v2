<?php
/**
 * Template part for displaying overview in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();
$terms = get_the_terms( $bst_var_post_id, 'type' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-box column' ); ?>>
	<div class="post-box-img post-image">
		<a href="<?php the_permalink(); ?>">
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
		</a>
	</div>
	<div class="post-content">
		<div class="post-box-meta d-flex justify-content-between">
			<div class="ac-post-cat">
				<?php
					if ( $terms && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a> ';
						}
					}
				 ?>
			</div>
		</div>
		<div class="post-box-title post-title">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4>
		</div>
	</div>
</article>
