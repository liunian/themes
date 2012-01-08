<?php
?>
	</div>	<!-- #content -->
</div> <!-- #wrapper -->
<div id="footer">
    Copyright &copy; 2012 小居
</div>  <!-- #footer -->
<?php wp_footer(); ?>


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
<!-- <?php echo "查询次数:" . get_num_queries(); ?> -->
</body>
</html>
