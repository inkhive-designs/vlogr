<?php
/**
 *
 *	All the widgets of the theme are registered here. 
 *
 */
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vlogr_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'vlogr' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'vlogr' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<div><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 1', 'vlogr' ),
        'id'            => 'footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title title-font">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'vlogr' ),
        'id'            => 'footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title title-font">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'vlogr' ),
        'id'            => 'footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title title-font">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 4', 'vlogr' ),
        'id'            => 'footer-4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title title-font">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'vlogr_widgets_init' );
