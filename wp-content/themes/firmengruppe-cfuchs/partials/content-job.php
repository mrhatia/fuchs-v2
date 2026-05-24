<?php
/**
 * Template part for displaying single Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

list( $bst_var_post_id, $bst_fields, $bst_option_fields ) = BaseTheme::defaults();
// Post Tags & Categories.

// Hero Section Variables.

$fh_var_osngl_job_background_text          = $bst_fields['fh_var_osngl_job_background_text'] ?? null;
$bst_var_pagetitle          = $bst_fields['fh_var_osngl_job_title'] ?? get_the_title();
$fh_var_osngl_job_text          = $bst_fields['fh_var_osngl_job_text'] ?? null;
$fh_var_osngl_job_video          = $bst_fields['fh_var_osngl_job_video'] ?? null;

// Box Section Variables.

$fh_var_osngl_job_box_title          = $bst_fields['fh_var_osngl_job_box_title'] ?? null;
$fh_var_osngl_job_box_image          = $bst_fields['fh_var_osngl_job_box_image'] ?? null;
$fh_var_osngl_job_box_video          = $bst_fields['fh_var_osngl_job_box_video'] ?? null;
$fh_var_osngl_job_button          = $bst_fields['fh_var_osngl_job_button'] ?? null;
$fh_var_osngl_job_sub_boxes_title          = $bst_fields['fh_var_osngl_job_sub_boxes_title'] ?? null;
$fh_var_osngl_job_sub_boxes          = $bst_fields['fh_var_osngl_job_sub_boxes'] ?? null;
$fh_var_osngl_job_box_media_type          = $bst_fields['fh_var_osngl_job_box_media_type'] ?? null;



?>


<section class="ctn-full-width single-service-hero-section">
	<div class="wrapper">
		<div class="hero-inner-slider slider-disable">

			<div class="hero-slide-item">

				<div class="hero-slide-image" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
					<?php
						if ( $fh_var_osngl_job_video ) { ?>
							<video src="<?php echo esc_url($fh_var_osngl_job_video); ?>" autoplay loop playsinline></video>
						<?php } else {
							echo get_the_post_thumbnail(
								$bst_var_post_id,
								'thumb_900',
							);
						}
					?>
				</div>

				<div class="banner-content">
					<div class="banner-content-inner">

					<?php if ( $fh_var_osngl_job_background_text ) {  ?>
						<div class="hero-split-text"><?php echo html_entity_decode( $fh_var_osngl_job_background_text ); ?></div>
					<?php } ?>


					<h1 class="heading-2 hero-reveal"><?php echo esc_html( $bst_var_pagetitle ); ?></h1>

					<?php if ( $fh_var_osngl_job_text ) { ?>
						<div class="hero-reveal">
							<?php echo html_entity_decode( $fh_var_osngl_job_text ); ?>
						</div>
					<?php } ?>

				</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-section">
	<?php get_template_part( 'partials/content' ); ?>
</div>
<div class="gl-s96"></div>


<section class="ctn-full-width">
	<div class="wrapper">
		<div class="category-main">

			<div class="category-items jobs-items">
				<div class="category-single-item">
					<div class="category-single-left">
						<div class="category-image-card">
							<div class="single-image">

								<?php if ( $fh_var_osngl_job_box_media_type === 'video' && $fh_var_osngl_job_box_video ) { ?>

									<div class="video-wrapper" style="height: 100%; position: relative;">
										<video
											class="scroll-play-video"
											src="<?php echo esc_url($fh_var_osngl_job_box_video); ?>"
											playsinline
											muted
											preload="metadata"
										></video>


									</div>

								<?php } elseif ( $fh_var_osngl_job_box_image ) { ?>

									<?php BaseTheme::the_attachment_image( $fh_var_osngl_job_box_image, 1000 ); ?>

								<?php } ?>
							</div>

							<div class="single-image-content">
								<?php if ( $fh_var_osngl_job_box_title ) { ?>
									<div class="service-title-right">
										<?php echo esc_html( $fh_var_osngl_job_box_title ); ?>
									</div>
								<?php } ?>

							</div>
							<button class="video-replay-btn" aria-label="Replay Video">
							</button>
							<button class="video-sound-btn" aria-label="Enable Sound">
							</button>
						</div>
						<?php if($fh_var_osngl_job_button){ ?>
							<div class="category-single-button">
								<?php echo BaseTheme::button( $fh_var_osngl_job_button, 'button white-button' ); ?>
							</div>
						<?php } ?>

					</div>
					<div class="category-single-right">
						<?php if($fh_var_osngl_job_sub_boxes_title){ ?>
							<div class="project-heading job-single-cards-heading">
								<p tabindex="0">
									<?php echo html_entity_decode( $fh_var_osngl_job_sub_boxes_title ); ?>
								</p>
							</div>
						<?php } ?>

						<?php if ( $fh_var_osngl_job_sub_boxes ) { ?>
							<div class="category-single-inne-items">
								<?php foreach ( $fh_var_osngl_job_sub_boxes as $box ) {
									$box_type = $box['box_type'] ?? 'simple';
									?>
									<?php if ( $box_type === 'simple' ) { ?>
										<div class="category-image-card">
											<?php if ( ! empty( $box['image'] ) ) { ?>
												<div class="single-image">
													<?php BaseTheme::the_attachment_image( $box['image'], 1000 ); ?>
												</div>
											<?php } ?>
											<div class="single-image-content">

												<?php if ( ! empty( $box['title'] ) ) { ?>
													<div class="service-title">
														<?php echo esc_html( $box['title'] ); ?>
													</div>
												<?php } ?>

												<?php if ( ! empty( $box['text'] ) ) { ?>
													<div class="service-text">
														<?php echo html_entity_decode( $box['text'] ); ?>
													</div>
												<?php } ?>
											</div>
										</div>
									<?php } else { ?>

										<div class="category-image-card">
											<?php if ( ! empty( $box['image'] ) ) { ?>
												<div class="single-image">
													<?php BaseTheme::the_attachment_image( $box['image'], 1000 ); ?>
												</div>
											<?php } ?>
											<div class="single-image-content">

												<?php if ( ! empty( $box['title'] ) ) { ?>
													<div class="small-text">
														<?php echo esc_html( $box['title'] ); ?>
													</div>
												<?php } ?>
												<?php if ( ! empty( $box['name'] ) ) { ?>
													<div class="service-title">
														<?php echo esc_html( $box['name'] ); ?>
													</div>
												<?php } ?>

												<?php if ( ! empty( $box['text'] ) ) { ?>
													<div class="service-text">
														<?php echo html_entity_decode( $box['text'] ); ?>
													</div>
												<?php } ?>


													<div class="member-contact-info contact-person-card d-flex align-content-center">
														<?php if($box['email']) { ?>
															<div class="email white-icon link-green">
																<a href="mailto:<?php echo html_entity_decode( $box['email'] ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/email-icon-green.svg" alt=""> <?php echo $box['email']; ?></a>
															</div>
														<?php } ?>
														<?php if($box['phone']) { ?>
															<div class="phone white-icon link-green">
																<a href="tel:<?php echo html_entity_decode( $box['phone'] ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/src/images/phone-icon-green.png" alt=""> <?php echo $box['phone']; ?></a>
															</div>
														<?php } ?>
													</div>




											</div>
										</div>
									<?php } ?>

								<?php } ?>
							</div>
						<?php } ?>

					</div>
				</div>


			</div>
		</div>

	</div>
</section>
<div class="gl-s96"></div>

<script>
	document.addEventListener('DOMContentLoaded', function () {

	const videos = document.querySelectorAll('.scroll-play-video');

	const observer = new IntersectionObserver((entries) => {

		entries.forEach(entry => {

			const video = entry.target;

			// autoplay only first time
			if (entry.isIntersecting && !video.dataset.started) {

				video.dataset.started = 'true';

				video.play().catch(function(error) {
					console.log(error);
				});

			}

		});

	}, {
		threshold: 0.5
	});

	videos.forEach(video => {

		const card = video.closest('.category-image-card');
		const replayBtn = card.querySelector('.video-replay-btn');
		const soundBtn = card.querySelector('.video-sound-btn');

		observer.observe(video);

		/* =========================
		   VIDEO PLAYING
		========================= */

		video.addEventListener('play', function () {

			card.classList.add('is-playing');
			card.classList.remove('is-ended');

		});

		/* =========================
		   VIDEO ENDED
		========================= */

		video.addEventListener('ended', function () {

			card.classList.remove('is-playing');
			card.classList.add('is-ended');

			// remove sound active state
			if (soundBtn) {
				soundBtn.classList.remove('is-playing');
			}

		});

		/* =========================
		   SOUND TOGGLE
		========================= */

		if (soundBtn) {

			soundBtn.addEventListener('click', function () {

				// currently muted -> unmute
				if (video.muted) {

					video.muted = false;

					soundBtn.classList.add('is-playing');

				} else {

					// mute again
					video.muted = true;

					soundBtn.classList.remove('is-playing');

				}

			});

		}

		/* =========================
		   REPLAY
		========================= */

		/* =========================
   PLAY / PAUSE / REPLAY
========================= */

if (replayBtn) {

	replayBtn.addEventListener('click', function () {

		// VIDEO ENDED → replay
		if (video.ended) {

			video.currentTime = 0;

			video.play().catch(function(error) {
				console.log(error);
			});

			card.classList.remove('is-ended');

			return;
		}

		// VIDEO PAUSED → play
		if (video.paused) {

			video.play().catch(function(error) {
				console.log(error);
			});

			card.classList.add('is-playing');

		} else {

			// VIDEO PLAYING → pause
			video.pause();

			card.classList.remove('is-playing');

		}

	});

}

	});

});
</script>



