<?php
/**
 * Block Name: Theme Blockquote
 *
 * The template for displaying the custom gutenberg block named Theme Blockquote.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		// Block variables.

		$fh_var_blk_quote_quotetext     = $bst_block_fields['fh_var_blk_quote_quotetext'] ?? null;
		?>
		<?php if($fh_var_blk_quote_quotetext){ ?>
			<section class="">
				<div class="wrapper">
					<div class="highlight-quote-section">
						<div class="highlight-quote">
							<blockquote class="highlight-blockquote"><?php echo html_entity_decode($fh_var_blk_quote_quotetext); ?>
						</blockquote>
					</div>
				</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
);

