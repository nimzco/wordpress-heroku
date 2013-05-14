<?php
/*
Plugin Name: Simple SEO Slideshow
Plugin URI: http://www.hostdog.gr/
Description: Create Simple Slideshow from Post/Page Gallery (W3C Valid)
Author: Spyros Vlachopoulos
Version: 1.2.4
Author URI: http://www.hostdog.gr/
*/
 
 
class simpleSEOSlideshowWidget extends WP_Widget {
  function simpleSEOSlideshowWidget() {
    $widget_ops = array('classname' => 'simpleSlideshowWidget', 'description' => 'Displays a slideshow from post/page gallery' );
    $this->WP_Widget('simpleSlideshowWidget', 'Post/Page Slideshow', $widget_ops);
    
  }
 
  function form($instance) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'pid' => ''  ) );
    $title = esc_attr($instance['title']);
    $pid = esc_attr($instance['pid']);
    $delay = esc_attr($instance['delay']);
    $ssheight = esc_attr($instance['ssheight']);
    $sssdisplaybul = esc_attr($instance['sssdisplaybul']);
    $sssdisplayarr = esc_attr($instance['sssdisplayarr']);
    $sssdisplaycap = esc_attr($instance['sssdisplaycap']);
    $sssbulpos = esc_attr($instance['sssbulpos']);
    $ssscappos = esc_attr($instance['ssscappos']);
    $sssexclude = esc_attr($instance['sssexclude']);
    $sssrandomize = esc_attr($instance['sssrandomize']);
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: </label><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></p>
  <p><label for="<?php echo $this->get_field_id('pid'); ?>">Page/Post ID: </label><input class="widefat" id="<?php echo $this->get_field_id('pid'); ?>" name="<?php echo $this->get_field_name('pid'); ?>" type="text" value="<?php echo attribute_escape($pid); ?>" /></p>
  <p><label for="<?php echo $this->get_field_id('delay'); ?>">Delay in seconds: </label><input class="widefat" id="<?php echo $this->get_field_id('delay'); ?>" name="<?php echo $this->get_field_name('delay'); ?>" type="text" value="<?php echo attribute_escape($delay); ?>" /></p>
  <p><label for="<?php echo $this->get_field_id('ssheight'); ?>">Slideshow Height: </label><input class="widefat" id="<?php echo $this->get_field_id('ssheight'); ?>" name="<?php echo $this->get_field_name('ssheight'); ?>" type="text" value="<?php echo attribute_escape($ssheight); ?>" /></p>
  <p><label for="<?php echo $this->get_field_id('sssdisplaybul'); ?>">Display Bullets: </label>
        <select id="<?php echo $this->get_field_id('sssdisplaybul'); ?>" name="<?php echo $this->get_field_name('sssdisplaybul'); ?>" >
          <option value="yes" <?php if ($sssdisplaybul == 'yes') echo 'selected="selected"'; ?>>yes</option>
          <option value="no" <?php if ($sssdisplaybul == 'no') echo ' selected="selected"'; ?>>no</option>
        </select>
  </p>
  <p><label for="<?php echo $this->get_field_id('sssdisplayarr'); ?>">Display Arrows: </label>
        <select id="<?php echo $this->get_field_id('sssdisplayarr'); ?>" name="<?php echo $this->get_field_name('sssdisplayarr'); ?>" >
          <option value="yes" <?php if ($sssdisplayarr == 'yes') echo 'selected="selected"'; ?>>yes</option>
          <option value="no" <?php if ($sssdisplayarr == 'no') echo ' selected="selected"'; ?>>no</option>
        </select>
  </p>
  <p><label for="<?php echo $this->get_field_id('sssdisplaycap'); ?>">Display Caption: </label>
        <select id="<?php echo $this->get_field_id('sssdisplaycap'); ?>" name="<?php echo $this->get_field_name('sssdisplaycap'); ?>" >
          <option value="yes" <?php if ($sssdisplaycap == 'yes') echo 'selected="selected"'; ?>>yes</option>
          <option value="no" <?php if ($sssdisplaycap == 'no') echo ' selected="selected"'; ?>>no</option>
        </select>
  </p>
  <p><label for="<?php echo $this->get_field_id('sssbulpos'); ?>">Bullets Position: </label>
        <select id="<?php echo $this->get_field_id('sssbulpos'); ?>" name="<?php echo $this->get_field_name('sssbulpos'); ?>" >
          <option value="top-left" <?php if ($sssbulpos == 'top-left') echo 'selected="selected"'; ?>>top-left</option>
          <option value="top-center" <?php if ($sssbulpos == 'top-center') echo 'selected="selected"'; ?>>top-center</option>
          <option value="top-right" <?php if ($sssbulpos == 'top-right') echo 'selected="selected"'; ?>>top-right</option>
          <option value="bottom-left" <?php if ($sssbulpos == 'bottom-left') echo 'selected="selected"'; ?>>bottom-left</option>
          <option value="bottom-center" <?php if ($sssbulpos == 'bottom-center') echo 'selected="selected"'; ?>>bottom-center</option>
          <option value="bottom-right" <?php if ($sssbulpos == 'bottom-right') echo 'selected="selected"'; ?>>bottom-right</option>
        </select>
  </p>
  <p><label for="<?php echo $this->get_field_id('ssscappos'); ?>">Caption Position: </label>
        <select id="<?php echo $this->get_field_id('ssscappos'); ?>" name="<?php echo $this->get_field_name('ssscappos'); ?>" >
          <option value="top-left" <?php if ($ssscappos == 'top-left') echo 'selected="selected"'; ?>>top-left</option>
          <option value="top-center" <?php if ($ssscappos == 'top-center') echo 'selected="selected"'; ?>>top-center</option>
          <option value="top-right" <?php if ($ssscappos == 'top-right') echo 'selected="selected"'; ?>>top-right</option>
          <option value="bottom-left" <?php if ($ssscappos == 'bottom-left') echo 'selected="selected"'; ?>>bottom-left</option>
          <option value="bottom-center" <?php if ($ssscappos == 'bottom-center') echo 'selected="selected"'; ?>>bottom-center</option>
          <option value="bottom-right" <?php if ($ssscappos == 'bottom-right') echo 'selected="selected"'; ?>>bottom-right</option>
        </select>
  </p>
  <p><label for="<?php echo $this->get_field_id('sssexclude'); ?>">Exclude images by ID: </label><input class="widefat" id="<?php echo $this->get_field_id('sssexclude'); ?>" name="<?php echo $this->get_field_name('sssexclude'); ?>" type="text" value="<?php echo attribute_escape($sssexclude); ?>" /> (seperate by comma)</p>
  <p>
    <label for="<?php echo $this->get_field_id('sssrandomize'); ?>">Randomize image sorting: </label>
    <select id="<?php echo $this->get_field_id('sssrandomize'); ?>" name="<?php echo $this->get_field_name('sssrandomize'); ?>" >
      <option value="no" <?php if ($sssrandomize == 'no') echo ' selected="selected"'; ?>>no</option>
      <option value="yes" <?php if ($sssrandomize == 'yes') echo 'selected="selected"'; ?>>yes</option>
    </select>
  </p>
  
  
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['pid'] = $new_instance['pid'];
    $instance['delay'] = $new_instance['delay'];
    $instance['ssheight'] = $new_instance['ssheight'];
    $instance['sssdisplaybul'] = $new_instance['sssdisplaybul'];
    $instance['sssdisplayarr'] = $new_instance['sssdisplayarr'];
    $instance['sssdisplaycap'] = $new_instance['sssdisplaycap'];
    $instance['sssbulpos'] = $new_instance['sssbulpos'];
    $instance['ssscappos'] = $new_instance['ssscappos'];
    $instance['sssexclude'] = $new_instance['sssexclude'];
    $instance['sssrandomize'] = $new_instance['sssrandomize'];
    return $instance;
  }
 
  function widget($args, $instance) {
    echo ssoutput($args, $instance);
  }
  
  function ssoutput ($args, $instance) {
    extract($args, EXTR_SKIP);    
    global $post;
 
    $sssout = $before_widget;
    
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $pid = empty($instance['pid']) ? ' ' : apply_filters('widget_pid', $instance['pid']);
    $delay = empty($instance['delay']) ? ' ' : apply_filters('widget_delay', $instance['delay']);
    $ssheight = empty($instance['ssheight']) ? ' ' : apply_filters('widget_ssheight', $instance['ssheight']);
    $sssdisplaybul = empty($instance['sssdisplaybul']) ? ' ' : apply_filters('widget_sssdisplaybul', $instance['sssdisplaybul']);
    $sssdisplayarr = empty($instance['sssdisplayarr']) ? ' ' : apply_filters('widget_sssdisplayarr', $instance['sssdisplayarr']);
    $sssrandomize = empty($instance['sssrandomize']) ? ' ' : apply_filters('widget_sssrandomize', $instance['sssrandomize']);
    $sssdisplaycap = empty($instance['sssdisplaycap']) ? ' ' : apply_filters('widget_sssdisplayarr', $instance['sssdisplaycap']);
    $sssbulpos = empty($instance['sssbulpos']) ? ' ' : apply_filters('widget_sssbulpos', $instance['sssbulpos']);
    $ssscappos = empty($instance['ssscappos']) ? ' ' : apply_filters('widget_ssscappos', $instance['ssscappos']);
    $sssexclude = empty($instance['sssexclude']) ? ' ' : apply_filters('widget_sssexclude', $instance['sssexclude']);
    $sssexclude = explode(",", $sssexclude);
    if ($sssbulpos == $ssscappos) { $sssbelow = 'sssbelow'; } else { $sssbelow = ''; }
    
    $ssswidgid = str_replace("-", "", $this->id);
     
    if (!empty($title))
      $sssout .= $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE   
    $photos = get_children( array('post_parent' => $pid, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
    if ($sssrandomize == 'yes') { shuffle($photos); }
    
    $results = array();
    
    if ($photos) {
      $ssswi = 0;
      foreach ($photos as $photo) {
        
        $photoid = $photo->ID;
        if (!in_array($photoid, $sssexclude)) {
        
          // get the correct image html for the selected size
          
          $photosrc =  wp_get_attachment_image_src($photo->ID, $size);
          $photoalt =  htmlspecialchars(get_post_meta($photo->ID, '_wp_attachment_image_alt', true));
          $phototitle = htmlspecialchars(get_the_title($photo->ID));
          $photolink =  htmlspecialchars(get_attachment_link($photo->ID, $size));
          $photocustlink =  htmlspecialchars(get_post_meta($photo->ID, '_ssscustomlink', true));
          $photocaption =  htmlspecialchars($photo->post_excerpt);
          $photodescr =  htmlspecialchars($photo->post_content);
          
          $ssscaption = '<span>'.$phototitle.'</span>';
          if ($photodescr <> '') { $ssscaption .= ' - '. $photodescr; }
          
          if ($ssswi == 0) {
            $actslide = '<img src="'. $photosrc[0] .'" alt="'. $photoalt .'" title="'. $phototitle .'" width="'. $photosrc[1] .'" height="'. $photosrc[2] .'" />';
            if ($photocustlink != '') {
              $slidedescr = '<a href="'. $photocustlink .'" title="'. $phototitle .'" >'. $ssscaption .'</a>';
            } else {
              $slidedescr = $ssscaption ;
            }
          }
          
          if ($ssswi > 0) {
            $restslides .= '<a href="'. $photosrc[0] .'" title="'. $phototitle .'">'.$phototitle .' - '. $photodescr .'</a>';
            $restslides .= '<span class="ssoptions">'. $photosrc[1] .'|'. $photosrc[2] .'|'.$phototitle .'|'. $photodescr .'|'. $photocustlink.'</span>';
          }

          $ssswi++;
        }
      }
    }
    $sssout .= '
    <div class="'. $ssswidgid .' ssslideshow ssswcustom">
      '. $actslide;
      if ($sssdisplayarr != 'no') {
        $sssout .= '
          <div class="sss-arrow-left sssarrow"></div>
          <div class="sss-arrow-right sssarrow"></div>
        ';
      }
      if ($sssdisplaybul != 'no') {
        $sssout .= '
          <div class="'. $ssswidgid .' slidedots '. $sssbulpos .' '. $sssbelow .'"></div>
        ';
      }
      if ($sssdisplaycap != 'no') {
        $sssout .= '
          <div class="'. $ssswidgid .' slidedescr '. $ssscappos .'">'. $slidedescr .'</div>
        ';
      }
      $sssout .= '
      <div class="'. $ssswidgid .' restslides">
      '. $restslides .'
      </div>
      <div class="sssdelay">'. $delay * 1000 .'</div>
      <div class="sssheight">'. $ssheight .'</div>
    </div>
    
    ';
    $sssout .= $after_widget;
    
    return ($sssout);
  }
  
 
} // end of class


  function ssoutput ($args, $instance) {
    if (!empty($args)) { extract($args, EXTR_SKIP); }
    global $post;
    
    // shortcode vars and default START
    extract(shortcode_atts(array(
		'sctitle' => '',
		'scpid' => $post->ID,
		'scdelay' => 5,
		'scheight' => 100,
		'scdisplaybul' => 'yes',
		'scdisplayarr' => 'yes',
		'scrandomize' => 'no',
		'scdisplaycap' => 'yes',
		'scbulpos' => 'bottom-right',
		'sccappos' => 'bottom-left',
		'scexclude' => ''
    ), $args));
    
    // shortcode vars and default END
    
 
    $sssout = $before_widget;
    
    $title = empty($instance['title']) ? $sctitle : apply_filters('widget_title', $instance['title']);
    $pid = empty($instance['pid']) ? $scpid : apply_filters('widget_pid', $instance['pid']);
    $delay = empty($instance['delay']) ? $scdelay : apply_filters('widget_delay', $instance['delay']);
    $ssheight = empty($instance['ssheight']) ? $scheight : apply_filters('widget_ssheight', $instance['ssheight']);
    $sssdisplaybul = empty($instance['sssdisplaybul']) ? $scdisplaybul : apply_filters('widget_sssdisplaybul', $instance['sssdisplaybul']);
    $sssdisplayarr = empty($instance['sssdisplayarr']) ? $scdisplayarr : apply_filters('widget_sssdisplayarr', $instance['sssdisplayarr']);
    $sssrandomize = empty($instance['sssrandomize']) ? $scrandomize : apply_filters('widget_sssrandomize', $instance['sssrandomize']);
    $sssdisplaycap = empty($instance['sssdisplaycap']) ? $scdisplaycap : apply_filters('widget_sssdisplaycap', $instance['sssdisplaycap']);
    $sssbulpos = empty($instance['sssbulpos']) ? $scbulpos : apply_filters('widget_sssbulpos', $instance['sssbulpos']);
    $ssscappos = empty($instance['ssscappos']) ? $sccappos : apply_filters('widget_ssscappos', $instance['ssscappos']);
    $sssexclude = empty($instance['sssexclude']) ? $scexclude : apply_filters('widget_ssscappos', $instance['sssexclude']);
    $sssexclude = explode(",", $sssexclude);
    
    if ($sssbulpos == $ssscappos) { $sssbelow = 'sssbelow'; } else { $sssbelow = ''; }
    
    $ssswidgid = str_replace("-", "", $widget_id);
     
    if (!empty($title))
      $sssout .= $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE   
    $photos = get_children( array('post_parent' => $pid, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
    if ($sssrandomize == 'yes') { shuffle($photos); }
    
    $results = array();
    
    if ($photos) {
      $ssswi = 0;
      foreach ($photos as $photo) {
        
        $photoid = $photo->ID;
        if (!in_array($photoid, $sssexclude)) {
        
          // get the correct image html for the selected size
        
          $photosrc =  wp_get_attachment_image_src($photo->ID, $size);
          $photoalt =  htmlspecialchars(get_post_meta($photo->ID, '_wp_attachment_image_alt', true));
          $phototitle = htmlspecialchars(get_the_title($photo->ID));
          $photolink =  htmlspecialchars(get_attachment_link($photo->ID, $size));
          $photocustlink =  htmlspecialchars(get_post_meta($photo->ID, '_ssscustomlink', true));
          $photocaption =  htmlspecialchars($photo->post_excerpt);
          $photodescr =  htmlspecialchars($photo->post_content);
          
          $ssscaption = '<span>'.$phototitle.'</span>';
          if ($photodescr <> '') { $ssscaption .= ' - '. $photodescr; }
          
          if ($ssswi == 0) {
            $actslide = '<img src="'. $photosrc[0] .'" alt="'. $photoalt .'" title="'. $phototitle .'" width="'. $photosrc[1] .'" height="'. $photosrc[2] .'" />';
            if ($photocustlink != '') {
              $slidedescr = '<a href="'. $photocustlink .'" title="'. $phototitle .'" >'. $ssscaption .'</a>';
            } else {
              $slidedescr = $ssscaption ;
            }
          }
          
          if ($ssswi > 0) {
            $restslides .= '<a href="'. $photosrc[0] .'" title="'. $phototitle .'">'.$phototitle .' - '. $photodescr .'</a>';
            $restslides .= '<span class="ssoptions">'. $photosrc[1] .'|'. $photosrc[2] .'|'.$phototitle .'|'. $photodescr .'|'. $photocustlink.'</span>';
          }

          $ssswi++;
        }
      }
    }
    $sssout .= '
    <div class="'. $ssswidgid .' ssslideshow ssswcustom">
      '. $actslide;
      if ($sssdisplayarr != 'no') {
      $sssout .= '
        <div class="sss-arrow-left sssarrow"></div>
        <div class="sss-arrow-right sssarrow"></div>
        ';
      }
      if ($sssdisplaybul != 'no') {
      $sssout .= '
        <div class="'. $ssswidgid .' slidedots '. $sssbulpos .' '. $sssbelow .'"></div>
        ';
      }
      if ($sssdisplaycap != 'no') {
      $sssout .= '
        <div class="'. $ssswidgid .' slidedescr '. $ssscappos .'">'. $slidedescr .'</div>
        ';
      }
      $sssout .= '
      <div class="'. $ssswidgid .' restslides">
      '. $restslides .'
      </div>
      <div class="sssdelay">'. $delay * 1000 .'</div>
      <div class="sssheight">'. $ssheight .'</div>
    </div>
    
    ';
    $sssout .= $after_widget;
    
    return ($sssout);
  }
  
  add_shortcode('simpleslideshow', 'ssoutput'); 
  
  
  /*** fork tinyMCE START ***/
  
  function add_ssbutton() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') ) {
     add_filter('mce_external_plugins', 'add_ssplugin');
     add_filter('mce_buttons', 'register_ssbutton');
   }
  }
  
  function register_ssbutton($buttons) {
     array_push($buttons, "|", "ssslide");
     return $buttons;
  }
  function add_ssplugin($plugin_array) {  
   $plugin_array['ssslide'] = WP_PLUGIN_URL .'/simple-seo-slideshow/js/simpleslideshowmce.js';  
   return $plugin_array;  
  }
  add_action('init', 'add_ssbutton');
  
  function my_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

add_filter( 'tiny_mce_version', 'my_refresh_mce');
  
  /*** fork tinyMCE END ***/
  

/**** ADD CUSTOM LINK START ****/


function sss_image_attachment_fields_to_edit($form_fields, $post) {

	$form_fields["ssscustomlink"] = array(
		"label" => __("Custom Link"),
		"input" => "text", // this is default if "input" is omitted
		"value" => get_post_meta($post->ID, "_ssscustomlink", true),
    "helps" => "Fill this only if you want the slideshow image caption to link to a page"
	);	
	return $form_fields;
}
// attach our function to the correct hook
add_filter("attachment_fields_to_edit", "sss_image_attachment_fields_to_edit", null, 2);

/**
 * @param array $post
 * @param array $attachment
 * @return array
 */
function sss_image_attachment_fields_to_save($post, $attachment) {
	if( isset($attachment['ssscustomlink']) ){
		update_post_meta($post['ID'], '_ssscustomlink', $attachment['ssscustomlink']);
	}
  
	return $post;
}
add_filter("attachment_fields_to_save", "sss_image_attachment_fields_to_save", null, 2);


/**** ADD CUSTOM LINK END ****/

add_action( 'widgets_init', create_function('', 'return register_widget("simpleSEOSlideshowWidget");') );
wp_enqueue_script('simpleslideshowjs', WP_PLUGIN_URL .'/simple-seo-slideshow/simpleslideshow.js', array('jquery'), '1.0.0', false);
wp_enqueue_style('simpleslideshowcss', WP_PLUGIN_URL .'/simple-seo-slideshow/simpleslideshow.css', array(), false, 'all');
?>