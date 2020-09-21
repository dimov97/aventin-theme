<?php
/**
 * Template Name: News-Template
 **/
get_header(); ?>

    <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
        <div class="single-header__block">
            <span class="number-line"><?php _e('About us','tino') ?></span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
    <div class="container">
        <div class="news-block">
            <?php
            $args = array(
                'category_name'=>'news',
                'posts_per_page'=> 999,
                'orderby' => 'date',
                'order'   => 'DESC',
            );
            $query = new WP_Query( $args );
            while ( $query->have_posts() ) : $query->the_post();
                echo '<a href="'.get_permalink().'" class="news-permalink">
                            <div class="news-item"><div class="hover-image">'. get_the_post_thumbnail(get_the_ID()).'</div><p class="news-date">'.get_the_date("F j, Y").'</p>
                                <p class="news-title">'.get_the_title().'</p>
                            </div>
                        </a>';
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php get_footer(); ?>