<?php
/**
 * top header section
 *
 * @package skyhead
 */

$default = skyhead_get_default_theme_options();
/*header section*/
// our header Main Section.
$wp_customize->add_section( 'header_section_settings',
	array(
		'title'      => esc_html__( 'Top Header Section', 'skyhead' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - top_header_email.
$wp_customize->add_setting( 'top_header_email',
	array(
		'default'           => $default['top_header_email'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control( 'top_header_email',
	array(
		'label'    => esc_html__( 'Email Address', 'skyhead' ),
		'section'  => 'header_section_settings',
		'type'     => 'text',
		'priority' => 100,

	)
);

// Setting - top_header_no.

$wp_customize->add_setting( 'top_header_no',
	array(
		'default'           => $default['top_header_no'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'top_header_no',
	array(
		'label'    => esc_html__( 'Contact Number', 'skyhead' ),
		'section'  => 'header_section_settings',
		'type'     => 'text',
		'priority' => 120,

	)
);
