<?php
if (!defined('ABSPATH'))
exit;
define('IS_VITE_DEVELOPMENT', true);

// Replace the version number of the theme on each release.
define('_BASE_VERSION', '1.0.0');

// dist subfolder - defined in vite.config.json
define('DIST_DEF', 'dist');

// defining some base urls and paths
define('DIST_URI', get_template_directory_uri() . '/' . DIST_DEF);
define('DIST_PATH', get_template_directory() . '/' . DIST_DEF);

// js enqueue settings
define('JS_DEPENDENCY', array()); // array('jquery') as example
define('JS_LOAD_IN_FOOTER', true); // load scripts in footer?

// deafult server address, port and entry point can be customized in vite.config.json
define('VITE_SERVER', "http://localhost" . ':5179');
define('VITE_ENTRY_POINT', '/main.js');
define('VITE_ADMIN_ENTRY_POINT', '/admin.js');

if(!function_exists('_log')){
    function _log($message) {
        error_log(WP_DEBUG);
        if (WP_DEBUG === true) {
            if (is_array($message) || is_object($message)) {
                error_log(print_r($message, true));
            } else {
                error_log($message);
            }
        }
    }
}