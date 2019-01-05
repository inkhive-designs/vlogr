<!-- Static page 3 start -->
<?php if ( get_theme_mod('vlogr_static_page_enable3') && is_front_page()) : ?>
    <div id="static_page" class="static_page-content3">
        <div class="container static_page-container">
            <?php if(wp_get_attachment_url( get_post_thumbnail_id(get_theme_mod('vlogr_static_page_selectpage3')) )):?>
                <div class="f-image col-md-6 col-sm-6">
                    <?php $a =  wp_get_attachment_url( get_post_thumbnail_id(get_theme_mod('vlogr_static_page_selectpage3')) ); ?>
                    <a href="<?php the_permalink(get_theme_mod('vlogr_static_page_selectpage3')); ?>"><img alt="<?php the_title()?>" src="<?php echo esc_url( $a ); ?>"></a>
                </div>
            <?php endif;?>
            <?php $class = wp_get_attachment_url( get_post_thumbnail_id(get_theme_mod('vlogr_static_page_selectpage3')) ) ? 'col-md-6 col-sm-6' : 'col-md-12 centered'?>
            <div class ="<?php echo $class;?> h-content">
                <h1 class="title">
                    <?php echo esc_html( get_the_title( get_theme_mod( 'vlogr_static_page_selectpage3' ) ) ); ?>
                </h1>
                
                	<div class="excerpt">
                        <?php 
	                        $my_postid 		= esc_html( get_theme_mod( 'vlogr_static_page_selectpage3' ) );
                        	$content_post 	= get_post( $my_postid );
							$content 		= $content_post->post_content;
							$content 		= apply_filters( 'the_content', $content );
							
                        if ( get_theme_mod( 'vlogr_static_page_full_content3', true ) ) {
                        	echo esc_html( $content );
                        } else	{
                        	echo esc_html( substr($content, 0, 200)."..." );
                        } ?>
                    </div>
                    
                <?php if ( get_theme_mod('vlogr_static_page_button3') != '') : ?>
                <div class="b">
                    <a href="<?php the_permalink(get_theme_mod('vlogr_static_page_selectpage3')); ?>" class="more-button">
                        <?php echo esc_html(get_theme_mod('vlogr_static_page_button3')); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--front page builder end-->