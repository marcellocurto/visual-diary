<?php
if (!function_exists('marcello_visual_setup')):

    function marcello_visual_setup()
{

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        /* Pinegrow generated Load Text Domain Begin */
        load_theme_textdomain('marcello_visual', get_template_directory() . '/languages');
        /* Pinegrow generated Load Text Domain End */

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

        // Add menus.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'marcello_visual'),
            'social' => __('Social Links Menu', 'marcello_visual'),
        ));

/*
 * Register custom menu locations
 */
        /* Pinegrow generated Register Menus Begin */

        /* Pinegrow generated Register Menus End */

/*
 * Set image sizes
 */
        /* Pinegrow generated Image sizes Begin */

        /* Pinegrow generated Image sizes End */

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /*
         * Enable support for Post Formats.
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',
        ));

        function roark_js_async_attr($tag)
        {
                $scripts_to_include = array('gtag');
                foreach ($scripts_to_include as $include_script) {
                    if (true == strpos($tag, $include_script)) {
                        return str_replace(' src', ' async="async" src', $tag);
                    }
    
                }
                return $tag;
            }
            add_filter('script_loader_tag', 'roark_js_async_attr', 10);

        /*
         * Enable support for Page excerpts.
         */
        add_post_type_support('page', 'excerpt');

        add_theme_support('responsive-embeds');

        function wpdocs_dequeue_dashicon()
    {
            if (current_user_can('update_core')) {
                return;
            }
            wp_deregister_style('dashicons');
        }
        add_action('wp_enqueue_scripts', 'wpdocs_dequeue_dashicon');
    }
endif; // marcello_visual_setup

add_action('after_setup_theme', 'marcello_visual_setup');

if (!function_exists('marcello_visual_init')):

    function marcello_visual_init()
{

        // Use categories and tags with attachments
        register_taxonomy_for_object_type('category', 'attachment');
        register_taxonomy_for_object_type('post_tag', 'attachment');

        /*
         * Register custom post types. You can also move this code to a plugin.
         */
        /* Pinegrow generated Custom Post Types Begin */

        /* Pinegrow generated Custom Post Types End */

        /*
         * Register custom taxonomies. You can also move this code to a plugin.
         */
        /* Pinegrow generated Taxonomies Begin */

        /* Pinegrow generated Taxonomies End */

    }
endif; // marcello_visual_setup

add_action('init', 'marcello_visual_init');

if (!function_exists('marcello_visual_custom_image_sizes_names')):

    function marcello_visual_custom_image_sizes_names($sizes)
{

        /*
         * Add names of custom image sizes.
         */
        /* Pinegrow generated Image Sizes Names Begin*/
        /* This code will be replaced by returning names of custom image sizes. */
        /* Pinegrow generated Image Sizes Names End */
        return $sizes;
    }
    add_action('image_size_names_choose', 'marcello_visual_custom_image_sizes_names');
endif; // marcello_visual_custom_image_sizes_names

if (!function_exists('marcello_visual_widgets_init')):

    function marcello_visual_widgets_init()
{

        /*
         * Register widget areas.
         */
        /* Pinegrow generated Register Sidebars Begin */

        /* Pinegrow generated Register Sidebars End */
    }
    add_action('widgets_init', 'marcello_visual_widgets_init');
endif; // marcello_visual_widgets_init

if (!function_exists('marcello_visual_customize_register')):

    function marcello_visual_customize_register($wp_customize)
{
        // Do stuff with $wp_customize, the WP_Customize_Manager object.

        /* Pinegrow generated Customizer Controls Begin */

        /* Pinegrow generated Customizer Controls End */

    }
    add_action('customize_register', 'marcello_visual_customize_register');
endif; // marcello_visual_customize_register

if (!function_exists('marcello_visual_enqueue_scripts')):
    function marcello_visual_enqueue_scripts()
{

        wp_register_script('visual_script', get_template_directory_uri() . '/assets/visual.js', array('jquery'), null, true);
        wp_enqueue_script('visual_script'); 

        wp_register_script('gtag', 'https://www.googletagmanager.com/gtag/js?id=UA-19008069-8', null, null, true);
        wp_enqueue_script('gtag');

        wp_register_style('adobefonts', 'https://use.typekit.net/enx2ywk.css', null, null, 'all');
        wp_enqueue_style('adobefonts');

        wp_deregister_style('style');
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false, null, 'all');

    }
    add_action('wp_enqueue_scripts', 'marcello_visual_enqueue_scripts');
endif;

function pgwp_sanitize_placeholder($input)
{return $input;}
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/wp_pg_helpers.php";
require_once "inc/wp_smart_navwalker.php";
require_once "inc/wp_pg_pagination.php";

/* Pinegrow generated Include Resources End */
