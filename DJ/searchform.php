<?php
/**
 * The template for displaying search form.
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 *
 * if not exist this file, it'll render bulit-in search-from, OR can define in
 * file functions.php, and then use add_filter to custom it;
 * 
 * more: http://codex.wordpress.org/Function_Reference/get_search_form
 *action="<?php bloginfo('url'); ?>/cse
 */
?>

<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/search">
    	<label class="screen-reader-text" for="s">Search for:</label>
    	<input type="text" value placeholder="Search" name="q" id="s" />
</form>
