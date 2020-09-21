<?php
/**
 * Template Name: MainPage-Template
 **/
get_header(); ?>

            <div class="hero-main">
                <div class="hero-blur">
                    <video autoplay muted loop playsinline id="myVideo">
                        <source src="<?php echo ot_get_option('video')?>" type="video/mp4">
                    </video>
                </div>
                <div class="hero-main-wrapper">
                    <h2><?php the_field('main_header');?></h2>
                    <a href="" class="btn hvr-fade wp-video-popup"><?php the_field('button_text');?></a>
                    <?php echo do_shortcode('[wp-video-popup video="https://www.youtube.com/watch?v=k5qXyiI683g"]');?>
                </div>
            </div>
        </div>
    </section>

    <section class="features" data-aos="fade-up">
        <div class="container features-wrapper">
            <span class="number-line">01</span>
            <h3><?php the_field('features');?></h3>
            <div class="features__items">
                <?php
                    if(get_field('features_blocks')) {
                        while(the_repeater_field('features_blocks')){ ?>
                            <div class="features__item">
                                <img src="<?php the_sub_field('image');?>" alt="">
                                <div class="features__item-info">
                                    <h4><?php the_sub_field('header');?></h4>
                                    <p><?php the_sub_field('text');?></p>
                                </div>
                            </div>
                            <?php
                        }
                    } ?>
            </div>
        </div>
    </section>

    <section class="products" data-aos="fade-up">
        <div class="container products-wrapper">
            <span class="number-line">02</span>
            <div class="products-header">
                <h3><?php _e('Products','tino') ?></h3>
                <div class="swiper-pagination-products"></div>
            </div>
            <div class="products-slider">
                <div class="swiper-container swiper-products">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'products',
                            'publish' => true,
                            'posts_per_page'=> 99,
                        );
                        $query = new WP_Query( $args );
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="swiper-slide" onclick="location.href='<?php echo get_permalink();?>'"><div class="hover-image"><?php echo get_the_post_thumbnail(get_the_ID());?></div><div class="product-name"><div class="line"></div><?php echo get_the_title() ;?></div></div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                     </div>
                </div>
            </div>
        </div>
    </section>

    <section class="logos" data-aos="fade-up">
        <div class="container logos-wrapper">
            <span class="number-line">03</span>
            <div class="logos-header">
                <h3><?php _e('They trust us','tino') ?></h3>
                <div class="swiper-pagination-logo"></div>
            </div>
            <div class="logos-slider">
                <div class="swiper-container swiper-logo">
                    <div class="swiper-wrapper">
                    <?php
                    if(get_field('logos')) {
                        while(the_repeater_field('logos')){ ?>
                        <div class="swiper-slide"><img src="<?php the_sub_field('image');?>" alt=""></div>
                            <?php
                        }
                    } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news" data-aos="fade-up">
        <div class="news-wrapper container">
            <span class="number-line">04</span>
            <h3><?php _e('News','tino') ?></h3>
            <div class="news-items">
                <div class="news__left">
                    <?php
                    $args = array(
                        'category_name'=>'news',
                        'posts_per_page'=> 2,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                    );
                    $query = new WP_Query( $args );
                    while ( $query->have_posts() ) : $query->the_post();
                    echo '<a href="'.get_permalink().'">
                        <div class="news-item">
                            <div class="hover-image">'. get_the_post_thumbnail(get_the_ID()).'<p class="news-date">'.get_the_date("F j, Y").'</p>
                                <p class="news-title">'.get_the_title().'</p>
                            </div>
                        </div>
                    </a>';
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="news__right">
                    <?php
                    $args = array(
                        'category_name'=>'news',
                        'posts_per_page'=> 4,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'offset'  => 2
                    );
                    $query = new WP_Query( $args );
                    while ( $query->have_posts() ) : $query->the_post();
                        echo '<a href="'.get_permalink().'">
                        <div class="news-item"><div class="hover-image">'. get_the_post_thumbnail(get_the_ID()).'</div><div class="news-info"><p class="news-date">'.get_the_date("F j, Y").'</p>
                            <p class="news-title">'.get_the_title().'</p></div>
                        </div>
                    </a>';
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/Main_Page.jpg')" data-aos="fade-up">
        <div class="container banner-wrapper">
            <div class="banner-center">
                <span class="number-line">05</span>
                <h3><?php the_field('title_footer');?></h3>
                <a class="btn popup-opener hvr-fade" data-popup="upload"><?php _e('Send request', 'tino'); ?></a>
            </div>
        </div>
    </section>

<?php get_footer(); ?>