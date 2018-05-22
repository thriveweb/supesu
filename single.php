<?php
/**
 * Template to display theme post.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

 get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'blog-head' );?>
    <div class="content_wrap">
			<div class="content">
				<?php the_content();?>
			</div>
		</div>

    <?php comments_template(); ?>

    <div id="related">
			<?php
			$related = get_posts( array(
					'numberposts' => 3
				)
			);
			foreach( $related as $post ) {
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>" class="blog-post one-third flex-col">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
  					<div class="background cover"><?php the_post_thumbnail(); ?></div>
  					<?php get_template_part( 'post-info' );?>
  				</article>
				</a>
			<?php } wp_reset_postdata(); ?>
		</div>

    <?php the_tags(); ?>

    <div class="clear"></div>

  <?php endwhile; // End the loop. Whew. ?>

  <div id="post_nav">
		<?php
			$prev_post = get_adjacent_post(false, '', true);
			if(!empty($prev_post)) {
			echo '<div class="button prev left">
            <a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">Prev</a>
            </div>'
      ; }

			$next_post = get_adjacent_post(false, '', false);
			if(!empty($next_post)) {
        echo '<div class="button next right">
              <a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">Next</a>
              </div>'
        ; }
		?>
	</div>

  <?php endif; ?>

<?php get_footer(); ?>
