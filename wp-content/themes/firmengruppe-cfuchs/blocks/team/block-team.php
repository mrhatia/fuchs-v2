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
		$bst_var_blk_prjstr_title     = $bst_block_fields['bst_var_blk_prjstr_title'] ?? null;
		$bst_var_blk_prjstr_variation     = $bst_block_fields['bst_var_blk_prjstr_variation'] ?? null;
		$bst_var_blk_prjstr_projects	= $bst_block_fields['bst_var_blk_prjstr_projects'] ?? null;
		?>

		<section class="">
			<div class="wrapper">
					<div class="section-head">
						<div class="hero-split-text">
							Projects
						</div>
						<h2 class="heading-2">Projects</h2>
					</div>
				<div class="team-members-ctn">
					<div class="team-member-row three-columns">
						<div class="team-member-column">
							<a href="#stefen" class="popup-link"></a>
							<div class="member-popup mfp-hide" id="stefen">
								<div class="member-popup-inner">
									<div class="member-popup-left">
										<div class="member-popup-image image-cover" tabindex="0">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h1-team-img-01.jpg" alt="">
										</div>
									</div>
									<div class="member-popup-right">
										<div class="close-icon mfp-close" role="button" tabindex="0">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/topbar-cross-icon.svg" alt="">
										</div>
										<div class="member-popup-right-inner">
											<h2 class="heading-2" tabindex="0">
												Stefen James </h2>
											<div class="team-member-designation" tabindex="0"> Listing Agent
												at legend reality</div>
											<div class="team-member-text">
												<p>As your dedicated listing agent, I bring deep market knowledge,
													strategic marketing expertise, and a commitment to
													delivering exceptional results. From accurately pricing your
													home to creating impactful marketing campaigns, I handle
													every detail with care.</p>
												<p>My goal is to ensure your selling experience is smooth,
													transparent, and successful — helping you get the best possible
													price in the shortest amount of time. Whether it's staging
													advice, negotiation strategies, or constant communication,
													I'm here to guide you every step of the way.</p>
												<p> Whether it's staging advice, negotiation strategies, or constant
													communication, I'm here to guide you every step of the
													way.</p>

											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="team-member-image image-cover">
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h1-team-img-01.jpg" alt="Member image">
								</a>
							</div>
							<div class="team-member-content">
								<div class="tm-content-left">
									<p>Listing Agent</p>
									<h3 class="heading-6"><a href="#">Stefen James</a></h3>
								</div>
							</div>

						</div>
						<div class="team-member-column">
							<a href="#tony-cucolo" class="popup-link"></a>
							<div class="member-popup mfp-hide" id="tony-cucolo">
								<div class="member-popup-inner">
									<div class="member-popup-left">
										<div class="member-popup-image image-cover" tabindex="0">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h1-team-img-02.jpg" alt="">
										</div>
									</div>
									<div class="member-popup-right">
										<div class="close-icon mfp-close" role="button" tabindex="0">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/topbar-cross-icon.svg" alt="">
										</div>
										<div class="member-popup-right-inner">
											<h2 class="heading-2" tabindex="0">
												Stefen James </h2>
											<div class="team-member-designation" tabindex="0"> Listing Agent
												at legend reality</div>
											<div class="team-member-text">
												<p>As your dedicated listing agent, I bring deep market knowledge,
													strategic marketing expertise, and a commitment to
													delivering exceptional results. From accurately pricing your
													home to creating impactful marketing campaigns, I handle
													every detail with care.</p>
												<p>My goal is to ensure your selling experience is smooth,
													transparent, and successful — helping you get the best possible
													price in the shortest amount of time. Whether it's staging
													advice, negotiation strategies, or constant communication,
													I'm here to guide you every step of the way.</p>
												<p> Whether it's staging advice, negotiation strategies, or constant
													communication, I'm here to guide you every step of the
													way.</p>

											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="team-member-image image-cover">
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h1-team-img-02.jpg" alt="Member image">
								</a>
							</div>
							<div class="team-member-content">
								<div class="tm-content-left">
									<p>Listing Agent</p>
									<h3 class="heading-6"><a href="#">Stefen James</a></h3>
								</div>

							</div>

						</div>
						<div class="team-member-column">
							<a href="#stefen-james" class="popup-link"></a>
							<div class="member-popup mfp-hide" id="stefen-james">
								<div class="member-popup-inner">
									<div class="member-popup-left">
										<div class="member-popup-image image-cover" tabindex="0">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h1-team-img-03.jpg" alt="">
										</div>
									</div>
									<div class="member-popup-right">
										<div class="close-icon mfp-close" role="button" tabindex="0">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/topbar-cross-icon.svg" alt="">
										</div>
										<div class="member-popup-right-inner">
											<h2 class="heading-2" tabindex="0">
												Stefen James </h2>
											<div class="team-member-designation" tabindex="0"> Listing Agent
												at legend reality</div>
											<div class="team-member-text">
												<p>As your dedicated listing agent, I bring deep market knowledge,
													strategic marketing expertise, and a commitment to
													delivering exceptional results. From accurately pricing your
													home to creating impactful marketing campaigns, I handle
													every detail with care.</p>
												<p>My goal is to ensure your selling experience is smooth,
													transparent, and successful — helping you get the best possible
													price in the shortest amount of time. Whether it's staging
													advice, negotiation strategies, or constant communication,
													I'm here to guide you every step of the way.</p>
												<p> Whether it's staging advice, negotiation strategies, or constant
													communication, I'm here to guide you every step of the
													way.</p>

											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="team-member-image image-cover">
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h1-team-img-03.jpg" alt="Member image">
								</a>
							</div>
							<div class="team-member-content">
								<div class="tm-content-left">
									<p>Listing Agent</p>
									<h3 class="heading-6"><a href="#">Stefen James</a></h3>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</section>


		<?php
	}
);
