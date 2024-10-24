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
									<img width="400" height="400" src="<?php echo img_url($attachment_id, 'large') ?>"
										alt="gallery large item <?php echo $attachment_id; ?>">
								</div>
							<?php endforeach; ?>
						</div>

						<div class="product-thumbnails">
							<?php foreach ($attachment_ids as $attachment_id): ?>
								<div class="thumbnail-item">
									<img width="200" height="200" src="<?php echo img_url($attachment_id, 'thumbnail') ?>"
										alt="gallery thumbnail item <?php echo $attachment_id; ?>">
								</div>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<div class="product_info_img">
							<?php
							$image_id = get_post_thumbnail_id(get_the_ID());
							?>
							<img width="400" height="400" src="<?php echo img_url($image_id, 'large') ?>"
								alt="<?php the_title(); ?>">
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
							<!-- <span class="price_title">Giá:</span> -->
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

						<?php
						$short_description = $product->get_short_description();
						if (!empty($short_description)):
							$short_description = apply_filters('the_content', $short_description);
							?>
							<div class="product_summary">
								<!-- <h3 class="h4 product_summary_title">
									Đặc điểm nổi bật
								</h3> -->
								<div class="editor editor_table_striped">
									<?php echo $short_description; ?>
								</div>
							</div>
						<?php endif; ?>

						<!-- liên hệ -->
						<div class="product-contact">
							<?php
							$phone_consultation = get_field('phone_consultation', 'option') ? 'tel:' . get_field('phone_consultation', 'option') : 'javascript:void(0);';
							?>
							<a href="<?php echo $phone_consultation; ?>" class="contact-btn">
								<span class="icons icon-phone"></span> Tư vấn sản phẩm
							</a>
							<?php
							$sales_agent = get_field('sales_agent', 'option') ?? 'javascript:void(0);';
							?>
							<a href="<?php echo $sales_agent; ?>" target="<?php echo $sales_agent ? '_blank' : ''; ?>"
								class="contact-btn">
								<span class="icons icon-location"></span> Tìm điểm bán
							</a>
							<?php
							$contact_zalo = get_field('contact_zalo', 'option') ?? 'javascript:void(0);';
							?>
							<a href="<?php echo $contact_zalo; ?>" target="<?php echo $contact_zalo ? '_blank' : ''; ?>"
								class="contact-btn contact_btn_zalo">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/Icon_of_Zalo.png'; ?>"
									alt="Zalo"> Liên hệ Zalo
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- / Single Product -->

<section class="secSpace pt-0">
	<div class="container">
		<div class="product_info_wrap">
			<div class="product_content">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
							Thông tin sản phẩm
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
							Thông số kỹ thuật
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tabs-1" role="tabpanel">
						<div class="readmore_eidtor_content">
							<div class="editor">
								<?php
								$full_description = apply_filters('the_content', $product->get_description());
								echo !empty($full_description) ? $full_description : 'Nội dung đang được cập nhật...';
								?>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tabs-2" role="tabpanel">
						<?php
						$specifications = get_field('specifications');
						if ($specifications):
							?>
							<div class="editor editor_table_striped">
								<table>
									<tbody>
										<?php foreach ($specifications as $item): ?>
											<tr>
												<td width="30%">
													<?php echo $item['title']; ?>
												</td>
												<td>
													<?php echo $item['content']; ?>
												</td>
											</tr>
											<?php
										endforeach;
										?>
									</tbody>
								</table>
							</div>
						<?php else: ?>
							<p>Nội dung đang được cập nhật...</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$terms = wp_get_post_terms($product_id, 'product_cat');
if ($terms) {
	$term_ids = wp_list_pluck($terms, 'slug');
} else {
	$term_ids = [];
}

$args = array(
	'post_type' => 'product',
	'posts_per_page' => 10,
	'post__not_in' => array($product_id),
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $term_ids,
		),
	),
);

$query = new WP_Query($args);

if ($query->have_posts()):
	?>
	<section class="secSpace pt-0">
		<div class="container">
			<div class="sec_heading">
				<h2 class="sec_title">
					Sản phẩm liên quan
				</h2>
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
<?php endif; ?>

<?php
get_footer();
