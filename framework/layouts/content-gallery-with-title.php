<?php
/**
 * @package vlogr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4 col-sm-4 col-xs-12 grid gallery-with-title' ); ?>>
    <div class="featured-thumb">
        <?php 
	        if (has_post_thumbnail()) : ?>
            	<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
	            	<?php the_post_thumbnail( 'vlogr-thumb', array(  'alt' => trim( strip_tags( $post->post_title ) ) ) ); ?>
	            </a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
	            <img alt="<?php the_title() ?>" src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder2.jpg" ); ?>">
	        </a>
        <?php endif; ?>
        
        <?php if(  get_post_meta( get_the_ID(),'enable-video', true ) ) :?>
            <div class="img-meta-with-video">
                <div class="left">
                    <div class="img-meta-link meta-icon"><a class='meta-link' href="<?php the_permalink() ?>"><i class="fa fw-link fa-link"></i></a></div>
                    <?php
	                	$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src( $thumb_id,'vlogr-pop-thumb', true );
                    ?>
                    <div class="img-meta-img meta-icon">
	                    <a class='meta-link meta-link-img' title="<?php the_title(); ?>" href="<?php echo esc_url( $thumb_url[0] ) ?>" data-lity>
		                    <i class="fa fa-image fa-play-image"></i>
		                </a>
		            </div>
                </div>
                <div class="right">
                    <?php  $video = get_post_meta( get_the_ID(), 'enable-video', true );
                    ?>
                    <div class="img-meta-video meta-icon">
	                    <a class='meta-link meta-link-video' title="<?php the_title(); ?>" href="<?php echo esc_url( $video ) ?>" data-lity>
		                    <i class="fa fa-play fa-play-circle"></i>
		                </a>
		            </div>
                </div>
            </div>
        <?php
        else:?>
            <div class="img-meta">
                <div class="img-meta-link meta-icon">
	                <a class='meta-link' href="<?php the_permalink() ?>">
		                <i class="fa fw-link fa-link"></i>
		            </a>
		        </div>
                <?php 
	            	$thumb_id 	= get_post_thumbnail_id();
					$thumb_url	= wp_get_attachment_image_src( $thumb_id, 'vlogr-pop-thumb', true );
                ?>
                <div class="img-meta-img meta-icon"><a class='meta-link meta-link-img' title="<?php the_title(); ?>" href="<?php echo esc_url( $thumb_url[0] ) ?>" data-lity><i class="fa fa-image fa-play-image"></i></a></div>
            </div>
        <?php endif;
        ?>
    </div><!--.featured-thumb-->


    <div class="out-thumb">
        <header class="entry-header">
            <h3 class="entry-title body-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
        </header><!-- .entry-header -->
    </div><!--.out-thumb-->


</article><!-- #post-## -->




