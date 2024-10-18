<?php
if (!defined('ABSPATH')) {
    exit; // Ngăn truy cập trực tiếp.
}

get_header(); ?>

<div class="secSpace bg-info">
    <div class="container">
        <?php wp_breadcrumbs(); ?>

        <?php if (apply_filters('woocommerce_show_page_title', true)): ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <div class="menu-filter">
            <div class="capt">
                <a class="filter-pro">
                    <img src="https://mrvu-fan.com/wp-content/themes/themenamewoo/images/Filter_alt.png">
                    Tất cả bộ lọc
                </a>
            </div>

            <?php
            if (has_nav_menu('menu-filter')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-filter',
                        'container' => 'nav',
                        'container_class' => 'menu-filter__nav',
                        'depth' => 2,
                    )
                );
            }
            ?>
        </div>
        <div class="product-cat__wrapper">
            <!-- Hiển thị bộ lọc sắp xếp sản phẩm của WooCommerce -->
            <?php woocommerce_catalog_ordering(); ?>

            <!-- Hiển thị số lượng sản phẩm trong danh mục hiện tại -->
            <?php
            $total_products = wc_get_loop_prop('total');
            ?>
            <div class="woocommerce-result-count">
                <span><?php echo esc_html($total_products); ?> </span> kết quả
            </div>
            <!-- Hiển thị danh sách sản phẩm -->
            <?php if ($total_products): ?>
                <div class="list-product-cat row">
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
</div>

<!--  -->
<section class="secSpace desc_home" style="background-color:#fff;">
    <div class="container">
        <div class="block">
            <div class="content-post clearfix readmore_content">
                <div class="term-description">
                    <?php
                    $term_id = get_queried_object_id(); // Lấy ID của danh mục hiện tại
                    $category_description = get_term_meta($term_id, 'category_description', true);

                    if (!empty($category_description)): ?>
                        <div class="editor">
                            <?php echo $category_description; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->

<?php get_footer(); ?>