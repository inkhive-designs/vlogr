<?php
/* The Template to Render the Slider
* works only if user has RT slider plugin activated.
*
*/

//Define all Variables.

if ( class_exists('rt_slider') && is_front_page() && get_theme_mod('rtslider_enable_front') ) {
	$count = esc_html( rt_slider::fetch('count') );
	?>
	<div id="slider-bg">
	    <div class="slider-container-wrapper">
	        <div class="slider-container theme-default">
	            <div class="swiper-wrapper">
	                <?php
	                for ( $i = 1; $i <= $count; $i++ ) :
	
	                    $url = esc_url( rt_slider::fetch('url', $i ) );
	                    $img = esc_url( rt_slider::fetch('img', $i ) );
	                    $title = esc_html( rt_slider::fetch('title', $i ) );
	                    //$desc = esc_html( rt_slider::fetch('desc', $i) );
	                    //$button = esc_html( rt_slider::fetch('cta_button', $i) );
	
	
	                    ?>
	                    <div class="swiper-slide">
	                        <a href="<?php echo esc_url( $url ); ?>">
	                            <img src="<?php echo $img ?>" data-thumb="<?php echo $img ?>" title="<?php $title; ?>" alt="<?php $title; ?>" />
	                        </a>
	                        <div class="slidecaption">
	                            <div class="slide-cap-in container">
	                            <?php if ( $title ) : ?>
	                                <div class="slide-title"><?php $title ?></div>
	                            <?php endif; ?>
	                            </div>
	                        </div>
	                    </div>
	                <?php endfor; ?>
	
	            </div>
	            <div class="swiper-pagination swiper-pagination-white"></div>
	
	            <div class="swiper-button-next slidernext swiper-button-white"></div>
	            <div class="swiper-button-prev sliderprev swiper-button-white"></div>
	        </div>
	    </div>
	</div>   
<?php } ?>
