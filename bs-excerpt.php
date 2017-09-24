<?php
	if (have_posts()) {
		while (have_posts()) {

            the_post();

            echo '<section>';

            echo '<time itemprop="datePublished" content="'. get_the_time("Y-m-d") .'"><em>'. get_the_time("F jS, Y") .'</em></time>';
            echo '<h2><a href="'. get_permalink() .'">'. get_the_title() .'</a></h2>';

            the_excerpt();

            echo '</section>';
		}
	}

?>
