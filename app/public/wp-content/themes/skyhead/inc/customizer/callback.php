<?php
/**
 * callback section
 *
 * @package skyhead
 */

$default = skyhead_get_default_theme_options();
/*callback section*/
// our callback Main Section.
$wp_customize->add_section( 'callback_section_settings',
	array(
		'title'      => esc_html__( 'Callback Section', 'skyhead' ),
		'priority'   => 119,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - .
$wp_customize->add_setting( 'show_our_callback_section',
	array(
		'default'           => $default['show_our_callback_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_our_callback_section',
	array(
		'label'    => esc_html__( 'Enable Callback Section', 'skyhead' ),
		'section'  => 'callback_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-callback-section.
$wp_customize->add_setting( 'select_callback_page',
	array(
		'default'           => $default['select_callback_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'select_callback_page',
	array(
		'label'    => esc_html__( 'Select Callback Page', 'skyhead' ),
		'section'  => 'callback_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);


// Setting - .
$wp_customize->add_setting( 'show_page_link_button',
	array(
		'default'           => $default['show_page_link_button'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_page_link_button',
	array(
		'label'    => esc_html__( 'Enable Page Link Button', 'skyhead' ),
		'section'  => 'callback_section_settings',
		'type'     => 'checkbox',
		'priority' => 140,
	)
);



/*button text*/
$wp_customize->add_setting( 'callback_button_text',
	array(
		'default'           => $default['callback_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'callback_button_text',
	array(
		'label'    		=> __( 'Callback Button Text', 'skyhead' ),
		'description'	=> __( 'Removing the text from this section will disable the custom button on callback section', 'skyhead' ),
		'section'  		=> 'callback_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 150,
	)
);

/*button url*/
$wp_customize->add_setting( 'callback_button_link',
	array(
		'default'           => $default['callback_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'callback_button_link',
	array(
		'label'    		=> __( 'URL Link', 'skyhead' ),
		'section'  		=> 'callback_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 160,
	)
);

