<?php
	get_header();
	
	echo '<header>';
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part('bs-image', 'featured');
		}
	}
	echo '<h1>'. get_bloginfo('name') .'</h1>';
	echo '</header>';
	
	/* Widget Row */
	echo '<div id="bs-front-page-widget-row">';
	dynamic_sidebar('bs-front-page-sidebar');
	echo '</div>';
	
	get_footer();
