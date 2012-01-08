<?php
register_nav_menus(array(
	'primary' => 'Primary Navigation'
));

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 */
function DJ_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'DJ_page_menu_args' );


if ( ! function_exists( 'DJ_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own DJ_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since DJ 0.1
 */
function DJ_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	if ( $comment->comment_type == '') :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-entry clearfix">
		<div class="comment-meta left">
		    <div class="comment-author vcard">
			    <?php echo get_avatar( $comment, 64 ); ?>
			    <?php printf('%s', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		    </div><!-- .comment-author .vcard -->
		    <?php if ( $comment->comment_approved == '0' ) : ?>
			    <em>你的评论需要等待批准才能看到。</em>
			    <br />
		    <?php endif; ?>
		    <div class="comment-datetime"><?php
			    /* translators: 1: date, 2: time */
			    comment_date('Y/n/j H:i');
		   ?></div><!-- .comment-datetime -->

		    
		</div>
		<div class="comment-body left"><?php comment_text(); ?></div>

	    <span class="reply">
	    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] , 'reply_text' => '回复') ) ); ?>
	    </span><!-- /.reply -->
	</div><!-- /#comment-##  -->
	<?php
	endif;
}
endif;
// -- END ----------------------------------------



/* Mini Pagenavi v1.0 by Willin Kan. */
function pagenavi( $p = 2 ) { // 取當前頁前後各 2 頁
  if ( is_singular() ) return; // 文章與插頁不用
  global $wp_query, $paged;
  $max_page = $wp_query->max_num_pages;
  if ( $max_page == 1 ) return; // 只有一頁不用
  if ( empty( $paged ) ) $paged = 1;
  #echo '<span class="pages">页面: ' . $paged . '/' . $max_page . ' </span> '; // 頁數
  if ( $paged > $p + 1 ) p_link( 1, '最前頁' );
  if ( $paged > $p + 2 ) echo '... ';
  for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // 中間頁
    if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : p_link( $i );
  }
  if ( $paged < $max_page - $p - 1 ) echo '... ';
  if ( $paged < $max_page - $p ) p_link( $max_page, '最後頁' );
}
function p_link( $i, $title = '' ) {
  if ( $title == '' ) $title = "第 {$i} 頁";
  echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a> ";
}
// -- END ----------------------------------------


