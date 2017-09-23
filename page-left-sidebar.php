<?php
    /*
     * Template Name: Left Sidebar
     * Template Post Type: post, page, event
     */
    
	get_header();

	/* Headline Row */
    get_template_part('bs-header');
    
    /* Sidebar Widgets */
    get_sidebar();

	/* Content Row */
	get_template_part('bs-content');
    
	get_footer();
?>
