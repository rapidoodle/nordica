<?php
/**
 * about section
 *
 * @package Consultant Lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// About Main Section.
$wp_customize->add_section( 'about_section_settings',
	array(
		'title'      => __( 'About Section', 'consultant-lite' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);


// Setting - show_about_section.
$wp_customize->add_setting( 'show_about_section',
	array(
		'default'           => $consultant_lite_default['show_about_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_about_section',
	array(
		'label'    => __( 'Enable About', 'consultant-lite' ),
		'section'  => 'about_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - enable_about_border_svg.
$wp_customize->add_setting( 'enable_about_border_svg',
	array(
		'default'           => $consultant_lite_default['enable_about_border_svg'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'enable_about_border_svg',
	array(
		'label'    => __( 'Enable About Section Border SVG', 'consultant-lite' ),
		'section'  => 'about_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting( 'select_page_for_about', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'consultant_lite_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'select_page_for_about', array(
    'input_attrs'       => array(
        'style'           => 'width: 50px;'
        ),
    'label'             => __( 'Select About Page', 'consultant-lite' ),
    'priority'          =>  '120',
    'section'           => 'about_section_settings',
    'type'        		=> 'dropdown-pages',
    'allow_addition' => true,
    'priority'    		=> 120,
    )
);

/*content excerpt in About*/
$wp_customize->add_setting( 'number_of_content_home_about',
	array(
		'default'           => $consultant_lite_default['number_of_content_home_about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_about',
	array(
		'label'    => __( 'Select no words of About Section', 'consultant-lite' ),
		'section'  => 'about_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 500, 'style' => 'width: 150px;' ),

	)
);

$wp_customize->add_setting( 'video_url_to_pop_up',
	array(
		'default'           => $consultant_lite_default['video_url_to_pop_up'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'video_url_to_pop_up',
	array(
		'label'    => __( 'Video URL to PopUP', 'consultant-lite' ),
		'section'  => 'about_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);

$wp_customize->add_setting( 'button_text_on_about',
	array(
		'default'           => $consultant_lite_default['button_text_on_about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'button_text_on_about',
	array(
		'label'    => __( 'Button Text', 'consultant-lite' ),
		'description'     => __( 'Removing text will disable button on the about section', 'consultant-lite' ),
		'section'  => 'about_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);
