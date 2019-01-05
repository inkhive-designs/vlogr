<div class="container">
<header id="masthead" class="site-header">
    <div class="site-branding">
        <div class="col-md-8 col-sm-12 site-title-wrapper">
            <?php
             if ( has_custom_logo() ) : ?>
                <div class="vlogr-logo">
                    <div id="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
            <?php else:?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html( bloginfo( 'name' ) ); ?></a></h1>
                <?php

            $description = esc_html( get_bloginfo( 'description', 'display' ) );
            if ( $description || is_customize_preview() ) : ?>
                <h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
                <?php
            endif;
                endif;?>
        </div>
    </div><!-- .site-branding -->
</header><!-- #masthead -->
</div>
