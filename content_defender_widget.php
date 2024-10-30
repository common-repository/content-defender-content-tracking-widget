<?php
/*
 * Plugin Name: Content Defender - Content Monitoring Widget
 * Version: 1.2
 * Plugin URI: https://contentdefender.com/users/widget
 * Description: The Content Defender Widget allows the Content Defender service to track the content on your blog.  No registration is necessary to begin tracking, but you must register to receive content reports.  Register at <a href="https://contentdefender.com/">Content Defender<a/>
 * Author: Content Defender an Hakungala, Inc. Service
 * Author URI: https://contentdefender.com/
 */
 
 /*
 	Note : Code graciously customized for the Content Defender Service.  Thanks Jesse! (http://jessealtman.com/2009/06/08/tutorial-wordpress-28-widget-api/)
 */
class ContentDefenderWidget extends WP_Widget
{
 /**
  * Declares the ContentDefenderWidget class.
  *
  */
    function ContentDefenderWidget(){
    $widget_ops = array('classname' => 'content_defender_widget', 'description' => __( "Content Defender Widget for WordPress.") );
    $control_ops = array('width' => 300, 'height' => 300);
    $this->WP_Widget('contentdefender', __('Content Defender'), $widget_ops, $control_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);

      # Before the widget
      echo $before_widget;
		
	  $title = "Syndication Tracking by";
      # The title
      if ( $title )
      echo $before_title . $title . $after_title;

      # Make the Content Defender widget	  
	  #echo '<center><a target="_blank" href="http://contentdefender.com/users/content_defender_is_protecting?src=wp"><img width="100" height="36" border="0" src="http://cdn.contentdefender.com/cd-img.png?src=wp-free" alt="Content Defender certified sites are monitored for illegal copyright infringement.  DO NOT STEAL." 																												oncontextmenu="alert(\'Content Defender is a free service. Receive weekly updates about where your is around the web. For more info go to \n\nhttp://ContentDefender.com\n\n Thanks!\nP.s. We have blog widgets!\'); return false;"></a></center>';	
	  
	  echo '<center><a target="_blank" href="http://cms.contentdefender.com/content/about-content-defender"><img width="100" height="36" border="0" src="http://cdn.contentdefender.com/cd-img.png?src=wp-free" alt="Syndication Tracking by Content Defender. Sites certified by the Content Defender Trust Seal are actively monitored. If you have syndicated this content the owner has been notified."  oncontextmenu="alert(\'Syndication Tracking by Content Defender. Sites certified by the Content Defender Trust Seal are actively monitored.  If you have syndicated this content the owner has been notified.\n\nContent Defender is a free service. Receive weekly updates about the syndication of your web content. For more info go to \n\nhttp://ContentDefender.com\n\n\nP.s. We have blog widgets!\'); return false;" /></a></center>';
	  
      # After the widget
      echo $after_widget;
  }

  /**
    * Saves the widgets settings.
    *
    */
    function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance['title'] = strip_tags(stripslashes($new_instance['title']));
  	  return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array('title'=>'', 'lineOne'=>'Hello', 'lineTwo'=>'World') );

      $title = htmlspecialchars($instance['title']);
  }

}// END class

/**
  * Register Hello World widget.
  *
  * Calls 'widgets_init' action after the Hello World widget has been registered.
  */
  function ContentDefenderWidgetInit() {
  register_widget('ContentDefenderWidget');
  }
  add_action('widgets_init', 'ContentDefenderWidgetInit');
?>