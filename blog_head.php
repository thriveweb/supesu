
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>

<div id="blog_head" style="background: url('<?php echo $url ?>')">

	<div class="title">
		<div class="wrap">
			<h6><?php echo get_the_date('F'); ?> <?php echo get_the_date('j'); ?> by <?php the_author(); ?></h6>
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div>
