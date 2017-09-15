<?php
	get_header();
	echo '<div id="bs-single-page-grid">';

	/* Headline Row */
	include('inc/bs-headline-row.php');

	/* Content Row */
	include('inc/bs-content-row.php');

	/* Divider Row */
	echo '<div id="bs-single-page-divider"><hr /></div> <!-- end divider -->';
    
	get_sidebar();
	get_footer();
?>
