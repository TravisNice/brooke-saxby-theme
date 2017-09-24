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

	/* Headline Row */
  get_template_part('bs-header');

	/* Content Row */
  echo '<main>';
  get_template_part('bs-excerpt');

	/* Pagination */
  echo '<div id="bs-home-pagination">'. $pagination .'</div>';
  echo '</main>';

  get_footer();
  ?>
