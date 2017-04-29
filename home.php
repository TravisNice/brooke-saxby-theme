<?php
	get_header();

	if (have_posts()) {
		
		while ( have_posts() ) {
			
			the_post();
			
			if( has_post_thumbnail() ) {
				
				get_template_part( 'template-parts/excerpt', 'thumb' );
				
			}
			
			else {
				
				get_template_part( 'template-parts/excerpt', 'nothumb' );
				
			}
			
			get_template_part( 'template-parts/excerpt', 'rule' );
			
		}

	}

	get_template_part( 'template-parts/post', 'navigation' );

	get_footer();
	
?>
