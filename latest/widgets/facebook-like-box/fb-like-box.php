<?php
/*
Plugin Name: Facebook like Box 
Description: facebook like box
Version: 1
*/


class CWP_FB_Like_Box extends WP_Widget
{

  function CWP_FB_Like_Box()
  {
    $widget_ops = array('classname' => 'cwp_fb_like_box', 'description' => 'Facebook like box' );
    $this->WP_Widget('CWP_FB_Like_Box', 'CWP - Facebook like box', $widget_ops);
  }


  function form($instance)
  {

    $instance = wp_parse_args( (array) $instance, array( 
	'title' => '',
	'page_url' => '',
	'width' => '292',
	'height' => '',
	'faces' => true,
	'color' => 'light',
	'stream' => true,
	'border' => true,
	'header' => true
	) );

	$title = $instance['title'];
	$page_url = $instance['page_url'];
	$width = $instance['width'];
	$height = $instance['height'];
	$faces = $instance['faces'];
	$color = $instance['color'];
	$stream = $instance['stream'];
	$border = $instance['border'];
	$header = $instance['header'];

?>

     <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget title:', 'cw-magezine'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>

     <p>
        <label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e('Facebook Page URL:', 'cw-magezine'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" type="text" value="<?php echo $page_url; ?>" />
    </p>

	<p>
	    <span style="margin-right:10px;"><?php _e('Size:', 'cw-magezine'); ?></span><br/>
        <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'cw-magezine'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" style="width: 40px; text-align: right;" />px  
        
        <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'cw-magezine'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" style="width: 40px; text-align: right;" />px 
    </p>
	
    <hr size="1" color="#dfdfdf" />
	<p>
		<label for="<?php echo $this->get_field_id('faces'); ?>"><?php _e('Show faces:', 'cw-magezine'); ?></label>
		<input id="<?php echo $this->get_field_id('faces'); ?>" name="<?php echo $this->get_field_name('faces'); ?>" type="checkbox" value="1" <?php checked( '1', $faces ); ?>/>
	</p>
    
	<hr size="1" color="#dfdfdf" />
	<p>
		<label for="<?php echo $this->get_field_id('stream'); ?>"><?php _e('Show stream:', 'cw-magezine'); ?></label>
		<input id="<?php echo $this->get_field_id('stream'); ?>" name="<?php echo $this->get_field_name('stream'); ?>" type="checkbox" value="1" <?php checked( '1', $stream ); ?>/>
	</p>
 
	<hr size="1" color="#dfdfdf" />    
	<p>
		<label for="<?php echo $this->get_field_id('border'); ?>"><?php _e('Show border:', 'cw-magezine'); ?></label>
		<input id="<?php echo $this->get_field_id('border'); ?>" name="<?php echo $this->get_field_name('border'); ?>" type="checkbox" value="1" <?php checked( '1', $border ); ?>/>
	</p>

	<hr size="1" color="#dfdfdf" />
	<p>
		<label for="<?php echo $this->get_field_id('header'); ?>"><?php _e('Show header:', 'cw-magezine'); ?></label>
		<input id="<?php echo $this->get_field_id('header'); ?>" name="<?php echo $this->get_field_name('header'); ?>" type="checkbox" value="1" <?php checked( '1', $header ); ?>/>
	</p>

	<hr size="1" color="#dfdfdf" />
    <p>
        <label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color scheme', 'cw-magezine'); ?></label>
        <select name="<?php echo $this->get_field_name('color'); ?>" id="<?php echo $this->get_field_id('color'); ?>" class="widefat">
            <?php
            $options = array('light', 'dark');
            foreach ($options as $option) {
                echo '<option value="' . $option . '" id="' . $option . '"', $color == $option ? ' selected="selected"' : '', '>', $option, '</option>';
            }
            ?>
        </select>
    </p>



<?php

  }

 

  function update($new_instance, $old_instance)
  {

    $instance = $old_instance;
	$instance['title'] = $new_instance['title'];
    $instance['page_url'] = $new_instance['page_url'];
	$instance['width'] = $new_instance['width'];
	$instance['height'] = $new_instance['height'];
	$instance['faces'] = $new_instance['faces'];
	$instance['color'] = $new_instance['color'];
	$instance['stream'] = $new_instance['stream'];
	$instance['border'] = $new_instance['border'];
	$instance['header'] = $new_instance['header'];
    return $instance;

  }

 

  function widget($args, $instance)
{
    extract($args, EXTR_SKIP);
	
	$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$page_url = empty($instance['page_url']) ? ' ' : apply_filters('widget_page_url', $instance['page_url']);
	$width = empty($instance['width']) ? ' ' : apply_filters('widget_width', $instance['width']);
	$height = empty($instance['height']) ? ' ' : apply_filters('widget_height', $instance['height']);
	$faces = empty($instance['faces']) ? ' ' : apply_filters('widget_faces', $instance['faces']);
	$color = empty($instance['color']) ? ' ' : apply_filters('widget_color', $instance['color']);
	$stream = empty($instance['stream']) ? ' ' : apply_filters('widget_stream', $instance['stream']);
	$border = empty($instance['border']) ? ' ' : apply_filters('widget_border', $instance['border']);
	$header = empty($instance['header']) ? ' ' : apply_filters('widget_header', $instance['header']);

	echo '<aside id="cwp_facebook_like_box" class="widget widget_cwp_facebook_like_box">';

	if( trim($title) )
		echo '<h1 class="widget-title"><span>'.$title.'</span></h1>';

	if ( trim($page_url) )
		echo '<div class="fb-like-box" data-href="'.$page_url.'" data-width="'.$width.'" data-height="'.$height.'" data-show-faces="'.$faces.'" data-colorscheme="'.$color.'" data-stream="'.$stream.'" data-show-border="'.$border.'" data-header="'.$header.'"></div>';    
	
	echo '</aside>';

  }


}

add_action( 'widgets_init', create_function('', 'return register_widget("CWP_FB_Like_Box");') );


?>