<?php
	$number_of_comments = get_comments_number();
    
	if (is_active_sidebar('bs-sidebar-widgets')) {
		echo '<div id="bs-single-post-comments-with-sidebar">';
	}
	else {
		echo '<div id="bs-single-post-comments-without-sidebar">';
	}

	if ($number_of_comments == 1)
	{
		echo '<hr /><h3>One thought on "'. get_the_title() .'"</h3>';
	}
		else if ($number_of_comments > 1)
	{
		echo '<hr /><h3>'. $number_of_comments .' thoughts on "'. get_the_title() .'"</h3>';
	}

	wp_list_comments(array( 'style' => 'div' ));

	echo '<hr />';
    
	comment_form( array( 'comment_field' => '<p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>' ) );
    
	echo '</div>';
?>
