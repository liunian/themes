<?php
/**
 * The Template for showing 404 error messages.
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */
get_header();
?>
    <div class="post archive">
        <header class="post-header">
			<h1 id="error_msg" class="post-title post-tips">Content Not Found</h1>
        </header>
        <div class="post-content">
            <p class="post-tips">没有相关文章，下面是一些随机文章。</p>
			<?php echo random_posts('404_rand_posts', '', '', $num=20);?>
        </div>
    </div>
<?php get_footer();?>
