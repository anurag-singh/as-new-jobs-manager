<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    AS_New_Jobs_Manager
 * @subpackage AS_New_Jobs_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    AS_New_Jobs_Manager
 * @subpackage AS_New_Jobs_Manager/public
 * @author     Your Name <email@example.com>
 */
class AS_New_Jobs_Manager_Public {

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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-public.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-public.js', array( 'jquery' ), $this->version, false );

    }

    /**
     * Override wordpress default template
     *
     * @since    1.0.0
     */
    function override_templates_for_cpt_job( $template ){

        // Check if its a gallery page
        if( is_post_type_archive('as-job')){
            $template = plugin_dir_path( __FILE__ ) .'/templates/archive-as-job.php';
        }

        // Check if taxonomy name of CPT 'gallery'
        if( is_tax('department')){
            $template = plugin_dir_path( __FILE__ ) .'/templates/taxonomy-all-for-as-job.php';
        }

        // Check if single page of CPT 'gallery'
        if( is_singular('as-job')){
            $template = plugin_dir_path( __FILE__ ) .'/templates/single-as-job.php';
        }
        return $template;

    }

}
