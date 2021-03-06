<?php
/**
 * The Header for the theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */
?>
<!DOCTYPE html>
<html>
<head>
    <!--[if lte IE 7]>
    <script>window.location = "http://liunian.info/demo/browsers.html";</script>
    <![endif]-->
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0" />
    <title><?php
    $templatePath = get_bloginfo('template_directory');
    $css = $templatePath . '/style.min.css?v=' . filemtime(TEMPLATEPATH . '/style.min.css');
    $js = $templatePath . '/dj.min.js?v=' . filemtime(TEMPLATEPATH . '/dj.min.js');
	if (is_home()) echo "小居";
	else {wp_title('', true); echo " &laquo; "; echo "小居";}
?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" media="screen" />
	<?php
	if (is_home()){
	    $keywords = "小居,流年,Wordpress,生活";
	    $description = "所谓小居，乃一怡然之乐之地，自成一家";
	} elseif (is_single()){
	    if ($post->post_excerpt) {
	        $description = $post->post_excerpt;
	    } else {
	    	mb_internal_encoding("UTF-8");
	        $description = mb_substr(strip_tags($post->post_content),0,80);
	    }
	    $keywords = "";
	    $tags = wp_get_post_tags($post->ID);
	    foreach ($tags as $tag ) {
	        $keywords = $keywords . $tag->name . ", ";
	    }
	}?><meta name="google-site-verification" content="jrFErZuXZuyfb9eavVLRBsD4tm6DLcFLIJ4K7pLKtdk" />
        <meta name="keywords" content="<?php echo $keywords?>" />
	<meta name="description" content="<?php echo $description?>" />
	<meta name="Author" content="流年" />
	<link rel="alternate" type="application/rss+xml" title="小居 RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="小居  Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="http://liunian.info/favicon.ico" type="image/x-ico" />
	<?php wp_head();?>
	<!--[if IE]>
	<script src= "<?php bloginfo('template_directory'); ?>/html5.js"></script>
	<![endif]-->
   </head>
<body>
     <script>
        var templatePath = "<?php echo $templatePath;?>";
        (function(){
            var scr = document.createElement('script');
            scr.src = "<?php echo $js;?>";
            document.getElementsByTagName('head')[0].appendChild(scr);
        })();
    </script>

	<div id="wrapper">
		<div id="header">
			<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<<?php echo $heading_tag; ?> id="site-title">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</<?php echo $heading_tag; ?>>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>
			<div id="access">
			<?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?>
			<div class="clearfix"></div>
			</div><!-- #access -->
			<?php get_search_form(); ?>
		</div> <!-- #header -->
		<div id="content">
