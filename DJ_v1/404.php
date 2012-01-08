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

			<h1 id="error_msg">404 Error（~~~~(>_&lt;)~~~~ 随便转转吧）</h1>
			<?php echo random_posts('404_rand_posts', '', '');?>

<?php get_footer();?>