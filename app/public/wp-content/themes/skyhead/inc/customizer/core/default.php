<?php
/**
 * Default theme options.
 *
 * @package skyhead
 */

if ( ! function_exists( 'skyhead_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function skyhead_get_default_theme_options() {

		$defaults = array();
        //Top Header section
		$defaults['top_header_no']						= '';
		$defaults['top_header_email']					= '';

		// Slider Section.
		$defaults['show_slider_section']				= 0;
		$defaults['number_of_home_slider']				= 3;
		$defaults['number_of_content_home_slider']		= 30;
		$defaults['select_slider_from']					= 'from-category';
		$defaults['select-page-for-slider']				= 0;
		$defaults['select_category_for_slider']			= 1;
		$defaults['button_text_on_slider']				= esc_html__( 'Browse More', 'skyhead' );
		
		/*Latest Blog Default Value*/
		$defaults['show_blog_section']					= 0;
		$defaults['main_title_blog_section']			= esc_html__( 'Latest Blog', 'skyhead' );
		$defaults['number_of_excerpt_home_blog']		= 40;
		$defaults['select_category_for_blog']			= 0;
		$defaults['blog_button_text']					= esc_html__( 'ALL NEWS ON OUR BLOG', 'skyhead' );
		$defaults['blog_button_link']					= '#';

		/*about section*/
		$defaults['show_our_about_section']				= 0;
		$defaults['select_about_main_page']				= 0;
		$defaults['number_of_content_home_about']		= 40;
		$defaults['select_page_for_about_1']			= 0;



		/*callback section*/

		$defaults['show_our_callback_section']			= 0;
		$defaults['select_callback_page']			= 0;
		$defaults['show_page_link_button']				= 1;
		$defaults['callback_button_text']				= esc_html__( 'Buy Now', 'skyhead' );
		$defaults['callback_button_link']				= '';


		/*service section*/

		$defaults['show_our_service_section']			= 0;
		$defaults['select_service_main_page']			= 0;
		$defaults['number_of_home_service']				= 4;
		$defaults['number_of_content_home_service']		= 30;
		$defaults['number_of_home_service_icon_1']		= 'ion-android-bulb';
		$defaults['select_page_for_service_1']			= 0;

		/*layout*/
		$defaults['enable_overlay_option']			= 1;
		$defaults['homepage_layout_option']			= 'full-width';
		$defaults['global_layout']					= 'right-sidebar';
		$defaults['excerpt_length_global']			= 50;
		$defaults['archive_layout']					= 'excerpt-only';
		$defaults['archive_layout_image']			= 'full';
		$defaults['single_post_image_layout']		= 'full';
		$defaults['pagination_section']				= 'default';
		$defaults['enable_social_nav']				= 1;
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'skyhead' );
		$defaults['number_of_footer_widget']		= 3;
		$defaults['breadcrumb_type']				= 'simple';

		// Pass through filter.
		$defaults = apply_filters( 'skyhead_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
