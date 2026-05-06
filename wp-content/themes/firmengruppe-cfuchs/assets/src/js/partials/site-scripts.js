/**
 * Sticky Header
 * Adds a class to header on scroll
 */
import magnificPopup from '../vendors/jquery-magnificpopup';
import organicTabs from '../vendors/organic-tab';
import slick from '../vendors/slick.min';
import gasap from '../vendors/gsap.min';
import gsapScroll from '../vendors/ScrollTrigger.min';
import Lity from '../vendors/lity.js';
import masonry from '../vendors/masonry.min';
import imagesLoaded from '../vendors/imagesloaded.pkgd.min';


jQuery( document ).on( 'scroll', function() {
	if ( jQuery( document ).scrollTop() > 0 ) {
		jQuery( 'header, body' ).addClass( 'shrink' );
	} else {
		jQuery( 'header, body' ).removeClass( 'shrink' );
	}
} );

jQuery( window ).on( 'load', function() {
	const loader = jQuery( '.loader' );
	const spinner = jQuery( '.spinner-text' );

	spinner.addClass( 'spinner-loaded' );

	setTimeout( function() {
		loader.addClass( 'hide-loader' );
	}, 3000 );
} );

jQuery( function() {
	/**
	 * Search Script
	 */


	jQuery('.header-nav ul li').hover(
		function () {
			let $submenu = jQuery(this).children('ul');

			if ($submenu.length) {
				$submenu.stop(true, true);

				// get natural height
				let fullHeight = $submenu.get(0).scrollHeight;

				$submenu
					.css({
						visibility: 'visible',
						opacity: 1,
						overflow: 'hidden',
						height: 0
					})
					.animate({
						height: fullHeight
					}, 300);
			}
		},
		function () {
			let $submenu = jQuery(this).children('ul');

			if ($submenu.length) {
				$submenu.stop(true, true);

				$submenu.animate({
					height: 0
				}, 250, function () {
					$submenu.css({
						visibility: 'hidden',
						opacity: 0
					});
				});
			}
		}
	);


	jQuery( '.menu-btn-desktop' ).on( 'click', function() {
		jQuery( 'body' ).toggleClass( 'side-menu-opened' );
	} );

	jQuery( '.mkdf-close-side-menu' ).on( 'click', function() {
		jQuery( 'body' ).removeClass( 'side-menu-opened' );
	} );

	jQuery( '.top-search' ).on( 'click', function() {
		jQuery( '.search-form-new' ).toggleClass( 'open' );
		jQuery( '.header-section' ).toggleClass( 'open' );
		jQuery( '#search-top .keyword' ).focus();
	} );

	jQuery( '.search-close' ).on( 'click keypress', function( e ) {
		if ( e.which === 13 || e.which === 1 ) {
			jQuery( '.search-form-new' ).removeClass( 'open' );
			jQuery( '.header-section' ).removeClass( 'open' );
			document.activeElement.blur();
		}
	} );
	/**
	 * Add Browser Classes
	 */
	if ( navigator.userAgent.indexOf( 'Mac OS X' ) !== -1 ) {
		document.body.classList.add( 'style-for-mac' );
	} else {
		document.body.classList.add( 'style-for-android' );
	}
	/**
	 * Header Wrapper Height Calculation for Navigation Overlay
	 */

	if ( jQuery( '.header-wrapper' ).length > 0 ) {
		function updateHeaderHeight() {
			jQuery( '.header-wrapper' ).each( function() {
				jQuery( this ).css(
					'--fc_header-wrapper-default',
					jQuery( this ).outerHeight() + 'px',
				);
			} );
		}
		updateHeaderHeight();
		jQuery( window ).resize( updateHeaderHeight );
	}

	/**
	 * Toggle menu for mobile
	 */
	const navOverlay = jQuery( '.nav-overlay' );
	const htmlBody = jQuery( 'html, body' );

	jQuery( '.menu-btn' ).on( 'click', function() {
		jQuery( this ).toggleClass( 'active' );
		navOverlay.toggleClass( 'open' );
		htmlBody.toggleClass( 'no-overflow' );
		jQuery( '.header-nav ul li.active' ).removeClass( 'active' );
		jQuery( '.header-nav ul.sub-menu' ).slideUp();
	} );

	/**
	 * Add span tag to multi-level accordion menu for mobile menus
	 */

	jQuery( '.menu-item-has-children > a:first-child' ).each( function() {
		jQuery( this ).after( '<span class="submenu-icon"></span>' );
	} );

	/**
	 * Slide Up/Down internal sub-menu when mobile menu arrow clicked
	 */

	jQuery( '.header-nav' ).on( 'click', '.submenu-icon', function() {
		const parentLi = jQuery( this ).closest( 'li' );

		parentLi.siblings( '.active' ).removeClass( 'active' ).find( 'ul' ).slideUp();

		parentLi
			.toggleClass( 'active' )
			.find( 'ul' )
			.stop( true, true )
			.slideToggle();
		parentLi
			.parents( 'ul' )
			.toggleClass( 'disabled-menu', parentLi.hasClass( 'active' ) );
	} );

	jQuery( '.submenu-icon' ).hover(
		function() {
			// mouseenter
			jQuery( this ).prev().css( 'color', '#fe8400' );
		},
		function() {
			// mouseleave
			jQuery( this ).prev().css( 'color', '' );
		},
	);

	/**
	 *  Accessibility for Simple menu & Mega menu
	 */
	jQuery( '.menu-item-has-children > a' ).on( 'focus blur', function( event ) {
		jQuery( this )
			.siblings( '.sub-menu, .mega-menu' )
			.toggleClass( 'focused', event.type === 'focus' );
	} );

	jQuery( '.sub-menu a, .mega-menu a' ).on( 'focus blur', function( event ) {
		jQuery( this )
			.closest( '.sub-menu, .mega-menu' )
			.toggleClass( 'focused', event.type === 'focus' );
	} );

	/**
	 * Script for Accessibility of html Tags
	 */
	jQuery(
		'h1, h2, h3, h4, h5, h6,p,li,blockquote,cite,strong,dt,dd,th,td,b,i,u,s,em,small,sup,del,ins,abbr,mark,details,pre,kbd,samp,var,address,code,q,figure,figcaption,caption,.top-bar-text,.top-bar-cross,.copy-right,.post-author-img,.post-author-name,.post-meta-date,.post-date',
	).each( function() {
		jQuery( this ).attr( {
			tabindex: 0,
		} );
	} );
	jQuery( '.header-nav li, .blog-nav li, .footer-nav li, .legal-nav li' ).each(
		function() {
			const link = jQuery( this ).find( 'a' );
			if ( link.length > 0 ) {
				jQuery( this ).removeAttr( 'tabindex' );
			} else {
				jQuery( this ).attr( 'tabindex', '0' );
			}
		},
	);
	jQuery( 'form p' ).each( function() {
		jQuery( this ).removeAttr( 'tabindex' );
	} );

	jQuery( 'a,button:not([href])' ).each( function() {
		jQuery( this ).attr( {
			tabindex: 0,
		} );
	} );

	setTimeout( () => {
		jQuery( '#daextlwcnf-cookie-notice-button-1' ).attr( 'role', 'button' );
		jQuery( '#daextlwcnf-cookie-notice-button-2' ).attr( 'role', 'button' );
		jQuery( '#daextlwcnf-cookie-settings-button-1' ).attr( 'role', 'button' );
		jQuery( '#daextlwcnf-cookie-settings-button-2' ).attr( 'role', 'button' );
	}, 500 );

	autosize();
	function autosize() {
		const text = jQuery( 'textarea' );

		text.each( function() {
			jQuery( this ).attr( 'rows', 5 );
			resize( jQuery( this ) );
		} );

		text.on( 'input', function() {
			resize( jQuery( this ) );
		} );

		function resize( $text ) {
			$text.css( 'min-height', 'auto' );
			$text.css( 'min-height', $text[ 0 ].scrollHeight + 'px' );
		}
	}

	// Menu animation
	if ( jQuery( '.header-nav li' ).length ) {
		jQuery( function() {
			const base = 470;
			const step = 70;

			jQuery( '.header-nav li ' ).each( function( i ) {
				const delay = base + i * step;
				jQuery( this )
					.find( 'a' )
					.css( 'animation-delay', delay + 'ms' );
			} );
		} );
	}
	// if ( jQuery( '.hero-home' ).length ) {
	// 	const slides = jQuery( '.slide' );
	// 	const dots = jQuery( '.dot' );
	// 	let current = 0;
	// 	let animating = false;
	// 	let touchStartX = 0;
	// 	let touchStartY = 0;

	// 	// Setup slides
	// 	slides.css( {
	// 		position: 'absolute',
	// 		top: 0,
	// 		left: 0,
	// 		width: '100%',
	// 		height: '100%',
	// 	} );

	// 	gsap.set( slides, { x: '100%' } );
	// 	gsap.set( slides.eq( current ), { x: '0%' } );

	// 	function showSlide( index ) {
	// 		if ( animating || index === current ) {
	// 			return;
	// 		}
	// 		animating = true;

	// 		const prev = current;

	// 		if ( index >= slides.length ) {
	// 			index = 0;
	// 		}
	// 		if ( index < 0 ) {
	// 			index = slides.length - 1;
	// 		}

	// 		current = index;

	// 		gsap.set( slides.eq( current ), { x: '0%', zIndex: 1 } );
	// 		gsap.set( slides.eq( prev ), { zIndex: 2 } );

	// 		const prevOverlay = slides
	// 			.eq( prev )
	// 			.find( '.home-hero-slide-overlay' );
	// 		const newOverlay = slides
	// 			.eq( current )
	// 			.find( '.home-hero-slide-overlay' );

	// 		// Reset new slide overlay to 50%
	// 		gsap.set( newOverlay, { width: '50%' } );

	// 		// Build ordered timeline
	// 		const tl = gsap.timeline( {
	// 			onComplete: () => {
	// 				animating = false;
	// 			},
	// 		} );

	// 		slides.removeClass( 'active remove-active' );
	// 		slides.eq( prev ).addClass( 'remove-active' );

	// 		// 1) OLD overlay expand to 100%
	// 		tl.to( prevOverlay, {
	// 			width: '100%',
	// 			duration: 0.4,
	// 			ease: 'power2.out',
	// 		} );
	// 		// 4) Now activate the new slide
	// 		tl.add( () => {
	// 			slides.eq( current ).addClass( 'active' );
	// 		} );

	// 		// 2) Wait 0.5s before slide moves
	// 		tl.to( {}, { duration: 0.25 } );

	// 		// 3) OLD slide move out
	// 		tl.to( slides.eq( prev ), {
	// 			x: '100%',
	// 			duration: 0.6,
	// 			ease: 'power2.inOut',
	// 		} );

	// 		// update dots
	// 		dots.removeClass( 'active' );
	// 		dots.eq( current ).addClass( 'active' );
	// 	}

	// 	slides.eq( current ).addClass( 'active' );
	// 	dots.eq( current ).addClass( 'active' );

	// 	// 🖱️ Desktop scroll — perfectly balanced speed & feel
	// 	let lastScrollTime = 0;
	// 	jQuery( window ).on( 'wheel', function( e ) {
	// 		const now = Date.now();
	// 		if ( animating || now - lastScrollTime < 900 ) {
	// 			return;
	// 		} // debounce for balance
	// 		lastScrollTime = now;

	// 		if ( e.originalEvent.deltaY > 0 ) {
	// 			showSlide( current + 1 );
	// 		} else if ( e.originalEvent.deltaY < 0 ) {
	// 			showSlide( current - 1 );
	// 		}
	// 	} );

	// 	// ⌨️ Keyboard navigation
	// 	jQuery( window ).on( 'keydown', function( e ) {
	// 		if ( animating ) {
	// 			return;
	// 		}
	// 		if ( e.key === 'ArrowRight' || e.key === 'ArrowDown' ) {
	// 			showSlide( current + 1 );
	// 		} else if ( e.key === 'ArrowLeft' || e.key === 'ArrowUp' ) {
	// 			showSlide( current - 1 );
	// 		}
	// 	} );

	// 	// 🔘 Dot navigation
	// 	dots.on( 'click', function() {
	// 		const target = parseInt( jQuery( this ).data( 'slide' ) );
	// 		showSlide( target );
	// 	} );

	// 	// 📱 Mobile swipe (unchanged)
	// 	jQuery( window ).on( 'touchstart', function( e ) {
	// 		touchStartX = e.originalEvent.touches[ 0 ].clientX;
	// 		touchStartY = e.originalEvent.touches[ 0 ].clientY;
	// 	} );

	// 	jQuery( window ).on( 'touchend', function( e ) {
	// 		const touchEndX = e.originalEvent.changedTouches[ 0 ].clientX;
	// 		const touchEndY = e.originalEvent.changedTouches[ 0 ].clientY;
	// 		if ( animating ) {
	// 			return;
	// 		}

	// 		const diffX = touchStartX - touchEndX;
	// 		const diffY = touchStartY - touchEndY;

	// 		// Detect swipe direction
	// 		if ( Math.abs( diffX ) > Math.abs( diffY ) && Math.abs( diffX ) > 50 ) {
	// 			if ( diffX > 0 ) {
	// 				showSlide( current + 1 );
	// 			} else {
	// 				showSlide( current - 1 );
	// 			}
	// 		} else if ( Math.abs( diffY ) > 50 ) {
	// 			if ( diffY > 0 ) {
	// 				showSlide( current + 1 );
	// 			} else {
	// 				showSlide( current - 1 );
	// 			}
	// 		}
	// 	} );
	// }
	if ( jQuery( '.hero-inner-slider' ).length ) {
		jQuery( '.hero-inner-slider' ).slick( {
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			arrows: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 4000,
			speed: 1200,
			fade: true,
			cssEase: 'ease-in-out',
			pauseOnHover: false,
			pauseOnFocus: false,
			swipe: false,
		} );
	}
	if ( jQuery( '.blog-slider-image-slider' ).length ) {
		jQuery( '.blog-slider-image-slider' ).slick( {
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			infinite: true,
			autoplay: false,
			autoplaySpeed: 3500,
			speed: 800,
			cssEase: 'ease-in-out',
			pauseOnHover: false,
			pauseOnFocus: false,
			swipe: false,
		} );
	}

	jQuery(document).on('click', '.slick-arrow, .slick-prev, .slick-next', function(e) {
	e.preventDefault();
	e.stopPropagation();
});

jQuery(document).on('mouseenter', '.slick-prev', function() {
	jQuery(this).closest('.blog-slider-image-slider').addClass('prev-hover');
});

jQuery(document).on('mouseleave', '.slick-prev', function() {
	jQuery(this).closest('.blog-slider-image-slider').removeClass('prev-hover');
});

	if ( jQuery( '.testimonial-slider' ).length > 0 ) {
		jQuery( '.testimonial-slider' ).slick( {
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true,
			arrows: false,
			dots: true,
			touchThreshold: 200,
			autoplay: true,
			autoplaySpeed: 3000,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
					},
				},
			],
		} );
	}
	// Team popup
	jQuery( '.popup-link' ).magnificPopup( {
		type: 'inline',
		preloader: false,
		fixedContentPos: true,
		overflowY: 'hidden',
		mainClass: 'team-popup',
		callbacks: {
			beforeOpen() {
				if ( jQuery( window ).width() < 700 ) {
					this.st.focus = false;
				}
			},
			open() {
				jQuery( 'body' ).addClass( 'popup-open' );

				const $popupContent = jQuery( this.content );
				const $closeIcon = $popupContent.find( '.close-icon' );
				$closeIcon.focus();

				$closeIcon.on( 'keydown', function( e ) {
					if ( e.key === 'Enter' ) {
						jQuery.magnificPopup.close();
					}
				} );
			},
			close() {
				jQuery( 'body' ).removeClass( 'popup-open' );
			},
		},
	} );

	if ( jQuery( '.blog-teaser-slider' ).length > 0 ) {
		jQuery( '.blog-teaser-slider' ).slick( {
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true,
			arrows: true,
			dots: false,
			touchThreshold: 200,
			autoplay: true,
			autoplaySpeed: 3000,
			prevArrow:
				'<button type="button" class="slick-prev">← zurück</button>',
			nextArrow:
				'<button type="button" class="slick-next">vor →</button>',
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
					},
				},
			],
		} );
	}

	// jQuery( document ).ready( function() {
	// 	if ( jQuery( '.tabbed-map-items' ).length ) {
	// 		jQuery( '.tabbed-map-items' ).each( function() {
	// 			const $wrapper = jQuery( this );
	// 			const $navLinks = $wrapper.find( '.tabbed-map-nav a' );
	// 			const $tabs = $wrapper.find( '.tabbed-id-item' );

	// 			$navLinks.on( 'click', function( event ) {
	// 				event.preventDefault();

	// 				const targetId = jQuery( this ).attr( 'href' );

	// 				$navLinks.removeClass( 'active' );
	// 				jQuery( this ).addClass( 'active' );

	// 				$tabs
	// 					.removeClass( 'active' )
	// 					.stop( true, true )
	// 					.fadeOut( 150 );

	// 				$wrapper
	// 					.find( '.tabbed-id-item' + targetId )
	// 					.stop( true, true )
	// 					.fadeIn( 150 )
	// 					.addClass( 'active' );
	// 			} );
	// 		} );
	// 	}
	// } );

	if (
		jQuery(
			'.image-alongside-text .iat-image, .applicants-image, .applicants-content, .offering-block-image ,.faq-image ,.media-with-text-content-box',
		).length > 0
	) {
		gsap.registerPlugin( ScrollTrigger );
		gsap.utils
			.toArray(
				'.image-alongside-text .iat-image, .applicants-image, .applicants-content, .offering-block-image ,.faq-image ,.media-with-text-content-box',
			)
			.forEach( ( el ) => {
				gsap.from( el, {
					scrollTrigger: {
						trigger: el,
						start: 'top 80%',
						toggleClass: {
							targets: el,
							className: 'iat-image-appear',
						},
						once: true,
					},
				} );
			} );
	}
	if (
		jQuery( '.hero-inner-slider.full-width-image .hero-split-text' ).length >
		0
	) {
		gsap.registerPlugin( ScrollTrigger );

		jQuery( function() {
			jQuery( '.hero-inner-slider.full-width-image .hero-split-text' ).each(
				function() {
					const el = jQuery( this );
					const text = el.text().trim();
					const wrapped = text
						.split( '' )
						.map( function( char ) {
							return (
								'<span>' +
								( char === ' ' ? '&nbsp;' : char ) +
								'</span>'
							);
						} )
						.join( '' );
					el.html( wrapped );

					gsap.to( el.find( 'span' ), {
						x: '0%',
						opacity: 1,
						ease: 'power3.out',
						duration: 0.9,
						stagger: 0.09,
						scrollTrigger: {
							trigger: el[ 0 ],
							start: 'top 80%',
							toggleActions: 'play none none none',
							once: true,
						},
					} );
				},
			);
		} );
	}

	if ( jQuery( '.faq-block' ).length > 0 ) {
		jQuery( '.faq-head' ).on( 'click keypress', function() {
			const currentFaq = jQuery( this );

			if ( currentFaq.hasClass( 'active' ) ) {
				currentFaq.removeClass( 'active' );
				currentFaq.siblings( '.faq-content' ).slideUp( 400 );
			} else {
				jQuery( '.faq-head' ).removeClass( 'active' );
				jQuery( '.faq-content' ).slideUp();

				currentFaq.addClass( 'active' );
				currentFaq.siblings( '.faq-content' ).slideDown( 400 );
			}
		} );
	}
	// STATS

	// if ( jQuery( '.tabbed-map-items' ).length > 0 ) {
	// 	jQuery( '.tabbed-map-nav a' ).on( 'click', function( event ) {
	// 		event.preventDefault();
	// 		const tabId = jQuery( this ).attr( 'href' );
	// 		jQuery( '.tabbed-id-item' ).hide().removeClass( 'active' );
	// 		jQuery( `.tabbed-id-item${ tabId }` ).fadeIn( 400 ).addClass( 'active' );
	// 		jQuery( '.tabbed-map-nav a' ).removeClass( 'active' );
	// 		jQuery( this ).addClass( 'active' );
	// 		setTimeout( function() {
	// 			jQuery( '.event-slider' ).slick( 'setPosition' );
	// 		}, 410 );
	// 	} );
	// }
	// STATS
	if ( jQuery( '.stats-number' ).length > 0 ) {
		const $statNumbers = jQuery( '.stats-number' );

		function animateCounter( $element ) {
			const text = $element.text();
			const numericText = text.match( /[0-9.]+/ )[ 0 ];
			const prefix = text.startsWith( '#' ) ? '#' : '';
			const suffix = text.replace( prefix + numericText, '' ).trim();
			const targetValue = parseFloat( numericText );
			if ( isNaN( targetValue ) ) {
				return;
			}
			const startValue = 0;
			const duration = 1800;
			const totalFrames = duration / ( 1000 / 60 );
			const increment = ( targetValue - startValue ) / totalFrames;
			let animatedValue = startValue;
			const formatValue = ( value ) =>
				Number.isInteger( targetValue )
					? Math.round( value )
					: value.toFixed( 1 );
			const updateCounter = () => {
				animatedValue += increment;
				if ( animatedValue >= targetValue ) {
					$element.text( prefix + formatValue( targetValue ) + suffix );
				} else {
					$element.text( prefix + formatValue( animatedValue ) + suffix );
					requestAnimationFrame( updateCounter );
				}
			};
			requestAnimationFrame( updateCounter );
			const value = parseInt( $element.text().trim() );
			let current = 0;
			const durationFill = 1500;
			const step = value / ( durationFill / 16 );
			function animateFill() {
				current += step;
				if ( current < value ) {
					$element.css( '--percent', current );
					requestAnimationFrame( animateFill );
				} else {
					$element.css( '--percent', value );
				}
			}
			animateFill();
		}

		const isInViewport = ( element ) => {
			const rect = element[ 0 ].getBoundingClientRect();
			return (
				rect.bottom >= 0 &&
				rect.top <=
					( window.innerHeight ||
						document.documentElement.clientHeight )
			);
		};

		jQuery( window )
			.on( 'scroll resize', () => {
				$statNumbers.each( function() {
					const $this = jQuery( this );
					if ( isInViewport( $this ) && ! $this.hasClass( 'animated' ) ) {
						animateCounter( $this );
						$this.addClass( 'animated' );
					}
				} );
			} )
			.trigger( 'scroll' );
	}
	// Animation
	// jQuery( '.filter-search' ).one( 'click', function() {
	// 	jQuery( '.filter' ).slideDown( 400 );
	// } );
	if ( jQuery( '.gallery-slide' ).length > 0 ) {
		const slides = document.querySelectorAll( '.gallery-slide' );
		const total = slides.length;
		let current = 0;
		let autoplay;

		function updateSlides() {
			slides.forEach( ( slide ) => {
				gsap.to( slide, {
					x: 0,
					scale: 0.6,
					opacity: 0,
					zIndex: 1,
					duration: 0.5,
				} );
			} );

			const leftIndex = ( current - 1 + total ) % total;
			const rightIndex = ( current + 1 ) % total;

			const offset = window.innerWidth < 768 ? 40 : 60; // % offset for smaller screens

			gsap.to( slides[ current ], {
				x: 0,
				scale: 1,
				opacity: 1,
				zIndex: 3,
				duration: 0.8,
				ease: 'power3.out',
			} );
			gsap.to( slides[ leftIndex ], {
				x: `-${ offset }%`,
				scale: 0.6,
				opacity: 1,
				zIndex: 2,
				duration: 0.8,
				ease: 'power3.out',
			} );
			gsap.to( slides[ rightIndex ], {
				x: `${ offset }%`,
				scale: 0.6,
				opacity: 1,
				zIndex: 2,
				duration: 0.8,
				ease: 'power3.out',
			} );
		}

		function nextSlide() {
			current = ( current + 1 ) % total;
			updateSlides();
		}

		document.querySelector( '.next' ).onclick = () => {
			nextSlide();
			resetAutoplay();
		};

		document.querySelector( '.prev' ).onclick = () => {
			current = ( current - 1 + total ) % total;
			updateSlides();
			resetAutoplay();
		};

		function startAutoplay() {
			autoplay = setInterval( nextSlide, 7000 );
		}

		function resetAutoplay() {
			clearInterval( autoplay );
			startAutoplay();
		}

		window.addEventListener( 'resize', updateSlides ); // Update positions on resize

		updateSlides();
		startAutoplay();
	}
	// Chart
	jQuery( document ).ready( function() {
		jQuery( '.header-nav li a, .header-nav li span.menu-link' ).hover(
			function() {
				jQuery( this )
					.stop()
					.animate(
						{ bgX: 0 },
						{
							duration: 15000,
							easing: 'linear',
							step( now ) {
								jQuery( this ).css(
									'background-position',
									now + 'px 0',
								);
							},
						},
					);
			},
			function() {
				jQuery( this )
					.stop()
					.animate(
						{ bgX: 520 },
						{
							duration: 15000,
							easing: 'linear',
							step( now ) {
								jQuery( this ).css(
									'background-position',
									now + 'px 0',
								);
							},
						},
					);
			},
		);
	} );
	gsap.utils.toArray( '.opacity-item' ).forEach( ( item ) => {
		gsap.fromTo(
			item,
			{ opacity: 0 },
			{
				opacity: 1,
				duration: 1.2,
				delay: 1,
				ease: 'power3.out',
				scrollTrigger: {
					trigger: item,
					start: 'top 85%',
					toggleActions: 'play none none none',
				},
			},
		);
	} );

	gsap.utils.toArray( '.animation-item' ).forEach( ( item ) => {
		ScrollTrigger.create( {
			trigger: item,
			start: 'top 85%',
			onEnter: () => item.classList.add( 'active' ),
			once: true,
		} );
	} );
	if ( jQuery( '.animation-chart' ).length ) {
		gsap.utils.toArray( '.animation-chart' ).forEach( ( parent ) => {
			const textGroups = Array.from(
				parent.querySelectorAll( '.text-animation' ),
			);
			const lines = Array.from( parent.querySelectorAll( '.chart-line' ) );

			const reset = () => {
				gsap.set( textGroups, { opacity: 0 } );
				lines.forEach( ( line ) => {
					const length = line.getTotalLength();
					gsap.set( line, {
						strokeDasharray: length,
						strokeDashoffset: length,
					} );
				} );
			};

			reset();

			const sortedGroups = textGroups.slice().sort( ( a, b ) => {
				const aRect = a.getBoundingClientRect();
				const bRect = b.getBoundingClientRect();
				const rowDiff = aRect.top - bRect.top;
				if ( Math.abs( rowDiff ) < 5 ) {
					return aRect.left - bRect.left;
				}
				return aRect.top - bRect.top;
			} );

			const tl = gsap.timeline( {
				defaults: { ease: 'power3.out', duration: 1 },
			} );

			sortedGroups.forEach( ( textGroup, index ) => {
				const line = parent.querySelector(
					'.chart-line#' + textGroup.id,
				);
				if ( line ) {
					tl.to( textGroup, { opacity: 1 }, index * 0.4 );
					tl.to(
						line,
						{ strokeDashoffset: 0, ease: 'power2.out' },
						index * 0.4,
					);
				}
			} );

			ScrollTrigger.create( {
				trigger: parent,
				start: 'top 90%',
				end: 'bottom 10%',
				onEnter: () => tl.restart(),
				onEnterBack: () => tl.restart(),
				onLeave: reset,
				onLeaveBack: reset,
			} );
		} );
	}
} );
jQuery( document ).ready( function() {
	gsap.registerPlugin( ScrollTrigger );

	gsap.utils.toArray( '.animation-chart-new' ).forEach( ( parent ) => {
		const textGroups = parent.querySelectorAll( '.text-animation' );
		const lines = parent.querySelectorAll( '.chart-line' );

		const reset = () => {
			gsap.set( textGroups, { autoAlpha: 0 } );
			lines.forEach( ( line ) => {
				const path = line.querySelector( 'path' );
				if ( path ) {
					const length = path.getTotalLength();
					gsap.set( path, {
						strokeDasharray: length,
						strokeDashoffset: length,
					} );
				}
			} );
		};

		reset();

		const tl = gsap.timeline( {
			defaults: { duration: 1, ease: 'power3.out' },
		} );
		textGroups.forEach( ( text, i ) => {
			const line = lines[ i ]?.querySelector( 'path' );
			tl.to( text, { autoAlpha: 1 }, i * 0.4 );
			if ( line ) {
				tl.to( line, { strokeDashoffset: 0 }, i * 0.4 );
			}
		} );

		ScrollTrigger.create( {
			trigger: parent,
			start: 'top 90%',
			end: 'bottom 10%',
			onEnter: () => tl.restart(),
			onEnterBack: () => tl.restart(),
			onLeave: reset,
			onLeaveBack: reset,
			invalidateOnRefresh: true,
		} );
	} );
} );

document.addEventListener( 'DOMContentLoaded', function() {
	if ( window.location.hash === '#einblicke-section' ) {
		const el = document.querySelector( '#einblicke-section' );

		if ( el ) {
			setTimeout( () => {
				el.scrollIntoView( {
					behavior: 'smooth',
					block: 'start',
				} );
			}, 200 ); // delay helps when content loads late
		}
	}
} );

jQuery(document).ready(function($) {

	if ( jQuery('.blog-subposts').length && jQuery(window).width() > 1003 ) {

		var $grid = jQuery('.blog-subposts');

		$grid.imagesLoaded(function() {
			$grid.masonry({
				itemSelector: '.blog-subpost',
				columnWidth: '.blog-subpost',
				gutter: 30,
			});
		});

	}

});
