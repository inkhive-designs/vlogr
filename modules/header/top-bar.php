<div class="top-bar">
        <header id="masthead" class="site-header">
        <div class="site-branding">
            <div class="site-title-wrapper">
                <?php
                if ( has_custom_logo() ) : ?>
                        <div id="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                <?php else:?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html( bloginfo( 'name' ) ); ?></a></h1>
                    <?php

                    $description = esc_html( get_bloginfo( 'description', 'display' ) );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif;
                endif;?>
            </div>
        </div><!-- .site-branding -->


        <?php get_template_part('modules/navigation/primary','menu'); ?>
        <?php get_template_part('modules/navigation/mobile','menu'); ?>

    </header>
</div>
