<?php
/**
 *
 *	Customizer Controls for the Staic Page eatured Areas
 *
**/ 
function vlogr_customize_register_static_page( $wp_customize ) {
    // Layout and Design
    $wp_customize->add_panel( 'vlogr_static_page_panel', array(
        'priority'       => 15,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Hero Areas','vlogr'),
    ) );

    $wp_customize->add_section('vlogr_static_page_section1',
        array(
            'title' => __('Hero Area 1', 'vlogr'),
            'priority' => 1,
            'panel'   => 'vlogr_static_page_panel'
        )
    );

    $wp_customize->add_setting('vlogr_static_page_enable1',
        array(
            'sanitize_callback' => 'vlogr_sanitize_checkbox'
        ));
    $wp_customize->add_control('vlogr_static_page_enable1',
        array(
            'setting' => 'vlogr_static_page_enable1',
            'section' => 'vlogr_static_page_section1',
            'label' => __('Enable Hero Area 1', 'vlogr'),
            'type' => 'checkbox',
            'default' => false,
        )
    );

    $wp_customize->add_setting('vlogr_static_page_selectpage1',
        array(
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control('vlogr_static_page_selectpage1',
        array(
            'setting' => 'vlogr_static_page_selectpage1',
            'section' => 'vlogr_static_page_section1',
            'label' => __('Title', 'vlogr'),
            'description' => __('Select a Page to display Title. Make sure page should contain feature image.', 'vlogr'),
            'type' => 'dropdown-pages',
            'active_callback' => 'vlogr_static_page_active_callback1'
        )
    );


    $wp_customize->add_setting('vlogr_static_page_full_content1',
        array(
            'sanitize_callback' => 'vlogr_sanitize_checkbox'
        )
    );

    $wp_customize->add_control('vlogr_static_page_full_content1',
        array(
            'setting' => 'vlogr_static_page_full_content1',
            'section' => 'vlogr_static_page_section1',
            'label' => __('Show Full Content insted of excerpt', 'vlogr'),
            'type' => 'checkbox',
            'default' => false,
            'active_callback' => 'vlogr_static_page_active_callback1'
        )
    );

    $wp_customize->add_setting('vlogr_static_page_button1',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('vlogr_static_page_button1',
        array(
            'setting' => 'vlogr_static_page_button1',
            'section' => 'vlogr_static_page_section1',
            'label' => __('Button Name', 'vlogr'),
            'description' => __('Leave blank to disable Button.', 'vlogr'),
            'type' => 'text',
            'active_callback' => 'vlogr_static_page_active_callback1'
        )
    );

    function vlogr_static_page_active_callback1( $control ) {
        $option = $control->manager->get_setting('vlogr_static_page_enable1');
        return $option->value() == true;
    }

//static_page 1 section end

    //Hero Area 2 start
    $wp_customize->add_section('vlogr_static_page_section2',
        array(
            'title' => __('Hero Area 2', 'vlogr'),
            'priority' => 2,
            'panel'   => 'vlogr_static_page_panel'
        )
    );

    $wp_customize->add_setting('vlogr_static_page_enable2',
        array(
            'sanitize_callback' => 'vlogr_sanitize_checkbox'
        ));
    $wp_customize->add_control('vlogr_static_page_enable2',
        array(
            'setting' => 'vlogr_static_page_enable2',
            'section' => 'vlogr_static_page_section2',
            'label' => __('Enable Hero Area 2', 'vlogr'),
            'type' => 'checkbox',
            'default' => false,
        )
    );

    $wp_customize->add_setting('vlogr_static_page_selectpage2',
        array(
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control('vlogr_static_page_selectpage2',
        array(
            'setting' => 'vlogr_static_page_selectpage2',
            'section' => 'vlogr_static_page_section2',
            'label' => __('Title', 'vlogr'),
            'description' => __('Select a Page to display Title. Make sure page should contain feature image.', 'vlogr'),
            'type' => 'dropdown-pages',
            'active_callback' => 'vlogr_static_page_active_callback2'
        )
    );


    $wp_customize->add_setting('vlogr_static_page_full_content2',
        array(
            'sanitize_callback' => 'vlogr_sanitize_checkbox'
        )
    );

    $wp_customize->add_control('vlogr_static_page_full_content2',
        array(
            'setting' => 'vlogr_static_page_full_content2',
            'section' => 'vlogr_static_page_section2',
            'label' => __('Show Full Content insted of excerpt', 'vlogr'),
            'type' => 'checkbox',
            'default' => false,
            'active_callback' => 'vlogr_static_page_active_callback2'
        )
    );

    $wp_customize->add_setting('vlogr_static_page_button2',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('vlogr_static_page_button2',
        array(
            'setting' => 'vlogr_static_page_button2',
            'section' => 'vlogr_static_page_section2',
            'label' => __('Button Name', 'vlogr'),
            'description' => __('Leave blank to disable Button.', 'vlogr'),
            'type' => 'text',
            'active_callback' => 'vlogr_static_page_active_callback2'
        )
    );

    function vlogr_static_page_active_callback2( $control ) {
        $option = $control->manager->get_setting('vlogr_static_page_enable2');
        return $option->value() == true;
    }

//static_page 2 section end
    //Hero Area 3 start start

    $wp_customize->add_section('vlogr_static_page_section3',
        array(
            'title' => __('Hero Area 3', 'vlogr'),
            'priority' => 3,
            'panel'   => 'vlogr_static_page_panel'
        )
    );

    $wp_customize->add_setting('vlogr_static_page_enable3',
        array(
            'sanitize_callback' => 'vlogr_sanitize_checkbox'
        ));
    $wp_customize->add_control('vlogr_static_page_enable3',
        array(
            'setting' => 'vlogr_static_page_enable3',
            'section' => 'vlogr_static_page_section3',
            'label' => __('Enable Hero Area 3', 'vlogr'),
            'type' => 'checkbox',
            'default' => false,
        )
    );

    $wp_customize->add_setting('vlogr_static_page_selectpage3',
        array(
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control('vlogr_static_page_selectpage3',
        array(
            'setting' => 'vlogr_static_page_selectpage3',
            'section' => 'vlogr_static_page_section3',
            'label' => __('Title', 'vlogr'),
            'description' => __('Select a Page to display Title. Make sure page should contain feature image.', 'vlogr'),
            'type' => 'dropdown-pages',
            'active_callback' => 'vlogr_static_page_active_callback3'
        )
    );


    $wp_customize->add_setting('vlogr_static_page_full_content3',
        array(
            'sanitize_callback' => 'vlogr_sanitize_checkbox'
        )
    );

    $wp_customize->add_control('vlogr_static_page_full_content3',
        array(
            'setting' => 'vlogr_static_page_full_content3',
            'section' => 'vlogr_static_page_section3',
            'label' => __('Show Full Content insted of excerpt', 'vlogr'),
            'type' => 'checkbox',
            'default' => false,
            'active_callback' => 'vlogr_static_page_active_callback3'
        )
    );

    $wp_customize->add_setting('vlogr_static_page_button3',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('vlogr_static_page_button3',
        array(
            'setting' => 'vlogr_static_page_button3',
            'section' => 'vlogr_static_page_section3',
            'label' => __('Button Name', 'vlogr'),
            'description' => __('Leave blank to disable Button.', 'vlogr'),
            'type' => 'text',
            'active_callback' => 'vlogr_static_page_active_callback3'
        )
    );

    function vlogr_static_page_active_callback3( $control ) {
        $option = $control->manager->get_setting('vlogr_static_page_enable3');
        return $option->value() == true;
    }

//static_page 1 section end
    //Hero Area 3 end end
}
add_action( 'customize_register', 'vlogr_customize_register_static_page' );
