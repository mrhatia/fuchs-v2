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
$bst_var_tblgho_arch_button_label = $bst_fields['bst_var_tblgho_arch_button_label'] ?? 'Read More';

$button_label = $args['button_label'] ?? 'Read More';

$is_disabled = ! empty( $bst_var_post_single_visibility[0] ) && 'disable' === $bst_var_post_single_visibility[0];
?>



<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-subpost' ); ?>>

	<?php if ( ! $is_disabled ) : ?>
		<a href="<?php echo esc_url( get_the_permalink() ); ?>">
	<?php endif; ?>
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

			<?php if ( ! $is_disabled ) : ?>

				<div class="blog-subpost-bottom">
					<div class="bottom-section-button">
						<span>
							<?php echo html_entity_decode( $button_label ); ?>
						</span>
						<span class="plus-button">
							+
						</span>
					</div>

				</div>
			<?php endif; ?>

		</div>
	<?php if ( ! $is_disabled ) : ?>
		</a>
	<?php endif; ?>

</div><!-- #post-<?php the_ID(); ?> -->

