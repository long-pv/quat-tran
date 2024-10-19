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
                            <picture>
                                <source media="(min-width:768px)"
                                    srcset="<?php echo img_url($item['banner_image'], 'large'); ?>">
                                <img class="sectionBanner__itemImg"
                                    src="<?php echo img_url($item['banner_image'], 'medium'); ?>" alt="Banner image">
                            </picture>
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

<?php
$featured_projects = get_field('featured_projects');
if ($featured_projects):
    $args = array(
        'post_type' => 'product',
        'post__in' => $featured_projects,
        'posts_per_page' => -1,
        'orderby' => 'post__in',
    );

    $query = new WP_Query($args);
    ?>
    <section class="secSpace">
        <div class="container">
            <div class="featured_projects_block">
                <h2 class="h3 featured_projects_title">
                    Top sản phẩm tiêu biểu
                </h2>
                <div class="featured_projects">
                    <?php
                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post(); ?>
                            <div>
                                <?php get_template_part('template-parts/content-product'); ?>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$product_categories = get_field('product_categories');
if ($product_categories):
    foreach ($product_categories as $key => $cat_id):
        $term = get_term($cat_id, 'product_cat');
        $term_link = get_term_link($term);

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 10,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $cat_id,
                ),
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
            $total_product = $query->found_posts;
            $total_query = $query->post_count;
            $xem_them = $total_product - $total_query;
            ?>
            <section class="secSpace <?php echo ($key % 2 == 0) ? 'bg-info' : ''; ?>">
                <div class="container">
                    <div class="sec_heading">
                        <h2 class="h3 sec_title">
                            <?php echo $term->name; ?>
                        </h2>
                        <a class="sec_link" href="<?php echo $term_link; ?>">
                            Xem thêm <?php echo $xem_them > 0 ? (string) $xem_them . ' sản phẩm' : ''; ?>
                        </a>
                    </div>
                    <div class="product_list_slider">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post(); ?>
                            <div>
                                <div class="product_item">
                                    <?php get_template_part('template-parts/content-product'); ?>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
            <?php
        endif;
    endforeach;
endif;
?>

<?php
get_footer();
