<?php
/**
 * service section
 *
 * @package skyhead
 */

$default = skyhead_get_default_theme_options();
/*service section*/
// our service Main Section.
$wp_customize->add_section( 'service_section_settings',
	array(
		'title'      => esc_html__( 'Service Section', 'skyhead' ),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-work-process-section.
$wp_customize->add_setting( 'show_our_service_section',
	array(
		'default'           => $default['show_our_service_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_our_service_section',
	array(
		'label'    => esc_html__( 'Enable Service Section', 'skyhead' ),
		'section'  => 'service_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-service-section.
$wp_customize->add_setting( 'select_service_main_page',
	array(
		'default'           => $default['select_service_main_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'select_service_main_page',
	array(
		'label'    => esc_html__( 'Select Main Service Page', 'skyhead' ),
		'section'  => 'service_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);


/*No of service*/
$wp_customize->add_setting( 'number_of_home_service',
	array(
		'default'           => $default['number_of_home_service'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_home_service',
	array(
		'label'    => esc_html__( 'Select No Of Service', 'skyhead' ),
        'description'     => __( 'After choosing "Select No Of service" option please save and publish and refresh to get actual no of field for page if you have choosed page field bellow.', 'skyhead' ),
		'section'  => 'service_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'skyhead' ),
		    '2' => __( '2', 'skyhead' ),
		    '3' => __( '3', 'skyhead' ),
		    '4' => __( '4', 'skyhead' )
		    ),
		'type'     => 'select',
		'priority' => 170,
	)
);

/*content excerpt in service*/
$wp_customize->add_setting( 'number_of_content_home_service',
	array(
		'default'           => $default['number_of_content_home_service'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'skyhead_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_service',
	array(
		'label'    => esc_html__( 'Select No Words Of Service', 'skyhead' ),
		'section'  => 'service_section_settings',
		'type'     => 'number',
		'priority' => 180,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*No of font icon*/

/*service from page*/
for ( $i=1; $i <=  skyhead_get_option( 'number_of_home_service' ) ; $i++ ) {
		$wp_customize->add_setting( 'number_of_home_service_icon_'. $i, array(
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'number_of_home_service_icon_'. $i, array(
		    'input_attrs'       => array(
		        'style'           => 'width: 250px;'
		        ),
		    'label'             => esc_html__( 'Font Icon', 'skyhead' ) . ' - ' . $i ,
			'description'     => sprintf( __( 'Use icomoon icon: Eg: %1$s. %2$s See more here %3$s', 'skyhead' ), 'ion-android-bulb','<a href="'.esc_url('http://ionicons.com/cheatsheet.html').'" target="_blank">','</a>' ),
		    'priority'          =>  '120' . $i,
		    'section'           => 'service_section_settings',
		    'type'        		=> 'text',
		    'priority'    		=> 180,
		    )
		);

        $wp_customize->add_setting( 'select_page_for_service_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'skyhead_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'select_page_for_service_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Service From Page', 'skyhead' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'service_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 180,
            )
        );
    }