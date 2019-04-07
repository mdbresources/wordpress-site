<?php 

/**
 * Theme Options Panel.
 *
 * @package skyhead
 */

$default = skyhead_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_front_page_section',
	array(
		'title'      => __( 'Home/Front Page Settings', 'skyhead' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);
    //Top Header section
    require get_template_directory() . '/inc/customizer/top-header.php';

	/*slider and its property section*/
	require get_template_directory() . '/inc/customizer/slider.php';

	/*about and its property section*/
	require get_template_directory() . '/inc/customizer/about.php';
	
	require get_template_directory() . '/inc/customizer/callback.php';

	/*service section*/
	require get_template_directory() . '/inc/customizer/service.php';

	/*latest-blog section*/
	require get_template_directory() . '/inc/customizer/latest-blog.php';
?>