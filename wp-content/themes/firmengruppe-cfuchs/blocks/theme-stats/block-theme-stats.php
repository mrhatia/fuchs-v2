<?php
/**
 * Block Name: Theme Stats
 *
 * The template for displaying the custom gutenberg block named Theme Stats.
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
		$fh_var_blk_stats_columns     = $bst_block_fields['fh_var_blk_stats_columns'] ?? null;
		$fh_var_blk_stats_design_variation     = $bst_block_fields['fh_var_blk_stats_design_variation'] ?? null;

		?>

		<?php if($fh_var_blk_stats_columns && $fh_var_blk_stats_design_variation === "progress-bar"){ ?>

		<section>
			<div class="wrapper">
				<div class="stats-ctn stats-items stats-variation">
					<?php foreach ( $fh_var_blk_stats_columns as $column ) {
						$column_kicker      = $column['kicker'] ?? null;
						$column_title   	= $column['title'] ?? null;
						$column_text   = $column['text'] ?? null;

						$number       = $column['number'] ?? null;

						?>
							<div class="stats-column">
								<?php if($number){ ?>
									<h3 class="stats-number"><?php echo html_entity_decode($number); ?></h3>
								<?php } ?>
								<div class="stat-content">
									<?php if ( $column_kicker ) {  ?>
										<div class="small-text"><?php echo html_entity_decode( $column_kicker ); ?></div>
									<?php } ?>

									<?php if ( $column_title ) {  ?>
										<span><?php echo html_entity_decode( $column_title ); ?></span>
									<?php } ?>

									<?php if ( $column_text ) {  ?>
										<?php echo html_entity_decode( $column_text ); ?>
									<?php } ?>
								</div>
							</div>
					<?php } ?>
				</div>
			</div>
		</section>

		<?php } else { ?>
			<section>
				<div class="wrapper">
					<div class="stats-ctn stats-items">
						<?php foreach ( $fh_var_blk_stats_columns as $column ) {
							$column_kicker      = $column['kicker'] ?? null;
							$column_title   	= $column['title'] ?? null;
							$column_text   = $column['text'] ?? null;
							$number       = $column['number'] ?? null;

							?>
								<div class="stats-column">
									<?php if($number){ ?>
										<div class="counter-background"><?php echo html_entity_decode($number); ?></div>
										<h3 class="stats-number"><?php echo html_entity_decode($number); ?></h3>
									<?php } ?>
									<div class="stat-content">
										<?php if ( $column_kicker ) {  ?>
											<div class="small-text"><?php echo html_entity_decode( $column_kicker ); ?></div>
										<?php } ?>

										<?php if ( $column_title ) {  ?>
											<span><?php echo html_entity_decode( $column_title ); ?></span>
										<?php } ?>

										<?php if ( $column_text ) {  ?>
											<?php echo html_entity_decode( $column_text ); ?>
										<?php } ?>
									</div>
								</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php }  ?>

		<?php
	}
);

