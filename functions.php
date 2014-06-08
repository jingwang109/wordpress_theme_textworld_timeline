<?php 
//安装后执行的函数，其实没用到
if (!function_exists('hdumemory_setup')){

	function hdumemory_setup(){

	}	
}
add_action( 'after_setup_theme', 'hdumemory_setup' );
//这个忘记了，忘记当初干嘛的。就先在作用来看，添加了作者信息？
function hdumemory_scripts(){
	wp_enqueue_style('hdumemory-style', get_stylesheet_uri(), array('genericons'));
	echo '<meta name="author" content="aside99" />';
}
add_action('wp_enqueue_scripts', 'hdumemory_scripts');


function remove_inline_style() {
	remove_action('wp_head', 'framemarket_header_style');
	remove_action('wp_head', 'framemarket_admin_header_style');
	remove_action('wp_head', 'gridmarket_fonts');
}

add_action('init', 'remove_inline_style');
//取消使用googleapi，防止因为api被墙，网站一直刷不出来。本来是类，后来改简单的方法了。
// class Disable_Google_Fonts {
//         public function __construct() {
//                 add_filter( 'gettext_with_context', array( $this, 'disable_open_sans'             ), 888, 4 );
//         }
//         public function disable_open_sans( $translations, $text, $context, $domain ) {
//                 if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
//                         $translations = 'off';
//                 }
//                 return $translations;
//         }
// }
// $disable_google_fonts = new Disable_Google_Fonts;
function disable_open_sans( $translations, $text, $context, $domain ) {
    if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
        $translations = 'off';
    }
    return $translations;
}
add_filter( 'gettext_with_context', 'disable_open_sans', 888, 4 );

add_theme_support( 'post-thumbnails' );  
//就对more_link 改了下文字
function remove_more_link_scroll($link) {
	$link = preg_replace('/#more-[0-9]+/', '', $link);
	$link = str_replace('more-link', 'more-link btn btn-meto', $link);
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
//通过正则获取图片，估计没用到，因为后来找到了更加正规的方法，看 get_post_thumbnail_url
function get_pictures($context){
	preg_match_all('/<img[.|\s]*src="([^.]*\.(jpg)|(png)|(gif)|(jpeg)|(bmp))"[.|\s]*/i', $context, $matches);
	return $matches;
}
//添加文章形式的支持，否则后台不会有音频形式的选项
add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
//获取一篇文章的缩略图、
/*
	post_id  文章的id
*/
function get_post_thumbnail_url($post_id){
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
	$thumbnail_id = get_post_thumbnail_id($post_id);
	if($thumbnail_id ){
		$thumb = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
		return $thumb[0];
	}else{
		return get_bloginfo("template_url")."/image/music-bg.jpg";
	}
}
function timeline_admin_hCard() {
	global $wpdb, $user_info;
	$user_info = get_userdata(1);
	echo '<span class="vcard"><a class="url fn n" href="' . $user_info->user_url . '"><span class="given-name">' . $user_info->first_name . '</span> <span class="family-name">' . $user_info->last_name . '</span></a></span>';
}

function pagination($query_string){   
global $posts_per_page, $paged;   
$my_query = new WP_Query($query_string ."&posts_per_page=-1");   
$total_posts = $my_query->post_count;   
if(empty($paged))$paged = 1;   
$prev = $paged - 1;   
$next = $paged + 1;   
$range = 2; // only edit this if you want to show more page-links   
$showitems = ($range * 2)+1;   
  
$pages = ceil($total_posts/$posts_per_page);   
if(1 != $pages){   
echo "<div class='pagination'>";   
echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>最前</a>":"";   
echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";   
  
for ($i=1; $i <= $pages; $i++){   
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){   
echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";   
}   
}   
  
echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";   
echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后</a>":"";   
echo "</div>\n";   
}   
}  
?>