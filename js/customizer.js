/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	// Social Icons.
	wp.customize( 'vlogr_social_1', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fab fw fa-' + to;
			jQuery('.footer-social-icons' ).find( 'i:eq(0)' ).attr( 'class', ClassNew );
		});
	});
	
	wp.customize( 'vlogr_social_2', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fab fw fa-' + to;
			jQuery('.footer-social-icons' ).find( 'i:eq(1)' ).attr( 'class', ClassNew );
		});
	});
	
	wp.customize( 'vlogr_social_3', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fab fw fa-' + to;
			jQuery('.footer-social-icons' ).find( 'i:eq(2)' ).attr( 'class', ClassNew );
		});
	});
	
	wp.customize( 'vlogr_social_4', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fab fw fa-' + to;
			jQuery('.footer-social-icons' ).find( 'i:eq(3)' ).attr( 'class', ClassNew );
		});
	});
	
	wp.customize( 'vlogr_social_5', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fab fw fa-' + to;
			jQuery('.footer-social-icons' ).find( 'i:eq(4)' ).attr( 'class', ClassNew );
		});
	});
	
	wp.customize( 'vlogr_social_6', function( value ) {
		value.bind( function( to ) {
			var ClassNew	=	'fab fw fa-' + to;
			jQuery('.footer-social-icons' ).find( 'i:eq(5)' ).attr( 'class', ClassNew );
		});
	});
	
	wp.customize( 'vlogr_footer_text', function( value ) {
		value.bind( function ( to ) {
			$( '.custom-text').text( to );
		});
	});
	
} )( jQuery );
