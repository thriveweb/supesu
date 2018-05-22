<?php
/**
 * Template to display theme index.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

 get_header(); ?>

	<div id="wrap">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="background cover"><?php the_post_thumbnail(); ?></div>
					<?php get_template_part( 'post-info' );?>
			</article>

		<?php endwhile; // End the loop. Whew. ?>

		<div class="clear"></div>

	</div>

	<div id="post_nav">
		<div class="contain">
			<?php wp_link_pages(); ?>
			<?php next_posts_link( '<div class="button next right">Older Posts</h6>' ); ?>
			<?php previous_posts_link( '<div class="button prev left">Newer Posts</h6>' ); ?>
		</div>

		<div class="clear"></div>
	</div>

<?php get_footer(); ?>
