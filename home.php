<?php
  
  global $wp_query;
  $big = 999999999;
  
  $args = array(
    'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'             => '/page/%#%',
    'total'              => $wp_query->max_num_pages,
    'current'            => max( 1, get_query_var( 'paged' ) ),
    'show_all'           => false,
    'end_size'           => 1,
    'mid_size'           => 2,
    'prev_next'          => true,
    'prev_text'          => __('« Previous'),
    'next_text'          => __('Next »'),
    'type'               => 'plain',
    'add_args'           => false,
    'add_fragment'       => '',
    'before_page_number' => '',
    'after_page_number'  => ''
  );
  
  $pagination = paginate_links( $args );
  
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
  echo '<div class="bs-content bs-container">';
  
	if (have_posts())
	{
		while (have_posts())
		{
			the_post();
      
      echo '<div class="bs-container">';
      echo '<h2 class="bs-content-title">';
      echo '<a class="bs-color-0" href="'. get_the_permalink() .'" rel="bookmark" title="Permanent Link to '. get_the_title() .'">';
      the_title();
      echo '</a>';
      echo '</h2>';
      the_excerpt();
      echo '</div>';
    }
    
    echo '<div class="bs-container bs-text-centre" style="width: 100%;">';
    echo $pagination;
    echo '</div>';
    
    echo '</div> <!-- end content -->';
	}

	get_footer();
?>
