<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();


$bst_var_osngl_images = $bst_fields['bst_var_osngl_images'] ?? null;
?>


<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-subpost' ); ?>>
	<a href="<?php echo esc_url( get_the_permalink() ); ?>">
		<div class="blog-slider-image-slider">

			<?php if ( !empty( $bst_var_osngl_images ) && is_array( $bst_var_osngl_images ) ) : ?>

				<?php // Featured Image First ?>
				<?php if ( has_post_thumbnail( $bst_var_post_id ) ) : ?>
					<div class="item image-cover">
						<?php BaseTheme::the_featured_image( $bst_var_post_id, 900 ); ?>
					</div>
				<?php endif; ?>

				<?php // Gallery Images ?>
				<?php foreach ( $bst_var_osngl_images as $image_id ) : ?>
					<div class="item image-cover">
						<?php echo wp_get_attachment_image( $image_id, 'large' ); ?>
					</div>
				<?php endforeach; ?>

			<?php elseif ( has_post_thumbnail( $bst_var_post_id ) ) : ?>

				<div class="item image-cover">
					<?php BaseTheme::the_featured_image( $bst_var_post_id, 900 ); ?>
				</div>

			<?php endif; ?>

		</div>
		<div class="blog-subpost-content">
			<?php get_template_part( 'partials/post-meta-archive' ); ?>

			<div class="blog-content-title">
				<h2 id="post-<?php the_ID(); ?>" class="heading-3">
					<?php echo esc_html( get_the_title() ); ?>
				</h2>
			</div>
			<?php if(has_excerpt($bst_var_post_id)) { ?>
				<div class="blog-content-text">
					<p><?php echo get_the_excerpt($bst_var_post_id); ?> </p>
				</div>
			<?php } ?>
			<div class="blog-subpost-bottom">
				<div class="bottom-section-button">
					<span>
						Read more
					</span>
					<span class="plus-button">
						+
					</span>
				</div>

			</div>
		</div>
	</a>
</div><!-- #post-<?php the_ID(); ?> -->

