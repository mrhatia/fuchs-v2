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
		$fh_var_blk_pie_logo        = $bst_block_fields['fh_var_blk_pie_logo'] ?? null;

		$fh_var_blk_pie_chart_tabs        = $bst_block_fields['fh_var_blk_pie_chart_tabs'] ?? null;



		?>



		<section class="ctn-full-width">
			<div class="wrapper">
				<div class="pie-container">
					<div class="mobile-tabs">
						<?php foreach( $fh_var_blk_pie_chart_tabs as $index => $item ) : ?>
							<button
								class="mobile-tab <?php echo $index === 0 ? 'active' : ''; ?>"
								data-index="<?php echo $index; ?>">
								<?php echo esc_html( $item['title'] ?: $item['label'] ); ?>
							</button>
						<?php endforeach; ?>
					</div>
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
									<img id="segmentImage" src="" alt="" />
									<h1 id="segmentTitle">Select Fragment</h1>
									<p id="segmentText">Detailed information about internal systems and business
										operations.</p>
								</div>
							</div>
						</div>
					</div>

					<?php if ( $fh_var_blk_pie_chart_tabs ) : ?>
						<div class="mobile-dots" aria-label="Panel navigation">
							<?php foreach ( $fh_var_blk_pie_chart_tabs as $index => $item ) : ?>
								<button
									type="button"
									class="mobile-dot <?php echo 0 === $index ? 'active' : ''; ?>"
									data-index="<?php echo esc_attr( $index ); ?>"
									aria-label="<?php echo esc_attr( sprintf( 'Show panel %d', $index + 1 ) ); ?>"
									aria-current="<?php echo 0 === $index ? 'true' : 'false'; ?>">
								</button>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

			<script src="https://d3js.org/d3.v5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TimelineLite.min.js"></script>

		<style>
			.color-white { color: #ffffff; }
			.color-black { color: #000000; }
			.color-green { color: #f2976a; }
			.color-orange { color: #e27602; }


			.mobile-tabs{
	display:none;
	gap:12px;
	overflow-x:auto;
	white-space:nowrap;
	-webkit-overflow-scrolling:touch;
}

.mobile-tabs::-webkit-scrollbar{
	display:none;
}

.mobile-tab{
	flex-shrink:0;
	padding:10px 20px;
	border:none;
	background:#eee;
	border-radius:30px;
	cursor:pointer;
	font-size:14px;
	background-color: transparent;
	border: 1px solid #ffffff;
}

.mobile-tab.active{
	background-color:#e37806;
	border-color:#e37806;
	color:#fff;
}

.mobile-dots {
	display: none;
	align-items: center;
	justify-content: center;
	gap: 8px;
	margin-top: 18px;
}

.mobile-dot {
	width: 10px;
	height: 10px;
	padding: 0;
	border: 0;
	border-radius: 999px;
	background-color: rgba(0, 0, 0, 0.25);
	cursor: pointer;
	transition: width 200ms ease, background-color 200ms ease;
}

.mobile-dot.active {
	background-color: #e37806;
}

.mobile-dot:focus-visible {
	outline: 2px solid #e37806;
	outline-offset: 3px;
}

@media (max-width: 767px) {

	#pieChart {
		display: none;
	}

	.mobile-tabs {
		display: flex;
		width: 100%;
		max-width: 100%;
		overflow-x: auto;
		scroll-behavior: smooth;
	}

	.mobile-dots {
		display: flex;
	}

	#pieText {
		width: 100%;
		max-width: 100%;
		flex: 0 0 100%;
	}

	#pieText .panel {
		width: 100%;
		overflow: hidden;

		/* Allow vertical page scrolling, but handle horizontal swipe ourselves */
		touch-action: pan-y;
		user-select: none;
		-webkit-user-select: none;
	}

	#pieText .content-wrapper {
		transform: translateX(0);
		opacity: 1;
		will-change: transform, opacity;
	}
}
		</style>

				<script>
				function midAngle(d){return(d.startAngle+d.endAngle)/2;}


				const data = [
				<?php if( $fh_var_blk_pie_chart_tabs ): ?>
					<?php foreach( $fh_var_blk_pie_chart_tabs as $item ):
						$label = $item['label'] ?? '';
						$value = $item['value'] ?? 0;
						$title = $item['title'] ?? '';
						$text  = $item['text'] ?? '';
						$logo  = $item['logo'] ?? '';

						// fallback color rotation (same behavior maintain karne ke liye)
						static $i = 0;
						$colors = ['color-green','color-white','color-orange'];
						$class = $colors[$i % 3];
						$i++;
					?>
					{
						Title: '<?php echo esc_js($title ? $title : $label); ?>',
						Amount: <?php echo (int)$value; ?>,
						Description: '<?php echo esc_js($text); ?>',
						Class: '<?php echo $class; ?>',
						Image: '<?php echo esc_url($logo); ?>'
					},
					<?php endforeach; ?>
				<?php endif; ?>
				];
				window.pieData = data;

				if(window.innerWidth >= 768){
					const width=parseInt(d3.select('#pieChart').style('width'),10);
					const height=width;
					const radius=(Math.min(width,height)-15)/2;
					const total=data.reduce((sum,d)=>sum+d.Amount,0);
					const titles=data.map(d=>d.Title);
					const innerRadius=jQuery('#pieChart').css('counter-reset').split(' ')[1];

					const arc=d3.arc().outerRadius(radius-10).innerRadius(innerRadius);
					const arcOver=d3.arc().outerRadius(radius+10).innerRadius(innerRadius);

					const color=d3.scaleOrdinal()
					.domain(titles)
					.range(data.map(d=>d.Class==='color-white'?'#e1831e':d.Class==='color-green'?'#e37806':'#be6200'));

					const pie=d3.pie().sort(null).value(d=>+d.Amount);
					let prevSegment=null;

					const root=d3.select('#pieChart').append('svg')
					.attr('width','100%')
					.attr('height','100%')
					.attr('viewBox',`0 0 ${Math.min(width,height)} ${Math.min(width,height)}`)
					.attr('preserveAspectRatio','xMinYMin');

					const svg=root.append('g')
					.attr('transform',`translate(${radius},${height/2})`);

					const defs=root.append('defs');
					const filter=defs.append('filter').attr('id','drop-shadow').attr('height','130%');
					filter.append('feGaussianBlur').attr('in','SourceAlpha').attr('stdDeviation',5.5).attr('result','blur');
					filter.append('feOffset').attr('in','blur').attr('dx',0).attr('dy',0).attr('result','offsetBlur');
					const feMerge=filter.append('feMerge');
					feMerge.append('feMergeNode').attr('in','offsetBlur');
					feMerge.append('feMergeNode').attr('in','SourceGraphic');

					let buttonToggle=true;
					const switchToggle=()=>setTimeout(()=>buttonToggle=true,1500);

					const change=(d,el)=>{
					d3.select(prevSegment).transition().attr('d',arc).style('filter','');
					prevSegment=el;
					d3.select(el).transition().duration(1000).attr('d',arcOver).style('filter','url(#drop-shadow)');
					};

					const timeline=new TimelineLite();

					svg.selectAll('path')
					.data(pie(data))
					.enter().append('path')
					.attr('d',arc)
					.style('fill',d=>color(d.data.Title))
					.on('click',function(d){
						if(!buttonToggle){return;}
						buttonToggle=false;
						switchToggle();
						change(d,this);


						const tl=new TimelineLite();
						tl.to('.content-wrapper',0.5,{rotationX:'90deg',opacity:0,onComplete:()=>jQuery('.content-wrapper').hide()})
						.to('.panel',0.5,{
						width:'0%',
						opacity:0.05,
						onComplete:()=>{
						const sliceColor=color(d.data.Title);
						const textColor=(sliceColor.toLowerCase()==='#ffffff')?'color-black':'color-white';
						const textHex=(sliceColor.toLowerCase()==='#ffffff')?'#000000':'#ffffff';
						jQuery('#segmentTitle').replaceWith(`<h1 id="segmentTitle" class="${textColor}" style="color:${textHex}">${d.data.Title} </h1>`);
						jQuery('#segmentText').replaceWith(`<p id="segmentText" class="${textColor}" style="color:${textHex}">${d.data.Description}</p>`);
						// update image
						const imgEl = jQuery('#segmentImage');

						if (d.data.Image) {
							imgEl.attr('src', d.data.Image).show();
						} else {
							imgEl.attr('src', '').hide(); // hide if no image
						}

						jQuery('.panel').css('background-color',ColorLuminance(sliceColor));
						}}).to('.panel',0.5,{width:'100%',opacity:1,onComplete:()=>jQuery('.content-wrapper').show()})
						.to('.content-wrapper',0.5,{rotationX:'0deg',opacity:1});
					});

					// ✅ Auto select first slice on load
					setTimeout(() => {
						const first = svg.selectAll('path').nodes()[0];
						const firstData = pie(data)[0];

						if (first) {
							change(firstData, first);

							const sliceColor = color(firstData.data.Title);
							const textColor = (sliceColor.toLowerCase() === '#ffffff') ? 'color-black' : 'color-white';
							const textHex = (sliceColor.toLowerCase() === '#ffffff') ? '#000000' : '#ffffff';

							jQuery('#segmentTitle').html(
								`${firstData.data.Title}`
							).attr('class', textColor).css('color', textHex);

							jQuery('#segmentText').html(firstData.data.Description)
								.attr('class', textColor).css('color', textHex);

							jQuery('#segmentImage').attr('src', firstData.data.Image);

							jQuery('.panel').css('background-color', ColorLuminance(sliceColor));
						}
					}, 500);

					svg.selectAll('.pie-label')
					.data(pie(data))
					.enter()
					.append('text')
					.attr('class','pie-label')
					.attr('transform',d=>{
					const[x,y]=arc.centroid(d);
					return`translate(${x},${y})`;
					})
					.attr('text-anchor','middle')
					.attr('dominant-baseline','middle')
					.style('fill',d=>color(d.data.Title).toLowerCase()==='#ffffff'?'#000000':'#ffffff')
					.style('font-size','14px')
					.style('font-weight','600')
					.style('pointer-events','none')
					.text(d=>d.data.Title);

					timeline.from('#pieChart',0.5,{rotation:'-120deg',scale:0.1,opacity:0})
					.from('.panel',0.75,{width:'0%',opacity:0},'+=.55')
					.from('.content-wrapper',0.75,{rotationX:'-90deg',opacity:0});

					function ColorLuminance(hex,lum=0){
					hex=String(hex).replace(/[^0-9a-f]/gi,'');
					if(hex.length<6){hex=hex.split('').map(x=>x+x).join('');}
					let rgb='#';
					for(let i=0;i<3;i++){
					let c=parseInt(hex.substr(i*2,2),16);
					c=Math.round(Math.min(Math.max(0,c+(c*lum)),255)).toString(16);
					rgb+=('00'+c).slice(-2);
					}
					return rgb;
					}
				}
			</script>

		<script>
	jQuery(document).ready(function ($) {

		if (window.innerWidth >= 768 || !window.pieData || !window.pieData.length) {
			return;
		}

		const mobileData = window.pieData;
		const $panel = jQuery('#pieText .panel');
		const $content = $panel.find('.content-wrapper');
		const $tabs = jQuery('.mobile-tab');
		const $dots = jQuery('.mobile-dot');

		let currentIndex = 0;
		let touchStartX = 0;
		let touchStartY = 0;
		let isAnimating = false;

		const swipeThreshold = 50;

		const colors = {
			'color-white': '#e1831e',
			'color-green': '#e37806',
			'color-orange': '#be6200'
		};

		/**
		 * Update panel content and active tab.
		 */
		function updateMobileContent(index) {

			if (!mobileData[index]) {
				return;
			}

			const item = mobileData[index];
			const bgColor = colors[item.Class] || '#e37806';

			jQuery('#segmentTitle')
				.text(item.Title)
				.css('color', '#ffffff');

			jQuery('#segmentText')
				.text(item.Description)
				.css('color', '#ffffff');

			if (item.Image) {
				jQuery('#segmentImage')
					.attr('src', item.Image)
					.attr('alt', item.Title)
					.show();
			} else {
				jQuery('#segmentImage')
					.attr('src', '')
					.attr('alt', '')
					.hide();
			}

			$panel.css('background-color', bgColor);

			// Update active tab.
			$tabs.removeClass('active');

			const $activeTab = $tabs.filter(
				'[data-index="' + index + '"]'
			);

			$activeTab.addClass('active');

			// Update active dot.
			$dots
				.removeClass('active')
				.attr('aria-current', 'false');

			$dots
				.filter('[data-index="' + index + '"]')
				.addClass('active')
				.attr('aria-current', 'true');

			// Automatically bring active tab into view.
			if ($activeTab.length && $activeTab[0].scrollIntoView) {
				$activeTab[0].scrollIntoView({
					behavior: 'smooth',
					block: 'nearest',
					inline: 'center'
				});
			}
		}

		/**
		 * Change panel with horizontal animation.
		 *
		 * direction:
		 *  1 = next
		 * -1 = previous
		 */
		function changeMobilePanel(newIndex, direction) {

			if (
				isAnimating ||
				newIndex < 0 ||
				newIndex >= mobileData.length ||
				newIndex === currentIndex
			) {
				return;
			}

			isAnimating = true;

			const exitPosition = direction === 1 ? '-45px' : '45px';
			const enterPosition = direction === 1 ? '45px' : '-45px';

			$content.css({
				transition: 'transform 180ms ease, opacity 180ms ease',
				transform: 'translateX(' + exitPosition + ')',
				opacity: 0
			});

			window.setTimeout(function () {

				currentIndex = newIndex;
				updateMobileContent(currentIndex);

				// Place new content on the opposite side.
				$content.css({
					transition: 'none',
					transform: 'translateX(' + enterPosition + ')',
					opacity: 0
				});

				// Animate the new content into position.
				window.requestAnimationFrame(function () {
					window.requestAnimationFrame(function () {

						$content.css({
							transition: 'transform 220ms ease, opacity 220ms ease',
							transform: 'translateX(0)',
							opacity: 1
						});

						window.setTimeout(function () {
							isAnimating = false;
						}, 220);
					});
				});

			}, 180);
		}

		/**
		 * Keep tab buttons and dot navigation synchronized.
		 */
		$tabs.add($dots).on('click', function () {

			const newIndex = Number(jQuery(this).data('index'));

			if (newIndex === currentIndex) {
				return;
			}

			const direction = newIndex > currentIndex ? 1 : -1;

			changeMobilePanel(newIndex, direction);
		});

		/**
		 * Record swipe starting position.
		 */
		$panel.on('touchstart', function (event) {

			const touch = event.originalEvent.touches[0];

			touchStartX = touch.clientX;
			touchStartY = touch.clientY;
		});

		/**
		 * Detect swipe direction.
		 */
		$panel.on('touchend', function (event) {

			const touch = event.originalEvent.changedTouches[0];

			const distanceX = touch.clientX - touchStartX;
			const distanceY = touch.clientY - touchStartY;

			// Ignore small movements and vertical scrolling.
			if (
				Math.abs(distanceX) < swipeThreshold ||
				Math.abs(distanceX) <= Math.abs(distanceY)
			) {
				return;
			}

			// Swipe left: next panel.
			if (distanceX < 0) {
				changeMobilePanel(currentIndex + 1, 1);
			}

			// Swipe right: previous panel.
			if (distanceX > 0) {
				changeMobilePanel(currentIndex - 1, -1);
			}
		});

		// Initially display the first item.
		updateMobileContent(currentIndex);
	});
</script>
	<?php }
);
