( function( $ ) {

	$( window ).load( function() {

		var portfolio_wrapper = $( '.portfolio-wrapper' );

		portfolio_wrapper.imagesLoaded( function() {
			if ( $( 'body' ).hasClass( 'rtl' ) ) {
				portfolio_wrapper.masonry( {
					columnWidth: 1,
					itemSelector: '.jetpack-portfolio',
					transitionDuration: 0,
					isOriginLeft: false
				} );
			} else {
				portfolio_wrapper.masonry( {
					columnWidth: 1,
					itemSelector: '.jetpack-portfolio',
					transitionDuration: 0
				} );
			}
			
		} );


		// Layout posts that arrive via infinite scroll
		$( document.body ).on( 'post-load', function () {

			var new_items = $( '.infinite-wrap .jetpack-portfolio' );

			portfolio_wrapper.append( new_items );
			portfolio_wrapper.masonry( 'appended', new_items );

			// Force layout correction after 1500 milliseconds
			setTimeout( function () {

				portfolio_wrapper.masonry();

			}, 1500 );

		} );

	} );

} )( jQuery );
