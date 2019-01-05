<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vlogr
 */

?>
<section class="no-results not-found">
    <header class="page-header single-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'vlogr' ); ?></h1>
    </header><!-- .page-header -->
    <div class="page-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php
                printf(
                    wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vlogr' ),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
                ?></p>

        <?php elseif ( is_search() ) : ?>
            <a><img alt="<?php the_title() ?>" src="<?php echo esc_url( get_template_directory_uri()."/assets/images/404.jpeg" ); ?>"></a>

            <h2><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vlogr' ); ?></h2>
            <?php
            get_search_form();

        else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'vlogr' ); ?></p>
            <?php
            get_search_form();

        endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
