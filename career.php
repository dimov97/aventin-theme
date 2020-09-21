<?php
/**
 * Template Name: Career-Template
 **/
get_header(); ?>

    <div class="single-header career-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/Шапка_Career_2.jpg')">
        <div class="single-header__block">
            <span class="number-line"><?php _e('Contacts','tino') ?></span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
    <div class="container">
        <div class="career">
            <h3><?php the_field('career-title');?></h3>
            <div class="career-description">
                <img src="<?php the_field('career-image');?>">
                <p><?php the_field('desc');?></p>
            </div>
            <div class="career-value">
                <h3><?php the_field('career-title-2');?></h3>
            </div>
            <div class="career-value-items">
                <?php
                if(get_field('value')) {
                    while(the_repeater_field('value')){ ?>
                        <div class="career-value__item">
                            <img src="<?php the_sub_field('image');?>">
                            <p><?php the_sub_field('text');?></p>
                        </div>
                        <?php
                    }
                } ?>
            </div>
            <div class="career-steps">
                <h3><?php the_field('career-title-3');?></h3>
                <div class="career-steps-items">
                    <div class="line"></div>
                    <?php
                    if(get_field('steps')) {
                        while(the_repeater_field('steps')){ ?>
                            <div class="career-steps__item">
                                <div class="circle"><span></span></div>
                                <h4><?php the_sub_field('name');?></h4>
                                <p><?php the_sub_field('text');?></p>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
        <div class="vacancies-all">
            <span class="number-line"><?php _e('Career','tino') ?></span>
            <h3 class="h3"><?php _e('Open vacancies','tino') ?></h3>
            <?php
            $args = array(
                'post_type' => 'vacancies',
                'publish' => true,
                'posts_per_page'=> 99,
                'orderby' => 'date',
                'order'   => 'DESC',
            );
            $query = new WP_Query( $args );
            while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="vacancies-item">
                    <p> <?php echo get_the_title();?></p>
                    <a href="<?php echo get_permalink();?>" class="btn hvr-fade"><?php _e('More details','tino') ?><span class="icon-arrow-btn"></span></a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php get_footer(); ?>