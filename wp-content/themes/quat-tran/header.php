<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quat-tran
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	// hook body content
	wp_body_open();
	?>

	<header id="header" class="header">
		<div class="container">
			<div class="header__inner">
				<div class="row no-gutters">
					<div class="col-6 col-xl-3">
						<a href="<?php echo home_url(); ?>" class="header__logo" aria-label="logo image">
							<?php $logo_url = get_template_directory_uri() . '/assets/images/logo_png.png'; ?>
							<img width="100" height="50" src="<?php echo $logo_url; ?>" alt="logo">
						</a>
					</div>

					<div class="col-6 col-xl-9">
						<div class="header__navInner">
							<div class="form_search">
								<form role="search" method="get" action="<?php echo home_url('/'); ?>">
									<input type="text" name="s" placeholder="Nhập từ khóa tìm kiếm..."
										value="<?php the_search_query(); ?>" required />
									<button type="submit" aria-label="button icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path fill="#ffffff"
												d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
										</svg>
									</button>
								</form>
							</div>

							<!-- menu PC -->
							<?php
							if (has_nav_menu('menu-1')) {
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'container' => 'nav',
										'container_class' => 'header__menupc',
										'depth' => 2,
									)
								);
							}
							?>
							<!-- end -->

							<!-- button toggle menu mobile -->
							<div class="header__toggle">
								<span class="header__toggleItem header__toggleItem--open"></span>
								<span class="header__toggleItem header__toggleItem--close"></span>
							</div>
							<!-- end -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- menu Mobile -->
		<div class="header__menusp">
			<?php
			if (has_nav_menu('menu-1')) {
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'container' => 'nav',
						'container_class' => 'header__menuspInner',
						'depth' => 2,
					)
				);
			}
			?>
		</div>
	</header>

	<main class="mainBodyContent">