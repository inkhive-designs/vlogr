<?php
/**
 *
 *	Customizer Controls for the Featured Post Categories Section.
 *
**/

function vlogr_customize_register_fp_cat( $wp_customize ) {
    $wp_customize->add_section(
        'vlogr_featposts_cat',
        array(
            'title'     => __('Featured Posts Categories','vlogr'),
            'priority'  => 20,
        )
    );

    $wp_customize->add_setting(
        'vlogr_featposts_cat_enable',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_featposts_cat_enable', array(
            'settings' => 'vlogr_featposts_cat_enable',
            'label'    => __( 'Enable the Post Categories on Front Page', 'vlogr' ),
            'section'  => 'vlogr_featposts_cat',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'vlogr_featcat_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'vlogr_featcat_title', array(
            'settings' => 'vlogr_featcat_title',
            'label'    => __( 'Title', 'vlogr' ),
            'section'  => 'vlogr_featposts_cat',
            'type'     => 'text',
        )
    );

    for( $x = 1; $x <= 6; $x++ ):

        $wp_customize->add_setting(
            'vlogr_featposts_category_'.$x,
            array( 'sanitize_callback' => 'vlogr_sanitize_category' )
        );

        $wp_customize->add_control(
            new Vlogr_WP_Customize_Category_Control(
                $wp_customize,
                'vlogr_featposts_category_'.$x,
                array(
                    'label'    => __('Select Featured Category ','vlogr').$x,
                    'settings' => 'vlogr_featposts_category_'.$x,
                    'section'  => 'vlogr_featposts_cat'
                )
            )
        );

    endfor;
}
add_action( 'customize_register', 'vlogr_customize_register_fp_cat' );
