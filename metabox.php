<?php 
	$new_meta_boxes = array(
		"description" => array(
			"name"  => "description",
			"std"   => "这里填默认的网页描述",
			"title" => "网页描述"),
		"keywords" => array(
			"name"  => "keywords",
			"std"   => "这里填默认的网页关键字",
			"title" => "关键字")
	);

	function new_meta_boxes() {   
	    global $post, $new_meta_boxes;   
	  
	    foreach($new_meta_boxes as $meta_box) {   
	        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);   
	  
	        if($meta_box_value == "")   
	            $meta_box_value = $meta_box['std'];   
	  
	        echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';   
	  
	        // 自定义字段标题   
	        echo'<h4>'.$meta_box['title'].'</h4>';   
	  
	        // 自定义字段输入框   
	        echo '<textarea cols="60" rows="3" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';   
	    }   
	}
	function create_meta_box() {   
	    global $theme_name;   
	  
	    if ( function_exists('add_meta_box') ) {   
	        add_meta_box( 'new-meta-boxes', '自定义模块', 'new_meta_boxes', 'post', 'normal', 'high' );   
	    }   
	}  

	function save_postdata( $post_id ) {   
	    global $post, $new_meta_boxes;   
	  
	    foreach($new_meta_boxes as $meta_box) {   
	        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {   
	            return $post_id;   
	        }   
	  
	        if ( 'page' == $_POST['post_type'] ) {   
	            if ( !current_user_can( 'edit_page', $post_id ))   
	                return $post_id;   
	        }    
	        else {   
	            if ( !current_user_can( 'edit_post', $post_id ))   
	                return $post_id;   
	        }   
	  
	        $data = $_POST[$meta_box['name'].'_value'];   
	  
	        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")   
	            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);   
	        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))   
	            update_post_meta($post_id, $meta_box['name'].'_value', $data);   
	        elseif($data == "")   
	            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));   
	    }   
	}
?>