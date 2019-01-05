<?php
/**
 * 
 *	Customizer Controls for the Featured Area 2
 *
 */
function vlogr_customize_register_featured_cube( $wp_customize )
{
//FEATURED Posts (inherited from featured-news in css)
    $wp_customize->add_section(
        'vlogr_a_fe_boxes',
        array(
            'title' => __('Featured Area 2', 'vlogr'),
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'vlogr_fe_enable',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_fe_enable', array(
            'settings' => 'vlogr_fe_enable',
            'label'    => __( 'Enable this section', 'vlogr' ),
            'description'    => __( 'Show your Top 3 Posts from the selected category.', 'vlogr' ),
            'section'  => 'vlogr_a_fe_boxes',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'vlogr_fe_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'vlogr_fe_title', array(
            'settings' => 'vlogr_fe_title',
            'label'    => __( 'Title','vlogr' ),
            'description'    => __( 'Leave Blank to disable','vlogr' ),
            'section'  => 'vlogr_a_fe_boxes',
            'type'     => 'text',
        )
    );
    //categary 1
    $wp_customize->add_setting(
        'vlogr_fe_cat1_enable',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_fe_cat1_enable', array(
            'settings' => 'vlogr_fe_cat1_enable',
            'label'    => __( 'Enable Category Section 1', 'vlogr' ),
            'description'    => __( 'Here you can manage only first category', 'vlogr' ),
            'section'  => 'vlogr_a_fe_boxes',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'vlogr_fe_cat1',
        array( 'sanitize_callback' => 'vlogr_sanitize_category' )
    );

    $wp_customize->add_control(
        new Vlogr_WP_Customize_Category_Control(
            $wp_customize,
            'vlogr_fe_cat1',
            array(
                'label'    => __('Posts Category.','vlogr'),
                'settings' => 'vlogr_fe_cat1',
                'section'  => 'vlogr_a_fe_boxes'
            )
        )
    );

    //categary 2
    $wp_customize->add_setting(
        'vlogr_fe_cat2_enable',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_fe_cat2_enable', array(
            'settings' => 'vlogr_fe_cat2_enable',
            'label'    => __( 'Enable Category Section 2', 'vlogr' ),
            'description'    => __( 'Here you can manage only second category', 'vlogr' ),
            'section'  => 'vlogr_a_fe_boxes',
            'type'     => 'checkbox',
        )
    );
    $wp_customize->add_setting(
        'vlogr_fe_cat2',
        array( 'sanitize_callback' => 'vlogr_sanitize_category' )
    );

    $wp_customize->add_control(
        new Vlogr_WP_Customize_Category_Control(
            $wp_customize,
            'vlogr_fe_cat2',
            array(
                'label'    => __('Posts Category.','vlogr'),
                'settings' => 'vlogr_fe_cat2',
                'section'  => 'vlogr_a_fe_boxes'
            )
        )
    );

    //categary 3
    $wp_customize->add_setting(
        'vlogr_fe_cat3_enable',
        array( 'sanitize_callback' => 'vlogr_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'vlogr_fe_cat3_enable', array(
            'settings' => 'vlogr_fe_cat3_enable',
            'label'    => __( 'Enable Category Section 3', 'vlogr' ),
            'description'    => __( 'Here you can manage only third category', 'vlogr' ),
            'section'  => 'vlogr_a_fe_boxes',
            'type'     => 'checkbox',
        )
    );
    $wp_customize->add_setting(
        'vlogr_fe_cat3',
        array( 'sanitize_callback' => 'vlogr_sanitize_category' )
    );

    $wp_customize->add_control(
        new Vlogr_WP_Customize_Category_Control(
            $wp_customize,
            'vlogr_fe_cat3',
            array(
                'label'    => __('Posts Category.','vlogr'),
                'settings' => 'vlogr_fe_cat3',
                'section'  => 'vlogr_a_fe_boxes'
            )
        )
    );

}
add_action( 'customize_register', 'vlogr_customize_register_featured_cube' );
