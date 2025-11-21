<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FUCHS Package
 * @since 1.0.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'partials/content' ); ?>

<section>
			<div class="wrapper">
				<div class="tabbed-content-main image-tabs tabbed-map-items">
					<div class="tabbed-content-head">
						<div class="section-head">
							<h2 class="heading-2" tabindex="0">Projects</h2>
						</div>
						<div class="filter-body tabbed-map-nav">
							<ul role="list" class="select-dropdown-list topic-select-select-dd-menus">
								<li class="dropdown-list-title select-dropdown__checkbox" tabindex="0">
									<a href="#tab-active-tab" class="" tabindex="0" role="button">
										Show all </a>
								</li>
								<li class="dropdown-list-title select-dropdown__checkbox list-active current"
									tabindex="0">
									<a href="#tab-inactive-tab" class="active" tabindex="0" role="button">
										Exterior design </a>
								</li>
								<li class="dropdown-list-title select-dropdown__checkbox" tabindex="0">
									<a href="#tab-facilisis" class="" tabindex="0" role="button">
										Furniture </a>
								</li>
								<li class="dropdown-list-title select-dropdown__checkbox" tabindex="0">
									<a href="#tab-aliquet-amot" class="" tabindex="0" role="button">
										Interior design </a>
								</li>

							</ul>
						</div>
					</div>
					<div class="gl-s36"></div>
					<div class="tabbed-map-content-inner">
						<div id="tab-active-tab" class="tabbed-content-single tabbed-id-item active"
							style="display: block;">
							<div class="images-items three-columns">
								<div class="single-image-card">
									<div class="single-image">
										<img src="/wp-content/themes/firmengruppe-cfuchs/assets/src/images/uploads/h3-img-01.jpg" alt="Tabbed Image">
									</div>
									<div class="single-image-content">
										<div class="small-text">
											EXPLORE THE FEATURES
										</div>
										<div class="service-title">
											General Contract
										</div>
										<div class="plus-button">
											+
										</div>
									</div>
								</div>
								<div class="single-image-card">
									<div class="single-image">
										<img src="/wp-content/themes/firmengruppe-cfuchs/assets/src/images/uploads/h3-img-02.jpg" alt="Tabbed Image">
									</div>
									<div class="single-image-content">
										<div class="small-text">
											EXPLORE THE FEATURES
										</div>
										<div class="service-title">
											General Contract
										</div>
										<div class="plus-button">
											+
										</div>
									</div>
								</div>
								<div class="single-image-card">
									<div class="single-image">
										<img src="/wp-content/themes/firmengruppe-cfuchs/assets/src/images/uploads/h3-img-03.jpg" alt="Tabbed Image">
									</div>
									<div class="single-image-content">
										<div class="small-text">
											EXPLORE THE FEATURES
										</div>
										<div class="service-title">
											General Contract
										</div>
										<div class="plus-button">
											+
										</div>
									</div>
								</div>
								<div class="single-image-card">
									<div class="single-image">
										<img src="/wp-content/themes/firmengruppe-cfuchs/assets/src/images/uploads/h3-img-02.jpg" alt="Tabbed Image">
									</div>
									<div class="single-image-content">
										<div class="small-text">
											EXPLORE THE FEATURES
										</div>
										<div class="service-title">
											General Contract
										</div>
										<div class="plus-button">
											+
										</div>
									</div>
								</div>
								<div class="single-image-card">
									<div class="single-image">
										<img src="/wp-content/themes/firmengruppe-cfuchs/assets/src/images/uploads/h3-img-01.jpg" alt="Tabbed Image">
									</div>
									<div class="single-image-content">
										<div class="small-text">
											EXPLORE THE FEATURES
										</div>
										<div class="service-title">
											General Contract
										</div>
										<div class="plus-button">
											+
										</div>
									</div>
								</div>
								<div class="single-image-card">
									<div class="single-image">
										<img src="/wp-content/themes/firmengruppe-cfuchs/assets/src/images/uploads/h3-img-03.jpg" alt="Tabbed Image">
									</div>
									<div class="single-image-content">
										<div class="small-text">
											EXPLORE THE FEATURES
										</div>
										<div class="service-title">
											General Contract
										</div>
										<div class="plus-button">
											+
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-inactive-tab" class="tabbed-content-single tabbed-id-item active"
							style="display: none;">
							<p tabindex="0">Content nulla nibh amet a adipiscing fringilla. Amet amet ac faucibus metus
								at nullam. In
								sit quisque amet morbi volutpat. Risus tortor dictum tellus aliquam dui nullam et
								fringilla suscipit.
								Lacus nisl vitae congue fames aliquam elementum.</p>
						</div>
						<div id="tab-facilisis" class="tabbed-content-single tabbed-id-item " style="display: none;">
							<p tabindex="0">Content nulla nibh amet a adipiscing fringilla. Amet amet ac faucibus metus
								at nullam. In
								sit quisque amet morbi volutpat. Risus tortor dictum tellus aliquam dui nullam et
								fringilla suscipit.
								Lacus nisl vitae congue fames aliquam elementum.</p>
						</div>
						<div id="tab-aliquet-amot" class="tabbed-content-single tabbed-id-item " style="display: none;">
							<p tabindex="0">Content nulla nibh amet a adipiscing fringilla. Amet amet ac faucibus metus
								at nullam. In
								sit quisque amet morbi volutpat. Risus tortor dictum tellus aliquam dui nullam et
								fringilla suscipit.
								Lacus nisl vitae congue fames aliquam elementum.</p>
						</div>

					</div>
				</div>
			</div>
		</section>
		<div class="gl-s96"></div>
</div>
