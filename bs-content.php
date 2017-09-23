<?php
	if (have_posts()) {
		while (have_posts()) {
			
            the_post();
            
            echo '<article>';
			
            echo '<h2>'. get_the_title() .'</h2>';
            
            if (has_post_thumbnail()) {
				/* Featured Image */
				$post_thumbnail_id = get_post_thumbnail_id();
				$img_src = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
				$img_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'full' );
                $alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
			
                echo '<img alt="'. $alt .'" src="' . $img_src . '" srcset="' . $img_srcset . '" style="width: 100%;" />';
			}
			
            the_content();
            
            if (comments_open()) comments_template();
            
            echo '</article>';
		}
	}
	
?>
