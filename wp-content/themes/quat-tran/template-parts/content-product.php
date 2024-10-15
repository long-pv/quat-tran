<?php global $product; ?>

<article class="productItem" data-mh="productItem">
    <a href="<?php the_permalink(); ?>" class="productItem__img">
        <img width="300" height="300" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    </a>
    <div class="productItem__content">
        <h3 class="h4 productItem__title">
            <a class="line-3" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="productItem__price">
            <?php echo wc_price($product->get_sale_price()); ?>
        </div>
    </div>
</article>