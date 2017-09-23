<?php
    /*
     * Template Name: Right Sidebar
     * Template Post Type: post, page, event
     */
    
	get_header();

	/* Headline Row */
    get_template_part('bs-header');

	/* Content Row */
	get_template_part('bs-content');
    
    /* Sidebar Widgets */
	get_sidebar();
    
	get_footer();
?>
