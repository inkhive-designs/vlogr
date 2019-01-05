<?php if ( get_theme_mod('vlogr_featposts_cat_enable') && is_front_page() ): ?>
    <div id="featured-cat">
        <div class="featured-cat-container container">
            <?php if( get_theme_mod( 'vlogr_featcat_title' ) != '' ): ?>
                <div class="section-title">
                        <span>
                            <?php echo esc_html( get_theme_mod( 'vlogr_featcat_title', __( 'Featured Category Area','vlogr' ) ) ); ?>
                        </span>
                </div>
            <?php endif; ?>
        <div class="cat">
            <?php for( $i=1; $i<=6; $i++ ) : ?>
                <div class="f-cat-wrapper col-md-4 col-sm-4">
                    <?php $catname = get_cat_name( get_theme_mod( 'vlogr_featposts_category_'.$i ) );
                    if ($catname != '' ) :
                        $catname 		= get_cat_name( get_theme_mod('vlogr_featposts_category_'.$i ) );
                        $catid 			= get_theme_mod( 'vlogr_featposts_category_'.$i );
                        $catdesc 		= category_description( get_theme_mod( 'vlogr_featposts_category_'.$i ) );
                        $category_link 	= get_category_link( get_theme_mod( 'vlogr_featposts_category_'.$i ) );
                        $args=array(
                            'cat' => $catid,
                            'orderby' => 'date',
                            'post_status' => 'publish',
                            'posts_per_page'	=> 1,
                        );
                        $the_query = new WP_Query ( $args );
                        if($the_query->have_posts()) :
                            while ($the_query -> have_posts()) :
                                $the_query -> the_post(); ?>
                                <div class="out-thumb">
                                    <div class="folder">
                                        <a class="a" href="<?php echo esc_url( $category_link ); ?>"></a>
                                    </div>
                                    <a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html( $catname ); ?></a>
                                    <?php if ( $catdesc != '' ) : ?>
                                        <div class="cat-desc">
                                            <p><?php  esc_html( print_r( substr($catdesc, 0, 100) . (strlen($catdesc) >= 100 ? "..." : "") ) ); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile;
                        endif;
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    endif; ?>
                </div>
            <?php endfor; ?>
        </div>
        </div>
    </div>
<?php endif; ?>
