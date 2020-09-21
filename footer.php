<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tino
 */

?>
<section class="iso">
    <div class="iso-wrapper">
        <?php $images = explode( ',', ot_get_option( 'gallery_iso', '' ) );
            if ( ! empty( $images ) ) {
                foreach( $images as $id ) {
                    if ( ! empty( $id ) ) {
                        $full_img_src = wp_get_attachment_image_src( $id, '' );
                        echo '<img src="' . $full_img_src[0] . '" alt=""/>';
                    }
                }
            } ?>
    </div>
</section>
</div>
</div>
<footer class="footer">
    <div class="footer-wrapper">
        <div class="footer-inner">
            <div class="col contacts">
                <img src="<?php echo ot_get_option('light_logo')?>">
                <a href="tel:<?php echo ot_get_option('phone')?>"><span class="icon-telephone"></span><?php echo ot_get_option('phone')?></a>
                <a href="mailto:<?php echo ot_get_option('mail')?>"><span class="icon-close-envelope"></span><?php echo ot_get_option('mail')?></a>
            </div>
            <div class="col">
                <h4><a href="<?php echo get_permalink('637')?>"><?php _e('About us','tino') ?></a></h4>
                <?php wp_nav_menu(array('menu'=> 'first column', 'theme_location' => 'first column')); ?>
            </div>
            <div class="col">
                <h4><a href="<?php echo get_permalink('71')?>"><?php _e('Products','tino') ?></a></h4>
                <?php wp_nav_menu(array('menu'=> 'second column', 'theme_location' => 'second column')); ?>
            </div>
            <div class="col">
                <h4><a href="<?php echo get_permalink('89')?>"><?php _e('Manufacture','tino') ?></a></h4>
                <?php wp_nav_menu(array('menu'=> 'third column', 'theme_location' => 'third column')); ?>
            </div>
            <div class="col">
                <h4><a href="<?php echo get_permalink('153')?>"><?php _e('Contacts','tino') ?></a></h4>
                <?php wp_nav_menu(array('menu'=> 'forth column', 'theme_location' => 'forth column')); ?>
            </div>
        </div>
        <div class="footer-info">
            <p>© <?php echo date("Y"); ?> <?php _e('All rights reserved', 'tino'); ?> - aventin.ua</p>
            <a href="https://tino.agency" class="made-by">Made by Tino</a>
        </div>
    </div>
</footer>
<div class="popup-wrapper" id="upload" hidden>
    <div class="popup" id="popup">
        <div class="popup-header">
            <button class="close">
                <span class="icon-close"></span>
            </button>
        </div>
        <div class="popup-content">
            <span class="number-line"><?php _e('Contact us','tino') ?></span>
            <h3><?php _e('Send request','tino') ?></h3>
            <?php
            if(ICL_LANGUAGE_CODE=='ru') {
                echo do_shortcode('[contact-form-7 id="329" title="Отправить запрос"]');
            }
            elseif(ICL_LANGUAGE_CODE=='uk'){
                echo do_shortcode('[contact-form-7 id="504" title="Отправить запрос"]');
            }
            else
                echo do_shortcode('[contact-form-7 id="505" title="Send request"]');
            ?>
        </div>
    </div>
</div>
<div class="popup-wrapper" id="quality" hidden>
    <div class="popup" id="popup">
        <div class="popup-header">
            <button class="close">
                <span class="icon-close"></span>
            </button>
        </div>
        <div class="popup-content">
            <iframe id="frame"></iframe>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    (function(d, w, s) {
        var widgetHash = '6459wg6jcwttedv2umca', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
        gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
        var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
    })(document, window, 'script');
</script>
<?php wp_footer(); ?>

</body>
</html>
