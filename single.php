<?php
	get_header();
	echo '<div id="bs-single-post-grid">';

	/* Headline Row */
	echo '<div id="bs-single-post-headline">';
	echo '<a href="'. site_url() .'">';
	echo '<h1>';
	bloginfo('name');
	echo '</h1>';
	echo '</a>';
	echo '</div> <!-- end header -->';

	/* Content Row */
	if (is_active_sidebar('bs-sidebar-widgets')) {
		echo '<div id="bs-single-post-content-with-sidebar">';
	}
	else {
		echo '<div id="bs-single-post-content-without-sidebar">';
	}

	if (have_posts()) {
		while (have_posts()) {
			the_post();
			echo '<h2 id="bs-single-post-content-title">'. get_the_title() .'</h2>';
      			if (has_post_thumbnail()) {
				/* Featured Image */
				$post_thumbnail_id = get_post_thumbnail_id();
				$img_src = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
				$img_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'full' );
				echo '<img id="bs-single-post-featured-image" src="' . $img_src . '" srcset="' . $img_srcset . '" style="width: 100%;" />';
			}
			the_content();
		}
		echo '</div> <!-- end content -->';
		comments_template();

		/* Divider Row */
		echo '<div id="bs-single-post-divider"><hr /></div> <!-- end divider -->';
    
		get_sidebar();
	}
	get_footer();
?>
