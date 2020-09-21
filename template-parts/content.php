<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tino
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(in_category('news') || in_category('news-en') || in_category('news-uk')){ ?>
    <header class="entry-header">
		<?php
        if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <?php
                tino_posted_on();
                ?>
            </div><!-- .entry-meta -->
        <?php endif;

        if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		?>
	</header><!-- .entry-header -->
    <div class="single-post-data">
<!--        --><?php //tino_post_thumbnail(); ?>

        <div class="entry-content" style="width: 100%;">
            <?php
            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tino' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );

            ?>
        </div>
    </div>
    <?php } elseif(in_category('manufacture') || in_category('manufacture-en') || in_category('manufacture-uk')) { ?>

        <div class="single-post-data manufacture">
            <?php tino_post_thumbnail(); ?>

            <div class="entry-content">
                <?php
                if(get_field('manufacture')) {
                    while (the_repeater_field('manufacture')) { ?>
                        <h3><?php the_sub_field('title');?></h3>
                        <?php the_sub_field('text');?>
                    <?php }
                }
                ?>
            </div>
        </div>

        <div class="related-posts">
            <span class="number-line"><?php _e('Manufacture','tino') ?></span>
            <div class="manufacturers-header">
                <h3 class="h3"><?php _e('All services','tino') ?></h3>
                <div class="swiper-pagination-manufacturers"></div>
            </div>
            <div class="swiper-container swiper-manufacturers">
                <div class="swiper-wrapper">
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
                        echo '<a href="'.get_permalink().'" class="swiper-slide manufacture-item manufacture-item-slide">
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
        </div>

    <?php } else{ ?>
        <div class="vacancy-single">
        <?php
        if(get_field('vacancy')) {
            while (the_repeater_field('vacancy')) { ?>
                <h3><?php the_sub_field('vacancy-title');?></h3>
                <?php the_sub_field('vacancy-text');?>
            <?php }
        }
        ?>
        </div>
        <span class="number-line"><?php _e('Career','tino') ?></span>
        <h3><?php _e('Apply','tino') ?></h3>
        <div class="contact-form">
        <?php
        $posts = get_field('vacancy-form');

        echo do_shortcode( '[contact-form-7 id="'.$posts.'" ]' );
        wp_reset_postdata();
           } ?>
        </div>
</article>
