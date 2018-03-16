<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	<div class="comments content_wrap">
		<h6 class="comments-title">
			<?php comments_popup_link('1 comment.', '% comments already!'); ?>
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
