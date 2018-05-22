<?php
/**
 * Template to display theme footer.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

?>
	<footer>
		<?php supesu_social_icons() ?>

		<p><?php bloginfo( 'name' ); ?> &copy; <?php echo get_the_date('Y'); ?></p>
		<p>
			Crafted by <a href="http://thriveweb.com.au">Thrive Digital</a>
			<span style="padding: 0 5px;">|</span>
			Powered by <a href="http://wordpress.org/" title="WordPress">WordPress</a>
		</p>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
