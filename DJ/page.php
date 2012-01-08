<?php
/**
 * The Template for displaying pages.
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */
get_header();
?>
	<?php if (have_posts()) while (have_posts()): the_post(); ?>
		<article id="post-<?php the_ID(); ?>" class="post">
			<header class="post-header">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-meta">
                    <span class="post-time"><?php the_time('Y/n/j')?></span>
					<span class="cats"><?php the_category(', '); ?></span>
                    <span class="comments-link"><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');?></span>
                    <span class="post-edit-link"> <?php edit_post_link('EDIT');?></span>
				</div>
			</header>
			<div class="post-content"><?php the_content(); ?></div>
			<footer class="post-footer">
				<span class="tags"><?php the_tags('', '&nbsp;', ''); ?></span>
			</footer>	
		</article>

		<?php comments_template( '', true ); ?>
	<?php endwhile; ?>
<?php get_footer();?>
