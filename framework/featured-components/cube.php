<?php if ( get_theme_mod( 'vlogr_fe_enable' ) && is_front_page() ) : ?>
    <div id="cube" class="container-fluid featured-area container">
        <?php if (get_theme_mod('vlogr_fe_title')) : ?>
            <div class="section-title title-font container">
                <?php echo esc_html( get_theme_mod('vlogr_fe_title' ) ); ?>
            </div>
        <?php endif; ?>
        <div class="featured-posts-container container">
            <?php if( get_theme_mod('vlogr_fe_cat1_enable' ) ): ?>
            <div class="fg-wrapper1">
                <?php
                $count = 1;
                $args = array(
                    'post_type' 			=> 'post',
                    'posts_per_page' 		=> 3,
                    'cat'  					=> esc_html( get_theme_mod('vlogr_fe_cat1',0) ),
                    'ignore_sticky_posts' 	=> 1,
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    ?>
                    <div class="fg-item-container1 col-md-12 col-sm-12 col-xs-12">
                        <div class="fg-item1">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail( 'vlogr-thumb' ); ?></a>
                            <?php else : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder2.jpg" ); ?>"></a>
                            <?php endif; ?>

                    <div class="titledesc">
                                <h3><span class="title-font"><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></span></h3>
                        <?php if(  get_post_meta( get_the_ID(),'enable-video', true ) ) :

                            $video = get_post_meta( get_the_ID(),'enable-video', true );?>

                            <div class="img-meta-video meta-icon"><a class='meta-link meta-link-video' title="<?php the_title(); ?>" href="<?php echo esc_url( $video ) ?>" data-lity><i class="fa fa-play fa-play-circle"></i></a></div>


                        <?php endif;
                        ?>
                    </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <div class="view-all1">
                    <h3> <a href="<?php echo esc_url(get_category_link(get_theme_mod('vlogr_fe_cat1',0))); ?>">
                        <span class="title-font"><?php _e('View All','vlogr'); ?></span>
                    </a></h3>
                </div>
            </div>
            <?php endif; ?>
            <!-- Ctaegory 2 -->
        <?php if(get_theme_mod('vlogr_fe_cat2_enable')): ?>

        <div class="fg-wrapper2">
                <?php
                $count = 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'cat'  => esc_html( get_theme_mod('vlogr_fe_cat2',0) ),
                    'ignore_sticky_posts' => 1,
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    ?>
                    <div class="fg-item-container2 col-md-12 col-sm-12 col-xs-12">
                        <div class="fg-item2">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail( 'vlogr-thumb' ); ?></a>
                            <?php else : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder2.jpg" ); ?>"></a>
                            <?php endif; ?>
                            <div class="titledesc">
                                <h3><span class="title-font"><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></span></h3>
                                <?php if(  get_post_meta( get_the_ID(),'enable-video', true ) ) :

                                    $video = get_post_meta( get_the_ID(),'enable-video', true );?>

                                    <div class="img-meta-video meta-icon"><a class='meta-link meta-link-video' title="<?php the_title(); ?>" href="<?php echo esc_url( $video ) ?>" data-lity><i class="fa fa-play fa-play-circle"></i></a></div>


                                <?php endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <div class="view-all2">
                    <h3> <a href="<?php echo esc_url(get_category_link(get_theme_mod('vlogr_fe_cat2',0))); ?>">
                            <span class="title-font"><?php _e('View All','vlogr'); ?></span>
                        </a></h3>
                </div>
            </div>
    <?php endif; ?>
            <!-- Category 3 -->
    <?php if(get_theme_mod('vlogr_fe_cat3_enable')): ?>
        <div class="fg-wrapper1">
                <?php
                $count = 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'cat'  => esc_html( get_theme_mod('vlogr_fe_cat3',0) ),
                    'ignore_sticky_posts' => 1,
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    ?>
                    <div class="fg-item-container1 col-md-12 col-sm-12 col-xs-12">
                        <div class="fg-item1">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail( 'vlogr-thumb' ); ?></a>
                            <?php else : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder2.jpg" ); ?>"></a>
                            <?php endif; ?>
                            <div class="titledesc">
                                <h3><span class="title-font"><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></span></h3>
                                <?php if(  get_post_meta( get_the_ID(),'enable-video', true ) ) :

                                    $video = get_post_meta( get_the_ID(),'enable-video', true );?>

                                    <div class="img-meta-video meta-icon"><a class='meta-link meta-link-video' title="<?php the_title(); ?>" href="<?php echo esc_url( $video ) ?>" data-lity><i class="fa fa-play fa-play-circle"></i></a></div>


                                <?php endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <div class="view-all1">
                    <h3> <a href="<?php echo esc_url(get_category_link(get_theme_mod('vlogr_fe_cat3',0))); ?>">
                            <span class="title-font"><?php _e('View All','vlogr'); ?></span>
                        </a></h3>
                </div>
            </div>
    <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
