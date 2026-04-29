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
					jQuery('#segmentTitle').replaceWith(`<h1 id="segmentTitle" class="${textColor}" style="color:${textHex}">${d.data.Title} - ${Math.round((d.data.Amount/total)*1000)/10}%</h1>`);
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
			</script>
	<?php }
);
