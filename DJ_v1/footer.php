<?php
?>
	</div>	<!-- #content -->
	<div id="footer">
		Copyright &copy; 2010 小居 | 
		power by <a id="powered" href="http://wordpress.org/">WordPress</a> | 
		Theme by <a href="http://liunian.info/">流年</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/wp-admin" title="Sing In">入口</a>
		<?php get_search_form(); ?>	
		<a id="gotop" href="#">Top ↑</a>
	</div>  <!-- #footer -->
	<?php wp_footer(); ?>
</div> <!-- #wrapper -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/dj.js?v=85" type="text/javascript"></script>
		<?php if ( is_singular() ){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
<?php } ?>

<?php if (!$user_ID) { ?>
<script type="text/javascript">
	var _gaq = _gaq || [];
 	_gaq.push(['_setAccount', 'UA-16074783-2']);
  	_gaq.push(['_trackPageview']);
	(function() {
    		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  	})();
</script><?php } 	?>
<script id="aptureScript">
(function (){var a=document.createElement("script");a.defer="true";a.src="http://www.apture.com/js/apture.js?siteToken=ZbkPOWQ";document.getElementsByTagName("head")[0].appendChild(a);})();
</script>
<!-- <?php echo "查询次数:" . get_num_queries(); ?> -->
</body>
</html>