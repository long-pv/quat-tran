<?php
if (!defined('ABSPATH')) {
    exit; // Ngăn truy cập trực tiếp.
}

get_header(); ?>

<div class="secSpace bg-info">
    <div class="container">
        <?php wp_breadcrumbs(); ?>

        <!-- Hiển thị bộ lọc sắp xếp sản phẩm của WooCommerce -->
        <?php woocommerce_catalog_ordering(); ?>

        <header class="woocommerce-products-header">
            <?php if (apply_filters('woocommerce_show_page_title', true)): ?>
                <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>
        </header>

        <!-- Hiển thị số lượng sản phẩm trong danh mục hiện tại -->
        <?php
        $total_products = wc_get_loop_prop('total');
        echo '<p>Tổng số sản phẩm: ' . $total_products . '</p>';
        ?>

        <?php if ($total_products): ?>
            <div class="row">
                <?php while (have_posts()):
                    the_post(); ?>
                    <div class="col-lg-3 col-md-6">
                        <?php get_template_part('template-parts/content-product'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div>
    <?php
    // Lấy đối tượng danh mục hiện tại
    $term = get_queried_object();

    // Kiểm tra xem có đối tượng danh mục hiện tại không và có mô tả không
    if ($term && !is_wp_error($term)) {
        $description = term_description($term->term_id, 'product_cat'); // Lấy mô tả danh mục
        if ($description) {
            echo '<div class="category-description">' . $description . '</div>'; // Hiển thị mô tả
        }
    }
    ?>
</div>

<!--  -->
<?php get_footer(); ?>