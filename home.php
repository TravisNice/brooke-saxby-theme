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
	echo '<div id="bs-home-grid">';
  
	/* Headline Row */
 	include('inc/bs-headline-row.php'); 
	/* Content Row */
	if (is_active_sidebar('bs-sidebar-widgets')) {
		echo '<div id="bs-home-content-with-sidebar">';
  	}
	else {
		echo '<div id="bs-home-content-without-sidebar">';
	}

	if (have_posts())
	{
		while (have_posts())
		{
			the_post();
			echo '<h2 class="bs-home-content-title"><a href="'. get_the_permalink() .'" rel="bookmark" title="Permanent Link to '. get_the_title() .'">';
      			the_title();
      			echo '</a></h2>';
			the_excerpt();
			echo '<hr />';
		}
    
		echo '<div id="bs-home-pagination">'. $pagination .'</div>';
    
		echo '</div> <!-- end content -->';
	}

	include('inc/bs-divider-row.php');
	get_footer();
?>
