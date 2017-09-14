<?php
	get_header();
	
	if ('posts' == get_option('show_on_front')) {
		include( get_home_template() );
	}
	else {
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				echo '<div id="bs-front-page-grid">';
				if (has_post_thumbnail()) {
					/* Featured Image */
					$post_thumbnail_id = get_post_thumbnail_id();
					$img_src = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
					$img_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'full' );
              
					echo '<div id="bs-front-page-featured-image">';
					echo '<img src="' . $img_src . '" srcset="' . $img_srcset . '">';
					echo '</div> <!-- end featured image -->';
				}
            
				/* Headline Row */
				echo '<div id="bs-front-page-headline">';
				echo '<a href="'. site_url() .'">';
				echo '<h1>';
				bloginfo('name');
				echo '</h1>';
				echo '</a>';
				echo '</div> <!-- end header -->';
            
            			/* Sidebar Row */
				if (is_active_sidebar('bs-front-page-sidebar')) {
					echo '<div id="bs-front-page-sidebar">';
					dynamic_sidebar('bs-front-page-sidebar');
					echo '</div> <!-- end sidebar row -->';
				}
			}
		}
	}
  
	/* Divider Row */
	echo '<div id="bs-front-page-divider"><hr /></div> <!-- end divider -->';
    
	get_footer();
?>
