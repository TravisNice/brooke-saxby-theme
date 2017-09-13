<?php
  
  get_header();
  echo '<div class="bs-grid">';

  /* Headline Row */
  echo '<div class="bs-header bs-large-container">';
  echo '<a href="'. site_url() .'">';
  echo '<h1 class="bs-text-centre bs-color-0">';
  bloginfo('name');
  echo '</h1>';
  echo '</a>';
  echo '</div> <!-- end header -->';

  /* Content Row */
  if (is_active_sidebar('bs-sidebar-widgets'))
  {
    echo '<div class="bs-content-thin">';
  }
  else
  {
    echo '<div class="bs-content">';
  }

  if (have_posts())
  {
    while (have_posts())
    {
      the_post();
          
      echo '<div class="bs-container">';
      echo '<h2 class="bs-content-title">'. get_the_title() .'</h2>';
      
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
      
      the_content();
      echo '</div>';
      
      comments_template();
    }
      
    echo '</div> <!-- end content -->';
    
    if (is_active_sidebar('bs-sidebar-widgets'))
    {
      echo '<div class="bs-sidebar bs-container bs-color-2">';
      dynamic_sidebar('bs-sidebar-widgets');
      echo '</div>';
    }
    
  }

  get_footer();
?>
