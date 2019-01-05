<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 2/27/2018
 * Time: 6:53 PM
 */
?>
<div class="mobilemenu">
    <a href="#mobile-navigation" class="menu-link">&#9776;</a>
    <nav id="menu" class="panel col title-font" role="navigation">
        <?php
        //Display the Mobile Menu.
        wp_nav_menu( array( 'theme_location' => 'menu-3',
            'menu-id'        => 'menu-3') ); ?>
    </nav><!-- #site-navigation -->
</div>
