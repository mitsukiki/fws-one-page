<?php
if (!defined('ABSPATH'))
	exit;
/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_date()) {
		$title = get_the_time('Y年n月');
	} elseif (is_search()) {
		$title = '検索結果：' . esc_html(get_search_query(false));
	} elseif (is_404()) {
		$title = '「404」ページが見つかりません';
	} else {
	}
	return $title;
});


if (!function_exists('add_additional_class_on_li')) :
	// wp_nav_menuのliにclass追加
	function add_additional_class_on_li($classes, $item, $args)
	{
		if (isset($args->add_li_class)) {
			$classes['class'] = $args->add_li_class;
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
endif;

if (!function_exists('add_additional_class_on_a')) :
	// wp_nav_menuのaにclass追加
	function add_additional_class_on_a($classes, $item, $args)
	{
		if (isset($args->add_li_class)) {
			$classes['class'] = $args->add_a_class;
		}
		return $classes;
	}
	add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);
endif;

if (!function_exists('custom_posts_per_page')) :
	function custom_posts_per_page($query)
	{
		if (is_admin() || !$query->is_main_query())
			return;
		if ($query->is_post_type_archive('lookbook')) { // カスタム投稿タイプを指定
			$query->set('posts_per_page', '4'); // 表示件数を指定
		}
		if ($query->is_post_type_archive('brands')) { // カスタム投稿タイプを指定
			$query->set('posts_per_page', '50'); // 表示件数を指定
		}
	}
	add_action('pre_get_posts', 'custom_posts_per_page');
endif;

if (!function_exists('my_get_archives_link')) :
	function my_get_archives_link($html)
	{
		return preg_replace('/<\/a>/', '年</a>', $html);
	}
	add_filter('get_archives_link', 'my_get_archives_link');
endif;

if (!function_exists('remove_date_from_archive_links')) :
	function remove_date_from_archive_links($link)
	{
		return str_replace('/date/', '/', $link);
	}
	add_filter('get_archives_link', 'remove_date_from_archive_links');
endif;
