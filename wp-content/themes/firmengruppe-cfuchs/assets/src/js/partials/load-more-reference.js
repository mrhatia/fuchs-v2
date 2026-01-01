jQuery(function (jQuery) {

	let currentPage = 1;
	let currentCategory = '';
	let currentRegion = '';
	let currentStatus = '';
	let currentSearch = '';

	const container = jQuery('#reference-container');

	/* ======================
	   AJAX FUNCTION
	====================== */
	function fetchPosts(reset = false) {

		jQuery.ajax({
			url: fuchs_ajax_obj.ajax_url,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'ajax_filter',
				page: currentPage,
				category: currentCategory,
				region: currentRegion,
				status: currentStatus,
				search: currentSearch,
			},
			beforeSend() {
				jQuery('#load-more-reference').text('Loading...');
			},
			success(res) {

				if (reset) {
					container.html(res.data.html);
				} else {
					container.append(res.data.html);
				}

				// Load More handling
				if (currentPage >= res.data.max_page) {
					jQuery('#load-more-reference').parent().remove();
				} else {
					if (!jQuery('#load-more-reference').length) {
						container.after(`
							<div class="load-more load-more-button d-flex justify-content-center">
								<a href="#" class="button green-button" id="load-more-reference">Mehr</a>
							</div>
						`);
					}
					jQuery('#load-more-reference').text('Mehr');
				}
			}
		});
	}

	/* ======================
	   CATEGORY FILTER
	====================== */
	jQuery(document).on('click', '.categories-select-item', function () {
		currentCategory = jQuery(this).data('value') || '';
		currentPage = 1;

		jQuery('.categories-select-item').removeClass('active');
		jQuery(this).addClass('active');

		fetchPosts(true);
	});

	/* ======================
	   REGION FILTER
	====================== */
	jQuery(document).on('click', '.regions-select-item', function () {
		currentRegion = jQuery(this).data('value') || '';
		currentPage = 1;

		jQuery('.regions-select-item').removeClass('active');
		jQuery(this).addClass('active');

		fetchPosts(true);
	});

	/* ======================
	   STATUS FILTER
	====================== */
	jQuery(document).on('click', '.status-select-item', function () {
		currentStatus = jQuery(this).data('value') || '';
		currentPage = 1;

		jQuery('.status-select-item').removeClass('active');
		jQuery(this).addClass('active');

		fetchPosts(true);
	});

	/* ======================
	   SEARCH
	====================== */
	jQuery('#filter').on('submit', function (e) {
		e.preventDefault();

		currentSearch = jQuery('#s').val();
		currentPage = 1;

		fetchPosts(true);
	});

	/* ======================
	   LOAD MORE
	====================== */
	jQuery(document).on('click', '#load-more-reference', function (e) {
		e.preventDefault();
		currentPage++;
		fetchPosts(false);
	});

});
