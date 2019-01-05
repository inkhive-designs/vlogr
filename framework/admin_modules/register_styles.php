<?php
/**
 * 
 *	All the external files are enqueued here.
 *
 */
/**
 * Enqueue scripts and styles.
 */
function vlogr_scripts() {
    wp_enqueue_style( 'vlogr-style', get_stylesheet_uri() );

    //vlogr main styles
    wp_enqueue_style('vlogr-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('vlogr_title_font', 'Sriracha') ) );

    wp_enqueue_style('vlogr-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('vlogr_body_font', 'Karla') ) );


    //enqueue bootstrap and fontawesome css//
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css',true);

    wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/font-awesome/css/fontawesome-all.min.css');

    //hover min.css
    wp_enqueue_style( 'hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );


    //lity
    wp_enqueue_style( 'lightbox-css', get_template_directory_uri() . '/assets/css/lity.min.css' );


    //vlogr main styles
    wp_enqueue_style( 'vlogr-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('vlogr_skin', 'default').'.css' );

    //custom js
    wp_enqueue_script( 'vlogr-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery-masonry'), false, true );



    //lity js
    wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/assets/js/lity.min.js');


    wp_enqueue_script( 'hoverIntent');
    wp_enqueue_script( 'jquery-effects-bounce');


    wp_enqueue_script( 'bigslide-js', get_template_directory_uri() . '/js/jquery.big-slide.js');

    //external js
    wp_enqueue_script( 'vlogr-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );



    wp_enqueue_script( 'vlogr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'vlogr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'vlogr_scripts' );

// Update CSS within in Admin
	function admin_style() {
	  wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
	}
	add_action('admin_enqueue_scripts', 'admin_style');


	
// Custom JS Functions for the Customizer Controls.

	function vlogr_customize_control() {
		wp_enqueue_style( 'vlogr_custom_control_css', trailingslashit( get_template_directory_uri() ) . 'assets/css/customize-control.css', [], '1.0', 'all' );
		wp_enqueue_script( 'vlogr_custom_control_js', get_template_directory_uri() . '/js/customize-control.js', [], NULL, true) ;
	}
add_action( 'customize_controls_enqueue_scripts', 'vlogr_customize_control' );	
