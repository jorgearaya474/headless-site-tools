<?php

/**
 * Custom Metaboxes
 * @package Headless_Site_Tools
 */
class Tools_Metaboxes
{
    public static function init()
    {
        add_action("add_meta_boxes", [__CLASS__, "add_metaboxes"]);
        add_action("save_post", [__CLASS__, "save_metaboxes"], 10, 2);
    }

    public static function add_metaboxes()
    {
        // Metabox for meta title and description
        add_meta_box(
            "seo_metabox",
            "SEO Information",
            [__CLASS__, "show_seo_metabox"],
            null,
            "normal",
            "high"
        );

        // Metabox for project information
        add_meta_box(
            "project_information_metabox",
            "Project Information",
            [__CLASS__, "show_project_information_metabox"],
            "projects",
            "side",
            "low"
        );
    }

    /**
     * Show SEO metaboxes
     */
    public static function show_seo_metabox($post)
    {
        // Get current values if exists
        $meta_title = get_post_meta($post->ID, "_meta_title", true);
        $meta_description = get_post_meta($post->ID, "_meta_description", true);
        ?>

        <label for="meta_title">Meta Title:</label>
        <input type="text" id="meta_title" name="meta_title" value="<?php echo esc_attr(
            $meta_title
        ); ?>" class="widefat" />

        <label for="meta_description">Meta Description:</label>
        <textarea id="meta_description" name="meta_description" class="widefat" rows="6"><?php echo esc_textarea(
            $meta_description
        ); ?></textarea>

        <?php
    }

    /**
     * Show Project metaboxes
     */
    public static function show_project_information_metabox($post)
    {
        // Get current values if exists
        $project_url = get_post_meta($post->ID, "_project_url", true); ?>

        <label for="project_url">Meta Title:</label>
        <input type="url" id="project_url" name="project_url" value="<?php echo esc_url(
            $project_url
        ); ?>" class="widefat" />

        <?php
    }

    /**
     * Save Metaboxes
     */
    public static function save_metaboxes($post_id, $post)
    {
        // Check autosave
        if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Save the values
        if (isset($_POST["meta_title"])) {
            update_post_meta(
                $post_id,
                "_meta_title",
                sanitize_text_field($_POST["meta_title"])
            );
        }

        if (isset($_POST["meta_description"])) {
            update_post_meta(
                $post_id,
                "_meta_description",
                sanitize_textarea_field($_POST["meta_description"])
            );
        }

        if (isset($_POST["project_url"]) && $post->post_type === "projects") {
            update_post_meta(
                $post_id,
                "_project_url",
                esc_url_raw($_POST["project_url"])
            );
        }
    }
}
