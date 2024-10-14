<?php
/**
 * Template name: Dealer
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

<div class="container">
    <div class="secSpace">
        <?php
        wp_breadcrumbs();
        ?>
        <h1 class="title_page_default">
            <?php the_title(); ?>
        </h1>

        <?php
        $dealer_list = get_field('dealer_list');

        if ($dealer_list):
            ?>
            <div class="row dealer_row">
                <?php foreach ($dealer_list as $item): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="dealer_item">
                            <h3 class="h4 dealer_title">
                                <?php echo $item['title']; ?>
                            </h3>
                            <?php if ($item['address']): ?>
                                <div class="dealer_info">
                                    <div class="dealer_info_item">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path fill="#1a3865"
                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                            </svg>
                                        </span>
                                        <span class="text">
                                            <?php echo $item['address']; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if ($item['phone']): ?>
                                    <div class="dealer_info_item">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="#1a3865"
                                                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                            </svg>
                                        </span>
                                        <span class="text">
                                            <?php echo $item['phone']; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if ($item['map_link']): ?>
                                    <div class="dealer_info_item">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="#1a3865"
                                                    d="M384 476.1L192 421.2l0-385.3L384 90.8l0 385.3zm32-1.2l0-386.5L543.1 37.5c15.8-6.3 32.9 5.3 32.9 22.3l0 334.8c0 9.8-6 18.6-15.1 22.3L416 474.8zM15.1 95.1L160 37.2l0 386.5L32.9 474.5C17.1 480.8 0 469.2 0 452.2L0 117.4c0-9.8 6-18.6 15.1-22.3z" />
                                            </svg>
                                        </span>
                                        <a href="<?php echo $item['map_link']; ?>" target="_blank" class="text">
                                            Xem bản đồ
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
