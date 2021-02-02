<?php
/**
 * contact section
 *
 * @package consultant-lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// Contact Main Section.
$wp_customize->add_section( 'contact_section_settings',
	array(
		'title'      => esc_html__( 'Contact Section', 'consultant-lite' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);


// Setting - show_contact_section.
$wp_customize->add_setting( 'show_contact_section',
	array(
		'default'           => $consultant_lite_default['show_contact_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_contact_section',
	array(
		'label'    => esc_html__( 'Enable Contact', 'consultant-lite' ),
		'section'  => 'contact_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - show_top_contact_details.
$wp_customize->add_setting( 'show_top_contact_details',
	array(
		'default'           => $consultant_lite_default['show_top_contact_details'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_top_contact_details',
	array(
		'label'    => esc_html__( 'Enable Contact Details', 'consultant-lite' ),
		'description'     => esc_html__( 'Show the contact details form the top header section', 'consultant-lite'),
		'section'  => 'contact_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - show_social_nav.
$wp_customize->add_setting( 'show_social_nav',
	array(
		'default'           => $consultant_lite_default['show_social_nav'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_social_nav',
	array(
		'label'    => esc_html__( 'Enable Social Link', 'consultant-lite' ),
		'description'     => esc_html__( 'Show the social menu as like on top header', 'consultant-lite'),
		'section'  => 'contact_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting( 'main_title_contact_section',
	array(
		'default'           => $consultant_lite_default['main_title_contact_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'main_title_contact_section',
	array(
		'label'    => __( 'Section Title Text', 'consultant-lite' ),
		'section'  => 'contact_section_settings',
		'type'     => 'text',
		'priority' => 100,
	)
);


// Setting - contact_form_shortcode.
$wp_customize->add_setting( 'contact_form_shortcode',
	array(
		'default'           => $consultant_lite_default['contact_form_shortcode'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'contact_form_shortcode',
	array(
		'label'    => esc_html__( 'Contact Form Shortcode', 'consultant-lite' ),
		'section'  => 'contact_section_settings',
		'type'     => 'textarea',
		'priority' => 110,
	)
);


// Setting - show_contact_map_section.
$wp_customize->add_setting( 'show_contact_map_section',
	array(
		'default'           => $consultant_lite_default['show_contact_map_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_contact_map_section',
	array(
		'label'    => esc_html__( 'Enable Google Map', 'consultant-lite' ),
		'section'  => 'contact_section_settings',
		'type'     => 'checkbox',
		'priority' => 120,
	)
);

// Setting - google_map_api.
$wp_customize->add_setting( 'google_map_shortcode',
	array(
		'default'           => $consultant_lite_default['google_map_shortcode'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'google_map_shortcode',
	array(
		'label'    => esc_html__( 'Google Map Shortcode', 'consultant-lite' ),
		'section'  => 'contact_section_settings',
		'type'     => 'textarea',
		'priority' => 130,
	)
);
