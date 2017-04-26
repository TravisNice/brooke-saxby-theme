<?php
	get_header();

	if (have_posts()) {

		$postCount = 0;
				
		while ( have_posts() ) {
			
			the_post();
			
			if( has_post_thumbnail() ) {
				
				get_template_part( 'template-parts/excerpt', 'thumb' );
				
			}
			
			else {
				
				get_template_part( 'template-parts/excerpt', 'nothumb' );
				
			}
			
			if ( $postCount < count( $post ) ) {
				
				get_template_part( 'template-parts/excerpt', 'rule' );
				
			}
						
			$postCount++;
			
		}

	}

	get_template_part( 'template-parts/post', 'navigation' );

	get_footer();
	
?>
