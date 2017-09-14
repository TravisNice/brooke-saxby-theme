<?php
    /* Left Side Footer */
    echo '<div id="bs-left-footer">';
    if (is_active_sidebar('bs-footer-left-widgets'))
    {
        dynamic_sidebar('bs-footer-left-widgets');
    }
    echo '</div> <!-- end left footer -->';
    
    /* Center Footer */
    echo '<div id="bs-center-footer">';
    if (is_active_sidebar('bs-footer-center-widgets'))
    {
        dynamic_sidebar('bs-footer-center-widgets');
    }
    echo '</div> <!-- end center footer -->';
    
    /* Right Footer */
    echo '<div id="bs-right-footer">';
    if (is_active_sidebar('bs-footer-right-widgets'))
    {
        dynamic_sidebar('bs-footer-right-widgets');
    }
    echo '</div> <!-- end right footer -->';
    
    echo '</div> <!-- end grid -->';
	echo '<span id="bs-made-by-everyday-publishing">Website by <a href="https://www.everydaypublishing.com.au" rel="publisher">Everyday Publishing</a></span>';
    
    wp_footer();
?>
