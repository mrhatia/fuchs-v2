<?php
/**
 * Template part for displaying content of about us page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list($bst_var_author_avatar,$bst_var_author_name) = BaseTheme::get_author_data( get_the_ID() );

// Post Tags & Categories.
$bst_var_post_tag = get_the_tags( get_the_ID() );

?>

<div class="post-box-meta news-meta-archive">
	<div class="post-date">
		<?php echo strtolower( get_the_date('j. F. Y') ); ?>
	</div>
<?php
	// Categories
	$categories = get_the_category();

	if ( ! empty( $categories ) ) { ?>
		<div class="ac-post-cat">

			<?php
				foreach ( $categories as $category ) {
					if($category->name == 'Uncategorized') {
						continue;
					}
					echo ' / <span>' . esc_html( $category->name ) . '</span>';
				}
			?>
		</div>
	<?php } ?>

</div>
