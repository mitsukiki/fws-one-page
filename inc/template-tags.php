<?php
if (!defined('ABSPATH'))
	exit;
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package base
 */


if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;

if (!function_exists('breadcrumbs')) :
	function breadcrumbs( $args = array() ) {
		global $post;
		$str      = '';
		$defaults = array(
			'class'     => 'breadcrumbs-main',
			'home'      => 'TOP',
			'blog_home' => 'NEWS',
			'search'    => 'serch for',
			'tag'       => 'tag',
			'author'    => 'author',
			'notfound'  => '404 Not found',
			'separator' => '&nbsp;>&nbsp;',
		);
	
		$args = wp_parse_args( $args, $defaults );
		extract( $args, EXTR_SKIP );
		if ( is_front_page() ) {
			echo '<ul class="' . $class . '__list"><li class="' . $class . '__item">' . $home . '</li></ul>';
		}
		if ( is_home() ) {
			echo '<ul class="' . $class . '__list"><li class="' . $class . '__item"><a class="' . $class . '__link" href="' . home_url() . '/"><span>' . $home . '</span></a></li><li class="' . $class . '__item">' . $separator . '</li><li class="' . $class . '__item">' . $blog_home . '</li></ul>';
		}
	
		if ( ! is_home() && ! is_admin() ) {
			$str        .= '<ul class="' . $class . '__list">';
			$str        .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . home_url() . '/"><span>' . $home . '</span></a></li>';
			$str        .= '<li class="' . $class . '__item">' . $separator . '</li>';
			$my_taxonomy = get_query_var( 'taxonomy' );
			$cpt         = get_query_var( 'post_type' );
	
			if ( $my_taxonomy && is_tax( $my_taxonomy ) ) {
				$my_tax     = get_queried_object();
				$post_types = get_taxonomy( $my_taxonomy )->object_type;
				$cpt        = $post_types[0];
				if($cpt == 'faq'){
					$str       .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . home_url("support") . '"><span>サポート情報</span></a></li>';
					$str       .= '<li class="' . $class . '__item">' . $separator . '</li>';
				}else{
					$str       .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_post_type_archive_link( $cpt ) . '"><span>' . get_post_type_object( $cpt )->label . '</span></a></li>';
					$str       .= '<li class="' . $class . '__item">' . $separator . '</li>';
				}

	
				if ( $my_tax->parent != 0 ) {
					$ancestors = array_reverse( get_ancestors( $my_tax->term_id, $my_tax->taxonomy ) );
	
					foreach ( $ancestors as $ancestor ) {
						$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_term_link( $ancestor, $my_tax->taxonomy ) . '"><span>' . get_term( $ancestor, $my_tax->taxonomy )->name . '</span></a></li>';
						$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
					}
				}
				$str .= '<li class="' . $class . '__item">' . $my_tax->name . '</li>';
			} elseif ( is_category() ) {
				$cat = get_queried_object();
				if ( $cat->parent != 0 ) {
					$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
					foreach ( $ancestors as $ancestor ) {
						$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_category_link( $ancestor ) . '"><span>' . get_cat_name( $ancestor ) . '</span></a></li>';
						$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
					}
				}
				$str .= '<li class="' . $class . '__item">' . $cat->name . '</li>';
			} elseif ( is_post_type_archive() ) {
				$cpt  = get_query_var( 'post_type' );
				$str .= '<li class="' . $class . '__item">' . get_post_type_object( $cpt )->label . '</li>';
			} elseif ( $cpt && is_singular( $cpt ) ) {
				$taxes = get_object_taxonomies( $cpt );
				$label = get_post_type_object( get_post_type() )->label;
				$url = get_post_type_archive_link($cpt);
				if($cpt == 'faq'){
					$url = home_url('support');
					$label = "サポート情報";
				}
				$str  .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . $url . '"><span>' . $label . '</span></a></li>';
				$str  .= '<li class="' . $class . '__item">' . $separator . '</li>';
				$str  .= '<li class="' . $class . '__item">' . strip_tags( $post->post_title ) . '</li>';
			} elseif ( is_single() ) {
				$categories = get_the_category( $post->ID );
				$cat        = get_youngest_cat( $categories );
				if ( $cat->parent != 0 ) {
					$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
					foreach ( $ancestors as $ancestor ) {
						$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_category_link( $ancestor ) . '"><span>' . get_cat_name( $ancestor ) . '</span></a></li>';
						$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
					}
				}
				$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_category_link( $cat->cat_ID ) . '"><span>' . $cat->cat_name . '</span></a></li>';
				$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
				$str .= '<li class="' . $class . '__item">' . $post->post_title . '</li>';
			} elseif ( is_page() ) {
				if ( $post->post_parent != 0 ) {
					$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
					foreach ( $ancestors as $ancestor ) {
						$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_permalink( $ancestor ) . '"><span>' . get_the_title( $ancestor ) . '</span></a></li>';
						$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
					}
				}
				$str .= '<li class="' . $class . '__item">' . $post->post_title . '</li>';
			} elseif ( is_date() ) {
				if ( get_query_var( 'day' ) != 0 ) {
					$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_year_link( get_query_var( 'year' ) ) . '"><span>' . get_query_var( 'year' ) . '年</span></a></li>';
					$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
					$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ) . '" itemprop="url"><span>' . get_query_var( 'monthnum' ) . '月</span></a></li>';
					$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
					$str .= '<li class="' . $class . '__item">' . get_query_var( 'day' ) . '日</li>';
				} elseif ( get_query_var( 'monthnum' ) != 0 ) {
					$str .= '<li class="' . $class . '__item"><a class="' . $class . '__link" href="' . get_year_link( get_query_var( 'year' ) ) . '"><span>' . get_query_var( 'year' ) . '年</span></a></li>';
					$str .= '<li class="' . $class . '__item">' . $separator . '</li>';
					$str .= '<li class="' . $class . '__item">' . get_query_var( 'monthnum' ) . '月</li>';
				} else {
					$str .= '<li class="' . $class . '__item">' . get_query_var( 'year' ) . '年</li>';
				}
			} elseif ( is_search() ) {
				$str .= '<li class="' . $class . '__item">' . $search . '「' . get_search_query() . '」</li>';
			} elseif ( is_author() ) {
				$str .= '<li class="' . $class . '__item">' . $author . ' : ' . get_the_author_meta( 'display_name', get_query_var( 'author' ) ) . '</li>';
			} elseif ( is_tag() ) {
				$str .= '<li class="' . $class . '__item">' . $tag . ' : ' . single_tag_title( '', false ) . '</li>';
			} elseif ( is_attachment() ) {
				$str .= '<li class="' . $class . '__item">' . $post->post_title . '</li>';
			} elseif ( is_404() ) {
				$str .= '<li class="' . $class . '__item">' . $notfound . '</li>';
			} else {
				$str .= '<li class="' . $class . '__item">' . wp_title( '', true ) . '</li>';
			}
	
			$str .= '</ul>';
		}
		echo str_replace( '<br>', '', $str );
	}
