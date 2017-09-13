<?php

  get_header();
	
	if ( 'posts' == get_option( 'show_on_front' ) )
  {
		include( get_home_template() );
	}
  else
  {
    if (have_posts())
    {
      while (have_posts())
      {
        the_post();
        echo '<div class="bs-grid">';
        if (has_post_thumbnail())
        {
          /* Featured Image */
          $post_thumbnail_id = get_post_thumbnail_id();
          $img_src = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
          $img_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'full' );
          
          echo '<div class="bs-featured-image">';
          echo '<img src="' . $img_src . '" srcset="' . $img_srcset . '" style="width: 100%;" />';
          echo '</div> <!-- end featured image -->';
        }
        
        /* Headline Row */
        echo '<div class="bs-header bs-large-container">';
        echo '<a href="'. site_url() .'">';
        echo '<h1 class="bs-text-centre bs-color-6 bs-text-shadow">';
        bloginfo('name');
        echo '</h1>';
        echo '</a>';
        echo '</div> <!-- end header -->';
        
        /* Content Row */
        if (!empty(the_content()))
        {
          echo '<div class="bs-content bs-container">';
          the_content();
          echo '</div> <!-- end content -->';
        }
        
        /* Sidebar Row */
        if (is_active_sidebar('bs-front-page-sidebar'))
        {
          echo '<div class="bs-front-page-sidebar">';
          dynamic_sidebar('bs-front-page-sidebar');
          echo '</div> <!-- end sidebar row -->';
        }
      }
    }
  }
  
  get_footer();
?>
