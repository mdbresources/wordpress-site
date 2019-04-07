<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skyhead
 */

?>


</div><!-- #content -->
<?php if ( 1 == skyhead_get_option('enable_social_nav')) { ?>
    <section class="social-section section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-offset-2">
                    <div class="social-icons">
                        <?php
                        wp_nav_menu(array('theme_location' => 'social', 'link_before' => '<span>',
                            'link_after' => '</span>', 'menu_id' => 'primary-menu', 'fallback_cb' => false,));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<footer id="colophon" class="site-footer primary-bg" role="contentinfo">
    <?php
    $skyhead_footer_widgets_number = skyhead_get_option('number_of_footer_widget');
    if ($skyhead_footer_widgets_number <= 0) {
        return false;
    }
    if (1 == $skyhead_footer_widgets_number) {
        $col = 'col-md-12';
    } elseif (2 == $skyhead_footer_widgets_number) {
        $col = 'col-md-6';
    } elseif (3 == $skyhead_footer_widgets_number) {
        $col = 'col-md-4';
    } elseif (4 == $skyhead_footer_widgets_number) {
        $col = 'col-md-3';
    } else {
        $col = 'col-md-3';
    }
    ?>
    <section class="wrapper block-section footer-widgets pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php if (is_active_sidebar('footer-col-one') && $skyhead_footer_widgets_number > 0) : ?>
                            <div class="contact-list <?php echo esc_attr($col); ?>">
                                <?php dynamic_sidebar('footer-col-one'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (is_active_sidebar('footer-col-two') && $skyhead_footer_widgets_number > 1) : ?>
                            <div class="contact-list <?php echo esc_attr($col); ?>">
                                <?php dynamic_sidebar('footer-col-two'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (is_active_sidebar('footer-col-three') && $skyhead_footer_widgets_number > 2) : ?>
                            <div class="contact-list <?php echo esc_attr($col); ?>">
                                <?php dynamic_sidebar('footer-col-three'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (is_active_sidebar('footer-col-four') && $skyhead_footer_widgets_number > 3) : ?>
                            <div class="contact-list <?php echo esc_attr($col); ?>">
                                <?php dynamic_sidebar('footer-col-four'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <!-- end col-12 -->
        <div class="row">
            <?php do_action('skyhead_action_widget_footer'); ?>
            <div class="copyright-area">
                <div class="site-info">
                    <h4 class="site-copyright">
                        <?php
                        $skyhead_copyright_text = skyhead_get_option('copyright_text');
                        if(!empty ($skyhead_copyright_text)){
                            echo wp_kses_post(skyhead_get_option('copyright_text'));
                        }
                        ?>
                        <span class="sep"> | </span>
                        <?php printf(esc_html__('Theme: %1$s by %2$s', 'skyhead'), 'Skyhead', '<a href="http://themeinwp.com/" target = "_blank" rel="designer">Themeinwp </a>'); ?>
                    </h4>
                </div><!-- .site-info -->
            </div>
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end container -->
</footer>
</div><!-- #page -->
<a id="scroll-up"><i class="ion-ios-arrow-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
