<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */

get_header(); ?>

<?php $posts = query_posts($query_string . '&orderby=date&posts_per_page=10'); ?>
<?php if ( have_posts() ) : ?>
				<h1 id="search-title"><?php printf('Search Results for: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php while (have_posts()): the_post(); ?>
				<div class="search-posts">
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
					</div>
				</div>
				<?php endwhile; ?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title">Nothing Found</h2>
					<div class="entry-content">
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
				<div id="mini-pagenavi">
				<?php pagenavi();?>					
				</div>
<?php get_footer();?>