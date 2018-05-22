/**
 * @file This is the main jQuery file.
 * @package Supesu Theme
 */

jQuery( document ).ready(function($) {

	/** Clear search on click.*/
	defaultValue = jQuery( '#Searchform' ).val();
	jQuery( '#Searchform' ).click(function() {
		if ( this.value == defaultValue ) {
			jQuery( this ).val( "" );
		}
	});

	/** Open nav on click*/

	jQuery( ".hamburger" ).click(function() {
		jQuery( this ).toggleClass( "open" );
		jQuery( "#res-nav" ).toggleClass( "open" );
	});

	/** Submenu open on click.*/

	$( '.menu-item-has-children > a' ).click(function(e) {
	  	e.preventDefault();
	  	$( this ).closest( "li" ).find( "[class^='sub-menu']" ).slideToggle();
	});
});
