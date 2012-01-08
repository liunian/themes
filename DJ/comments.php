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

<?php if (! comments_open() ) : ?>
    <p class="nocomments">评论已关闭</p>
<?php else : ?>
    <h3 id="comments-title"><?php comments_number( 'No Comments', 'One comment', '% Comments'); ?></h3>

	<ol class="comment-list">
		<?php
		    if ( have_comments() ) :
			    wp_list_comments(array('callback' => 'DJ_comment'));
		    endif;
		?>
	</ol>
<?php endif; ?>


<?php comment_form(); ?>

</div><!-- #comments -->
