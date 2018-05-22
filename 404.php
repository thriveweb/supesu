<?php
/**
 * Template to display theme 404.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

 get_header(); ?>

<div class="content_wrap">

	<?php while ( have_posts() ) : the_post(); ?>

			<div class="content">

				<h1>Oops!</h1>
				<h3>You seem to be lost? <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> Click here to go home.</a></h3>

			</div>

		</div>

	<?php endwhile; // End the loop. Whew. ?>


	<div class="clear"></div>

</div>

<?php get_footer(); ?>
