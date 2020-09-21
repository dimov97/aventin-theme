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
                <?php if(in_category('news') || in_category('news-en') || in_category('news-uk')){ ?>
                    <span class="number-line"><?php _e('About us','tino') ?></span>
                    <h3><?php _e('News','tino') ?></h3>
                <?php } elseif(in_category('manufacture') || in_category('manufacture-en') || in_category('manufacture-uk')) { ?>
                    <span class="number-line"><?php _e('Manufacture','tino') ?></span>
                    <h3><?php the_title();?></h3>
                <?php } else{ ?>
                    <span class="number-line"><?php _e('Career','tino') ?></span>
                    <h3><?php the_title();?></h3>
                <?php } ?>
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
