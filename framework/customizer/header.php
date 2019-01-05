<?php
/**
 * 
 *	Customizer Controls for Header Settings Panel.
 * 
 *
 */
function vlogr_customize_register_header( $wp_customize ) {

    $wp_customize->get_section( 'title_tagline')->title = __( 'Title, Tagline & Logo', 'vlogr' );
    $wp_customize->get_section( 'title_tagline')->panel = 'vlogr_header_panel';
	$wp_customize->get_section( 'header_image' )->panel	= 'vlogr_header_panel';


//Logo Settings
    $wp_customize->add_panel('vlogr_header_panel', array(
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Header Settings', 'vlogr'),
    ));
    
    $wp_customize->add_setting( 'header_image_fp_toggle', array(
	    'default'	=> '',
	    'sanitize_callback'	=> 'vlogr_sanitize_checkbox'
    ));
    
    $wp_customize->add_control( 'header_image_fp_toggle', array(
		'label'	=> __('Enable the Header Image on the Front Page', 'vlogr'),
		'type'	=> 'checkbox',
		'priority'	=> 5,
		'section'	=> 'header_image'
    ));

}
add_action( 'customize_register', 'vlogr_customize_register_header' );
