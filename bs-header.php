<?php
	/*echo '<div id="bs-single-page-headline-image"><img src="'. esc_url(get_header_image()) .' "></div>';
	echo '<div id="bs-headline"><a href="'. site_url() .'"><h1>'. get_bloginfo('name') .'</h1></a></div> <!-- end header -->';
     */
    echo '<header>';
    echo get_header_image_tag();
    echo '<h1><a href="'. site_url() .'">'. get_bloginfo('name') .'</a></h1>';
    echo '</header>';
?>
