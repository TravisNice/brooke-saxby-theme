<?php
if (has_post_thumbnail()) {
    $post_thumbnail_id = get_post_thumbnail_id();
    $img_src = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
    $img_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'full' );

    echo '<img src="' . $img_src . '" srcset="' . $img_srcset . '" />';
}
?>
