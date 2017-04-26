<?php get_header(); ?>

<?php if ( is_active_sidebar( 'front-page-widgets' ) ) : ?>
	<div id="primary-sidebar" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'front-page-widgets' ); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
