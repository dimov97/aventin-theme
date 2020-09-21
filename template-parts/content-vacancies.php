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
    <?php
    $posts = get_field('vacancy-form');
    if($posts) {?>
        <span class="number-line"><?php _e('Career','tino') ?></span>
        <h3><?php _e('Apply','tino') ?></h3>
        <div class="contact-form">
            <?php
                echo do_shortcode( '[contact-form-7 id="'.$posts.'" ]' );
             ?>
        </div>
    <?php }
    wp_reset_postdata();?>
</article>
