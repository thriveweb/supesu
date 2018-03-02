<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part('blog_head');?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="content_wrap">

		<div class="content">

			<?php the_content();?>

		</div>

		<!-- <?php get_template_part('edit');?> -->

	</div>

	<div class="share">
		<ul class="content_wrap">
			<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook-square"></i></a></li>
			<li class="twitter"><a href="https://twitter.com/share" target="_blank" url="<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a></li>

			<div class="clear"></div>
		</ul>
	</div>

	<?php comments_template(); ?>

	<div class="clear"></div>

	<div id="related">
		<?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="background" style="background: url('<?php the_post_thumbnail_url(); ?>')"></div>
					<?php get_template_part('post_info');?>
			</article>
    <?php endwhile; // End the loop. Whew. ?>
	</div>
</div>

<div class="clear"></div>

<div id="post_nav">
	<div class="contain">
		<?php $next_post = get_next_post();
			if (!empty( $next_post )): ?>
		  <div class="button next right">
				<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">Next Post</a>
			</div>
		<?php endif; ?>

		<?php $prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			<div class="button prev left">
			  <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">Prev Post</a>
			</div>
		<?php endif; ?>
	</div>

	<div class="clear"></div>
</div>



	<?php endwhile; // End the loop. Whew. ?>


<?php  get_footer(); ?>
