<?php
/**
 * Template Name: Products-Template
 **/
get_header(); ?>

    <div class="single-header" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/photo.jpg')">
        <div class="single-header__block">
            <span class="number-line"><?php _e('Products','tino') ?></span>
            <h3><?php the_title();?></h3>
        </div>
    </div>
    <?php
        echo '<div class="all-products">';
        $args = array(
            'post_type' => 'products',
            'publish' => true,
            'posts_per_page'=> 99,

        );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="all-products__item" onclick="location.href='<?php echo get_permalink();?>'"><div class="hover-image"><?php echo get_the_post_thumbnail(get_the_ID());?></div><div class="product-name"><div class="line"></div><?php echo get_the_title();?></div></div>

        <?php endwhile;
wp_reset_postdata();
echo '</div>';
    ?>

<?php get_footer(); ?>