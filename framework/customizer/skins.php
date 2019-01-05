<?php
/**
 *
 *	Customizer Controls for the Skins Section.
 *
**/
function vlogr_customize_register_skins($wp_customize){
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors','vlogr');
    $wp_customize->get_section('colors')->panel = 'vlogr_design_panel';
    
    //vlogr Skins

    $wp_customize -> add_setting('vlogr_skin',array(
        'default' => 'default',
        'sanitize_callback' => 'vlogr_sanitize_skin',
    ));

    $skins = array(
        'default' => __('Default(vlogr)','vlogr'),
        'blue' => __('Blue','vlogr'),
    );

    $wp_customize -> add_control('vlogr_skin',array(
        'settings' => 'vlogr_skin',
        'section' => 'colors',
        'label' => __('Choose Skins','vlogr'),
        'type' => 'select',
        'choices' => $skins,
    ));

    function vlogr_sanitize_skin($input){
        if( in_array($input, array('default','blue') )):
            return $input;
        else:
            return '';
        endif;
    }
}
add_action('customize_register','vlogr_customize_register_skins');
