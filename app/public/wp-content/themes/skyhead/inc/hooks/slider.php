<?php
if (!function_exists('skyhead_banner_slider_args')) :
    /**
     * Banner Slider Details
     *
     * @since skyhead 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function skyhead_banner_slider_args()
    {
        $skyhead_banner_slider_number = absint(skyhead_get_option('number_of_home_slider'));
        $skyhead_banner_slider_from = esc_attr(skyhead_get_option('select_slider_from'));
        switch ($skyhead_banner_slider_from) {
            case 'from-page':
                $skyhead_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $skyhead_banner_slider_number; $i++) {
                    $skyhead_banner_slider_page_list = skyhead_get_option('select_page_for_slider_' . $i);
                    if (!empty($skyhead_banner_slider_page_list)) {
                        $skyhead_banner_slider_page_list_array[] = absint($skyhead_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($skyhead_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => esc_attr($skyhead_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $skyhead_banner_slider_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $skyhead_banner_slider_category = esc_attr(skyhead_get_option('select_category_for_slider'));
                $qargs = array(
                    'posts_per_page' => esc_attr($skyhead_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => $skyhead_banner_slider_category,
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;


if (!function_exists('skyhead_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since skyhead 1.0.0
     *
     */
    function skyhead_banner_slider()
    {
        $skyhead_slider_button_text = esc_html(skyhead_get_option('button_text_on_slider'));
        $skyhead_slider_excerpt_number = absint(skyhead_get_option('number_of_content_home_slider'));
        if (1 != skyhead_get_option('show_slider_section')) {
            return null;
        }
        $skyhead_banner_slider_args = skyhead_banner_slider_args();
        $skyhead_banner_slider_query = new WP_Query($skyhead_banner_slider_args); ?>
        <section id="intro" class="hero-slider section-block overlay" >
            <div class="intro-slider carousel inner-controls" data-single-item data-transition="fade" data-navigation
                 data-pagination>
                <?php
                if ($skyhead_banner_slider_query->have_posts()) :
                    while ($skyhead_banner_slider_query->have_posts()) : $skyhead_banner_slider_query->the_post();
                        if (has_post_thumbnail()) {
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                            $url = $thumb['0'];
                        } else {
                            $url = NULL;
                        }
                        if (has_excerpt()) {
                            $skyhead_slider_content = get_the_excerpt();
                        } else {
                            $skyhead_slider_content = skyhead_words_count($skyhead_slider_excerpt_number, get_the_content());
                        }
                        ?>
                        <!-- Slide -->
                        <div class="slide-item">
                            <!-- BG Image -->
                            <div class="bg-image layer layer-zoomOutBg">
                                <img src="<?php echo esc_url($url); ?>">
                            </div>
                            <div class="container v-center">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="layer layer-fadeInLeft">
                                            <h2 class="slide-title"><?php the_title(); ?></h2>
                                        </div>
                                        <div class="layer layer-fadeInRight">
                                            <p><?php echo wp_kses_post($skyhead_slider_content); ?></p>
                                        </div>
                                        <div class="layer layer-fadeInUp">
                                            <?php if (!empty ($skyhead_slider_button_text)) { ?>
                                                <a href="<?php the_permalink(); ?>" class="btn twp-btn twp-btn-primary"><?php echo esc_html($skyhead_slider_button_text); ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </section>
            <!-- end slider-section -->
        <?php
    }
endif;
add_action('skyhead_action_front_page', 'skyhead_banner_slider', 10);