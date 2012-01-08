<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */
get_header();
?>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
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
		
		<div id="postnavi">
			<span id="prev-post" class="left"><?php previous_post_link('%link','&larr;%title') ?></span>
			<span id="next-post" class="right"><?php next_post_link('%link','%title&rarr;') ?></span>
			<div class="clearfix"></div>
		</div>
		
		<div id="other_posts" class="clearfix">
			<div class="other_posts left">
				<div id="plh1">相关文章</div><!-- plh: postlist head-->
				<?php echo releated_posts('','','',5,false);?>
			</div>
			<div class="other_posts right">
				<div id="plh2">随机文章</div>
				<?php echo random_posts('sin_rand_posts','','',5,false); ?>	
			</div>
		</div>
		
		<?php comments_template( '', true ); ?>
	<?php endwhile; endif; wp_reset_query();?>
<?php get_footer();?>
