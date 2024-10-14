<?php global $product; ?>
<article class="product-item">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail(); ?>
        <h3><?php the_title(); ?></h3>
        <span><?php echo $product->get_price_html(); ?></span>
    </a>
</article>