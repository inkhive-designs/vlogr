<?php
/**
 *
 *	The Primary file of the theme where all the functions called in the theme are defined. 
 *
 */
/*
** Function to Get Theme Layout
*/
//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/content_width.php';

function vlogr_get_blog_layout(){
    $ldir = 'framework/layouts/content';
    if (get_theme_mod('vlogr_blog_layout') ) :
        get_template_part( $ldir , esc_html( get_theme_mod('vlogr_blog_layout') ) );
    else :
        get_template_part( $ldir ,'vlogr');
    endif;
}
add_action('vlogr_blog_layout', 'vlogr_get_blog_layout');

/*
** Function to check if Sidebar is enabled on Current Page 
*/

function vlogr_load_sidebar() {
    $load_sidebar = true;
    if ( get_theme_mod('vlogr_disable_sidebar') ) :
        $load_sidebar = false;
    elseif( get_theme_mod('vlogr_disable_sidebar_home') && is_home() )	:
        $load_sidebar = false;
    // Exceptional Case for Archive Pages. In Pro Version, there should be a different setting.	
    elseif( get_theme_mod('vlogr_disable_sidebar_home') && is_archive() )	:
        $load_sidebar = false;
    elseif( get_theme_mod('vlogr_disable_sidebar_front') && is_front_page() ) :
        $load_sidebar = false;
    endif;

    return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function vlogr_primary_class() {
    $sw = esc_html( get_theme_mod( 'vlogr_sidebar_width',4 ) );
    $class = "col-md-".(12-$sw);

    if ( !vlogr_load_sidebar() )
        $class = "col-md-12";
    echo $class;

}
add_action('vlogr_primary-width', 'vlogr_primary_class');

function vlogr_secondary_class() {
    $sw = esc_html( get_theme_mod( 'vlogr_sidebar_width',4 ) );
    $class = "col-md-".$sw;

    echo $class;
}
add_action('vlogr_secondary-width', 'vlogr_secondary_class');


/*
 * Pagination Function. Implements core paginate_links function.
 */
function vlogr_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul>';
        echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}

/*
** Customizer Controls
*/
if (class_exists('WP_Customize_Control')) {
    class Vlogr_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'vlogr' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

/**
 *
 *	Transfer all toggle control values of Featured Areas to JS for use in Sorter
 *
**/

function vlogr_sorter_val() {
	
	$vlogr_val	=	array(
		'slider'	=> class_exists('rt_slider') ? get_theme_mod( 'rtslider_enable_front' ) : '',
		'hero1'		=> get_theme_mod( 'vlogr_static_page_enable1' ),
		'hero2'		=> get_theme_mod( 'vlogr_static_page_enable2' ),
		'hero3'		=> get_theme_mod( 'vlogr_static_page_enable3' ),
		'feat_cat'	=> get_theme_mod( 'vlogr_featposts_cat_enable' ),
		'feat_area1'	=> get_theme_mod( 'vlogr_fa2_enable' ),
		'feat_area2'	=> get_theme_mod( 'vlogr_fe_enable' )
	);
	wp_localize_script( 'vlogr_custom_control_js', 'sorter', $vlogr_val );
}

add_action( 'customize_controls_enqueue_scripts', 'vlogr_sorter_val' );

function vlogr_sorter() {
	
	function show($s) {
		switch ($s) {
			case 'slider' :
					get_template_part( 'framework/featured-components/slider', 'swiper' );
				break;
			case 'hero1':
                get_template_part( 'framework/featured-components/fpage1' );
            break;
            case 'hero2':
                get_template_part( 'framework/featured-components/fpage2' );
            break;
            case 'hero3':
                get_template_part( 'framework/featured-components/fpage3' );
            break;
            case 'feat_cat':
                get_template_part('framework/featured-components/featured', 'category' );
            break;
            case 'feat_area1':
                get_template_part('framework/featured-components/square' );
            break;
            case 'feat_area2':
                get_template_part('framework/featured-components/cube' );
            break;
		}		
	}
	
	$order	=	explode( ',', get_theme_mod('vlogr_sorter') );
	foreach( $order as $i ) {
		show( $i );
	}
}

function vlogr_header_image() {
	$header_image	=	true;
	if ( is_singular() ) :
		$header_image	=	false;
	elseif	( is_front_page() && !get_theme_mod('header_image_fp_toggle') ) :
		$header_image	=	false;
	endif;
	
	return $header_image;
}