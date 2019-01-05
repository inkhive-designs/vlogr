<?php
//social-icons
function vlogr_customize_register_social( $wp_customize ){
   $wp_customize -> add_section('vlogr_social_section', array(
        'title' => __('Social Icons','vlogr'),
        'priority' => 5
    ));

    $social_networks = array(
        'none' => __('-' ,'vlogr'),
        'facebook-f' => __('Facebook' ,'vlogr'),
        'twitter' => __('Twitter' ,'vlogr'),
        'google-plus-g' => __('Google Plus' ,'vlogr'),
        'instagram' => __('instagram' ,'vlogr'),
        'vine' => __('Vine' ,'vlogr'),
        'vimeo-v' => __('Vimeo' ,'vlogr'),
        'youtube' => __('Youtube' ,'vlogr'),
        'flickr' => __('Flickr' ,'vlogr'),
        'pinterest-p' => __('Pinterest' ,'vlogr'),
    );
    $social_count = count($social_networks);

    for( $x=1; $x <= ($social_count - 4); $x++):

        $wp_customize -> add_setting('vlogr_social_'.$x, array(
            'default' => 'none',
            'sanitize_callback' => 'vlogr_sanitize_social',
            'transport'	=> 'postMessage'
        ));
        $wp_customize -> add_control('vlogr_social_'.$x, array(
            'settings' => 'vlogr_social_'.$x,
            'section' => 'vlogr_social_section',
            'label'     => __('Icon ', 'vlogr').$x,
            'type'      => 'select',
            'choices'    => $social_networks,
        ));

        $wp_customize -> add_setting('vlogr_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize -> add_control('vlogr_social_url'.$x, array(
            'settings' => 'vlogr_social_url'.$x,
            'section' => 'vlogr_social_section',
            'description' => __('Icon ' , 'vlogr').$x.__(' Url', 'vlogr'),
            'type'  =>  'url',
            'choices' => $social_networks,
        ));
    endfor;

    //sanitization function
    function vlogr_sanitize_social($input){
        $social_networks = array(
            'none' ,
            'facebook-f',
            'twitter',
            'google-plus-g',
            'instagram',
            'vine',
            'vimeo-v',
            'youtube',
            'flickr',
            'pinterest-p');

        if(in_array($input,$social_networks)):
            return $input;
        else:
            return '';
        endif;
    }
}
add_action('customize_register','vlogr_customize_register_social');
