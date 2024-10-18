<?php global $product; ?>

<article class="productItem" data-mh="productItem">
    <a href="<?php the_permalink(); ?>" class="imgGroup productItem__img">
        <img width="300" height="300" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    </a>
    <div class="productItem__content">
        <h3 class="h4 productItem__title" data-mh="title_product">
            <a class="line-3" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="productItem__price">
            <!-- Price -->
            <?php if ($product->is_on_sale()): ?>
                <span class="sale-price"><?php echo wc_price($product->get_sale_price()); ?></span>
            <?php else: ?>
                <span class="regular-price"><?php echo wc_price($product->get_regular_price()); ?></span>
            <?php endif; ?>
            <!-- / Price -->
        </div>
    </div>
</article>