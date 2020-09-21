<?php
/**
 * Template Name: Company-Template
 **/
get_header(); ?>

    <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
        <div class="single-header__block">
            <span class="number-line"><?php _e('About us','tino') ?></span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
    <div class="container">

        <div class="quality-desc">
            <?php the_field('company');?>
        </div>

    </div>
<?php get_footer(); ?>