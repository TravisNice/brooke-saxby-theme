<?php
$my_query = new WP_Query( $posts );


if ( $my_query->found_posts > $my_query->post_count ) {
?>

<div class="col span-12 span-12mf span-12lf fuscia-front no-underline x-large left">
<div class="col span-1 span-1mf span-1lf align-left left">&nbsp;</div>
<div class="col span-3 span-3mf span-3lf align-left left"><?php if(get_previous_posts_link()) { previous_posts_link('&laquo; Newer Entries'); } else { echo '&laquo; Newer Entries'; } ; ?></div>
<div class="col span-4 span-4mf span-4lf align-center left"><?php echo paginate_links( array( 'prev_next' => false ) ); ?></div>
<div class="col span-3 span-3mf span-3lf align-right left"><?php if(get_next_posts_link()) { next_posts_link('Older Entries &raquo;'); } else { echo 'Older Entries &raquo;'; } ; ?></div>
<div class="col span-1 span-1mf span-1lf align-left left">&nbsp;</div>
</div>

<?php } ?>
