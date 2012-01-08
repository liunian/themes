/*
@version 0.1
@author deng
*/
jQuery(document).ready(function($) {
    var $window = $(window),
        $side = $('#header'),
        $content = $('#content'),
        sideTop = /*$side.offset().top +*/ parseInt($('body').css('borderTopWidth'));

   $window.scroll(function(e) {
        topSidebar();
   });

   /**
    * make sidebar always in the view content
    */
   function topSidebar() {
        var overTop = $window.scrollTop() >= sideTop,
            hasSticky = $side.hasClass('sticky');
        //    console.log(overTop, hasSticky);

       if (overTop && !hasSticky) {
            $side.addClass('sticky');
            $content.addClass('scroll');
       } else if (!overTop && hasSticky) {
       //console.log('remove');
            $side.removeClass('sticky');
            $content.removeClass('scroll');
       }
   }

   // add some desc when click title or more-link
	$('.post-title > a, .more-link').click(function() {
		var text = $(this).text();
		$(this).text('正在努力加载…');
		window.location = $(this).attr('href');
		$(this).delay(3000).fadeOut('slow', function() {
			$(this).text(text);
			})
			.fadeIn('slow');
	});

    // add tooltip to quick comment
	$('#submit').val($('#submit').val() + '(Ctrl + Enter)');

    // bind ctrl + enter to quick comment
	$('#comment').keydown(function(e) {
		if (!$('#submit').attr('disabled') && e.ctrlKey && e.keyCode == 13) {
			$('#commentform').submit();
		}
	});
});
