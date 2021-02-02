<?php
/**
 * Header Option
 *
 * @package Consultant Lite
 */
$consultant_lite_default = consultant_lite_get_default_theme_options();
	

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'consultant-lite' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

// Top Header Section.
$wp_customize->add_section( 'top_header_section_settings',
	array(
		'title'      => __( 'Top Header Section', 'consultant-lite' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting Header location.
$wp_customize->add_setting( 'top_header_location',
	array(
	'default'           => $consultant_lite_default['top_header_location'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'top_header_location',
	array(
	'label'    => __( 'Top Header Location', 'consultant-lite' ),
	'section'  => 'top_header_section_settings',
	'type'     => 'text',
	'priority' => 100,
	)
);

$wp_customize->add_setting( 'top_header_telephone',
	array(
		'default'           => $consultant_lite_default['top_header_telephone'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'top_header_telephone',
	array(
		'label'    => __( 'Top Header Telephone Number', 'consultant-lite' ),
		'section'  => 'top_header_section_settings',
		'type'     => 'text',
		'priority' => 100,
	)
);


$wp_customize->add_setting( 'top_header_email',
	array(
		'default'           => $consultant_lite_default['top_header_email'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control( 'top_header_email',
	array(
		'label'    => __( 'Top Header Email', 'consultant-lite' ),
		'section'  => 'top_header_section_settings',
		'type'     => 'text',
		'priority' => 100,
	)
);


$wp_customize->add_setting( 'top_call_to_action_button_title',
	array(
		'default'           => $consultant_lite_default['top_call_to_action_button_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'top_call_to_action_button_title',
	array(
		'label'    => __( 'Header Off-Canvas Button Text', 'consultant-lite' ),
	'description'     => sprintf( __( 'Please make sure your %1$s "Off-Canvas Button Click Sidebar" %2$s on your widget area is not empty', 'consultant-lite' ),'<a href="'.esc_url(get_admin_url()).'widgets.php'.'" target="_blank">','</a>' ),
		'section'  => 'top_header_section_settings',
		'type'     => 'text',
		'priority' => 120,
	)
);

// Preloader Section.
$wp_customize->add_section('enable_preloader_option',
    array(
        'title' => __('Preloader Options', 'consultant-lite'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting enable_preloader.
$wp_customize->add_setting('enable_preloader',
    array(
        'default' => $consultant_lite_default['enable_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_preloader',
    array(
        'label' => __('Enable Preloader', 'consultant-lite'),
        'section' => 'enable_preloader_option',
        'type' => 'checkbox',
        'priority' => 150,
    )
);

/*layout management section start */
$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Layout Management', 'consultant-lite' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

/*Global Layout*/
$wp_customize->add_setting( 'global_layout',
	array(
		'default'           => $consultant_lite_default['global_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'global_layout',
	array(
		'label'    => esc_html__( 'Global Sidebar Layout', 'consultant-lite' ),
		'section'  => 'theme_option_section_settings',
		'choices'   => array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'consultant-lite' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'consultant-lite' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'consultant-lite' ),
			),
		'type'     => 'select',
		'priority' => 170,
	)
);


/*content excerpt in global*/
$wp_customize->add_setting( 'excerpt_length_global',
	array(
		'default'           => $consultant_lite_default['excerpt_length_global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'excerpt_length_global',
	array(
		'label'    => esc_html__( 'Set Global Archive Length', 'consultant-lite' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'number',
		'priority' => 175,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

// Pagination Section.
$wp_customize->add_section( 'pagination_section',
	array(
	'title'      => __( 'Pagination Options', 'consultant-lite' ),
	'priority'   => 110,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'pagination_type',
	array(
	'default'           => $consultant_lite_default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'pagination_type',
	array(
	'label'       => __( 'Pagination Type', 'consultant-lite' ),
	'section'     => 'pagination_section',
	'type'        => 'select',
	'choices'               => array(
		'default' => __( 'Default (Older / Newer Post)', 'consultant-lite' ),
		'numeric' => __( 'Numeric', 'consultant-lite' ),
	    ),
	'priority'    => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'footer_section',
	array(
	'title'      => __( 'Footer Options', 'consultant-lite' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


// Setting footer_section_background_image.
$wp_customize->add_setting( 'footer_section_background_image',
	array(
	'default'           => $consultant_lite_default['footer_section_background_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'consultant_lite_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'footer_section_background_image',
		array(
		'label'           => __( 'Footer Section Background Image.', 'consultant-lite' ),
		'description'	  => sprintf( __( 'Recommended Size %1$dpx X %2$dpx', 'consultant-lite' ), 1920, 720 ),
		'section'         => 'footer_section',
		'priority'        => 100,

		)
	)
);


// Setting - enable_footer_border_svg.
$wp_customize->add_setting( 'enable_footer_border_svg',
	array(
		'default'           => $consultant_lite_default['enable_footer_border_svg'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'enable_footer_border_svg',
	array(
		'label'    => __( 'Enable Footer Section Border SVG', 'consultant-lite' ),
		'section'  => 'footer_section',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - select_footer_section_overlay.
$wp_customize->add_setting( 'select_footer_section_overlay',
	array(
		'default'           => $consultant_lite_default['select_footer_section_overlay'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'select_footer_section_overlay',
	array(
		'label'       => __( 'Select Footer Section Overlay', 'consultant-lite' ),
		'section'     => 'footer_section',
		'type'        => 'select',
		'choices'               => array(
		    'no-overlay' => __( 'No Overlay', 'consultant-lite' ),
		    'color-overlay' => __( 'Color Overlay', 'consultant-lite' ),
		    'pattern-overlay' => __( 'Pattern Overlay', 'consultant-lite' ),
		    ),
		'priority'    => 100,
	)
);
// Setting social_content_heading.
$wp_customize->add_setting( 'number_of_footer_widget',
	array(
	'default'           => $consultant_lite_default['number_of_footer_widget'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_footer_widget',
	array(
	'label'    => __( 'Number Of Footer Widget', 'consultant-lite' ),
	'description'     => sprintf( __( 'Please make sure your %1$s "Footer Column Sidebar" %2$s on your widget area is not empty', 'consultant-lite' ),'<a href="'.esc_url(get_admin_url()).'widgets.php'.'" target="_blank">','</a>' ),

	'section'  => 'footer_section',
	'type'     => 'select',
	'priority' => 100,
	'choices'               => array(
		0 => __( 'Disable footer sidebar area', 'consultant-lite' ),
		1 => __( '1', 'consultant-lite' ),
		2 => __( '2', 'consultant-lite' ),
		3 => __( '3', 'consultant-lite' ),
		4 => __( '4', 'consultant-lite' ),
	    ),
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'copyright_text',
	array(
	'default'           => $consultant_lite_default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'copyright_text',
	array(
	'label'    => __( 'Footer Copyright Text', 'consultant-lite' ),
	'section'  => 'footer_section',
	'type'     => 'text',
	'priority' => 120,
	)
);

