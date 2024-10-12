<?php
$post_id = get_the_ID();
$thumbnail_id = get_post_thumbnail_id($post_id);
$categories = get_the_category($post_id);
?>
<article id="post-<?php echo $post_id; ?>" class="singlePost">
	<div class="row singlePost__row">
		<div class="col-6 col-md-4 col-lg-3">
			<div class="imgGroup">
				<img src="<?php echo img_url($thumbnail_id, 'medium'); ?>" alt="<?php the_title(); ?>">
				<a class="singlePost__link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>

		<div class="col-6 col-md-8 col-lg-9">
			<div class="singlePost__content">
				<h3 class="singlePost__title mb-3">
					<a class="line-2" href="<?php the_permalink(); ?>">
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
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="#1a3865"
										d="M448 480L64 480c-35.3 0-64-28.7-64-64L0 192l512 0 0 224c0 35.3-28.7 64-64 64zm64-320L0 160 0 96C0 60.7 28.7 32 64 32l128 0c20.1 0 39.1 9.5 51.2 25.6l19.2 25.6c6 8.1 15.5 12.8 25.6 12.8l160 0c35.3 0 64 28.7 64 64z" />
								</svg>
							</span>

							<a href="<?php echo get_category_link($first_category->term_id) ?>" class="text">
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