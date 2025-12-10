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
		$fh_var_blk_pie_links        = $bst_block_fields['fh_var_blk_pie_links'] ?? null;
		$fh_var_blk_pie_logo        = $bst_block_fields['fh_var_blk_pie_logo'] ?? null;
		$fh_var_blk_pie_background_image        = $bst_block_fields['fh_var_blk_pie_background_image'] ?? null;
		?>

		<section class="ctn-1700 ctn-container-bg">
			<div class="wrapper">
				<div class="fuchs-chart-block">
					<?php if ( $fh_var_blk_pie_logo ) { ?>
						<div class="chart-center">
							<?php BaseTheme::the_attachment_image( $fh_var_blk_pie_logo, 2000 ); ?>
						</div>
					<?php } ?>

					<canvas id="fuchsChart"></canvas>

					<!-- Outer Labels -->
					<?php if ( $fh_var_blk_pie_links ) : ?>
						<div class="chart-labels">


							<?php foreach ($fh_var_blk_pie_links as $key => $link) {
									$link = $link['link'] ?? '';
									?>

									<?php if ( $link ) { ?>
										<div class="chart-label">
											<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
												<?php echo esc_html( $link['title'] ); ?>
											</a>
										</div>
									<?php } ?>
							<?php } ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</section>

		<?php
			$chart_labels = [];
			$chart_links  = [];

			if ( $fh_var_blk_pie_links ) :
				foreach ( $fh_var_blk_pie_links as $item ) :
					$link = $item['link'] ?? '';
					if ( $link ) :
						$chart_labels[] = esc_html( $link['title'] );
						$chart_links[]  = esc_url( $link['url'] );
					endif;
				endforeach;
			endif;
			?>


		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<script>
			const labels = <?php echo json_encode( $chart_labels ); ?>;
			const links  = <?php echo json_encode( $chart_links ); ?>;

			const totalItems = labels.length;
			const equalValue = totalItems ? 100 / totalItems : 0;
			const dataValues = Array(totalItems).fill(equalValue);

			const ctx = document.getElementById('fuchsChart');

			const chart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: labels,
					datasets: [{
						data: dataValues,
						backgroundColor: [
							'#e57c00', '#df7800', '#d87200', '#d26d00',
							'#cd6800', '#c66300', '#bf5e00', '#b85900'
						],
						borderColor: '#ffffff',
						borderWidth: 2,
						hoverOffset: 8
					}]
				},
				options: {
					cutout: '55%',
					cursor: 'pointer',
					plugins: {
						legend: {
							display: false
						},
						tooltip: {
							enabled: true,
							callbacks: {
								label: function(context) {
									return context.label;
								}
							}
						}
					},
					onClick(evt, elements) {
						if (elements.length > 0) {
							const index = elements[0].index;
							if (links[index]) {
								window.location.href = links[index];
							}
						}
					}
				}
			});
		</script>

	<?php }
);

