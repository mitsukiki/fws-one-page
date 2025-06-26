<?php
if (!defined('ABSPATH'))
exit;
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->submenu_class)) {
            $submenu_class = $args->submenu_class;
        } else {
            $submenu_class = 'sub-menu';
        }
        
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"$submenu_class\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if ($depth > 0 && isset($args->submenu_item_class)) {
            $classes[] = $args->submenu_item_class;
        }

        if (isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';

        $link_class = isset($args->add_a_class) ? $args->add_a_class : '';
        if ($depth > 0 && isset($args->submenu_link_class)) {
            $link_class .= ' ' . $args->submenu_link_class;
        }
        $attributes .= ' class="' . trim($link_class) . '"';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}