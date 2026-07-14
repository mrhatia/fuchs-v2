jQuery(function () {

	let currentPage = 1;
	let currentCategory = '';
	let currentRegion = '';
	let currentStatus = '';
	let currentSearch = '';

	const container = jQuery('#jobs-container');
	const section = jQuery('#job-posts-container');

	/* ======================
	   LOADER
	====================== */
	const loader = jQuery('<div class="ajax-loader"></div>');
	section.append(loader);

	function showLoader() {
		loader.addClass('active');
	}

	function hideLoader() {
		loader.removeClass('active');
	}

	/* ======================
	   URL
	====================== */
	function updateURL() {
		const params = new URLSearchParams();

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

		history.pushState(
			null,
			'',
			params.toString()
				? `${location.pathname}?${params}`
				: location.pathname
		);
	}

	function toggleSectionVisibility() {
		const params = new URLSearchParams(window.location.search);

		params.has('s') || currentCategory || currentRegion || currentStatus
			? section.removeClass('hide-section')
			: section.addClass('hide-section');
	}

	/* ======================
	   AJAX
	====================== */
	function fetchJobs(reset = false) {

		showLoader();

		jQuery.ajax({
			url: fuchs_ajax_obj.ajax_url,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'ajax_jobs_filter',
				page: currentPage,
				category: currentCategory,
				region: currentRegion,
				status: currentStatus,
				search: currentSearch,
				no_jobs_message:
					typeof noJobsMessage !== 'undefined'
						? noJobsMessage
						: 'No Jobs Found.',
			},
			success(res) {
				reset
					? container.html(res.data.html)
					: container.append(res.data.html);

				if (currentPage >= res.data.max_page) {
					jQuery('#load-more-jobs').parent().remove();
				}
			},
			complete() {
				hideLoader();
			}
		});
	}

	/* ======================
	   FILTERS
	====================== */
	jQuery(document).on('click', '.categories-select-item', function () {
	const selectedValue = jQuery(this).data('value');

	currentCategory = selectedValue === 'all' ? '' : selectedValue;
	currentPage = 1;

	jQuery('.categories-select-item').removeClass('active');
	jQuery(this).addClass('active');

	updateURL();
	fetchJobs(true);
});

jQuery(document).on('click', '.regions-select-item', function () {
	const selectedValue = jQuery(this).data('value');

	currentRegion = selectedValue === 'all' ? '' : selectedValue;
	currentPage = 1;

	jQuery('.regions-select-item').removeClass('active');
	jQuery(this).addClass('active');

	updateURL();
	fetchJobs(true);
});

jQuery(document).on('click', '.status-select-item', function () {
	const selectedValue = jQuery(this).data('value');

	currentStatus = selectedValue === 'all' ? '' : selectedValue;
	currentPage = 1;

	jQuery('.status-select-item').removeClass('active');
	jQuery(this).addClass('active');

	updateURL();
	fetchJobs(true);
});

	jQuery('#filter').on('submit', function (e) {
		e.preventDefault();
		currentSearch = jQuery('#s').val() || '';
		currentPage = 1;
		updateURL();
		toggleSectionVisibility();
		fetchJobs(true);
	});

	jQuery(document).on('click', '#load-more-jobs', function (e) {
		e.preventDefault();
		currentPage++;
		fetchJobs(false);
	});

});
