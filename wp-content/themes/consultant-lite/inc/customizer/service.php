<?php
/**
 * service section
 *
 * @package Consultant Lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// Service Main Section.
$wp_customize->add_section( 'service_section_settings',
	array(
		'title'      => __( 'Service Section', 'consultant-lite' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);


// Setting - show-work-process-section.
$wp_customize->add_setting( 'show_service_section',
	array(
		'default'           => $consultant_lite_default['show_service_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_service_section',
	array(
		'label'    => esc_html__( 'Enable Service Section', 'consultant-lite' ),
		'section'  => 'service_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


$wp_customize->add_setting( 'service_section_title',
	array(
		'default'           => $consultant_lite_default['service_section_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'service_section_title',
	array(
		'label'    => __( 'Section Title Text', 'consultant-lite' ),
		'section'  => 'service_section_settings',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Setting - show-work-process-section.
$wp_customize->add_setting( 'show_service_feature_img',
	array(
		'default'           => $consultant_lite_default['show_service_feature_img'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_service_feature_img',
	array(
		'label'    => esc_html__( 'Enable Service Section Featured Image', 'consultant-lite' ),
		'description' => esc_html__( 'Note that font icon will be replaced by featured image', 'consultant-lite' ),
		'section'  => 'service_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

/*content excerpt in service*/
$wp_customize->add_setting( 'number_of_content_home_service',
	array(
		'default'           => $consultant_lite_default['number_of_content_home_service'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_service',
	array(
		'label'    => esc_html__( 'Select No Words Of Service', 'consultant-lite' ),
		'section'  => 'service_section_settings',
		'type'     => 'number',
		'priority' => 180,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*No of font icon*/

/*service from page*/
for ( $i=1; $i <=  6 ; $i++ ) {
		$wp_customize->add_setting( 'number_of_home_service_icon_'. $i , array(
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'number_of_home_service_icon_'. $i, array(
		    'input_attrs'       => array(
		        'style'           => 'width: 250px;'
		        ),
		    'label'             => esc_html__( 'Font Icon', 'consultant-lite' ) . ' - ' . $i ,
			'description'     => sprintf( __( 'Use icomoon icon: Eg: %1$s. %2$s See more here %3$s', 'consultant-lite' ), 'ion-ios-flash','<a href="'.esc_url('https://ionicons.com/').'" target="_blank">','</a>' ),
		    'priority'          =>  '120' . $i,
		    'section'           => 'service_section_settings',
		    'type'        		=> 'text',
		    'priority'    		=> 180,
		    )
		);

        $wp_customize->add_setting( 'select_page_for_service_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'consultant_lite_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'select_page_for_service_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Service From Page', 'consultant-lite' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'service_section_settings',
            'type'        		=> 'dropdown-pages',
            'allow_addition' => true,
            'priority'    		=> 180,
            )
        );
    }

$wp_customize->add_setting( 'button_text_on_service',
	array(
		'default'           => $consultant_lite_default['button_text_on_service'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'button_text_on_service',
	array(
		'label'    => __( 'Button Text', 'consultant-lite' ),
		'description'     => __( 'Removing text will disable button on the Service section', 'consultant-lite' ),
		'section'  => 'service_section_settings',
		'type'     => 'text',
		'priority' => 180,
	)
);