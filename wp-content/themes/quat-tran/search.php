<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package quat-tran
 */

get_header();
?>
<div class="secSpace">
	<div class="container">
		<?php
		wp_breadcrumbs();
		?>
		<h1 class="h4 category_title">
			Kết quả tìm kiếm cho: <?php echo get_search_query(); ?>
		</h1>
		<?php if (have_posts()): ?>
			<div class="list-product-cat row list_product">
				<?php while (have_posts()):
					the_post(); ?>
					<div class="col-lg-3 col-md-6">
						<?php get_template_part('template-parts/content-product'); ?>
					</div>
				<?php endwhile; ?>
			</div>
			<?php pagination(); ?>
		<?php else: ?>
			<p>Không tìm thấy sản phẩm nào.</p>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
