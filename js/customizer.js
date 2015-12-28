/**
 * customizer.js
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
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'rgdeuce_link_color', function( value ) {
		value.bind( function( newval ) {
			$('a, a:visited').css('color', newval );
		} );
	} );
	//Update main menu link color in real time...
	wp.customize( 'rgdeuce_menu_color', function( value ) {
		value.bind( function( newval ) {
			$('nav ul#primary-menu li a').css('color', newval );
		} );
	} );
	//Update main menu link color in real time...
	wp.customize( 'rgdeuce_header_color', function( value ) {
		value.bind( function( newval ) {
			$('header#masthead').css('color', newval );
		} );
	} );
} )( jQuery );
