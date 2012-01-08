<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */
 get_header();
?>
		<div id="post-arvhive" class="post archive">
			<header class="post-header archive-header">
			    <h1 class="post-title archive-header"><?php
			// If this is a category archive
			if (is_category()) {
				printf("'%s' 分类的存档", single_cat_title('', false) );
			// If this is a tag archive
			} elseif (is_tag()) {
				printf("文章标签 '%s'", single_tag_title('', false) );
			// If this is a daily archive
			} elseif (is_day()) {
				printf("%s的存档", get_the_time('Y年n月j日'));
			// If this is a monthly archive
			} elseif (is_month()) {
				printf("%s的存档", get_the_time('Y年n月'));
			// If this is a yearly archive
			} elseif (is_year()) {
				printf("%s的存档", get_the_time('Y年'));
			} else {
				printf("存档");
			}
			?></h1>
			</header>
            
            <div class="post-content">
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=30'); ?>
			<?php if (have_posts()):?>
				<ul class="postlist">
					<?php while (have_posts()) : the_post(); update_post_caches($posts); ?>
					<li>
						<a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
						<span><?php the_time('Y-m-d') ?></span>
					</li>
					<?php endwhile;?>
				</ul>
			<?php else : ?>
				<div class="errorbox">
					没找到相应文章
				</div>
			<?php endif; ?>
            </div>
            
			<div id="mini-pagenavi">
			<?php pagenavi(); ?>
			</div>
		</div>
<?php get_footer();?>
