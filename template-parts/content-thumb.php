	<div class="left align-center col span-12 bottom-16">
			<img src="<?php the_post_thumbnail_url( 'full' ); ?>" width="100%" />
	</div>

	<header class="fuscia-front no-underline bottom-16 left col span-12">
		<h2 id="post-<?php the_ID(); ?>" class="x-large">
				<?php the_title(); ?>
		</h2>

		<span class="x-small black-front">
			<time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>">
				<?php the_time('F jS, Y') ?>
			</time>
			by <?php the_author_posts_link(); ?>
		</span>

	</header>

	<div class="left col span-12">
		<?php the_content(); ?>
	</div>
