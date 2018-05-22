<?php
/**
 * Template to display theme comments.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	<div class="comments content_wrap">
		<h6 class="comments-title">
			<?php comments_popup_link( '% comments already!' ); ?>
		</h6>

		<?php next_comments_link() ?>
		<?php previous_comments_link() ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 40,
				) );
			?>
		</ol><!-- .comment-list -->
	</div>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<div class="content_wrap">
			<?php comment_form(); ?>
		</div>
	<?php endif; ?>

</div><!-- .comments-area -->
