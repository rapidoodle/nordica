<?php
/**
 * callback section
 *
 * @package consultant-lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();
/*callback section*/
// our callback Main Section.
$wp_customize->add_section( 'callback_section_settings',
	array(
		'title'      => esc_html__( 'Call To Action Section', 'consultant-lite' ),
		'priority'   => 50,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);

// Setting - .
$wp_customize->add_setting( 'show_our_callback_section',
	array(
		'default'           => $consultant_lite_default['show_our_callback_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_our_callback_section',
	array(
		'label'    => esc_html__( 'Enable Call To Action Section', 'consultant-lite' ),
		'section'  => 'callback_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - enable_callback_border_svg.
$wp_customize->add_setting( 'enable_callback_border_svg',
	array(
		'default'           => $consultant_lite_default['enable_callback_border_svg'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'enable_callback_border_svg',
	array(
		'label'    => __( 'Enable Call To Action Section Border SVG', 'consultant-lite' ),
		'section'  => 'callback_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - select_callback_section_overlay.
$wp_customize->add_setting( 'select_callback_section_overlay',
	array(
		'default'           => $consultant_lite_default['select_callback_section_overlay'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'select_callback_section_overlay',
	array(
		'label'       => __( 'Select Call To Action Section Overlay', 'consultant-lite' ),
		'section'     => 'callback_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'no-overlay' => __( 'No Overlay', 'consultant-lite' ),
		    'color-overlay' => __( 'Color Overlay', 'consultant-lite' ),
		    'pattern-overlay' => __( 'Pattern Overlay', 'consultant-lite' ),
		    ),
		'priority'    => 100,
	)
);

// Setting - show-callback-section.
$wp_customize->add_setting( 'select_callback_page',
	array(
		'default'           => $consultant_lite_default['select_callback_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'select_callback_page',
	array(
		'label'    => esc_html__( 'Select Call To Action Page', 'consultant-lite' ),
		'section'  => 'callback_section_settings',
		'type'     => 'dropdown-pages',
		'allow_addition' => true,
		'priority' => 130,
	)
);



/*content excerpt in callback*/
$wp_customize->add_setting( 'number_of_content_home_callback',
	array(
		'default'           => $consultant_lite_default['number_of_content_home_callback'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_callback',
	array(
		'label'    => __( 'Select no words of Call To Action', 'consultant-lite' ),
		'section'  => 'callback_section_settings',
		'type'     => 'number',
		'priority' => 130,
		'input_attrs'     => array( 'min' => 1, 'max' => 500, 'style' => 'width: 150px;' ),

	)
);
// Setting .
$wp_customize->add_setting( 'show_page_link_button',
	array(
		'default'           => $consultant_lite_default['show_page_link_button'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_page_link_button',
	array(
		'label'    => esc_html__( 'Enable Page Link Button', 'consultant-lite' ),
		'section'  => 'callback_section_settings',
		'type'     => 'checkbox',
		'priority' => 140,
	)
);

/*button text*/
$wp_customize->add_setting( 'callback_button_text',
	array(
		'default'           => $consultant_lite_default['callback_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'callback_button_text',
	array(
		'label'    		=> __( 'Call To Action Button Text', 'consultant-lite' ),
		'description'	=> __( 'Removing the text from this section will disable the custom button on callback section', 'consultant-lite' ),
		'section'  		=> 'callback_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 150,
	)
);

/*button url*/
$wp_customize->add_setting( 'callback_button_link',
	array(
		'default'           => $consultant_lite_default['callback_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'callback_button_link',
	array(
		'label'    		=> __( 'URL Link', 'consultant-lite' ),
		'section'  		=> 'callback_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 160,
	)
);