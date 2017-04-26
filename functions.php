<?php
	defined ( 'ABSPATH' ) or die ( 'Get out of my plugin dammit!' );
	
	if ( !defined ( 'BROOKE_SAXBY_THEME_PATH' ) ) {
		
		define ( 'BROOKE_SAXBY_THEME_PATH', dirname ( __FILE__ ) );
		
	}
	
	function simplicity_setup() {
		
		register_nav_menu(
				  'header-menu',
				  __( 'Header Menu' )
				  );
		
		add_theme_support(
				  'post-thumbnails'
				  );
		
		add_theme_support(
				  'html5',
				  array( 'search-form' )
				  );
		
		add_theme_support(
				  'automatic-feed-links'
				  );
		
		add_theme_support(
				  'post-formats',
				  array (
					 'aside',
					 'gallery',
					 'quote',
					 'image',
					 'video'
					 )
				  );
		
	}
	
	add_action(
		   'after_setup_theme',
		   'simplicity_setup'
		   );
	
	function add_theme_scripts() {
		
		wp_enqueue_style(
				 'GoogleFonts',
				 '//fonts.googleapis.com/css?family=Dancing+Script|Raleway'
				 );
		
		wp_enqueue_style(
				 'simplicity',
				 get_stylesheet_uri()
				 );
		
	}
	
	add_action(
		   'wp_enqueue_scripts',
		   'add_theme_scripts'
		   );
	
	function side_nav_widgets_init() {
		
		register_sidebar(
				 array(
				       'name' => 'Navigation Popout Widgets',
				       'id'            => 'side-nav-widgets',
				       'before_widget' => '<div class="no-underline bottom-16 widget-container">',
				       'after_widget'  => '</div></div>',
				       'before_title'  => '<h2 class="widget-title rounded large white-front light-pink-back col span-12 span-12mf span-12lf left pad-5">',
				       'after_title'   => '</h2><div class="widget-content pad-12">'
				       )
				 );
		
	}
	
	add_action(
		   'widgets_init',
		   'side_nav_widgets_init'
		   );
	
	function front_page_widgets_init() {
		
		register_sidebar(
				 array(
				       'name' => 'Front Page Widgets',
				       'id'            => 'front-page-widgets',
				       'before_widget' => '<div class="no-underline bottom-16 widget-container">',
				       'after_widget'  => '</div></div>',
				       'before_title'  => '<h2 class="widget-title rounded large white-front light-pink-back col span-12 span-12mf span-12lf left pad-5">',
				       'after_title'   => '</h2><div class="widget-content pad-12">'
				       )
				 );
		
	}
	
	add_action(
		   'widgets_init',
		   'front_page_widgets_init'
		   );
	
	function resize_thumb() {
		
		add_theme_support(
				  'post-thumbnails'
				  );
		
		add_image_size(
			       'wide-thumbnail',
			       '300',
			       '168',
			       true
		);
		
	}
	add_action(
		   'after_setup_theme',
		   'resize_thumb'
		   );
	
	function theme_slug_setup() {
		
		add_theme_support(
				  'title-tag'
				  );
		
	}
	
	add_action(
		   'after_setup_theme',
		   'theme_slug_setup'
		   );
	
	/* Woocommerce - Add theme support explicitly */
	function woocommerce_support() {
		
		add_theme_support(
				  'woocommerce'
				  );
		
	}
	
	add_action(
		   'after_setup_theme',
		   'woocommerce_support'
		   );
	
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		
		global $woocommerce;
		
		ob_start(); ?>
<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php $fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
	
	}
	
	add_filter(
		   'add_to_cart_fragments',
		   'woocommerce_header_add_to_cart_fragment'
	);
	
	require( 'classes/brooke-saxby-widgets.php' );
	
	add_action(
		   'widgets_init',
		   function() {
			register_widget(
					'brookeSaxbyRecentPostsWidget'
			);
		   }
	);
	
?>
