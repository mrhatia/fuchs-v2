<?php
/**
 * Block Name: Media Alongside Text
 *
 * The template for displaying the custom gutenberg block named Media Alongside Text.
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
		$bst_var_blk_mat_design_variation        = $bst_block_fields['bst_var_blk_mat_design_variation'] ?? null;
		$bst_var_blk_mat_kicker        = $bst_block_fields['bst_var_blk_mat_kicker'] ?? null;
		$bst_var_blk_mat_title        = $bst_block_fields['bst_var_blk_mat_title'] ?? null;
		$bst_var_blk_mat_text        = $bst_block_fields['bst_var_blk_mat_text'] ?? null;
		$bst_var_blk_mat_button        = $bst_block_fields['bst_var_blk_mat_button'] ?? null;
		$bst_var_blk_mat_image        = $bst_block_fields['bst_var_blk_mat_image'] ?? null;
		$bst_var_blk_mat_image_two        = $bst_block_fields['bst_var_blk_mat_image_two'] ?? null;
		$bst_var_blk_mat_img_location = $bst_block_fields['bst_var_blk_mat_img_position'] ?? null;

		?>
<div class="gl-s96"></div>
	<!-- Service Info -->
	<section class="ctn-full-width">
		<div class="wrapper">
			<div class="introduction-team">
				<div class="introduction-team-left">

					<div class="section-head">
						<div class="hero-split-text">
							investors
						</div>
						<h2 class="heading-2">Services </h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean penti commodo ligula
							eget
							dolor.
							Aenean massa. Cum
							sociis Theme natoque.</p>
						<a href="" class="button white-button"> Read More</a>

					</div>
				</div>
				<div class="introduction-team-image image-cover">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h4-img-01.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- What we offer -->
	<section>
		<div class="wrapper">
			<div class="what-we-offer">
				<div class="section-head-simple">
					<div class="kicker-text">
						Explore the Features
					</div>
					<h2 class="heading-3">
						What we Offer
					</h2>
				</div>
				<div class="three-columns">
					<div class="column">
						<div class="icon">
							<img src="https://wilmer.qodeinteractive.com/wp-content/uploads/2019/02/h5-icon-img-01.png"
								alt="">
						</div>
						<div class="kicker">
							Explore the features
						</div>
						<h3 class="heading-4" tabindex="0">Efficient Building</h3>
						<p tabindex="0">Lorem ipsum dolor sit ameet done pulvin. Aenean nisi ligula eget cum dolor
							quam. Aenean et massa eni.</p>
					</div>
					<div class="column">
						<div class="icon">
							<img src="https://wilmer.qodeinteractive.com/wp-content/uploads/2019/02/h5-icon-img-02.png"
								alt="">
						</div>
						<div class="kicker">
							Explore the Features
						</div>
						<h3 class="heading-4" tabindex="0">Financial Results</h3>
						<p tabindex="0">Lorem ipsum dolor sit ameet. Don nisi ligula eget dolor quam et.
						</p>
					</div>
					<div class="column">
						<div class="icon">
							<img src="https://wilmer.qodeinteractive.com/wp-content/uploads/2019/02/h5-icon-img-04.png"
								alt="">
						</div>
						<div class="kicker">
							Explore the Features
						</div>
						<h3 class="heading-4" tabindex="0">General Contracting</h3>
						<p tabindex="0">Lorem ipsum dolor sit ameet. Don nisi ligula eget dolor quam et.
						</p>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Big Iat block -->
	<section class="ctn-full-width">
		<div class="wrapper">
			<div class="applicants-questions">
				<div class="applicants-image image-cover">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/uploads/h4-img-02.jpg" alt="">
				</div>
				<div class="applicants-content">
					<div class="kicker-text">
						Explore the Features
					</div>
					<h2 class="heading-2">
						Full project management
					</h2>
					<p>
						Vel illum dolore eu feugiat nulla facilisis at vero eros et accu qui blandit praesent lupta
						tum zril delenit augue
						dolore eu. Autem vel eum iriure dolor in hendrerit in vulput.
					</p>
					<a href="
					" class="button white-button">
						Read more
					</a>
				</div>
			</div>
		</div>
	</section>

<?php
	}
);

