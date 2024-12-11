<?php

/**
 * Custom post types
 * @package Headless_Site_Tools
 */
class Tools_Custom_Post_Types
{
    public static function init()
    {
        add_action("init", [__CLASS__, "register_post_types"]);
    }

    public static function register_post_types()
    {
        // Projects CPT
        $projects_args = [
            "labels" => [
                "name" => "Projects",
                "singular_name" => "Project",
                "add_new" => "Add New Project",
                "add_new_item" => "Add New Project",
                "edit_item" => "Edit Project",
                "new_item" => "New Project",
                "view_item" => "View Project",
                "search_items" => "Search Projects",
                "not_found" => "No projects found",
                "not_found_in_trash" => "No projects found in Trash",
            ],
            "public" => true,
            "has_archive" => true,
            "supports" => [
                "title",
                "editor",
                "thumbnail",
                "excerpt",
                "custom-fields",
            ],
            "show_in_rest" => true,
            "rest_base" => "projects",
            "rewrite" => ["slug" => "projects"],
            "menu_icon" => "dashicons-portfolio",
            "show_ui" => true,
            "show_in_menu" => true,
            "hierarchical" => false,
        ];

        register_post_type("projects", $projects_args);
    }
}
