<?php
        if (is_active_sidebar('bs-sidebar-widgets'))
        {
            echo '<aside>';
            dynamic_sidebar('bs-sidebar-widgets');
            echo '</aside>';
        }
?>
