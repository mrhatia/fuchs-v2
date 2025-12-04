<?php
/**
 * Block Name: Jump Link
 *
 * The template for displaying the custom gutenberg block named Jump Link.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name,$bst_block_fields, $bst_option_fields ) {

		// Block variables.
		$bst_blkjmplctn_hashid = $bst_block_fields['bst_blkjmplctn_hashid'] ?? '';

		echo html_entity_decode( '<div class="theme-jumplink" id="' . $bst_blkjmplctn_hashid . '"></div>' );

	}
);

