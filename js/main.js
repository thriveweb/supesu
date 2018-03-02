jQuery(document).ready(function($) {

	//clear search on click
	defaultValue = jQuery('#Searchform').val();
	jQuery('#Searchform').click(function() {
		if( this.value == defaultValue ) {
			jQuery(this).val("");
		}
	});

	// open nav on click

	jQuery( ".hamburger").click(function() {
		jQuery( this ).toggleClass( "open" );
		jQuery("#res-nav").toggleClass( "open" );
		});

	// submenu open on click

	$('.menu-item-has-children > a').click(function(e) {
	  e.preventDefault();
	  $(this).closest("li").find("[class^='sub-menu']").slideToggle();
	});
});
