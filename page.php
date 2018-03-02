
<?php get_header(); ?>

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
