<?php
/**
 * about section
 *
 * @package skyhead
 */

$default = skyhead_get_default_theme_options();
// our about Main Section.
$wp_customize->add_section( 'about_section_settings',
	array(
		'title'      => esc_html__( 'About Section', 'skyhead' ),
		'priority'   => 118,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-work-process-section.
$wp_customize->add_setting( 'show_our_about_section',
	array(
		'default'           => $default['show_our_about_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_our_about_section',
	array(
		'label'    => esc_html__( 'Enable About Section', 'skyhead' ),
		'section'  => 'about_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-about-section.
$wp_customize->add_setting( 'select_about_main_page',
	array(
		'default'           => $default['select_about_main_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'select_about_main_page',
	array(
		'label'    => esc_html__( 'Select Main About Page', 'skyhead' ),
		'section'  => 'about_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);

/*content excerpt in about*/
$wp_customize->add_setting( 'number_of_content_home_about',
	array(
		'default'           => $default['number_of_content_home_about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_about',
	array(
		'label'    => esc_html__( 'Select No Words Of About', 'skyhead' ),
		'section'  => 'about_section_settings',
		'type'     => 'number',
		'priority' => 180,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*about from page*/
for ( $i=1; $i <=  3 ; $i++ ) {
        $wp_customize->add_setting( 'select_page_for_about_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'skyhead_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'select_page_for_about_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'About From Page', 'skyhead' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'about_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 220,
            )
        );
    }