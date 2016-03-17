<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Lütfen bu sayfayı direkt yüklemeyin. Teşekkürler!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "SamTv"); ?></p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<ul class="commentlist">
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

 <?php else : ?>

	<?php if ( comments_open() ) : ?>

	 <?php else : ?>

		<p class="nocomments"><?php _e("Comments are closed.", "SamTv"); ?></p>

	<?php endif; ?>
	
	
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<div id="respond">
<h3 class="respond"><?php _e("Leave a Reply", "SamTv"); ?></h3>
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p class="sahip"><?php _e("You must be logged in to post a comment.", "SamTv"); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p class="sahip"><?php _e("Logged in as", "SamTv"); ?> <?php echo $user_identity; ?>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="><?php _e("Log out", "SamTv"); ?>"><?php _e("Log out", "SamTv"); ?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="18" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><?php _e("Name", "SamTv"); ?> <?php if ($req) echo "(". __('required', 'SamTv') .")"; ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="18" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><?php _e("Mail (will not be published)", "SamTv"); ?> <?php if ($req) echo "(". __('required', 'SamTv') .")"; ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="18" tabindex="3" />
<label for="url"><?php _e("Website", "SamTv"); ?></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Submit Comment", "SamTv"); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>


<?php endif; // if you delete this the sky will fall on your head ?>