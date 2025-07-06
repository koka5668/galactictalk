<?php
/**
 * Register Post types and taxonomies
 *
 * @package GalacticTalk
 */

/**
 * Register Post types
 */
add_action(
	'init',
	function () {
		$post_types = array(
			array(
				'slug'          => 'course',
				'name'          => 'コース',
				'singular_name' => 'コース',
				'menu_name'     => 'コース',
				'menu_icon'     => 'dashicons-book',
			),
			array(
				'slug'          => 'tutor',
				'name'          => '講師',
				'singular_name' => '講師',
				'menu_name'     => '講師',
				'menu_icon'     => 'dashicons-businessman',
			),
			array(
				'slug'          => 'magazine',
				'name'          => 'マガジン',
				'singular_name' => 'マガジン',
				'menu_name'     => 'マガジン',
				'menu_icon'     => 'dashicons-media-document',
			),
			array(
				'slug'          => 'testimonial',
				'name'          => '受講生の声',
				'singular_name' => '受講生の声',
				'menu_name'     => '受講生の声',
				'menu_icon'     => 'dashicons-microphone',
			),
			array(
				'slug'          => 'faq',
				'name'          => 'FAQ',
				'singular_name' => 'FAQ',
				'menu_name'     => 'FAQ',
				'menu_icon'     => 'dashicons-format-chat',
			),
		);

		foreach ( $post_types as $post_type ) {
			$slug                = $post_type['slug'];
			$name                = $post_type['name'];
			$singular_name       = $post_type['singular_name'] ?? $name;
			$menu_name           = $post_type['menu_name'];
			$menu_position       = $post_type['menu_position'] ?? 25;
			$menu_icon           = $post_type['menu_icon'];
			$has_archive         = $post_type['has_archive'] ?? true;
			$rewrite             = $post_type['rewrite'] ?? array(
				'slug'       => $slug,
				'with_front' => false,
			);
			$public              = $post_type['public'] ?? true;
			$publicly_queryable  = $post_type['publicly_queryable'] ?? true;
			$exclude_from_search = $post_type['exclude_from_search'] ?? false;
			$taxonomies          = array_merge( array(), $post_type['taxonomies'] ?? array() );
			$supports            = $post_type['support'] ?? array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'revisions',
			);
			$template            = $post_type['template'] ?? array();

			register_post_type(
				$slug,
				array(
					'labels'                => array(
						'name'               => $name,
						'singular_name'      => $singular_name,
						'menu_name'          => $menu_name,
						'name_admin_bar'     => $menu_name,
						'all_items'          => "{$menu_name}一覧",
						'add_new_item'       => "新規{$menu_name}を追加",
						'edit_item'          => "{$menu_name}を編集",
						'view_item'          => "{$menu_name}を表示",
						'search_items'       => "{$menu_name}を検索",
						'not_found'          => "{$menu_name}が見つかりませんでした。",
						'not_found_in_trash' => "ゴミ箱内に{$menu_name}が見つかりませんでした。",
					),
					'description'           => '',
					'menu_icon'             => $menu_icon,
					'hierarchical'          => false,
					'has_archive'           => $has_archive,
					'capability_type'       => 'post',
					'public'                => $public,
					'publicly_queryable'    => $publicly_queryable,
					'show_ui'               => true,
					'show_in_rest'          => true,
					'rest_base'             => '',
					'rest_controller_class' => 'WP_REST_Posts_Controller',
					'rest_namespace'        => 'wp/v2',
					'show_in_menu'          => true,
					'show_in_nav_menus'     => true,
					'menu_position'         => $menu_position,
					'delete_with_user'      => false,
					'exclude_from_search'   => false,
					'map_meta_cap'          => true,
					'can_export'            => true,
					'query_var'             => true,
					'show_in_graphql'       => true,
					'rewrite'               => $rewrite,
					'taxonomies'            => $taxonomies,
					'supports'              => $supports,
					'template'              => $template,
				)
			);
		}
	},
	10,
	0
);

/**
 * Custom taxonomies
 */
add_action(
	'init',
	function () {
		$taxonomies = array(
			array(
				'slug'         => 'course_tag',
				'label'        => 'コースタグ',
				'object_type'  => 'course',
				'hierarchical' => false,
				'rewrite'      => array(
					'slug'       => 'course/tag',
					'with_front' => false,
				),
			),
			array(
				'slug'         => 'tutor_tag',
				'label'        => '講師タグ',
				'object_type'  => 'tutor',
				'hierarchical' => false,
				'rewrite'      => array(
					'slug'       => 'tutor/tag',
					'with_front' => false,
				),
			),
			array(
				'slug'         => 'magazine_tag',
				'label'        => 'マガジンタグ',
				'object_type'  => 'magazine',
				'hierarchical' => false,
				'rewrite'      => array(
					'slug'       => 'magazine/tag',
					'with_front' => false,
				),
			),
		);

		/**
		 * Register taxonomies
		 */
		foreach ( $taxonomies as $taxonomy ) {
			$slug               = $taxonomy['slug'];
			$label              = $taxonomy['label'];
			$publicly_queryable = $taxonomy['publicly_queryable'] ?? true;
			$object_type        = $taxonomy['object_type'];
			$hierarchical       = $taxonomy['hierarchical'] ?? true;
			$rewrite            = $taxonomy['rewrite'];
			$show_admin_column  = $taxonomy['show_admin_column'] ?? true;
			$show_in_quick_edit = $taxonomy['show_in_quick_edit'] ?? true;

			register_taxonomy(
				$slug,
				$object_type,
				array(
					'label'                 => $label,
					'labels'                => array(
						'name'          => $label,
						'singular_name' => $label,
						'add_new_item'  => "新規{$label}を追加",
						'parent_item'   => "親{$label}",
						'edit_item'     => "{$label}を編集",
					),
					'public'                => true,
					'publicly_queryable'    => $publicly_queryable,
					'hierarchical'          => $hierarchical,
					'show_ui'               => true,
					'show_in_menu'          => true,
					'show_in_nav_menus'     => true,
					'query_var'             => true,
					'rewrite'               => $rewrite,
					'show_admin_column'     => $show_admin_column,
					'show_in_rest'          => true,
					'show_tagcloud'         => false,
					'rest_base'             => $slug,
					'rest_controller_class' => 'WP_REST_Terms_Controller',
					'rest_namespace'        => 'wp/v2',
					'show_in_quick_edit'    => $show_in_quick_edit,
					'sort'                  => false,
					'show_in_graphql'       => false,
				)
			);
		}
	},
	9,
	0
);

/**
 * Change the default post type name and unregister the post tag taxonomy.
 */
add_action(
	'init',
	function () {
		$name = '新着情報';

		$post_object = get_post_type_object( 'post' );
		$labels      = $post_object->labels;

		$post_object->label     = $name;
		$labels->name           = $name;
		$labels->singular_name  = $name;
		$labels->menu_name      = $name;
		$labels->name_admin_bar = $name;
		$labels->all_items      = "{$name}一覧";
		$labels->view_item      = "{$name}を表示";
		$labels->view_items     = "{$name}一覧を表示";

		$post_object->menu_position = 25;

		unregister_taxonomy_for_object_type( 'post_tag', 'post' );
	},
	10,
	0
);

/**
 * Disable single page for testimonial post type
 */
add_filter( 'testimonial_rewrite_rules', '__return_empty_array' );
