<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package tino
 */
get_header('not-found');
?>

    <div class="main-site not-found">
        <section class="404">
            <div class="header">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo ot_get_option('light_logo')?>">
                        </a>
                    </div>
                </div>
            </div>
            <div class="not-found-block">
                <div class="block__left">
                    <span class="number-line"><?php _e('Error','tino') ?> 404</span>
                    <h3><?php _e('Page not found','tino') ?></h3>
                    <a href="<?php echo get_home_url(); ?>" class="btn"><?php _e('Home','tino') ?><span class="icon-arrow-btn"></span></a>
                </div>
                <div class="block__right">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/404.png">
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();
