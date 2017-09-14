<?php
        if (is_active_sidebar('bs-sidebar-widgets'))
        {
            echo '<div id="bs-single-post-sidebar">';
            dynamic_sidebar('bs-sidebar-widgets');
            echo '</div>';
        }
?>
