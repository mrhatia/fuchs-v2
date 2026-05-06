<?php
/**
 * Block Name: Faq
 *
 * The template for displaying the custom gutenberg block named Faq.
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
		$bst_var_faq_design_variation     = $bst_block_fields['bst_var_faq_design_variation'] ?? null;
		$bst_var_faq_image     = $bst_block_fields['bst_var_faq_image'] ?? null;
		$bst_var_faq_faqs     = $bst_block_fields['bst_var_faq_faqs'] ?? null;
		?>
		<?php if($bst_var_faq_design_variation === "image-with-text" ){
			$bst_var_faq_image_label     = $bst_block_fields['bst_var_faq_image_label'] ?? null;
			$bst_var_faq_image_bottom_text     = $bst_block_fields['bst_var_faq_image_bottom_text'] ?? null;

			?>
			<section>
				<div class="wrapper">
					<div class="faq-with-image faq-with-image-variation d-flex faq-block">
						<div class="faq-left faq-image-variation">
							<?php if ( $bst_var_faq_image_label ) {  ?>
								<h3 class="heading-3"><?php echo html_entity_decode( $bst_var_faq_image_label ); ?></h3>
							<?php } ?>
						<div class="faq-image image-cover">
							<?php if($bst_var_faq_image){ ?>
								<?php BaseTheme::the_attachment_image( $bst_var_faq_image, 1200 ); ?>
							<?php } ?>
						</div>
						<?php if ( $bst_var_faq_image_bottom_text ) {  ?>
							<div class="image-bottom-text"><?php echo html_entity_decode( $bst_var_faq_image_bottom_text ); ?></div>
						<?php } ?>
						</div>

						<?php if($bst_var_faq_faqs){
							$faq_count = count($bst_var_faq_faqs);
							$faq_items_class = ($faq_count == 1) ? "only-one-faq-style" : "";
							?>

							<div class="faq-items faq-items-variation <?php echo $faq_items_class; ?>">
									<?php foreach ( $bst_var_faq_faqs as $key => $faq ) {
									$faq_question      = $faq['question'] ?? null;
									$faq_answer      = $faq['answer'] ?? null;

									?>
									<div class="faq">

										<div class="faq-head">
												<div class="faq-number">
												<?php echo str_pad(++$key, 2, '0', STR_PAD_LEFT); ?>
											</div>
											<?php if ( $faq_question ) {  ?>
												<h3 class="heading-5"><?php echo html_entity_decode( $faq_question ); ?></h3>
											<?php } ?>
											<span class="faq-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
													fill="none">
													<rect x="9" width="1" height="19" fill="#151515" />
													<path d="M0 10L1.19248e-08 9L19 9V10L0 10Z" fill="#151515" />
												</svg>
											</span>
										</div>
										<div class="faq-content">
											<?php if ( $faq_answer ) {  ?>
												<?php echo html_entity_decode( $faq_answer ); ?>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } else {
			$bst_var_faq_has_image        = ($bst_var_faq_image) ? " faq-with-image " : " simple-faq ";
			?>
			<section>
				<div class="wrapper">
					<div class=" <?php echo $bst_var_faq_has_image; ?> faq-block">
						<?php if($bst_var_faq_image){ ?>
							<div class="faq-image image-cover">
								<?php BaseTheme::the_attachment_image( $bst_var_faq_image, 1200 ); ?>
							</div>
						<?php } ?>
						<?php if($bst_var_faq_faqs){
							$faq_count = count($bst_var_faq_faqs);
							$faq_items_class = ($faq_count == 1) ? "only-one-faq-style" : "";
							?>

							<div class="faq-items <?php echo $faq_items_class; ?>">
								<?php foreach ( $bst_var_faq_faqs as $key => $faq ) {
									$faq_question      = $faq['question'] ?? null;
									$faq_answer      = $faq['answer'] ?? null;

									?>
									<div class="faq">
										<div class="faq-head">
											<div class="faq-number">
												<?php echo str_pad(++$key, 2, '0', STR_PAD_LEFT); ?>
											</div>


											<?php if ( $faq_question ) {  ?>
												<h3 class="heading-5"><?php echo html_entity_decode( $faq_question ); ?></h3>
											<?php } ?>
											<span class="faq-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
													fill="none">
													<rect x="9" width="1" height="19" fill="#151515" />
													<path d="M0 10L1.19248e-08 9L19 9V10L0 10Z" fill="#151515" />
												</svg>
											</span>
										</div>
										<div class="faq-content">
											<?php if ( $faq_answer ) {  ?>
												<?php echo html_entity_decode( $faq_answer ); ?>
											<?php } ?>
										</div>
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

