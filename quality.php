<?php
/**
 * Template Name: Quality-Template
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
            <?php the_field('tekst');?>
        </div>
        <span class="number-line"><?php the_title();?></span>
        <h3 class="h3"><?php _e('Sertificates','tino') ?></h3>
        <div class="quality">
            <?php
            if(get_field('quality')) {
                while(the_repeater_field('quality')){ ?>
                    <div class="quality__item hvr-fade">
                        <a class="popup-opener quality-button" data-popup="quality" data-src="<?php the_sub_field('file');?>"><?php the_sub_field('name');?></a>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
<?php get_footer(); ?>