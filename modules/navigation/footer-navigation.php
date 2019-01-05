<div id="footer-menu">
    <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Footer Menu', 'vlogr' ); ?></button>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-2',
            'menu_id'        => 'menu-2',
        ) );
        ?>
    </nav><!-- #site-navigation -->
</div>