/* comment_mail_notify v1.0 by willin kan. (無勾選欄) */
function comment_mail_notify($comment_id) {
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改為你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
  $spam_confirmed = $comment->comment_approved;
  if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email)) {
    /* 上面的判斷式,決定發出郵件的必要條件:
    ($parent_id != '') && ($spam_confirmed != 'spam'): 回覆的, 而且不是 spam 才可發, 必需!!
    ($to != $admin_email) : 不發給 admin.
    ($comment_author_email == $admin_email) : 只有 admin 的回覆才可發.
    可視個人需求修改以上條件.
    */
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
    $subject = '您在【' . get_option("blogname") . '】的留言有了回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
       . trim(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复:<br />'
       . trim($comment->comment_content) . '<br /></p>
      <p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复完整內容</a></p>
      <p>欢迎再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此邮件有系统自动发出，请勿回复.)</p>
    </div>';
  //  $message = convert_smilies($message);
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');
// -- END ----------------------------------------


// custom smilies src
/**
function custom_smilies_src ($img_src, $img, $siteurl){
	return 'http://img.liunian.info/smilies/'.$img;
}
add_filter('smilies_src','custom_smilies_src',1,10);*/
function custom_smilies_src($src, $img){
    return 'http://liunian.info/img/smilies/'.$img;
}
add_filter('smilies_src', 'custom_smilies_src', 10, 2); // 優先級10(默認), 變量2個($src 和 $img)
// -- END ----------------------------------------


/* add smilies to commment_form */
function add_smilies_to_form(){
    include(TEMPLATEPATH . '/smiley.php');
}
if (is_user_logged_in()) {//用户登录情况下，加到登录信息下面（留言框顶部）
	add_filter('comment_form_logged_in_after', 'add_smilies_to_form');
}
else { //非登录情况下，加到fields下（留言框顶部）
	add_filter( 'comment_form_after_fields', 'add_smilies_to_form');
}
// -- END ----------------------------------------


/* 获取随机文章 */
function random_posts($ulId, $ulClass, $liClass, $num=10, $showDate=true){
	if ($ulId == '') { $ulId = 'rand_posts'; }
	if ($ulClass == '') { $ulClass = 'postlist'; }
	if ($liClass == '') { $liClass = 'rand_post'; }
	query_posts("posts_per_page=$num & orderby=rand");
	$rndPosts = "<ul id='$ulId' class='$ulClass'>";
	global $post;
	if (have_posts()){
		while (have_posts()){
			the_post();
			$link = get_permalink($post->ID);
			$title = $post->post_title; //get_the_title($post->ID);
			$rndPosts .= "<li class='$liClass'><a href='$link' title='$title' rel='bookmark'>$title</a>";
			if ($showDate) {
				$rndPosts .= "<span>" . get_the_time('Y-m-d') . "</span>";
			}
			$rndPosts .= "</li>";
		}
	}
	wp_reset_query();
	$rndPosts .= "</ul>";
	return $rndPosts;
}

/* 获取相关文章 */
function releated_posts($ulId, $ulClass, $liClass, $num=10, $showDate=true) {
	global $post;
	$i = 0;
	if ($ulId == '') { $ulId = 'releated_posts'; }
	if ($ulClass == '') { $ulClass = 'postlist'; }
	if ($liClass == '') { $liClass = 'releated_post'; }
	$exclude_id = $post->ID;
	$tags = '';
	$posttags = get_the_tags();
	$relPosts = "<ul id='$ulId' class='$ulClass'>";

	if ($posttags){
		foreach ($posttags as $tag) {
				$tags .= $tag->term_id . ',';
		}
		$args = array(
			'post_status' => 'publish',
			'tag_in' => explode(',', $tags), // 只選 tags 的文章.
			'post__not_in' => explode(',', $exclude_id), // 排除已出現過的文章.
			'ignore_sticky_posts' => 1,
			'orderby' => 'comment_date', // 依評論日期排序.
			'posts_per_page' => $num
		);
		query_posts($args);
		while (have_posts()){
			the_post();
			$link = get_permalink($post->ID);
			$title = $post->post_title;
			$relPosts .= "<li class='$liClass'><a href='$link' title='$title' rel='bookmark'>$title</a>";
			if ($showDate) {
				$relPosts .= "<span>" . get_the_time('Y-m-d') . "</span>";
			}
			$relPosts .= "</li>";

			$exclude_id .= ',' . $post->ID;
			$i++;
		}
		wp_reset_query();
	}

	if ($i < $num){
		$cats = '';
		foreach (get_the_category() as $cat) {
			$cats .= $cat->cat_ID . ',';
		}
		$args = array(
			'category__in' => explode(',', $cats), // 只選 category 的文章.
			'post__not_in' => explode(',', $exclude_id),
			'ignore_sticky_posts' => 1,
			'orderby' => 'comment_date',
			'posts_per_page' => $num - $i
		);
		query_posts($args);
		while (have_posts()){
			the_post();
			$link = get_permalink($post->ID);
			$title = $post->post_title;
			$relPosts .= "<li class='$liClass'><a href='$link' title='$title' rel='bookmark'>$title</a>";
			if ($showDate) {
				$relPosts .= "<span>" . get_the_time('Y-m-d') . "</span>";
			}
			$relPosts .= "</li>";
			$i++;
		}
		wp_reset_query();
	}
	$relPosts .= "</ul>";

	if ( $i  == 0 )  $relPosts = "<li>尚无相关文章</li>";

	return $relPosts;
}

/* 插入相关文章到feed */
function insertReleatedPosts($content) {
	$posts = releated_posts('','','',5,false);
	$head = "<h4>相关文章</h4>";
	$content .= $head . $posts;
	return $content;
}
add_filter('the_excerpt_rss', 'insertReleatedPosts');
add_filter('the_content_feed','insertReleatedPosts');

/* 插入随机文章到feed */
function insertRandomPosts($content) {
	$posts = random_posts('','','',5,false);
	$head = '<h4>随机文章</h4>';
	$content .= $head . $posts;
	return $content;
}
add_filter('the_excerpt_rss', 'insertRandomPosts');
add_filter('the_content_feed','insertRandomPosts');



//cache gravatar
function my_avatar($avatar) {
  $tmp = strpos($avatar, 'http');
  $g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
  $tmp = strpos($g, 'avatar/') + 7;
  $f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
  $w = get_bloginfo('wpurl');
  $e = ABSPATH .'avatar/'. $f .'.jpg';
  $t = 2592000; //設定14天, 單位:秒
  if ( !is_file($e) || (time() - filemtime($e)) > $t ) { //當頭像不存在或文件超過14天才更新
    copy(htmlspecialchars_decode($g), $e);
  } else  $avatar = strtr($avatar, array($g => $w.'/avatar/'.$f.'.jpg'));
  if ( filesize($e) < 500 ) copy($w.'/avatar/default.jpg', $e);
  return $avatar;
}
add_filter('get_avatar', 'my_avatar');


// add updown access, needs hook wp_footer() in footer.php
function up_down() {
?>
	<div id="updown">
		<a href="#" title="返回顶部" id="goUp"></a>
		<?php if(is_single()):?>
		<a href="#comments" title="阅读评论" id="goComments"></a>
		<?php endif;?>
		<a href="#footer" title="直达底部" id="goDown"></a>
	</div>
	<script type="text/javascript">
		if (!-[1,] && !window.XMLHttpRequest) {
			document.getElementById('updown').style.display = 'none';
		}
	</script>
<?php
}
#add_action('wp_footer', 'up_down');


// version cache stylesheet
function cache_buster_code($stylesheet_uri){
    $pieces = explode('wp-content', $stylesheet_uri);
    $stylesheet_uri = $stylesheet_uri . '?v=' . filemtime(ABSPATH . '/wp-content' . $pieces[1]);
    return $stylesheet_uri;
}
add_filter('stylesheet_uri','cache_buster_code',9999,1); 


// load JS for page
function LoadJS(){
	$basejs = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
	$singlejs = get_bloginfo('template_directory') . '/dj.min.js?v='.filemtime(TEMPLATEPATH .'/dj.min.js');
	$commentjs = get_bloginfo('template_directory') . '/comments-ajax.min.js?v='.filemtime(TEMPLATEPATH .'/comments-ajax.min.js');
	
	$text = "<script src=\"$basejs\"></script>\n<script src=\"$singlejs\"></script>";
	
	if (is_singular()) {
	    $text .= "\n<script src=\"$commentjs\"></script>";
    }
    
	echo $text;
}
add_action('wp_footer', 'LoadJS', 100);


?>
