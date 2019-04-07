<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skyhead
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!is_single()) { ?>
        <h2 class="entry-title  alt-font text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php $archive_layout = skyhead_get_option('archive_layout'); ?>
        <?php $archive_layout_image = skyhead_get_option('archive_layout_image'); ?>
        <?php if ('full' == $archive_layout_image) {
            $full_width_content = 'archive-image-full';
        } else{
            $full_width_content = 'twp-archive-lr';
        }
        ?>
        <div class="entry-content twp-entry-content <?php echo esc_attr($full_width_content); ?>">
            <?php $archive_layout = skyhead_get_option('archive_layout'); ?>
            <?php $archive_layout_image = skyhead_get_option('archive_layout_image'); ?>

            <?php if (has_post_thumbnail()) :
                if ('left' == $archive_layout_image) {
                    echo "<div class='twp-image-archive image-left'>";
                    the_post_thumbnail('medium');
                } elseif ('right' == $archive_layout_image) {
                    echo "<div class='twp-image-archive image-right'>";
                    the_post_thumbnail('medium');
                } elseif ('full' == $archive_layout_image) {
                    echo "<div class='twp-image-archive image-full'>";
                    the_post_thumbnail('full');
                } else {
                    echo "<div>";
                }
                echo "</div>";/*div end*/
            endif; ?>
            <?php if ('full-post' == $archive_layout) : ?>
                <?php
                the_content(sprintf(
                /* translators: %s: Name of current post. */
                    wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'skyhead'), array('span' => array('class' => array()))),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ));
                ?>
            <?php else : ?>
                <?php the_excerpt(); ?>
            <?php endif ?>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'skyhead'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
    <?php } else { ?>
        <div class="entry-content">
            <?php
            $image_values = get_post_meta($post->ID, 'skyhead-meta-image-layout', true);
            if (empty($image_values)) {
                $values = esc_attr(skyhead_get_option('single_post_image_layout'));
            } else {
                $values = esc_attr($image_values);
            }
            if ('no-image' != $values) {
                if ('left' == $values) {
                    echo "<div class='image-left'>";
                    the_post_thumbnail('medium');
                } elseif ('right' == $values) {
                    echo "<div class='image-right'>";
                    the_post_thumbnail('medium');
                } else {
                    echo "<div class='image-full'>";
                    the_post_thumbnail('full');
                }
                echo "</div>";/*div end */
            }
            ?>
            <?php the_content(); ?>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'skyhead'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->

    <?php } ?>

    <footer class="entry-footer">
        <?php skyhead_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
