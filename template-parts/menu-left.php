<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Brooke_Saxby
 * @since 1.1.1
 * @version 1.0
 */
?>

<nav id="side-nav" class="col span-12 span-6mf span-2lf side-nav pad-12 fuscia-front white-back fuscia-border right-border collapsible animate-left">
<span onclick="close_nav()" class="x-large hide-large no-underline"><a href="#">&larr; Close</a></span>
<h2 class="rounded large white-front light-pink-back col span-12 span-12mf span-12lf left pad-5">Menu</h2>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '' ) ); ?>
<?php get_sidebar('side-nav-widgets'); ?>
</nav>
