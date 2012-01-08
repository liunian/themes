/*
@version 0.1
@author deng 
*/
jQuery(document).ready(function($){
	//  为home高亮
	//if(window.location.href == "http://" + window.location.host + "/"){
	//	$('.menu-item-home').first().addClass('current-menu-item');
	//}
	
	// 分类高亮
	//$('.current-category-ancestor').first().parent().parent().addClass('current-menu-item');
	
	$('.post-title > a, .more-link').click(function(){
		var text = $(this).text();
		$(this).text("正在努力加载…");
		window.location = $(this).attr('href');
		$(this).delay(3000).fadeOut('slow',function(){
			$(this).text(text);
			})
			.fadeIn('slow');	
	});
	
	$('#comments .comment-reply-link').click(function(){var $this=$(this), $cmt=$this.parent().parent().parent().parent(), thisId=$cmt.attr('id'), thisAuthor = $cmt.find('cite.fn').first().text();$('#comment').val('<a class="cmt-reply-to" href="#'+ thisId + '">' + '@'+thisAuthor+' </a>')});
	
	$('#submit').val($('#submit').val() + '(Ctrl + Enter)');
	
	$('#comment').keydown(function(e){
		if (!$('#submit').attr('disabled') && e.ctrlKey && e.keyCode==13) {
			$('#commentform').submit();
		}
	});
	
	$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');// 这行是 Opera 的补丁, 少了它 Opera 是直接用跳的而且画面闪烁 by willin 
	$('#gotop, #goUp').click(function(){
		$body.animate({scrollTop: '0px'}, 1500);
		return false;
	});
	
	$('#goComments').click(function(){
		$body.animate({scrollTop: $('#comments').offset().top}, 1000);
		return false;
	});
	
	$('#goDown').click(function(){
		$body.animate({scrollTop: $('#footer').offset().top}, 1300);
		return false;
	});
	
});