endif;

if (!function_exists('get_youngest_cat')) :
	function get_youngest_cat( $categories ) {
		global $post;
		if ( count( $categories ) == 1 ) {
			$youngest = $categories[0];
		} else {
			$count = 0;
			foreach ( $categories as $category ) {
				$children = get_term_children( $category->term_id, 'category' );
				if ( $children ) {
					if ( $count < count( $children ) ) {
						$count        = count( $children );
						$lot_children = $children;
						foreach ( $lot_children as $child ) {
							if ( in_category( $child, $post->ID ) ) {
								$youngest = get_category( $child );
							}
						}
					}
				} else {
					$youngest = $category;
				}
			}
		}
		return $youngest;
	}
	
	
endif;
if (!function_exists('get_youngest_tax')) :
	function get_youngest_tax( $taxes, $mytaxonomy ) {
		global $post;
		if ( count( $taxes ) == 1 ) {
			$youngest = $taxes[ key( $taxes ) ];
		} else {
			$count = 0;
			foreach ( $taxes as $tax ) {
				$children = get_term_children( $tax->term_id, $mytaxonomy );
				if ( $children ) {
					if ( $count < count( $children ) ) {
						$count        = count( $children );
						$lot_children = $children;
						foreach ( $lot_children as $child ) {
							if ( is_object_in_term( $post->ID, $mytaxonomy ) ) {
								$youngest = get_term( $child, $mytaxonomy );
							}
						}
					}
				} else {
					$youngest = $tax;
				}
			}
		}
		return $youngest;
	}
endif;


if (!function_exists('truncate_post_title')) :

	function truncate_post_title($post,$max_length = 40)
	{
		if (mb_strlen($post->post_title) > $max_length) {
			$title = mb_substr($post->post_title, 0, $max_length);
			echo $title . '...';
		} else {
			echo $post->post_title;
		}
	}
endif;
