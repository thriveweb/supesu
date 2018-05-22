<?php
/**
 * Template to display theme blog header.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

?>

<div id="blog-head">
	<div class="title">
		<div class="wrap">
			<h6><?php echo get_the_date( 'F' ); ?> <?php echo get_the_date( 'j' ); ?> by <?php the_author(); ?></h6>
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="cover"><?php the_post_thumbnail(); ?></div>
</div>
