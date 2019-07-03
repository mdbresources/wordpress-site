<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Skyhead
 */

if (!function_exists('skyhead_trigger_custom_css_action')) :

    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
    function skyhead_trigger_custom_css_action()
    {

        $skyhead_enable_banner_overlay = skyhead_get_option('enable_overlay_option');
        ?>
        <style type="text/css">
            <?php
            /* Banner Image */
            if ( $skyhead_enable_banner_overlay == 1 ){
                ?>
                    .inner-header-overlay,
                    .hero-slider.overlay .slide-item .bg-image:before {
                        background: #111;
                        filter: alpha(opacity=55);
                        opacity: 0.55;
                    }
            <?php
        } ?>
        </style>

    <?php }

endif;

add_action('wp_head', 'skyhead_trigger_custom_css_action', 99);
