<?php
if (!defined('ABSPATH'))
    exit;

// PHPパースエラー時にもHMRスクリプトを確実に出力するための関数
function output_vite_hmr_script()
{
    if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {
        // バッファリング開始
        ob_start();

        // エラーハンドリング
        register_shutdown_function(function () {
            $error = error_get_last();

            // 致命的なエラーが発生した場合でも HMR スクリプトを出力
            if ($error !== NULL && in_array($error['type'], [E_ERROR, E_PARSE])) {
                // 既存の出力をクリア
                ob_clean();

                // 最小限のHTML構造とHMRスクリプトを出力
                echo '<!DOCTYPE html><html><head>';
                echo '<meta charset="UTF-8">';
                echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
                echo '</head><body>';
                echo '<div style="padding: 20px; background: #f44336; color: white; font-family: sans-serif;">';
                echo '<h2>PHP Error Detected</h2>';
                echo '<pre>' . htmlspecialchars($error['message']) . '</pre>';
                echo '<p>File: ' . htmlspecialchars($error['file']) . ' on line ' . $error['line'] . '</p>';
                echo '</div>';
                echo '</body></html>';
            }
        });

        // 通常のWordPress実行時のHMR設定
        if (!function_exists('vite_head_module_hook')):
            function vite_head_module_hook()
            {
                // jQueryを開発環境でも読み込む
                wp_enqueue_script('jquery');

                // Viteの開発用スクリプトを出力
                echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
            }
            // wp_headアクションの前にjQueryを確実に読み込むため、優先度を調整
            add_action('wp_enqueue_scripts', function () {
                wp_enqueue_script('jquery');
            }, 1);
            add_action('wp_head', 'vite_head_module_hook');
        endif;

        // トップページのみ特定のJSを読み込む
        function vite_head_module_hook_top()
        {
            if (is_front_page() || is_home()) {
                // jQueryを開発環境でも読み込む
                wp_enqueue_script('jquery');

            }
        }
        add_action('wp_head', 'vite_head_module_hook_top');
    } else {
        // プロダクションビルド時の処理
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_style('base-style', get_stylesheet_uri(), array(), _BASE_VERSION);

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }

            $manifest = json_decode(file_get_contents(DIST_PATH . '/manifest.json'), true);

            if (is_array($manifest)) {
                $manifest_key = array_keys($manifest);
                if (isset($manifest_key[0])) {
                    // CSSファイルの読み込み
                    foreach (@$manifest['main.js']['css'] as $css_file) {
                        wp_enqueue_style('main_css', DIST_URI . '/' . $css_file, array(), _BASE_VERSION, false);
                    }

                    // メインJSファイルの読み込み
                    $js_file = @$manifest['main.js']['file'];
                    if (!empty($js_file)) {
                        wp_enqueue_script('main_js', DIST_URI . '/' . $js_file, JS_DEPENDENCY, _BASE_VERSION, JS_LOAD_IN_FOOTER);
                        add_filter('script_loader_tag', function ($tag, $handle) {
                            if ('main_js' !== $handle) {
                                return $tag;
                            }
                            return str_replace(' src', ' type="module" src', $tag);
                        }, 10, 2);
                    }
                }
            }
        });
    }
}

// 初期化時に実行
output_vite_hmr_script();

//管理画面用
// add_action('admin_enqueue_scripts', function () {

//     if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {

//         function vite_head_module_hook()
//         {
//             echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ADMIN_ENTRY_POINT . '"></script>';
//         }
//         add_action('admin_head', 'vite_head_module_hook');

//     } else {

//         // manifest.jsonを読み込んでエンキューするファイルを決定する
//         $manifest = json_decode(file_get_contents(DIST_PATH . '/manifest.json'), true);

//         // JSファイルをエンキュー
//         if (!empty($manifest['admin.js']['file'])) {
//             $js_admin_file = $manifest['admin.js']['file'];
//             wp_enqueue_script('admin-main', DIST_URI . '/' . $js_admin_file, JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER);
//         }

//     }

// });



// ブロックライブラリのスタイルを削除する処理をコメントアウト
// add_action('wp_print_styles', 'wps_deregister_styles', 100);
// function wps_deregister_styles()
// {
//     wp_dequeue_style('wp-block-library');
// }


add_action('wp_enqueue_scripts', 'add_layer_to_global_styles', 20);

function add_layer_to_global_styles()
{
    // グローバルスタイルハンドルを取得
    $global_styles_handle = 'global-styles';

    // 既存のインラインスタイルを取得
    $existing_styles = wp_styles()->get_data($global_styles_handle, 'after');

    if (!empty($existing_styles)) {
        // 既存のスタイルをクリア
        wp_styles()->add_data($global_styles_handle, 'after', '');

        // レイヤーでラップして再追加
        $layered_styles = '@layer tailwind-base, custom-base, wp-base, tailwind-components, custom-components, tailwind-utilities;  @layer wp-base {' . implode('', $existing_styles) . '}';
        wp_add_inline_style($global_styles_handle, $layered_styles);
    }
}