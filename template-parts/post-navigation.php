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
?>

<div class="col span-12 align-center fuscia-front no-underline left bottom-16">
			<?php echo $pagination; ?>
</div>
