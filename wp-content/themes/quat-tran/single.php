<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package quat-tran
 */

get_header();

$post_id = get_the_ID();
$arrPost = [];
array_push($arrPost, $post_id);
$categories = get_the_category($post_id);
?>

<div class="container">
	<div class="secSpace">
		<?php wp_breadcrumbs(); ?>
		<div class="editor">
			<h1 class="single_post_title mb-4">
				<?php the_title(); ?>
			</h1>

			<div class="post_other_info mb-3">
				<div class="post_date">
					<span class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
							<path fill="#1a3865"
								d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
						</svg>
					</span>
					<span class="text">
						<?php echo get_the_date('d/m/Y'); ?>
					</span>
				</div>

				<?php
				if (!empty($categories)):
					$first_category = $categories[0];
					?>
					<div class="post_cat">
						<span class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
								<path fill="#1a3865"
									d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
							</svg>
						</span>

						<a href="<?php echo get_category_link($first_category->term_id); ?>" class="text">
							<?php echo $first_category->name; ?>
						</a>
					</div>
					<?php
				endif;
				?>
			</div>

			<?php the_content(); ?>
		</div>
	</div>
</div>


<?php
$args_latest_posts = array(
	'post_type' => 'post',
	'posts_per_page' => '4',
	'post__not_in' => $arrPost,
	'meta_query' => array(
		array(
			'key' => '_thumbnail_id',
			'compare' => 'EXISTS',
		),
	),
);
$latest_posts = new WP_Query($args_latest_posts);
if ($latest_posts->have_posts()):
	?>
	<section class="secSpace latest_post bg-info">
		<div class="container">
			<div class="secHeading">
				<h2 class="secHeading__title">
					Bài viết liên quan
				</h2>
			</div>
			<div class="row latest_post_row">
				<?php
				while ($latest_posts->have_posts()):
					$latest_posts->the_post();
					?>
					<div class="col-lg-6">
						<?php get_template_part('template-parts/content-latest_post'); ?>
					</div>
					<?php
				endwhile;
				?>
			</div>
		</div>
	</section>
	<?php
endif;
wp_reset_postdata();
?>

<?php
get_footer();
