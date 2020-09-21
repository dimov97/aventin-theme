<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tino
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main single-posts">
            <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
                <div class="single-header__block">
                    <span class="number-line"><?php _e('Career','tino') ?></span>
                    <h3><?php the_title();?></h3>
                </div>
            </div>
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );


            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
