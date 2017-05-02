<?php
	
/*
 * @package WordPress
 * @subpackage simplicity
 * @since Simplicity 1.0
 */
	
	if ( post_password_required() ) return;

	get_template_part( 'template-parts/comment', 'area' );


