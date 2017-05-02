/*
 * Template Name: Blog
 */

<?php
	get_header();

	if (have_posts()) {
		
		echo '<div class="content-container">';

		while ( have_posts() ) {

			the_post();

			if( has_post_thumbnail() ) {

				get_template_part( 'template-parts/excerpt', 'thumb' );

			}
			
			else {
				
				get_template_part( 'template-parts', 'nothumb' );
				
			}

		}
		
		
		
		get_template_part( 'template-parts/single', 'navigation' );
		
		comments_template();
		
		echo '</div>';

	}

	get_footer();

?>
