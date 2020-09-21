<?php
/**
 * Template Name: About-Template
 **/
get_header(); ?>

    <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
        <div class="single-header__block">
            <span class="number-line"><?php _e('About us','tino') ?></span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
<div class="container">
    <div class="our-concept">
        <div class="concept">
            <?php
            if(get_field('concept')) {
                while(the_repeater_field('concept')){ ?>
                    <div class="concept__item">
                        <div class="mobile-concept-item">
                            <img src="<?php the_sub_field('image');?>" alt="" style="display: none" class="mobile-item-image">
                            <h3> <?php the_sub_field('title');?></h3>
                        </div>
                        <div class="concept-block">
                            <img src="<?php the_sub_field('image');?>" alt="">
                            <p><?php the_sub_field('text');?></p>
                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>
        <h3>Наши ценности</h3>
        <div class="features__items">
            <?php
            if(get_field('features_blocks', 2)) {
                while(the_repeater_field('features_blocks', 2)){ ?>
                    <div class="features__item">
                        <img src="<?php the_sub_field('image');?>">
                        <div class="features__item-texts">
                            <h4><?php the_sub_field('header');?></h4>
                            <p><?php the_sub_field('text');?></p>
                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>