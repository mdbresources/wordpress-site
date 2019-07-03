<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skyhead
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- full-screen-layout/boxed-layout -->
<?php if (skyhead_get_option('homepage_layout_option') == 'full-width') {
    $skyhead_homepage_layout = 'full-screen-layout';
} elseif (skyhead_get_option('homepage_layout_option') == 'boxed') {
    $skyhead_homepage_layout = 'boxed-layout';
} ?>
<div id="page" class="site site-bg <?php echo esc_attr($skyhead_homepage_layout); ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'skyhead'); ?></a>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-bar-info">
                        <ul>
                            <?php 
                            $skyhead_top_header_email = skyhead_get_option('top_header_email');
                            if (!empty($skyhead_top_header_email)) { ?>
                                <li class="top-info info-email">
                                    <a href="mailto:<?php echo esc_attr( skyhead_get_option('top_header_email') ); ?>">
                                        <?php echo esc_attr( skyhead_get_option('top_header_email') ); ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            $skyhead_top_header_no = skyhead_get_option('top_header_no');
                             if (!empty($skyhead_top_header_no)) {  ?>
                                <li class="top-info info-tel">
                                    <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( skyhead_get_option('top_header_no') ) ); ?>">
                                        <?php echo esc_attr( skyhead_get_option('top_header_no') ); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <div class="social-icons">
                            <?php
                            wp_nav_menu(array('theme_location' => 'social', 'link_before' => '<span>',
                                'link_after' => '</span>', 'menu_id' => 'primary-menu', 'fallback_cb' => false,));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--    Topbar Ends-->
    <header id="masthead" class="site-header" role="banner">
        <div class="top-header">
            <div class="container">
                <div class="site-branding">
                    <?php
                    if (is_front_page() && is_home()) : ?>
                        <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                    rel="home"><?php bloginfo('name'); ?></a></span>
                    <?php else : ?>
                        <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                    rel="home"><?php bloginfo('name'); ?></a></span>
                        <?php
                    endif;
                    skyhead_the_custom_logo();
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif; ?>
                </div><!-- .site-branding -->
                <div class="twp-nav ">
                    <ul class="navbar-extras">
                        <li>
                            <a href="#" class="search-button">
                                <i class="icon twp-icon ion-ios-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <a id="nav-toggle" href="#" aria-controls="primary-menu" aria-expanded="false">
                        <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'skyhead'); ?>
                        </span>
                        <span class="icon-bar top"></span>
                        <span class="icon-bar middle"></span>
                        <span class="icon-bar bottom"></span>
                    </a>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header>
    <div class="search-box">
        <?php get_search_form(); ?>
    </div><!-- Searchbar Ends-->
    <!-- #masthead -->
    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page() && !is_home()) {

    } else {
        do_action('skyhead-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">