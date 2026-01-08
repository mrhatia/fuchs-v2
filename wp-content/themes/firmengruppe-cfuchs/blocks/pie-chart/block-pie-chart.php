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



		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="pie-container">
					<div class="row">
						<div class="col-md-5" id="pieChart">
							<?php if ( $fh_var_blk_pie_logo ) { ?>
						<div class="chart-center">
							<?php BaseTheme::the_attachment_image( $fh_var_blk_pie_logo, 2000 ); ?>
						</div>
					<?php } ?>
						</div>
						<div id="pieText" class="col-md-7 text-container">
							<div class="panel">
								<div class="content-wrapper">
									<h1 id="segmentTitle">Select Fragment</h1>
									<p id="segmentText">Detailed information about internal systems and business
										operations.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

			<script src="https://d3js.org/d3.v5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TimelineLite.min.js"></script>



		<script>

			function midAngle(d) {
				return (d.startAngle + d.endAngle) / 2;
			}



			const data = [
				{ Title: 'Hochbau', Amount: 1300, Description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum metus vel odio convallis condimentum. Integer ullamcorper ipsum vel dui varius congue. Nulla facilisi. Morbi molestie tortor libero, ac placerat urna mollis ac. Vestibulum id ipsum mauris.' },
				{ Title: 'Tiefbau', Amount: 1000, Description: 'In hac habitasse platea dictumst. Curabitur lacus neque, congue ac quam a, sagittis accumsan mauris. Suspendisse et nisl eros. Fusce nulla mi, tincidunt non faucibus vitae, aliquam vel dolor. Maecenas imperdiet, elit eget condimentum fermentum, sem lorem fringilla felis, vitae cursus lorem elit in risus.' },
				{ Title: 'Projektentwicklung', Amount: 1750, Description: 'Aenean faucibus, risus sed eleifend rutrum, leo diam porttitor mauris, a eleifend ipsum ipsum ac ex. Nam scelerisque feugiat augue ac porta. Morbi massa ante, interdum sed nulla nec, finibus cursus augue. Phasellus nunc neque, blandit a nunc ut, mattis elementum arcu.' },
				{ Title: 'Metallbau', Amount: 600, Description: 'Laboriosam pariatur recusandae ipsum nisi, saepe doloremque nobis eaque omnis commodi dolor porro? Error, deserunt veritatis officiis porro libero et suscipit ad. Ipsum dolor sit amet consectetur adipisicing elit.' },
				{ Title: 'Kanaltechnik', Amount: 2000, Description: 'Sit amet consectetur adipisicing elit. Nemo totam perspiciatis tenetur quod ipsam voluptas et consequatur labore harum obcaecati alias voluptate id sit, praesentium ratione nostrum maxime reprehenderit.' },
				{ Title: 'Baulogistik', Amount: 1500, Description: 'Consectetur adipisicing elit. Architecto illum quidem eligendi, consectetur corporis esse enim eveniet distinctio beatae dignissimos recusandae.' },
				{ Title: 'Gerüstbau', Amount: 750, Description: 'Beatae, aperiam voluptas aut atque laborum dolorem fuga. Corporis aperiam, illo nobis suscipit perferendis natus doloremque.' },
				{ Title: 'Invest', Amount: 400, Description: 'Amet consectetur, adipisicing elit. Ipsum perferendis rem illo explicabo voluptate, voluptatum id expedita sapiente magni laboriosam.' },
			];

			const width = parseInt(d3.select('#pieChart').style('width'), 10);
			const height = width;
			const radius = (Math.min(width, height) - 15) / 2;

			const total = data.reduce((sum, d) => sum + d.Amount, 0);

			const titles = data.map((d) => d.Title);
			const innerRadius = jQuery('#pieChart').css('counter-reset').split(' ')[1];

			const arc = d3.arc().outerRadius(radius - 10).innerRadius(innerRadius);
			const arcOver = d3.arc().outerRadius(radius + 10).innerRadius(innerRadius);


			const color = d3.scaleOrdinal()
				.domain(titles)
				.range(['#2BDFBB', '#DF2B4F', '#EE6617', '#FFBF00', '#423E6E', '#E24161']);

			const pie = d3.pie().sort(null).value((d) => +d.Amount);

			const sliceDirection = window.matchMedia('(max-width: 767px)').matches ? 180 : 90;
			let prevSegment = null;

			const svg = d3.select('#pieChart').append('svg')
				.attr('width', '100%')
				.attr('height', '100%')
				.attr('viewBox', `0 0 ${Math.min(width, height)} ${Math.min(width, height)}`)
				.attr('preserveAspectRatio', 'xMinYMin')
				.append('g')
				.attr('transform', `translate(${radius},${height / 2})`)
				.style('filter', 'url(#drop-shadow)');

			const defs = svg.append('defs');
			const filter = defs.append('filter').attr('id', 'drop-shadow').attr('height', '130%');

			filter.append('feGaussianBlur').attr('in', 'SourceAlpha').attr('stdDeviation', 5.5).attr('result', 'blur');
			filter.append('feOffset').attr('in', 'blur').attr('dx', 0).attr('dy', 0).attr('result', 'offsetBlur');

			const feMerge = filter.append('feMerge');
			feMerge.append('feMergeNode').attr('in', 'offsetBlur');
			feMerge.append('feMergeNode').attr('in', 'SourceGraphic');

			let buttonToggle = true;
			const switchToggle = () => setTimeout(() => buttonToggle = true, 1500);

			const change = (d, el) => {
				const angle = sliceDirection - ((d.startAngle * 180 / Math.PI) + ((d.endAngle - d.startAngle) * 180 / Math.PI / 2));

				svg.transition().duration(1000)
					.attr('transform', `translate(${radius},${height / 2}) rotate(${angle})`);

				d3.select(prevSegment).transition().attr('d', arc).style('filter', '');
				prevSegment = el;

				d3.select(el).transition().duration(1000).attr('d', arcOver).style('filter', 'url(#drop-shadow)');
			};

			const timeline = new TimelineLite();

			svg.selectAll('path')
				.data(pie(data))
				.enter().append('path')
				.attr('d', arc)
				.style('fill', (d) => color(d.data.Title))
				.on('click', function (d) {
					if (!buttonToggle) {
						return;
					}
					buttonToggle = false;
					switchToggle();
					change(d, this);

					const tl = new TimelineLite();
					tl.to('.content-wrapper', 0.5, {
						rotationX: '90deg',
						opacity: 0,
						onComplete: () => jQuery('.content-wrapper').hide(),
					}).to('.panel', 0.5, {
						width: '0%',
						opacity: 0.05,
						onComplete: () => {
							jQuery('#segmentTitle').replaceWith(`<h1 id="segmentTitle">${d.data.Title} - ${Math.round((d.data.Amount / total) * 1000) / 10}%</h1>`);
							jQuery('#segmentText').replaceWith(`<p id="segmentText">${d.data.Description}</p>`);
							jQuery('.panel').css('background-color', ColorLuminance(color(d.data.Title), -0.3));
						},
					}).to('.panel', 0.5, {
						width: '100%',
						opacity: 1,
						onComplete: () => jQuery('.content-wrapper').show(),
					}).to('.content-wrapper', 0.5, {
						rotationX: '0deg',
						opacity: 1,
					});
				});

			svg.selectAll('.pie-label')
				.data(pie(data))
				.enter()
				.append('text')
				.attr('class', 'pie-label')
				.attr('transform', d => {
					const [x, y] = arc.centroid(d); // ✅ SLICE CENTER
					return `translate(${x}, ${y})`;
				})
				.attr('text-anchor', 'middle')
				.attr('dominant-baseline', 'middle')
				.style('fill', '#fff')
				.style('font-size', '14px')
				.style('font-weight', '600')
				.style('pointer-events', 'none')
				.text(d => d.data.Title);




			timeline.from('#pieChart', 0.5, { rotation: '-120deg', scale: 0.1, opacity: 0 })
				.from('.panel', 0.75, { width: '0%', opacity: 0 }, '+=.55')
				.from('.content-wrapper', 0.75, { rotationX: '-90deg', opacity: 0 });

			function ColorLuminance(hex, lum = 0) {
				hex = String(hex).replace(/[^0-9a-f]/gi, '');
				if (hex.length < 6) {
					hex = hex.split('').map((x) => x + x).join('');
				}
				let rgb = '#';
				for (let i = 0; i < 3; i++) {
					let c = parseInt(hex.substr(i * 2, 2), 16);
					c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
					rgb += ('00' + c).slice(-2);
				}
				return rgb;
			}
		</script>

	<?php }
);

