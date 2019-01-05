<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vlogr
 */

?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vlogr' ); ?></a>
    <?php get_template_part('modules/header/top','bar'); ?>
    <?php get_template_part('modules/header/jumbosearch'); ?>
    <span id="searchicon">
    	<i class="fas fa-search"></i>
    </span>

    <?php
	    
	    if ( is_singular() ) :
	    	get_template_part('modules/header/header','single');
	    endif;

		if ( vlogr_header_image() ) {
			get_template_part( 'modules/header/header', 'image' );
		}

    ?>
    <?php  //get_template_part('framework/featured-components/featured','category' ); ?>

	<?php if ( is_front_page() ) :
		vlogr_sorter();
	endif; ?>

    <div id="content" class="site-content container">
