<?php
/**
 * slider section
 *
 * @package Consultant Lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// Slider Main Section.
$wp_customize->add_section( 'slider_section_settings',
	array(
		'title'      => __( 'Slider Section', 'consultant-lite' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);


// Setting - show_slider_section.
$wp_customize->add_setting( 'show_slider_section',
	array(
		'default'           => $consultant_lite_default['show_slider_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_slider_section',
	array(
		'label'    => __( 'Enable Slider', 'consultant-lite' ),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - enable_slider_border_svg.
$wp_customize->add_setting( 'enable_slider_border_svg',
	array(
		'default'           => $consultant_lite_default['enable_slider_border_svg'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'enable_slider_border_svg',
	array(
		'label'    => __( 'Enable Slider Section Border SVG', 'consultant-lite' ),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - select_slider_section_overlay.
$wp_customize->add_setting( 'select_slider_section_overlay',
	array(
		'default'           => $consultant_lite_default['select_slider_section_overlay'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'select_slider_section_overlay',
	array(
		'label'       => __( 'Select Slider Section Overlay', 'consultant-lite' ),
		'section'     => 'slider_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'no-overlay' => __( 'No Overlay', 'consultant-lite' ),
		    'color-overlay' => __( 'Color Overlay', 'consultant-lite' ),
		    'pattern-overlay' => __( 'Pattern Overlay', 'consultant-lite' ),
		    ),
		'priority'    => 100,
	)
);
// Setting - select_slider_from.
$wp_customize->add_setting( 'select_slider_from',
	array(
		'default'           => $consultant_lite_default['select_slider_from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'select_slider_from',
	array(
		'label'       => __( 'Select Slider From', 'consultant-lite' ),
		'section'     => 'slider_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'consultant-lite' ),
		    'from-category' => __( 'Post - Category', 'consultant-lite' )
		    ),
		'priority'    => 110,
	)
);

/*No of Slider*/
$wp_customize->add_setting( 'number_of_home_slider',
	array(
		'default'           => $consultant_lite_default['number_of_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_home_slider',
	array(
		'label'    => __( 'Select no of slider', 'consultant-lite' ),
        'description'     => __( 'If you are using selection "from page" option please refresh to get actual no of page', 'consultant-lite' ),
		'section'  => 'slider_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'consultant-lite' ),
		    '2' => __( '2', 'consultant-lite' ),
		    '3' => __( '3', 'consultant-lite' ),
		    '4' => __( '4', 'consultant-lite' ),
		    '5' => __( '5', 'consultant-lite' ),
		    '6' => __( '6', 'consultant-lite' ),
		    ),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in Slider*/
$wp_customize->add_setting( 'number_of_content_home_slider',
	array(
		'default'           => $consultant_lite_default['number_of_content_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_slider',
	array(
		'label'    => __( 'Select no words of slider', 'consultant-lite' ),
		'section'  => 'slider_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 500, 'style' => 'width: 150px;' ),

	)
);

for ( $consultant_lite_i=1; $consultant_lite_i <=  consultant_lite_get_option( 'number_of_home_slider' ) ; $consultant_lite_i++ ) {
        $wp_customize->add_setting( 'select_page_for_slider_'. $consultant_lite_i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'consultant_lite_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'select_page_for_slider_'. $consultant_lite_i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Slider From Page', 'consultant-lite' ) . ' - ' . $consultant_lite_i ,
            'priority'          =>  '120' . $consultant_lite_i,
            'section'           => 'slider_section_settings',
            'type'        		=> 'dropdown-pages',
            'allow_addition' => true,
            'priority'    		=> 120,
            'active_callback' 	=> 'consultant_lite_is_select_page_slider',
            )
        );
    }

// Setting - drop down category for slider.
$wp_customize->add_setting( 'select_category_for_slider',
	array(
		'default'           => $consultant_lite_default['select_category_for_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Consultant_Lite_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_slider',
	array(
        'label'           => __( 'Category for slider', 'consultant-lite' ),
        'description'     => __( 'Select category to be shown on tab ', 'consultant-lite' ),
        'section'         => 'slider_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
		'active_callback' => 'consultant_lite_is_select_cat_slider',

    ) ) );

/*settings for Section property*/
/*Button Text*/
$wp_customize->add_setting( 'button_text_on_slider',
	array(
		'default'           => $consultant_lite_default['button_text_on_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'button_text_on_slider',
	array(
		'label'    => __( 'Button Text', 'consultant-lite' ),
		'description'     => __( 'Removing text will disable button on the slider', 'consultant-lite' ),
		'section'  => 'slider_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);

