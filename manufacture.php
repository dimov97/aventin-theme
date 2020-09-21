<?php
/**
 * Template Name: Manufacture-Template
 **/
get_header(); ?>

    <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
        <div class="single-header__block">
            <span class="number-line"><?php _e('Manufacture','tino') ?></span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
<div class="container">
    <div class="manufacture">
        <?php
        $args = array(
            'category_name'=>'manufacture',
            'posts_per_page'=> 99,
            'orderby' => 'date',
            'order'   => 'DESC',
        );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) : $query->the_post();
            $man = get_field('manufacture', get_the_ID());
            $excerpt = wp_trim_words( $man[0]["text"], $num_words = 15, $more = '...' );
            echo '<a href="'.get_permalink().'" class="manufacture-item">
                     <div class="manufacture-block">'. get_the_post_thumbnail(get_the_ID()).'
                         <div class="manufacture-info">
                             <h4 class="news-title">'.get_the_title().'<span class="icon-arrow-btn"></span></h4>
                             <p>'.$excerpt.'</p>
                         </div>
                     </div>
                  </a>';
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>
<?php get_footer(); ?>