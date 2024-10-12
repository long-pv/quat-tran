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

<div class="container">
	<div class="secSpace">
		<?php wp_breadcrumbs(); ?>
		<div class="editor">
			<h1 class="mb-3">
				<?php the_title(); ?>
			</h1>

			<?php the_content(); ?>
		</div>
	</div>
</div>


<?php
get_footer();
