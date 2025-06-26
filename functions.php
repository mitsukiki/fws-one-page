<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

require_once get_template_directory() . '/inc/constants.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/hook.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/shortcode.php';

require_once get_template_directory() . '/inc/template-tags.php';

require_once get_template_directory() . '/inc/class-custom-walker.php';

require_once get_template_directory() . '/inc/rewrite-rules.php';

require_once get_template_directory() . '/inc/plugins/mw-wp-form.php';
require_once get_template_directory() . '/inc/plugins/acf.php';

// CSS変数でロゴサイズを管理
function add_logo_size_css_variables()
{
    if (!class_exists('CustomSettingsPlugin')) {
        return;
    }

    $header_logo_width_pc = CustomSettingsPlugin::get_setting('header_logo_width_pc') ?: '150px';
    $header_logo_width_sp = CustomSettingsPlugin::get_setting('header_logo_width_sp') ?: '120px';
    $footer_logo_width_pc = CustomSettingsPlugin::get_setting('footer_logo_width_pc') ?: '120px';
    $footer_logo_width_sp = CustomSettingsPlugin::get_setting('footer_logo_width_sp') ?: '100px';

    echo "<style>
    :root {
        --header-logo-width-pc: {$header_logo_width_pc};
        --header-logo-width-sp: {$header_logo_width_sp};
        --footer-logo-width-pc: {$footer_logo_width_pc};
        --footer-logo-width-sp: {$footer_logo_width_sp};
    }
    </style>";
}
add_action('wp_head', 'add_logo_size_css_variables');

