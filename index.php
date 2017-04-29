<?php
	get_header();

	if (have_posts()) {
		
		echo '<div class="content-container">';

		while ( have_posts() ) {

			the_post();

			if( has_post_thumbnail() ) {

				get_template_part( 'template-parts/content', 'thumb' );
				
			}
			
			else {
				
				get_template_part( 'template-parts/content', 'nothumb' );
				
			}
			
		}
		
		get_template_part( 'template-parts/post', 'navigation' );
		
		comments_template();
		
		echo '</div>';

	}

	get_template_part ( 'template-parts/post', 'navigation' );

	get_footer();

?>
