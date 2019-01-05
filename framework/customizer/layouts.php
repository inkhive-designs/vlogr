<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 2/23/2018
 * Time: 11:49 AM
 */
function vlogr_customize_register_layouts( $wp_customize )
{
    // Layout and Design
    $wp_customize->add_panel( 'vlogr_design_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','vlogr'),
    ) );

    $wp_customize->add_section(
        'vlogr_design_options',
        array(
            'title'     => __('Blog Layout','vlogr'),
            'priority'  => 1,
            'panel'     => 'vlogr_design_panel'
        )
    );


    $wp_customize->add_setting(
        'vlogr_blog_layout',
        array( 'sanitize_callback' => 'vlogr_sanitize_blog_layout',
        	   'default'		   => 'vlogr'
        	 )
    );

    function vlogr_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('vlogr','gallery','gallery-with-title') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'vlogr_blog_layout',array(
            'label' => __('Select Layout','vlogr'),
            'settings' => 'vlogr_blog_layout',
            'section'  => 'vlogr_design_options',
            'type' => 'select',
            'choices' => array(
                'vlogr' => __('Vlogr Layout','vlogr'),
                'gallery' => __('Gallery Layout','vlogr'),
                'gallery-with-title' => __('Gallery with Title Layout','vlogr'),
            )
        )
    );
    //Sidebar Settings
    $wp_customize->add_section(
        'vlogr_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','vlogr'),
            'priority'  => 2,
            'panel'     => 'vlogr_design_panel'
        )
    );

    $wp_customize->add_setting(
        'vlogr_disable_sidebar',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_disable_sidebar', array(
            'settings' => 'vlogr_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','vlogr' ),
            'section'  => 'vlogr_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'vlogr_disable_sidebar_home',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_disable_sidebar_home', array(
            'settings' => 'vlogr_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Blog & Archives.','vlogr' ),
            'section'  => 'vlogr_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'vlogr_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'vlogr_disable_sidebar_front',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_disable_sidebar_front', array(
            'settings' => 'vlogr_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','vlogr' ),
            'description'	=> __('When the Home Page is set as Static Front Page', 'vlogr'),
            'section'  => 'vlogr_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'vlogr_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'vlogr_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'vlogr_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'vlogr_sidebar_width', array(
            'settings' => 'vlogr_sidebar_width',
            'label'    => __( 'Sidebar Width','vlogr' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','vlogr'),
            'section'  => 'vlogr_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'vlogr_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function vlogr_show_sidebar_options($control) {

        $option = $control->manager->get_setting('vlogr_disable_sidebar');
        return $option->value() == false ;

    }
    //custom footer text
    $wp_customize-> add_section(
        'vlogr_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','vlogr'),
            'description'	=> __('Enter your Own Copyright Text.','vlogr'),
            'priority'		=> 30,
            'panel'			=> 'vlogr_design_panel'
        )
    );

    $wp_customize->add_setting(
        'vlogr_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field',
            'transport'	=> 'postMessage'
        )
    );

    $wp_customize->add_control(
        'vlogr_footer_text',
        array(
            'section' => 'vlogr_custom_footer',
            'settings' => 'vlogr_footer_text',
            'type' => 'text'
        )
    );
    
}
add_action( 'customize_register', 'vlogr_customize_register_layouts' );
