<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quat-tran
 */
?>

</main>
<!-- end main body -->

<!-- Footer -->
<?php $footer = get_field('footer', 'option') ?? null;
if ($footer):
    ?>
    <footer id="footer" class="footer secSpace">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <a href="/" class="footer__logo">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg'; ?>" alt="logo">
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="footer__item">
                        <?php if (!empty($footer['tieu_de'])): ?>
                            <h3 class="footer__item--title h4"><?php echo $footer['tieu_de']; ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($footer['mo_ta'])): ?>
                            <div class="footer__desc">
                                <?php echo $footer['mo_ta']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer__item">
                                <?php if (!empty($footer['tieu_de_2'])): ?>
                                    <h3 class="footer__item--title h4"><?php echo $footer['tieu_de_2']; ?></h3>
                                <?php endif; ?>
                                <?php
                                if (has_nav_menu('footer-1')) {
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'footer-1',
                                            'container' => 'nav',
                                            'container_class' => 'footer__nav',
                                            'depth' => 1,
                                        )
                                    );
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer__item">
                                <?php if (!empty($footer['tieu_de_3'])): ?>
                                    <h3 class="footer__item--title h4"><?php echo $footer['tieu_de_3']; ?></h3>
                                <?php endif; ?>
                                <div class="infomation">
                                    <?php if (!empty($footer['information_1'])): ?>
                                        <div class="item item-phone">
                                            <div class="editor">
                                                <?php echo $footer['information_1']; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($footer['information_2'])): ?>
                                        <div class="item item-mail">
                                            <div class="editor">
                                                <?php echo $footer['information_2']; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Socials -->
                                <?php $contact_info = get_field('social', 'option') ?? null;
                                if ($contact_info): ?>
                                    <div class="socials">
                                        <?php if (!empty($contact_info['facebook'])): ?>
                                            <a href="<?php echo $contact_info['facebook']; ?>" target="_blank">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/socials/face_icon.png'; ?>"
                                                    alt="Facebook">
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($contact_info['zalo'])): ?>
                                            <a target="_blank" href="<?php echo $contact_info['zalo']; ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/socials/zalo_icon.png'; ?>"
                                                    alt="Zalo">
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($contact_info['youtube'])): ?>
                                            <a target="_blank" href="<?php echo $contact_info['youtube']; ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/socials/youtube_icon.png'; ?>"
                                                    alt="Youtube">
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($contact_info['instagram'])): ?>
                                            <a target="_blank" href="<?php echo $contact_info['instagram']; ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/socials/instagram.png'; ?>"
                                                    alt="Instagram">
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($contact_info['tiktok'])): ?>
                                            <a target="_blank" href="<?php echo $contact_info['tiktok']; ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/socials/tiktok.png'; ?>"
                                                    alt="Tiktok">
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($contact_info['bo_cong_thuong'])): ?>
                                            <a target="_blank" href="<?php echo $contact_info['bo_cong_thuong']; ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/socials/website-bo-cong-thuong.png'; ?>"
                                                    alt="website quạt đăng ký bộ công thương">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <!-- / Socials -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer__item">
                                <?php if (!empty($footer['tieu_de_4'])): ?>
                                    <h3 class="footer__item--title h4"><?php echo $footer['tieu_de_4']; ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($footer['anh_tru_so'])): ?>
                                    <div class="footer__item--linkFb">
                                        <a href="https://www.facebook.com/">
                                            <div class="image__inner">
                                                <img src=" <?php echo $footer['anh_tru_so']; ?>" alt="">
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
<!-- / Footer -->

<!-- Contact -->
<div class="supports">
    <ul class="clearfix">
        <li>
            <a target="_blank" href="http://m.me/quattranMrVu" data-wpel-link="external"
                rel="nofollow external noopener noreferrer"><i class="icon icon_mess"></i></a>
        </li>
        <li>
            <a target="_blank" href="http://zalo.me/09.1102.1102" data-wpel-link="external"
                rel="nofollow external noopener noreferrer"><i class="icon icon_zalo"></i></a>
        </li>
    </ul>
</div>
<!-- / Contact -->

<!-- callNowButton -->
<div id="callNowButton" class="fixed_left">
    <a href="tel:09.1102.1102" class="btc_icon" data-wpel-link="internal"></a>
    <a href="tel:09.1102.1102" class="btc_text" data-wpel-link="internal"><span>09.1102.1102</span></a>
</div>
<!-- / callNowButton -->

<!-- BackToTop -->
<div id="back-top">
    <a href="#top">
        <i class="icon_up"></i>
        <div>TOP</div>
    </a>
</div>
<!-- / BackToTop -->

<?php wp_footer(); ?>

</body>

</html>