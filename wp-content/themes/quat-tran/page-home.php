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
                            <img class="sectionBanner__itemImg" src="<?php echo $item['url']; ?>"
                                alt="<?php echo $item['title'] ?? 'banner ' . ($index + 1); ?>">
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

<!-- Top Product -->
<section class="sectionTopProduct">
    <div class="top-product">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div id="product-item-info-11551" class=" product-item center product-item-info">
                        <div class="card-body">
                            <h5 class="cart-title"><a class="titlehover"
                                    href="https://mrvu-fan.com/quat-tran-trendy.html" data-wpel-link="internal">Quạt
                                    trần Trendy</a></h5>
                            <div class="price-product">

                                <div class="price"><span
                                        class="woocommerce-Price-amount amount"><bdi>7.990.000&nbsp;<span
                                                class="woocommerce-Price-currencySymbol">₫</span></bdi></span></div>
                            </div>
                        </div>
                        <div class="card-image">
                            <a href="https://mrvu-fan.com/quat-tran-trendy.html" class="box-img"
                                data-wpel-link="internal"><img class="product-image-photo"
                                    src="https://i0.wp.com/mrvu-fan.com/wp-content/uploads/2024/06/quat-tran-canh-go-trendy60koa-jpg.webp?fit=1500%2C1500&amp;ssl=1"
                                    alt="Quạt trần Trendy"></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="secSpace">
    <div class="container">
        <div class="secHeading">
            <h2 class="secHeading__title text-center">
                Sản phẩm sơn taiko
            </h2>
        </div>
        <?php
        echo do_shortcode('[products columns="4" limit="6" orderby="date" order="DESC"]');
        ?>

        <div class="d-flex justify-content-center pt-4">
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="btnXemThem">
                Xem thêm
            </a>
        </div>
    </div>
</section>

<!-- / Top Product -->



<?php
get_footer();
