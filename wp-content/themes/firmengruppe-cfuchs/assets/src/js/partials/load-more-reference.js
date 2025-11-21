jQuery( function() {
	const loadMoreBtn = jQuery( '#load-more-reference' );
	const container = jQuery( '#reference-container' );

	if ( ! loadMoreBtn.length || ! container.length ) {
		return;
	}

	loadMoreBtn.on( 'click', function( e ) {
		e.preventDefault();

		const button = jQuery( this );
		// data-page stores current page that has already been loaded (1 initially)
		const currentPage = parseInt( button.attr( 'data-page' ) ) || 1;

		button.prop( 'disabled', true ).text( 'Loading...' ).addClass( 'loading' );

		jQuery.ajax( {
			url: fuchs_ajax_obj.ajax_url,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'fuchs_load_more_reference',
				page: currentPage,
			},
			success( res ) {
				if ( ! res || typeof res !== 'object' ) {
					console.error( 'Unexpected AJAX response:', res );
					button.prop( 'disabled', false ).text( 'Mehr' ).removeClass( 'loading' );
					return;
				}

				if ( res.success && res.data ) {
					const html = res.data.html || '';
					const newPaged = parseInt( res.data.paged ) || ( currentPage + 1 );
					const maxPage = parseInt( res.data.max_page ) || newPaged;

					if ( html.trim() !== '' ) {
						container.append( html );
						// update the stored page to the page we just loaded
						button.attr( 'data-page', newPaged );
						// if we've reached the last page, remove the button
						if ( newPaged >= maxPage ) {
							button.parent().remove(); // remove .load-more wrapper
						} else {
							button.prop( 'disabled', false ).text( 'Mehr' ).removeClass( 'loading' );
						}
					} else {
						// no HTML returned (no more posts)
						button.parent().remove();
					}
				} else {
					console.error( 'AJAX returned failure:', res );
					button.prop( 'disabled', false ).text( 'Mehr' ).removeClass( 'loading' );
				}
			},
			error( xhr, status, err ) {
				console.error( 'AJAX error', status, err, xhr.responseText );
				button.prop( 'disabled', false ).text( 'Mehr' ).removeClass( 'loading' );
			},
		} );
	} );
} );
