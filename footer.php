<?php
    /* Divider Row */
    echo '<hr id="bs-divider" />';
    
    echo '<footer>';
    /* Left Side Footer */
    echo '<div id="bs-footer-left">';
    if (is_active_sidebar('bs-footer-left-widgets'))
    {
        dynamic_sidebar('bs-footer-left-widgets');
    }
    echo '</div> <!-- end left footer -->';
    
    /* Center Footer */
    echo '<div id="bs-footer-center">';
    if (is_active_sidebar('bs-footer-center-widgets'))
    {
        dynamic_sidebar('bs-footer-center-widgets');
    }
    echo '</div> <!-- end center footer -->';
    
    /* Right Footer */
    echo '<div id="bs-footer-right">';
    if (is_active_sidebar('bs-footer-right-widgets'))
    {
        dynamic_sidebar('bs-footer-right-widgets');
    }
    echo '</div> <!-- end right footer -->';
    
	echo '<span id="bs-copyright">Copyright &copy; '. date('Y') .' Brooke Saxby. All Rights Reserved.<br/>Website by <a href="https://www.everydaypublishing.com.au" rel="publisher">Everyday Publishing</a></span>';
	
	echo '</footer>';
    
    wp_footer();
?>
