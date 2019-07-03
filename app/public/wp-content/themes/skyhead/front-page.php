<?php
/**
 * The template for displaying home page.
 * @package Skyhead
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }
else{
	if ((skyhead_get_option('show_slider_section') != 1) && (skyhead_get_option('show_blog_section') != 1) &&  (skyhead_get_option('show_our_service_section') != 1)  &&  (skyhead_get_option('show_our_about_section') != 1)  &&  (skyhead_get_option('show_our_callback_section') != 1) ) {
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section class="wrapper display-info">
				<div class="container">
				<?php echo sprintf(
					__( 'All Section are based on page and post. Enable each Section from customizer </br> eg: for slider section : Home/Front Page Settings -> Slider Section -> Enable Slider. </br>likewise to other sections  %s', 'skyhead' ),
					'<a class="btn twp-btn twp-btn-primary" href="' . esc_url( admin_url( 'customize.php' ) ) . '">' . __( 'click here', 'skyhead' ) . '</a>'
					); ?>
				</div>
			</section>
		<?php }
	}
	else{
	/**
	 * skyhead_action_front_page hook
	 * @since Skyhead 0.0.2
	 *
	 * @hooked skyhead_action_front_page -  10
	 * @sub_hooked skyhead_action_front_page -  10
	 */
	do_action( 'skyhead_action_front_page' );
	}
}
get_footer();