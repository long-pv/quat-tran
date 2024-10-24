<?php
$post_id = get_the_ID();
$thumbnail_id = get_post_thumbnail_id($post_id);
$categories = get_the_category($post_id);
?>
<article id="post-<?php echo $post_id; ?>" class="singlePost">
	<div class="row singlePost__row">
		<div class="col-6 col-md-4 col-lg-5">
			<a href="<?php the_permalink(); ?>" class="imgGroup" aria-label="<?php the_title(); ?>">
				<?php
				$image_id = get_post_thumbnail_id($post_id);
				?>
				<picture>
					<source media="(min-width:768px)" srcset="<?php echo img_url($image_id, 'medium'); ?>">
					<img width="300" height="300" loading="lazy" src="<?php echo img_url($image_id, 'thumbnail'); ?>"
						alt=" <?php the_title(); ?>">
				</picture>
			</a>
		</div>

		<div class="col-6 col-md-8 col-lg-7">
			<div class="singlePost__content">
				<h3 class="singlePost__title mb-3">
					<a class="line-2" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>

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

							<a href="<?php echo get_category_link($first_category->term_id); ?>" class="text"
								aria-label="<?php echo $first_category->name; ?>">
								<?php echo $first_category->name; ?>
							</a>
						</div>
						<?php
					endif;
					?>
				</div>
				<p class="singlePost__desc line-3 mb-0">
					<?php echo get_the_excerpt(); ?>
				</p>
			</div>
		</div>
	</div>
</article>