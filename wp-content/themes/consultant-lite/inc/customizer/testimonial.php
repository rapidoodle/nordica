<?php
/**
 * testimonial section
 *
 * @package consultant-lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// testimonial Main Section.
$wp_customize->add_section( 'testimonial_section_settings',
	array(
		'title'      => __( 'Testimonial Section', 'consultant-lite' ),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);


// Setting - show-testimonial-section.
$wp_customize->add_setting( 'show_testimonial_section',
	array(
		'default'           => $consultant_lite_default['show_testimonial_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_testimonial_section',
	array(
		'label'    => __( 'Enable Testimonial', 'consultant-lite' ),
		'section'  => 'testimonial_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - select_testimonial_section_overlay.
$wp_customize->add_setting( 'select_testimonial_section_overlay',
	array(
		'default'           => $consultant_lite_default['select_testimonial_section_overlay'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'select_testimonial_section_overlay',
	array(
		'label'       => __( 'Select Testimonial Section Overlay', 'consultant-lite' ),
		'section'     => 'testimonial_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'no-overlay' => __( 'No Overlay', 'consultant-lite' ),
		    'color-overlay' => __( 'Color Overlay', 'consultant-lite' ),
		    'pattern-overlay' => __( 'Pattern Overlay', 'consultant-lite' ),
		    ),
		'priority'    => 100,
	)
);

// Setting - title_testimonial_section.
$wp_customize->add_setting( 'title_testimonial_section',
	array(
		'default'           => $consultant_lite_default['title_testimonial_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'title_testimonial_section',
	array(
		'label'    => __( 'Section Title', 'consultant-lite' ),
		'section'  => 'testimonial_section_settings',
		'type'     => 'text',
		'priority' => 104,
	)
);


// Setting testimonial_section_background_image.
$wp_customize->add_setting( 'testimonial_section_background_image',
	array(
	'default'           => $consultant_lite_default['testimonial_section_background_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'consultant_lite_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'testimonial_section_background_image',
		array(
		'label'           => __( 'Testimonial Section Background Image.', 'consultant-lite' ),
		'description'	  => sprintf( __( 'Recommended Size %1$dpx X %2$dpx', 'consultant-lite' ), 1920, 720 ),
		'section'         => 'testimonial_section_settings',
		'priority'        => 104,

		)
	)
);

// Setting - select_testimonial_from.
$wp_customize->add_setting( 'select_testimonial_from',
	array(
		'default'           => $consultant_lite_default['select_testimonial_from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'select_testimonial_from',
	array(
		'label'       => __( 'Select Slider From', 'consultant-lite' ),
		'section'     => 'testimonial_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'consultant-lite' ),
		    'from-category' => __( 'Post - Category', 'consultant-lite' )
		    ),
		'priority'    => 110,
	)
);

/*No of testimonial*/
$wp_customize->add_setting( 'number_of_home_testimonial',
	array(
		'default'           => $consultant_lite_default['number_of_home_testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_home_testimonial',
	array(
		'label'    => __( 'Select no of testimonial', 'consultant-lite' ),
        'description'     => __( 'If you are using post category not shortcode', 'consultant-lite' ),
		'section'  => 'testimonial_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'consultant-lite' ),
		    '2' => __( '2', 'consultant-lite' ),
		    '3' => __( '3', 'consultant-lite' ),
		    '4' => __( '4', 'consultant-lite' ),
		    '5' => __( '5', 'consultant-lite' ),
		    '6' => __( '6', 'consultant-lite' )
		    ),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in testimonial*/
$wp_customize->add_setting( 'number_of_content_home_testimonial',
	array(
		'default'           => $consultant_lite_default['number_of_content_home_testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_testimonial',
	array(
		'label'    => __( 'Select no words of testimonial', 'consultant-lite' ),
		'section'  => 'testimonial_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

for ( $consultant_lite_i=1; $consultant_lite_i <=  consultant_lite_get_option( 'number_of_home_testimonial' ) ; $consultant_lite_i++ ) {
        $wp_customize->add_setting( 'select_page_for_testimonial_'. $consultant_lite_i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'consultant_lite_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'select_page_for_testimonial_'. $consultant_lite_i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Testimonail From Page', 'consultant-lite' ) . ' - ' . $consultant_lite_i ,
            'priority'          =>  '120' . $consultant_lite_i,
            'section'           => 'testimonial_section_settings',
            'type'        		=> 'dropdown-pages',
            'allow_addition' => true,
            'priority'    		=> 120,
            'active_callback' 	=> 'consultant_lite_is_select_page_testimonial',
            )
        );
    }


// Setting - drop down category for testimonial.
$wp_customize->add_setting( 'select_category_for_testimonial',
	array(
		'default'           => $consultant_lite_default['select_category_for_testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Consultant_Lite_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_testimonial',
	array(
        'label'           => __( 'Post Category for Testimonial', 'consultant-lite' ),
        'section'         => 'testimonial_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
		'active_callback' => 'consultant_lite_is_select_cat_testimonial',

    ) ) );
