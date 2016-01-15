//$( window ).load( function() {
	
	$( '.portfolio-featured-image' ).each( function() {
			$( this ).prepend('<span class=\"portfolio-thumbnail-overlay\"><i class=\"fa fa-arrows-alt\"></i></span>');
			
		} );
	$( '.portfolio-entry-header' ).each( function() {
			$( this ).addClass('entry-header inside-portfolio');
			
		} );
	$( '.portfolio-entry-title' ).each( function() {
			$( this ).addClass('entry-title');
			
		} );
	$( '.portfolio-entry-meta' ).each( function() {
			$( this ).addClass('entry-meta');
			
		} );
	$( '.portfolio-entry-content' ).each( function() {
			$( this ).addClass('entry-summary inside-portfolio');
			
		} );
	$( '.project-types' ).each( function() {
			$( this ).addClass('cat-links');
			
		} );
	$( '.project-tags' ).each( function() {
			$( this ).addClass('tags-links');
			
		} );
		
		$( '.project-types span, .project-tags span' ).each( function() {
			$( this ).remove();
			
		} );
		
	
		
//} )( jQuery );