<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quat-tran
 */

get_header();
$current_category = get_queried_object();

var_dump($current_category);
?>

<div class="container">
	<div class="secSpace">
		<?php wp_breadcrumbs(); ?>

		<h1 class="category_title">
			<?php echo $current_category->name; ?>
		</h1>

		<div class="row category_row">
			<?php
			// list post
			while (have_posts()):
				the_post();
				?>
				<div class="col-12">
					<?php get_template_part('template-parts/content-post'); ?>
				</div>
				<?php
			endwhile;
			?>
		</div>

		<?php pagination(); ?>
	</div>
</div>
<?php
get_footer();
