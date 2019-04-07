<?php
if (!function_exists('skyhead_service_args')) :
    /**
     * Tab Service Details
     *
     * @since skyhead 1.0.0
     *
     * @return array $qargs service details.
     */
    function skyhead_service_args()
    {
        $skyhead_service_number = absint(skyhead_get_option('number_of_home_service'));
        $skyhead_service_page_list_array = array();
        for ($i = 1; $i <= $skyhead_service_number; $i++) {
            $skyhead_service_page_list = skyhead_get_option('select_page_for_service_' . $i);
            if (!empty($skyhead_service_page_list)) {
                $skyhead_service_page_list_array[] = absint($skyhead_service_page_list);
            }
        }
        // Bail if no valid pages are selected.
        if (empty($skyhead_service_page_list_array)) {
            return;
        }
        /*page query*/
        $qargs = array(
            'posts_per_page' => esc_attr($skyhead_service_number),
            'orderby' => 'post__in',
            'post_type' => 'page',
            'post__in' => $skyhead_service_page_list_array,
        );
        return $qargs;
    }
endif;

if (!function_exists('skyhead_service')) :
    /**
     * Banner service
     *
     * @since skyhead 1.0.0
     *
     */
    function skyhead_service()
    {
        $skyhead_service_excerpt_number = absint(skyhead_get_option('number_of_content_home_service'));
        $skyhead_service_number = absint(skyhead_get_option('number_of_home_service'));
        $skyhead_service_main_title = '';
        $skyhead_service_main_content = '';
        $skyhead_service_main_url = '';
        $skyhead_service_main_page = array();
        $skyhead_service_main_page[] = esc_attr(skyhead_get_option('select_service_main_page'));
        if (1 != skyhead_get_option('show_our_service_section')) {
            return null;
        }
        /*service section main page args*/
        if (!empty($skyhead_service_main_page)) {
            $skyhead_service_main_page_args = array(
                'post_type' => 'page',
                'post__in' => $skyhead_service_main_page,
                'orderby' => 'post__in'
            );
        }
        if (!empty($skyhead_service_main_page_args)) {
            $skyhead_service_main_page_query = new WP_Query($skyhead_service_main_page_args);
            while ($skyhead_service_main_page_query->have_posts()): $skyhead_service_main_page_query->the_post();
                $skyhead_service_main_title = get_the_title();
                $skyhead_service_main_url = get_permalink();
                if (has_excerpt()) {
                    $skyhead_service_main_content = get_the_excerpt();
                } else {
                    $skyhead_service_main_content = skyhead_words_count(20 , get_the_content());
                }
            endwhile;
            wp_reset_postdata();
        } ?>
        <!-- page-section:starts -->
        <section class="section-services section-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-head">
                            <h2 class="section-title solid-border"><a href = "<?php esc_url($skyhead_service_main_url ); ?>"><?php echo wp_kses_post($skyhead_service_main_title); ?></a></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="services-carousel owl-carousel">
                            <!-- item:starts -->
                            <div class="item">
                                <div class="row">
                                    <?php $skyhead_service_args = skyhead_service_args();
                                    $skyhead_service_query = new WP_Query($skyhead_service_args);
                                    $j = 1;
                                    if ($skyhead_service_query->have_posts()) :
                                        while ($skyhead_service_query->have_posts()) : $skyhead_service_query->the_post();
                                            if (has_excerpt()) {
                                                $skyhead_service_content = get_the_excerpt();
                                            } else {
                                                $skyhead_service_content = skyhead_words_count($skyhead_service_excerpt_number, get_the_content());
                                            }
                                            $curporate_hub_service_icon = skyhead_get_option('number_of_home_service_icon_' . $j);
                                            ?>
                                                <article class="col-sm-6 col-md-6">
                                                    <div class="twp-service-icon">
                                                        <i class="icon <?php echo esc_attr($curporate_hub_service_icon); ?>"></i>
                                                    </div>
                                                    <h3 class="inner-heading"><a href= "<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                                    <div class="inner-liner"></div>
                                                    <p><?php echo esc_html($skyhead_service_content); ?></p>
                                                </article>
                                            <!-- end content-box -->
                                            <?php

                                            if ($j % 2 == 0) {
                                                echo "<div class='clear'></div>";
                                            }
                                            $j++;
                                        endwhile;
                                        wp_reset_postdata();
                                    endif; ?>

                                </div>
                            </div>
                            <!-- item:starts -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 class="block-text">
                            <span><?php echo esc_html($skyhead_service_main_content); ?></span>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-section:ends -->
        <?php
    }
endif;
add_action('skyhead_action_front_page', 'skyhead_service', 30);
