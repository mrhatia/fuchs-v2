<?php
/**
 * Block Name: Project Team
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
		$fh_var_blk_team_kicker     = $bst_block_fields['fh_var_blk_team_kicker'] ?? null;
		$fh_var_blk_team_title     = $bst_block_fields['fh_var_blk_team_title'] ?? null;
		$fh_var_blk_team_variation     = $bst_block_fields['fh_var_blk_team_variation'] ?? null;
		$fh_var_blk_team_members	= $bst_block_fields['fh_var_blk_team_members'] ?? null;
		?>

		<section class="">
			<div class="wrapper">

				<?php if($fh_var_blk_team_kicker || $fh_var_blk_team_title){ ?>
					<div class="section-head">
						<?php if ( $fh_var_blk_team_kicker ) {  ?>
							<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_blk_team_kicker ); ?></div>
						<?php } ?>
						<?php if ( $fh_var_blk_team_title ) {  ?>
							<h2 class="heading-2"><?php echo html_entity_decode( $fh_var_blk_team_title ); ?></h2>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="team-members-ctn">
					<div class="team-member-row three-columns">
						<?php
							if($fh_var_blk_team_variation === "manual" && $fh_var_blk_team_members){

								foreach( $fh_var_blk_team_members as $key =>  $team_id ){
									list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults($team_id);
										$bst_var_cpt_team_designation = $bst_fields['bst_var_cpt_team_designation'];
										$bst_var_cpt_team_bio = $bst_fields['bst_var_cpt_team_bio'];
										$bst_var_cpt_team_name = get_the_title( $bst_var_post_id );
									?>

									<div class="team-member-column">
										<a href="#member-<?php echo the_ID($bst_var_post_id); ?>" class="popup-link"></a>
										<div class="member-popup mfp-hide" id="member-<?php echo the_ID($bst_var_post_id); ?>">
											<div class="member-popup-inner">
												<div class="member-popup-left">
													<div class="member-popup-image image-cover" tabindex="0">
														<?php
															if ( ! has_post_thumbnail( $bst_var_post_id ) ) {
																echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
															} else {
																echo get_the_post_thumbnail(
																	$bst_var_post_id,
																	'thumb_1000',
																);
															}
														?>
													</div>
												</div>
												<div class="member-popup-right">
													<div class="close-icon mfp-close" role="button" tabindex="0">
														<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/topbar-cross-icon.svg" alt="">
													</div>
													<div class="member-popup-right-inner">
														<h2 class="heading-2" tabindex="0"><?php echo $bst_var_cpt_team_name; ?> </h2>
														<?php if($bst_var_cpt_team_designation){ ?>
															<div class="team-member-designation" tabindex="0"><?php echo html_entity_decode($bst_var_cpt_team_designation); ?></div>
														<?php } ?>
														<?php if($bst_var_cpt_team_bio){ ?>
															<div class="team-member-text">
																<?php echo html_entity_decode($bst_var_cpt_team_bio); ?>
															</div>
														<?php } ?>
													</div>
												</div>

											</div>
										</div>
										<div class="team-member-image image-cover">
											<a href="#">
												<?php
													if ( ! has_post_thumbnail( $bst_var_post_id ) ) {
														echo '<img class="" src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp" >';
													} else {
														echo get_the_post_thumbnail(
															$bst_var_post_id,
															'thumb_1000',
														);
													}
												?>
											</a>
										</div>
										<div class="team-member-content">
											<div class="tm-content-left">
												<?php if($bst_var_cpt_team_designation){ ?>
													<p><?php echo html_entity_decode($bst_var_cpt_team_designation); ?></p>
												<?php } ?>
												<h3 class="heading-6"><a href="#"><?php echo $bst_var_cpt_team_name; ?></a></h3>
											</div>
										</div>

									</div>
								<?php }
							} ?>

					</div>
				</div>
			</div>
		</section>


		<?php
	}
);
