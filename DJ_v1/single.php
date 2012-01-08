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
		<div id="post-<?php the_ID(); ?>" class="post">
			<div class="post-header">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-meta">
					<span class="post-time"><?php the_time('Y年n月j日 H:i')?></span>
					<span class="post-edit-link"> <?php edit_post_link('编辑');?></span>
					<span class="comments-link"><?php comments_popup_link('抢个沙发','坐坐板凳','%人围观');?></span>
				</div>
			</div>
			<div class="post-body">
				<div class="post-content"><?php the_content(); ?></div>
				<div class="post-utility">
					<span class="cats">分类：<?php the_category(', '); ?></span>
					<span class="tags"><?php the_tags(); ?></span>
				</div>		
			</div>	
		</div>
		
		<div id="postnavi">
			<span id="prev-post"><?php previous_post_link('%link','&larr;%title') ?></span>
			<span id="next-post"><?php next_post_link('%link','%title&rarr;') ?></span>
			<div class="clearfix"></div>
		</div>
		
		<div id="other_posts">
			<div class="other_posts">
				<div id="plh1">相关文章</div><!-- plh: postlist head-->
				<?php echo releated_posts('','','',5,false);?>
			</div>
			<div class="other_posts">
				<div id="plh2">随机文章</div>
				<?php echo random_posts('sin_rand_posts','','',5,false); ?>	
			</div>
			<div class="clearfix"></div>
		</div>
		
		<?php comments_template( '', true ); ?>
	<?php endwhile; endif; wp_reset_query();?>
<?php get_footer();?>