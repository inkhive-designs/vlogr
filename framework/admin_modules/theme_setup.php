<?php
/**
 *
 *	Set-Up file for the theme. The 'after_setup_theme' hook for the theme is called from here.
 *
 */

/**
 * vlogr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vlogr
 */

if ( ! function_exists( 'vlogr_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function vlogr_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on vlogr, use a find and replace
         * to change 'vlogr' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'vlogr', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */

        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'vlogr' ),
            'menu-2' => esc_html__( 'Footer', 'vlogr' ),
            'menu-3' => esc_html__( 'Mobile', 'vlogr' )
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'vlogr_custom_background_args', array(
            'default-color' => '#f7f7f7',
            'default-image' => '',
        ) ) );

        //add thumbnail size
        add_image_size('vlogr-thumb', 542,340, true );

        if(function_exists('add_theme_support')) {
            add_theme_support('category-thumbnails');
        }

        //Slider Support
        add_theme_support('rt-slider', array( 10, 'pages', 'front-page-only' ) );

        //video support
        add_theme_support( 'post-formats', array( 'aside', 'gallery','video' ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 72,
            'width'       => 360,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'vlogr_setup' );
