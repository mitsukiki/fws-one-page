<?php
if (!defined('ABSPATH'))
	exit;
if (!function_exists('base_setup')) :
	function base_setup()
	{

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// remove_menu_page('edit-comments.php'); // コメント

		/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
		add_theme_support('title-tag');

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header-nav-pc' => esc_html__('Header Navigation PC', 'base'),
			)
		);
		register_nav_menus(
			array(
				'header-nav-sp' => esc_html__('Header Navigation SP', 'base'),
			)
		);
		
		register_nav_menus(
			array(
				'footer-nav' => esc_html__('Footer Navigation', 'base'),
			)
		);

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support('responsive-embeds');
		
		// ブロックエディタのフルサイト編集サポート
		add_theme_support('editor-styles');
		add_editor_style('dist/editor-style.css');

		// add_filter('show_admin_bar', '__return_false');
		remove_filter('term_description', 'wpautop');
	}
	add_action('after_setup_theme', 'base_setup');
endif;

if (!function_exists('wp_document_title_separator')) :
	function wp_document_title_separator($separator)
	{
		$separator = '|';
		return $separator;
	}
	add_filter('document_title_separator', 'wp_document_title_separator');
endif;

if (!function_exists('Change_menulabel')) :
	function Change_menulabel()
	{
		global $menu;
		global $submenu;
		$name = 'ニュース';
		$menu[5][0] = $name;
		$submenu['edit.php'][5][0] = $name . '一覧';
		$submenu['edit.php'][10][0] = '新しい' . $name;
	}
	add_action('admin_menu', 'Change_menulabel');
endif;
// if (!function_exists('Change_objectlabel')) :
// 	function Change_objectlabel()
// 	{
// 		global $wp_post_types;
// 		$name = 'ニュース';
// 		$labels = &$wp_post_types['post']->labels;
// 		$labels->name = $name;
// 		$labels->singular_name = $name;
// 		$labels->add_new = _x('追加', $name);
// 		$labels->add_new_item = $name . 'の新規追加';
// 		$labels->edit_item = $name . 'の編集';
// 		$labels->new_item = '新規' . $name;
// 		$labels->view_item = $name . 'を表示';
// 		$labels->search_items = $name . 'を検索';
// 		$labels->not_found = $name . 'が見つかりませんでした';
// 		$labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
// 	}
// 	add_action('init', 'Change_objectlabel');
// endif;

if (!function_exists('remove_menus')) :
	function remove_menus()
	{
		remove_menu_page('edit-comments.php'); // コメント
	}
	add_action('admin_menu', 'remove_menus', 999);
endif;
