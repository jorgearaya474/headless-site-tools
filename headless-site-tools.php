<?php
/**
 * Plugin Name: Headless Site Tools
 * Description: Tools for headless WordPress.
 * Version: 1.0
 * Author: Jorge Araya
 * License: GPL2
 */

if (!defined("ABSPATH")) {
    exit();
}

define("HEADLESS_SITE_TOOLS_PLUGIN_DIR", plugin_dir_path(__FILE__));

require_once HEADLESS_SITE_TOOLS_PLUGIN_DIR .
    "includes/class-custom-post-types.php";
require_once HEADLESS_SITE_TOOLS_PLUGIN_DIR . "includes/class-metaboxes.php";
require_once HEADLESS_SITE_TOOLS_PLUGIN_DIR . "includes/class-rest.php";

add_action("plugins_loaded", function () {
    Tools_Custom_Post_Types::init();
    Tools_Metaboxes::init();
    Tools_REST_API::init();
});
