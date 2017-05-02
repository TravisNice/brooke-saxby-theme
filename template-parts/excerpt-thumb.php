
	<div class="left pad-12 col span-12 span-12mf span-4lf align-center">
		<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'wide-thumbnail' ); ?>
		</a>
	</div>

	<header class="fuscia-front no-underline bottom-16 left col span-12 span-12mf span-8lf pad-12">
		<h2 id="post-<?php the_ID(); ?>" class="x-large">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>

		<span class="x-small black-front">
			<time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>">
				<?php the_time('F jS, Y') ?>
			</time>
			by <?php the_author_posts_link(); ?>
		</span>

	</header>

	<div class="left col span-12 span-12mf span-8lf pad-12">
		<?php the_excerpt(); ?>
	</div>
