<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package quat-tran
 */

get_header();
?>

<?php
$product_id = get_the_ID(); // Lấy ID sản phẩm hiện tại từ trang
$product = wc_get_product($product_id); // Lấy đối tượng sản phẩm bằng ID
?>

<!-- Single Product -->
<section class="secSpace">
	<div class="detailProduct">
		<div class="container">
			<div class="row">
				<div class="col-lg-10">
					<article class="product-detail">
						<div class="row">
							<div class="col-lg-6">
								<div class="product-images">
									<div class="thumbnail-gallery-for">
										<div class="main-image">
											<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
												alt="<?php the_title(); ?>">
										</div>

										<!-- Hiển thị các ảnh trong gallery -->
										<?php
										$attachment_ids = $product->get_gallery_image_ids();
										foreach ($attachment_ids as $attachment_id):
											$image_link = wp_get_attachment_url($attachment_id);
											?>
											<div class="main-image">
												<img src="<?php echo $image_link; ?>"
													alt="<?php echo get_the_title($attachment_id); ?>">
											</div>
										<?php endforeach; ?>
									</div>

									<div class="thumbnail-gallery-nav">
										<div class="thumbnail-img">
											<img class="thumbnail"
												src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
												alt="<?php the_title(); ?>">
										</div>
										<?php
										foreach ($attachment_ids as $attachment_id):
											$image_link = wp_get_attachment_url($attachment_id);
											?>
											<div class="thumbnail-img">
												<img class="thumbnail" src="<?php echo $image_link; ?>"
													alt="<?php echo get_the_title($attachment_id); ?>">
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="product-info">
									<!-- Title -->
									<h1 class="product-title"><?php the_title(); ?></h1>
									<!-- / Title -->

									<!-- Sku -->
									<div class="header-pdt-other">
										<div class="htp-l">
											<span class="hpo-item cl-red"><?php echo $product->get_sku(); ?></span>
										</div>
									</div>
									<!-- / Sku -->

									<!-- Price -->
									<p class="product-price">
										Giá:
										<?php if ($product->is_on_sale()): ?>
											<span
												class="sale-price"><?php echo wc_price($product->get_sale_price()); ?></span>
										<?php else: ?>
											<span
												class="regular-price"><?php echo wc_price($product->get_regular_price()); ?></span>
										<?php endif; ?>
									</p>
									<!-- / Price -->

									<!-- Short Desc -->
									<div class="product-meta">
										<?php echo $product->get_short_description(); ?>
									</div>
									<!-- / Short Desc -->

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

						<!-- Content Main -->
						<div class="product-content mt-4">
							<div class="col-lg-10">
								<?php echo $product->get_description(); ?>
							</div>
						</div>
						<!-- / Content Main -->
					</article>
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
