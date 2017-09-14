<?php
	defined ( 'ABSPATH' ) or die ( 'Shame on you for snooping around!' );
	
	if (!defined('BROOKE_SAXBY_THEME_PATH')) define('BROOKE_SAXBY_THEME_PATH', dirname(__FILE__));
  
  /*  Menu Setup */
  function bs_menu_setup()
  {
    $location = 'footer-menu';
    $description = 'Footer Menu';
    register_nav_menu( $location, $description );
  }
  
  $tag = 'after_setup_theme';
  $function_to_add = 'bs_menu_setup';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  /* Theme Support Setup */
  function bs_theme_support_setup()
  {
    $feature = 'post-thumbnails';
    add_theme_support($feature);
    
    $feature = 'html5';
    add_theme_support($feature);
  }
  
  $tag = 'after_setup_theme';
  $function_to_add = 'bs_theme_support_setup';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  /* Enqueue Scripts and Style Sheets */
  function stylesheet_script_setup()
  {
    $handle = 'global-style-sheet';
    $src = get_stylesheet_uri();
    $deps = array();
    $ver = false;
    $media = 'all';
    wp_enqueue_style($handle, $src, $deps, $ver, $media);
  }
  
  $tag = 'wp_enqueue_scripts';
  $function_to_add = 'stylesheet_script_setup';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  /* Responsive Image Thumbnails */
  function bs_thumbnail_setup()
  {
    $feature = 'post-thumbnails';
    add_theme_support($feature);
    
    $name = 'bs_1_column';
    $width = 320;
    $height = 180;
    $crop = true;
    add_image_size($name, $width, $height, $crop);
    
    $name = 'bs_2_column';
    $width = 640;
    $height = 360;
    $crop = true;
    add_image_size($name, $width, $height, $crop);
    
    $name = 'bs_3_column';
    $width = 960;
    $height = 540;
    $crop = true;
    add_image_size($name, $width, $height, $crop);
  }
  
  $tag = 'after_setup_theme';
  $function_to_add = 'bs_thumbnail_setup';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  /* Reading */
  function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a href="%1$s" class="bs-color-0"><em>%2$s</em></a>',
                   esc_url( get_permalink( get_the_ID() ) ),
                   __( ' ... Continue Reading')
                   );
  }
  add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
	
	/* Woocommerce - Add theme support explicitly */
  function bs_woocommerce_setup()
  {
    $feature = 'woocommerce';
    add_theme_support($feature);
  }
  
  $tag = 'after_setup_theme';
  $function_to_add = 'bs_woocommerce_setup';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  function bs_show_cart_contents()
  {
    global $woocommerce;
    ob_start();
    echo '<a class="bs-cart-contents" href="' . $woocommerce->cart->get_cart_url() . '" title="' . _e('View your shopping cart', 'woothemes') . '">';
    echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count) . ' - ' . $woocommerce->cart->get_cart_total();
    echo '</a>';
    $fragments['a.bs-cart-contents'] = ob_get_clean();
    return $fragments;
  }
	
  $tag = 'woocommerce_add_to_cart_fragments';
  $function_to_add = 'bs_show_cart_contents';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  /* Define our own widgets */
  class bsFrontPageButtonWidget extends WP_Widget
  {
    public function __construct()
    {
      $id_base = 'bs_front_page_button_widget';
      $name = 'BS: Front Page Button';
      
      $class_name = 'bsFrontPageButtonWidget';
      $description = __('Brooke Saxby\'s Buttons as a replacement for the menu on the front page.');
      $widget_options = array('classname' => $class_name, 'description' => $description);
      
      $control_options = array();
      
      parent::__construct($id_base, $name, $widget_options, $control_options);
    }
    
    public function widget($args, $instance)
    {
      $widget_title = apply_filters('widget_title', $instance['title']);
      $widget_page = get_permalink($instance['bs_page_id']);
      
      echo $args['before_widget'];
      
      if (!empty($widget_title))
      {
        echo $args['before_title'] . '<a href="' . $widget_page . '">' . $widget_title . '</a>' . $args['after_title'];
      }
      
      echo $args['after_widget'];
    }
    
    public function form($instance)
    {
      $title = esc_html('New Title', 'text_domain');
      $page_id = 2;
      
      if (!empty($instance['title']))
      {
        $title = $instance['title'];
      }
      
      if (!empty($instance['bs_page_id']))
      {
        $page_id = $instance['bs_page_id'];
      }
      
      echo '<p>';
      echo '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">' . esc_attr_e( 'Title:', 'text_domain' ) . '</label>';
      echo '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" type="text" value="' . esc_attr( $title ) . '">';
      echo '</p>';
      
      $args = array('depth' => 0, 'child_of' => 0, 'selected' => $page_id, 'echo' => 1, 'name' => esc_attr( $this->get_field_name( 'bs_page_id' ) ), 'id' => esc_attr( $this->get_field_id( 'bs_page_id' ) ), 'class' => 'widefat', 'show_option_none' => null, 'show_option_no_change' => null, 'option_none_value' => null);
      
      echo '<p>';
      echo '<label for="' . esc_attr( $this->get_field_id( 'bs_page_id' ) ) . '">' . esc_attr_e( 'Page: ', 'text_domain' ) . '</label>';
      wp_dropdown_pages($args);
      echo '</p>';
    }
    
    public function update($new_instance, $old_instance)
    {
      $instance = array();
      
      if (!empty($new_instance['title']))
      {
        $instance['title'] = strip_tags($new_instance['title']);
      }
      else
      {
        $instance['title'] = '';
      }
      
      $instance['bs_page_id'] = $new_instance['bs_page_id'];
      
      return $instance;
    }
  }
  
  function bs_front_page_button_widget_registration()
  {
    register_widget('bsFrontPageButtonWidget');
  }
  
  $tag = 'widgets_init';
  $function_to_add = 'bs_front_page_button_widget_registration';
  $priority = 10;
  $accepted_args = 0;
  add_action($tag, $function_to_add, $priority, $accepted_args);
  
  class bsCopyrightWidget extends WP_Widget {
    public function __construct() {
      $id_base = 'bs_copyright_widget';
      $name = 'BS: Copyright';
      
      $class_name = 'bsCopyrightWidget';
      $description = __('Brooke Saxby\'s copyright notice.');
      $widget_options = array('classname' => $class_name, 'description' => $description);
      
      $control_options = array();
      
      parent::__construct($id_base, $name, $widget_options, $control_options);
    }
    
    public function widget( $args, $instance )
    {
      extract( $args );
      $title = apply_filters( 'widget_title', $instance['title'] );
      echo $before_widget;
      if ( !empty( $title ) )
      {
        echo $before_title . $title . $after_title;
      }
      echo "<p>Copyright &copy; " . date('Y') . " Brooke Saxby. All Rights Reserved.</p>";
      echo $after_widget;
    }
    
    public function form( $instance )
    {
      if ( isset( $instance[ 'title' ] ) )
      {
        $title = $instance[ 'title' ];
      }
      else
      {
        $title = __( 'New title', 'text_domain' );
      }
      echo "<p>Copyright &copy; " . date('Y') . " Brooke Saxby. All Rights Reserved.</p>";
    }
    
    public function update( $new_instance, $old_instance )
    {
      $instance = array();
      $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      return $instance;
    }
  }
  
  function bs_copyright_widget_registration()
  {
    register_widget('bsCopyrightWidget');
  }
  
  $tag = 'widgets_init';
  $function_to_add = 'bs_copyright_widget_registration';
  $priority = 10;
  $accepted_args = 0;
  add_action($tag, $function_to_add, $priority, $accepted_args);

  /* Register Widget Areas */
  function bs_front_page_sidebar_registration()
  {
    $name = 'Front Page Widgets';
    $id = 'bs-front-page-sidebar';
    $description = 'Area on the front page for the button styled widgets.';
    $class = '';
    $before_widget = '<div class="bs-front-page-widget">';
    $after_widget = '</div>';
    $before_title = '';
    $after_title = '';
    $args = array('name' => $name, 'id' => $id, 'description' => $description, 'class' => $class, 'before_widget' => $before_widget, 'after_widget' => $after_widget, 'before_title' => $before_title, 'after_title' => $after_title);
    register_sidebar($args);
  }
  
  $tag = 'widgets_init';
  $function_to_add = 'bs_front_page_sidebar_registration';
  $priority = 10;
  $accepted_args = 0;
  add_action($tag, $function_to_add, $priority, $accepted_args);
  
  function bs_sidebar_widget_registration()
  {
    $name = 'Sidebar Widgets';
    $id = 'bs-sidebar-widgets';
    $description = 'Area on the post/page for the Facebook and Recent Posts.';
    $class = '';
    $before_widget = '<span class="bs-sidebar-widget">';
    $after_widget = '</span>';
    $before_title = '<h3>';
    $after_title = '</h3>';
    $args = array('name' => $name, 'id' => $id, 'description' => $description, 'class' => $class, 'before_widget' => $before_widget, 'after_widget' => $after_widget, 'before_title' => $before_title, 'after_title' => $after_title);
    register_sidebar($args);
  }
  
  $tag = 'widgets_init';
  $function_to_add = 'bs_sidebar_widget_registration';
  $priority = 10;
  $accepted_args = 0;
  add_action($tag, $function_to_add, $priority, $accepted_args);
  
  function bs_left_footer_widget_registration()
  {
    $name = 'Footer (Left) Widgets';
    $id = 'bs-footer-left-widgets';
    $description = 'Area on all pages for the left footer column.';
    $class = '';
    $before_widget = '<span class="bs-left-footer-widget">';
    $after_widget = '</span>';
    $before_title = '<h3>';
    $after_title = '</h3>';
    $args = array('name' => $name, 'id' => $id, 'description' => $description, 'class' => $class, 'before_widget' => $before_widget, 'after_widget' => $after_widget, 'before_title' => $before_title, 'after_title' => $after_title);
    register_sidebar($args);
  }
  
  $tag = 'widgets_init';
  $function_to_add = 'bs_left_footer_widget_registration';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  function bs_center_footer_widget_registration()
  {
    $name = 'Footer (Center) Widgets';
    $id = 'bs-footer-center-widgets';
    $description = 'Area on all pages for the center footer column.';
    $class = '';
    $before_widget = '<span class="bs-center-footer-widget">';
    $after_widget = '</span>';
    $before_title = '<h3>';
    $after_title = '</h3>';
    $args = array('name' => $name, 'id' => $id, 'description' => $description, 'class' => $class, 'before_widget' => $before_widget, 'after_widget' => $after_widget, 'before_title' => $before_title, 'after_title' => $after_title);
    register_sidebar($args);
  }
  
  $tag = 'widgets_init';
  $function_to_add = 'bs_center_footer_widget_registration';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  
  function bs_right_footer_widget_registration()
  {
    $name = 'Footer (Right) Widgets';
    $id = 'bs-footer-right-widgets';
    $description = 'Area on all pages for the center footer column.';
    $class = '';
    $before_widget = '<span class="bs-right-footer-widget">';
    $after_widget = '</span>';
    $before_title = '<h3>';
    $after_title = '</h3>';
    $args = array('name' => $name, 'id' => $id, 'description' => $description, 'class' => $class, 'before_widget' => $before_widget, 'after_widget' => $after_widget, 'before_title' => $before_title, 'after_title' => $after_title);
    register_sidebar($args);
  }
  
  $tag = 'widgets_init';
  $function_to_add = 'bs_right_footer_widget_registration';
  $priority = 10;
  $accepted_args = 0;
  add_action( $tag, $function_to_add, $priority, $accepted_args );
?>
