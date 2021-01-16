<?php
/**
 * Plugin Name:       Writer costum post type 
 * Plugin URI:        https://kingsoftheweb.net/
 * Description:       Custom post type for Writers info
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mohammed Rezq
 * Author URI:        https://www.webmasteronlinedev.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       writer-cpt
 * Domain Path:       /languages
 */
if (! defined('ABSPATH') ) {
    exit; // No access of directly access.
}

// Define Constants.
define('WRITER_CUSTOM_POST_TYPE', '1.0.0');
define('WRITER_CUSTOM_POST_TYPE_URL', plugins_url('/', __FILE__));
define('WRITER_CUSTOM_POST_TYPE_PATH', plugin_dir_path(__FILE__));
define('WRITER_CUSTOM_POST_TYPE_FILE', __FILE__);
define('WRITER_CUSTOM_POST_TYPE_BASENAME', plugin_basename(WRITER_CUSTOM_POST_TYPE_FILE));
define('WRITER_CUSTOM_POST_TYPE_STABLE_VERSION', '1.0.0');

require_once WRITER_CUSTOM_POST_TYPE_PATH . 'includes/core.php';

