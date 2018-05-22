<?php
/**
 * Template to display theme page.
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
				<h1><?php the_title();?></h1>
				<?php the_content();?>
			</div>
		</div>
	<?php endwhile; // End the loop. Whew. ?>

	<div class="clear"></div>
</div>

<?php get_footer(); ?>
