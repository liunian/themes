<?php get_header();?>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<article id="post-<?php the_ID(); ?>" class="post">
			<header class="post-header">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="查看文章：<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header>
			<div class="post-content clearfix">
				<?php the_content("Read More"); ?>
			</div>
			<footer class="post-footer clearfix">
                <span class="post-time"><?php the_time('Y/n/j')?></span>
                <span class="comments-link"><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');?></span>
                <span class="post-edit-link"> <?php edit_post_link('EDIT');?></span>
			</footer>
		</article>
	<?php endwhile; else: ?>
	<article id="post-0" class="post no-results not-found">
        <header class="post-header">
            <h1 class="post-title">There seems no Article now.</h1>
        </header><!-- .post-header -->

        <div class="post-content">
            <p>There seems no Article now.</p>
            <?php get_search_form(); ?>
        </div><!-- .post-content -->
    </article><!-- #post-0 -->
	<?php endif; ?>
	
	<div id="mini-pagenavi"><!--mini pagenavi -->
	<?php pagenavi(); ?>
	</div>
<?php get_footer(); ?>
