<?php get_header(); ?>

<?php if (have_posts()) { ?>

<?php while ( have_posts() ) { ?>

<?php the_post(); ?>

<?php if( has_post_thumbnail() ) { ?>
<div class="content-container" itemscope itemtype="http://schema.org/Article">

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
<div class="content-container" itemscope itemtype="http://schema.org/Article">

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

<div class="col span-12 span-12mf span-12lf fuscia-front no-underline x-large left">
<div class="col span-4 span-4mf span-4lf align-left left"><?php if(get_previous_posts_link()) { previous_posts_link('&laquo; Newer Entries'); } else { echo '&laquo; Newer Entries'; } ; ?></div>
<div class="col span-4 span-4mf span-4lf align-center left"><?php echo paginate_links( array( 'prev_next' => false ) ); ?></div>
<div class="col span-4 span-4mf span-4lf align-right left"><?php if(get_next_posts_link()) { next_posts_link('Older Entries &raquo;'); } else { echo 'Older Entries &raquo;'; } ; ?></div>
</div>

<?php get_footer(); ?>
