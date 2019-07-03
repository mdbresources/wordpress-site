<?php
if (!function_exists('skyhead_callback_section')) :
    /**
     * Tab callback Details
     *
     * @since skyhead 1.0.0
     *
     */
    function skyhead_callback_section()
    {
        $skyhead_callback_button_link = skyhead_get_option('show_page_link_button');
        $skyhead_callback_button_text = skyhead_get_option('callback_button_text');
        $skyhead_callback_button_url = skyhead_get_option('callback_button_link');
        $skyhead_callback_page = array();
        $skyhead_callback_page[] = esc_attr(skyhead_get_option('select_callback_page'));
        if (1 != skyhead_get_option('show_our_callback_section')) {
            return null;
        }
        if (!empty($skyhead_callback_page)) {
        $skyhead_callback_page_args = array(
            'post_type' => 'page',
            'post__in' => $skyhead_callback_page,
            'orderby' => 'post__in'
        );
        }
        if (!empty($skyhead_callback_page_args)) {
            $skyhead_callback_page_query = new WP_Query($skyhead_callback_page_args);
            while ($skyhead_callback_page_query->have_posts()): $skyhead_callback_page_query->the_post();
                if (has_excerpt()) {
                    $skyhead_callback_main_content = get_the_excerpt();
                } else {
                    $skyhead_callback_main_content = skyhead_words_count(30 , get_the_content());
                } 
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $url = $thumb['0'];
                ?>
            <!--CTA Starts-->
            <section class="section-cta section-block text-center data-bg" data-background="<?php if (has_post_thumbnail()){ echo esc_url($url); } ?>">
                <div class="cta-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="cta-title mt-40 mb-30">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <p>
                                    <?php echo esc_html($skyhead_callback_main_content); ?>
                                </p>
                                <div class="cta-btns-group">
                                    <?php if (!empty($skyhead_callback_button_text)) { ?>
                                        <a href="<?php echo esc_url($skyhead_callback_button_url ); ?>" class="btn twp-btn twp-btn-primary"><?php echo esc_html($skyhead_callback_button_text); ?></a>
                                    <?php } ?>
                                    <?php if (!empty($skyhead_callback_button_link)) { ?>
                                    <a href="<?php the_permalink();?>" class="btn twp-btn twp-btn-primary"><?php _e( 'View More', 'skyhead' ); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--CTA Ends-->
            <?php endwhile;
            wp_reset_postdata();
        } ?>
    <?php 
    }
endif;
add_action('skyhead_action_front_page', 'skyhead_callback_section', 25);
    ?>
