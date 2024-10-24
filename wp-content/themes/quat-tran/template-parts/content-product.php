<?php
global $product;
?>

<article class="productItem" data-mh="productItem">
    <a href="<?php the_permalink(); ?>" class="imgGroup productItem__img" aria-label="<?php the_title(); ?>">
        <?php
        $image_id = get_post_thumbnail_id(get_the_ID());
        ?>
        <img width="300" height="300" src="<?php echo img_url($image_id, 'medium'); ?>" alt="<?php the_title(); ?>">
    </a>
    <div class="productItem__content">
        <h3 class="h4 productItem__title" data-mh="title_product">
            <a class="line-3" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="productItem__price">
            <?php
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();

            if ($regular_price == 0): ?>
                <span class="contact-text">Liên hệ</span>
            <?php elseif ($product->is_on_sale()): ?>
                <span class="regular-price-sale">
                    <?php echo wc_price($regular_price); ?>
                </span>
                <span class="regular-price"><?php echo wc_price($sale_price); ?></span>
            <?php else: ?>
                <span class="regular-price"><?php echo wc_price($regular_price); ?></span>
            <?php endif; ?>
        </div>
    </div>
</article>