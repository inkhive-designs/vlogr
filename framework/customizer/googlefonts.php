<?php
/**
 * 
 *	Customizer Controls for the Google Fonts Section.
 *
 */
 
function vlogr_customize_register_fonts( $wp_customize )
{
    $wp_customize->add_section(
        'vlogr_typo_options',
        array(
            'title'     => __('Google Web Fonts','vlogr'),
            'priority'  => 41,
            'description' => __('Defaults: Sriracha, Karla.','vlogr'),
            'panel'     => 'vlogr_design_panel'

        )
    );

    $font_array = array('Sriracha','Open Sans','Karla','Bitter','Raleway','Khula','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'vlogr_title_font',
        array(
            'default'=> 'Sriracha',
            'sanitize_callback' => 'vlogr_sanitize_gfont'
        )
    );

    $wp_customize->add_control(
        'vlogr_title_font',array(
            'label' => __('Title','vlogr'),
            'settings' => 'vlogr_title_font',
            'section'  => 'vlogr_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'vlogr_body_font',
        array(	'default'=> 'Karla',
            'sanitize_callback' => 'vlogr_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'vlogr_body_font',array(
            'label' => __('Body','vlogr'),
            'settings' => 'vlogr_body_font',
            'section'  => 'vlogr_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
    
    
    function vlogr_sanitize_gfont( $input ) {
	    if ( in_array($input, array('Sriracha','Open Sans','Karla','Bitter','Raleway','Khula','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
	        return $input;
	    else
	        return '';
	}
}
add_action( 'customize_register', 'vlogr_customize_register_fonts' );
