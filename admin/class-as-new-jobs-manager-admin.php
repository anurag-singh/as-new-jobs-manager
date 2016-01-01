<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    AS_New_Jobs_Manager
 * @subpackage AS_New_Jobs_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    AS_New_Jobs_Manager
 * @subpackage AS_New_Jobs_Manager/admin
 * @author     Your Name <email@example.com>
 */
class AS_New_Jobs_Manager_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in AS_New_Jobs_Manager_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The AS_New_Jobs_Manager_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in AS_New_Jobs_Manager_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The AS_New_Jobs_Manager_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

    }

    /**
     * Add custom post type
     *
     * @since    1.0.0
     */
    public function create_cpt_job() {

        /**
         * This function add a custom post type - 'job'
         */

        $cpt_name = 'as-JoB';

        $cpt_name = ucfirst(strtolower($cpt_name));


        $last_character = substr($cpt_name, -1);

        if ($last_character === 'y') {
            $plural = substr_replace($cpt_name, 'ies', -1);
        }
        else {
            $plural = $cpt_name.'s'; // add 's' to convert singular name to plural
        }


        $textdomain = strtolower($cpt_name);
        $cap_type = 'post';
        $single = ucfirst(strtolower($cpt_name));

            $opts['can_export'] = TRUE;
            $opts['capability_type'] = $cap_type;
            $opts['description'] = '';
            $opts['exclude_from_search'] = FALSE;
            $opts['has_archive'] = TRUE;        // Enable 'Post type' archive page
            $opts['hierarchical'] = FALSE;
            $opts['map_meta_cap'] = TRUE;
            $opts['menu_icon'] = 'dashicons-flag';
            $opts['menu_position'] = 25;
            $opts['public'] = TRUE;
            $opts['publicly_querable'] = TRUE;
            $opts['query_var'] = TRUE;
            $opts['register_meta_box_cb'] = '';
            $opts['rewrite'] = FALSE;
            $opts['show_in_admin_bar'] = TRUE;  // 'Top Menu' bar
            $opts['show_in_menu'] = TRUE;
            $opts['show_in_nav_menu'] = TRUE;
            $opts['show_ui'] = TRUE;
            $opts['supports'] = array( 'title');
            $opts['taxonomies'] = array('department');

            $opts['capabilities']['delete_others_posts'] = "delete_others_{$cap_type}s";

            $opts['labels']['add_new'] = __( "Add New {$single}", $textdomain );
            $opts['labels']['add_new_item'] = __( "Add New {$single}", $textdomain );
            $opts['labels']['all_items'] = __( $plural, $textdomain );
            $opts['labels']['edit_item'] = __( "Edit {$single}" , $textdomain);
            $opts['labels']['menu_name'] = __( $plural, $textdomain );
            $opts['labels']['name'] = __( $plural, $textdomain );
            $opts['labels']['name_admin_bar'] = __( $single, $textdomain );
            $opts['labels']['new_item'] = __( "New {$single}", $textdomain );
            $opts['labels']['not_found'] = __( "No {$plural} Found", $textdomain );
            $opts['labels']['not_found_in_trash'] = __( "No {$plural} Found in Trash", $textdomain );
            $opts['labels']['parent_item_colon'] = __( "Parent {$plural} :", $textdomain );
            $opts['labels']['search_items'] = __( "Search {$plural}", $textdomain );
            $opts['labels']['singular_name'] = __( $single, $textdomain );
            $opts['labels']['view_item'] = __( "View {$single}", $textdomain );

            $opts['rewrite']['ep_mask'] = EP_PERMALINK;
            $opts['rewrite']['feeds'] = FALSE;
            $opts['rewrite']['pages'] = TRUE;
            $opts['rewrite']['slug'] = __( strtolower( $single ), $textdomain );
            $opts['rewrite']['with_front'] = FALSE;

        register_post_type( $single, $opts );
    }

    /**
     * Create a new custom taxonomy
     *
     * @since    1.0.0
     */
    public function create_taxo_job_cat() {

        /**
         * Create a new custom taxonomy 'job-cat'
         */

        $post_type = 'as-job';
        // $all_taxonomies = array('department');
        $all_taxonomies = array('jobpost category', 'jobpost job type', 'jobpost location', 'jobpost qualification', 'jobpost experience', 'jobpost ctc');

        foreach ($all_taxonomies as $single) {

            $single = ucwords(strtolower(preg_replace('/\s+/', ' ', $single) ));

            $last_character = substr($single, -1);

                if ($last_character === 'y') {
                    $plural = substr_replace($single, 'ies', -1);
                }
                else {
                    $plural = $single.'s'; // add 's' to convert singular name to plural
                }

            // add a 'post_type' as prefix followed by a '_'
            // $tax_slug = $post_type.'_'.strtolower(str_replace(' ', '_', $single));
            $tax_slug = strtolower(str_replace(' ', '_', $single));

            $opts['hierarchical'] = TRUE;
            //$opts['meta_box_cb'] = '';
            $opts['public'] = TRUE;
            $opts['query_var'] = $tax_slug;
            $opts['show_admin_column'] = TRUE;      // WP Admin > All CPT
            $opts['show_in_nav_menus'] = FALSE;     // WP Admin > Appearance > Menu
            $opts['show_tag_cloud'] = TRUE;
            $opts['show_ui'] = TRUE;
            $opts['sort'] = '';
            //$opts['update_count_callback'] = '';

            $opts['capabilities']['assign_terms'] = 'edit_posts';
            $opts['capabilities']['delete_terms'] = 'manage_categories';
            $opts['capabilities']['edit_terms'] = 'manage_categories';
            $opts['capabilities']['manage_terms'] = 'manage_categories';

            $opts['labels']['add_new_item'] = __( "Add New $single", 'plugin-name' );
            $opts['labels']['add_or_remove_items'] = __( "Add or remove {$plural}", 'plugin-name' );
            $opts['labels']['all_items'] = __( $plural, 'plugin-name' );
            $opts['labels']['choose_from_most_used'] = __( "Choose from most used {$plural}", 'plugin-name' );
            $opts['labels']['edit_item'] = __( "Edit {$single}" , 'plugin-name');
            $opts['labels']['menu_name'] = __( $plural, 'plugin-name' );
            $opts['labels']['name'] = __( $plural, 'plugin-name' );
            $opts['labels']['new_item_name'] = __( "New {$single} Name", 'plugin-name' );
            $opts['labels']['not_found'] = __( "No {$plural} Found", 'plugin-name' );
            $opts['labels']['parent_item'] = __( "Parent {$single}", 'plugin-name' );
            $opts['labels']['parent_item_colon'] = __( "Parent {$single}:", 'plugin-name' );
            $opts['labels']['popular_items'] = __( "Popular {$plural}", 'plugin-name' );
            $opts['labels']['search_items'] = __( "Search {$plural}", 'plugin-name' );
            $opts['labels']['separate_items_with_commas'] = __( "Separate {$plural} with commas", 'plugin-name' );
            $opts['labels']['singular_name'] = __( $single, 'plugin-name' );
            $opts['labels']['update_item'] = __( "Update {$single}", 'plugin-name' );
            $opts['labels']['view_item'] = __( "View {$single}", 'plugin-name' );

            $opts['rewrite']['ep_mask'] = EP_NONE;
            $opts['rewrite']['hierarchical'] = FALSE;
            $opts['rewrite']['slug'] = __( $tax_slug, 'plugin-name' );
            $opts['rewrite']['with_front'] = FALSE;

            register_taxonomy( $tax_slug, $post_type, $opts );
        }
    }


    /**
     * Add custom post type
     *
     * @since    1.0.0
     */
    public function create_cpt_candidate() {

        /**
         * This function add a custom post type - 'job'
         */

        $cpt_name = 'jobpost_applicants';

        $cpt_name = ucfirst(strtolower($cpt_name));


        $last_character = substr($cpt_name, -1);

        if ($last_character === 'y') {
            $plural = substr_replace($cpt_name, 'ies', -1);
        }
        else {
            $plural = $cpt_name.'s'; // add 's' to convert singular name to plural
        }


        $textdomain = strtolower($cpt_name);
        $cap_type = 'post';
        $single = ucfirst(strtolower($cpt_name));

            $opts['can_export'] = TRUE;
            $opts['capability_type'] = $cap_type;
            $opts['description'] = '';
            $opts['exclude_from_search'] = FALSE;
            $opts['has_archive'] = TRUE;        // Enable 'Post type' archive page
            $opts['hierarchical'] = FALSE;
            $opts['map_meta_cap'] = TRUE;
            $opts['menu_icon'] = 'dashicons-images-alt2';
            $opts['menu_position'] = 25;
            $opts['public'] = TRUE;
            $opts['publicly_querable'] = TRUE;
            $opts['query_var'] = TRUE;
            $opts['register_meta_box_cb'] = '';
            $opts['rewrite'] = FALSE;
            $opts['show_in_admin_bar'] = TRUE;  // 'Top Menu' bar
            $opts['show_in_menu'] = 'edit.php?post_type=as-job';
            $opts['show_in_nav_menu'] = TRUE;
            $opts['show_ui'] = TRUE;
            $opts['supports'] = array( 'title');
            $opts['taxonomies'] = array();

            $opts['capabilities']['delete_others_posts'] = "delete_others_{$cap_type}s";

            $opts['labels']['add_new'] = __( "Add New {$single}", $textdomain );
            $opts['labels']['add_new_item'] = __( "Add New {$single}", $textdomain );
            $opts['labels']['all_items'] = __( $plural, $textdomain );
            $opts['labels']['edit_item'] = __( "Edit {$single}" , $textdomain);
            $opts['labels']['menu_name'] = __( $plural, $textdomain );
            $opts['labels']['name'] = __( $plural, $textdomain );
            $opts['labels']['name_admin_bar'] = __( $single, $textdomain );
            $opts['labels']['new_item'] = __( "New {$single}", $textdomain );
            $opts['labels']['not_found'] = __( "No {$plural} Found", $textdomain );
            $opts['labels']['not_found_in_trash'] = __( "No {$plural} Found in Trash", $textdomain );
            $opts['labels']['parent_item_colon'] = __( "Parent {$plural} :", $textdomain );
            $opts['labels']['search_items'] = __( "Search {$plural}", $textdomain );
            $opts['labels']['singular_name'] = __( $single, $textdomain );
            $opts['labels']['view_item'] = __( "View {$single}", $textdomain );

            $opts['rewrite']['ep_mask'] = EP_PERMALINK;
            $opts['rewrite']['feeds'] = FALSE;
            $opts['rewrite']['pages'] = TRUE;
            $opts['rewrite']['slug'] = __( strtolower( $single ), $textdomain );
            $opts['rewrite']['with_front'] = FALSE;

        register_post_type( $single, $opts );
    }



}
