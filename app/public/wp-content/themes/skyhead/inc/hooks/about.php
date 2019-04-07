<?php
if (!function_exists('skyhead_about_args')) :
    /**
     * Tab about Details
     *
     * @since skyhead 1.0.0
     *
     * @return array $qargs about details.
     */
    function skyhead_about_args()
    {
        $skyhead_about_page_list_array = array();
        for ($i = 1; $i <= 3; $i++) {
            $skyhead_about_page_list = skyhead_get_option('select_page_for_about_' . $i);
            if (!empty($skyhead_about_page_list)) {
                $skyhead_about_page_list_array[] = absint($skyhead_about_page_list);
            }
        }
        // Bail if no valid pages are selected.
        if (empty($skyhead_about_page_list_array)) {
            return;
        }
        /*page query*/
        $qargs = array(
            'posts_per_page' => 3,
            'orderby' => 'post__in',
            'post_type' => 'page',
            'post__in' => $skyhead_about_page_list_array,
        );
        return $qargs;
    }
endif;

if (!function_exists('skyhead_about')) :
    /**
     * Banner about
     *
     * @since skyhead 1.0.0
     *
     */
    function skyhead_about()
    {
        $skyhead_about_excerpt_number = absint(skyhead_get_option('number_of_content_home_about'));
        $skyhead_about_main_title = '';
        $skyhead_about_main_content = '';
        $skyhead_about_main_url = '';
        $skyhead_about_main_thumbnail = '';
        $skyhead_about_main_page = array();
        $skyhead_about_main_page[] = esc_attr(skyhead_get_option('select_about_main_page'));
        if (1 != skyhead_get_option('show_our_about_section')) {
            return null;
        }
        /*about section main page args*/
        if (!empty($skyhead_about_main_page)) {
            $skyhead_about_main_page_args = array(
                'post_type' => 'page',
                'post__in' => $skyhead_about_main_page,
                'orderby' => 'post__in'
            );
        }
        if (!empty($skyhead_about_main_page_args)) {
            $skyhead_about_main_page_query = new WP_Query($skyhead_about_main_page_args);
            while ($skyhead_about_main_page_query->have_posts()): $skyhead_about_main_page_query->the_post();
                $skyhead_about_main_title = get_the_title();
                $skyhead_about_main_url = get_permalink();
                if (has_excerpt()) {
                    $skyhead_about_main_content = get_the_excerpt();
                } else {
                    $skyhead_about_main_content = skyhead_words_count(15 , get_the_content());
                }
                if (has_post_thumbnail()) {
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'skyhead-about-thumb');
                    $skyhead_about_main_thumbnail = $thumb['0'];
                } else {
                    $skyhead_about_main_thumbnail = get_template_directory_uri() . '/images/no-image-medium.jpg';
                }
            endwhile;
            wp_reset_postdata();
        } ?>
        <!-- page-section:starts -->
        <section class="section-about section-block section-bg">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="section-head">
                            <h2 class="section-title solid-border"><a href = "<?php esc_url($skyhead_about_main_url ); ?>"><?php echo wp_kses_post($skyhead_about_main_title); ?></a></h2>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <article class="col-md-4">
                        <h2 class="block-text">
                            <span><?php echo esc_html($skyhead_about_main_content); ?></span>
                        </h2>
                    </article>
                    <article class="col-md-8">
                        <div id="about-carousel" class="about-carousel owl-carousel">
                            <div class="item">
                                <img src="<?php echo esc_url($skyhead_about_main_thumbnail ); ?>"/>
                            </div>
                    </article>
                </div>
                    <div class="row">
                        <?php $skyhead_about_args = skyhead_about_args();
                        $skyhead_about_query = new WP_Query($skyhead_about_args);
                        $j = 1;
                        if ($skyhead_about_query->have_posts()) :
                            while ($skyhead_about_query->have_posts()) : $skyhead_about_query->the_post();
                                if (has_excerpt()) {
                                    $skyhead_about_content = get_the_excerpt();
                                } else {
                                    $skyhead_about_content = skyhead_words_count($skyhead_about_excerpt_number, get_the_content());
                                }
                                $curporate_hub_about_icon = skyhead_get_option('number-of-home-about-icon-' . $j);
                                ?>
                                    <article class="col-md-4">
                                        <h3 class="inner-heading"><a href= "<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                        <div class="inner-liner"></div>
                                        <p><?php echo esc_html($skyhead_about_content); ?></p>
                                    </article>
                                <!-- end content-box -->
                                <?php

                                if ($j % 3 == 0) {
                                    echo "<div class='clear'></div>";
                                }
                                $j++;
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
            </div>
        </section>
        <!-- page-section:ends -->
<?php
    }
endif;
add_action('skyhead_action_front_page', 'skyhead_about', 20);
