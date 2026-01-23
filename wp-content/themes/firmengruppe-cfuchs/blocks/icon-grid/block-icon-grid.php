<?php
/**
 * Block Name: Icon Grid
 *
 * The template for displaying the custom gutenberg block named Icon Grid.
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
		$fh_var_blk_icon_columns     = $bst_block_fields['fh_var_blk_icon_columns'] ?? null;
		$fh_var_blk_icon_design_variation     = $bst_block_fields['fh_var_blk_icon_design_variation'] ?? null;

		?>

		<?php if($fh_var_blk_icon_columns && $fh_var_blk_icon_design_variation === "four-columns"){ ?>
			<section>
				<div class="wrapper">
					<div class="icons-grid">
						<div class="four-columns">
							<?php
								foreach ( $fh_var_blk_icon_columns as $column ) {
									$column_kicker      = $column['kicker'] ?? null;
									$column_title   	= $column['title'] ?? null;
									$column_text   = $column['text'] ?? null;

									$column_icon       = $column['icon'] ?? null;

									?>
									<div class="column center-align">
										<?php if ( $column_icon ) { ?>
											<div class="icon" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $column_icon, 400 ); ?>
											</div>
										<?php } ?>

										<?php if ( $column_kicker ) {  ?>
											<div class="kicker"><?php echo html_entity_decode( $column_kicker ); ?></div>
										<?php } ?>

										<?php if ( $column_title ) {  ?>

											<h3 class="heading-4"><?php echo html_entity_decode( $column_title ); ?></h3>
										<?php } ?>

										<?php if ( $column_text ) {  ?>
											<?php echo html_entity_decode( $column_text ); ?>
										<?php } ?>
									</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</section>
		<?php } else if($fh_var_blk_icon_columns && $fh_var_blk_icon_design_variation === "three-columns"){
			$fh_var_blk_icon_kicker     = $bst_block_fields['fh_var_blk_icon_kicker'] ?? null;
			$fh_var_blk_icon_title     = $bst_block_fields['fh_var_blk_icon_title'] ?? null;

			?>
			<section>
				<div class="wrapper">
					<div class="icons-grid icons-grid-variation">
						<div class="icons-three-columns">
							<?php if($fh_var_blk_icon_kicker || $fh_var_blk_icon_title){ ?>
								<div class="column">
									<?php if ( $fh_var_blk_icon_kicker ) {  ?>
										<div class="kicker"><?php echo html_entity_decode( $fh_var_blk_icon_kicker ); ?></div>
									<?php } ?>
									<?php if ( $fh_var_blk_icon_title ) {  ?>
										<h3 class="medium-heading"><?php echo html_entity_decode( $fh_var_blk_icon_title ); ?></h3>
									<?php } ?>
								</div>
							<?php } ?>

							<?php
								foreach ( $fh_var_blk_icon_columns as $column ) {
									$column_kicker      = $column['kicker'] ?? null;
									$column_title   	= $column['title'] ?? null;
									$column_text   = $column['text'] ?? null;

									$column_icon       = $column['icon'] ?? null;

									?>
									<div class="column">
										<?php if ( $column_icon ) { ?>
											<div class="icon" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $column_icon, 400 ); ?>
											</div>
										<?php } ?>

										<?php if ( $column_kicker ) {  ?>
											<div class="kicker"><?php echo html_entity_decode( $column_kicker ); ?></div>
										<?php } ?>

										<?php if ( $column_title ) {  ?>

											<h3 class="heading-4"><?php echo html_entity_decode( $column_title ); ?></h3>
										<?php } ?>

										<?php if ( $column_text ) {  ?>
											<?php echo html_entity_decode( $column_text ); ?>
										<?php } ?>
									</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</section>
		<?php } else if($fh_var_blk_icon_columns && $fh_var_blk_icon_design_variation === "left-align-icon") {
			$fh_var_blk_icon_kicker     = $bst_block_fields['fh_var_blk_icon_kicker'] ?? null;
			$fh_var_blk_icon_title     = $bst_block_fields['fh_var_blk_icon_title'] ?? null;

			?>
			<section class="ctn-green">
				<div class="wrapper">
					<div class="icons-grid two-variation">
						<div class="icons-three-columns">
							<?php
								foreach ( $fh_var_blk_icon_columns as $column ) {
									$column_kicker      = $column['kicker'] ?? null;
									$column_title   	= $column['title'] ?? null;
									$column_text   = $column['text'] ?? null;

									$column_icon       = $column['icon'] ?? null;

									?>
									<div class="column">
										<?php if ( $column_icon ) { ?>
											<div class="icon" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $column_icon, 400 ); ?>
											</div>
										<?php } ?>

										<div class="icons-grid-content">

											<?php if ( $column_title ) {  ?>

												<h3 class="heading-4"><?php echo html_entity_decode( $column_title ); ?></h3>
											<?php } ?>

											<?php if ( $column_text ) {  ?>
												<?php echo html_entity_decode( $column_text ); ?>
											<?php } ?>
										</div>
									</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</section>
		<?php } else {
			$fh_var_blk_icon_kicker     = $bst_block_fields['fh_var_blk_icon_kicker'] ?? null;
			$fh_var_blk_icon_title     = $bst_block_fields['fh_var_blk_icon_title'] ?? null;

			?>
			<section class="what-we-offer-section">
				<div class="wrapper">
					<div class="what-we-offer">
						<?php if($fh_var_blk_icon_kicker || $fh_var_blk_icon_title){ ?>
							<div class="section-head-simple">
								<?php if ( $fh_var_blk_icon_kicker ) {  ?>
									<div class="kicker-text"><?php echo html_entity_decode( $fh_var_blk_icon_kicker ); ?></div>
								<?php } ?>
								<?php if ( $fh_var_blk_icon_title ) {  ?>
									<h2 class="size-72"><?php echo html_entity_decode( $fh_var_blk_icon_title ); ?></h2>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if($fh_var_blk_icon_columns){ ?>
							<div class="three-columns">

								<?php
									foreach ( $fh_var_blk_icon_columns as $column ) {
										$column_kicker      = $column['kicker'] ?? null;
										$column_title   	= $column['title'] ?? null;
										$column_text   = $column['text'] ?? null;

										$column_icon       = $column['icon'] ?? null;

										?>
									<div class="column">
										<?php if ( $column_icon ) { ?>
											<div class="icon" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
												<?php BaseTheme::the_attachment_image( $column_icon, 400 ); ?>
											</div>
										<?php } ?>

										<?php if ( $column_kicker ) {  ?>
											<div class="kicker"><?php echo html_entity_decode( $column_kicker ); ?></div>
										<?php } ?>

										<?php if ( $column_title ) {  ?>

											<h3 class="heading-4"><?php echo html_entity_decode( $column_title ); ?></h3>
										<?php } ?>

										<?php if ( $column_text ) {  ?>
											<?php echo html_entity_decode( $column_text ); ?>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php
	}
);

