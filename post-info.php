<?php
/**
 * Template to display theme post info.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

?>

<a href="<?php the_permalink(); ?>">
	<div class="post-info">
		<div class="wrap">
			<h6><?php echo get_the_date( 'F' ); ?> <?php echo get_the_date( 'j' ); ?></h6>

			<h4 class="alt"><?php the_title(); ?></h4>
		</div>
	</div>
</a>
