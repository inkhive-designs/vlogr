<?php
/**
 * Vlogr Theme Customizer
 *
 *	The primary customizer file where all the Section Files are called.
 *
 * @package vlogr
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vlogr_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->default = '#444444';
    if ( class_exists( 'rt_slider' ) ) :
    	$wp_customize->get_panel( 'rtslider_panel' )->priority	=	40;
    endif;


    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'vlogr_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'vlogr_customize_partial_blogdescription',
        ) );
    }
}
add_action( 'customize_register', 'vlogr_customize_register' );

require_once get_template_directory().'/framework/customizer/sanitizations.php';
require_once get_template_directory().'/framework/customizer/googlefonts.php';
require_once get_template_directory().'/framework/customizer/square.php';
require_once get_template_directory().'/framework/customizer/cube.php';
require_once get_template_directory().'/framework/customizer/featured-category.php';
require_once get_template_directory().'/framework/customizer/fpage.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/social-fa.php';
require_once get_template_directory().'/framework/customizer/layouts.php';
require_once get_template_directory().'/framework/customizer/skins.php';
require_once get_template_directory().'/framework/customizer/sorter.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function vlogr_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function vlogr_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vlogr_customize_preview_js() {
    wp_enqueue_script( 'vlogr-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'vlogr_customize_preview_js' );
