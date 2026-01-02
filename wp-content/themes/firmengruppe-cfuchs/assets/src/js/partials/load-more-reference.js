jQuery(function (jQuery) {

	let currentPage = 1;
	let currentCategory = '';
	let currentRegion = '';
	let currentStatus = '';
	let currentSearch = '';

	const container = jQuery('#reference-container');
	const section = jQuery('#reference-posts-container');

	/* ======================
	   URL HELPERS
	====================== */
	function updateURL() {
		const params = new URLSearchParams();

		// IMPORTANT: s ko empty bhi allow karo
		if (
			currentSearch !== '' ||
			currentCategory ||
			currentRegion ||
			currentStatus
		) {
			params.set('s', currentSearch);
		}

		if (currentCategory) params.set('category', currentCategory);
		if (currentRegion) params.set('region', currentRegion);
		if (currentStatus) params.set('status', currentStatus);

		const newURL = params.toString()
			? `${window.location.pathname}?${params.toString()}`
			: window.location.pathname;

		history.pushState(null, '', newURL);
	}

	function toggleSectionVisibility(fromURL = false) {
		const params = new URLSearchParams(window.location.search);

		// agar URL me ?s exist karta hai (even empty) → show
		if (
			params.has('s') ||
			currentCategory ||
			currentRegion ||
			currentStatus
		) {
			section.removeClass('hide-section');
		} else {
			section.addClass('hide-section');
		}
	}

	/* ======================
	   READ PARAMS ON LOAD
	====================== */
	function initFromURL() {
		const params = new URLSearchParams(window.location.search);

		currentSearch   = params.has('s') ? params.get('s') || '' : '';
		currentCategory = params.get('category') || '';
		currentRegion   = params.get('region') || '';
		currentStatus   = params.get('status') || '';

		if (params.has('s')) {
			jQuery('#s').val(currentSearch);
		}

		if (currentCategory) {
			jQuery(`.categories-select-item[data-value="${currentCategory}"]`).addClass('active');
		}

		if (currentRegion) {
			jQuery(`.regions-select-item[data-value="${currentRegion}"]`).addClass('active');
		}

		if (currentStatus) {
			jQuery(`.status-select-item[data-value="${currentStatus}"]`).addClass('active');
		}

		toggleSectionVisibility(true);

		// agar URL me ?s hai (even empty) ya koi filter hai → AJAX call
		if (
			params.has('s') ||
			currentCategory ||
			currentRegion ||
			currentStatus
		) {
			fetchPosts(true);
		}
	}

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

		updateURL();
		toggleSectionVisibility();
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

		updateURL();
		toggleSectionVisibility();
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

		updateURL();
		toggleSectionVisibility();
		fetchPosts(true);
	});

	/* ======================
	   SEARCH SUBMIT
	====================== */
	jQuery('#filter').on('submit', function (e) {
		e.preventDefault();

		currentSearch = jQuery('#s').val() || '';
		currentPage = 1;

		updateURL();
		toggleSectionVisibility();
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

	/* ======================
	   INIT
	====================== */
	initFromURL();

});
