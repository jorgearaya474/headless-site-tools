<?php

/**
 * REST API Config
 * @package Headless_Site_Tools
 */
class Tools_REST_API
{
    public static function init()
    {
        add_action("rest_api_init", [__CLASS__, "add_metaboxes_rest_api"]);
    }

    public static function add_metaboxes_rest_api()
    {
        // Meta title and description for Projects and Posts
        register_rest_field("post", "meta_title", [
            "get_callback" => [__CLASS__, "get_meta_title"],
            "update_callback" => null,
            "shema" => null,
        ]);

        register_rest_field("post", "meta_description", [
            "get_callback" => [__CLASS__, "get_meta_description"],
            "update_callback" => null,
            "shema" => null,
        ]);

        // Projects information
        register_rest_field("projects", "project_url", [
            "get_callback" => [__CLASS__, "get_project_url"],
            "update_callback" => null,
            "shema" => null,
        ]);
    }

    public static function get_meta_title($object)
    {
        return get_post_meta($object["id"], "_meta_title", true);
    }

    public static function get_meta_description($object)
    {
        return get_post_meta($object["id"], "_meta_description", true);
    }

    public static function get_project_url($object)
    {
        return get_post_meta($object["id"], "_project_url", true);
    }
}
