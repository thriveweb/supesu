<?php

$current_user = wp_get_current_user(); ?>

<div class="edit">
	<?php if ( $current_user->ID ) :
		//  logged in.
		edit_post_link( 'Edit Page', '<p class="edit_link"> Logged in as '. $current_user->user_login . ' <span></span>', '</p>' );
	endif;

	?>
</div>
