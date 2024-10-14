<?php
/**
 * Template name: Home
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quat-tran
 */

get_header();
?>

<!-- Banner -->
<?php
$banner = get_field('banner');

if ($banner):
    ?>
    <section class="sectionBanner">
        <div class="sectionBanner__inner">
            <div id="sectionBanner__slider" class="sectionBanner__slider">
                <?php
                foreach ($banner as $index => $item):
                    ?>
                    <div>
                        <div class="sectionBanner__item">
                            <img class="sectionBanner__itemImg" src="<?php echo img_url($item['banner_image'], 'large'); ?>"
                                alt="<?php echo 'banner ' . ($index + 1); ?>">
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- / Banner -->

<!-- -->
<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 10,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'uncategorized',
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    echo '<div class="product-slider">';
    while ($query->have_posts()) {
        $query->the_post();
      
        get_template_part('template-parts/content-product');
    }
    echo '</div>';
}

// Reset post data after the query
wp_reset_postdata();

// Add "View More" button
$product_count = wp_count_posts('product')->publish;
if ($product_count > 10) {
    echo '<a href="' . get_term_link('uncategorized', 'product_cat') . '" class="view-more">Xem thêm</a>';
}

?>
<!-- / -->


<?php
get_footer();
