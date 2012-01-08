<?php
/**
 * The template for displaying Comments.
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */
?>
			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword">需要密码</p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( '一人来访', '%1$s 人乱语', get_comments_number()),
			number_format_i18n( get_comments_number() ));
			?></h3>

			<ol class="commentlist">
				<?php
					wp_list_comments(array('callback' => 'DJ_comment'));
				?>
			</ol>

<?php else : // no comments:
	if ( ! comments_open() ) :
?>
	<p class="nocomments">评论已关闭</p>
<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->