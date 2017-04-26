<?php get_header(); ?>

<div class="front-page-container right-side col span-12 left">
<?php if ( is_active_sidebar( 'front-page-widgets' ) ) : ?>
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'front-page-widgets' ); ?>
		</div>
<?php endif; ?>
</div>

<?php get_footer(); ?>
