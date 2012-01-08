<?php get_header();?>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="post">
			<div class="post-header">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="查看文章：<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="post-meta">
					<span class="post-time"><?php the_time('Y年n月j日 H:i')?></span>
					<span class="post-edit-link"> <?php edit_post_link('编辑');?></span>
					<span class="comments-link"><?php comments_popup_link('抢个沙发','坐坐板凳','%人围观');?></span>
				</div>
			</div>
			<div class="post-body">
				<div class="post-content"><?php the_content("阅读全文 &raquo;"); ?></div>
				<div class="clearfix"></div>
				<div class="post-utility">
					<span class="cats">分类：<?php the_category(', '); ?></span>
					<span class="tags"><?php the_tags(); ?></span>
				</div>		
			</div>
		</div>
	<?php endwhile; else: ?>
	<div class="error">
		没有你所需的文件。
	</div>
	<?php endif; ?>
	
	<div id="mini-pagenavi"><!--mini pagenavi -->
	<?php pagenavi(); ?>
	</div>
<?php get_footer(); ?>