<?php
    $number_of_comments = get_comments_number();
    
    echo '<div class="bs-container">';
    
    if ($number_of_comments == 1)
    {
        echo '<hr /><h2>One thought on "'. get_the_title() .'"</h2>';
    }
    else if ($number_of_comments > 1)
    {
        echo '<hr /><h2>'. $number_of_comments .' thoughts on "'. get_the_title() .'"</h2>';
    }
    
    wp_list_comments(array( 'style' => 'div' ));
    
    echo '<hr />';
    
    comment_form( array( 'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>' ) );
    
    echo '</div>';
?>
