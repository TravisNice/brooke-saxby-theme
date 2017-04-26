<?php
$args = array( 'post_type'=>'post' );
$new_loop = new WP_Query( $args );
?>

<?php get_header(); ?>

<div class="col span-12-margin span-12m span-12l section-split pad-12 white-front light-pink-back no-underline left">
<h1 class="x-large">Recent Posts</h1>
</div>

<?php if ($new_loop->have_posts()) { ?>

<?php while ( $new_loop->have_posts() ) { ?>

<?php $new_loop->the_post(); ?>

<?php if( has_post_thumbnail() ) { ?>
<div class="col span-12s span-6m span-3l card left" itemscope itemtype="http://schema.org/Article">

<header class="pad-12 white-front light-pink-back no-underline">
<h2 id="post-<?php the_ID(); ?>" class="large"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span itemprop="headline"><?php the_title(); ?></span></a></h2>
<span class="x-small"><time itemprop="datePublished" content="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <span itemprop="author"><?php the_author_posts_link(); ?></span></span>
</header>

<a class="left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php the_post_thumbnail_url( 'full' ); ?>"></a>

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

<?php get_template_part( 'template-parts/nav/post', 'navigation' ); ?>

<?php wp_reset_query(); // Remember to reset
?>

<div class="col span-12-margin span-12m span-12l section-split pad-12 white-front light-pink-back no-underline left">
<h1 class="x-large">Featured Products</h1>
</div>

<?php $args = array(
    'post_type' => 'product',
    'meta_key' => '_featured',
    'meta_value' => 'yes',
    'posts_per_page' => 4
); ?>

<?php $featured_query = new WP_Query( $args ); ?>

<?php if ($featured_query->have_posts()) : ?>

<?php    while ($featured_query->have_posts()) : ?>

        <?php $featured_query->the_post(); ?>
        <?php $product = new WC_Product( get_the_ID() );  //  $product = wc_get_product( $featured_query->post->ID );
	?>
	<div class="col span-12s span-6m span-3l card left">
	<header class="pad-12 white-front light-pink-back no-underline">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<span class="small"><?php echo $product->get_price_html(); ?></span>
	</header>

	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php the_post_thumbnail_url( 'full' ); ?>"></a>

	<div class="black-front">
	<?php the_excerpt(); ?>
	</div>

	</div>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
