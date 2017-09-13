<?php
    /* Divider Row */
    echo '<div class="bs-divider bs-color-2">';
    echo '<hr class="bs-hr" />';
    echo '</div> <!-- end divider -->';
    
    /* Left Side Footer */
    echo '<div class="bs-footer-left bs-container bs-color-2">';
    if (is_active_sidebar('bs-footer-left-widgets'))
    {
        dynamic_sidebar('bs-footer-left-widgets');
    }
    echo '</div> <!-- end left footer -->';
    
    /* Center Footer */
    echo '<div class="bs-footer-center bs-container bs-color-2">';
    if (is_active_sidebar('bs-footer-center-widgets'))
    {
        dynamic_sidebar('bs-footer-center-widgets');
    }
    echo '</div> <!-- end center footer -->';
    
    /* Right Footer */
    echo '<div class="bs-footer-right bs-container bs-color-2">';
    if (is_active_sidebar('bs-footer-right-widgets'))
    {
        dynamic_sidebar('bs-footer-right-widgets');
    }
    echo '</div> <!-- end right footer -->';
    
    echo '</div> <!-- end grid -->';
    
    wp_footer();
?>
