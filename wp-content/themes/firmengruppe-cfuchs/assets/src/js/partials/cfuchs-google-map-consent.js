( function () {
	'use strict';

	const mapSelector = '[data-cfuchs-google-map]';
	const consentCookieName = 'moove_gdpr_popup';

	let apiLoading = false;
	let previousConsent = null;

	const styledMap = [
		{
			elementType: 'geometry',
			stylers: [ { color: '#f5f5f5' } ],
		},
		{
			elementType: 'labels.icon',
			stylers: [ { visibility: 'off' } ],
		},
		{
			elementType: 'labels.text.fill',
			stylers: [ { color: '#616161' } ],
		},
		{
			elementType: 'labels.text.stroke',
			stylers: [ { color: '#f5f5f5' } ],
		},
		{
			featureType: 'administrative.land_parcel',
			elementType: 'labels.text.fill',
			stylers: [ { color: '#bdbdbd' } ],
		},
		{
			featureType: 'poi',
			elementType: 'geometry',
			stylers: [ { color: '#eeeeee' } ],
		},
		{
			featureType: 'poi',
			elementType: 'labels.text.fill',
			stylers: [ { color: '#757575' } ],
		},
		{
			featureType: 'poi.park',
			elementType: 'geometry',
			stylers: [ { color: '#e5e5e5' } ],
		},
		{
			featureType: 'poi.park',
			elementType: 'labels.text.fill',
			stylers: [ { color: '#9e9e9e' } ],
		},
		{
			featureType: 'road',
			elementType: 'geometry',
			stylers: [ { color: '#ffffff' } ],
		},
		{
			featureType: 'road.arterial',
			elementType: 'labels.text.fill',
			stylers: [ { color: '#757575' } ],
		},
		{
			featureType: 'road.highway',
			elementType: 'geometry',
			stylers: [ { color: '#dadada' } ],
		},
		{
			featureType: 'road.highway',
			elementType: 'labels.text.fill',
			stylers: [ { color: '#616161' } ],
		},
		{
			featureType: 'road.local',
			elementType: 'labels.text.fill',
			stylers: [ { color: '#9e9e9e' } ],
		},
		{
			featureType: 'transit.line',
			elementType: 'geometry',
			stylers: [ { color: '#e5e5e5' } ],
		},
		{
			featureType: 'transit.station',
			elementType: 'geometry',
			stylers: [ { color: '#eeeeee' } ],
		},
		{
			featureType: 'water',
			elementType: 'geometry',
			stylers: [ { color: '#c9c9c9' } ],
		},
		{
			featureType: 'water',
			elementType: 'labels.text.fill',
			stylers: [ { color: '#9e9e9e' } ],
		},
	];

	/**
	 * Read cookie value.
	 *
	 * @param {string} name Cookie name.
	 *
	 * @return {string|null}
	 */
	function getCookie( name ) {
		const prefix = `${ name }=`;
		const cookies = document.cookie
			? document.cookie.split( ';' )
			: [];

		for ( const cookieItem of cookies ) {
			const cookie = cookieItem.trim();

			if ( cookie.indexOf( prefix ) === 0 ) {
				return cookie.substring( prefix.length );
			}
		}

		return null;
	}

	/**
	 * Decode the Moove consent cookie.
	 *
	 * @param {string} value Encoded cookie value.
	 *
	 * @return {string}
	 */
	function decodeCookieValue( value ) {
		let decodedValue = value;

		for ( let index = 0; index < 2; index++ ) {
			try {
				const nextValue =
					decodeURIComponent( decodedValue );

				if ( nextValue === decodedValue ) {
					break;
				}

				decodedValue = nextValue;
			} catch ( error ) {
				break;
			}
		}

		return decodedValue;
	}

	/**
	 * Check whether third-party consent is enabled.
	 *
	 * @return {boolean}
	 */
	function hasThirdPartyConsent() {
		const cookieValue = getCookie( consentCookieName );

		if ( ! cookieValue ) {
			return false;
		}

		const decodedValue =
			decodeCookieValue( cookieValue );

		try {
			const preferences =
				JSON.parse( decodedValue );

			return (
				String( preferences.thirdparty ) === '1' ||
				preferences.thirdparty === true
			);
		} catch ( error ) {
			return /["']?thirdparty["']?\s*[:=]\s*["']?(?:1|true)["']?/i.test(
				decodedValue
			);
		}
	}

	/**
	 * Initialize every map block on the page.
	 */
	function initMaps() {
		if (
			! window.google ||
			! window.google.maps
		) {
			return;
		}

		const mapWrappers =
			document.querySelectorAll( mapSelector );

		mapWrappers.forEach( mapWrapper => {
			if (
				mapWrapper.dataset.mapInitialized ===
				'true'
			) {
				return;
			}

			const mapId =
				mapWrapper.dataset.mapId;

			const mapElement =
				document.getElementById( mapId );

			if ( ! mapElement ) {
				return;
			}

			const latitude = Number(
				mapWrapper.dataset.latitude
			);

			const longitude = Number(
				mapWrapper.dataset.longitude
			);

			if (
				! Number.isFinite( latitude ) ||
				! Number.isFinite( longitude )
			) {
				console.error(
					'CFuchs map coordinates are invalid.'
				);

				return;
			}

			const clientLocation = {
				lat: latitude,
				lng: longitude,
			};

			/*
			 * Existing map configuration remains unchanged.
			 */
			const map = new window.google.maps.Map(
				mapElement,
				{
					center: clientLocation,
					zoom: 10,
					styles: styledMap,
				}
			);

			/*
			 * Existing custom marker remains unchanged.
			 */
			new window.google.maps.Marker( {
				position: clientLocation,
				map,
				title: 'Client Location',
				icon: {
					url:
						mapWrapper.dataset.markerIcon,
				},
			} );

			mapWrapper.dataset.mapInitialized = 'true';

			mapElement.setAttribute(
				'aria-hidden',
				'false'
			);

			mapWrapper.classList.add(
				'is-map-loaded'
			);
		} );
	}

	/**
	 * Google Maps callback.
	 */
	window.cfuchsInitGoogleMaps = function () {
		apiLoading = false;
		initMaps();
	};

	/**
	 * Load Google Maps API.
	 */
	function loadApi() {
		const firstMap =
			document.querySelector( mapSelector );

		if ( ! firstMap ) {
			return;
		}

		if (
			window.google &&
			window.google.maps
		) {
			initMaps();
			return;
		}

		if (
			apiLoading ||
			document.getElementById(
				'cfuchs-google-maps-api'
			)
		) {
			return;
		}

		const apiKey =
			firstMap.dataset.apiKey;

		if ( ! apiKey ) {
			console.error(
				'CFUCHS Google Maps API key is missing.'
			);

			firstMap.classList.add(
				'has-map-error'
			);

			return;
		}

		apiLoading = true;

		const script =
			document.createElement( 'script' );

		script.id = 'cfuchs-google-maps-api';
		script.async = true;
		script.defer = true;

		script.src =
			'https://maps.googleapis.com/maps/api/js' +
			`?key=${ encodeURIComponent( apiKey ) }` +
			'&callback=cfuchsInitGoogleMaps' +
			'&loading=async';

		script.onerror = function () {
			apiLoading = false;

			document
				.querySelectorAll( mapSelector )
				.forEach( mapWrapper => {
					mapWrapper.classList.add(
						'has-map-error'
					);
				} );

			console.error(
				'Google Maps API could not be loaded.'
			);
		};

		document.head.appendChild( script );
	}

	/**
	 * Check for consent changes.
	 */
	function updateConsent() {
		const consentGranted =
			hasThirdPartyConsent();

		if ( consentGranted ) {
			loadApi();
		}

		if (
			previousConsent === true &&
			consentGranted === false &&
			(
				window.google ||
				document.getElementById(
					'cfuchs-google-maps-api'
				)
			)
		) {
			window.location.reload();
			return;
		}

		previousConsent = consentGranted;
	}

	/**
	 * Expose debug methods.
	 */
	window.CFuchsGoogleMaps = {
		getCookie,
		hasThirdPartyConsent,
		initMaps,
		loadApi,
		updateConsent,
	};

	function startGoogleMapsConsent() {
		if ( ! document.querySelector( mapSelector ) ) {
			return;
		}

		updateConsent();

		window.setInterval(
			updateConsent,
			1000
		);

		window.addEventListener(
			'focus',
			updateConsent
		);
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener(
			'DOMContentLoaded',
			startGoogleMapsConsent,
			{
				once: true,
			}
		);
	} else {
		startGoogleMapsConsent();
	}
} )();
