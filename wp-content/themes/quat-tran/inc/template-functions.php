<?php
// Setup theme setting page
if (function_exists('acf_add_options_page')) {
	$name_option = 'Theme Settings';
	acf_add_options_page(
		array(
			'page_title' => $name_option,
			'menu_title' => $name_option,
			'menu_slug' => 'theme-settings',
			'capability' => 'edit_posts',
			'redirect' => false,
			'position' => 80
		)
	);
}

// stop upgrading wp cerber plugin
add_filter('site_transient_update_plugins', 'disable_plugins_update');
function disable_plugins_update($value)
{
	// disable acf pro
	if (isset($value->response['advanced-custom-fields-pro/acf.php'])) {
		unset($value->response['advanced-custom-fields-pro/acf.php']);
	}
	// disable All-in-One WP Migration
	if (isset($value->response['all-in-one-wp-migration-master/all-in-one-wp-migration.php'])) {
		unset($value->response['all-in-one-wp-migration-master/all-in-one-wp-migration.php']);
	}
	return $value;
}

function register_cpt_post_types()
{
	$cpt_list = [
		'showroom' => [
			'labels' => __('Showroom', 'quat-tran'),
		],
	];

	// $cpt_tax = [
	//     'event_category' => [
	//         'labels' => __('Event category', 'quat-tran'),
	//         'cap' => false,
	//         'post_type' => ['event']
	//     ],
	// ];

	foreach ($cpt_list as $post_type => $data) {
		register_cpt($post_type, $data);
	}

	// foreach ($cpt_tax as $ctx => $data) {
	//     register_ctx($ctx, $data);
	// }
}
add_action('init', 'register_cpt_post_types');

function register_cpt($post_type, $data = [])
{
	$hierarchical = !empty($data['hierarchical']) ? $data['hierarchical'] : false;
	$attributes = $hierarchical == true ? 'page-attributes' : '';

	$labels = [
		'name' => $data['labels'],
		'singular_name' => $data['labels'],
		'menu_name' => $data['labels'],
	];

	$args = array(
		'labels' => $labels,
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'rest_base' => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive' => false,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'delete_with_user' => false,
		'exclude_from_search' => true,
		'map_meta_cap' => true,
		'hierarchical' => $hierarchical,
		'rewrite' => array('slug' => $post_type, 'with_front' => true),
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'author', $attributes),
		'capability_type' => 'post',
		'can_export' => true,
	);

	if (!empty($data['tax'])) {
		$args['taxonomies'] = $data['tax'];
	}

	if (!empty($data['cap'])) {
		$capabilities = [
			'create_posts' => 'create_' . $post_type,
			'delete_others_posts' => 'delete_' . $post_type,
			'delete_posts' => 'delete_' . $post_type,
			'delete_private_posts' => 'delete_private_' . $post_type,
			'delete_published_posts' => 'delete_published_' . $post_type,
			'edit_others_posts' => 'edit_others_' . $post_type,
			'edit_posts' => 'edit_' . $post_type,
			'edit_private_posts' => 'edit_private_' . $post_type,
			'edit_published_posts' => 'edit_published_' . $post_type,
			'publish_posts' => 'publish_' . $post_type,
			'read_private_posts' => 'read_private_' . $post_type,
		];
		$args['capabilities'] = $capabilities;
	}

	register_post_type($post_type, $args);
}

function register_ctx($ctx, $data)
{
	$labels = [
		'name' => $data['labels'],
		'singular_name' => $data['labels'],
	];

	$args = [
		"label" => $ctx,
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => ['slug' => $ctx, 'with_front' => true],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "car_model_id",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
		'show_tagcloud' => true,
	];

	if (!empty($data['cap'])) {
		$capabilities = [
			'manage_terms' => 'manage_' . $ctx,
			'edit_terms' => 'edit_' . $ctx,
			'delete_terms' => 'delete_' . $ctx,
			'assign_terms' => 'assign_' . $ctx,
		];
		$args['capabilities'] = $capabilities;
	}

	register_taxonomy($ctx, $data['post_type'], $args);
}

/**
 * Breadcrumbs
 */
function wp_breadcrumbs()
{
	$delimiter = '
	<span class="icon">
		<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M6.6665 11.3333L9.72861 8.58922C10.0902 8.26515 10.0902 7.73485 9.72861 7.41077L6.6665 4.66666" stroke="#818181" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</span>
	';

	$home = __('Home', 'basetheme');
	$before = '<span class="current">';
	$after = '</span>';
	if (!is_admin() && !is_home() && (!is_front_page() || is_paged())) {

		global $post;

		echo '<nav>';
		echo '<div id="breadcrumbs" class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';

		$homeLink = home_url();
		echo '<a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . ' ';

		switch (true) {
			case is_category() || is_archive():
				$cat_obj = get_queried_object();
				echo $before . $cat_obj->name . $after;
				break;

			case is_single() && !is_attachment():
				$post_type = $post->post_type;

				if ($post_type == 'post') {
					$categories = get_the_category($post->ID);

					if (!empty($categories)) {
						$first_category = $categories[0];
						echo '<a href="' . get_category_link($first_category->term_id) . '">' . $first_category->name . '</a>' . $delimiter . ' ';
					}
				}

				echo $before . $post->post_title . $after;
				break;

			case is_page():
				if ($post->post_parent) {
					$parent_id = $post->ID;
					echo generate_page_parent($parent_id, $delimiter);
				}

				echo $before . get_the_title() . $after;
				break;

			case is_search():
				echo $before . 'Search' . $after;
				break;

			case is_404():
				echo $before . 'Error 404' . $after;
				break;
		}

		echo '</div>';
		echo '</nav>';
	}
} // end wp_breadcrumbs()

// Generate breadcrumbs ancestor page
function generate_page_parent($parent_id, $delimiter)
{
	$breadcrumbs = [];
	$output = '';

	while ($parent_id) {
		$page = get_post($parent_id);
		$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		$parent_id = $page->post_parent;
	}


	$breadcrumbs = array_reverse($breadcrumbs);
	array_pop($breadcrumbs);

	foreach ($breadcrumbs as $crumb) {
		$output .= $crumb . $delimiter;
	}

	return rtrim($output);
}

function pagination($query = null)
{
	global $wp_query;
	$max_pages = $query ? $query->max_num_pages : $wp_query->max_num_pages;

	echo '<div class="pagination">';
	echo paginate_links(
		array(
			'total' => $max_pages,
			'current' => max(1, get_query_var('paged')),
			'end_size' => 2,
			'mid_size' => 1,
			'prev_text' => __('Prev', 'quat-tran'),
			'next_text' => __('Next', 'quat-tran'),
		)
	);
	echo '</div>';

	wp_reset_postdata();
}

function img_url($img = '', $size = 'medium')
{
	$size = strtolower($size);

	if (empty($size) || !in_array($size, ['thumbnail', 'medium', 'large', 'full'])) {
		$size = 'medium';
	}

	if (is_array($img) && !empty($img['ID'])) {
		$url = wp_get_attachment_image_url($img['ID'], $size);
	} elseif (is_numeric($img)) {
		$url = wp_get_attachment_image_url($img, $size);
	} elseif (filter_var($img, FILTER_VALIDATE_URL)) {
		$id = attachment_url_to_postid($img);
		$url = $id ? wp_get_attachment_image_url($id, $size) : $img;
	} else {
		$url = '';
	}
	return $url ?: NO_IMAGE;
}