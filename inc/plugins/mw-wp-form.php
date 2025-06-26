<?php
function mvwpform_autop_filter()
{
  if (class_exists('MW_WP_Form_Admin')) {
    $mw_wp_form_admin = new MW_WP_Form_Admin();
    $forms = $mw_wp_form_admin->get_forms();
    foreach ($forms as $form) {
      add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
    }
  }
}
mvwpform_autop_filter();

//MW WP FORM css削除
function cut_plugin_css()
{
  wp_deregister_style('mw-wp-form');
}
add_action('wp_enqueue_scripts', 'cut_plugin_css', 100);


function handle_form_completion()
{
  $current_url = $_SERVER['REQUEST_URI'];
  $target_page = 'complete';

  if (strpos($current_url, $target_page) !== false) {
    global $post;
    $content = $post->post_content;
    preg_match_all('/\[mwform_formkey key="([0-9]+)"\]/', $content, $matches);

    $form_ids = !empty($matches[1]) ? $matches[1] : ['203']; // デフォルト値として203を設定
    $cookie_names = [];

    foreach ($form_ids as $id) {
      $cookie_names[] = "mw-wp-form_session_mw-wp-form-{$id}";
      $cookie_names[] = "mw-wp-form_session_mw-wp-form-{$id}-validation-error";
      $cookie_names[] = "mw-wp-form_session_mw-wp-form-{$id}-meta";
    }

    foreach ($cookie_names as $cookie_name) {
      if (isset($_COOKIE[$cookie_name])) {
        setcookie($cookie_name, '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
        unset($_COOKIE[$cookie_name]);
      }

      if (session_status() === PHP_SESSION_ACTIVE) {
        $session_key = str_replace('mw-wp-form_session_', '', $cookie_name);
        if (isset($_SESSION[$session_key])) {
          unset($_SESSION[$session_key]);
        }
      }
    }
  }
}

add_action('template_redirect', 'handle_form_completion', 1);

