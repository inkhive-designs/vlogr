<!-- Static page 2 start -->
<!--front page builder start-->
<?php if ( get_theme_mod('vlogr_static_page_enable2') && is_front_page()) : ?>
    <div id="static_page2" class="static_page-content2">
        <div class="container static_page-container">
            <?php if(wp_get_attachment_url( get_post_thumbnail_id(get_theme_mod('vlogr_static_page_selectpage2')) )):?>
                <div class="f-image col-md-6 col-sm-6">
                    <?php $a =  wp_get_attachment_url( get_post_thumbnail_id(get_theme_mod('vlogr_static_page_selectpage2')) ); ?>
                    <img alt="<?php the_title()?>" src="<?php echo esc_url( $a ); ?>">
                </div>
            <?php endif;?>

            <?php $class = wp_get_attachment_url( get_post_thumbnail_id(get_theme_mod('vlogr_static_page_selectpage2')) ) ? 'col-md-6 col-sm-6' : 'col-md-12 centered'?>
            <div class ="<?php echo esc_attr( $class );?> h-content">
                <h1 class="title">
                    <?php echo get_the_title(esc_html(get_theme_mod('vlogr_static_page_selectpage2'))); ?>
                </h1>
                
					<div class="excerpt">
                        <?php 
	                        $my_postid 		= esc_html( get_theme_mod( 'vlogr_static_page_selectpage2' ) );
                        	$content_post 	= get_post( $my_postid );
							$content 		= $content_post->post_content;
							$content 		= apply_filters( 'the_content', $content );
							
                        if ( get_theme_mod( 'vlogr_static_page_full_content2', true ) ) {
                        	echo esc_html( $content );
                        } else	{
                        	echo esc_html( substr($content, 0, 200)."..." );
                        } ?>
                    </div>
                    
                <?php if ( get_theme_mod('vlogr_static_page_button2') != '') : ?>
                <div class="b">
                <a href="<?php the_permalink(get_theme_mod('vlogr_static_page_selectpage2')); ?>" class="more-button">
                        <?php echo esc_html(get_theme_mod('vlogr_static_page_button2')); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php endif; ?>
<!-- Static page 2 end -->