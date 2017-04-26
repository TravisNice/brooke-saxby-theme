<?php get_header(); ?>

<?php if (have_posts()) { ?>

<?php while ( have_posts() ) { ?>

<?php the_post(); ?>

<?php if( has_post_thumbnail() ) { ?>
<div class="col span-12s span-12m span-12l content-container left" itemscope itemtype="http://schema.org/Article">

<header class="fuscia-front light-grey-back no-underline bottom-16">
<h2 id="post-<?php the_ID(); ?>" class="x-large"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span itemprop="headline"><?php the_title(); ?></span></a></h2>
<span class="x-small black-front"><time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <span itemprop="author"><?php the_author_posts_link(); ?></span></span>
</header>

<div>
<img src="<?php the_post_thumbnail_url( 'full' ); ?>" itemprop="image">
</div>

<div>
<span itemprop="articleBody">
<?php the_content(); ?>
</span>
</div>

</div>

<?php } else { ?>
<div class="col span-12s span-12m span-12l content-container left" itemscope itemtype="http://schema.org/Article">

<header class="fuscia-front light-grey-back no-underline bottom-16">
<h2 id="post-<?php the_ID(); ?>" class="x-large"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span itemprop="headline"><?php the_title(); ?></span></a></h2>
<span class="x-small black-front"><time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <span itemprop="author"><?php the_author_posts_link(); ?></span></span>
</header>

<div>
<span itemprop="articleBody">
<?php the_content(); ?>
</span>
</div>

</div>

<?php } ?>

<?php } ?>

<?php } ?>

<?php get_footer(); ?>
