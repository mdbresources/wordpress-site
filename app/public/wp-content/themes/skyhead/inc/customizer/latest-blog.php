<?php
/**
 * Blog section
 *
 * @package skyhead
 */

$default = skyhead_get_default_theme_options();

// Latest Blog Section.
$wp_customize->add_section( 'latest_blog_section_settings',
	array(
		'title'      => __( 'Latest Blog Section', 'skyhead' ),
		'priority'   => 180,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show_blog_section.
$wp_customize->add_setting( 'show_blog_section',
	array(
		'default'           => $default['show_blog_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_blog_section',
	array(
		'label'    => __( 'Enable Blog', 'skyhead' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - main_title_blog_section.
$wp_customize->add_setting( 'main_title_blog_section',
	array(
		'default'           => $default['main_title_blog_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_post_kses',
	)
);
$wp_customize->add_control( 'main_title_blog_section',
	array(
		'label'    => __( 'Section Title', 'skyhead' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'text',
		'priority' => 100,

	)
);

/*content excerpt in blog*/
$wp_customize->add_setting( 'number_of_excerpt_home_blog',
	array(
		'default'           => $default['number_of_excerpt_home_blog'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_excerpt_home_blog',
	array(
		'label'    => __( 'No words of blog', 'skyhead' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

// Setting - drop down category for blog.
$wp_customize->add_setting( 'select_category_for_blog',
	array(
		'default'           => $default['select_category_for_blog'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Skyhead_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_blog',
	array(
        'label'           => __( 'Category For blog Section', 'skyhead' ),
        'description'     => __( 'If category is selected the latest post from category will be published', 'skyhead' ),
        'section'         => 'latest_blog_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 230,
    ) ) );

/*button text*/
$wp_customize->add_setting( 'blog_button_text',
	array(
		'default'           => $default['blog_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'blog_button_text',
	array(
		'label'    		=> __( 'Button Text', 'skyhead' ),
		'description'	=> __( 'Removing the text from this section will disable the button on blog section', 'skyhead' ),
		'section'  		=> 'latest_blog_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 120,
	)
);

/*button url*/
$wp_customize->add_setting( 'blog_button_link',
	array(
		'default'           => $default['blog_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'blog_button_link',
	array(
		'label'    		=> __( 'URL Link', 'skyhead' ),
		'section'  		=> 'latest_blog_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 130,
	)
);

