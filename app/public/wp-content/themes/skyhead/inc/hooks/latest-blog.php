<?php
if (!function_exists('skyhead_blog')) :
    /**
     * blog
     *
     * @since skyhead 1.0.0
     *
     */
    function skyhead_blog()
    {
        $skyhead_blog_excerpt_number = absint(skyhead_get_option('number_of_excerpt_home_blog'));
        $skyhead_blog_category = esc_attr(skyhead_get_option('select_category_for_blog'));
        if (1 != skyhead_get_option('show_blog_section')) {
            return null;
        }
        ?>
        <section class="latest-post section-bg section-block pb-0">

                <div class="container-fluid">
                    <div class="row">
                        <div class="latest-blog-heading clearfix">
                            <div class="col-sm-8 col-xs-12">
                                <div class="section-head">
                                    <h2 class="section-title">
                                        <?php 
                                        $allowed_tags = array(
                                           'span' => array(
                                               'class' => array(),
                                               'id' => array()
                                           ),
                                        );
                                        echo wp_kses_post(skyhead_get_option('main_title_blog_section'), $allowed_tags); ?>
                                    </h2>
                                </div>
                            </div>
                            <?php
                            $skyhead_blog_button_text = skyhead_get_option('blog_button_text');
                            if (!empty($skyhead_blog_button_text)) { ?>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="pull-right">
                                        <a href="<?php echo esc_url(skyhead_get_option('blog_button_link')); ?>"
                                           class="btn twp-btn twp-btn-primary">
                                            <?php echo esc_html(skyhead_get_option('blog_button_text')); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="clearfix col-sm-12 mb-20">
                            <hr>
                        </div>
                        <div class="col-xs-12 pad0-lr">
                            <div class="row col-pad-0 margin-0">
                                <?php
                                $skyhead_home_blog_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 4,
                                    'ignore_sticky_posts' => 1,
                                    'cat' => $skyhead_blog_category,
                                );
                                $skyhead_home_about_post_query = new WP_Query($skyhead_home_blog_args);
                                if ($skyhead_home_about_post_query->have_posts()) :
                                    while ($skyhead_home_about_post_query->have_posts()) : $skyhead_home_about_post_query->the_post();
                                        if (has_post_thumbnail()) {
                                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'skyhead-blog-thumb');
                                            $url = $thumb['0'];
                                        } else {
                                            $url = get_template_directory_uri() . '/images/no-image.jpg';
                                        }
                                        if (has_excerpt()) {
                                            $skyhead_blog_content = get_the_excerpt();
                                        } else {
                                            $skyhead_blog_content = skyhead_words_count($skyhead_blog_excerpt_number, get_the_content());
                                        }
                                        ?>
                                        <div class="col-md-3 col-sm-6">
                                            <article class="twp-post">
                                                <div class="image-box image-hover inner-title">
                                                    <?php if (is_sticky()) { ?>
                                                        <a class="twp-sticky-btn" href="<?php the_permalink(); ?>">
                                                            <?php echo esc_html__('sticky', 'skyhead'); ?>
                                                        </a>
                                                        <?php } ?>

                                                        <a href="<?php the_permalink(); ?>">
                                                                <span class="image">
                                                                    <img src="<?php echo esc_url($url); ?>" />
                                                                </span>
                                                        </a>

                                                    <div class="title">
                                                        <h3>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h3>
                                                        <span class="category">
                                                            <div class="twp-postmeta-wrapper">
                                                                <ul class="twp-postmeta alt-font clearfix">
                                                                    <li>
                                                                        <a class="twp-postmeta-author"
                                                                           href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                                            <i class="ion-android-person"></i> <?php the_author(); ?>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <?php
                                                                        $archive_day = get_the_time('d');
                                                                        ?>
                                                                        <a class="twp-postmeta-date"
                                                                           href="<?php echo esc_attr(get_day_link('', '', $archive_day)); ?>">
                                                                            <i class="ion-calendar"></i> <?php echo esc_attr(get_the_date('M j, Y')); ?>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </span>
                                                    </div>
                                            </article>
                                        </div>

                                        <?php
                                        wp_reset_postdata();
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
        <?php
    }
endif;
add_action('skyhead_action_front_page', 'skyhead_blog', 70);