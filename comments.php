<?php
    $number_of_comments = get_comments_number();
    
    if ($number_of_comments == 1) {
        echo '<hr /><h3>One comment on "'. get_the_title() .'"</h3>';
    } else {
        echo '<hr /><h3>'. $number_of_comments .' comments on "'. get_the_title() .'"</h3>';
    }
    
    wp_list_comments();
    
    echo '<hr />';
    
    comment_form();
    
    ?>
