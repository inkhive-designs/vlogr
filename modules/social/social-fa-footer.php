<?php
for( $i=1; $i < 8; $i++):
    $social = esc_attr(get_theme_mod('vlogr_social_'.$i));
    if ( ($social != 'none') && ($social != '') ) : ?>
        <a class="common" href="<?php echo esc_url( get_theme_mod('vlogr_social_url'.$i) ); ?>"><i class="fab fa-fw fa-<?php echo $social; ?>"></i></a>
        <?php
    endif;
endfor;
