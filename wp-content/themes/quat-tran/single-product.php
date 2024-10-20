<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package quat-tran
 */

$product_id = get_the_ID();
$product = wc_get_product($product_id);
set_post_views($product_id);

get_header();
?>

<!-- Single Product -->
<section class="secSpace">
	<div class="container">
		<?php wp_breadcrumbs(); ?>
		<div class="product_info_wrap">
			<div class="row">
				<div class="col-lg-6">
					<?php
					$attachment_ids = $product->get_gallery_image_ids();
					if ($attachment_ids):
						?>
						<div class="product-gallery">
							<?php foreach ($attachment_ids as $attachment_id): ?>
								<div class="gallery-item">
									<?php echo wp_get_attachment_image($attachment_id, 'full'); ?>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="product-thumbnails">
							<?php foreach ($attachment_ids as $attachment_id): ?>
								<div class="thumbnail-item">
									<?php echo wp_get_attachment_image($attachment_id, 'thumbnail'); ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-lg-6">
					<div class="product_info">
						<h1 class="h1 product_title">
							<?php the_title(); ?>
						</h1>

						<?php
						$product_sku = $product->get_sku() ? $product->get_sku() : 'N/A';
						$stock_status = $product->is_in_stock() ? 'Còn hàng' : 'Hết hàng';
						$product_views = get_post_meta($product_id, 'post_views_count', true);
						$product_views = $product_views ? $product_views : 0;
						?>

						<div class="meta_product">
							<div class="sku_pro">
								Mã sản phẩm: <span class="sku"><?php echo esc_html($product_sku); ?></span>
							</div>
							<div class="meta_product_line">|</div>
							<div class="stock_pro">
								Tình trạng: <span class="stock">
									<?php echo esc_html($stock_status); ?>
								</span>
							</div>
							<div class="meta_product_line">|</div>
							<div class="view_pro">
								Lượt xem: <?php echo esc_html($product_views); ?>
							</div>
						</div>

						<div class="product_info_price h1">
							<span class="price_title">Giá:</span>
							<?php
							$regular_price = $product->get_regular_price();
							$sale_price = $product->get_sale_price();

							if ($regular_price == 0): ?>
								<span class="contact-price">Liên hệ</span>
							<?php elseif ($product->is_on_sale()): ?>
								<span class="regular-price-sale">
									<?php echo wc_price($regular_price); ?>
								</span>
								<span class="sale-price" style="color: red; margin-left: 10px;">
									<?php echo wc_price($sale_price); ?>
								</span>
							<?php else: ?>
								<span class="regular-price"><?php echo wc_price($regular_price); ?></span>
							<?php endif; ?>
						</div>

						<div class="product_summary">
							<h3 class="h4 product_summary_title">
								Đặc điểm nổi bật
							</h3>
							<div class="editor">
								<?php echo $product->get_short_description() ?? 'N/A'; ?>
							</div>
						</div>

						<!-- Nút tư vấn sản phẩm -->
						<div class="product-contact">
							<a href="tel:0866081858"><span class="icons icon-phone"></span> Tư vấn sản
								phẩm</a>
							<a href="/danh-sach-dai-ly-chinh-hang"><span class="icons icon-location"></span>
								Tìm
								điểm
								bán</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- / Single Product -->

<!-- Related Product -->
<section class="secSpace">
	<div class="related-product">
		<div class="container">
			<div class="related-product-title titleProduct">
				<h2 class="titleProduct__title">
					<a href="#">
						Sản phẩm liên quan
					</a>
				</h2>
			</div>
			<?php
			// Lấy danh sách các danh mục của sản phẩm hiện tại
			$terms = wp_get_post_terms($product_id, 'product_cat');

			// Kiểm tra xem sản phẩm có thuộc danh mục nào không
			if (!empty($terms)) {
				// Lấy slug của các danh mục
				$term_ids = wp_list_pluck($terms, 'slug');

				// Thiết lập query để lấy các sản phẩm thuộc cùng danh mục, trừ sản phẩm hiện tại
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 10, // Số lượng sản phẩm muốn hiển thị
					'post__not_in' => array($product_id), // Loại trừ sản phẩm hiện tại
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'slug',
							'terms' => $term_ids, // Lọc theo danh mục của sản phẩm hiện tại
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

				wp_reset_postdata();
			} else {
				// Nếu sản phẩm không có danh mục nào
				echo '<p>No related products found.</p>';
			}
			?>
		</div>
	</div>
</section>
<!-- / Related Product -->

<?php
get_footer();
