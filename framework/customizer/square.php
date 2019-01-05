<?php
/**
 *
 *	Customizer Controls for the Featured Area 1 Section.
 *
**/
function vlogr_customize_register_featured_angle( $wp_customize ) {
    $wp_customize->add_section(
        'vlogr_fc_fa2',
        array(
            'title'     => __('Featured Area 1','vlogr'),
            'priority'  => 25,
        )
    );

    $wp_customize->add_setting(
        'vlogr_fa2_enable',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_fa2_enable', array(
            'settings' => 'vlogr_fa2_enable',
            'label'    => __( 'Enable Featured Area 1.', 'vlogr' ),
            'section'  => 'vlogr_fc_fa2',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'vlogr_fa2_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'vlogr_fa2_title', array(
            'settings' => 'vlogr_fa2_title',
            'label'    => __( 'Title for the Featured Post Area','vlogr' ),
            'section'  => 'vlogr_fc_fa2',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'vlogr_fa2_cat',
        array( 'sanitize_callback' => 'vlogr_sanitize_category' )
    );

    $wp_customize->add_control(
        new Vlogr_WP_Customize_Category_Control(
            $wp_customize,
            'vlogr_fa2_cat',
            array(
                'label'    => __('Choose Category.','vlogr'),
                'settings' => 'vlogr_fa2_cat',
                'section'  => 'vlogr_fc_fa2'
            )
        )
    );
}
add_action( 'customize_register', 'vlogr_customize_register_featured_angle' );
