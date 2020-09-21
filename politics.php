<?php
/**
 * Template Name: Politics-Template
 **/
get_header(); ?>

    <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
        <div class="single-header__block">
            <span class="number-line"><?php _e('About us','tino') ?></span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
    <div class="container">
        <div class="politics">
            <?php
            if(get_field('politic')) {
                while(the_repeater_field('politic')){ ?>
                    <div class="politics-item">
                        <p> <?php the_sub_field('name');?></p>
                        <a href="<?php the_sub_field('link');?>" target="_blank" class="btn hvr-fade"><?php _e('Read','tino') ?><span class="icon-arrow-btn"></span></a>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
<?php get_footer(); ?>