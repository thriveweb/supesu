<?php get_header(); ?>

	<div id="wrap">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="background" style="background: url('<?php echo $url ?>')"></div>
					<?php get_template_part('post_info');?>
			</article>

		<?php endwhile; // End the loop. Whew. ?>

		<div class="clear"></div>

	</div>

	<div id="post_nav">
		<div class="contain">
			<?php next_posts_link('<div class="button next right">Older Posts</h6>'); ?>
			<?php previous_posts_link('<div class="button prev left">Newer Posts</h6>'); ?>
		</div>

		<div class="clear"></div>
	</div>

<?php  get_footer(); ?>
