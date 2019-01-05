<div class="header-image-wrapper">
	<?php  if(get_post_meta( get_the_ID(),'enable-video', true ) ):?>
        <div class="post-header col-md-12 col-sm-12">
            <div class="col-md-6 col-sm-6 post-title">
                <header class="entry-header single-header">
                    <?php the_title( '<h1 class="entry-title title-font">', '</h1>' ); ?>
                    <div class="entry-meta">
                        <?php vlogr_posted_on(); ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
            </div>
            <div class="col-md-6 col-sm-6 post-img">
                <div id="featured-image">
                  <?php echo wp_oembed_get(get_post_meta( get_the_ID(),'enable-video', true ));?>
                </div>
            </div>
        </div>
        
   <?php else: ?>
   
        <div class="post-header col-md-12 col-sm-12">
            <div class="col-md-6 col-sm-6 post-title">
                <header class="entry-header single-header">
                    <?php the_title( '<h1 class="entry-title title-font">', '</h1>' ); ?>
                    <div class="entry-meta">
                        <?php vlogr_posted_on(); ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
            </div>
            <div class="col-md-6 col-sm-6 post-img">
                    <div id="featured-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('vlogr-pop-thumb'); ?></a>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
       <?php endif; ?>
</div>
