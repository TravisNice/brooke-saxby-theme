<?php get_header(); ?>
<?php if (have_posts()) { ?>

<?php while ( have_posts() ) { ?>

<?php the_post(); ?>

<?php if( has_post_thumbnail() ) { ?>
<div class="col span-12s span-12m span-12l left pad-12">

<header class="fuscia-front light-grey-back no-underline bottom-16">
<h2 id="post-<?php the_ID(); ?>" class="x-large"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<span class="x-small black-front"><time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <?php the_author_posts_link(); ?></span>
</header>

<div class="col span-2 left pad-12">
<a class="left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail-wide' ); ?></a>
</div>

<div class="col span-10 left pad-12">
<?php the_excerpt(); ?>
</div>

</div>

<div class="col span-12sf span-12mf span-12lf pad-12 left">
<hr>
</div>

<?php } else { ?>
<div class="col span-12s span-12m span-12l left pad-12">

<header class="fuscia-front light-grey-back no-underline bottom-16">
<h2 id="post-<?php the_ID(); ?>" class="x-large"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<span class="x-small black-front"><time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <?php the_author_posts_link(); ?></span>
</header>

<div class="left pad-12">
<?php the_excerpt(); ?>
</div>

</div>

<div class="col span-12sf span-12mf span-12lf pad-12 left">
<hr>
</div>

<?php } ?>

<?php } ?>

<?php } ?>

<?php get_template_part( 'template-parts/post', 'navigation' ); ?>

<?php get_footer(); ?>
