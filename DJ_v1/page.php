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
			</div>				
		</div>

		<?php comments_template( '', true ); ?>
	<?php endwhile; ?>
<?php get_footer();?>