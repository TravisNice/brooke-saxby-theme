/*
 * Template Name: Blog
 */

<?php get_header(); ?>

<?php if (have_posts()) { ?>

<?php while ( have_posts() ) { ?>

<?php the_post(); ?>

<?php if( has_post_thumbnail() ) { ?>

<div class="col span-12s span-6m span-3l card left" itemscope itemtype="http://schema.org/Article">

<div class="left">
	<img src="<?php the_post_thumbnail_url( 'full' ); ?>" itemprop="image">
</div>

<div class="pad-12 white-front light-pink-back no-underline">
<h2 id="post-<?php the_ID(); ?>" class="large"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span itemprop="headline"><?php the_title(); ?></span></a></h2>
<span class="x-small"><time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <span itemprop="author"><?php the_author_posts_link(); ?></span></span>
</div>

<div class="black-front">
<span itemprop="articleBody">
<?php the_excerpt(); ?>
</span>
</div>

</div>

<?php } else { ?>
<div class="col span-12s span-6m span-3l card left" itemscope itemtype="http://schema.org/Article">

<header class="pad-12 white-front light-pink-back no-underline">
<h2 id="post-<?php the_ID(); ?>" class="large"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span itemprop="headline"><?php the_title(); ?></span></a></h2>
<span class="x-small"><time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <span itemprop="author"><?php the_author_posts_link(); ?></span></span>
</header>

<div class="black-front">
<span itemprop="articleBody">
<?php the_excerpt(); ?>
</span>
</div>

</div>
<?php } ?>

<?php } ?>

<?php } ?>

<?php get_footer(); ?>
