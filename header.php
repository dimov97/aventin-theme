<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tino
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <div class="content">
        <aside class="navigation">
            <div class="menu">
                <span class="icon-menu"></span>
            </div>
            <span class="icon-search"></span>
            <?php wp_nav_menu(array('menu'=> 'menu-lang', 'theme_location' => 'menu-lang')); ?>
        </aside>
        <div class="open-menu">
            <div class="mobile-color">
                <div class="close-menu">
                    <span class="icon-close"></span>
                </div>
                <div class="menu-container">
                    <div class="mobile-language"><?php wp_nav_menu(array('menu'=> 'menu-lang', 'theme_location' => 'menu-lang')); ?></div>
                    <div class="block"><h2><a href="<?php echo get_permalink('637')?>"><?php _e('About us','tino') ?></a></h2><span class="icon-next"></span><?php wp_nav_menu(array('menu'=> 'first column', 'theme_location' => 'first column', 'menu_class' => 'col')); ?></div>
                    <div class="block"><h2><a href="<?php echo get_permalink('71')?>"><?php _e('Products','tino') ?></a></h2><span class="icon-next"></span><?php wp_nav_menu(array('menu'=> 'second column', 'theme_location' => 'second column', 'menu_class' => 'col')); ?></div>
                    <div class="block"><h2><a href="<?php echo get_permalink('89')?>"><?php _e('Manufacture','tino') ?></a></h2><span class="icon-next"></span><?php wp_nav_menu(array('menu'=> 'third column', 'theme_location' => 'third column', 'menu_class' => 'col')); ?></div>
                    <div class="block"><h2><a href="<?php echo get_permalink('153')?>"><?php _e('Contacts','tino') ?></a></h2><span class="icon-next"></span><?php wp_nav_menu(array('menu'=> 'forth column', 'theme_location' => 'forth column', 'menu_class' => 'col')); ?></div>
                    <div class="mobile-search">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="mobile-line"></div>
                    <div class="mobile-contacts">
                        <a href="tel:<?php echo ot_get_option('phone')?>"><span class="icon-telephone"></span><?php echo ot_get_option('phone')?></a>
                        <a href="mailto:<?php echo ot_get_option('mail')?>"><span class="icon-close-envelope"></span><?php echo ot_get_option('mail')?></a>
                        <a class="contacts-button popup-opener hvr-fade" data-popup="upload"><?php _e('Send request', 'tino'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-area">
            <div class="close-search">
                <span class="icon-close"></span>
            </div>
            <div class="desktop-search">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="main-site">
            <section class="hero">
                <div class="hero-wrapper">
                    <div class="header">
                        <div class="header-wrapper">
                            <div class="menu-mobile">
                                <span class="icon-menu"></span>
                            </div>
                            <div class="logo">
                                <a href="<?php echo get_home_url(); ?>">
                                    <img src="<?php echo ot_get_option('logo')?>" alt="">
                                </a>
                            </div>
                            <div class="contacts">
                                <a href="tel:<?php echo ot_get_option('phone')?>"><span class="icon-telephone"></span><?php echo ot_get_option('phone')?></a>
                                <a href="mailto:<?php echo ot_get_option('mail')?>"><span class="icon-close-envelope"></span><?php echo ot_get_option('mail')?></a>
                                <a href="https://aventin-shop.com.ua" target="_blank" style="color: #2D42AB;"><?php _e('Online store', 'tino'); ?></a>
                                <a class="contacts-button popup-opener hvr-fade" data-popup="upload"><?php _e('Send request', 'tino'); ?></a>
                            </div>
                        </div>
                    </div>