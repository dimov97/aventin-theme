<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package tino
 */

get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main single-posts">
            <div class="search-form-page">
                <?php get_search_form(); ?>
                <div class="title-search-page">
                    <h1 class="page-title">
                        <?php _e('Search Results for', 'tino'); ?>
                        <?php printf(esc_html__(': %s', 'tino'), '<span>' . get_search_query() . '</span>'); ?>
                    </h1>
                </div>
            </div>
            <?php if (have_posts()) : ?>
                <div class="products-list">
                    <div class="row-product">
                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post(); ?>
                            <?php if ( is_post_type( 'products' ) ) { ?>
                            <div class="col-3 search-product-item">
                                <div class="swiper-slide" onclick="location.href='<?php echo get_permalink(); ?>'">
                                    <div class="hover-image"><?php echo get_the_post_thumbnail(get_the_ID()); ?></div>
                                    <div class="product-name"><div class="line"></div><?php echo get_the_title(); ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php endwhile; ?>
                    </div>
                    <?php the_posts_navigation(); ?>
                </div>




            <?php else : ?>
                <div class="products-list">
                    <div class="empty-search-text"><?php _e('Oops, nothing was found by your request','tino') ?></div>
                </div>
            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
//get_sidebar();
get_footer();
