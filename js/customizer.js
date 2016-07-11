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
	//Update Header in real time...
	wp.customize( 'rgdeuce_header_color', function( value ) {
		value.bind( function( newval ) {
			$('header#masthead').css('background', newval );
		} );
	} );
	//Update Footer in real time...
	wp.customize( 'rgdeuce_footer_color', function( value ) {
		value.bind( function( newval ) {
			$('footer').css('background', newval );
		} );
	} );
	wp.customize( 'rgdeuce_bottom_footer_color', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer').css('background', newval );
		} );
	} );
	wp.customize( 'rgdeuce_footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$('footer').css('color', newval );
		} );
	} );
	wp.customize( 'rgdeuce_bottom_text_footer_color', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer').css('color', newval );
		} );
	} );
	//Update UtilityBar...
	wp.customize( 'rgdeuce_utilitybar_color', function( value ) {
		value.bind( function( newval ) {
			$('#utility-bar').css('background', newval );
		} );
	} );
	//display utility bar
	wp.customize( 'rgdeuce_display_utilitybar', function( value ) {
    value.bind( function( to ) {
        false === to ? $( '#utility-bar' ).hide() : $( '#utility-bar' ).show();
    } );
//typography
    wp.customize( 'rgdeuce_main_font', function( value ) {
    value.bind( function( to ) {
 
        switch( to.toString().toLowerCase() ) {
 
            case 'opensans':
                sFont = 'Open Sans';
                break;
 
            case 'arial':
                sFont = 'Arial';
                break;
 
            case 'courier':
                sFont = 'Courier New, Courier';
                break;
 
            case 'roboto':
                sFont = 'Roboto';
                break;

            case 'times':
                sFont = 'Times New Roman';
                break;
            case 'slabo':
                sFont = 'Slabo 27px';
                break;
            case 'lato':
                sFont = 'Lato';
                break;
            case 'montserrat':
                sFont = 'Montserrat';
                break;
            case 'ubuntu':
                sFont = 'Ubuntu';
                break;
 
            default:
                sFont = 'Open Sans';
                break;
 
        }
 
        $( 'body' ).css({
            fontFamily: sFont
        });
 
    });
 
});
} );
} )( jQuery );
